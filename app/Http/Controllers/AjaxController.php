<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use Auth;
use App\AttributeMaster;
use App\UserProductAttribute;
use Illuminate\Support\Facades\Crypt;

class AjaxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function takeChangeStatusAction(Request $request)
    {
        $table_name = $request->table_name;
        $id = $request->id;
        $status = $request->status;

        if ($request->ajax() && !empty($table_name) && !empty($id) && isset($status)) {

            if ($status == 0) {
                $new_status = 1;
            }
            else {
                $new_status = 0;
            }

            DB::beginTransaction();

            $query = DB::table($table_name)->where('id', $id)->update(['status' => $new_status, 'updated_at'=>date('Y-m-d H:i:s')]);

            if ($query) {
                #commit transaction
                DB::commit();
                $data['code'] = 200;
                $data['result'] = 'success';
                $data['message'] = 'Action completed';
            }

            else
            {
                #rollback transaction
                DB::rollback();
                $data['code'] = 401;
                $data['result'] = 'failure';
                $data['message'] = 'Action can not be completed';
            }

        }

        else {
            $data['code'] = 401;
            $data['result'] = 'failure';
            $data['message'] = 'Unauthorized request';
        }

        return json_encode($data);
    }

    public function takeDeleteAction(Request $request)
    {
        $table_name = $request->table_name;
        $id = $request->id;

        if ($request->ajax() && !empty($table_name) && !empty($id)) {

            DB::beginTransaction();

            $query = DB::table($table_name)->where('id', $id)->update(['status' => 9, 'deleted_at'=>date('Y-m-d H:i:s')]);

            if ($query) {
                #commit transaction
                DB::commit();
                $data['code'] = 200;
                $data['result'] = 'success';
                $data['message'] = 'Action completed';
            }

            else
            {
                #rollback transaction
                DB::rollback();
                $data['code'] = 401;
                $data['result'] = 'failure';
                $data['message'] = 'Action can not be completed';
            }

        }

        else {
            $data['code'] = 401;
            $data['result'] = 'failure';
            $data['message'] = 'Unauthorized request';
        }

        return json_encode($data);
    }

    public function assignExecutiveToCustomer(Request $request)
    {
        $id = $request->id;
        $customer_first_name = $request->customer_first_name;
        $executive_id = $request->executive_id;
        $executive_first_name = User::where('users.id', '=', $executive_id)
            ->value('users.first_name');
        $appointment_date_time = date('Y-m-d H:i:s', strtotime($request->appointment_date_time));

        if ($request->ajax() && !empty($id) && !empty($executive_id) && !empty($appointment_date_time)) {

            DB::beginTransaction();

          $appointment = DB::table('appointments')
                            ->where('id', '=', $id)
                            ->select('appointment_code')->first();
          $appointment_code = $appointment->appointment_code;

           $executive = DB::table('users')
            ->where('role_id', '=', 3)
            ->where('id', '=', $executive_id)
            ->select('name','email')->first();


          $query1 = DB::table('appointments')->where('id', $id)->update(['executive_id' => $executive_id, 'appointment_date_time' => $appointment_date_time, 'customer_meeting_url' => 'https://onlinevideo.khannajeweller.com/'.$appointment_code, 'executive_meeting_url' => 'https://onlinevideo.khannajeweller.com/'.$appointment_code.'#userInfo.displayName=%22'.$executive->name.'%22&userInfo.email=%22'.$executive->email.'%22', 'updated_at' => date('Y-m-d H:i:s'), 'updated_by' => Auth::user()->id, 'appointment_status' => 'assigned']);
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

         if ($query1) {




                        $data['code'] = 200;
                        $data['result'] = 'success';
                        $data['message'] = 'Action completed';

                   }

            else
            {
                        #rollback transaction
                        DB::rollback();
                        $data['code'] = 401;
                        $data['result'] = 'failure';
                        $data['message'] = 'Action can not be completed';
            }


        }

        else {
            $data['code'] = 401;
            $data['result'] = 'failure';
            $data['message'] = 'Unauthorized request';
        }

        return json_encode($data);
    }


    public function addMultipleCustomer(Request $request)
    {



        if ($request->ajax() && !empty($request->customers_id) && !empty($request->class_id)) {
          $appointment_data = DB::table('appointments')
                             ->where('class_id', '=', $request->class_id)
                             ->first();
                     foreach ($request->customers_id as $value)
                     {
                                        $temp_array = [
                                        'appointment_code' => $appointment_data->appointment_code,
                                        'description' => !empty($appointment_data->description)?$appointment_data->description:'',
                                        'customer_id' => !empty($value)?$value:0,
                                        'executive_id' => !empty($appointment_data->executive_id)?$appointment_data->executive_id:0,
                                        'appointment_date_time' => date('Y-m-d H:i:s', strtotime($appointment_data->appointment_date_time)),
                                        'appointment_status' => 'assigned',
                                        'created_at' => date('Y-m-d H:i:s'),
                                        'customer_meeting_url' => '',
                                        'executive_meeting_url' =>$appointment_data->executive_meeting_url,
                                        'recording_url'=>$appointment_data->recording_url,
                                        'class_id'=>$appointment_data->class_id,
                                        'created_by' => Auth::user()->id,
                                        'updated_at' => date('Y-m-d H:i:s'),
                                        'updated_by' => Auth::user()->id,
                                        'status' => !empty($appointment_data->status)?$appointment_data->status:0,
                                    ];

                            $getId = DB::table('appointments')->insertGetId($temp_array);

                            $dataV=DB::table('appointments')->where(['id'=>$getId])->get();
                        foreach ($dataV AS $valueC){
                            $attendee = '';
                            $class_id = $valueC->class_id;
                            $name=DB::table('users')->where(['id'=>$value])->first();
                            $attendee = "<attendee_list>
                                            <attendee>
                                                <attendee_id><![CDATA[$valueC->customer_id]]></attendee_id>
                                                <screen_name><![CDATA[$name->name]]></screen_name>
                                                <language_culture_name><![CDATA[es-ES]]></language_culture_name>
                                            </attendee>
                                        </attendee_list>";


                            WiziqAddAttendee($class_id,$attendee,$getId);
                        }

                    }



         if ($getId) {




                        $data['code'] = 200;
                        $data['result'] = 'success';
                        $data['message'] = 'Action completed';

                   }

            else
            {
                        #rollback transaction

                        $data['code'] = 401;
                        $data['result'] = 'failure';
                        $data['message'] = 'Action can not be completed';
            }


        }

        else {
            $data['code'] = 401;
            $data['result'] = 'failure';
            $data['message'] = 'Unauthorized request';
        }

        return json_encode($data);
    }
    public function takeBannerChangeAction(Request $request)
    {
        $table_name = $request->table_name;
        $id = $request->id;

        if ($request->ajax() && !empty($table_name) && !empty($id)) {

            DB::beginTransaction();

            DB::table($table_name)->update(['is_banner' => 'no']);

            $query_1 = DB::table($table_name)->where('id', $id)->update(['is_banner' => 'yes', 'updated_at'=>date('Y-m-d H:i:s')]);

            if ($query_1) {
                #commit transaction
                DB::commit();
                $data['code'] = 200;
                $data['result'] = 'success';
                $data['message'] = 'Action completed';
            }

            else
            {
                #rollback transaction
                DB::rollback();
                $data['code'] = 401;
                $data['result'] = 'failure';
                $data['message'] = 'Action can not be completed';
            }
        }

        else {
            $data['code'] = 401;
            $data['result'] = 'failure';
            $data['message'] = 'Unauthorized request';
        }

        return json_encode($data);
    }
    public function takeShowInSliderChangeAction(Request $request)
    {
        $table_name = $request->table_name;
        $id = $request->id;
        $show_in_slider = $request->show_in_slider;

        if ($request->ajax() && !empty($table_name) && !empty($id) && !empty($show_in_slider)) {

            DB::beginTransaction();

            $query_1 = DB::table($table_name)->where('id', $id)->update(['show_in_slider' => $show_in_slider, 'updated_at'=>date('Y-m-d H:i:s')]);

            if ($query_1) {
                #commit transaction
                DB::commit();
                $data['code'] = 200;
                $data['result'] = 'success';
                $data['message'] = 'Action completed';
            }

            else
            {
                #rollback transaction
                DB::rollback();
                $data['code'] = 401;
                $data['result'] = 'failure';
                $data['message'] = 'Action can not be completed';
            }
        }

        else {
            $data['code'] = 401;
            $data['result'] = 'failure';
            $data['message'] = 'Unauthorized request';
        }

        return json_encode($data);
    }

    public function categoryAttributeTable(Request $request)
    {
        $form = '';

        $category_attribute = AttributeMaster::where('category_id',$request->category_id)->where('status','<>','9')->orderBy('list_order','asc')->get();

        $thead = '';
        $tbody = '';

        $form='<table>';

        $attr = '';

        if(count($category_attribute)>0)
        {
            $thead.='<thead class="text-center">';

            $tbody.='<tbody id="tbody-attr">';

            foreach($category_attribute as $item)
            {
                // $attr.= '<input type="hidden" name="attr[]" class="attr" value="'.strtolower($item->name).'">';
                $thead.='<th>'.$item->name.'</th>';

                $tbody.='<td>
                            <input class="form-control" class="'.strtolower($item->name).'" type="text" name="'.strtolower($item->name).'[]">
                            <p style="margin-bottom:2px;" class="text-danger error_container error-'.strtolower($item->name).'" id="error-'.strtolower($item->name).'_0">
                        </td>';
            }

            $thead.='<th>SKU</th>
                     <th>Price <small>per qty</small></th>
                     <th>Discounted Price <small>per qty</small></th>
                     <th>Quantity</th>';

            $tbody.='<td>
                        <input class="form-control" class="sku" type="text" name="sku[]">
                        <p style="margin-bottom:2px;" class="text-danger error_container" id="error-sku_0">
                    </td>
                    <td>
                        <input class="form-control" class="price" type="text" name="price[]" value="0">
                        <p style="margin-bottom:2px;" class="text-danger error_container" id="error-price_0">
                    </td>
                    <td>
                        <input class="form-control" class="discounted_price" type="text" name="discounted_price[]" value="0">
                        <p style="margin-bottom:2px;" class="text-danger error_container" id="error-discounted_price_0">
                    </td>
                    <td>
                        <input class="form-control" class="quantity" type="number" name="quantity[]" value="1" min="1">
                        <p style="margin-bottom:2px;" class="text-danger error_container" id="error-quantity_0">
                    </td>
                    <td><button type="button" class="btn btn-info" id="addAttrBtn" data-id="'.Crypt::encryptString($request->category_id).'"> + </button></td>';

            $thead.='</thead>';

            $tbody.='</tbody>';
        }
        else
        {
            //$attr.= '<input type="hidden" name="attr[]" class="attr">';
            $thead='<thead class="text-center">
                        <th>SKU</th>
                        <th>Price <small>per qty</small></th>
                        <th>Discounted Price <small>per qty</small></th>
                        <th>Quantity</th>
                    </thead>';

            $tbody = '<tbody id="tbody-attr">
                            <td>
                                <input class="form-control" class="sku" type="text" name="sku[]">
                                <p style="margin-bottom:2px;" class="text-danger error_container" id="error-sku_0">
                            </td>
                            <td>
                                <input class="form-control" class="price" type="text" name="price[]" value="0">
                                <p style="margin-bottom:2px;" class="text-danger error_container" id="error-price_0">
                            </td>
                            <td>
                                <input class="form-control" class="discounted_price" type="text" name="discounted_price[]" value="0">
                                <p style="margin-bottom:2px;" class="text-danger error_container" id="error-discounted_price_0">
                            </td>
                            <td>
                                <input class="form-control" class="quantity" type="number" name="quantity[]" value="1" min="1">
                                <p style="margin-bottom:2px;" class="text-danger error_container" id="error-quantity_0">
                            </td>
                     </tbody>';
        }

        $form.=$thead.$tbody;

        $form.='</table>';

        return response()->json([
            'form' => $form
        ]);
    }

    public function checkCategoryAttribute(Request $request)
    {
        $decrypt_id = Crypt::decryptString($request->category_id);

        $attr_name = [];

        $category_attribute = AttributeMaster::where('category_id',$decrypt_id)->where('status','<>','9')->orderBy('list_order','asc')->get();

        $attr_name = array_map('strtolower', $category_attribute->pluck('name')->all());

        return response()->json([
            'attr' => $attr_name
        ]);
    }

    public function checkProductAttribute(Request $request)
    {
        $decrypt_id = Crypt::decryptString($request->product_id);

        $attr_name = [];

        $product_attribute = UserProductAttribute::where('product_id',$decrypt_id)->whereNotNull('attribute_id')->latest()->first();

        if($product_attribute)
        {
            $attr_name = explode(',',$product_attribute->attribute_name);
        }

        return response()->json([
            'attr' => $attr_name
        ]);
    }

    public function autocomplete(Request $request)
    {
        //$data_result = [];
        //dd($request->all());
        $url = '';
        $data = DB::table('user_products as u')->select('u.id','u.product_title')
                    ->where("u.product_title","LIKE","%{$request->title}%")
                    ->where('u.status','<>',9);
                    if($request->category!=NULL && $request->category!='')
                    {
                        $data->whereRaw('FIND_IN_SET(?,u.category_id)',[$request->category]);
                    }
                    $data=$data->get();


        // foreach($data as $item){
        //     $data_result[] = ['id'=>$item->id,'name'=>$item->product_title];
        // }

        // return response()->json($data_result);

        $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
        if(count($data)>0)
        {
            foreach($data as $row)
            {
                $output .= '<li data-id="'.Crypt::encryptString($row->id).'"><a href="'.url('/').'/product-detail/'.Crypt::encryptString($row->id).'">'.$row->product_title.'</a></li>';
            }

            foreach($data->take(1) as $row)
            {
                $url=url('/product-detail/'.Crypt::encryptString($row->id));
            }
        }
        $output .= '</ul>';

        //echo $output;

        return response()->json([
            'form' => $output,
            'url' => $url
        ]);
    }

    public function productVariantPrice(Request $request)
    {
        $product_variant_id = Crypt::decryptString($request->id);

        $product_attribute = UserProductAttribute::where('id',$product_variant_id)->first();

        return response()->json([
            'success'=>true,
            'price' => $product_attribute->discounted_price
        ]);
    }



    public function index()
    {
        //
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
