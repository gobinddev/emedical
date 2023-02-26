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

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->current_menu='customers';
        $this->table_name='users';
    }
    public function index(Request $request)
    {
        $current_menu = $this->current_menu;
        $table_name = $this->table_name;
        if(Auth::user()->role_id == 1){

            $modules = DB::table('modules')
                ->where('modules.parent_id', '=', 5)
                ->where('modules.show_in_indexpage', '=', 'yes')
                ->where('modules.status', '=', 1)
                ->orderBy('modules.display_order','ASC')
                ->pluck('modules.id as module_id', 'modules.name as module_name');

        } else {

            $modules = DB::table('modules')
                ->join('role_module_mapping', 'role_module_mapping.module_id', '=', 'modules.id')
                ->where('role_module_mapping.role_id', '=', Auth::user()->role_id)
                ->where('role_module_mapping.status', '=', 1)
                ->where('modules.parent_id', '=', 5)
                ->where('modules.show_in_indexpage', '=', 'yes')
                ->where('modules.status', '=', 1)
                ->orderBy('modules.display_order','ASC')
                ->pluck('modules.id as module_id', 'modules.name as module_name');

        }
        $count = User::where($table_name.'.role_id', '=', 4)
            ->where($table_name.'.status', '!=', 9)
            ->count();
        $records = User::select('users.*', DB::raw("CONCAT_WS(' ', users.first_name, users.middle_name, users.last_name) as full_name"))
            ->where($table_name.'.role_id', '=', 4)
            ->where($table_name.'.status', '!=', 9)
            ->orderBy($table_name.'.id', 'DESC')
            ->get();
        if ($request->ajax()) {
            $datatables = Datatables::of($records)
                ->addIndexColumn()
                ->addColumn('avatar', function ($row) {
                   if ($row->image !='' ) {

                      $url= asset('images/profile/'.$row->image);
                      return '<img src="'.$url.'" border="0" width="50" height="50" align="center" alt="image" />';

                       
                    }
                    else 
                    {
                        $url ='';

                        return $url;
                    }

                })
                ->editColumn('status', function ($row) {
                    if ($row->status == 1) {
                        return '<span class="badge badge-success">Active</span>';
                    } else {
                        return '<span class="badge badge-warning">Inactive</span>';
                    }
                });
                if (Arr::exists($modules, 'Customers-changeStatus') || Arr::exists($modules, 'Customers-edit') || Arr::exists($modules, 'Customers-delete')) {
                    $datatables = $datatables->addColumn('action', function($row) use ($modules, $table_name) {
                        if (Arr::exists($modules, 'Customers-changeStatus')) {
                            if ($row->status == 1) {
                                $action1 = '<button class="btn btn-warning" type="button" onclick="confirmChangeStatusAction(`'.$table_name.'`, '.$row->id.', '.$row->status.');"><i class="nav-icon i-Reset"></i></button> ';
                            } else {
                                $action1 = '<button class="btn btn-success" type="button" onclick="confirmChangeStatusAction(`'.$table_name.'`, '.$row->id.', '.$row->status.');"><i class="nav-icon i-Reset"></i></button> ';
                            }
                        }
                        if (Arr::exists($modules, 'Customers-edit')) {
                            $encrypt_id = Crypt::encryptString($row->id);
                            $url = url('admin/users/'.$encrypt_id.'/edit');
                            $action2 = '<a href="'.$url.'" class="btn btn-info" type="button"><i class="nav-icon i-Pen-2"></i></a> ';
                        } else {
                            $action2 = ' ';
                        }
                        if (Arr::exists($modules, 'Customers-delete')) {
                            $action3 = '<button class="btn btn-danger" type="button" onclick="confirmDeleteAction(`'.$table_name.'`, '.$row->id.');"><i class="nav-icon i-Close-Window"></i></button>';
                        } else {
                            $action3 = ' ';
                        }  
                        $action = $action1.$action2.$action3;
                        return $action; 
                    });
                }
                if(Arr::exists($modules, 'Customers-changeStatus') || Arr::exists($modules, 'Customers-edit') || Arr::exists($modules, 'Customers-delete')){
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
        //
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
        //
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
