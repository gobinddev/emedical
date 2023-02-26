<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Appointment;
use Auth;
use DataTables;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->current_menu='appointments';
        $this->table_name='appointments';
    }
    public function index(Request $request)
    {
        $current_menu = $this->current_menu;
        $table_name = $this->table_name;
        if(Auth::user()->role_id == 1){

            $modules = DB::table('modules')
                ->where('modules.parent_id', '=', 8)
                ->where('modules.show_in_indexpage', '=', 'yes')
                ->where('modules.status', '=', 1)
                ->orderBy('modules.display_order','ASC')
                ->pluck('modules.id as module_id', 'modules.name as module_name');

        } else {

            $modules = DB::table('modules')
                ->join('role_module_mapping', 'role_module_mapping.module_id', '=', 'modules.id')
                ->where('role_module_mapping.role_id', '=', Auth::user()->role_id)
                ->where('role_module_mapping.status', '=', 1)
                ->where('modules.parent_id', '=', 8)
                ->where('modules.show_in_indexpage', '=', 'yes')
                ->where('modules.status', '=', 1)
                ->orderBy('modules.display_order','ASC')
                ->pluck('modules.id as module_id', 'modules.name as module_name');

        }
        $count = Appointment::join('users', 'users.id', '=', 'appointments.customer_id')
            ->where($table_name.'.status', '!=', 9)
            ->count();
        $records = Appointment::join('users', 'users.id', '=', 'appointments.customer_id')
            ->select('appointments.*', 'users.*', 'appointments.id as appointment_id', 'appointments.created_at as appointment_created_at')
            ->where($table_name.'.status', '!=', 9)
            ->orderBy($table_name.'.id', 'DESC')
            ->get();
        $executive_full_names = DB::table('users')
            ->where('users.role_id', '=', 3)
            ->where('users.status', '=', 1)
            ->pluck('name as executive_name', 'users.id as executive_id');


        if ($request->ajax()) {
            
            $datatables = Datatables::of($records)
                ->addIndexColumn()
                ->addColumn('executive_full_name', function($row) use ($executive_full_names) {
                    $executive_full_name = (!empty($executive_full_names[$row->executive_id])) ? $executive_full_names[$row->executive_id] : 'NA';
                    return $executive_full_name;
                })
                ->editColumn('appointment_date_time', function($row) {
                    $appointment_date_time = (!empty($row->appointment_date_time)) ? $row->appointment_date_time : 'NA';
                    return $appointment_date_time;
                })
                ->editColumn('customer_meeting_url', function($row) {
                    $customer_meeting_url = (!empty($row->customer_meeting_url)) ? $row->customer_meeting_url : '#';
                    $customerStartMeetingUrl = '<i><a href="'.$customer_meeting_url.'">customerStartMeetingUrl</a></i>';
                    return $customerStartMeetingUrl;
                })
                ->editColumn('executive_meeting_url', function($row) {
                    $executive_meeting_url = (!empty($row->executive_meeting_url)) ? $row->executive_meeting_url : '#';
                    $executiveStartMeetingUrl = '<i><a href="'.$executive_meeting_url.'">executiveStartMeetingUrl</a></i>';
                    return $executiveStartMeetingUrl;
                })
                ->editColumn('appointment_status', function($row) {
                    if ($row->appointment_status == 'not_assigned') {
                        return '<span class="badge badge-info">Not Assigned</span>';
                    } else if ($row->appointment_status == 'assigned') {
                        return '<span class="badge badge-warning">Assigned</span>';
                    } else if ($row->appointment_status == 'completed') {
                        return '<td><span class="badge badge-success">Completed</span>';
                    } else {
                        return '<span class="badge badge-danger">Expired</span>';
                    }
                });
                if (Arr::exists($modules, 'Appointments-assignExecutiveToCustomer')) {
                   
                    $datatables = $datatables->addColumn('assign_executive_to_customer', function($row) {
                        return '<button class="btn btn-info open-exampleModalCenter" type="button" data-toggle="modal" data-target="#exampleModalCenter" appodate="'.$row->appointment_date_time.'" data-id="'.$row->appointment_id.'" data-customer-full-name="'.$row->name.'"><i class="nav-icon i-Paper-Plane"></i></button>';
                    });
                }
                if (Arr::exists($modules, 'Appointments-edit') || Arr::exists($modules, 'Appointments-delete')) {
                    $datatables = $datatables->addColumn('action', function($row) use ($modules, $current_menu, $table_name) {
                        if (Arr::exists($modules, 'Appointments-edit')) {
                            $encrypt_id = Crypt::encryptString($row->appointment_id);
                            $url = url($current_menu.'/'.$encrypt_id.'/edit');
                            $action2 = '<a href="'.$url.'" class="btn btn-info" type="button"><i class="nav-icon i-Pen-2"></i></a> ';
                        } else {
                            $action2 = ' ';
                        }
                        if (Arr::exists($modules, 'Appointments-delete')) {
                                $action3 = '<button class="btn btn-danger" type="button" onclick="confirmDeleteAction(`'.$table_name.'`, '.$row->appointment_id.');"><i class="nav-icon i-Close-Window"></i></button>';
                        } else {
                            $action3 = ' ';
                        }
                        $action = $action2.$action3;
                        return $action; 
                    });
                }   
                if (Arr::exists($modules, 'Appointments-edit') || Arr::exists($modules, 'Appointments-delete')) {
                    if (Arr::exists($modules, 'Appointments-assignExecutiveToCustomer')) {
                        $datatables = $datatables->rawColumns(['executive_full_name', 'appointment_date_time', 'customer_meeting_url', 'executive_meeting_url', 'appointment_status', 'assign_executive_to_customer', 'action'])->make(true);
                    } else {
                        $datatables = $datatables->rawColumns(['executive_full_name', 'appointment_date_time', 'customer_meeting_url', 'executive_meeting_url', 'appointment_status', 'action'])->make(true);
                    }
                } else {
                    if (Arr::exists($modules, 'Appointments-assignExecutiveToCustomer')) {
                    $datatables = $datatables->rawColumns(['executive_full_name', 'appointment_date_time', 'customer_meeting_url', 'executive_meeting_url', 'appointment_status', 'assign_executive_to_customer'])->make(true);
                    } else {
                    $datatables = $datatables->rawColumns(['executive_full_name', 'appointment_date_time', 'customer_meeting_url', 'executive_meeting_url', 'appointment_status'])->make(true);
                    }
                }
        return $datatables;
        }
        return view($current_menu.'.index', [
        'current_menu'=>$current_menu,
        'table_name'=>$table_name,
        'modules' => $modules,
        'count' => $count,
        'records' => $records,
        'executive_full_names' => $executive_full_names,
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
        $products = DB::table('products')
            ->where('products.status', '=', 1)
            ->pluck('products.name as product_name', 'products.id as product_id');
        $customers = DB::table('users')
            ->where('users.role_id', '=', 4)
            ->where('users.status', '=', 1)
            ->pluck('name as customer_name', 'users.id as customer_id');
        $executives = DB::table('users')
            ->where('users.role_id', '=', 3)
            ->where('users.status', '=', 1)
            ->pluck('name as executive_name', 'users.id as executive_id');
        return view($current_menu.'.create', [
        'current_menu'=>$current_menu,
        'products'=>$products,
        'customers'=>$customers,
        'executives'=>$executives,
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
           
            'customer_id' => 'required',
            'executive_id' => 'required',
            'appointment_date_time' => 'required',
        ]);
        $date = date('YmdHis');
        $no = str_shuffle('123456789023456789034567890456789905678906789078908909000987654321987654321876543217654321654321543214321321211');
        $random_no = substr($no, 0, 2);
        $random_str = $date.$random_no;
        $appointment_code = 'APP-'.$random_str; 


        $executive = DB::table('users')
            ->where('role_id', '=', 3)
            ->where('id', '=', $request->executive_id)
            ->select('name','email')->first();
        
         
         
       DB::beginTransaction();
        $temp_array = [
            'appointment_code' => $appointment_code,
             'description' => !empty($request->description)?$request->description:'',
            'customer_id' => !empty($request->customer_id)?$request->customer_id:0,
            'executive_id' => !empty($request->executive_id)?$request->executive_id:0,
            'appointment_date_time' => date('Y-m-d H:i:s', strtotime($request->appointment_date_time)),
            'appointment_status' => 'assigned',
            'created_at' => date('Y-m-d H:i:s'),
            'customer_meeting_url' => 'https://onlinevideo.khannajeweller.com/'.$appointment_code,
            'executive_meeting_url' => 'https://onlinevideo.khannajeweller.com/'.$appointment_code.'#userInfo.displayName=%22'.$executive->name.'%22&userInfo.email=%22'.$executive->email.'%22',
            'created_by' => Auth::user()->id,
            'updated_at' => date('Y-m-d H:i:s'),
            'updated_by' => Auth::user()->id,
            'status' => !empty($request->status)?$request->status:0,
        ];
        
        
       
        $query = Appointment::insertGetId($temp_array);
        if ($query) 
        {
            DB::commit();
          $customer_id=!empty($request->customer_id)?$request->customer_id:0 ;  
          $name=DB::table('users')->where(['id'=>$customer_id])->first();  
        $presenter_id= !empty($request->executive_id)?$request->executive_id:Auth::user()->id; 
        $presenter_name="khanna jeweller";
        $start_time=date('m/d/Y H:i', strtotime($request->appointment_date_time));//"12/12/2021 13:30";
        $title=!empty($request->description)?$request->description:"Meeting";
        $duration=60;   
        WiziqCreate($presenter_id,$presenter_name,$start_time,$title,$duration,$query); 

         $data=DB::table('appointments')->where(['id'=>$query])->get();   
         foreach ($data AS $value){
            $attendee = '';
            $class_id = $value->class_id;           
            $attendee = "<attendee_list>
                              <attendee>
                                <attendee_id><![CDATA[$value->customer_id]]></attendee_id>
                                <screen_name><![CDATA[$name->name]]></screen_name>
                                <language_culture_name><![CDATA[es-ES]]></language_culture_name>
                              </attendee>
                          </attendee_list>";

            
            WiziqAddAttendee($class_id,$attendee,$query); 
        } 
      
            
            
            Session::flash('message', 'Appointment created successfully!');
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
            ->get();
        $products = DB::table('products')
            ->where('products.status', '=', 1)
            ->pluck('products.name as product_name', 'products.id as product_id');

            $customers = DB::table('users')
            ->where('users.role_id', '=', 4)
            ->where('users.status', '=', 1)
            ->pluck('name as customer_name', 'users.id as customer_id');
        $executives = DB::table('users')
            ->where('users.role_id', '=', 3)
            ->where('users.status', '=', 1)
            ->pluck('name as executive_name', 'users.id as executive_id');

        return view($current_menu.'.edit', [
        'current_menu'=>$current_menu,
        'encrypt_id'=>$id,
        'records' => $records,
        'products'=>$products,
        'customers'=>$customers,
        'executives'=>$executives,
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
           
            'customer_id' => 'required',
            'executive_id' => 'required',
            'appointment_date_time' => 'required',
        ]);

        $executive = DB::table('users')
            ->where('role_id', '=', 3)
            ->where('id', '=', $request->executive_id)
            ->select('name','email')->first();
        
            $appointment = DB::table('appointments')
                            ->where('id', '=', $decrypt_id)
                            ->select('appointment_code')->first();
            $appointment_code = $appointment->appointment_code;
        DB::beginTransaction();
        $temp_array = [
            'description' => !empty($request->description)?$request->description:'',
            'customer_id' => !empty($request->customer_id)?$request->customer_id:0,
            'executive_id' => !empty($request->executive_id)?$request->executive_id:0,
            'appointment_date_time' => date('Y-m-d H:i:s', strtotime($request->appointment_date_time)),
            'appointment_status' => 'assigned',
            'created_at' => date('Y-m-d H:i:s'),
            'customer_meeting_url' => 'https://onlinevideo.khannajeweller.com/'.$appointment_code,
            'executive_meeting_url' => 'https://onlinevideo.khannajeweller.com/'.$appointment_code.'#userInfo.displayName=%22'.$executive->name.'%22&userInfo.email=%22'.$executive->email.'%22',
            
            'updated_at' => date('Y-m-d H:i:s'),
            'updated_by' => Auth::user()->id,
            'status' => !empty($request->status)?$request->status:0,
        ];
        $query = Appointment::where($table_name.'.id', $decrypt_id)->update($temp_array);
        if ($query) 
        {
            DB::commit();
            
            
        $customer=DB::table('appointments')->where(['id'=>$id])->first();
        $customer_id=!empty($customer) ? $customer->customer_id:'0';  
        $name=DB::table('users')->where(['id'=>$customer_id])->first();  
        $presenter_id= !empty($request->executive_id)?$request->executive_id:Auth::user()->id; 
        $presenter_name="khanna jeweller";
        $start_time=date('m/d/Y H:i', strtotime($request->appointment_date_time));//"12/12/2021 13:30";
        $title=!empty($customer->description)?$customer->description:"Meeting"; 
        $duration=60;   
        WiziqCreate($presenter_id,$presenter_name,$start_time,$title,$duration,$id); 

         $dataV=DB::table('appointments')->where(['id'=>$id])->get();   
         foreach ($dataV AS $value){
            $attendee = '';
            $class_id = $value->class_id;           
            $attendee = "<attendee_list>
                              <attendee>
                                <attendee_id><![CDATA[$value->customer_id]]></attendee_id>
                                <screen_name><![CDATA[$name->name]]></screen_name>
                                <language_culture_name><![CDATA[es-ES]]></language_culture_name>
                              </attendee>
                          </attendee_list>";

            
            WiziqAddAttendee($class_id,$attendee,$id);   
        }  
            
            Session::flash('message', 'Appointment updated successfully!');
            Session::flash('alert-class', 'alert-success');
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
}
