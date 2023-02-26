<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Order;
use App\OrderItem;
use App\Vendor;
use DataTables;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
class OrderController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->current_menu='order';
        $this->table_name='orders';
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

        $count = Order::where('status','<>','0')->count();

        $records = Order::where('status','<>','0')->orderBy('id','desc')->get();

        if ($request->ajax()) {

            $datatables = Datatables::of($records)
                ->addIndexColumn()
                ->editColumn('ordered_at',function($row){
                    return date('Y-m-d h:i A',strtotime($row->ordered_at));
                })
                ->editColumn('payment_method',function($row){
                    if($row->payment_method==1)
                    {
                        return 'Cash on Delivery';
                    }
                    elseif($row->payment_method==2)
                    {
                        return 'Paypal';
                    }
                })
                ->editColumn('is_paid',function($row){
                    if($row->is_paid==0)
                    {
                        return 'Unpaid';
                    }
                    elseif($row->is_paid==1)
                    {
                        return 'Paid';
                    }
                })
                ->editColumn('total_price',function($row){
                    return '$ '.$row->total_price;
                })
                ->editColumn('vendor',function($row){
                    if($row->vendor_id!=NULL)
                    {
                        $vendor = Vendor::where('id',$row->vendor_id)->first();

                        return '<span class="badge badge-info">'.$vendor->business_name.'</span>';
                    }
                })
                ->editColumn('status', function ($row) {
                    if ($row->status == 1) {
                        return '<span class="badge badge-warning">Processing</span>';
                    }
                    elseif ($row->status == 2) {
                        return '<span class="badge badge-warning">Confirmed</span>';
                    }
                    elseif ($row->status == 3) {
                        return '<span class="badge badge-warning">Completed</span>';
                    }
                    elseif ($row->status == 4) {
                        return '<span class="badge badge-warning">On Hold</span>';
                    }
                    elseif ($row->status == 5) {
                        return '<span class="badge badge-danger">Cancelled</span>';
                    }
                    elseif ($row->status == 6) {
                        return '<span class="badge badge-danger">Return</span>';
                    }
                });
                if (true) {
                    $datatables = $datatables->addColumn('action', function($row) use ($modules, $current_menu, $table_name) {
                        if (true) {
                            $encrypt_id = Crypt::encryptString($row->id);
                            $url = url('admin/'.$current_menu.'/detail'.'/'.$encrypt_id);
                            $action2 = '<a href="'.$url.'" class="btn btn-success" type="button" title="Order Details"><i class="nav-icon i-Reset"></i></a> ';
                            $action1 = '<button class="btn btn-info order_status" data-id="'.$encrypt_id.'" title="Order Status"><i class="nav-icon i-Pen-2"></i></button> ';
                        } else {
                            $action1 = '';
                            $action2 = ' ';
                        }
                        $action = $action1.$action2;
                        return $action;
                    });
                }
                if(true){
                    $datatables = $datatables->rawColumns(['payment_method','is_paid','vendor','total_price','status','action'])->make(true);
                } else {
                    $datatables = $datatables->rawColumns(['payment_method','is_paid','vendor','status','total_price'])->make(true);
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

    public function details(Request $request)
    {
        $current_menu = $this->current_menu;

        $decrypt_id = Crypt::decryptString($request->id);

        $order = Order::where('id',$decrypt_id)->first();

        $order_items = OrderItem::from('order_items as oi')
                        ->select('oi.*')
                        ->join('orders as o','o.id','=','oi.order_id')
                        ->where('oi.order_id',$decrypt_id)
                        ->get();

        return view($current_menu.'.detail', [
            'current_menu'=>$current_menu,
            'order' => $order,
            'order_items' => $order_items
            ]);
    }

    public function status(Request $request)
    {
        $decrypt_id = Crypt::decryptString($request->id);

        if($request->isMethod('get'))
        {
            $order = Order::select('order_no','status')->where('id',$decrypt_id)->first();

            return response()->json([
                'success' => true,
                'data' => $order
            ]);
        }

        $rules = [
            'status' => 'required',
        ];

        $validator = Validator::make($request->all(),$rules);

        if($validator->fails())
        {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ]);
        }

        DB::beginTransaction();

        $query=Order::where('id',$decrypt_id)->update([
            'status' => $request->status
        ]);

        if ($query) {
            DB::commit();
            Session::flash('message', 'Order Status Updated Successfully!!');
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
}
