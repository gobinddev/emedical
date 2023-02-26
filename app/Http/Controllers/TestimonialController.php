<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Testimonial;
use DataTables;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
class TestimonialController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->current_menu='testimonial';
        $this->table_name='testimonials';
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
 
         $count = Testimonial::where('status','<>','9')->count();
 
         $records = Testimonial::where('status','<>','9')->get();   
         
 
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
            'author' => 'required',
            'message' => 'required',
            'image' => 'nullable|mimes:jpg,jpeg,png,gif,bmp,svg|max:20000',
        ]
        );

        if($request->file('image')){

            $image = $request->file('image');
            $date = date('YmdHis');
            $no = str_shuffle('123456789023456789034567890456789905678906789078908909000987654321987654321876543217654321654321543214321321211');
            $random_no = substr($no, 0, 2);
            $final_image_name = $date.$random_no.'.'.$image->getClientOriginalExtension();
            $destination_path = public_path('/uploads/testimonial/');
            if(!File::exists($destination_path))
            {
                File::makeDirectory($destination_path,0777,true,true);
            }

            $image->move($destination_path , $final_image_name);
            
       }

       DB::beginTransaction();
        
       $data=[
           'author' => $request->input('author'),
           'image' => !empty($final_image_name)?$final_image_name:NULL,
           'message' => $request->message,
           'created_at' => date('Y-m-d H:i:s')
       ];

       $query = Testimonial::create($data);

       if ($query) {
           DB::commit();
           Session::flash('message', 'Testimonial Created Successfully!');
           Session::flash('alert-class', 'alert-success');
       }
       else
       {
           DB::rollback();
           Session::flash('message', 'Something went wrong!');
           Session::flash('alert-class', 'alert-danger');
       }

       //return redirect()->intended($base.'/'.$current_menu);

       return redirect()->route('admin.testimonial.index');
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
         //
         $current_menu = $this->current_menu;
         $table_name = $this->table_name;
         $decrypt_id = Crypt::decryptString($id);
 
         $records = Testimonial::where($table_name.'.id', $decrypt_id)->first();
         
 
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
            'author' => 'required',
            'message' => 'required',
            'image' => 'nullable|mimes:jpg,jpeg,png,gif,bmp,svg|max:20000',
        ]
        );

        $testimonial = DB::table($table_name)->where('id',$decrypt_id)->first();
        if($request->file('image')){

            $image = $request->file('image');
            $date = date('YmdHis');
            $no = str_shuffle('123456789023456789034567890456789905678906789078908909000987654321987654321876543217654321654321543214321321211');
            $random_no = substr($no, 0, 2);
            $final_image_name = $date.$random_no.'.'.$image->getClientOriginalExtension();
            $destination_path = public_path('/uploads/testimonial/');
            if(!File::exists($destination_path))
            {
                File::makeDirectory($destination_path,0777,true,true);
            }

            $image->move($destination_path , $final_image_name);
            
       }
       else
       {
            $final_image_name = $testimonial->image;
       }

        DB::beginTransaction();

        $data=[
            'author' => $request->input('author'),
            'image' => !empty($final_image_name)?$final_image_name:NULL,
            'message' => $request->message,
            'updated_at' => date('Y-m-d H:i:s')
        ];

        $query = Testimonial::where($table_name.'.id', $decrypt_id)->update($data);

        if ($query) {
            DB::commit();
            Session::flash('message', 'Testimonial Updated Successfully!!');
            Session::flash('alert-class', 'alert-success');
        }
        else
        {
            DB::rollback();
            Session::flash('message', 'Something went wrong!');
            Session::flash('alert-class', 'alert-danger');
        }

        // return redirect()->intended($base.'/'.$current_menu);

        return redirect()->route('admin.testimonial.index');
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
