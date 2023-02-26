@include('layouts.sidebar')
	
	
        <!-- =============== Left side End ================-->
		<style>
            .intl-tel-input.allow-dropdown.separate-dial-code{
                width: 100%;
                /* margin-bottom: 3%; */
                margin-top: 2%;
            }
        </style>

        @php
            $route = 'admin.';
        @endphp

        <div class="main-content-wrap sidenav-open d-flex flex-column">
            <!-- ============ Body content start ============= -->
            <div class="main-content">				
 
                <div class="row">
                    <div class="card text-left">
                        <div class="card-body">
                        {!! Form::open(array('route'=>[$route.$current_menu.'.update', $encrypt_id], 'method'=>'PUT', 'id'=>$current_menu.'-form', 'enctype'=>'multipart/form-data', 'role'=>'form', 'onSubmit' => 'return checkPassword(this)')) !!}
                            {!! csrf_field() !!}
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3 class="card-title mb-3"> EDIT Blog </h3> 
                                        <div class="data-create">
                                            <div class="container">
                                                    <div class="row">
                                                        <div class="col-md-6 form-group mb-4">
                                                            <label class="mb-3" for="tag"> Catgeory <span class="text-danger">*</span></label>
                                                            <select class="form-control category" name="category">
                                                                <option value="">--Select--</option>
                                                                @if(count($blog_categories)>0)
                                                                    @foreach($blog_categories as $category)
                                                                        <option @if($records->category_id==$category->id) selected @endif value="{{$category->id}}">{{$category->name}}</option>
                                                                    @endforeach
                                                                @endif
                                                            </select>
                                                            @if($errors->has('category'))
                                                                <div class="error text-danger">
                                                                    {{$errors->first('category')}}
                                                                </div>
                                                            @endif
                                                        </div>
                                                        <div class="col-md-6 form-group mb-4">
                                                            <label class="mb-3" for="tag"> Tag </label>
                                                            <select class="form-control tags" id="tag" name="tag[]" multiple data-actions-box="true" data-live-search="true" data-live-search-normalise="true" data-live-search-placeholder="Select Tag" data-selected-text="count>1">
                                                              @if(!empty($tags))
                                                                  @php
                                                                    $tag_id = NULL;
                                                                    if($records->tag_id!=NULL)
                                                                    {
                                                                        $tag_id = explode(',',$records->tag_id);
                                                                    }
                                                                  @endphp
                                                                  @foreach($tags as $key=>$value)
                                                                      <option @if($tag_id!=NULL && in_array($value->id,$tag_id)) selected @endif value="{{$value->id}}">{{$value->name}}</option>
                                                                  @endforeach
                                                              @endif
                                                            </select>
                                                            @if($errors->has('tag'))
                                                                <div class="error text-danger">
                                                                    {{$errors->first('tag')}}
                                                                </div>
                                                            @endif
                                                        </div>
                                                        <div class="col-md-6 form-group mb-4">
                                                            <label for="url"> Title <span style="color: red">*</span> </label>
                                                            <input class="form-control" id="title" type="text" placeholder="Enter Title" name="title" value="{{ $records->title }}">
                                                            @if($errors->has('title'))
                                                                <div class="error text-danger">
                                                                    {{$errors->first('title')}}
                                                                </div>
                                                            @endif
                                                        </div>
                                                        <div class="col-md-12 form-group mb-4">
                                                            <label for="url"> Short Description <span style="color: red">*</span> </label>
                                                            <input class="form-control" id="short_description" type="text" placeholder="Enter Short Description" name="short_description" value="{{ $records->short_description }}">
                                                            @if($errors->has('short_description'))
                                                                <div class="error text-danger">
                                                                    {{$errors->first('short_description')}}
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <label for="url"> Description <span style="color: red">*</span> </label>
                                                            <textarea class="form-control summernote" name="description">{!! $records->description !!}</textarea>
                                                            @if($errors->has('description'))
                                                                <div class="error text-danger">
                                                                    {{$errors->first('description')}}
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="uploader">
                                                <div class="row">
                                                      <div class="col-md-6 form-group mb-4">
                                                                <label for="url"> Upload Image </label>
                                                                <input class="form-control" id="image" type="file" name="image" value="{{ old('image') }}">
                                                                @if($errors->has('image'))
                                                                    <div class="error text-danger">
                                                                        {{$errors->first('image')}}
                                                                    </div>
                                                                @endif
                                                        </div>
                                                        @if($records->file_name!=NULL)
                                                            <div class="col-md-6 form-group">
                                                                <table>
                                                                    <tbody id="tbody">
                                                                        <tr>
                                                                            <img width="200" height="100" src="{{URL::asset('uploads/blog/')}}{{'/'.$records-> file_name}}" alt="logo" />
                                                                        <td>
                                                                            
                                                                        </td>
                                                                    
                                                                    </tr>      
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        @endif
                                                    <div class="col-md-12 form-group mb-3 text-right">
                                                        <button type="submit" class="btn btn-success"> Update </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
				    </div>
                </div>
				
            </div><!-- Footer Start -->
            <div class="flex-grow-1"></div>
			
        </div>
    </div><!-- ============ Search UI Start ============= -->
 <style type="text/css">
     input.form-control {
    margin-top: 9px;
}
button.btn.btn-primary {
    margin-top: 9px;
}
 </style>
    <!-- ============ Search UI End ============= -->
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('js/script.min.js') }}"></script>
    <script src="{{ asset('js/sidebar.large.script.min.js') }}"></script>
    <script src="{{ asset('js/echarts.min.js') }}"></script>
    <script src="{{ asset('js/echart.options.min.js') }}"></script>
    <script src="{{ asset('js/dashboard.v1.script.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.14/js/utils.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.14/js/intlTelInput.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.js "></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    <script>
         $(document).ready(function() {
            $('.tags').selectpicker();
            $('.summernote').summernote({

                height:400,
              
                fontNames: ['Lato','Arial','Courier New','Helvetica','Nunito'],
                fontNamesIgnoreCheck: ['Lato','Arial','Courier New','Helvetica','Nunito'],

                 toolbar: [
                     ['style', ['style']],
                     ['font', ['bold', 'underline', 'clear']],
                     ['fontname', ['fontname']],
                     ['fontsize', ['fontsize']],
                     ['color', ['color']],
                     ['para', ['ul', 'ol', 'paragraph']],
                     ['table', ['table']],
                     ['insert', ['link', 'picture', 'video']],
                     ['view', ['fullscreen', 'codeview', 'help']],
                  ],
            });
         });
    </script>
   

    
</body>

</html>