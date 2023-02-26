@include('layouts.front.header')
@php
use App\Helpers\Helper;
@endphp

  <div class="slider-area over-hidden">
                <div class="single-slider page-height3 d-flex align-items-center" data-background="images/bg/product.jpg">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-12  col-lg-12  col-md-12  col-sm-12 col-12 d-flex align-items-center justify-content-center">
                                <div class="page-title mt-10 text-center">
                                    <h2 class="text-capitalize font600 mb-10">Checkout</h2>
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb justify-content-center bg-transparent">
                                        <li class="breadcrumb-item"><a class="primary-color" href="index.html">Home</a></li>
                                        <li class="breadcrumb-item active text-capitalize" aria-current="page">Checkout</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

  <div class="my-account-area mb-130 mb-md-70 mb-sm-70 mb-xs-70 mb-xxs-70">
    <div class="container">
      <div class="row">
       @if(Session::has('message'))
        <div class="col-12 pb-3">
            <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
        </div>
        @endif
        @if(\Session::has('error'))
            <div class="col-12 pb-3">
              <div class="alert alert-danger">{{ \Session::get('error') }}</div>
              {{ \Session::forget('error') }}
            </div>
        @endif
        @if(\Session::has('success'))
          <div class="col-12 pb-3">
            <div class="alert alert-success">{{ \Session::get('success') }}</div>
            {{ \Session::forget('success') }}
          </div>
        @endif
        <div class="col-lg-12">
          <div class="row">
            <div class="col-lg-12 col-md-12">
              <div class="myaccount-tab-menu nav" role="tablist">
                <a href="#dashboad" class="active" data-toggle="tab">
                  Dashboard</a>
                <a href="#orders" data-toggle="tab"> Orders</a>
                <a href="#address-edit" data-toggle="tab"> address</a>
                <a href="#account-info" data-toggle="tab"> Account Details</a>
                <a href="#change-password" data-toggle="tab"> Change Password</a>
                <a href="{{Url('logout')}}"> Logout</a>
                <form id="logout-form" action="{{ Url('logout') }}" method="POST"
                          style="display: none;">{{ csrf_field() }}
                </form>
              </div>
            </div>
           
            <div class="col-lg-12 col-md-12">
              <div class="tab-content" id="myaccountContent">
                <div class="tab-pane fade show active" id="dashboad" role="tabpanel">
                  <div class="myaccount-content">
                    <h3>Dashboard</h3>
                    <div class="welcome">
                      <p>Hello, <strong>{{Session::get('user_name')}}</strong><a href="{{Url('logout')}}" class="logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> Logout</a>)</p>
                      <form id="logout-form" action="{{ Url('logout') }}" method="POST"
                                  style="display: none;">{{ csrf_field() }}
                        </form>
                    </div>

                    <p class="mb-0">From your account dashboard. you can easily check & view your recent orders, manage
                      your
                      shipping and billing addresses and edit your password and account details.</p>
                  </div>
                </div>
                <div class="tab-pane fade" id="orders" role="tabpanel">
                  <div class="myaccount-content">
                    <h3>Orders</h3>
                    <div class="myaccount-table table-responsive text-center">
                      <table class="table table-bordered">
                        <thead class="thead-light">
                          <tr>
                            <th>S.No</th>
                            <th>Order No.</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Payment Method</th>
                            <th>Payment Status</th>
                            <th>Total</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @if(count($orders)>0)
                            {{--<tr>
                              <td>1</td>
                              <td>Aug 22, 2018</td>
                              <td>Pending</td>
                              <td>$3000</td>
                              <td><a href="#" class="check-btn sqr-btn ">View</a></td>
                            </tr>
                            <tr>
                              <td>2</td>
                              <td>July 22, 2018</td>
                              <td>Approved</td>
                              <td>$200</td>
                              <td><a href="#" class="check-btn sqr-btn ">View</a></td>
                            </tr>
                            <tr>
                              <td>3</td>
                              <td>June 12, 2017</td>
                              <td>On Hold</td>
                              <td>$990</td>
                              <td><a href="#" class="check-btn sqr-btn ">View</a></td>
                            </tr>--}}
                            @foreach($orders as $key => $order)
                              @php
                                $status = 'Processing';

                                $payment_method = '--';

                                $pay_status = 'Unpaid';

                                $shipping_charge = 0;

                                if($order->status==2)
                                {
                                  $status = 'Confirmed';
                                }
                                elseif($order->status==3)
                                {
                                  $status = 'Completed';
                                }
                                elseif($order->status==4)
                                {
                                  $status = 'On Hold';
                                }
                                elseif($order->status==5)
                                {
                                  $status = 'Cancelled';
                                }
                                elseif($order->status==6)
                                {
                                  $status = 'Return';
                                }

                                if($order->payment_method==1)
                                {
                                  $payment_method = 'Cash On Delivery';
                                }
                                elseif($order->payment_method==2)
                                {
                                  $payment_method = 'Paypal';
                                }

                                if($order->mode==1)
                                {
                                   $shipping_charge = $order->shipping_charge;
                                }

                                if($order->is_paid==1)
                                {
                                  $pay_status = 'Paid';
                                }
                              @endphp
                              <tr>
                                <td>{{$key + 1}}</td>
                                <td>{{$order->order_no}}</td>
                                <td>{{date('M d, Y',strtotime($order->ordered_at))}}</td>
                                <td>{{$status}}</td>
                                <td>{{$payment_method}}</td>
                                <td>{{$pay_status}}</td>
                                <td>${{$order->total_price + $shipping_charge}}</td>
                                <td><a href="{{Url('order-detail',['id'=>Crypt::encryptString($order->id)])}}" class="check-btn sqr-btn ">View</a></td>
                              </tr>
                            @endforeach
                          @else
                            <tr>
                              <td colspan="7">No Order Data Found</td>
                            </tr>
                          @endif
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                {{--<div class="tab-pane fade" id="download" role="tabpanel">
                  <div class="myaccount-content">
                    <h3>Downloads</h3>
                    <div class="myaccount-table table-responsive text-center">
                      <table class="table table-bordered">
                        <thead class="thead-light">
                          <tr>
                            <th>Product</th>
                            <th>Date</th>
                            <th>Expire</th>
                            <th>Download</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>Haven - Free Real Estate PSD Template</td>
                            <td>Aug 22, 2018</td>
                            <td>Yes</td>
                            <td><a href="#" class="check-btn sqr-btn "><i class="fa fa-cloud-download"></i> Download
                                File</a></td>
                          </tr>
                          <tr>
                            <td>HasTech - Profolio Business Template</td>
                            <td>Sep 12, 2018</td>
                            <td>Never</td>
                            <td><a href="#" class="check-btn sqr-btn "><i class="fa fa-cloud-download"></i> Download
                                File</a></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>--}}
                <div class="tab-pane fade" id="payment-method" role="tabpanel">
                  <div class="myaccount-content">
                    <h3>Payment Method</h3>
                    <p class="saved-message">You Can't Saved Your Payment Method yet.</p>
                  </div>
                </div>
                <div class="tab-pane fade" id="address-edit" role="tabpanel">
                  <div class="myaccount-content">
                    <h3>Shipping Address</h3>
                    <div class="row">
                      @if(count($customer_addresses)>0)
                        @foreach($customer_addresses as $cust_addr)
                        @php
                          $city_data = Helper::get_city_data($cust_addr->city_id);
                          $state_data = Helper::get_state_data($cust_addr->state_id);
                        @endphp
                          <div class="col-3">
                            <address>
                              <p><strong>{{$cust_addr->name}}</strong></p>
                              <p>{{$cust_addr->address_line_1}} {{$cust_addr->address_line_2!=NULL ? ', '.$cust_addr->address_line_2 : ''}} <br>
                                 {{$cust_addr->pincode}}</p>
                              <p>Mobile: {{$cust_addr->phone}}</p>
                            </address>
                            <a href="javascript:void(0)" class="check-btn sqr-btn editAddr" data-id="{{Crypt::encryptstring($cust_addr->id)}}"><i class="fa fa-edit"></i> Edit Address</a>
                          </div>
                          @endforeach
                        @endif
                      <div class="col-3">
                        <a href="javascript:void(0)" class="check-btn sqr-btn addAttr"><i class="fa fa-plus"></i> Add Address</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade" id="account-info" role="tabpanel">
                  <div class="myaccount-content">
                    <h3>Account Details</h3>
                    <div class="account-details-form">
                      <form method="post" action="{{Url('customer.accountupdate')}}" id="accountfrm">
                        @csrf
                        <div class="row">
                          <div class="col-lg-6">
                            <div class="single-input-item">
                              <label for="first-name" class="required">First Name</label>
                              <input type="text" id="first-name" name="first_name" value=""/>
                              <p style="margin-bottom: 2px;" class="text-danger error-container error-first_name" id="error-first_name"></p>
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <div class="single-input-item">
                              <label for="last-name" class="required">Last Name</label>
                              <input type="text" id="last-name" name="last_name" value=""/>
                              <p style="margin-bottom: 2px;" class="text-danger error-container error-last_name" id="error-last_name"></p>
                            </div>
                          </div>
                        </div>
                        <div class="single-input-item">
                          <label for="display-name" class="required">Display Name</label>
                          <input type="text" id="display-name" name="display_name" value=""/ readonly>
                        </div>
                        <div class="single-input-item">
                          <label for="email" class="required">Email Address</label>
                          <input type="email" id="email" name="email" value="" readonly/>
                        </div>
                        {{--<fieldset>
                          <legend>Password change</legend>
                          <div class="single-input-item">
                            <label for="current-pwd" class="required">Current Password</label>
                            <input type="password" id="current-pwd" />
                          </div>
                          <div class="row">
                            <div class="col-lg-6">
                              <div class="single-input-item">
                                <label for="new-pwd" class="required">New Password</label>
                                <input type="password" id="new-pwd" />
                              </div>
                            </div>
                            <div class="col-lg-6">
                              <div class="single-input-item">
                                <label for="confirm-pwd" class="required">Confirm Password</label>
                                <input type="password" id="confirm-pwd" />
                              </div>
                            </div>
                          </div>
                        </fieldset>--}}
                        <div class="single-input-item">
                          <button type="submit" class="check-btn sqr-btn submit">Save Changes</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div> 
                <div class="tab-pane fade" id="change-password" role="tabpanel">
                  <div class="myaccount-content">
                    <h3>Change Password</h3>
                    <div class="account-details-form">
                      <form method="post" action="{{Url('customer.changepassword')}}" id="changepassfrm">
                        @csrf
                        <div class="row">
                          <div class="col-6">
                            <div class="single-input-item">
                              <label for="current-pwd" class="required">Current Password</label>
                              <input type="password" name="current_password" id="current-pwd" />
                              <p style="margin-bottom: 2px;" class="text-danger error-container error-current_password" id="error-current_password"></p>
                            </div>
                          </div>
                        </div>
                          <div class="row">
                            <div class="col-lg-6">
                              <div class="single-input-item">
                                <label for="new-pwd" class="required">New Password</label>
                                <input type="password" name="new_password" id="new-pwd" />
                                <p style="margin-bottom: 2px;" class="text-danger error-container error-new_password" id="error-new_password"></p>
                              </div>
                            </div>
                            <div class="col-lg-6">
                              <div class="single-input-item">
                                <label for="confirm-pwd" class="required">Confirm Password</label>
                                <input type="password" name="confirm_password" id="confirm-pwd" />
                                <p style="margin-bottom: 2px;" class="text-danger error-container error-confirm_password" id="error-confirm_password"></p>
                              </div>
                            </div>
                          </div>
                        <div class="single-input-item">
                          <button type="submit" class="check-btn sqr-btn submit">Save Changes</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div> 
              </div>
            </div> 
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="modal" id="bill_add_addr">
    <div class="modal-dialog modal-lg">
       <div class="modal-content">
          <!-- Modal Header -->
          <div class="modal-header">
             <div class="row w-100">
                <div class="col-11">
                  <h4 class="modal-title">Add Shipping Address </h4>
                </div>
                <div class="col-1">
                  <button type="button" class="close btn-disable" style="top: 12px;!important; color: red;" data-dismiss="modal"><small>×</small></button>
                </div>
             </div>
          </div>
          <!-- Modal body -->
          <form method="post" action="{{Url('customer.billingAddress.create')}}" id="bill_add_frm">
          @csrf
             <div class="modal-body">
               <div class="row">
                 <div class="col-6">
                    <div class="form-group">
                        <label for="label_name">Name : <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control name" placeholder="Enter Name"/>
                        <p style="margin-bottom: 2px;" class="text-danger error-container error-name" id="error-name"></p>
                    </div>
                 </div>
                 <div class="col-6">
                    <div class="form-group">
                        <label for="label_name">Email : <span class="text-danger">*</span></label>
                        <input type="text" name="email" class="form-control email" placeholder="Enter Email"/>
                        <p style="margin-bottom: 2px;" class="text-danger error-container error-email" id="error-email"></p>
                    </div>
                 </div>
                 <div class="col-6">
                    <div class="form-group">
                        <label for="label_name">Mobile : <span class="text-danger">*</span></label>
                        <input type="text" name="mobile" class="form-control mobile" placeholder="Enter Mobile"/>
                        <p style="margin-bottom: 2px;" class="text-danger error-container error-mobile" id="error-mobile"></p>
                    </div>
                 </div>
               </div>
               <div class="row">
                    <div class="col-12">
                      <div class="form-group">
                          <label for="label_name">Address Line 1 : <span class="text-danger">*</span></label>
                          <input type="text" name="address_line_1" class="form-control address_line_1"/>
                          <p style="margin-bottom: 2px;" class="text-danger error-container error-address_line_1" id="error-address_line_1"></p>
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="form-group">
                          <label for="label_name">Address Line 2 :</label>
                          <input type="text" name="address_line_2" class="form-control address_line_2"/>
                          <p style="margin-bottom: 2px;" class="text-danger error-container error-address_line_2" id="error-address_line_2"></p>
                      </div>
                    </div>
               </div>
               <div class="row">
                 <div class="col-6">
                    <div class="form-group">
                        <label for="label_name">Country : <span class="text-danger">*</span></label>
                        <select class="form-control country" id="country" name="country">
                            <option value="">--Select--</option>
                            @foreach($countries as $country)
                                <option value="{{$country->id}}" @if($country->id=='101') selected @endif>{{$country->name}}</option>
                            @endforeach
                        </select>
                        <p style="margin-bottom: 2px;" class="text-danger error-container error-country" id="error-country"></p>
                    </div>
                 </div>
                 <div class="col-6">
                    <div class="form-group">
                        <label for="label_name">State : <span class="text-danger">*</span></label>
                        <select class="form-control state" name="state" id="state">
                            <option value="">--Select--</option>
                            @foreach($states as $state)
                                <option value="{{$state->id}}">{{$state->name}}</option>
                            @endforeach
                        </select>
                        <p style="margin-bottom: 2px;" class="text-danger error-container error-state" id="error-state"></p>
                    </div>
                 </div>
                 <div class="col-6">
                    <div class="form-group">
                        <label for="label_name">City : <span class="text-danger">*</span></label>
                        <select class="form-control city" id="city" name="city">
                            <option value="">--Select--</option>
                        </select>
                        <p style="margin-bottom: 2px;" class="text-danger error-container error-city" id="error-city"></p>
                    </div>
                 </div>
                 <div class="col-6">
                    <div class="form-group">
                        <label for="label_name">Pincode : <span class="text-danger">*</span></label>
                        <input type="text" name="pincode" class="form-control pincode" placeholder="Enter Pincode"/>
                        <p style="margin-bottom: 2px;" class="text-danger error-container error-pincode" id="error-pincode"></p>
                    </div>
                 </div>
                 <div class="col-12">
                    <div class="form-group">
                        <label for="label_name">Landmark : </label>
                        <input type="text" name="landmark" class="form-control landmark" placeholder="Enter landmark"/>
                        <p style="margin-bottom: 2px;" class="text-danger error-container error-landmark" id="error-landmark"></p>
                    </div>
                 </div>
                 <div class="col-12">
                    <div class="form-group">
                        <label for="label_name">Location <small>(Search & Select the Place)</small> : <span class="text-danger">*</span></label>
                        <input type="text" name="location" class="form-control location" id="location_add" placeholder="Enter Location"/>
                        <input type="hidden" id="geo_city_add" name="geo_city" />
                        <input type="hidden" id="geo_addr_add" name="geo_addr" />
                        <input type="hidden" id="geo_lat_add" name="geo_lat" />
                        <input type="hidden" id="geo_long_add" name="geo_long" />
                        <p style="margin-bottom: 2px;" class="text-danger error-container error-location" id="error-location"></p>
                    </div>
                    <p style="margin-bottom: 2px;" class="text-danger error-container error-all" id="error-all"></p>
                 </div>
               </div>
             </div>
             <!-- Modal footer -->
             <div class="modal-footer">
                <button type="submit" class="btn btn-info btn-disable submit">Submit </button>
                <button type="button" class="btn btn-danger btn-disable" data-dismiss="modal">Close</button>
             </div>
          </form>
       </div>
    </div>
  </div>

  <div class="modal" id="bill_edit_addr">
    <div class="modal-dialog modal-lg">
       <div class="modal-content">
          <!-- Modal Header -->
          <div class="modal-header">
             <div class="row w-100">
                <div class="col-11">
                  <h4 class="modal-title">Edit Shipping Address </h4>
                </div>
                <div class="col-1">
                  <button type="button" class="close btn-disable" style="top: 12px;!important; color: red;" data-dismiss="modal"><small>×</small></button>
                </div>
             </div>
          </div>
          <!-- Modal body -->
          <form method="post" action="{{Url('customer/billingAddress/edit')}}" id="bill_edit_frm">
          @csrf
            <input type="hidden" name="id" id="bill_addr_id">
             <div class="modal-body">
               <div class="row">
                 <div class="col-6">
                    <div class="form-group">
                        <label for="label_name">Name : <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control name" placeholder="Enter Name"/>
                        <p style="margin-bottom: 2px;" class="text-danger error-container error-name" id="error-name"></p>
                    </div>
                 </div>
                 <div class="col-6">
                    <div class="form-group">
                        <label for="label_name">Email : <span class="text-danger">*</span></label>
                        <input type="text" name="email" class="form-control email" placeholder="Enter Email"/>
                        <p style="margin-bottom: 2px;" class="text-danger error-container error-email" id="error-email"></p>
                    </div>
                 </div>
                 <div class="col-6">
                    <div class="form-group">
                        <label for="label_name">Mobile : <span class="text-danger">*</span></label>
                        <input type="text" name="mobile" class="form-control mobile" placeholder="Enter Mobile"/>
                        <p style="margin-bottom: 2px;" class="text-danger error-container error-mobile" id="error-mobile"></p>
                    </div>
                 </div>
               </div>
               <div class="row">
                    <div class="col-12">
                      <div class="form-group">
                          <label for="label_name">Address Line 1 : <span class="text-danger">*</span></label>
                          <input type="text" name="address_line_1" class="form-control address_line_1"/>
                          <p style="margin-bottom: 2px;" class="text-danger error-container error-address_line_1" id="error-address_line_1"></p>
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="form-group">
                          <label for="label_name">Address Line 2 :</label>
                          <input type="text" name="address_line_2" class="form-control address_line_2"/>
                          <p style="margin-bottom: 2px;" class="text-danger error-container error-address_line_2" id="error-address_line_2"></p>
                      </div>
                    </div>
               </div>
               <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="label_name">Country : <span class="text-danger">*</span></label>
                            <select class="form-control country country_data" id="country" name="country">
                                <option value="">--Select--</option>
                            </select>
                            <p style="margin-bottom: 2px;" class="text-danger error-container error-country" id="error-country"></p>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="label_name">State : <span class="text-danger">*</span></label>
                            <select class="form-control state state_data" name="state" id="state">
                                <option value="">--Select--</option>
                            </select>
                            <p style="margin-bottom: 2px;" class="text-danger error-container error-state" id="error-state"></p>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="label_name">City : <span class="text-danger">*</span></label>
                            <select class="form-control city city_data" id="city" name="city">
                                <option value="">--Select--</option>
                            </select>
                            <p style="margin-bottom: 2px;" class="text-danger error-container error-city" id="error-city"></p>
                        </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                          <label for="label_name">Pincode : <span class="text-danger">*</span></label>
                          <input type="text" name="pincode" class="form-control pincode" placeholder="Enter Pincode"/>
                          <p style="margin-bottom: 2px;" class="text-danger error-container error-pincode" id="error-pincode"></p>
                      </div>
                   </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="label_name">Landmark : </label>
                            <input type="text" name="landmark" class="form-control landmark" placeholder="Enter landmark"/>
                            <p style="margin-bottom: 2px;" class="text-danger error-container error-landmark" id="error-landmark"></p>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="label_name">Location <small>(Search & Select the Place)</small> : <span class="text-danger">*</span> </label>
                            <input type="text" name="location" class="form-control location" id="location_edit" placeholder="Enter Location"/>
                            <input type="hidden" id="geo_city_edit" name="geo_city" />
                            <input type="hidden" id="geo_addr_edit" name="geo_addr" />
                            <input type="hidden" id="geo_lat_edit" name="geo_lat" />
                            <input type="hidden" id="geo_long_edit" name="geo_long" />
                            <p style="margin-bottom: 2px;" class="text-danger error-container error-location" id="error-location"></p>
                        </div>
                        <p style="margin-bottom: 2px;" class="text-danger error-container error-all" id="error-all"></p>
                    </div>
               </div>
             </div>

             <!-- Modal footer -->
             <div class="modal-footer">
                <button type="submit" class="btn btn-info btn-disable update">Update </button>
                <button type="button" class="btn btn-danger btn-disable" data-dismiss="modal">Close</button>
             </div>
          </form>
       </div>
    </div>
  </div>

