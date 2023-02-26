<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\ProductCategory;
use Auth;
use DataTables;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->current_menu='product_categories';
        $this->table_name='product_categories';
        $this->base = 'admin';
    }

    public function index(Request $request)
    {
        $current_menu = $this->current_menu;
        $table_name = $this->table_name;
        if(Auth::user()->role_id == 1){

            $modules = DB::table('modules')
                ->where('modules.parent_id', '=', 6)
                ->where('modules.show_in_indexpage', '=', 'yes')
                ->where('modules.status', '=', 1)
                ->orderBy('modules.display_order','ASC')
                ->pluck('modules.id as module_id', 'modules.name as module_name');

        } else {

            $modules = DB::table('modules')
                ->join('role_module_mapping', 'role_module_mapping.module_id', '=', 'modules.id')
                ->where('role_module_mapping.role_id', '=', Auth::user()->role_id)
                ->where('role_module_mapping.status', '=', 1)
                ->where('modules.parent_id', '=', 6)
                ->where('modules.show_in_indexpage', '=', 'yes')
                ->where('modules.status', '=', 1)
                ->orderBy('modules.display_order','ASC')
                ->pluck('modules.id as module_id', 'modules.name as module_name');

        }
        $count = ProductCategory::where($table_name.'.status', '!=', 9)
            ->count();
        $records = ProductCategory::where($table_name.'.status', '!=', 9)
            ->orderBy($table_name.'.parent_id', 'asc')
            ->get();
        if ($request->ajax()) {
            $datatables = Datatables::of($records)
                ->addIndexColumn()
                ->editColumn('name', function ($row) {
                    $main_cat_name = 'Main Category';
                    if ($row->parent_id != 0) {
                        $category = ProductCategory::where('id',$row->parent_id)->first();

                        $main_cat_name = $category->name;
                    }
                    return $row->name.' ('.$main_cat_name.')';
                })
                ->editColumn('status', function ($row) {
                    if ($row->status == 1) {
                        return '<span class="badge badge-success">Active</span>';
                    } else {
                        return '<span class="badge badge-warning">Inactive</span>';
                    }
                });
                if (Arr::exists($modules, 'Product-categories-changeStatus') || Arr::exists($modules, 'Product-categories-edit') || Arr::exists($modules, 'Product-categories-delete')) {
                    $datatables = $datatables->addColumn('action', function($row) use ($modules, $table_name, $current_menu) {
                        if (Arr::exists($modules, 'Product-categories-changeStatus')) {
                            if ($row->status == 1) {
                                $action1 = '<button class="btn btn-warning" type="button" onclick="confirmChangeStatusAction(`'.$table_name.'`, '.$row->id.', '.$row->status.');"><i class="nav-icon i-Reset"></i></button> ';
                            } else {
                                $action1 = '<button class="btn btn-success" type="button" onclick="confirmChangeStatusAction(`'.$table_name.'`, '.$row->id.', '.$row->status.');"><i class="nav-icon i-Reset"></i></button> ';
                            }
                        }
                        if (Arr::exists($modules, 'Product-categories-edit')) {
                            $encrypt_id = Crypt::encryptString($row->id);
                            $url = url('admin/'.$current_menu.'/'.$encrypt_id.'/edit');
                            $action2 = '<a href="'.$url.'" class="btn btn-info" type="button"><i class="nav-icon i-Pen-2"></i></a> ';
                        } else {
                            $action2 = ' ';
                        }
                        if (Arr::exists($modules, 'Product-categories-delete')) {
                            $action3 = '<button class="btn btn-danger" type="button" onclick="confirmDeleteAction(`'.$table_name.'`, '.$row->id.');"><i class="nav-icon i-Close-Window"></i></button>';
                        } else {
                            $action3 = ' ';
                        }
                        $action = $action1.$action2.$action3;
                        return $action;
                    });
                }
                if(Arr::exists($modules, 'Product-categories-changeStatus') || Arr::exists($modules, 'Product-categories-edit') || Arr::exists($modules, 'Product-categories-delete')){
                    $datatables = $datatables->rawColumns(['avatar', 'status', 'action'])->make(true);
                } else {
                    $datatables = $datatables->rawColumns(['avatar', 'status'])->make(true);
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
        $table_name = $this->table_name;
        $productCategory = ProductCategory::where($table_name.'.status', '!=', 9)
            ->orderBy($table_name.'.parent_id', 'asc')
            ->whereIn('level',[0,1])
            ->get();

        return view($current_menu.'.create', [
        'current_menu'=>$current_menu,
        'productCategory'=>$productCategory
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
        $current_menu = $this->current_menu;
        $table_name = $this->table_name;
        $base = $this->base;

        $level = 0;
        $validate = $request->validate([
            'name'        => 'required',
            'description' => 'required',
            'image.*'     => 'required|mimes:jpeg,jpg,bmp,png,gif,svg,pdf',
        ]);
        if($request->file('image')){

                $image = $request->file('image');
                $date = date('YmdHis');
                $no = str_shuffle('123456789023456789034567890456789905678906789078908909000987654321987654321876543217654321654321543214321321211');
                $random_no = substr($no, 0, 2);
                $final_image_name = $date.$random_no.'.'.$image->getClientOriginalExtension();

                $destination_path = public_path('/images/product_categories/');
                $image->move($destination_path , $final_image_name);

        }
        DB::beginTransaction();

         $parent_category = DB::table($table_name)->where('id',$request->parent_id)->first();

         if($parent_category)
         {
             if($parent_category->parent_id ==0)
             {
                $level = 1;
             }
             else
             {
                $level = 2;
             }
         }
            $temp_array = [
                'name' => !empty($request->name)?$request->name:'',
                'parent_id'=> !empty($request->parent_id)?$request->parent_id:0,
                'description' => !empty($request->description)?$request->description:NULL,
                'remarks' => !empty($request->remarks)?$request->remarks:NULL,
                'image' => !empty($final_image_name)?$final_image_name:NULL,
                'show_in_menu' => $request->show_menu!=NULL ? 1 : 0,
                'level' => $level,
                'created_at' => date('Y-m-d H:i:s'),
                'status' => 1,
            ];
        $query = ProductCategory::insert($temp_array);
        if ($query)
        {
            DB::commit();
            Session::flash('message', 'Product category created successfully!');
            Session::flash('alert-class', 'alert-success');
        } else {
            DB::rollback();
            Session::flash('message', 'Something went wrong!');
            Session::flash('alert-class', 'alert-danger');
        }
        return redirect()->intended($base.'/'.$current_menu);
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
        $records = DB::table($table_name)
            ->where($table_name.'.id', $decrypt_id)
            ->get();
        $productCategory = ProductCategory::where($table_name.'.status', '!=', 9)
            ->orderBy($table_name.'.parent_id', 'asc')
            ->whereIn('level',[0,1])
            ->get();
        $category = [];
        $i=0;
        foreach($productCategory AS $pcat){
            if($pcat->id != $records[0]->id){
                $category[] = $pcat;
            }
            $i++;
        }

        //dd($category);
        return view($current_menu.'.edit', [
        'current_menu'=>$current_menu,
        'encrypt_id'=>$id,
        'records' => $records,
        'productCategory'=>$category
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

        $level = 0;

        $validate = $request->validate([
            'name'        => 'required',

        ]);
        if($files=$request->file('image')){

                $image = $request->file('image');
                $date = date('YmdHis');
                $no = str_shuffle('123456789023456789034567890456789905678906789078908909000987654321987654321876543217654321654321543214321321211');
                $random_no = substr($no, 0, 2);
                $final_image_name = $date.$random_no.'.'.$image->getClientOriginalExtension();

                $destination_path = public_path('/images/product_categories/');
                $image->move($destination_path , $final_image_name);

        }
        else
        {

            $product_category = $request->product_category;

        }
        DB::beginTransaction();

        $parent_category = DB::table($table_name)->where('id',$request->parent_id)->first();

         if($parent_category)
         {
             if($parent_category->parent_id==0)
             {
                $level = 1;
             }
             else
             {
                $level = 2;
             }
         }
            $temp_array = [
                'name' => !empty($request->name)?$request->name:NULL,
                'parent_id'=> !empty($request->parent_id)?$request->parent_id:0,
                'description' => !empty($request->description)?$request->description:NULL,
                'remarks' => !empty($request->remarks)?$request->remarks:NULL,
                'image' => !empty($final_image_name)?$final_image_name:$product_category,
                'show_in_menu' => $request->show_menu!=NULL ? 1 : 0,
                'status' => $request->status,
                'level' => $level,
                'updated_at' => date('Y-m-d H:i:s'),

            ];
        $query = ProductCategory::where($table_name.'.id', $decrypt_id)->update($temp_array);
        if ($query)
        {
            DB::commit();
            Session::flash('message', 'Product category updated successfully!');
            Session::flash('alert-class', 'alert-success');
        } else {
            DB::rollback();
            Session::flash('message', 'Something went wrong!');
            Session::flash('alert-class', 'alert-danger');
        }
        return redirect()->intended($base.'/'.$current_menu);
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
}
