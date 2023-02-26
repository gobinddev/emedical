<?php

namespace App\Http\Controllers;

use App\DocumentLibrary;
use Illuminate\Http\Request;
use DB;
use DataTables;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class DocumentLibraryController extends Controller
{

    public function __construct()
    {
        $this->current_menu='document_library';
        $this->table_name='document_library';
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

         $count = DocumentLibrary::where('status','<>','9')->count();

         $records = DocumentLibrary::where('status','<>','9')->get();

         if ($request->ajax()) {

             $datatables = Datatables::of($records)
                 ->addIndexColumn()
                 ->editColumn('document', function ($row) {
                    if ($row->document_type == 1) {
                        return '<div class="embed-responsive embed-responsive-16by9">
                                    <iframe class="embed-responsive-item" src="'.$row->document.'" title="'.$row->document.'" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen="" class="lozad" data-loaded="true"></iframe>
                                </div>';
                    }
                    else {
                        if(stripos($row->document,'pdf')!==false)
                            return '<img src="'.asset('images/icon_pdf.png').'" width=200px height=100px title="'.$row->document.'" alt="image">';
                        else
                            return '<img src="'.asset('uploads/document_library/'.$row->document).'" width=200px height=100px title="'.$row->document.'" alt="image">';
                    }
                })
                 ->editColumn('document_type', function ($row) {
                    if ($row->document_type == 1) {
                        return '<span class="badge badge-success">Video</span>';
                    } else {
                        return '<span class="badge badge-warning">Document</span>';
                    }
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
                     $datatables = $datatables->rawColumns(['document','document_type','status', 'action'])->make(true);
                 } else {
                     $datatables = $datatables->rawColumns(['document','document_type','status'])->make(true);
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

        $product_categories = DB::table('product_categories')
            ->where('product_categories.status', '=', 1)
            ->where('parent_id',0)
            ->pluck('product_categories.name as product_category_name', 'product_categories.id as product_category_id');

        return view($current_menu.'.create', [
        'current_menu'=>$current_menu,
        'product_categories' => $product_categories,
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

        $document_type = 0;

        // $request->validate([
        //     'title' => 'required|regex:/^[a-zA-Z ]+$/u|min:1|max:255',
        //     'document_type' => 'required|in:0,1'
        // ]
        // );

        $rules = [
            'category' => 'required',
            'title' => 'required|regex:/^[a-zA-Z0-9 ]+$/u|min:1|max:255',
            'document_type' => 'required|in:0,1'
        ];

        $validator = Validator::make($request->all(),$rules);

        if($validator->fails())
        {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ]);
        }

        if($request->document_type==0)
        {
            // $request->validate([
            //     'document' => 'required|mimes:jpg,jpeg,png,gif,bmp,svg,pdf|max:20000'
            // ]
            // );

            $rules = [
                'document' => 'required|mimes:jpg,jpeg,png,gif,bmp,svg,pdf|max:20000'
            ];

            $validator = Validator::make($request->all(),$rules);

            if($validator->fails())
            {
                return response()->json([
                    'success' => false,
                    'errors' => $validator->errors()
                ]);
            }
        }
        elseif($request->document_type==1)
        {
            // $request->validate([
            //     'video_url' => 'required|url'
            // ]
            // );

            $rules = [
                'video_url' => 'required|url'
            ];

            $validator = Validator::make($request->all(),$rules);

            if($validator->fails())
            {
                return response()->json([
                    'success' => false,
                    'errors' => $validator->errors()
                ]);
            }
        }

        $video_url = $request->video_url;

        $document_type = $request->document_type;

        DB::beginTransaction();

        if($request->file('document')){

            $file = $request->file('document');
            $date = date('YmdHis');
            $no = str_shuffle('123456789023456789034567890456789905678906789078908909000987654321987654321876543217654321654321543214321321211');
            $random_no = substr($no, 0, 2);
            $final_file_name = $date.$random_no.'.'.$file->getClientOriginalExtension();
            $destination_path = public_path('/uploads/document_library/');
            if(!File::exists($destination_path))
            {
                File::makeDirectory($destination_path,0777,true,true);
            }

            $file->move($destination_path , $final_file_name);

       }

        $data=[
            'category_id' => $request->input('category'),
            'title' => $request->input('title'),
            'document_type' => $document_type,
            'document' => $request->document_type==0 ? (!empty($final_file_name)?$final_file_name:NULL) : $video_url,
            'created_by' => Auth::user()->id,
            'created_at' => date('Y-m-d H:i:s')
        ];

        $query = DocumentLibrary::create($data);

        if ($query) {
            DB::commit();
            Session::flash('message', 'Library Created Successfully!');
            Session::flash('alert-class', 'alert-success');
        }
        else
        {
            DB::rollback();
            Session::flash('message', 'Something went wrong!');
            Session::flash('alert-class', 'alert-danger');
        }

        return response()->json([
            'success' => true
        ]);

        //return redirect()->intended($base.'/'.$current_menu);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DocumentLibrary  $documentLibrary
     * @return \Illuminate\Http\Response
     */
    public function show(DocumentLibrary $documentLibrary)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DocumentLibrary  $documentLibrary
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

        $current_menu = $this->current_menu;
        $table_name = $this->table_name;
        $decrypt_id = Crypt::decryptString($id);

        $product_categories = DB::table('product_categories')
        ->where('product_categories.status', '=', 1)
        ->where('parent_id',0)
        ->pluck('product_categories.name as product_category_name', 'product_categories.id as product_category_id');

        $records = DocumentLibrary::where($table_name.'.id', $decrypt_id)->first();

        return view($current_menu.'.edit', [
            'current_menu'=>$current_menu,
            'encrypt_id'=>$id,
            'records' => $records,
            'product_categories' => $product_categories,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DocumentLibrary  $documentLibrary
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $current_menu = $this->current_menu;
        $table_name = $this->table_name;
        $decrypt_id = Crypt::decryptString($id);
        $base = $this->base;

        $document_type = 0;

        // $request->validate([
        //     'title' => 'required|regex:/^[a-zA-Z ]+$/u|min:1|max:255',
        //     'document_type' => 'required|in:0,1'
        // ]
        // );

        $rules = [
            'category' => 'required',
            'title' => 'required|regex:/^[a-zA-Z0-9 ]+$/u|min:1|max:255',
            'document_type' => 'required|in:0,1'
        ];

        $validator = Validator::make($request->all(),$rules);

        if($validator->fails())
        {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ]);
        }

        $library = DB::table($table_name)->where('id',$decrypt_id)->first();

        if($library->document_type!=$request->document_type)
        {
            if($request->document_type==0)
            {
                // $request->validate([
                //     'document' => 'required|mimes:jpg,jpeg,png,gif,bmp,svg,pdf|max:20000'
                // ]
                // );

                $rules = [
                    'document' => 'required|mimes:jpg,jpeg,png,gif,bmp,svg,pdf|max:20000'
                ];

                $validator = Validator::make($request->all(),$rules);

                if($validator->fails())
                {
                    return response()->json([
                        'success' => false,
                        'errors' => $validator->errors()
                    ]);
                }
            }
            elseif($request->document_type==1)
            {
                // $request->validate([
                //     'document' => 'required|url'
                // ]
                // );

                $rules = [
                    'video_url' => 'required|url'
                ];

                $validator = Validator::make($request->all(),$rules);

                if($validator->fails())
                {
                    return response()->json([
                        'success' => false,
                        'errors' => $validator->errors()
                    ]);
                }
            }
        }
        else
        {
            if($request->document_type==0)
            {
                // $request->validate([
                //     'document' => 'nullable|mimes:jpg,jpeg,png,gif,bmp,svg,pdf|max:20000'
                // ]
                // );

                $rules = [
                    'document' => 'required|mimes:jpg,jpeg,png,gif,bmp,svg,pdf|max:20000'
                ];

                $validator = Validator::make($request->all(),$rules);

                if($validator->fails())
                {
                    return response()->json([
                        'success' => false,
                        'errors' => $validator->errors()
                    ]);
                }
            }
            elseif($request->document_type==1)
            {
                // $request->validate([
                //     'document' => 'nullable|mimes:mp4|max:50000'
                // ]
                // );

                $rules = [
                    'video_url' => 'required|url'
                ];

                $validator = Validator::make($request->all(),$rules);

                if($validator->fails())
                {
                    return response()->json([
                        'success' => false,
                        'errors' => $validator->errors()
                    ]);
                }
            }
        }


        $document_type = $request->document_type;

        $video_url = $request->video_url;

        DB::beginTransaction();

        if($request->file('document')){

            $file = $request->file('document');
            $date = date('YmdHis');
            $no = str_shuffle('123456789023456789034567890456789905678906789078908909000987654321987654321876543217654321654321543214321321211');
            $random_no = substr($no, 0, 2);
            $final_file_name = $date.$random_no.'.'.$file->getClientOriginalExtension();
            $destination_path = public_path('/uploads/document_library/');
            if(!File::exists($destination_path))
            {
                File::makeDirectory($destination_path,0777,true,true);
            }

            $file->move($destination_path , $final_file_name);

       }
       else
       {
            $final_file_name = $library->document;
       }

       $data=[
        'title' => $request->input('title'),
        'document_type' => $document_type,
        'document' => $request->document_type==0 ? (!empty($final_file_name)?$final_file_name:NULL) : $video_url,
        'updated_by' => Auth::user()->id,
        'updated_at' => date('Y-m-d H:i:s')
        ];

        $query = DocumentLibrary::where($table_name.'.id', $decrypt_id)->update($data);

        if ($query) {
            DB::commit();
            Session::flash('message', 'Library Updated Successfully!!');
            Session::flash('alert-class', 'alert-success');
        }
        else
        {
            DB::rollback();
            Session::flash('message', 'Something went wrong!');
            Session::flash('alert-class', 'alert-danger');
        }

       // return redirect()->intended($base.'/'.$current_menu);

       return response()->json([
            'success' => true
       ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DocumentLibrary  $documentLibrary
     * @return \Illuminate\Http\Response
     */
    public function destroy(DocumentLibrary $documentLibrary)
    {
        //
    }
}
