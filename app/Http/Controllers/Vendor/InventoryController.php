<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\UserProduct;
use App\VendorProduct;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Helpers\Helper;
use DataTables;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use App\AttributeMaster;
use App\UserProductAttribute;
use App\UserProductAttributeValue;

class InventoryController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->current_menu='inventory';
        $this->table_name='user_products';
        $this->base = 'vendor';
    }

    public function index(Request $request)
    {
        $user_id = Auth::guard('vendor')->user()->id;
        $current_menu = $this->current_menu;
        $table_name = $this->table_name;
        $base = $this->base;
        $modules = array();

        $count = UserProduct::Distinct('u.product_id')
                            ->select($table_name.'.*')
                            ->leftjoin('user_product_attributes as u','u.product_id','=',$table_name.'.id')
                            ->where($table_name.'.status', '!=', 9)
                            ->where('vendor_id',$user_id)
                            // ->groupBy('u.product_id')
                            ->count();

        $records = UserProduct::Distinct('u.product_id')
                                ->select($table_name.'.*')
                                ->leftjoin('user_product_attributes as u','u.product_id','=',$table_name.'.id')
                                ->where($table_name.'.status', '!=', 9)
                                ->where('vendor_id',$user_id)
                                ->orderBy($table_name.'.id', 'DESC')
                                // ->groupBy('u.product_id')
                                ->get();

            if ($request->ajax()) {

                $datatables = Datatables::of($records)
                    ->addIndexColumn()
                    ->editColumn('product_image',function($row){
                        $url = asset('images/no-product.png');
                        $product_t = Helper::get_product_thumbnail_image($row->id);
                        if($product_t!=NULL)
                        {
                            $url = asset('uploads/products/image/'.$product_t->file_name);
                        }
                        return '<div class="product_image">
                                    <img src="'.$url.'">
                                </div>';
                    })
                    ->editColumn('name', function ($row) {
                        $brand = Helper::get_brand_data($row->brand_id);
                        return '<div class="testop">
                                    <h4>'.$row->product_title.'</h4>
                                    <p><strong>Brand: </strong>'.$brand->name.'</p>
                                </div>';
                    });
                    if (true) {
                        $datatables = $datatables->addColumn('action', function($row) use ($modules, $current_menu, $table_name) {
                            if (true) {
                                $encrypt_id = Crypt::encryptString($row->id);
                                $url = url('vendor/'.$current_menu.'/edit/'.$encrypt_id);
                                $action2 = '<a href="'.$url.'" class="btn btn-secondary">- Edit inventory</a>';
                            } else {
                                $action2 = ' ';
                            }
                            $action = $action2;
                            return $action;
                        });
                    }

                    $datatables = $datatables->rawColumns(['product_image','name', 'action'])->make(true);
                return $datatables;
            }
            return view('vendor_module.'.$current_menu.'.index', [
                'current_menu'=>$current_menu,
                'table_name'=>$table_name,
                'modules' => $modules,
                'count' => $count,
                'records' => $records,
            ]);
    }

    // public function create()
    // {
    //     $products = UserProduct::where('status','<>',9)->get();
    //     return view('vendor_module.inventory.create',compact('products'));
    // }

    public function edit($id)
    {
        $current_menu = $this->current_menu;
        $table_name = $this->table_name;
        $decrypt_id = Crypt::decryptString($id);
        //echo $decrypt_id;die;
        $records = DB::table($table_name)
            ->where($table_name.'.id', $decrypt_id)
            ->first();

        return view('vendor_module.'.$current_menu.'.edit', [
            'current_menu'=>$current_menu,
            'encrypt_id'=>$id,
            'records' => $records,
        ]);
    }

    public function update(Request $request, $id){

        $current_menu = $this->current_menu;
        $table_name = $this->table_name;
        $decrypt_id = Crypt::decryptString($id);
        $base = $this->base;

        $rules = [
            'sku.*' => 'required',
            'price.*' => 'required|numeric|min:0',
            'discounted_price.*' => 'required|numeric|min:0',
            'quantity.*' => 'required|integer|min:1',
        ];

        $custom= [
            'sku.*.required' => 'Sku Field is Required',
            'price.*.required' => 'Price Field is Required',
            'price.*.numeric' => 'Price Must be Numeric',
            'price.*.min' => 'Price Must be Atleast 0',
            'discounted_price.*.required' => 'Discounted Price Field is Required',
            'discounted_price.*.numeric' => 'Discounted Price Must be Numeric',
            'discounted_price.*.min' => 'Discounted Price Must be Atleast 0',
            'quantity.*.required' => 'Quantity Field is Required',
            'quantity.*.integer' => 'Quantity Must be Numeric',
            'quantity.*.min' => 'Quantity Must be Atleast 1',
        ];

        $validator = Validator::make($request->all(),$rules,$custom);

        if($validator->fails())
        {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ]);
        }


        //dd($request->all());

        // Validation for product attribute

        $attr_name = [];

        $pro_attribute = UserProductAttribute::where('product_id',$decrypt_id)->whereNotNull('attribute_id')->latest()->first();

        if($pro_attribute!=NULL)
        {
            $attr_name = explode(',',$pro_attribute->attribute_name);

            if(count($request->price)>0 && count($attr_name)>0)
            {
                foreach($request->price as $key => $price)
                {
                    foreach($attr_name as $value)
                    {
                        $rules = [
                            $value.'.*' => 'required'
                        ];

                        $custom = [
                            $value.'.*.required' => $value.' Field is required'
                        ];

                        $validator = Validator::make($request->all(),$rules,$custom);

                        if($validator->fails())
                        {
                            return response()->json([
                                'success' => false,
                                'errors' => $validator->errors()
                            ]);
                        }
                    }
                }
            }
        }
        DB::beginTransaction();
        try{

            if(count($request->price)>0)
            {
                $i = 0;
                $check_product_attributes = UserProductAttribute::where('product_id',$decrypt_id)->get();
                if(count($check_product_attributes)>0)
                {
                    if($pro_attribute!=NULL)
                    {
                        foreach($check_product_attributes as $p_attr)
                        {
                            UserProductAttribute::where('id',$p_attr->id)->update([
                                'sku' => $request->sku[$i],
                                'price' => $request->price[$i],
                                'quantity' =>$request->quantity[$i],
                                'updated_at' => date('Y-m-d H:i:s')
                            ]);

                            $attribute_id = [];

                            $attribute_id = explode(',',$pro_attribute->attribute_id);

                            //dd($attribute_id);

                            if(count($attribute_id)>0)
                            {
                                $m = 0;

                                foreach($attribute_id as $aid)
                                {
                                    $user_product_attribute_values = UserProductAttributeValue::where(['product_attribute_id'=>$p_attr->id,'attribute_id'=>$aid])->first();

                                    //dd($user_product_attribute_values);

                                    if($user_product_attribute_values)
                                    {

                                        UserProductAttributeValue::where('id',$user_product_attribute_values->id)->update([
                                            'attribute_value' => $request->input($attr_name[$m])[$i],
                                            'updated_at' => date('Y-m-d H:i:s')
                                        ]);

                                        $m++;

                                    }
                                }
                            }

                            $i++;
                        }

                        $c = $i;

                        $diff = count($request->price) - ($c);

                        if($diff > 0)
                        {
                            $attribute_id = [];

                            $attribute_id = explode(',',$pro_attribute->attribute_id);

                            $attr_name = [];

                            $attr_name = explode(',',$pro_attribute->attribute_name);

                            for($k=$c; $k<count($request->price); $k++)
                            {
                                $data = [
                                    'product_id' => $decrypt_id,
                                    'attribute_id' => count($attribute_id) > 0 ? implode(',',$attribute_id) : NULL,
                                    'attribute_name' => count($attr_name) > 0 ? implode(',',$attr_name) : NULL,
                                    'sku' => $request->sku[$k],
                                    'price' => $request->price[$k],
                                    'discounted_price' =>$request->discounted_price[$k],
                                    'quantity' =>$request->quantity[$k],
                                    'created_at' => date('Y-m-d H:i:s')
                                ];

                                $user_attribute = UserProductAttribute::create($data);

                                if(count($attribute_id)>0)
                                {
                                    $j = 0;

                                    foreach($attribute_id as $aid)
                                    {
                                        $q_data = [
                                            'product_id' => $decrypt_id,
                                            'attribute_id' => $aid,
                                            'attribute_name' => $attr_name[$j],
                                            'attribute_value' => $request->input($attr_name[$j])[$k],
                                            'product_attribute_id' => $user_attribute->id,
                                            'created_at' => date('Y-m-d H:i:s')
                                        ];

                                        UserProductAttributeValue::create($q_data);

                                        $j++;
                                    }
                                }
                            }
                        }
                    }
                    else
                    {
                        foreach($check_product_attributes->take(1) as $p_attr)
                        {
                            UserProductAttribute::where('id',$p_attr->id)->update([
                                'sku' => $request->sku[$i],
                                'price' => $request->price[$i],
                                'quantity' =>$request->quantity[$i],
                                'updated_at' => date('Y-m-d H:i:s')
                            ]);

                            $i++;
                        }
                    }
                }
                else
                {
                    foreach($request->price as $price)
                    {
                        $data = [
                            'product_id' => $decrypt_id,
                            'attribute_id' =>  NULL,
                            'attribute_name' => 'OnePrice',
                            'sku' => $request->sku[$i],
                            'price' => $price,
                            'discounted_price' =>$request->discounted_price[$i],
                            'quantity' =>$request->quantity[$i],
                            'created_at' => date('Y-m-d H:i:s')
                        ];

                        $user_attribute = UserProductAttribute::create($data);

                        $q_data = [
                            'product_id' => $decrypt_id,
                            'attribute_id' => NULL,
                            'attrbute_name' => 'OnePrice',
                            'attribute_value' => 'OnePrice',
                            'product_attribute_id' => $user_attribute->id,
                            'created_at' => date('Y-m-d H:i:s')
                        ];

                        UserProductAttributeValue::create($q_data);

                        $i++;
                    }
                }

            }

            DB::commit();
            Session::flash('message', 'Inventory updated successfully!');
            Session::flash('alert-class', 'alert-success');

            return response()->json([
                'success' => true
            ]);
        }
        catch (\Exception $e) {
            DB::rollback();
            // something went wrong
            return $e;
        }
    }
}
