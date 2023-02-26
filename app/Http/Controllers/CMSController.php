<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use DataTables;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\CMS;
class CMSController extends Controller
{

    
    public function __construct()
    {
        $this->current_menu='cms';
        $this->table_name='cms';
        $this->base = 'admin';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $current_menu = $this->current_menu;

        $table_name = $this->table_name;

        $modules = array();

        $count = CMS::where('parent_id','0')->where('status','<>','9')->count();

        $records = CMS::where('parent_id','0')->where('status','<>','9')->get();     

        if ($request->ajax()) {

            $datatables = Datatables::of($records)
                ->addIndexColumn()
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
                    $datatables = $datatables->rawColumns(['description','status', 'action'])->make(true);
                } else {
                    $datatables = $datatables->rawColumns(['description','status'])->make(true);
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
        //

        $current_menu = $this->current_menu;
        $table_name = $this->table_name;
        $base = $this->base;

        $request->validate([
            'title' => 'required|unique:cms',
            'description' => 'required',
        ],
        [
            'title.unique' => 'Title Has Already Been Exists !!'
        ]
        );

        DB::beginTransaction();
        $slug = NULL;
        $slug = strtolower(str_replace(array(' '),'_',$request->title));
        $data=[
            'title' => $request->input('title'),
            'slug' => $slug,
            'created_by' => Auth::user()->id,
            'description' => $request->description,
            'created_at' => date('Y-m-d H:i:s')
        ];

        $query = CMS::create($data);

        if ($query) {
            DB::commit();
            Session::flash('message', 'CMS Created Successfully!');
            Session::flash('alert-class', 'alert-success');
        }
        else
        {
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
        //
        $current_menu = $this->current_menu;
        $table_name = $this->table_name;
        $decrypt_id = Crypt::decryptString($id);

        $records = CMS::where($table_name.'.id', $decrypt_id)->first();

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
        //
        $current_menu = $this->current_menu;
        $table_name = $this->table_name;
        $decrypt_id = Crypt::decryptString($id);
        $base = $this->base;

        $request->validate([
            'title' => 'required|unique:cms,id,'.$decrypt_id,
            'description' => 'required',
        ],
        [
            'title.unique' => 'Title Has Already Been Exists !!'
        ]
        );

        DB::beginTransaction();

        $data=[
            'title' => $request->input('title'),
            'description' => $request->description,
            'updated_by' => Auth::user()->id,
            'updated_at' => date('Y-m-d H:i:s')
        ];

        $query = CMS::where($table_name.'.id', $decrypt_id)->update($data);

        if ($query) {
            DB::commit();
            Session::flash('message', 'CMS Updated Successfully!!');
            Session::flash('alert-class', 'alert-success');
        }
        else
        {
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
