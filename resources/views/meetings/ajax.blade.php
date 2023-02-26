                                    <table class="table table-bordered data-table">
                                        <thead>
                                            <tr>
                                                <th scope="col"> Sr. No. </th>
                                                <th scope="col"> Appointment Code </th>
                                                <th scope="col"> Customer Name </th>
                                                <?php
                                                if(isset($records[0]['executive_name']))
                                                 {

                                                ?>
                                                <th scope="col"> Execiive Name </th>
                                                <?php }?>

                                                <th scope="col"> Execiive Meeting URL </th>
                                                <th scope="col"> Created At </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($records as $key=>$value)
                                                <?php 
                                                    $encrypt_id = Crypt::encryptString($value->appointment_id);
                                                ?>
                                                <tr>
                                                    <td>
                                                        {{$key+1}}
                                                    </td>
                                                    <td>{{$value->appointment_code}}</td>
                                                    <td>{{$value->customer_name}}</td>
                                                     <?php
                                                    if(isset($value->executive_name))
                                                     {

                                                     ?>
                                                   <td>{{$value->executive_name}}</td>
                                                     <?php }?>
                                                    <td>
                                                    <a href="{{$value->executive_meeting_url}}" target="_blank">{{$value->executive_meeting_url}}</a>  
                                                    </td>
                                                    <td>{{$value->appointment_created_at}}</td>
                                                </tr>
                                                <tr id="tr{{$value->appointment_id}}" style="display: none;">
                                                   <td colspan="5">
                                                        <div>
                                                            <h4 class="card-title mb-3">
                                                                <i class="ace-icon fa fa-handshake"></i>
                                                                Meetings
                                                            </h4>
                                                        </div>
                                                        <table class="table table-bordered data-table">
                                                            <thead>
                                                                <tr>
                                                                    <th scope="col"> Sr. No. </th>
                                                                    <th scope="col"> Meeting ID </th>
                                                                    <th scope="col"> Executive Name </th>
                                                                    <th scope="col"> Attendee Password </th>
                                                                    <th scope="col"> Moderator Password </th>
                                                                    <th scope="col"> Create Date </th>
                                                                    <th scope="col"> Has User Joined? </th>
                                                                    <th scope="col"> Duration </th>
                                                                    <th scope="col"> Action </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="tbody{{$value->appointment_id}}">
                                                            </tbody>
                                                        </table>
                                                    </td> 
                                                </tr>
                                            @endforeach					
                                        </tbody>
                                    </table>
                                    <div class="row">
                                        {{$records->appends(['perpage' => $perpage])->render()}}
                                    </div>
