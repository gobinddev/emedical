<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Order;
use App\OrderItem;
use DataTables;
use App\Customer;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

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
        $this->base = 'vendor';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user_id = Auth::guard('vendor')->user()->id;
        $current_menu = $this->current_menu;
        $table_name = $this->table_name;

        $modules = array();

        $count = Order::where('status','<>','0')->where('vendor_id',$user_id)->count();

        $records = Order::where('status','<>','0')->where('vendor_id',$user_id)->orderBy('id','desc')->get();

        if ($request->ajax()) {

            $datatables = Datatables::of($records)
                ->addIndexColumn()
                ->editColumn('order_no',function($row){
                    return '#'.$row->order_no;
                })
                ->editColumn('order_date',function($row){
                    return date('D, M d, Y h:i A',strtotime($row->ordered_at));
                })
                ->editColumn('delivery_boy',function($row){
                    return '<a data-link="" class="ajax-modal-btn btn btn-sm btn-flat btn-default" data-toggle="tooltip"
                                data-placement="top" title="Assign Delivery Boy" style="cursor: pointer;">
                                <i class="fa fa-user"></i> Assign
                            </a>';
                })
                ->editColumn('customer',function($row){
                    $name = '--';
                    $customer = Customer::where('id',$row->user_id)->first();
                    if($customer !=NULL)
                    {
                        $name = $customer->display_name;
                    }

                    return $name;
                })
                ->editColumn('grand_total',function($row){
                    return '$ '.$row->total_price;
                })
                ->editColumn('payment',function($row){
                    if($row->is_paid==1)
                    {
                        return '<span class="label label-info">PAID</span>';
                    }
                    else
                    {
                        return '<span class="label label-danger">UNPAID</span>';
                    }
                })
                ->editColumn('status', function ($row) {
                    if ($row->status == 1) {
                        return '<span class="label label-warning">Processing</span>';
                    }
                    elseif ($row->status == 2) {
                        return '<span class="label label-warning">Confirmed</span>';
                    }
                    elseif ($row->status == 3) {
                        return '<span class="label label-warning">Completed</span>';
                    }
                    elseif ($row->status == 4) {
                        return '<span class="label label-warning">On Hold</span>';
                    }
                    elseif ($row->status == 5) {
                        return '<span class="label label-danger">Cancelled</span>';
                    }
                    elseif ($row->status == 6) {
                        return '<span class="label label-danger">Return</span>';
                    }
                });
                if (true) {
                    $datatables = $datatables->addColumn('action', function($row) use ($modules, $current_menu, $table_name) {
                        if (true) {
                            $encrypt_id = Crypt::encryptString($row->id);
                            $url = url('vendor/'.$current_menu.'/detail'.'/'.$encrypt_id);
                            $action2 = '<a href="'.$url.'" class="btn btn-success" type="button" title="Order Details"><i class="fa fa-expand"></i></a> ';
                        } else {
                            $action2 = ' ';
                        }
                        $action = $action2;
                        return $action;
                    });
                }

                $datatables = $datatables->rawColumns(['delivery_boy','order_date','customer','grand_total','payment','status','action'])->make(true);

            return $datatables;
        }

        return view('vendor_module.'.$current_menu.'.index', [
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

        return view('vendor_module.'.$current_menu.'.detail', [
            'current_menu'=>$current_menu,
            'order' => $order,
            'order_items' => $order_items
        ]);
    }


}
