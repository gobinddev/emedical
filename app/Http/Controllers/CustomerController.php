<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Customer;
use DataTables;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

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
        $this->table_name='customers';
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

        $count = Customer::where('status','<>','9')->count();

        $records = Customer::where('status','<>','9')->get();
        
        if ($request->ajax()) {

            $datatables = Datatables::of($records)
                ->addIndexColumn()
                ->addColumn('avatar', function ($row) {
                    if ($row->image !=NULL && $row->image !='' ) {
 
                       $url= asset('uploads/images/profile/'.$row->image);
                       return '<img src="'.$url.'" border="0" width="50" height="50" align="center" alt="image" />';
 
                        
                     }
                     else 
                     {
                         $url ='';
 
                         return $url;
                     }
 
                 })
                ->editColumn('name',function($row){
                    return $row->display_name;
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
                    $datatables = $datatables->rawColumns(['avatar','status', 'action'])->make(true);
                } else {
                    $datatables = $datatables->rawColumns(['avatar','status'])->make(true);
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
            'first_name' => 'required|regex:/^[a-zA-Z]+$/u|min:1|max:255',
            'last_name' => 'nullable|regex:/^[a-zA-Z ]+$/u|min:1|max:255',
            'phone_number' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:11|max:11',
            'email_id' => 'required|email:rfc,dns|unique:customers,email',
            'password' => 'required',
            'image' => 'nullable|mimes:jpg,jpeg,png,gif,bmp,svg|max:20000'
        ],
        [
            'email_id.unique' => 'Email ID Has Already Been Taken',
            'phone_number.regex'=>'Phone Number Must Be 10-digit Number',
            'phone_number.min'=>'Phone Number Must Be 10-digit Number',
            'phone_number.max'=>'Phone Number Must Be 10-digit Number'
        ]
        );

        $phone = preg_replace('/\D/','',$request->phone_number);

        if(strlen($phone)!=10)
        {
            return back()->withInput()->withErrors(['phone_number'=>'Phone Number Must Be 10-digit Number']);
        }

        DB::beginTransaction();

        if($request->file('image')){

            $file = $request->file('image');
            $date = date('YmdHis');
            $no = str_shuffle('123456789023456789034567890456789905678906789078908909000987654321987654321876543217654321654321543214321321211');
            $random_no = substr($no, 0, 2);
            $final_file_name = $date.$random_no.'.'.$file->getClientOriginalExtension();
            $destination_path = public_path('/uploads/images/profile/');
            if(!File::exists($destination_path))
            {
                File::makeDirectory($destination_path,0777,true,true);
            }

            $file->move($destination_path , $final_file_name);
            
       }

        $data = [
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'display_name' => $request->input('first_name').' '.$request->input('last_name'),
            'phone' => $phone,
            'email' => $request->input('email_id'),
            'password' => bcrypt($request->input('password')),
            'image' => $final_file_name,
            'is_email_verified' => 1,
            'created_at' => date('Y-m-d H:i:s')
        ];

        $query = Customer::create($data);

        if ($query) {
            DB::commit();
            Session::flash('message', 'Customer Created Successfully!');
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

        $records = Customer::where($table_name.'.id', $decrypt_id)->first();

        return view($current_menu.'.edit', [
            'current_menu'=>$current_menu,
            'encrypt_id'=>$id,
            'records' => $records
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
        $base = $this->base;

        $decrypt_id = Crypt::decryptString($id);

        $request->validate([
            'first_name' => 'required|regex:/^[a-zA-Z]+$/u|min:1|max:255',
            'last_name' => 'nullable|regex:/^[a-zA-Z ]+$/u|min:1|max:255',
            'phone_number' => 'required|required|regex:/^([0-9\s\-\+\(\)]*)$/|min:11|max:11',
            'email_id' => 'required|email:rfc,dns|unique:customers,email,'.$decrypt_id,
            'password' => 'required',
            'image' => 'nullable|mimes:jpg,jpeg,png,gif,bmp,svg|max:20000'
        ],
        [
            'email_id.unique' => 'Email ID Has Already Been Taken',
            'phone_number.regex'=>'Phone Number Must Be 10-digit Number',
            'phone_number.min'=>'Phone Number Must Be 10-digit Number',
            'phone_number.max'=>'Phone Number Must Be 10-digit Number'
        ]
        );

        $phone = preg_replace('/\D/','',$request->phone_number);

        if(strlen($phone)!=10)
        {
            return back()->withInput()->withErrors(['phone_number'=>'Phone Number Must Be 10-digit Number']);
        }

        DB::beginTransaction();

        if($request->file('image')){

            $file = $request->file('image');
            $date = date('YmdHis');
            $no = str_shuffle('123456789023456789034567890456789905678906789078908909000987654321987654321876543217654321654321543214321321211');
            $random_no = substr($no, 0, 2);
            $final_file_name = $date.$random_no.'.'.$file->getClientOriginalExtension();
            $destination_path = public_path('/uploads/images/profile/');
            if(!File::exists($destination_path))
            {
                File::makeDirectory($destination_path,0777,true,true);
            }

            $file->move($destination_path , $final_file_name);
            
       }

        $data = [
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'display_name' => $request->input('first_name').' '.$request->input('last_name'),
            'phone' => $phone,
            'email' => $request->input('email_id'),
            'image' => $final_file_name,
            'updated_at' => date('Y-m-d H:i:s')
        ];

        $query = Customer::where($table_name.'.id', $decrypt_id)->update($data);

        if ($query) {
            DB::commit();
            Session::flash('message', 'Customer Updated Successfully!');
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
