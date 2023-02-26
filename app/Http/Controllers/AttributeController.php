<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use DataTables;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\AttributeMaster;
use App\AttributeType;
use App\AttributeValue;
use App\ProductCategory;
use App\Helpers\Helper;
use Attribute;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class AttributeController extends Controller
{

    public function __construct()
    {
        $this->current_menu='attribute';
        $this->table_name='attribute_masters';
        $this->base = 'admin';
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

         $count = AttributeMaster::where('status','<>','9')->count();

         $records = AttributeMaster::where('status','<>','9')->orderBy('list_order','asc')->get();


         if ($request->ajax()) {

             $datatables = Datatables::of($records)
                 ->addIndexColumn()
                 ->editColumn('created_at',function($row){
                     return date('Y-m-d h:i A',strtotime($row->created_at));
                 })
                 ->editColumn('type',function($row){
                     $att_type = AttributeType::where('id',$row->type_id)->first();
                    return $att_type!=NULL ? ucwords($att_type->name) : '--';
                })
                ->editColumn('category',function($row){
                    $category = Helper::get_category_data($row->category_id);
                    return $category!=NULL ? $category->name : '--';
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
                     $datatables = $datatables->rawColumns(['status','type','category', 'action'])->make(true);
                 } else {
                     $datatables = $datatables->rawColumns(['status','type','category'])->make(true);
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
        $productCategory = ProductCategory::where('product_categories'.'.status', '!=', 9)
                            ->where('parent_id',0)
                            ->get();
        $attribute_types = AttributeType::get();
        return view($current_menu.'.create', [
        'current_menu'=>$current_menu,
        'productCategory' =>  $productCategory,
        'attribute_types' => $attribute_types
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
            'name' => 'required',
            'type' => 'required',
            'category' => 'required',
            'list_order' => 'nullable|integer|min:0',
        ]
        );

        DB::beginTransaction();

        $data=[
            'name' => $request->input('name'),
            'type_id' => $request->type,
            'category_id' => $request->category,
            'list_order' => $request->list_order!=NULL ? $request->list_order : 0,
            'created_at' => date('Y-m-d H:i:s')
        ];

        $query = AttributeMaster::create($data);

        if ($query) {
            DB::commit();
            Session::flash('message', 'Attribute Created Successfully!');
            Session::flash('alert-class', 'alert-success');
        }
        else
        {
            DB::rollback();
            Session::flash('message', 'Something went wrong!');
            Session::flash('alert-class', 'alert-danger');
        }

        //return redirect()->intended($base.'/'.$current_menu);

        return redirect()->route('admin.attribute.index');
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

        $records = AttributeMaster::where($table_name.'.id', $decrypt_id)->first();

        $productCategory = ProductCategory::where('product_categories'.'.status', '!=', 9)
                            ->where('parent_id',0)
                            ->get();

        $attribute_types = AttributeType::get();

        return view($current_menu.'.edit', [
        'current_menu'=>$current_menu,
        'encrypt_id'=>$id,
        'records' => $records,
        'productCategory' =>  $productCategory,
        'attribute_types' => $attribute_types
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
            'name' => 'required',
            'type' => 'required',
            'category' => 'required',
            'list_order' => 'nullable|integer|min:0',
        ]
        );

        DB::beginTransaction();

        $data=[
            'name' => $request->input('name'),
            'type_id' => $request->type,
            'category_id' => $request->category,
            'list_order' => $request->list_order!=NULL ? $request->list_order : 0,
            'updated_at' => date('Y-m-d H:i:s')
        ];

        $query = AttributeMaster::where($table_name.'.id', $decrypt_id)->update($data);

        if ($query) {
            DB::commit();
            Session::flash('message', 'Attribute Updated Successfully!');
            Session::flash('alert-class', 'alert-success');
        }
        else
        {
            DB::rollback();
            Session::flash('message', 'Something went wrong!');
            Session::flash('alert-class', 'alert-danger');
        }

        //return redirect()->intended($base.'/'.$current_menu);

        return redirect()->route('admin.attribute.index');

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

    public function createValue(Request $request)
    {
        $current_menu = 'attribute-value';

        $attribute_values = AttributeValue::Distinct('attribute_id')->where('status',1)->get()->pluck('attribute_id')->all();

        $attributes = AttributeMaster::where('status','<>',9);
                        if(count($attribute_values)>0)
                        {
                            $attributes->whereNotIn('id',$attribute_values);
                        }
        $attributes =  $attributes->get();
        return view('attribute.'.$current_menu.'-create', [
        'current_menu'=>$current_menu,
        'attributes' =>  $attributes,
        ]);
    }

    public function storeValue(Request $request)
    {
        $current_menu = 'attribute-value';
        $table_name = 'attribute_values';
        $base = $this->base;

        $rules = [
            'attribute_name' => 'required',
            'name' => 'required',
            'name.*' => 'required|min:1',
        ];

        $custom= [
            'name.*.required' => 'Value Name Field is Required',
            'name.*.min' => 'Name Must be Atleast 1 Character'
        ];

        $validator = Validator::make($request->all(),$rules,$custom);

        if($validator->fails())
        {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ]);
        }

        DB::beginTransaction();

        $name = $request->input('name');

        if($name!=NULL && count($name)>0)
        {
            foreach($name as $value)
            {
                $data = [
                    'attribute_id' => $request->input('attribute_name'),
                    'name' => $value,
                    'created_at' => date('Y-m-d H:i:s')
                ];

                 AttributeValue::create($data);

            }

            DB::commit();
            Session::flash('message', 'Attribute Value created successfully!');
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

    }
}