<script>
  $(document).ready(function(){
    $('.addAttr').click(function(){
         $("#bill_add_frm")[0].reset();
         $('.form-control').removeClass('border-danger');
         $('.error-container').html('');
         $('.btn-disable').attr('disabled',false);
         $('#bill_add_addr').modal({
                backdrop: 'static',
                keyboard: false
         });
    });

    $('.editAddr').click(function(){
            var id=$(this).attr('data-id');
            $('.form-control').removeClass('is-invalid');
            $('.error-container').html('');
            $('.btn-disable').attr('disabled',false);
            $('#bill_edit_addr').modal({
                backdrop: 'static',
                keyboard: false
            });
            $.ajax({
                type: 'GET',
                url: "{{ Url('customer/billingAddress/edit') }}",
                data: {'id':id},
                success: function (data) {
                    $("#bill_edit_frm")[0].reset();
                    if(data !='null')
                    {
                        //check if primary data
                        $('#bill_addr_id').val(id);
                        $('.name').val(data.result.name);
                        $('.email').val(data.result.email);
                        $('.mobile').val(data.result.phone);
                        $('.address_line_1').val(data.result.address_line_1);
                        $('.address_line_2').val(data.result.address_line_2);
                        $('.pincode').val(data.result.pincode);
                        $('.landmark').val(data.result.landmark);
                        $('#location_edit').val(data.result.geo_address);
                        $('#geo_addr_edit').val(data.result.geo_address);
                        $('#geo_city_edit').val(data.result.geo_city);
                        $('#geo_lat_edit').val(data.result.latitude);
                        $('#geo_long_edit').val(data.result.longitude);

                        var country_id = data.result.country_id;

                        var state_id = data.result.state_id;

                        var city_id = data.result.city_id;

                        // country

                        $(".country_data").empty();
                        $(".country_data").html('<option>--Select--</option>');

                        $.each(data.country,function(key,value){
                          var select = '';
                          if(value.id==country_id)
                          {
                            select = 'selected';
                          }
                          $(".country_data").append('<option '+select+' value="'+value.id+'">'+value.name+'</option>');
                        });

                        // State

                        $(".state_data").empty();
                        $(".state_data").html('<option>--Select--</option>');

                        $.each(data.state,function(key,value){
                          var select = '';
                          if(value.id==state_id)
                          {
                            select = 'selected';
                          }
                          $(".state_data").append('<option '+select+' value="'+value.id+'">'+value.name+'</option>');
                        });

                        // City

                        $(".city_data").empty();
                        $(".city_data").html('<option>--Select--</option>');

                        $.each(data.city,function(key,value){
                          var select = '';
                          if(value.id==city_id)
                          {
                            select = 'selected';
                          }
                          $(".city_data").append('<option '+select+' value="'+value.id+'">'+value.name+'</option>');
                        });
                    }
                },
                error: function (xhr, textStatus, errorThrown) {
                    // alert("Error: " + errorThrown);
                }
            });
    });


  });
</script>
@include('layouts.front.footer')
