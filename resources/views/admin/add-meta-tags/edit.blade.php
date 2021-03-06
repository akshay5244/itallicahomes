@extends('index')

@section('title')
New meta_tags Type
@endsection

@section('extra-css')
{{ Html::style('bsbmd/plugins/bootstrap/css/bootstrap.css') }}
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
        <h2>Meta Tags</h2>
    </div>
    @php
    $uniq_id = uniqid();
    @endphp
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header bg-pink">
                    <h2>
                        Add Meta Tags & description
                    </h2>
                </div>
                <div class="body">
                    <form id="form_validation" method="POST" action="{{ route('add-meta-tags.update', $meta_tags->id) }}"
                    >
                     <input type="hidden" name="_method" value="PUT">
                    {{ csrf_field() }}
                    <div class="row clearfix">
                        <div class="col-sm-6">
                        <label class="form-label">Meta Title <span class="req_field">*</span></label>
                        <div class="form-group ">
                            <div class="form-line">
                                <input type="text" class="form-control" name="meta_title" id="meta_title" placeholder="Enter Meta Title" value="{{$meta_tags->meta_title}}">
                            </div>
                            @if ($errors->has('meta_title'))
                            <label id="name-error" class="error" for="meta_title">{{ $errors->first('meta_title') }}</label>
                            @endif
                        </div>
                        <label class="form-label">Meta Description <span class="req_field">*</span></label>
                        <div class="form-group ">
                            <div class="form-line">
                                <textarea rows="2" class="form-control" name="meta_description" id="meta_description" placeholder="Enter Meta Description" >{{$meta_tags->meta_description }}</textarea>
                            </div>
                            @if ($errors->has('meta_description'))
                            <label id="name-error" class="error" for="meta_description">{{ $errors->first('meta_description') }}</label>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <label class="form-label">Meta Title German</label>
                        <div class="form-group ">
                            <div class="form-line">
                                <input type="text" class="form-control" name="meta_title_german" id="meta_title_german" placeholder="Enter Meta Title German" value="@if(isset($meta_tags)) {{$meta_tags->meta_title_german }} @endif">
                            </div>
                            @if ($errors->has('meta_title_german'))
                            <label id="name-error" class="error" for="meta_title_german">{{ $errors->first('meta_title_german') }}</label>
                            @endif
                        </div>
                        <label class="form-label">Meta Description German</label>
                        <div class="form-group ">
                            <div class="form-line">
                                <textarea rows="2" class="form-control" name="meta_description_german" id="meta_description_german" placeholder="Enter Meta Description German">@if(isset($meta_tags)) {{$meta_tags->meta_desc_german }} @endif</textarea>
                            </div>
                            @if ($errors->has('meta_description_german'))
                            <label id="name-error" class="error" for="meta_description_german">{{ $errors->first('meta_description_german') }}</label>
                            @endif
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <label class="form-label">Meta Title Italian</label>
                        <div class="form-group ">
                            <div class="form-line">
                                <input type="text" class="form-control" name="meta_title_italian" id="meta_title_italian" placeholder="Enter Meta Title Italian" value="@if(isset($meta_tags)) {{$meta_tags->meta_title_italian}} @endif">
                            </div>
                            @if ($errors->has('meta_title_italian'))
                            <label id="name-error" class="error" for="meta_title_italian">{{ $errors->first('meta_title_italian')}}</label>
                            @endif
                        </div>
                        <label class="form-label">Meta Description Italian</label>
                        <div class="form-group">
                            <div class="form-line">
                                <textarea rows="2" class="form-control" name="meta_description_italian" id="meta_description_italian" placeholder="Enter Meta Description Italian">@if(isset($meta_tags)) {{$meta_tags->meta_desc_italian }} @endif</textarea>
                            </div> 
                            @if ($errors->has('meta_description_italian'))
                            <label id="name-error" class="error" for="meta_description_italian">{{ $errors->first('meta_description_italian') }}</label>
                            @endif
                        </div>
                        <label class="form-label">Page Title</label>
                         <div class="form-group">
                            <div class="form-line">
                                <input type="text" class="form-control" name="page_title" id="page_title"placeholder="Enter Page Title" value="@if(isset($meta_tags->page)) {{ $meta_tags->page }} @endif">
                            </div>
                            @if ($errors->has('page_title'))
                            <label id="name-error" class="error" for="page_title">{{ $errors->first('page_title') }} <span class="req_field">*</span></label>
                            @endif
                        </div>
                         <label class="form-label">Meta Keyword</label>
                        <div class="form-group">
                            <div class="form-line">
                                <textarea rows="2" class="form-control" name="meta_keyword" id="meta_keyword" placeholder="Enter Meta Keyword" >@if(isset($meta_tags->meta_keyword)) {{ $meta_tags->meta_keyword }} @endif</textarea>
                            </div>
                            @if ($errors->has('meta_keyword'))
                            <label id="name-error" class="error" for="meta_keyword">{{ $errors->first('meta_keyword') }}</label>
                            @endif
                        </div>
                        <label class="form-label">Meta Keyword German</label>
                        <div class="form-group">
                            <div class="form-line">
                                <textarea rows="2" class="form-control" name="meta_keyword_italian" id="meta_keyword_italian" placeholder="Enter Meta Keyword German">@if(isset($meta_tags->meta_keyword_italian)) {{ $meta_tags->meta_keyword_italian }} @endif</textarea>
                            </div>
                            @if ($errors->has('meta_keyword_italian'))
                            <label id="name-error" class="error" for="meta_keyword_italian">{{ $errors->first('meta_keyword_italian') }}</label>
                            @endif
                        </div>
                        <label class="form-label">Meta Keyword Italian</label>
                        <div class="form-group">
                            <div class="form-line">
                                <textarea rows="2" class="form-control" name="meta_keyword_german" id="meta_keyword_german" placeholder="Enter Meta Keyword Italian">@if(isset($meta_tags->meta_keyword_german)) {{ $meta_tags->meta_keyword_german }} @endif</textarea>
                            </div>
                            @if ($errors->has('meta_keyword_german'))
                            <label id="name-error" class="error" for="meta_keyword_german">{{ $errors->first('meta_keyword_german') }}</label>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <button id="button" class="btn btn-primary waves-effect" type="submit">Update</button>
                        <button class="btn btn-info1" type="button" onclick="window.history.back();">BACK</button>
                    </div>
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
<script type="text/javascript">
    
    $("#button").click(function (e) {
        if($('.error').length > 0) {
            $('.error').remove();
        }
        var meta_title = $('#meta_title').val().trim();
        var meta_description = $('#meta_description').val().trim();
        var page_title = $('#page_title').val().trim();
        

        if( meta_title == '' || meta_description == '' || page_title ='')
        {
            if(meta_title == '') {
                $('#meta_title').after('<p class="error">Required</p>');
            }
            if(page_title == '') {
                $('#page_title').after('<p class="error">Required</p>');
            }
            if(meta_description == ''){
                $('#meta_description').after('<p class="error">Required</p>');
            }
            return false;
        }
        $('#form_validation').submit();
    });
</script>
@endsection
