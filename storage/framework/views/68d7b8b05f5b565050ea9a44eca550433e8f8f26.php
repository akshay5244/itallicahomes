<?php $__env->startSection('title'); ?>
    Add New Post
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


<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
        <div class="container-fluid">
        <?php if(Session::has('message')): ?>
            <p class="alert <?php echo e(Session::get('alert-class', 'alert-info')); ?>"><?php echo e(Session::get('message')); ?></p>
        <?php endif; ?>
            <div class="block-header">
                <h2>Edit Posts</h2>
            </div>
            <?php
                $uniq_id = uniqid();
            ?>
            <!-- Vertical Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header bg-pink">
                            <h2>
                               Edit Posts
                            </h2>
                        </div>
                        <div class="body">
                           <form id="form_validation" method="POST" action="<?php echo e(route('add-post.update',$post->id)); ?>" enctype="multipart/form-data">
                               <input type="hidden" name="_method" value="PUT">
                               <?php echo e(csrf_field()); ?>

                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <label class="form-label">Post Title <span class="req_field">*</span></label>
                                        <div class="form-group ">
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="title" required value="<?php echo e($post->title); ?>">
                                            </div>
                                            <?php if($errors->has('title')): ?>
                                                <label id="name-error" class="error" for="title"><?php echo e($errors->first('title')); ?></label>
                                            <?php endif; ?>
                                        </div>
                                        <?php
                                            $language_title = json_decode($language_line_title);
                                        ?>
                                        <label class="form-label">Name/Title In Italian</label>
                                        <div class="form-group ">
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="name_italian" value="<?php if(\Lang::has('blog.blog_title_'.$post->id)): ?> <?php echo e($language_title->text->it); ?> <?php endif; ?>"  placeholder="Title  In Italian">
                                            </div>
                                            <?php if($errors->has('name_italian')): ?>
                                                <label id="name-error" class="error" for="name_italian"><?php echo e($errors->first('name_italian')); ?></label>
                                            <?php endif; ?>
                                        </div>
                                        <label class="form-label">Name/Title In German</label>
                                        <div class="form-group ">
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="name_german" value="<?php if(\Lang::has('blog.blog_title_'.$post->id)): ?> <?php echo e($language_title->text->de); ?> <?php endif; ?>"  placeholder="Enter Title  In German">
                                            </div>
                                            <?php if($errors->has('name_german')): ?>
                                                <label id="name-error" class="error" for="name_german"><?php echo e($errors->first('name_german')); ?></label>
                                            <?php endif; ?>
                                        </div>
                                        <?php
                                            $language_desc = json_decode($language_line_short_desc);
                                        ?>
                                        <label class="form-label">Short Description</label>
                                        <div class="form-group ">
                                            <div class="form-line">
                                                <textarea rows="2" class="form-control" name="short_description" placeholder="Short Description"><?php echo e($post->short_description); ?></textarea>
                                            </div>
                                            <?php if($errors->has('name_italian')): ?>
                                                <label id="name-error" class="error" for="name_italian"><?php echo e($errors->first('name_italian')); ?></label>
                                            <?php endif; ?>
                                        </div>
                                        <label class="form-label">Short Description In Italian</label>
                                        <div class="form-group ">
                                            <div class="form-line">
                                                <textarea rows="2" class="form-control" name="italian_short_description" placeholder="Enter Short Description In Italian"><?php echo e((\Lang::has('blog.blog_short_description_'.$post->id)) ? $language_desc->text->it : ''); ?></textarea>
                                            </div>
                                            <?php if($errors->has('italian_short_description')): ?>
                                                <label id="name-error" class="error" for="italian_short_description"><?php echo e($errors->first('italian_short_description')); ?></label>
                                            <?php endif; ?>
                                        </div>
                                        <label class="form-label">Short Description In German</label>
                                        <div class="form-group ">
                                            <div class="form-line">
                                                <textarea rows="2" class="form-control" name="german_short_description" placeholder="Enter Short Description In German"><?php echo e((\Lang::has('blog.blog_short_description_'.$post->id)) ? $language_desc->text->de : ''); ?></textarea>
                                            </div>
                                            <?php if($errors->has('german_short_description')): ?>
                                                <label id="name-error" class="error" for="german_short_description"><?php echo e($errors->first('german_short_description')); ?></label>
                                            <?php endif; ?>
                                        </div>
                                        <?php
                                            $language_con_desc = json_decode($language_line_desc);
                                        ?>
                                        <label class="form-label">Post Content</label>
                                        <div class="form-group ">
                                            <textarea id="ckeditor1" name="content" required ><?php echo e($post->content); ?></textarea>
                                            <?php if($errors->has('content')): ?>
                                                <label id="name-error" class="error" for="content"><?php echo e($errors->first('content')); ?></label>
                                            <?php endif; ?>
                                        </div>
                                        <label class="form-label">Content In Italian</label>
                                        <div class="form-group ">
                                            <div class="form-line">
                                                <textarea id="ckeditor2"  name="content_italian" required ><?php if(\Lang::has('blog.blog_description_'.$post->id)): ?> <?php echo e($language_con_desc->text->it); ?> <?php endif; ?></textarea>
                                            </div>
                                            <?php if($errors->has('content_italian')): ?>
                                                <label id="name-error" class="error" for="content_italian"><?php echo e($errors->first('content_italian')); ?></label>
                                            <?php endif; ?>
                                        </div>
                                        <label class="form-label">Content In German</label>
                                        <div class="form-group ">
                                            <div class="form-line">
                                                <textarea id="ckeditor3" name="content_german" required ><?php if(\Lang::has('blog.blog_description_'.$post->id)): ?> <?php echo e($language_con_desc->text->de); ?> <?php endif; ?></textarea>
                                            </div>
                                            <?php if($errors->has('name_italian')): ?>
                                                <label id="name-error" class="error" for="content_german"><?php echo e($errors->first('content_german')); ?></label>
                                            <?php endif; ?>
                                        </div>
                                        <label class="form-label">Blog Image Gallery</label>
                                        <div class="form-group ">
                                            <div class="dropzone clsbox" id="mydropzone">
                		                    </div>
                                            <input type="hidden" value="<?php echo e($uniq_id); ?>" id="gallery_token" name="gallery_token">
                                        <div>
                                        <ul class="img-alert-list"><li>1)Max file size allowed is 2MB </li><li>2)Max file allowed is 20</li></ul>
                                        <div class="form-group ">
                                            <?php $__currentLoopData = $gallery_images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gallery_image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <img src="<?php echo e(asset("/images/cover-images/".$gallery_image->image)); ?>" width="100px" height="100px">
                                                <a href="<?php echo e(url('admin/destroy_blog_image')); ?><?php echo e('/'.$gallery_image->id); ?>">Delete</a>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                        <label class="form-label">Cover Image</label>
                                        <div class="form-group ">
                                            <div class="form-line">
                                                <img src=<?php echo e(asset("images/post-cover-images/" . $post->cover_image)); ?> width="200px" height="200px"/>
                                                <input type="file" name="cover_image" class="form-control" />
                                            </div>
                                            <?php if($errors->has('cover_image')): ?>
                                                <label id="name-error" class="error" for="cover_image"><?php echo e($errors->first('cover_image')); ?></label>
                                            <?php endif; ?>
                                        </div>

                                        <label class="form-label">Published By</label>
                                        <div class="form-group ">
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="published_by" required value="<?php echo e(Auth::user()->name); ?>">
                                            </div>
                                            <?php if($errors->has('published_by')): ?>
                                                <label id="name-error" class="error" for="published_by"><?php echo e($errors->first('published_by')); ?></label>
                                            <?php endif; ?>
                                        </div>
                                        <label class="form-label">Online/Offline</label>
                                        <div class="form-group ">
                                            <div class="form-line">
                                                <select class="form-control" name="is_available" required>
                                                    <option value="1" <?php if($post->is_available == 1): ?><?php echo e('selected'); ?> <?php endif; ?>>Online</option>
                                                    <option value="0" <?php if($post->is_available == 0): ?><?php echo e('selected'); ?> <?php endif; ?>>Offline</option>
                                                </select>
                                            </div>
                                            <?php if($errors->has('is_available')): ?>
                                                <label id="name-error" class="error" for="is_available"><?php echo e($errors->first('is_available')); ?></label>
                                            <?php endif; ?>
                                        </div>

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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('extra-script'); ?>
    <?php echo e(Html::script('bsbmd/plugins/autosize/autosize.js')); ?>

    <?php echo e(Html::script('bsbmd/plugins/momentjs/moment.js')); ?>

    <?php echo e(Html::script('bsbmd/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js')); ?>

    <?php echo e(Html::script('bsbmd/js/pages/forms/basic-form-elements.js')); ?>

    <?php echo e(Html::script('bsbmd/plugins/jquery-validation/jquery.validate.js')); ?>

    <?php echo e(Html::script('bsbmd/plugins/jquery-steps/jquery.steps.js')); ?>

    <?php echo e(Html::script('bsbmd/plugins/sweetalert/sweetalert.min.js')); ?>

    <?php echo e(Html::script('bsbmd/js/pages/forms/form-validation.js')); ?>

    <?php echo e(Html::script('bsbmd/plugins/dropzone/dropzone.js')); ?>

    <!-- Ckeditor -->
    <?php echo e(Html::script('bsbmd/plugins/ckeditor/ckeditor.js')); ?>

    <script>
        //drag and drop customization
        Dropzone.autoDiscover = false;
        var myDropzone = new Dropzone("div#mydropzone", {
          url: "/admin/blog_image_gallery/"+$('#gallery_token').val(),
          uploadMultiple: true,
          parallelUploads: 20,
          autoProcessQueue : false,
          createImageThumbnails: true,
          addRemoveLinks: true,
          maxFiles: 20,

          init: function() {
            this.on('error', function(file, errorMessage) {
              console.log(errorMessage);
            });
            this.on('addedfile', function(file) {
                if(file.size > (1024 * 1024 * 2)){ // not more than 2mb
                    this.removeFile(file);
                }
            });
            this.on("maxfilesexceeded", function(file){
                this.removeFile(file);
            });
          }
        });
        $("#button").click(function (e) {
            e.preventDefault();
            myDropzone.processQueue();
            setTimeout(function(){ $('#form_validation').submit(); }, 2000);
        });

    </script>
    <script>
        $(function () {
            //CKEditor
            CKEDITOR.replace('ckeditor1');
            CKEDITOR.replace('ckeditor2');
            CKEDITOR.replace('ckeditor3');
            CKEDITOR.config.height = 300;
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>