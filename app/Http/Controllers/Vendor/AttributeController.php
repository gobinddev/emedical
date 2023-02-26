<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\AttributeMaster;
use App\AttributeType;
use App\AttributeValue;
use App\ProductCategory;
use App\Helpers\Helper;
use DB;
use DataTables;

class AttributeController extends Controller
{
    //

    public function index(Request $request){

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
                    return $category!=NULL ? '<span class="label label-info">'.$category->name.'</span>' : '--';
                })
                ->editColumn('status', function ($row) {
                    if ($row->status == 1) {
                        return '<span class="label label-success">Active</span>';
                    } else {
                        return '<span class="label label-warning">Inactive</span>';
                    }
                });
                // if(true){
                    $datatables = $datatables->rawColumns(['status','type','category'])->make(true);
                // } else {
                //     $datatables = $datatables->rawColumns(['status','type','category'])->make(true);
                // }
            return $datatables;
        }

        return view('vendor_module.attributes.index',compact('records'));
    }
}
