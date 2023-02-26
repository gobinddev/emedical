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
use JoisarJignesh\Bigbluebutton\Facades\Bigbluebutton;

class MeetingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->current_menu='meetings';
        $this->table_name='appointments';
    }
    public function index(Request $request)
    {
        $current_menu = $this->current_menu;
        $table_name = $this->table_name;
        $perpage = !empty($request->perpage) ? $request->perpage : 10;
        
       
       
       if(Auth::user()->role_id==3)
       {

        $count = Appointment::join('users', 'users.id', '=', 'appointments.customer_id')
            ->select('appointments.appointment_code','appointments.executive_meeting_url','appointments.created_at as appointment_created_at','users.name')
            ->where($table_name.'.status', '!=', 9)
             ->where($table_name.'.appointment_status', '=','assigned')
            ->where($table_name.'.executive_id', '=',Auth::user()->id)
            ->count();


           $records = Appointment::join('users', 'users.id', '=', 'appointments.customer_id')
            ->select('appointments.appointment_code','appointments.executive_meeting_url','appointments.created_at as appointment_created_at','users.name as customer_name')
            ->where($table_name.'.status', '!=', 9)
            ->where($table_name.'.appointment_status', '=','assigned')
            ->where($table_name.'.executive_id', '=',Auth::user()->id)
            ->orderBy($table_name.'.id', 'DESC');

       }
       else
       {


        $count = Appointment::join('users', 'users.id', '=', 'appointments.customer_id')
            ->select('appointments.appointment_code','appointments.executive_meeting_url','appointments.created_at as appointment_created_at','users.name')
            ->where($table_name.'.status', '!=', 9)
            ->where($table_name.'.appointment_status', '=','assigned')
            ->count();

            $records = Appointment::join('users as u1', 'u1.id', '=', 'appointments.customer_id')
            ->join('users as u2', 'u2.id', '=', 'appointments.executive_id')
            ->select('appointments.appointment_code','appointments.executive_meeting_url','appointments.created_at as appointment_created_at','u1.name as customer_name','u2.name as executive_name')
            ->where($table_name.'.status', '!=', 9)
             ->where($table_name.'.appointment_status', '=','assigned')
            ->orderBy($table_name.'.id', 'DESC');
            

       }


         //  print_r($records);die;

   
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
            'count' => $count,
            'records' => $records,
            'perpage' => $perpage,
            ]);
        } else {
            return view($current_menu.'.index', [
            'current_menu'=>$current_menu,
            'table_name'=>$table_name,
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
    /*
    AJAX request
    */
    public function getMeetings(Request $request){
        $current_menu = $this->current_menu;
        $table_name = 'meetings';
        $id = $request->id;

        $meetings = DB::table($table_name)
            ->join('users', 'users.id', '=', 'meetings.executive_id')
            ->select('users.*', 'meetings.*', DB::raw("CONCAT_WS(' ', users.first_name, users.middle_name, users.last_name) as full_name"))
            ->where($table_name.'.appointment_id', '=', $request->id)
            ->where($table_name.'.status', '!=', 9)
            ->orderBy($table_name.'.id', 'DESC')
            ->get();
        $response = array();
        foreach($meetings as $value){
         $response[] = array("id"=>$value->id,"first_name"=>$value->first_name,"full_name"=>$value->full_name,"returncode"=>$value->returncode,"meetingID"=>$value->meetingID,"internalMeetingID"=>$value->internalMeetingID,"parentMeetingID"=>$value->parentMeetingID,"attendeePW"=>$value->attendeePW,"moderatorPW"=>$value->moderatorPW,"createTime"=>$value->createTime,"voiceBridge"=>$value->voiceBridge,"dialNumber"=>$value->dialNumber,"createDate"=>$value->createDate, "hasUserJoined"=>$value->hasUserJoined,"duration"=>$value->duration,"hasBeenForciblyEnded"=>$value->hasBeenForciblyEnded,"messageKey"=>$value->messageKey,"message"=>$value->message,"created_at"=>$value->created_at,"created_by"=>$value->created_by);
        }
        return response()->json($response);
    }
    public function startMeeting(Request $request){
        $startMeetingUrl = \Bigbluebutton::start([
            'meetingID' => $request->meetingID,
            'userName' => $request->first_name, //for join meeting 
            'password' => $request->moderatorPW, //moderator password set here
            'redirect' => true // only want to create and meeting and get join url then use this parameter 
        ]);
        if ($startMeetingUrl) {
            $data['code'] = 200;
            $data['result'] = 'success';
            $data['message'] = 'Action completed';
            $data['startMeetingUrl'] = $startMeetingUrl;
        } else {
            $data['code'] = 401;
            $data['result'] = 'failure';
            $data['message'] = 'Unauthorized request';
        }
        return json_encode($data);
    }
    public function isMeetingRunning(Request $request){
        $isMeetingRunning = Bigbluebutton::isMeetingRunning($request->meetingID); //second way 
        if ($isMeetingRunning) {
            $data['code'] = 200;
            $data['result'] = 'success';
            $data['message'] = 'Action completed';
        } else {
            $data['code'] = 401;
            $data['result'] = 'failure';
            $data['message'] = 'Unauthorized request';
        }
        return json_encode($data);
    }
    public function closeMeeting(Request $request){
        $closeMeeting = Bigbluebutton::close([
            'meetingID' => $request->meetingID,
            'moderatorPW' => $request->moderatorPW, //moderator password set here
        ]);
        if ($closeMeeting) {
            $data['code'] = 200;
            $data['result'] = 'success';
            $data['message'] = 'Action completed';
        } else {
            $data['code'] = 401;
            $data['result'] = 'failure';
            $data['message'] = 'Unauthorized request';
        }
        return json_encode($data);
    }
}
