@extends('index')

@section('title')
    Edit Location
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

@endsection
@if(Session::has('message'))
    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
@endif
@section('content')
        <div class="container-fluid">
            <div class="block-header">
                <h2>Location</h2>
            </div>

            <!-- Vertical Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header bg-pink">
                            <h2>
                                Edit Location
                            </h2>
                        </div>
                        <div class="body">
                           <form id="form_validation" method="POST" action="{{ route('add-location.update',$location->id) }}" enctype="multipart/form-data">
                               <input type="hidden" name="_method" value="PUT">
                               {{ csrf_field() }}
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input name="_method" type="hidden" value="PUT">
                                                <input type="text" class="form-control" name="location_name" value="{{ $location->location_name }}" required>
                                                <label class="form-label">Location Name</label>
                                            </div>
                                            @if ($errors->has('location_name'))
                                                <label id="name-error" class="error" for="location_name">{{ $errors->first('location_name') }}</label>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                               <label class="form-label">Region</label>
                               <div class="form-group">
                                   <div class="form-line">
                                       <select class="form-control show-tick" name="region_id">
                                           @foreach($regions as $region)
                                               <option value="{{$region->id}}">{{$region->region_name}}</option>
                                           @endforeach
                                       </select>
                                   </div>
                                   @if ($errors->has('region_id'))
                                       <label id="name-error" class="error"
                                              for="region_id">{{ $errors->first('region_id') }}</label>
                                   @endif
                               </div>
                               @php

                                   $language_title = json_decode($language_line_title);
                               @endphp

                               <label class="form-label">Name/Title In Italian</label>
                               <div class="form-group ">
                                   <div class="form-line">
                                       <input type="text" class="form-control" value="@if(isset($language_title)) {{$language_title->text->it}} @endif" name="name_italian"  placeholder="Enter Name or Title of the Property In Italian">
                                   </div>
                                   @if ($errors->has('name_italian'))
                                       <label id="name-error" class="error" for="name_italian">{{ $errors->first('name_italian') }}</label>
                                   @endif
                               </div>
                               <label class="form-label">Name/Title In German</label>
                               <div class="form-group ">
                                   <div class="form-line">
                                       <input type="text" class="form-control"  value="@if(isset($language_title)) {{$language_title->text->de}} @endif" name="name_german"  placeholder="Enter Name or Title of the Property In German">
                                   </div>
                                   @if ($errors->has('name_italian'))
                                       <label id="name-error" class="error" for="name_italian">{{ $errors->first('name_italian') }}</label>
                                   @endif
                               </div>
                                <button class="btn btn-primary waves-effect" type="submit">SUBMIT</button>
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
@endsection
