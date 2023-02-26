<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\UserProduct;
use App\UserProductImage;
use App\UserProductDocumentation;
use App\Helpers\Helper;
use DataTables;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;
use App\AttributeMaster;
use App\UserProductAttribute;
use App\UserProductAttributeValue;
use App\Vendor;

class ProductController1 extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->current_menu='products';
        $this->table_name='user_products';
        $this->base = 'admin';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // die('i am controller 1');
        $current_menu = $this->current_menu;
        $table_name = $this->table_name;

        $modules = array();

        $count = UserProduct::where($table_name.'.status', '!=', 9)
                ->count();

        $records = UserProduct::where($table_name.'.status', '!=', 9)
            ->orderBy($table_name.'.id', 'DESC')
            ->get();

            if ($request->ajax()) {

                $datatables = Datatables::of($records)
                    ->addIndexColumn()
                    ->editColumn('price',function($row){
                        $price = $row->price;
                        $user_attribute = UserProductAttribute::where('product_id',$row->id)->get();
                        if(count($user_attribute)>0)
                        {
                            $price = 0.00;

                            foreach($user_attribute as $a)
                            {
                                $price = $price + $a->price;
                            }
                        }
                        return '<i class="fas fa-dollar-sign"></i> '.$price;
                    })
                    ->editColumn('discounted_price',function($row){
                        $discounted_price = $row->discounted_price;
                        $user_attribute = UserProductAttribute::where('product_id',$row->id)->get();
                        if(count($user_attribute)>0)
                        {
                            $discounted_price = 0.00;

                            foreach($user_attribute as $a)
                            {
                                $discounted_price = $discounted_price + $a->discounted_price;
                            }
                        }
                        return '<i class="fas fa-dollar-sign"></i> '.$discounted_price;
                    })
                    ->editColumn('quantity',function($row){
                        $quantity = $row->quantity;
                        $user_attribute = UserProductAttribute::where('product_id',$row->id)->get();
                        if(count($user_attribute)>0)
                        {
                            $quantity = 0;

                            foreach($user_attribute as $a)
                            {
                                $quantity = $quantity + $a->quantity;
                            }
                        }
                        return $quantity;
                    })
                    ->editColumn('created_at',function($row){
                        return date('Y-m-d h:i A',strtotime($row->created_at));
                    })
                    ->editColumn('status', function ($row) {
                        if ($row->status == 1) {
                            return '<span class="badge badge-success">Active</span>';
                        } else {
                            return '<span class="badge badge-warning">Inactive</span>';
                        }
                    });
                    if (true) {
                        $datatables = $datatables->addColumn('action', function($row) use ($modules, $current_menu, $table_name) {
                            if (true) {
                                if ($row->status == 1) {
                                    $action1 = '<button class="btn btn-warning" type="button" onclick="confirmChangeStatusAction(`'.$table_name.'`, '.$row->id.', '.$row->status.');" title="Deactivate"><i class="nav-icon i-Reset"></i></button> ';
                                } else {
                                    $action1 = '<button class="btn btn-success" type="button" onclick="confirmChangeStatusAction(`'.$table_name.'`, '.$row->id.', '.$row->status.');" title="Deactivate"><i class="nav-icon i-Reset"></i></button> ';
                                }
                            }
                            if (true) {
                                $encrypt_id = Crypt::encryptString($row->id);
                                $url = url('admin/'.$current_menu.'/'.$encrypt_id.'/edit');
                                $action2 = '<a href="'.$url.'" class="btn btn-info" type="button" title="Edit"><i class="nav-icon i-Pen-2"></i></a> ';
                            } else {
                                $action2 = ' ';
                            }
                            if (true) {
                                $action3 = '<button class="btn btn-danger" type="button" onclick="confirmDeleteAction(`'.$table_name.'`, `'.$row->id.'`);" title="Delete"><i class="nav-icon i-Close-Window"></i></button>';
                            } else {
                                $action3 = ' ';
                            }
                            $action = $action1.$action2.$action3;
                            return $action;
                        });
                    }
                    if(true){
                        $datatables = $datatables->rawColumns(['price','discounted_price','quantity','status', 'action'])->make(true);
                    } else {
                        $datatables = $datatables->rawColumns(['price','discounted_price','quantity','status'])->make(true);
                    }
                return $datatables;
            }
            return view($current_menu.'.index', [
                'current_menu'=>$current_menu,
                'table_name'=>$table_name,
                'modules' => $modules,
                
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //'vendors' => $vendors
        $current_menu = $this->current_menu;

        $product_categories = DB::table('product_categories')
            ->where('product_categories.status', '=', 1)
            ->where('product_categories.parent_id', '=', 0)
            ->pluck('product_categories.name as product_category_name', 'product_categories.id as product_category_id');

        $product_brands = DB::table('brands')
            ->where('brands.status', '=', 1)
            ->pluck('brands.name as brand_name', 'brands.id as brand_id');

        $vendors = Vendor::where('status','<>',9)->get();

        return view($current_menu.'.create', [
        'current_menu' => $current_menu,
        'product_categories'=>$product_categories,
        'product_brands' => $product_brands,
        
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //dd($request->all());
        $base = $this->base;
        $rules = [
            'product_category' => 'required',
            'product_brand' => 'required',
            'title' => 'required',
            // 'price' => 'required|numeric|min:1',
            // 'discount_price' => 'required|numeric|lte:price|min:1',
            // 'quantity' => 'required|integer|min:1',
            'short_description' => 'required',
            'description' => 'required',
            'image' => 'required',
            'image.*' =>'mimes:jpg,jpeg,png,gif,bmp,svg|max:20000',
            'document' => 'required',
            'document.*' => 'required|mimes:jpg,jpeg,png,gif,bmp,svg,pdf,mp4|max:50000',
            'sku.*' => 'required',
            'price.*' => 'required|numeric|min:0',
            'discounted_price.*' => 'required|numeric|min:0',
            'quantity.*' => 'required|integer|min:1',
            'rent_price' => 'required_if:is_rent,on|nullable|numeric|min:0',
            'rent_deposit' => 'required_if:is_rent,on|nullable|numeric|min:0'
        ];

        $custom= [
            'price.min' => 'Price Must Be Atleast 1',
            'discount_price.lte' => 'Discount Price Must Be Less Than or Equal to Price',
            'image.*.required' => 'Product Image Field is Required',
            'image.*.mimes' => 'Product Image Must be in jpg,jpeg,png,gif,bmp,svg format',
            'image.*.max' => 'Product Image Size Must be Maximum 20MB',
            'document.*.required' => 'Document Field is Required',
            'document.*.mimes' => 'Document Must be allowed in jpg,jpeg,png,gif,bmp,svg,pdf,mp4 format',
            'document.*.max' => 'Document Must Size Must be Maximum 50MB',
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
            'rent_price.required_if' => 'Rent Price Field is required',
            'rent_deposit.required_if' => 'Rent Deposit Field is required'
        ];



        $sku = mt_rand(10000,99999);

        $validator = Validator::make($request->all(),$rules,$custom);

        if($validator->fails())
        {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ]);
        }

        // Validation for category attribute

        $attr_name = [];

        $category_attribute = AttributeMaster::where('category_id',$request->product_category)->where('status','<>','9')->orderBy('list_order','asc')->get();

        $attr_name = array_map('strtolower', $category_attribute->pluck('name')->all());

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

        DB::beginTransaction();
        try{
            $category_id = [];

            $category_id = [$request->product_category];

            if($request->product_sub_category!=NULL && $request->product_sub_category!='')
            {
                array_push($category_id,$request->product_sub_category);
            }

            if($request->product_sub_sub_category!=NULL && $request->product_sub_category!='')
            {
                array_push($category_id,$request->product_sub_sub_category);
            }
            $data = [
                'category_id' => implode(',',$category_id),
                'brand_id' => $request->product_brand,
                'sku' => $sku,
                'product_title' => $request->title,
                // 'price' => $request->price,
                // 'discounted_price' => $request->discount_price,
                'short_description' => $request->short_description,
                'description' => $request->description,
                'specification' => $request->specification,
                // 'quantity' => $request->quantity,
                'in_box' => $request->in_box!=NULL ? $request->in_box : NULL,
                'is_popular' => $request->is_popular!=NULL ? 1 : 0,
                'is_return' => $request->is_return!=NULL ? 1 : 0,
                'is_rent' => $request->is_rent!=NULL ? 1 : 0,
                'rent_price' => $request->is_rent!=NULL ? $request->rent_price : 0,
                'rent_deposit' => $request->is_rent!=NULL ? $request->rent_deposit : 0,
                'created_at' => date('Y-m-d H:i:s')
            ];

            $query = UserProduct::create($data);

            if ($query) {
                $is_thumbnail = !empty($request->is_thumbnail)?$request->is_thumbnail:0;
                if($files=$request->file('image')){
                    foreach($files as $key => $file){
                        $date = date('YmdHis');
                        $no = str_shuffle('123456789023456789034567890456789905678906789078908909000987654321987654321876543217654321654321543214321321211');
                        $random_no = substr($no, 0, 2);
                        $final_image_name = $date.$random_no.'.'.$file->getClientOriginalExtension();
                        $destination_path = public_path('/uploads/products/image');
                        if(!File::exists($destination_path))
                        {
                            File::makeDirectory($destination_path,0777,true,true);
                        }
                        $file->move($destination_path , $final_image_name);

                        $image_arr = [
                            'product_id' => $query->id,
                            'is_thumbnail' => $key==$is_thumbnail ? 1 : 0,
                            'file_name' => $final_image_name,
                            'created_at' => date('Y-m-d H:i:s')
                        ];

                        $product_image = UserProductImage::create($image_arr);
                    }
                }

                if($files=$request->file('document')){
                    foreach($files as $key => $file){
                        $date = date('YmdHis');
                        $no = str_shuffle('123456789023456789034567890456789905678906789078908909000987654321987654321876543217654321654321543214321321211');
                        $random_no = substr($no, 0, 2);
                        $final_document_name = $date.$random_no.'.'.$file->getClientOriginalExtension();
                        $destination_path = public_path('/uploads/products/document');
                        if(!File::exists($destination_path))
                        {
                            File::makeDirectory($destination_path,0777,true,true);
                        }
                        $file->move($destination_path , $final_document_name);

                        $document_arr = [
                            'product_id' => $query->id,
                            'file_name' => $final_document_name,
                            'created_at' => date('Y-m-d H:i:s')
                        ];

                        $product_document = UserProductDocumentation::create($document_arr);
                    }
                }

                if(count($request->price)>0)
                {
                    $i = 0;
                    $attribute_id = [];
                    $attribute_id = $category_attribute->pluck('id')->all();
                    foreach($request->price as $price)
                    {
                        $data = [
                            'product_id' => $query->id,
                            'attribute_id' => count($attribute_id) > 0 ? implode(',',$attribute_id) : NULL,
                            'attribute_name' => count($attr_name) > 0 ? implode(',',$attr_name) : NULL,
                            'sku' => $request->sku[$i],
                            'price' => $price,
                            'discounted_price' =>$request->discounted_price[$i],
                            'quantity' =>$request->quantity[$i],
                            'created_at' => date('Y-m-d H:i:s')
                        ];

                        $user_attribute = UserProductAttribute::create($data);

                        if(count($attribute_id)>0)
                        {
                            $j = 0;
                            foreach($attribute_id as $aid)
                            {
                                $q_data = [
                                    'product_id' => $query->id,
                                    'attribute_id' => $aid,
                                    'attribute_name' => $attr_name[$j],
                                    'attribute_value' => $request->input($attr_name[$j])[$i],
                                    'product_attribute_id' => $user_attribute->id,
                                    'created_at' => date('Y-m-d H:i:s')
                                ];

                                UserProductAttributeValue::create($q_data);

                                $j++;
                            }
                        }
                        else
                        {
                            $q_data = [
                                'product_id' => $query->id,
                                'attribute_id' => NULL,
                                'attribute_name' => 'OnePrice',
                                'attribute_value' => 'OnePrice',
                                'product_attribute_id' => $user_attribute->id,
                                'created_at' => date('Y-m-d H:i:s')
                            ];

                            UserProductAttributeValue::create($q_data);
                        }

                        $i++;
                    }
                }

                DB::commit();
                Session::flash('message', 'Product created successfully!');
                Session::flash('alert-class', 'alert-success');
            }
            else
            {
                DB::rollback();
                Session::flash('message', 'Something went wrong!');
                Session::flash('alert-class', 'alert-danger');
            }

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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

        $current_menu = $this->current_menu;
        $table_name = $this->table_name;
        $decrypt_id = Crypt::decryptString($id);
        //echo $decrypt_id;die;
        $records = DB::table($table_name)
            ->where($table_name.'.id', $decrypt_id)
            ->first();

        $product_categories = DB::table('product_categories')
            ->where('product_categories.status', '=', 1)
            ->where('parent_id',0)
            ->pluck('product_categories.name as product_category_name', 'product_categories.id as product_category_id');

        $product_brands = DB::table('brands')
            ->where('brands.status', '=', 1)
            ->pluck('brands.name as brand_name', 'brands.id as brand_id');

        return view($current_menu.'.edit', [
                'current_menu'=>$current_menu,
                'encrypt_id'=>$id,
                'records' => $records,
                'product_categories' => $product_categories,
                'product_brands' => $product_brands
            ]);


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $current_menu = $this->current_menu;
        $table_name = $this->table_name;
        $decrypt_id = Crypt::decryptString($id);
        $base = $this->base;

        //
        $rules = [
            'product_category' => 'required',
            'product_brand' => 'required',
            'title' => 'required',
            // 'price' => 'required|numeric|min:1',
            // 'discount_price' => 'required|numeric|lte:price|min:1',
            // 'quantity' => 'required|integer|min:1',
            'short_description' => 'required',
            'description' => 'required',
            'image.*' =>'nullable|mimes:jpg,jpeg,png,gif,bmp,svg|max:20000',
            'document.*' => 'nullable|mimes:jpg,jpeg,png,gif,bmp,svg,pdf,mp4|max:50000',
            'sku.*' => 'required',
            'price.*' => 'required|numeric|min:0',
            'discounted_price.*' => 'required|numeric|min:0',
            'quantity.*' => 'required|integer|min:1',
            'rent_price' => 'required_if:is_rent,on|nullable|numeric|min:0',
            'rent_deposit' => 'required_if:is_rent,on|nullable|numeric|min:0'
        ];

        $custom= [
            'price.min' => 'Price Must Be Atleast 1',
            'discount_price.lte' => 'Discount Price Must Be Less Than or Equal to Price',
            'image.*.mimes' => 'Product Image Must be in jpg,jpeg,png,gif,bmp,svg format',
            'image.*.max' => 'Product Image Size Must be Maximum 20MB',
            'document.*.mimes' => 'Document Must be allowed in jpg,jpeg,png,gif,bmp,svg,pdf,mp4 format',
            'document.*.max' => 'Document Must Size Must be Maximum 50MB',
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
            'rent_price.required_if' => 'Rent Price Field is required',
            'rent_deposit.required_if' => 'Rent Deposit Field is required'

        ];

        $validator = Validator::make($request->all(),$rules,$custom);

        if($validator->fails())
        {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ]);
        }

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

        $category_id = [];

        $category_id = [$request->product_category];

        if($request->product_sub_category!=NULL && $request->product_sub_category!='')
        {
            array_push($category_id,$request->product_sub_category);
        }

        if($request->product_sub_sub_category!=NULL && $request->product_sub_category!='')
        {
            array_push($category_id,$request->product_sub_sub_category);
        }
        try{


            DB::beginTransaction();
            $data = [
                'category_id' => implode(',',$category_id),
                'brand_id' => $request->product_brand,
                'product_title' => $request->title,
                // 'price' => $request->price,
                // 'discounted_price' => $request->discount_price,
                'short_description' => $request->short_description,
                'description' => $request->description,
                'specification' => $request->specification,
                // 'quantity' => $request->quantity,
                'in_box' => $request->in_box!=NULL ? $request->in_box : NULL,
                'is_popular' => $request->is_popular!=NULL ? 1 : 0,
                'is_return' => $request->is_return!=NULL ? 1 : 0,
                'is_rent' => $request->is_rent!=NULL ? 1 : 0,
                'rent_price' => $request->is_rent!=NULL ? $request->rent_price : 0,
                'rent_deposit' => $request->is_rent!=NULL ? $request->rent_deposit : 0,
                'updated_at' => date('Y-m-d H:i:s')
            ];

            $query = UserProduct::where($table_name.'.id', $decrypt_id)->update($data);

            if($query)
            {
                $is_thumbnail = !empty($request->is_thumbnail)?$request->is_thumbnail:0;

                $remove_img_arr = $request->remove_img;
                if($remove_img_arr!=NULL && is_array($remove_img_arr) && count($remove_img_arr) > 0)
                {
                    UserProductImage::whereIn('id',$remove_img_arr)->update(
                        [
                            'status'=>'9',
                            'deleted_at' =>date('Y-m-d H:i:s')
                        ]);
                }

                $product_image_arr = $request->product_image;

                if($product_image_arr!=NULL && is_array($product_image_arr) && count($product_image_arr) > 0)
                {
                    $product_image=UserProductImage::whereIn('id',$product_image_arr)->get();

                    foreach($product_image as $key => $item)
                    {
                        UserProductImage::where('id',$item->id)->update(
                            [
                                'is_thumbnail' => $key==$is_thumbnail ? 1 : 0,
                            ]
                        );
                    }
                }


                if($files=$request->file('image')){
                    foreach($files as $key => $file){
                        $date = date('YmdHis');
                        $no = str_shuffle('123456789023456789034567890456789905678906789078908909000987654321987654321876543217654321654321543214321321211');
                        $random_no = substr($no, 0, 2);
                        $final_image_name = $date.$random_no.'.'.$file->getClientOriginalExtension();
                        $destination_path = public_path('/uploads/products/image');
                        if(!File::exists($destination_path))
                        {
                            File::makeDirectory($destination_path,0777,true,true);
                        }
                        $file->move($destination_path , $final_image_name);

                        $image_arr = [
                            'product_id' => $query->id,
                            'is_thumbnail' => $key==$is_thumbnail ? 1 : 0,
                            'file_name' => $final_image_name,
                            'created_at' => date('Y-m-d H:i:s')
                        ];

                        $product_image = UserProductImage::create($image_arr);
                    }
                }

                $remove_doc_arr = $request->remove_doc;
                if($remove_doc_arr!=NULL && is_array($remove_doc_arr) && count($remove_doc_arr) > 0)
                {
                    UserProductDocumentation::whereIn('id',$remove_doc_arr)->update(
                        [
                            'status'=>'9',
                            'deleted_at' =>date('Y-m-d H:i:s')
                        ]);
                }

                if($files=$request->file('document')){
                    foreach($files as $key => $file){
                        $final_document_name = $file->getClientOriginalName();
                        $destination_path = public_path('/uploads/products/document');
                        if(!File::exists($destination_path))
                        {
                            File::makeDirectory($destination_path,0777,true,true);
                        }
                        $file->move($destination_path , $final_document_name);

                        $document_arr = [
                            'product_id' => $query->id,
                            'file_name' => $final_document_name,
                            'created_at' => date('Y-m-d H:i:s')
                        ];

                        $product_document = UserProductDocumentation::create($document_arr);
                    }
                }

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

                            // dd($diff);

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
                Session::flash('message', 'Product updated successfully!');
                Session::flash('alert-class', 'alert-success');
            }
            else
            {
                DB::rollback();
                Session::flash('message', 'Something went wrong!');
                Session::flash('alert-class', 'alert-danger');
            }

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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getChildCategory(Request $request){

        $sub_cat = Helper::getSubCategories($request->get('parent_id'));

        return response()->json([
            'data' => $sub_cat
        ]);

    }


}
