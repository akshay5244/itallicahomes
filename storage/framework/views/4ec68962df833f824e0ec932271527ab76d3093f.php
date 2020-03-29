<?php $__env->startSection('title'); ?>
    Properties
<?php $__env->stopSection(); ?>

<?php $__env->startSection('extra-css'); ?>
<!-- Colorpicker Css -->
    <?php echo e(Html::style('bsbmd/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css')); ?>


    <!-- Dropzone Css -->
    <?php echo e(Html::style('bsbmd/plugins/dropzone/dropzone.css')); ?>


    <!-- Multi Select Css -->
    <?php echo e(Html::style('bsbmd/plugins/multi-select/css/multi-select.css')); ?>


    <!-- Bootstrap Spinner Css -->
    <?php echo e(Html::style('bsbmd/plugins/jquery-spinner/css/bootstrap-spinner.css')); ?>


    <!-- Bootstrap Tagsinput Css -->
    <?php echo e(Html::style('bsbmd/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css')); ?>


    <!-- Bootstrap Select Css -->
    <?php echo e(Html::style('bsbmd/plugins/bootstrap-select/css/bootstrap-select.css')); ?>


    <!-- noUISlider Css -->
    <?php echo e(Html::style('bsbmd/plugins/nouislider/nouislider.min.css')); ?>


    <!-- JQuery DataTable Css -->
    <?php echo e(Html::style('https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css')); ?>

    <?php echo e(Html::style('https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css')); ?>

    <?php echo e(Html::style('bsbmd/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css')); ?>

         <!-- JQuery sweetalert Css -->
     <?php echo e(Html::style('/css/sweetalert.css')); ?>


<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
        <div class="container-fluid">
<?php if(Session::has('message')): ?>
    <p class="alert <?php echo e(Session::get('alert-class', 'alert-info')); ?>"><?php echo e(Session::get('message')); ?></p>
