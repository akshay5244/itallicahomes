@extends('index')

@section('title')
    Edit Property Type
@endsection

@section('extra-css')
    <!-- Colorpicker Css -->
    {{ Html::style('bsbmd/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css') }}

    <!-- Dropzone Css -->
    {{ Html::style('bsbmd/plugins/dropzone/dropzone.css') }}

    <!-- Multi Select Css -->
    {{ Html::style('bsbmd/plugins/multi-select/css/multi-select.css') }}

    <!-- Bootstrap Spinner Css -->
    {{ Html::style('bsbmd/plugins/jquery-spinner/css/bootstrap-spinner.css') }}

    <!-- Bootstrap Tagsinput Css -->
    {{ Html::style('bsbmd/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css') }}

    <!-- Bootstrap Select Css -->
    {{ Html::style('bsbmd/plugins/bootstrap-select/css/bootstrap-select.css') }}

    <!-- noUISlider Css -->
    {{ Html::style('bsbmd/plugins/nouislider/nouislider.min.css') }}

    <!-- Colorpicker Css -->
    {{Html::style('bsbmd/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css')}}

    <!-- Font Awesome -->
    {{Html::style('bsbmd/plugins/font-awesome/css/font-awesome.min.css')}}
    {{Html::style('bsbmd/plugins/font-awesome-icons/fontawesome-iconpicker.css')}}
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

@endsection
@if(Session::has('message'))
    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
@endif
@section('content')
    <div class="container-fluid">
        <div class="block-header">
            <h2>Property Type</h2>
        </div>
        @php
            $uniq_id = uniqid();
        @endphp
        <!-- Vertical Layout -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header bg-pink">
                        <h2>
                            Edit Property Type
                        </h2>
                    </div>
                    <div class="body">
                        <form id="form_validation" method="POST"
                              action="{{ route('add-property-types.update',$property_type->id) }}"
                              enctype="multipart/form-data">
                            <input type="hidden" name="_method" value="PUT">
                            {{ csrf_field() }}
                            <div class="row clearfix">
                                <div class="col-sm-12">

                                    <label class="form-label">Property Type <span class="req_field">*</span></label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="type_name"
                                                   placeholder="Enter Property Type" required
                                                   value="{{$property_type->type_name}}">
                                        </div>
                                        @if ($errors->has('type_name'))
                                            <label id="name-error" class="error"
                                                   for="type_name">{{ $errors->first('type_name') }}</label>
                                        @endif
                                    </div>

                                    <label class="form-label">Property Type In Italian</label>
                                    <div class="form-group ">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="name_italian" value="{{$property_type->name_italian}}"  placeholder="Title  In Italian">
                                        </div>
                                        @if ($errors->has('name_italian'))
                                            <label id="name-error" class="error" for="name_italian">{{ $errors->first('name_italian') }}</label>
                                        @endif
                                    </div>
                                    <label class="form-label">Property Type In German</label>
                                    <div class="form-group ">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="name_german" value="{{$property_type->name_german}}"  placeholder="Enter Title  In German">
                                        </div>
                                        @if ($errors->has('name_italian'))
                                            <label id="name-error" class="error" for="name_italian">{{ $errors->first('name_italian') }}</label>
                                        @endif
                                    </div>
                                    <label class="form-label">Description <span class="req_field">*</span></label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <textarea rows="2" class="form-control" name="description" required
                                                   placeholder="Enter Property Description"
                                                   >{{$property_type->description}}</textarea>
                                        </div>
                                        @if ($errors->has('description'))
                                            <label id="name-error" class="error"
                                                   for="type_name">{{ $errors->first('description') }}</label>
                                        @endif
                                    </div>

                                    <label class="form-label">Description In Italian</label>
                                    <div class="form-group ">
                                        <div class="form-line">
                                            <textarea rows="2" class="form-control" name="content_italian" placeholder="Description  In Italian">{{$property_type->content_italian}}</textarea>
                                        </div>
                                        @if ($errors->has('content_italian'))
                                            <label id="name-error" class="error" for="content_italian">{{ $errors->first('content_italian') }}</label>
                                        @endif
                                    </div>
                                    <label class="form-label">Description In German</label>
                                    <div class="form-group ">
                                        <div class="form-line">
                                            <textarea rows="2" class="form-control" name="content_german" placeholder="Description In German">{{$property_type->content_german}}</textarea>
                                        </div>
                                        @if ($errors->has('name_italian'))
                                            <label id="name-error" class="error" for="content_german">{{ $errors->first('content_german') }}</label>
                                        @endif
                                    </div>
                                    <label class="form-label">Property Image Gallery</label>
                                    <div class="form-group ">
                                        <div class="dropzone clsbox" id="mydropzone">
            		                    </div>
                                        <input type="hidden" value="{{$uniq_id}}" id="gallery_token" name="gallery_token">
                                    <div>
                                    <span><li>1)Max file size allowed is 2MB </li><li>2)Max file allowed is 20</li></span>
                                    <div class="form-group ">
                                        @foreach($gallery_images as $gallery_image)
                                            <img src="{{asset("/images/cover-images/".$gallery_image->image)}}" width="100px" height="100px">
                                            <a href="{{url('admin/properties/destroy_image')}}{{'/'.$gallery_image->id}}">Delete</a>
                                        @endforeach
                                    </div>
                                    <label class="form-label">UI Color</label>
                                    <div class="input-group colorpicker">
                                        <div class="form-line">
                                            <input type="text" name="ui_color" class="form-control" value="{{$property_type->ui_color}}">
                                        </div>
                                        <span class="input-group-addon">
                                            <i></i>
                                        </span>
                                    </div>

                                    </div>
                                    <label class="form-label">UI Icon</label>
                                        <input class="icp demo admin-pro-icon" name="ui_icon" value="{{$property_type->ui_icon}}" type="text">
                                </div>
                            </div>

                            <button id="button" class="btn btn-primary waves-effect" type="submit">UPDATE</button>
                            <button class="btn btn-info1" type="button" onclick="window.history.back();">BACK</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Vertical Layout -->
    </div>
