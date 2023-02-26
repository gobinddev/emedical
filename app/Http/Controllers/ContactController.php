<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use DataTables;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\ContactUs;


class ContactController extends Controller
{

    public function __construct()
    {
        $this->current_menu='contact';
        $this->table_name='contact_us';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $current_menu = $this->current_menu;

        $table_name = $this->table_name;

        $modules = array();

        $count = ContactUs::count();
 
        $records = ContactUs::orderBy('created_at','desc')->get();
        
        if ($request->ajax()) {
            $datatables = Datatables::of($records)
                 ->addIndexColumn()
                 ->editColumn('created_at',function($row){
                     return date('Y-m-d h:i A',strtotime($row->created_at));
                 })->make(true);
                 
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
}

?>