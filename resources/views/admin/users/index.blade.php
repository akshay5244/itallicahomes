@extends('index')

@section('title')
	User
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

     <!-- JQuery DataTable Css -->
    {{ Html::style('https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css') }}
    {{ Html::style('https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css') }}
    {{ Html::style('bsbmd/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') }}

     <!-- JQuery sweetalert Css -->
     {{ Html::style('/css/sweetalert.css') }}

<script type="text/javascript">
  
    function delete_record(id){
        swal({
              title: "Are you sure?",
              text: "Your will not be able to recover this user details!",
              type: "warning",
              showCancelButton: true,
              confirmButtonClass: "btn-danger",
              confirmButtonText: "Yes, delete it!",
              closeOnConfirm: false
          },
          function(confirmButtonText){
                if (confirmButtonText) {
                    $('#delete_form.delete_form_'+id).submit();
                }
        });
       }
</script>
@endsection
@if(Session::has('message'))
    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
@endif
@section('content')
        <div class="container-fluid">
            <div class="block-header">
                <h2>Users</h2>
            </div>

            <!-- Vertical Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>Users Detail</h2>
                            <a href="{{route('users.create')}}" class="btn btn-success m-t-15 waves-effect">Add New</a>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                        	<th>Id</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Roles</th>
                                            <th>Action</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        	<th>Id</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Roles</th>
                                            <th>Action</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    	@foreach($users as $row)
                                        
                                        <tr>
                                        	<td>{{ $row->id }}</td>
                                        	<td>{{ $row->name }}</td>
                                            <td>{{ $row->email }}</td>
                                            <td>
                                                
                                                @foreach($row->roles()->pluck('name') as $role)
                                                    {{ $role }}
                                                @endforeach
                                            </td>
                                        	<td>
                                            @role('admin')
                                                @foreach($row->roles()->pluck('name') as $role)
                                                @foreach($admin_roles as $ad_role)
                                                @if(!strcmp($role,$ad_role))
                                                   <a href="{{route('users.edit',$row->id)}}" class="btn btn-warning waves-effect"><i class="far fa-edit"></i></a>
                                                @endif
                                                @endforeach    
                                                @endforeach
                                            @else 
                                                <a href="{{route('users.edit',$row->id)}}" class="btn btn-warning waves-effect"><i class="far fa-edit"></i></a>

                                            @endrole
                                                <!-- <a href="{{route('users.edit',$row->id)}}" class="btn btn-warning waves-effect"><i class="far fa-edit"></i></a> -->
                                        	</td>
                                        	<td>
                                            <input type="hidden" value="{{$row->id}}"  id="row_no">
                                            @role('admin')
                                            
                                                @foreach($row->roles()->pluck('name') as $role)
                                                    @foreach($admin_roles as $ad_role)
                                                        @if(!strcmp($role,$ad_role))  
                                                            <form id="delete_form" class="delete_form_{{$row->id}}" method="POST" action="{{ route('users.destroy',$row->id) }}">
                                                            {{ csrf_field() }}
                                                            <input name="_method" type="hidden" value="DELETE">
                                                            <button class="btn btn-danger waves-effect" 
                                                            onclick="delete_record('{{$row->id}}')" type="button" id='btn_del'><i class="far fa-trash-alt"></i></button>
                                                        @endif
                                                    @endforeach    
                                                @endforeach  
                                               
                                            @else     

                                                <form id="delete_form" class="delete_form_{{$row->id}}" method="POST" action="{{ route('users.destroy',$row->id) }}">
                                                {{ csrf_field() }}
                                                <input name="_method" type="hidden" value="DELETE">
                                                <button class="btn btn-danger waves-effect" 
                                                onclick="delete_record('{{$row->id}}')" type="button" id='btn_del'><i class="far fa-trash-alt"></i></button>
                                                </form>

                                            @endrole

                                              <!--   <input type="hidden" value="{{$row->id}}"  id="row_no">                                                
                                        		<form id="delete_form" class="delete_form_{{$row->id}}" method="POST" action="{{ route('users.destroy',$row->id) }}">
					                            	{{ csrf_field() }}
					                            	<input name="_method" type="hidden" value="DELETE">
					                                <button class="btn btn-danger waves-effect" 
                                                    onclick="delete_record('{{$row->id}}')" type="button" id='btn_del'><i class="far fa-trash-alt"></i></button>
					                            </form> -->
                                        	</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
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

    <!-- Jquery DataTable Plugin Js -->
    {{Html::script('bsbmd/plugins/jquery-datatable/jquery.dataTables.js')}}
    {{Html::script('bsbmd/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js')}}
    {{Html::script('bsbmd/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js')}}
    {{Html::script('bsbmd/plugins/jquery-datatable/extensions/export/buttons.flash.min.js')}}
    {{Html::script('bsbmd/plugins/jquery-datatable/extensions/export/jszip.min.js')}}
    {{Html::script('bsbmd/plugins/jquery-datatable/extensions/export/pdfmake.min.js')}}
    {{Html::script('bsbmd/plugins/jquery-datatable/extensions/export/vfs_fonts.js')}}
    {{Html::script('bsbmd/plugins/jquery-datatable/extensions/export/buttons.html5.min.js')}}
    {{Html::script('bsbmd/plugins/jquery-datatable/extensions/export/buttons.print.min.js')}}
    {{Html::script('bsbmd/js/pages/tables/jquery-datatable.js') }}

     <!-- Jquery Sweetalert  Js -->
    {{Html::script('js/sweetalert.min.js')}}
    {{Html::script('js/sweetAlert.js')}}
@endsection
