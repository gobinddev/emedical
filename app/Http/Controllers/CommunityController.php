<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Topic;
use App\TopicComment;
use App\Customer;
use App\UserProduct;
use App\TagMaster;
use DataTables;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Helpers\Helper;
class CommunityController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->current_menu='community';
        $this->table_name='topics';
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

        $count = Topic::where('status','<>','9')->count();

        $records = Topic::where('status','<>','9')->get();

        if ($request->ajax()) {

            $datatables = Datatables::of($records)
                ->addIndexColumn()
                ->editColumn('tag',function($row){
                    if($row->tag_id!=NULL)
                    {
                        $tag = TagMaster::whereIn('id',explode(',',$row->tag_id))->pluck('name')->all();

                        if(count($tag)>0)
                        {
                            $name = '';
                            $name = implode(', ',$tag);
                            return $name;
                        }
                        else
                        {
                            return '--';
                        }
                    }
                    else
                    {
                        return '--';
                    }
                })
                ->editColumn('post_by',function($row){
                    if($row->user_id!=NULL)
                    {
                        $customer = Customer::where('id',$row->user_id)->first();

                        if($customer!=NULL)
                        {
                            return ucwords($customer->display_name);
                        }
                        else
                        {
                            return '--';
                        }
                    }
                    else
                    {
                        return '--';
                    }
                })
                ->editColumn('status', function ($row) {
                    if ($row->status == 1) {
                        return '<span class="badge badge-success">Active</span>';
                    } else {
                        return '<span class="badge badge-warning">Inactive</span>';
                    }
                })
                ->editColumn('created_at',function($row){
                    return date('Y-m-d h:i A',strtotime($row->created_at));
                });
                if (true) {
                    $datatables = $datatables->addColumn('action', function($row) use ($modules, $current_menu, $table_name) {
                        if (true) {
                            if ($row->status == 1) {
                                $action1 = '<button class="btn btn-warning" type="button" onclick="confirmChangeStatusAction(`'.$table_name.'`, '.$row->id.', '.$row->status.');" title="Deactivate"><i class="nav-icon i-Reset"></i></button> ';
                            } else {
                                $action1 = '<button class="btn btn-success" type="button" onclick="confirmChangeStatusAction(`'.$table_name.'`, '.$row->id.', '.$row->status.');" title="Activate"><i class="nav-icon i-Reset"></i></button> ';
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
                            $action3 = '<button class="btn btn-danger" type="button" onclick="confirmDeleteAction(`'.$table_name.'`, `'.$row->id.'`);" title="Delete"><i class="nav-icon i-Close-Window"></i></button> ';
                        } else {
                            $action3 = ' ';
                        }
                        if (true) {
                            $encrypt_id = Crypt::encryptString($row->id);
                            $url = url('admin/'.$current_menu.'/'.$encrypt_id);
                            $action4 = '<a href="'.$url.'" class="btn btn-dark" type="button" title="View"><i class="fa fa-eye" aria-hidden="true"></i></a> ';
                        } else {
                            $action4 = ' ';
                        }
                        $action = $action1.$action2.$action3.$action4;
                        return $action;
                    });
                }
                if(true){
                    $datatables = $datatables->rawColumns(['body','tag','status','post_by','action'])->make(true);
                } else {
                    $datatables = $datatables->rawColumns(['body','tag','status','post_by'])->make(true);
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

        $products = UserProduct::where('status',1)->get();
        $tags = TagMaster::where('status',1)->get();
        return view($current_menu.'.create', [
            'current_menu'=>$current_menu,
            'tags' => $tags,
            'products' => $products
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

        $admin_id = 43;

        $request->validate([
            'title' => 'required',
            'product' => 'required',
            'body' => 'required',
        ]
        );

        DB::beginTransaction();

        $is_featured = ($request->is_featured) ? 1 : 0 ;

        $data=[
            'title' => $request->input('title'),
            'body' => $request->input('body'),
            'product_id' => $request->product,
            'user_id' => $admin_id,
            'tag_id' => $request->tag!=NULL?implode(',',$request->tag):NULL,
            'is_featured' => $is_featured,
            'created_at' => date('Y-m-d H:i:s')
        ];

        $query = Topic::create($data);

        if ($query) {
            DB::commit();
            Session::flash('message', 'Community Created Successfully!');
            Session::flash('alert-class', 'alert-success');
        }
        else
        {
            DB::rollback();
            Session::flash('message', 'Something went wrong!');
            Session::flash('alert-class', 'alert-danger');
        }

        //return redirect()->intended($base.'/'.$current_menu);

        return redirect()->route('admin.community.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $current_menu = $this->current_menu;
        $table_name = $this->table_name;
        $decrypt_id = Crypt::decryptString($id);

        $records = Topic::where($table_name.'.id', $decrypt_id)->first();
        $main_comments = TopicComment::from('topic_comments as tc')
                                        ->select('tc.*','c.display_name')
                                        ->join('customers as c','tc.user_id','=','c.id')
                                        ->where('tc.parent_id',0)
                                        ->where('tc.topic_id',$decrypt_id)
                                        ->where('c.status','<>',9)
                                        ->where('tc.status','<>',9)
                                        ->orderBy('tc.created_at','desc')
                                        ->get();
        return view($current_menu.'.show', [
            'current_menu'=>$current_menu,
            'encrypt_id'=>$id,
            'records' => $records,
            'main_comments' => $main_comments
        ]);

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

        $records = Topic::where($table_name.'.id', $decrypt_id)->first();
        $products = UserProduct::where('status',1)->get();
        $tags = TagMaster::where('status',1)->get();

        return view($current_menu.'.edit', [
            'current_menu'=>$current_menu,
            'encrypt_id'=>$id,
            'records' => $records,
            'tags' => $tags,
            'products' => $products
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

        $admin_id = 43;

        $request->validate([
            'title' => 'required',
            'product' => 'required',
            'body' => 'required',
        ]
        );

        DB::beginTransaction();
        $is_featured = ($request->is_featured) ? 1 : 0 ;

        //dd($is_featured);
        $data=[
            'title' => $request->input('title'),
            'body' => $request->input('body'),
            'product_id' => $request->product,
            'tag_id' => $request->tag!=NULL?implode(',',$request->tag):NULL,
            'is_featured' => $is_featured,
            'updated_at' => date('Y-m-d H:i:s')
        ];

        $query = Topic::where($table_name.'.id', $decrypt_id)->update($data);

        if ($query) {
            DB::commit();
            Session::flash('message', 'Community Updated Successfully!!');
            Session::flash('alert-class', 'alert-success');
        }
        else
        {
            DB::rollback();
            Session::flash('message', 'Something went wrong!');
            Session::flash('alert-class', 'alert-danger');
        }

        // return redirect()->intended($base.'/'.$current_menu);

        return redirect()->route('admin.community.index');
    }
}
