<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use Auth;
use DataTables;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->current_menu='users';
        $this->table_name='users';
        $this->base = 'admin';
    }
    public function index(Request $request)
    {
        $current_menu = $this->current_menu;
        $table_name = $this->table_name;
        if(Auth::user()->role_id == 1){

            $modules = DB::table('modules')
                ->where('modules.parent_id', '=', 2)
                ->where('modules.show_in_indexpage', '=', 'yes')
                ->where('modules.status', '=', 1)
                ->orderBy('modules.display_order','ASC')
                ->pluck('modules.id as module_id', 'modules.name as module_name');

        } else {

            $modules = DB::table('modules')
                ->join('role_module_mapping', 'role_module_mapping.module_id', '=', 'modules.id')
                ->where('role_module_mapping.role_id', '=', Auth::user()->role_id)
                ->where('role_module_mapping.status', '=', 1)
                ->where('modules.parent_id', '=', 2)
                ->where('modules.show_in_indexpage', '=', 'yes')
                ->where('modules.status', '=', 1)
                ->orderBy('modules.display_order','ASC')
                ->pluck('modules.id as module_id', 'modules.name as module_name');

        }
        $count = User::leftJoin('roles', 'roles.id', '=', 'users.role_id')
            ->where($table_name.'.role_id', '!=', 1)
            // ->where($table_name.'.role_id', '!=', 2)
            ->where($table_name.'.status', '!=', 9)
            ->count();

        $records = User::leftJoin('roles', 'roles.id', '=', 'users.role_id')
            ->select('users.*', 'users.name as full_name', 'roles.display_name as display_name')
            ->where($table_name.'.role_id', '!=', 1)
            // ->where($table_name.'.role_id', '!=', 2)
            ->where($table_name.'.status', '!=', 9)
            ->orderBy($table_name.'.id', 'DESC')
            ->get();
        if ($request->ajax()) {

            $datatables = Datatables::of($records)
                ->addIndexColumn()
                ->addColumn('avatar', function ($row) {
                    $url= asset('images/profile/'.$row->image);
                    return '<img src="'.$url.'" border="0" width="50" height="50" align="center" alt="image" />';
                })
                ->editColumn('status', function ($row) {
                    if ($row->status == 1) {
                        return '<span class="badge badge-success">Active</span>';
                    } else {
                        return '<span class="badge badge-warning">Inactive</span>';
                    }
                });
                if (Arr::exists($modules, 'Users-changeStatus') || Arr::exists($modules, 'Users-edit') || Arr::exists($modules, 'Users-delete')) {
                    $datatables = $datatables->addColumn('action', function($row) use ($modules, $table_name) {
                        if (Arr::exists($modules, 'Users-changeStatus')) {
                            if ($row->status == 1) {
                                $action1 = '<button class="btn btn-warning" type="button" onclick="confirmChangeStatusAction(`'.$table_name.'`, '.$row->id.', '.$row->status.');"><i class="nav-icon i-Reset"></i></button> ';
                            } else {
                                $action1 = '<button class="btn btn-success" type="button" onclick="confirmChangeStatusAction(`'.$table_name.'`, '.$row->id.', '.$row->status.');"><i class="nav-icon i-Reset"></i></button> ';
                            }
                        }
                        if (Arr::exists($modules, 'Users-edit')) {
                                $encrypt_id = Crypt::encryptString($row->id);
                                $url = url('admin/users/'.$encrypt_id.'/edit');
                                $action2 = '<a href="'.$url.'" class="btn btn-info" type="button"><i class="nav-icon i-Pen-2"></i></a> ';
                        } else {
                            $action2 = ' ';
                        }
                        if (Arr::exists($modules, 'Users-delete')) {
                                $action3 = '<button class="btn btn-danger" type="button" onclick="confirmDeleteAction(`'.$table_name.'`, '.$row->id.');"><i class="nav-icon i-Close-Window"></i></button>';
                        } else {
                            $action3 = ' ';
                        }  
                        $action = $action1.$action2.$action3;
                        return $action; 
                    });
                }
                if(Arr::exists($modules, 'Users-changeStatus') || Arr::exists($modules, 'Users-edit') || Arr::exists($modules, 'Users-delete')){
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
    public function create(Request $request)
    {
 
       
        
        $current_menu = $this->current_menu;
        $roles = DB::table('roles')
            ->where('roles.status', '=', 1)
            ->where('roles.id','!=',1)
            ->pluck('roles.name as role_display_name', 'roles.id as role_id');
        return view($current_menu.'.create', [
        'current_menu'=>$current_menu,
        'roles'=>$roles,
        'type'=>$request->type,
       
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
            'name' => 'required|regex:/^[a-zA-Z\s]+$/',
            'email' => 'required|email:rfc,dns|unique:users,email',
            'password' => 'required|min:8',
            'phone_number' => 'required|min:10|max:10|regex:/^[0-9]+$/',
            'role' => 'required',
            'image' => 'required|mimes:jpeg,jpg,bmp,png',
        ]);
        
        if($file=$request->file('image'))
        {
            $date = date('YmdHis');
            $no = str_shuffle('123456789023456789034567890456789905678906789078908909000987654321987654321876543217654321654321543214321321211');
            $random_no = substr($no, 0, 2);
            $final_image_name = $date.$random_no.'.'.$file->getClientOriginalExtension();
            $destination_path = public_path('/images/profile/');
            $file->move($destination_path , $final_image_name);
        }
        DB::beginTransaction();
            
            $temp_array = [
                'name' => !empty($request->name)?$request->name:NULL,
                // 'first_name' => !empty($request->first_name)?$request->first_name:NULL,
                // 'middle_name' => !empty($request->middle_name)?$request->middle_name:NULL,
                // 'last_name' => !empty($request->last_name)?$request->last_name:NULL,
                'email' => !empty($request->email)?$request->email:NULL,
                'password' => !empty($request->password)?bcrypt($request->password):NULL,
                'phone_number' => !empty($request->phone_number)?$request->phone_number:NULL,
                'role_id' => !empty($request->role)?$request->role:0,
                'image' => $final_image_name,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'status' => 1,
            ];
        $query = DB::table($table_name)->insert($temp_array);
        if ($query) 
        {
            DB::commit();
            Session::flash('message', 'User created successfully!');
            Session::flash('alert-class', 'alert-success');
        } else {
            DB::rollback();
            Session::flash('message', 'Something went wrong!');
            Session::flash('alert-class', 'alert-danger');
        }
        // if ($request->role == 3) {
        //     return redirect()->intended('executives');
        // }
        // elseif ($request->role == 4) {
        //     return redirect()->intended('customers');
        // }
        // else {
        //     return redirect()->intended($current_menu);
        // }
        return redirect()->route('admin.users.index');
        
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
        $roles = DB::table('roles')
            ->where('roles.status', '=', 1)
            ->where('roles.id','!=',1)
            ->pluck('roles.display_name as role_display_name', 'roles.id as role_id');
        return view($current_menu.'.edit', [
        'encrypt_id'=>$id,
        'records' => $records,
        'current_menu'=> $current_menu,
        'roles' => $roles,
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
            'name' => 'required|regex:/^[a-zA-Z\s]+$/',
            'email' => 'required|email:rfc,dns|unique:users,email,'.$decrypt_id,
            'phone_number' => 'required|min:10|max:10|regex:/^[0-9]+$/',
            'image' => 'image|mimes:jpeg,jpg,png',
            'role' => 'required',
            
        ]);
        if($file=$request->file('image'))
        {
            $date = date('YmdHis');
            $no = str_shuffle('123456789023456789034567890456789905678906789078908909000987654321987654321876543217654321654321543214321321211');
            $random_no = substr($no, 0, 2);
            $final_image_name = $date.$random_no.'.'.$file->getClientOriginalExtension();
            $destination_path = public_path('/images/profile/');
            $file->move($destination_path , $final_image_name);
        }
        else
            {


                $final_image_name = $request->profile_image;

            }
        DB::beginTransaction();
            $temp_array = [
                'name' => !empty($request->name)?$request->name:NULL,
                // 'first_name' => !empty($request->first_name)?$request->first_name:NULL,
                // 'middle_name' => !empty($request->middle_name)?$request->middle_name:NULL,
                // 'last_name' => !empty($request->last_name)?$request->last_name:NULL,
                'email' => !empty($request->email)?$request->email:NULL,
                'password' => !empty($request->password)?bcrypt($request->password):$request->password,
                'phone_number' => !empty($request->phone_number)?$request->phone_number:NULL,
                'role_id' => !empty($request->role)?$request->role:0,
                'image' => $final_image_name,
                'updated_at' => date('Y-m-d H:i:s'),
                'status' => 1,
            ];
        $query = DB::table($table_name)->where($table_name.'.id', $decrypt_id)->update($temp_array);
        if ($query) 
        {
            DB::commit();
            Session::flash('message', 'User updated successfully!');
            Session::flash('alert-class', 'alert-success');
        } else {
            DB::rollback();
            Session::flash('message', 'Something went wrong!');
            Session::flash('alert-class', 'alert-danger');
        }
        // if ($request->role == 3) {
        //     return redirect()->intended('executives');
        // }
        // elseif ($request->role == 4) {
        //     return redirect()->intended('customers');
        // }
        // else {
            // return redirect()->intended($current_menu);
            return redirect()->route('admin.users.index');
        // }
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
