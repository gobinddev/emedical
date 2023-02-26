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

class ProductController extends Controller
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
    }

    public function index(Request $request)
    {
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
                'count' => $count,
                'records' => $records,
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $current_menu = $this->current_menu;
        $product_categories = DB::table('product_categories')
            ->where('product_categories.status', '=', 1)->where('parent_id','=',0)
            ->pluck('product_categories.name as product_category_name', 'product_categories.id as product_category_id');
      
      $product_brands = DB::table('brands')
            ->where('brands.status', '=', 1)
            ->pluck('brands.name as brand_name', 'brands.id as brand_id');
      
        return view($current_menu.'.create', [
        'current_menu'=>$current_menu,
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
        die('fjdg gfdsghgj');
        $current_menu = $this->current_menu;
        $table_name = $this->table_name;
        $validate = $request->validate([
            'product_category_id' => 'required',
            'product_code' => 'required',
            'product_name' => 'required',
            'image.*' => 'required|mimes:jpeg,jpg,bmp,png,gif,svg,pdf',
            'image_description.*' => 'required',
            'video' => 'mimes:mp4,x-flv,x-mpegURL,MP2T,3gpp,quicktime,x-msvideo,x-ms-wmv'
        ]);
        $image_description = $request->image_description;
        $is_popular = ($request->is_popular) ? 'yes' : 'no' ;
        $is_thumbnail = ($request->is_thumbnail) ? $request->is_thumbnail : 0 ;
        if($files=$request->file('image')){
            foreach($files as $key => $file){
                if ($key == $is_thumbnail) {
                    $final_image_name = $file->getClientOriginalName();
                    $final_image_name_array[] = $final_image_name.'|'.'yes';
                    $destination_path = public_path('/images/products/');
                    $file->move($destination_path , $final_image_name);
                } else {
                    $final_image_name = $file->getClientOriginalName();
                    $final_image_name_array[] = $final_image_name.'|'.'no';
                    $destination_path = public_path('/images/products/');
                    $file->move($destination_path , $final_image_name);
                }
            }
        }
        if($file=$request->file('video'))
        {
            $final_video_name = $file->getClientOriginalName();
            $destination_path = public_path('/videos/products/');
            $file->move($destination_path , $final_video_name);
        }
        DB::beginTransaction();
        $temp_array_1 = [
            'product_category_id' => !empty($request->product_category_id)?$request->product_category_id:0,
            'product_code' => !empty($request->product_code)?$request->product_code:'NA',
            'name' => !empty($request->product_name)?$request->product_name:'NA',
            'is_popular' => $is_popular,
            'colour' => !empty($request->colour)?$request->colour:'',
            'height' => !empty($request->height)?$request->height:'',
            'width' => !empty($request->width)?$request->width:'',
            'gross_weight' => !empty($request->gross_weight)?$request->gross_weight:'',
            'gross_weight' => !empty($request->gross_weight)?$request->gross_weight:'',
            'dia_wt' => !empty($request->dia_wt)?$request->dia_wt:'',
            'description' => !empty($request->description)?$request->description:'NA',
            'image' => implode(",",$final_image_name_array),
            'video' => !empty($final_video_name)?$final_video_name:'NA',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'status' => 1,
        ];
        $query_1 = Product::create($temp_array_1);
        if ($query_1)
        {
            $insert_id = $query_1->id;
            foreach($final_image_name_array as $key => $value){
                $explode_array = explode("|",$value);
                $out['product_id'] = $insert_id;
                $out['name'] = $explode_array[0];
                $out['is_thumbnail'] = $explode_array[1];
                $out['description'] = $image_description[$key];
                $out['created_at'] = date('Y-m-d H:i:s');
                $out['updated_at'] = date('Y-m-d H:i:s');
                $out['status'] = 1;
                $final_out[] = $out;
            }
            $query_2 = ProductImage::insert($final_out);
                if ($query_2)
                {
                    DB::commit();
                    Session::flash('message', 'Product created successfully!');
                    Session::flash('alert-class', 'alert-success');
                } else {
                    DB::rollback();
                    Session::flash('message', 'Something went wrong!');
                    Session::flash('alert-class', 'alert-danger');
                }
        } else {
            DB::rollback();
            Session::flash('message', 'Something went wrong!');
            Session::flash('alert-class', 'alert-danger');
        }
        return redirect()->intended($current_menu);
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
        $current_menu = $this->current_menu;
        $table_name = $this->table_name;
        $decrypt_id = Crypt::decryptString($id);
        //echo $decrypt_id;die;
        $records = DB::table($table_name)
            ->where($table_name.'.id', $decrypt_id)
            ->first();

        $product_image = DB::table('product_images')
                         ->where('product_images'.'.product_id', $decrypt_id)
                         ->where('product_images'.'.status', '!=', 0)
                         ->get();

       // print_r($product_image);die;
        $product_categories = DB::table('product_categories')
            ->where('product_categories.status', '=', 1)
            ->pluck('product_categories.name as product_category_name', 'product_categories.id as product_category_id');
        return view($current_menu.'.edit', [
        'current_menu'=>$current_menu,
        'encrypt_id'=>$id,
        'records' => $records,
        'product_categories' => $product_categories,
        'product_image'      => $product_image,
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

        // dd($request->file('image'));
        $current_menu = $this->current_menu;
        $table_name = $this->table_name;
        $decrypt_id = Crypt::decryptString($id);
        $validate = $request->validate([
            'product_category_id' => 'required',
            'product_code' => 'required',
            'product_name' => 'required',
            //'image.*' => 'required|mimes:jpeg,jpg,bmp,png,gif,svg,pdf',
            //'image_description.*' => 'required',
            //'video' => 'mimes:mp4,x-flv,x-mpegURL,MP2T,3gpp,quicktime,x-msvideo,x-ms-wmv'
        ]);
        $image_description = $request->image_description;
        $is_popular = ($request->is_popular) ? 'yes' : 'no' ;
        $is_thumbnail = !empty($request->is_thumbnail)?$request->is_thumbnail:0;
        if($files=$request->file('image')){
            foreach($files as $key => $file){
                if ($key == $is_thumbnail) {


                    $final_image_name = $file->getClientOriginalName();
                    $t = time().$final_image_name;
                    $final_image_name_array[] = $t ;
                    $destination_path = public_path('/images/products/');
                    $file->move($destination_path , $t);
                } else {
                    $final_image_name = $file->getClientOriginalName();
                    $t = time().$final_image_name;
                    $final_image_name_array[] = $t ;
                    $destination_path = public_path('/images/products/');
                    $file->move($destination_path , $t);
                }

            }

            // dd($request->file('file')->getError());

        }
        else
        {
            foreach($request->product_image as $file){

             $final_image_name = $file;
             $final_image_name_array[] = $final_image_name;

         }

        }
        if($file=$request->file('video'))
        {
            $final_video_name = $file->getClientOriginalName();
            $destination_path = public_path('/videos/products/');
            $file->move($destination_path , $final_video_name);
        }
        DB::beginTransaction();
        ProductImage::where('product_images.product_id', $decrypt_id)->update(['status' => 0]);
        $product_image_array = ProductImage::where('product_images.product_id', $decrypt_id)
            ->where('product_images.status', '=', 0)
            ->pluck('product_images.id as product_image_id', 'product_images.name as product_image_name');
        $temp_array_1 = [
            'product_category_id' => !empty($request->product_category_id)?$request->product_category_id:0,
            'product_code' => !empty($request->product_code)?$request->product_code:'NA',
            'name' => !empty($request->product_name)?$request->product_name:'NA',
            'is_popular' => $is_popular,
            'colour' => !empty($request->colour)?$request->colour:'',
            'height' => !empty($request->height)?$request->height:'',
            'width' => !empty($request->width)?$request->width:'',
            'gross_weight' => !empty($request->gross_weight)?$request->gross_weight:'',
            'dia_wt' => !empty($request->dia_wt)?$request->dia_wt:'',
            'description' => !empty($request->description)?$request->description:'',
            'image' => implode(",",$final_image_name_array),
            'video' => !empty($final_video_name)?$final_video_name:'NA',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'status' => 1,
        ];
        $query_1 = Product::where($table_name.'.id', $decrypt_id)->update($temp_array_1);
        if ($query_1) {
            foreach ($final_image_name_array as $key => $value) {
                $explode_array = explode("|",$value);
                if (Arr::exists($product_image_array, $explode_array[0])) {
                    $final_out = [

                        'description' => $image_description[$key],
                        'updated_at' => date('Y-m-d H:i:s'),
                        'status' => 1,
                    ];
                    $query_2 = ProductImage::where('product_images.name', $explode_array[0])->where('product_images.product_id', $decrypt_id)->update($final_out);
                    if ($query_2)
                    {
                        DB::commit();
                        Session::flash('message', 'Product updated successfully!');
                        Session::flash('alert-class', 'alert-success');
                    } else {
                        DB::rollback();
                        Session::flash('message', 'Something went wrong!');
                        Session::flash('alert-class', 'alert-danger');
                    }
                } else {
                    $final_out = [
                        'product_id' => $decrypt_id,
                        'name' => $explode_array[0],

                        'description' => $image_description[$key],
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s'),
                        'status' => 1,
                    ];
                    $query_3 = ProductImage::create($final_out);
                    if ($query_3)
                    {
                        DB::commit();
                        Session::flash('message', 'Product updated successfully!');
                        Session::flash('alert-class', 'alert-success');
                    } else {
                        DB::rollback();
                        Session::flash('message', 'Something went wrong!');
                        Session::flash('alert-class', 'alert-danger');
                    }
                }
            }
        } else {
            DB::rollback();
            Session::flash('message', 'Something went wrong!');
            Session::flash('alert-class', 'alert-danger');
        }
        return redirect()->intended($current_menu);
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


    public function showCatalogue(Request $request,$id)
    {


        $current_menu = $this->current_menu;

        $decrypt_id = Crypt::decryptString($id);

        $count =  DB::table('product_catalogue')
                  ->count();

        $t = 'product_catalogue';

        $records = DB::table('product_catalogue')
                   ->select('product_catalogue.*')
                   ->orderBy('product_catalogue'.'.id', 'DESC')
                   ->get();

        if(Auth::user()->role_id == 1){

            $modules = DB::table('modules')
                ->where('modules.parent_id', '=', 7)
                ->where('modules.show_in_indexpage', '=', 'yes')
                ->where('modules.status', '=', 1)
                ->orderBy('modules.display_order','ASC')
                ->pluck('modules.id as module_id', 'modules.name as module_name');

        } else {

            $modules = DB::table('modules')
                ->join('role_module_mapping', 'role_module_mapping.module_id', '=', 'modules.id')
                ->where('role_module_mapping.role_id', '=', Auth::user()->role_id)
                ->where('role_module_mapping.status', '=', 1)
                ->where('modules.parent_id', '=', 7)
                ->where('modules.show_in_indexpage', '=', 'yes')
                ->where('modules.status', '=', 1)
                ->orderBy('modules.display_order','ASC')
                ->pluck('modules.id as module_id', 'modules.name as module_name');

        }
        if ($request->ajax()) {
            $datatables = Datatables::of($records)
                ->addIndexColumn()
                ->editColumn('status', function ($row) {
                    if ($row->status == 1) {
                        return '<span class="badge badge-success">Active</span>';
                    } else {
                        return '<span class="badge badge-warning">Inactive</span>';
                    }
                })

                ->editColumn('catalogue_link', function($row) {


                      $url= asset('images/catalogue/'.$row->image);
                      $catalogue_link = '<a href="'.$url.'">Catalogue Link</a>';

                      return "<a href='$url'>Catalogue Link</a>";

                })->escapeColumns('catalogue_link');


                if (Arr::exists($modules, 'catalogue-changeStatus') || Arr::exists($modules, 'catalogue-edit') || Arr::exists($modules, 'catalogue-delete')) {
                    $datatables = $datatables->addColumn('action', function($row) use ($modules, $t, $current_menu) {
                        if (Arr::exists($modules, 'catalogue-changeStatus')) {
                            if ($row->status == 1) {
                                $action1 = '<button class="btn btn-warning" type="button" onclick="confirmChangeStatusAction(`'.'product_catalogue'.'`, '.$row->id.', '.$row->status.');"><i class="nav-icon i-Reset"></i></button> ';
                            } else {
                                $action1 = '<button class="btn btn-success" type="button" onclick="confirmChangeStatusAction(`'.'product_catalogue'.'`, '.$row->id.', '.$row->status.');"><i class="nav-icon i-Reset"></i></button> ';
                            }
                        }
                        if (Arr::exists($modules, 'catalogue-edit')) {
                            $encrypt_id = Crypt::encryptString($row->id);
                            $url = url($current_menu.'/catalogue_edit/'.$encrypt_id);
                            $action2 = '<a href="'.$url.'" class="btn btn-info" type="button"><i class="nav-icon i-Pen-2"></i></a> ';
                        } else {
                            $action2 = ' ';
                        }
                        if (Arr::exists($modules, 'catalogue-delete')) {
                            $action3 = '<button class="btn btn-danger" type="button" onclick="confirmDeleteAction(`'.'product_catalogue'.'`, '.$row->id.');"><i class="nav-icon i-Close-Window"></i></button>';
                        } else {
                            $action3 = ' ';
                        }


                        $action = $action1.$action2.$action3;
                        return $action;
                    });
                }
                if(Arr::exists($modules, 'catalogue-changeStatus') || Arr::exists($modules, 'catalogue-edit') || Arr::exists($modules, 'catalogue-delete')){
                    $datatables = $datatables->rawColumns(['avatar', 'status', 'action'])->make(true);
                } else {
                    $datatables = $datatables->rawColumns(['avatar', 'status'])->make(true);
                }
        return $datatables;
        }

        return view($current_menu.'.catalogue_list', [
        'current_menu'=>$current_menu,
        'table_name'=>'product_catalogue',
        'modules' => $modules,
        'count' => $count,
        'records' => $records,
        'id'=>$id

        ]);



    }


    public function catalogueCreate($id)
    {

        $current_menu = $this->current_menu;

        $decrypt_id = Crypt::decryptString($id);

        //echo $decrypt_id;die;

        return view($current_menu.'.catalogue_create', [
        'current_menu'=>$current_menu,
        'product_id' => $decrypt_id,

        ]);
    }

    public function catalogueStore(Request $request)
    {
        $current_menu = $this->current_menu;

        $validate = $request->validate([
            'image' => 'required|mimes:jpeg,jpg,bmp,png,gif',
        ]);


        if($request->file('image')){

                $file =$request->file('image');
                $date = date('YmdHis');
                $no = str_shuffle('123456789023456789034567890456789905678906789078908909000987654321987654321876543217654321654321543214321321211');
                $random_no = substr($no, 0, 2);
                $final_image_name = $date.$random_no.'.'.$file->getClientOriginalExtension();

                $destination_path = public_path('/images/catalogue/');
                $file->move($destination_path , $final_image_name);

        }
        DB::beginTransaction();

            $out['image']      = $final_image_name;
            $out['product_id'] = $request->product_id;
            $out['created_at'] = date('Y-m-d H:i:s');
            $out['updated_at'] = date('Y-m-d H:i:s');
            $final_out[]       = $out;

        $query = DB::table('product_catalogue')
                 ->insert($final_out);
        if ($query)
        {
            DB::commit();
            Session::flash('message', 'Slider Images created successfully!');
            Session::flash('alert-class', 'alert-success');
        } else {
            DB::rollback();
            Session::flash('message', 'Something went wrong!');
            Session::flash('alert-class', 'alert-danger');
        }
        return redirect()->intended($current_menu);
    }


    public function catalogueEdit($id)
    {
        $current_menu = $this->current_menu;
        $decrypt_id = Crypt::decryptString($id);
        $records = DB::table('product_catalogue')
                  ->where('product_catalogue'.'.id', $decrypt_id)
                  ->first();

        return view($current_menu.'.catalogue_edit', [
        'current_menu'=>$current_menu,
        'decrypt_id'=>$decrypt_id,
        'records' => $records,

        ]);
    }


     public function catalogueUpdate(Request $request)
    {
        $current_menu = $this->current_menu;


        $validate = $request->validate([
            'image' => 'required|mimes:jpeg,jpg,bmp,png,gif',
        ]);
        if($request->file('image')){

                $file =$request->file('image');
                $date = date('YmdHis');
                $no = str_shuffle('123456789023456789034567890456789905678906789078908909000987654321987654321876543217654321654321543214321321211');
                $random_no = substr($no, 0, 2);
                $final_image_name = $date.$random_no.'.'.$file->getClientOriginalExtension();

                $destination_path = public_path('/images/catalogue/');
                $file->move($destination_path , $final_image_name);

        }
        DB::beginTransaction();

            $out['image']      = $final_image_name;
            $out['created_at'] = date('Y-m-d H:i:s');
            $out['updated_at'] = date('Y-m-d H:i:s');
            $final_out[] = $out;

        $query =   DB::table('product_catalogue')
                   ->where('id',$request->post('id'))
                   ->update($out);

        if ($query)
        {
            DB::commit();
            Session::flash('message', 'Slider Images Updated successfully!');
            Session::flash('alert-class', 'alert-success');
        } else {
            DB::rollback();
            Session::flash('message', 'Something went wrong!');
            Session::flash('alert-class', 'alert-danger');
        }
        return redirect()->intended($current_menu);
    }
    
     public function getChildCategory(Request $request)
     {

        $sub_cat = Helper::getSubCategories($request->get('parent_id'));

        return response()->json([
            'data' => $sub_cat
        ]);

    }


}
