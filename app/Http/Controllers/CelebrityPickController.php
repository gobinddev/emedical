<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\CelebrityPick;
use Auth;
use DataTables;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;

class CelebrityPickController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->current_menu='celebrity_picks';
        $this->table_name='celebrity_picks';
    }

    public function index(Request $request)
    {
        $current_menu = $this->current_menu;
        $table_name = $this->table_name;
        $count = CelebrityPick::where($table_name.'.status', '!=', 9)
            ->count();
        $records = CelebrityPick::where($table_name.'.status', '!=', 9)
            ->orderBy($table_name.'.id', 'DESC')
            ->get();
        $modules = array();
        // if(Auth::user()->role_id == 1){

        //     $modules = DB::table('modules')
        //         ->where('modules.parent_id', '=', 7)
        //         ->where('modules.show_in_indexpage', '=', 'yes')
        //         ->where('modules.status', '=', 1)
        //         ->orderBy('modules.display_order','ASC')
        //         ->pluck('modules.id as module_id', 'modules.name as module_name');

        // } else {

        //     $modules = DB::table('modules')
        //         ->join('role_module_mapping', 'role_module_mapping.module_id', '=', 'modules.id')
        //         ->where('role_module_mapping.role_id', '=', Auth::user()->role_id)
        //         ->where('role_module_mapping.status', '=', 1)
        //         ->where('modules.parent_id', '=', 7)
        //         ->where('modules.show_in_indexpage', '=', 'yes')
        //         ->where('modules.status', '=', 1)
        //         ->orderBy('modules.display_order','ASC')
        //         ->pluck('modules.id as module_id', 'modules.name as module_name');

        // }
        if ($request->ajax()) {
            $datatables = Datatables::of($records)
                ->addIndexColumn()
                ->editColumn('name', function ($row) {
                    $url= asset('images/celebrity_picks/'.$row->name);
                    return '<img src="'.$url.'" border="0" width="50" height="50" align="center" alt="image" />';
                })
                // ->editColumn('is_banner', function ($row) use ($table_name) {
                //     $checked = ($row->is_banner == 'yes') ? 'checked' : '' ;
                //     return '<input '.$checked.' class="form-control" id="is-banner" type="radio" name="is_banner" onchange="myFunction(`'.$table_name.'`, '.$row->id.', `'.$row->name.'`);">';
                //})
                ->editColumn('status', function ($row) {
                    if ($row->status == 1) {
                        return '<span class="badge badge-success">Active</span>';
                    } else {
                        return '<span class="badge badge-warning">Inactive</span>';
                    }
                });
                if (true) {
                    $datatables = $datatables->addColumn('action', function($row) use ($modules, $table_name, $current_menu) {
                        if (true) {
                            if ($row->status == 1) {
                                $action1 = '<button class="btn btn-warning" type="button" onclick="confirmChangeStatusAction(`'.$table_name.'`, '.$row->id.', '.$row->status.');"><i class="nav-icon i-Reset"></i></button> ';
                            } else {
                                $action1 = '<button class="btn btn-success" type="button" onclick="confirmChangeStatusAction(`'.$table_name.'`, '.$row->id.', '.$row->status.');"><i class="nav-icon i-Reset"></i></button> ';
                            }
                        }
                        if (true) {
                            $action3 = '<button class="btn btn-danger" type="button" onclick="confirmDeleteAction(`'.$table_name.'`, '.$row->id.');"><i class="nav-icon i-Close-Window"></i></button>';
                        } else {
                            $action3 = ' ';
                        } 
                          

                         if (true) {
                            $encrypt_id = Crypt::encryptString($row->id);
                            $url = url($current_menu.'/'.$encrypt_id.'/edit');
                            $action4 = '&nbsp;<a href="'.$url.'" class="btn btn-info" type="button"><i class="nav-icon i-Pen-2"></i></a>';
                        } else {
                            $action4 = ' ';
                        } 


                        $action = $action1.$action3.$action4;
                        return $action; 
                    });
                }
                if(true){
                    $datatables = $datatables->rawColumns(['name', 'is_banner', 'status', 'action'])->make(true);
                } else {
                    $datatables = $datatables->rawColumns(['name', 'is_banner', 'status'])->make(true);
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
            ->where('product_categories.status', '=', 1)
            ->pluck('product_categories.name as product_category_name', 'product_categories.id as product_category_id');
        return view($current_menu.'.create', [
        'current_menu'=>$current_menu,
        'product_categories'=>$product_categories,
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
        $validate = $request->validate([
            'image.*' => 'required|mimes:jpeg,jpg,bmp,png,gif,svg,pdf',
        ]);
        if($files=$request->file('image')){
            foreach($files as $key => $file){
                $date = date('YmdHis').$key;
                $no = str_shuffle('123456789023456789034567890456789905678906789078908909000987654321987654321876543217654321654321543214321321211');
                $random_no = substr($no, 0, 2);
                $final_image_name = $date.$random_no.'.'.$file->getClientOriginalExtension();
                $final_image_name_array[] = $final_image_name;
                $destination_path = public_path('/images/celebrity_picks/');
                $file->move($destination_path , $final_image_name);
            }
        }
        DB::beginTransaction();
        foreach($final_image_name_array as $key => $value){
            $out['name'] = $value;
            $out['is_banner'] = 'no';
            $out['created_at'] = date('Y-m-d H:i:s');
            $out['updated_at'] = date('Y-m-d H:i:s');
            $out['status'] = 1;
            $final_out[] = $out;
        }
        $query = CelebrityPick::insert($final_out);
        if ($query) 
        {
            DB::commit();
            Session::flash('message', 'Celebrity Picks created successfully!');
            Session::flash('alert-class', 'alert-success');
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
        $records = DB::table($table_name)
            ->where($table_name.'.id', $decrypt_id)
            ->first();
        
        return view($current_menu.'.edit', [
        'current_menu'=>$current_menu,
        'encrypt_id'=>$id,
        'records' => $records,
        
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
        $validate = $request->validate([
            'name.*' => 'required|mimes:jpeg,jpg,bmp,png,gif,svg',
        ]);
        if($request->file('name')){

                $image = $request->file('name');
           
                $date = date('YmdHis');
                $no = str_shuffle('123456789023456789034567890456789905678906789078908909000987654321987654321876543217654321654321543214321321211');
                $random_no = substr($no, 0, 2);
                $final_image_name = $date.$random_no.'.'.$image->getClientOriginalExtension();
               // $final_image_name_array[] = $final_image_name;
                $destination_path = public_path('/images/celebrity_picks/');
                $image->move($destination_path , $final_image_name);
           
        }
        DB::beginTransaction();
        
            $out['name'] = $final_image_name;
            $out['is_banner'] = 'no';
            $out['created_at'] = date('Y-m-d H:i:s');
            $out['updated_at'] = date('Y-m-d H:i:s');
            $out['status'] = 1;
       
     $query =    CelebrityPick::where($table_name.'.id', $decrypt_id)->update($out);
        if ($query) 
        {
            DB::commit();
            Session::flash('message', 'Celebrity Picks Updated successfully!');
            Session::flash('alert-class', 'alert-success');
        } else {
            DB::rollback();
            Session::flash('message', 'Something went wrong!');
            Session::flash('alert-class', 'alert-danger');
        }
        return redirect()->intended($current_menu);
    }
        // $query_1 = Product::where($table_name.'.id', $decrypt_id)->update($temp_array_1);
       

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
