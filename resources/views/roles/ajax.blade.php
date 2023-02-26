                                    <table class="table table-bordered data-table">
                                        <thead>
                                            <tr>
                                                <th scope="col"> Sr. No. </th>
                                                <th scope="col"> Role </th>
                                                <th scope="col"> Role - Display Name </th>
                                                <th scope="col"> Created At </th>
                                                <th scope="col"> Status </th>
                                                @if(Arr::exists($modules, 'Roles-changeStatus') || Arr::exists($modules, 'Roles-edit') || Arr::exists($modules, 'Roles-delete'))
                                                <th scope="col"> Action </th>
                                                @endif
                                                @if(Arr::exists($modules, 'Roles-permissions'))   
                                                <th scope="col"> Assign Permissions </th>
                                                @endif
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($records as $key=>$value)
                                                <?php 
                                                    $encrypt_id = Crypt::encryptString($value->id);
                                                ?>
                                                <tr>
                                                    <td>
                                                        {{$key+1}}
                                                    </td>
                                                    <td>{{$value->name}}</td>
                                                    <td>{{$value->display_name}}</td>
                                                    <td>{{$value->created_at}}</td>
                                                    <td>
                                                    @if($value->status == 1)
                                                        <span class="badge badge-success">Active</span>
                                                    @else
                                                        <span class="badge badge-warning">Inactive</span>
                                                    @endif
                                                    </td>
                                                    @if(Arr::exists($modules, 'Roles-changeStatus') || Arr::exists($modules, 'Roles-edit') || Arr::exists($modules, 'Roles-delete'))
                                                    <td>
                                                        @if(Arr::exists($modules, 'Roles-changeStatus'))   
                                                            @if($value->status == 1)
                                                                <button class="btn btn-warning" type="button" onclick="confirmChangeStatusAction('{{$table_name}}', '{{$value->id}}', '{{$value->status}}');"><i class="nav-icon i-Reset"></i></button>
                                                            @else
                                                                <button class="btn btn-success" type="button" onclick="confirmChangeStatusAction('{{$table_name}}', '{{$value->id}}', '{{$value->status}}');"><i class="nav-icon i-Reset"></i></button>
                                                            @endif
                                                        @endif
                                                        @if(Arr::exists($modules, 'Roles-edit'))   
                                                            <a href="{{url('admin/'.$current_menu.'/'.$encrypt_id.'/edit')}}" class="btn btn-info" type="button"><i class="nav-icon i-Pen-2"></i></a>
                                                        @endif
                                                        @if(Arr::exists($modules, 'Roles-delete'))   
                                                            <button class="btn btn-danger" type="button" onclick="confirmDeleteAction('{{$table_name}}', '{{$value->id}}');"><i class="nav-icon i-Close-Window"></i></button>
                                                        @endif
                                                    </td>
                                                    @endif
                                                    @if(Arr::exists($modules, 'Roles-permissions'))   
                                                    <td>
                                                        <a href="{{url('admin/'.$current_menu.'/'.$encrypt_id.'/permissions')}}" class="btn btn-info" type="button"><i class="nav-icon i-Paper-Plane"></i></a>
                                                    </td>
                                                    @endif
                                                </tr>
                                            @endforeach					
                                        </tbody>
                                    </table>
                                    <div class="row">
                                        {{$records->appends(['perpage' => $perpage])->render()}}
                                    </div>