<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Role;
use Auth;
use DataTables;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->current_menu='roles';
        $this->table_name='roles';
        $this->base = 'admin';
    }

    public function index(Request $request)
    {
        $current_menu = $this->current_menu;
        $table_name = $this->table_name;
        $base = $this->base;
        $perpage = !empty($request->perpage) ? $request->perpage : 10;
        if(Auth::user()->role_id == 1){

            $modules = DB::table('modules')
                ->where('modules.parent_id', '=', 3)
                ->where('modules.show_in_indexpage', '=', 'yes')
                ->where('modules.status', '=', 1)
                ->orderBy('modules.display_order','ASC')
                ->pluck('modules.id as module_id', 'modules.name as module_name');

        } else {

            $modules = DB::table('modules')
                ->join('role_module_mapping', 'role_module_mapping.module_id', '=', 'modules.id')
                ->where('role_module_mapping.role_id', '=', Auth::user()->role_id)
                ->where('role_module_mapping.status', '=', 1)
                ->where('modules.parent_id', '=', 3)
                ->where('modules.show_in_indexpage', '=', 'yes')
                ->where('modules.status', '=', 1)
                ->orderBy('modules.display_order','ASC')
                ->pluck('modules.id as module_id', 'modules.name as module_name');

        }
        $count = Role::where($table_name.'.id', '!=', 1)
            ->where($table_name.'.id', '!=', 4)
            ->where($table_name.'.id', '!=', Auth::user()->role_id)
            ->where($table_name.'.status', '!=', 9)
            ->count();
        $records = Role::where($table_name.'.id', '!=', 1)
            ->where($table_name.'.id', '!=', 4)
            ->where($table_name.'.id', '!=', Auth::user()->role_id)
            ->where($table_name.'.status', '!=', 9)
            ->orderBy($table_name.'.id', 'DESC');
            if(!empty($request->id))
            {
                $records = $records->where($table_name.'.id', '=', $request->id)->paginate($perpage);
            }
            else
            {
                $records = $records->paginate($perpage);
            }
        if ($request->ajax()){
            return view($current_menu.'.ajax', [
            'current_menu'=>$current_menu,
            'table_name'=>$table_name,
            'modules' => $modules,
            'count' => $count,
            'records' => $records,
            'perpage' => $perpage,
            ]);
        } else {
            return view($current_menu.'.index', [
            'current_menu'=>$current_menu,
            'table_name'=>$table_name,
            'modules' => $modules,
            'count' => $count,
            'records' => $records,
            'perpage' => $perpage,
            ]);
        }
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $current_menu = $this->current_menu;
        return view($current_menu.'.create', [
        'current_menu'=>$current_menu,
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
        $validate = $request->validate([
            'name'         => 'required|unique:roles|regex:/^[a-zA-Z\s]+$/',
            'display_name' => 'required|regex:/^[a-zA-Z\s]+$/',
        ]);
        DB::beginTransaction();
            $temp_array = [
                'name' => !empty($request->name)?$request->name:'NA',
                'display_name' => !empty($request->display_name)?$request->display_name:'NA',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'status' => !empty($request->status)?$request->status:0,
            ];
        $query = DB::table($table_name)->insert($temp_array);
        if ($query)
        {
            DB::commit();
            Session::flash('message', 'Role created successfully!');
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
        $base = $this->base;
        $decrypt_id = Crypt::decryptString($id);
        $validate = $request->validate([
            'name' => 'required|regex:/^[a-zA-Z\s]+$/',
            'display_name' => 'required|regex:/^[a-zA-Z\s]+$/',
        ]);
        DB::beginTransaction();
            $temp_array = [
                'name' => !empty($request->name)?$request->name:'NA',
                'display_name' => !empty($request->display_name)?$request->display_name:'NA',
                'updated_at' => date('Y-m-d H:i:s'),
                'status' => !empty($request->status)?$request->status:0,
            ];
        $query = DB::table($table_name)->where($table_name.'.id', $decrypt_id)->update($temp_array);
        if ($query)
        {
            DB::commit();
            Session::flash('message', 'Role updated successfully!');
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
    /*
    AJAX request
    */
    public function getRoles(Request $request){
        $current_menu = $this->current_menu;
        $table_name = $this->table_name;
        $search = $request->search;

        $roles = Role::select('id','name')
            ->where($table_name.'.id', '!=', 1)
            ->where($table_name.'.id', '!=', 4)
            ->where($table_name.'.id', '!=', Auth::user()->role_id)
            ->where($table_name.'.status', '!=', 9)
            ->where('name', 'like', '%' .$search . '%')
            ->orderby('name','asc')
            ->limit(5)
            ->get();

        $response = array();
        foreach($roles as $value){
         $response[] = array("value"=>$value->id,"label"=>$value->name);
        }
    return response()->json($response);
    }
    public function permissions($id)
    {
        $current_menu = $this->current_menu;
        $table_name = $this->table_name;
        $decrypt_id = Crypt::decryptString($id);
        $modules = DB::table('modules')
            ->where('modules.parent_id', '=', 0)
            ->where('modules.show_in_permissions', '=', 'yes')
            ->where('modules.status', '=', 1)
            ->orderBy('modules.display_order','ASC')
            ->get();
        foreach ($modules as $key => $value) {
            $out['id'] = $value->id;
            $out['name'] = $value->name;
            $out['sub_modules'] = DB::table('modules')
                                    ->where('modules.parent_id', '=', $value->id)
                                    ->where('modules.show_in_permissions', '=', 'yes')
                                    ->where('modules.status', '=', 1)
                                    ->orderBy('modules.display_order','ASC')
                                    ->pluck('modules.name as sub_module_name', 'modules.id as sub_module_id')
                                    ->toArray();
            $final_out[] = $out;
        }
        $role_module_mapping_array = DB::table('role_module_mapping')
                                        ->where('role_module_mapping.role_id', $decrypt_id)
                                        ->where('role_module_mapping.status', '=', 1)
                                        ->pluck('role_module_mapping.role_id as role_id', 'role_module_mapping.module_id as module_id');
        return view($current_menu.'.permissions', [
        'current_menu'=>$current_menu,
        'encrypt_id'=>$id,
        'final_out' => $final_out,
        'role_module_mapping_array' => $role_module_mapping_array,
        ]);
    }
    public function update_permissions(Request $request, $id)
    {
        $current_menu = $this->current_menu;
        $table_name = $this->table_name;
        $base = $this->base;
        $decrypt_id = Crypt::decryptString($id);
        $module_id_array = [];
        if($request->module_id!=NULL)
        {
            if($request->sub_module_id!=NULL)
                $module_id_array = array_merge($request->module_id, $request->sub_module_id);
            else
                $module_id_array = $request->module_id;
        }
        DB::beginTransaction();
        DB::table('role_module_mapping')->where('role_module_mapping.role_id', $decrypt_id)->update(['status' => 0]);
        $role_module_mapping_array = DB::table('role_module_mapping')
                                        ->where('role_module_mapping.role_id', $decrypt_id)
                                        ->where('role_module_mapping.status', '=', 0)
                                        ->pluck('role_module_mapping.role_id as role_id', 'role_module_mapping.module_id as module_id');
        if(count($module_id_array)>0)
        {
            foreach ($module_id_array as $key => $value) {
                if (Arr::exists($role_module_mapping_array, $value)) {
                    $query1 = DB::table('role_module_mapping')->where('role_module_mapping.module_id', $value)->update(['status' => 1]);
                    if ($query1)
                    {
                        DB::commit();
                        Session::flash('message', 'Permissions updated successfully!');
                        Session::flash('alert-class', 'alert-success');
                    } else {
                        DB::rollback();
                        Session::flash('message', 'Something went wrong!');
                        Session::flash('alert-class', 'alert-danger');
                    }
                } else {
                    $query2 = DB::table('role_module_mapping')->insert(['role_id' => $decrypt_id, 'module_id' => $value, 'status' => 1]);
                    if ($query2)
                    {
                        DB::commit();
                        Session::flash('message', 'Permissions updated successfully!');
                        Session::flash('alert-class', 'alert-success');
                    } else {
                        DB::rollback();
                        Session::flash('message', 'Something went wrong!');
                        Session::flash('alert-class', 'alert-danger');
                    }
                }
            }
        }
        else
        {
            Session::flash('message', 'Permissions updated successfully!');
            Session::flash('alert-class', 'alert-success');
        }
        return redirect()->intended($base.'/'.$current_menu);
    }
}