<?php endif; ?>
            <div class="block-header">
                <h2>Properties</h2>
            </div>

            <!-- Vertical Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header bg-pink">
                            <div class="pull-left">
                                <h2>All Properties</h2>
                            </div>
                            <div class="pull-right">
                                <a href="<?php echo e(route('properties.create')); ?>" class="btn btn-info m-t-15 waves-effect"><i class="fa fa-plus"></i> Add New</a>
                            </div>
                           <!--  <ul class="header-dropdown m-r--5">
                                <form action="<?php echo e(url('')); ?>/admin/properties" id="form_avail_type">
                                    <?php echo e(csrf_field()); ?>

                                    <select class="selectpicker" name="avail_type" id="avail_type" onchange="this.form.submit()">
                                         <option value=''>-- Sort By --</option>
                                         <option value='A' <?php if($type == ""): ?> <?php echo e('selected'); ?>  <?php endif; ?>>All Properties</option>
                                         <option value='Y' <?php if($type == "Y"): ?> <?php echo e('selected'); ?>  <?php endif; ?>>Available</option>
                                         <option value='S' <?php if($type == "S"): ?> <?php echo e('selected'); ?>  <?php endif; ?>>Sold/Moved</option>
                                     
                                    </select>
                                  
                                </form>
                            </ul> -->
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="display nowrap table table-bordered table-striped table-hover dataTable js-exportable" id="example" style="width: 100% !important;">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Image</th>
                                            <th>Property ID</th>
                                            <th>Property Name</th>
                                            <th>Property Added On</th>
                                            <!-- <th>Property Description</th> -->
                                            <th>Availability</th>
                                            <th>Agency Name</th>
                                            <th>Action</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Image</th>
                                            <th>Property ID</th>
                                            <th>Property Name</th>
                                            <th>Property Added On</th>
                                            <!-- <th>Property Description</th> -->
                                            <th>Availability</th>
                                            <th>Agency Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php if(count($properties) > 0): ?>
                                        	<?php $__currentLoopData = $properties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                            	<td><?php echo e($key + 1); ?></td>
                                                <td class="table-prev-img"><img src=<?php echo e(asset("images/cover-images/" . $row->cover_image_name)); ?> width="150px" height="100px"/></td>
                                                <td><?php echo e($row->property_sequence_id); ?> </td>
                                                <td><?php echo e($row->name); ?> </td>
                                                <td><?php echo e(date('d-m-Y',strtotime($row->created_at))); ?> </td>
                                           <!--      <td class="property-des-txt"><?php echo e($row->short_description); ?> </td> -->
                                                <td><?php echo e($row->availability == 'Y' ? 'Available' : 'Sold / Moved'); ?> </td>
                                                <?php if(is_null($row->agent_id)): ?>
                                                    <td><?php echo e('N/A'); ?></td>
                                                <?php else: ?>
                                                    <td><?php echo e((new \App\Services\PropertyService)->getAgent($row->agent_id)); ?></td>
                                                <?php endif; ?>
                                            	<td>
                                            	    <a href="<?php echo e(route('properties.edit',$row->id)); ?>" class="btn btn-warning waves-effect"><i class="far fa-edit"></i></a>
                                                </td>
                                                <td>
                                                    <form class="display-inline delete_form_<?php echo e($row->id); ?>" id="delete_form" method="POST" action="<?php echo e(route('properties.destroy',$row->id)); ?>">
    					                   <?php echo e(csrf_field()); ?>

    					                   <input name="_method" type="hidden" value="DELETE">
    					                   <button class="btn btn-danger waves-effect"  onclick="delete_record('<?php echo e($row->id); ?>')" type="button"><i class="far fa-trash-alt"></i></button>
    					            </form>
                                            	</td>
                                            </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Vertical Layout -->

        </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('extra-script'); ?>
	<!-- <?php echo e(Html::script('bsbmd/plugins/autosize/autosize.js')); ?> -->
	<?php echo e(Html::script('bsbmd/plugins/momentjs/moment.js')); ?>

	<?php echo e(Html::script('bsbmd/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js')); ?>

	<?php echo e(Html::script('bsbmd/js/pages/forms/basic-form-elements.js')); ?>

    <?php echo e(Html::script('bsbmd/plugins/jquery-validation/jquery.validate.js')); ?>

    <?php echo e(Html::script('bsbmd/plugins/jquery-steps/jquery.steps.js')); ?>

  <!--   <?php echo e(Html::script('bsbmd/plugins/sweetalert/sweetalert.min.js')); ?> -->
    <?php echo e(Html::script('bsbmd/js/pages/forms/form-validation.js')); ?>


    <!-- Jquery DataTable Plugin Js -->
    <?php echo e(Html::script('bsbmd/plugins/jquery-datatable/jquery.dataTables.js')); ?>

    <?php echo e(Html::script('bsbmd/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js')); ?>

   
    <?php echo e(Html::script('bsbmd/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js')); ?>

    <?php echo e(Html::script('bsbmd/plugins/jquery-datatable/extensions/export/buttons.flash.min.js')); ?>

    <?php echo e(Html::script('bsbmd/plugins/jquery-datatable/extensions/export/jszip.min.js')); ?>

    <?php echo e(Html::script('bsbmd/plugins/jquery-datatable/extensions/export/pdfmake.min.js')); ?>

    <?php echo e(Html::script('bsbmd/plugins/jquery-datatable/extensions/export/vfs_fonts.js')); ?>

    <?php echo e(Html::script('bsbmd/plugins/jquery-datatable/extensions/export/buttons.html5.min.js')); ?>

    <?php echo e(Html::script('bsbmd/plugins/jquery-datatable/extensions/export/buttons.print.min.js')); ?>

    <?php echo e(Html::script('bsbmd/js/pages/tables/jquery-datatable.js')); ?>

     <!-- Jquery Sweetalert  Js -->
    <?php echo e(Html::script('js/sweetalert.min.js')); ?>

    <?php echo e(Html::script('js/sweetAlert.js')); ?>

     <script>
         $(document).ready(function(){
            if($('.alert').length) {
                $('.alert').fadeOut(4000);
            }
         });
     </script>
    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>