@endsection

@section('extra-script')
    {{Html::script('bsbmd/plugins/autosize/autosize.js')}}
    {{Html::script('bsbmd/plugins/momentjs/moment.js')}}
    {{Html::script('bsbmd/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js')}}
    {{Html::script('bsbmd/js/pages/forms/basic-form-elements.js')}}
    {{Html::script('bsbmd/plugins/jquery-validation/jquery.validate.js')}}
    {{Html::script('bsbmd/plugins/jquery-steps/jquery.steps.js')}}
    {{Html::script('bsbmd/plugins/sweetalert/sweetalert.min.js')}}
    {{Html::script('bsbmd/js/pages/forms/form-validation.js')}}
    {{Html::script('bsbmd/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js')}}
    {{Html::script('bsbmd/plugins/dropzone/dropzone.js')}}
    {{Html::script('bsbmd/plugins/font-awesome-icons/fontawesome-iconpicker.min.js')}}
    <script type="application/javascript">
        $(function () {
            $('.colorpicker').colorpicker();
            $('.demo').iconpicker();
        });
    </script>
    <script>
        //drag and drop customization
        var k = parseInt(0);
        Dropzone.autoDiscover = false;
        var myDropzone = new Dropzone("div#mydropzone", {
          url: "/admin/type_image_gallery/"+$('#gallery_token').val(),
          uploadMultiple: true,
          parallelUploads: 20,
          autoProcessQueue : true,
          createImageThumbnails: true,
          addRemoveLinks: true,
          maxFiles: 20,
          init: function() {
            this.on('error', function(file, errorMessage) {
              console.log(errorMessage);
            });
            this.on('addedfile', function(file) {
                $('#button').prop("disabled", true);
                if(file.size > (1024 * 1024 * 2)){ // not more than 2mb
                    this.removeFile(file);
                }
            });
            this.on('removedfile', function(file) {
                if(k > 0){
                    k -= parseInt(1);
                }
                if(k == 0){
                    $('#button').prop("disabled", true);
                }
                if(file){
                    $.ajax({
                        type: 'POST',
                        url: '/admin/delete_property_type_image',
                        data: {name: file.name,uniqid: '<?php echo $uniq_id;?>'},
                        sucess: function(data){
                           console.log('success: ' + data);
                        }
                     });
                }

            });
            this.on('success', function(file,response) {
                k+=parseInt(response);
                if(myDropzone.getAcceptedFiles().length == k){
                    $('#button').prop("disabled", false);
                }

                console.log('response:',myDropzone.getAcceptedFiles().length);
                console.log('response:',k);
            });
            this.on("maxfilesexceeded", function(file){
                this.removeFile(file);
            });
          }
        });

    </script>
@endsection
