<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Vendor;
use DataTables;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->current_menu='vendors';
        $this->table_name='vendors';
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

        $count = Vendor::where('status','<>','9')->count();

        $records = Vendor::where('status','<>','9')->get();     

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
                    $datatables = $datatables->rawColumns(['status', 'action'])->make(true);
                } else {
                    $datatables = $datatables->rawColumns(['status'])->make(true);
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

        $countries = DB::table('countries')->get();
        $states = DB::table('states')->where('country_id','101')->get();
        return view($current_menu.'.create', [
        'current_menu'=>$current_menu,
        'countries' => $countries,
        'states' => $states
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

        $user_id = Auth::user()->id;

        $current_menu = $this->current_menu;
        $table_name = $this->table_name;
        $base = $this->base;
        
        $request->validate([
            'business_name' => 'required',
            'address_line_1' => 'required',
            'address_line_2' => 'nullable',
            'country' => 'required',
            'state' => 'required',
            'city' => 'required',
            'pincode' => 'required|numeric|digits:6',
            'first_name' => 'required|regex:/^[a-zA-Z]+$/u|min:1|max:255',
            'last_name' => 'nullable|regex:/^[a-zA-Z ]+$/u|min:1|max:255',
            'phone_number' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:11|max:11',
            'email_id' => 'required|email:rfc,dns|unique:vendors,email',
            'password' => 'required',
            'location' => 'required'
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

        if(($request->input('geo_lat')==NULL || $request->input('geo_lat')=='' || !is_numeric($request->input('geo_lat'))) || ($request->input('geo_long')==NULL || $request->input('geo_long')=='' || !is_numeric($request->input('geo_long'))))
        {

            return back()->withInput()->withErrors(['location' => 'Search & Select the Place !!']);
        }

        DB::beginTransaction();

        $data=[
            'business_name' => $request->input('business_name'),
            'address_line_1' => $request->input('address_line_1'),
            'address_line_2' => $request->input('address_line_2'),
            'country_id' => $request->input('country'),
            'state_id' => $request->input('state'),
            'city_id' => $request->input('city'),
            'pincode' => $request->input('pincode'),
            'latitude' => $request->input('geo_lat'),
            'longitude' => $request->input('geo_long'),
            'geo_address' => $request->input('geo_addr'),
            'geo_city' => $request->input('geo_city'),
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'name' => $request->input('first_name').' '.$request->input('last_name'),
            'phone_code' => $request->input('phone_code'),
            'phone_iso' => $request->input('phone_iso'),
            'phone' => $phone,
            'email' => $request->input('email_id'),
            'password' => bcrypt($request->input('password')),
            'created_by' => $user_id,
            'created_at' => date('Y-m-d H:i:s')
        ];

        $query = Vendor::create($data);

        if ($query) {
            DB::commit();
            Session::flash('message', 'Vendor Created Successfully!');
            Session::flash('alert-class', 'alert-success');
        }
        else
        {
            DB::rollback();
            Session::flash('message', 'Something went wrong!');
            Session::flash('alert-class', 'alert-danger');
        }

        // return redirect()->intended($base.'/'.$current_menu);

        return redirect()->route($base.'.'.$current_menu.'.'.'index');
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

        $records = Vendor::where($table_name.'.id', $decrypt_id)->first();

        $countries = DB::table('countries')->get();
        $states = DB::table('states')->where('country_id',$records->country_id)->get();
        $cities = DB::table('cities')->where('state_id',$records->state_id)->get();

        return view($current_menu.'.edit', [
            'current_menu'=>$current_menu,
            'encrypt_id'=>$id,
            'records' => $records,
            'countries' => $countries,
            'states' => $states,
            'cities' => $cities,
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
        $user_id = Auth::user()->id;

        $current_menu = $this->current_menu;
        $table_name = $this->table_name;
        $decrypt_id = Crypt::decryptString($id);
        $base = $this->base;

        $request->validate([
            'business_name' => 'required',
            'address_line_1' => 'required',
            'address_line_2' => 'nullable',
            'country' => 'required',
            'state' => 'required',
            'city' => 'required',
            'pincode' => 'required|numeric|digits:6',
            'first_name' => 'required|regex:/^[a-zA-Z]+$/u|min:1|max:255',
            'last_name' => 'nullable|regex:/^[a-zA-Z ]+$/u|min:1|max:255',
            'phone_number' => 'required|required|regex:/^([0-9\s\-\+\(\)]*)$/|min:11|max:11',
            'email_id' => 'required|email:rfc,dns|unique:vendors,email,'.$decrypt_id,
            // 'password' => 'required',
            'location' => 'required'
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

        if(($request->input('geo_lat')==NULL || $request->input('geo_lat')=='' || !is_numeric($request->input('geo_lat'))) || ($request->input('geo_long')==NULL || $request->input('geo_long')=='' || !is_numeric($request->input('geo_long'))))
        {

            return back()->withInput()->withErrors(['location' => 'Search & Select the Place !!']);
        }

        DB::beginTransaction();

        $data=[
            'business_name' => $request->input('business_name'),
            'address_line_1' => $request->input('address_line_1'),
            'address_line_2' => $request->input('address_line_2'),
            'country_id' => $request->input('country'),
            'state_id' => $request->input('state'),
            'city_id' => $request->input('city'),
            'pincode' => $request->input('pincode'),
            'latitude' => $request->input('geo_lat'),
            'longitude' => $request->input('geo_long'),
            'geo_address' => $request->input('geo_addr'),
            'geo_city' => $request->input('geo_city'),
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'name' => $request->input('first_name').' '.$request->input('last_name'),
            'phone_code' => $request->input('phone_code'),
            'phone_iso' => $request->input('phone_iso'),
            'phone' => $phone,
            'email' => $request->input('email_id'),
            // 'password' => bcrypt($request->input('password')),
            'updated_by' => $user_id,
            'updated_at' => date('Y-m-d H:i:s')
        ];

        if($request->input('password')!=NULL || $request->input('password')!='') 
        {
            $data['password'] = bcrypt($request->input('password'));
        }

        $query = Vendor::where($table_name.'.id', $decrypt_id)->update($data);

        if ($query) {
            DB::commit();
            Session::flash('message', 'Vendor Updated Successfully!');
            Session::flash('alert-class', 'alert-success');
        }
        else
        {
            DB::rollback();
            Session::flash('message', 'Something went wrong!');
            Session::flash('alert-class', 'alert-danger');
        }

        // return redirect()->intended($base.'/'.$current_menu);

        return redirect()->route($base.'.'.$current_menu.'.'.'index');
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
