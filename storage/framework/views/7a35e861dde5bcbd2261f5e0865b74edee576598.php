<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->getFromJson('new-property'); ?>
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
<?php if(Session::has('message')): ?>
    <p class="alert <?php echo e(Session::get('alert-class', 'alert-info')); ?>"><?php echo e(Session::get('message')); ?></p>
<?php endif; ?>
<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="block-header">
            <h2>Property</h2>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header bg-pink">
                        <h2>Edit Property</h2>
                    </div>
                    <?php
                        $uniq_id = $property->temp_id;
                    ?>
                    <div class="body">
                        <form id="form_validation"  method="POST" action="<?php echo e(route('properties.update',$property['id'])); ?>" enctype="multipart/form-data">
                            <input type="hidden" name="_method" value="PUT">
                            <?php echo e(csrf_field()); ?>

                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <label class="form-label">Property Name <span class="req_field">*</span></label>
                                    <div class="form-group ">
                                        <div class="form-line">
                                            <input type="text" class="form-control" value="<?php echo e($property->name); ?>" name="name" id="property_name" placeholder="Enter Name Property Name">
                                        </div>
                                        <?php if($errors->has('name')): ?>
                                            <label id="name-error" class="error" for="name"><?php echo e($errors->first('name')); ?></label>
                                        <?php endif; ?>
                                    </div>
                                    <?php
                                        $language_title = json_decode($language_line_title);
                                    ?>
                                    <label class="form-label">Property Name In Italy</label>
                                    <div class="form-group ">
                                        <div class="form-line">
                                            <input type="text" class="form-control" id="property_name_italian" name="name_italian" value="<?php if(isset($language_title)): ?> <?php echo e($language_title->text->it); ?> <?php endif; ?>"  placeholder="Enter Property Name In Italy">
                                        </div>
                                        <?php if($errors->has('name_italian')): ?>
                                            <label id="name-error" class="error" for="name_italian"><?php echo e($errors->first('name_italian')); ?></label>
                                        <?php endif; ?>
                                    </div>
                                    <label class="form-label">Property Name In German</label>
                                    <div class="form-group ">
                                        <div class="form-line">
                                            <input type="text" class="form-control" id="property_name_german" name="name_german" value="<?php if(isset($language_title)): ?> <?php echo e($language_title->text->de); ?> <?php endif; ?>"  placeholder="Enter Property Name In German">
                                        </div>
                                        <?php if($errors->has('name_italian')): ?>
                                            <label id="name-error" class="error" for="name_italian"><?php echo e($errors->first('name_italian')); ?></label>
                                        <?php endif; ?>
                                    </div>

                                    <div class="row">
                                         <div class=col-sm-4>
                                              <label class="form-label">Property ID </label>
                                              <div class="form-group ">
                                                  <div class="form-line">
                                                      <input type="text" class="form-control" id="property_id" value="<?php echo e($property->property_id); ?>" name="property_id" required placeholder="Enter a Property ID" readonly>
                                                  </div>
                                                  <?php if($errors->has('property_id')): ?>
                                                      <label id="property-id-error" class="error" for="property_id"><?php echo e($errors->first('property_id')); ?></label>
                                                  <?php endif; ?>
                                              </div>
                                         </div>
                                         <div class=col-sm-4>
                                              <label class="form-label">Sequence ID <span class="req_field">*</span></label>
                                              <div class="form-group">
                                                    <div class="form-line">
                                                       <input type="text" class="form-control" name="property_sequence_id" value="<?php echo e($property->property_sequence_id); ?>" id="property_sequence_id" placeholder="Enter a Property ID">
                                                    </div>
                                                   <?php if($errors->has('property_sequence_id')): ?>
                                                       <label id="property-id-error" class="error" for="property_sequence_id"><?php echo e($errors->first('property_sequence_id')); ?></label>
                                                   <?php endif; ?>
                                               </div>
                                         </div>
                                         <div class="col-sm-4">
                                               <label class="form-label">Price <span class="req_field">*</span></label>
                                               <div class="form-group ">
                                                    <div class="form-line">
                                                         <input type="text" class="form-control" value=<?php echo e($property->price); ?> name="price" id="price" placeholder="Enter Actual Property Price">
                                                    </div>
                                                    <?php if($errors->has('price')): ?>
                                                        <label id="name-error" class="error" for="price"><?php echo e($errors->first('price')); ?></label>
                                                    <?php endif; ?>
                                              </div>
                                         </div>
                                    </div>

                                    <label class="form-label">Short Description <span class="req_field">*</span></label>
                                    <div class="form-group ">
                                        <div class="form-line">
                                            <textarea rows="2" class="form-control" name="short_description"  id="short_description" placeholder="Enter property short description"><?php echo e($property->short_description); ?></textarea>
                                        </div>
                                        <?php if($errors->has('short_description')): ?>
                                            <label id="name-error" class="error" for="short_description"><?php echo e($errors->first('short_description')); ?></label>
                                        <?php endif; ?>


                                    </div>
                                    <?php
                                        $language_desc = json_decode($language_line_short_desc);
                                    ?>
                                    <label class="form-label">Short Description In Italy</label>
                                    <div class="form-group ">
                                        <div class="form-line">
                                            <textarea rows="2" class="form-control" id="short_description_italian" name="italian_short_description"  placeholder="Enter property short description in Itay"><?php if($language_desc): ?> <?php echo e($language_desc->text->it); ?> <?php endif; ?></textarea>
                                        </div>
                                        <?php if($errors->has('italian_short_description')): ?>
                                            <label id="name-error" class="error" for="italian_short_description"><?php echo e($errors->first('italian_short_description')); ?></label>
                                        <?php endif; ?>
                                    </div>
                                    <label class="form-label">Short Description In German</label>
                                    <div class="form-group ">
                                        <div class="form-line">
                                            <textarea rows="2" class="form-control" id="short_description_german" name="german_short_description"  placeholder="Enter property short description in German"><?php if($language_desc): ?> <?php echo e($language_desc->text->de); ?> <?php endif; ?></textarea>
                                        </div>
                                        <?php if($errors->has('german_short_description')): ?>
                                            <label id="name-error" class="error" for="german_short_description"><?php echo e($errors->first('german_short_description')); ?></label>
                                        <?php endif; ?>
                                    </div>

                                    <label class="form-label">Detail Description</label>
                                    <div class="form-group ">
                                            <textarea id="ckeditor" class="detailed_description"  name="detail_description" ><?php echo e($property->detail_description); ?></textarea>
                                        <?php if($errors->has('detail_description')): ?>
                                            <label id="name-error" class="error" for="detail_description"><?php echo e($errors->first('detail_description')); ?></label>
                                        <?php endif; ?>
                                    </div>
                                    <?php
                                        $language = json_decode($language_line);
                                    ?>
                                    <label class="form-label">Description In Italy</label>
                                    <div class="form-group ">
                                        <div class="form-line">
                                            <textarea id="ckeditor2" class="detailed_description"  name="italian" ><?php if($language): ?> <?php echo e(strip_tags($language->text->it)); ?> <?php endif; ?></textarea>
                                        </div>

                                    </div>
                                    <label class="form-label">Description In German</label>
                                    <div class="form-group ">
                                        <div class="form-line">
                                            <textarea id="ckeditor3" class="detailed_description"  name="german" ><?php if($language): ?> <?php echo e(strip_tags($language->text->de)); ?> <?php endif; ?></textarea>
                                        </div>

                                    </div>
                                    <div style="margin-bottom: 20px;">
                                         <label class="form-label">Property Image Gallery</label>
                                         <div class="form-group ">
                                             <div class="dropzone clsbox" id="mydropzone"></div>
                                             <input type="hidden" value="<?php echo e($uniq_id); ?>" id="gallery_token" name="gallery_token">
                                         </div>
                                    </div>
                                    <span class="img-alert-list"><li>1)Max file size allowed is 2MB </li><li>2)Max file allowed is 20</li></span>
                                    <div class="form-group">
                                        <div class="row ">
                                        <?php $__currentLoopData = $gallery_images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gallery_image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="col-md-2">
                                               <div class="admin-gal-img">
                                                <img src="<?php echo e(asset("/images/cover-images/".$gallery_image->image)); ?>" width="180" height="120">
                                                <a href="<?php echo e(url('admin/properties/destroy_image_gallery')); ?><?php echo e('/'.$gallery_image['id']); ?>">Delete</a>
                                               </div>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <br>
                                        </div>
                                    </div>
                                    <div class="row" >
                                         <div class=col-sm-2>
                                              <label class="form-label">Beds</label>
                                              <div class="form-group ">
                                                   <div class="form-line">
                                                        <input type="text" class="form-control" value="<?php echo e($property->beds); ?>" id="property_beds" name="beds" required placeholder="Enter No. of Beds">
                                                   </div>
                                                   <?php if($errors->has('beds')): ?>
                                                        <label id="name-error" class="error" for="beds"><?php echo e($errors->first('beds')); ?></label>
                                                   <?php endif; ?>
                                              </div>
                                         </div>
                                         <div class=col-sm-2>
                                             <label class="form-label">Baths</label>
                                             <div class="form-group ">
                                                  <div class="form-line">
                                                       <input type="text" class="form-control" value="<?php echo e($property->baths); ?>" id="property_baths" name="baths" required placeholder="Enter No. of Baths">
                                                  </div>
                                                 <?php if($errors->has('baths')): ?>
                                                    <label id="name-error" class="error" for="baths"><?php echo e($errors->first('baths')); ?></label>
                                                 <?php endif; ?>
                                             </div>
                                         </div>
                                         <div class=col-sm-2>
                                              <label class="form-label">Kitchen</label>
                                              <div class="form-group ">
                                                   <div class="form-line">
                                                        <input type="text" class="form-control" value="<?php echo e($property->kitchens); ?>" id="property_kitchen" name="kitchens" >
                                                   </div>
                                                   <?php if($errors->has('beds')): ?>
                                                        <label id="name-error" class="error" for="kitchens"><?php echo e($errors->first('kitchens')); ?></label>
                                                   <?php endif; ?>
                                              </div>
                                         </div>
                                         <div class=col-sm-2>
                                              <label class="form-label">Parking</label>
                                              <div class="form-group ">
                                                   <div class="form-line">
                                                        <input type="text" class="form-control" value="<?php echo e($property->parking); ?>" name="parking" id="property_parking" placeholder="Parking">
                                                   </div>
                                                   <?php if($errors->has('parking')): ?>
                                                       <label id="name-error" class="error" for="parking"><?php echo e($errors->first('parking')); ?></label>
                                                   <?php endif; ?>
                                              </div>
                                         </div>
                                         <div class=col-sm-2>
                                              <label class="form-label">Fireplace</label>
                                              <div class="form-group ">
                                                   <div class="form-line">
                                                        <input type="text" class="form-control" value="<?php echo e($property->fire_place); ?>" name="fireplace" id="property_fire_place">
                                                   </div>
                                                   <?php if($errors->has('fireplace')): ?>
                                                        <label id="name-error" class="error" for="fireplace"><?php echo e($errors->first('fireplace')); ?></label>
                                                   <?php endif; ?>
                                              </div>
                                         </div>
                                         <div class=col-sm-2>
                                              <label class="form-label">Terrace</label>
                                              <div class="form-group ">
                                                   <div class="form-line">
                                                        <input type="text" class="form-control" value="<?php echo e($property->terrace); ?>" name="terrace" id="property_terrace">
                                                   </div>
                                                   <?php if($errors->has('terrace')): ?>
                                                        <label id="name-error" class="error" for="terrace"><?php echo e($errors->first('terrace')); ?></label>
                                                   <?php endif; ?>
                                              </div>
                                         </div>
                                         <div class=col-sm-3>
                                              <label class="form-label">Interior <span class="req_field">*</span></label>
                                              <div class="form-group ">
                                                   <div class="form-line">
                                                        <input type="text" class="form-control" value="<?php echo e($property->plot_size); ?>" name="plot_size" id="plot_size" placeholder="Enter Interior Size">
                                                   </div>
                                                   <?php if($errors->has('plot_size')): ?>
                                                       <label id="name-error" class="error" for="plot_size"><?php echo e($errors->first('plot_size')); ?></label>
                                                   <?php endif; ?>
                                               </div>
                                         </div>
                                         <div class=col-sm-3>
                                              <label class="form-label">Living Area <span class="req_field">*</span></label>
                                              <div class="form-group ">
                                                   <div class="form-line">
                                                        <input type="text" class="form-control" value="<?php echo e($property->living_area); ?>" name="living_area" id="living_area" placeholder="Enter Living Area Size with Measurement">
                                                   </div>
                                                   <?php if($errors->has('living_area')): ?>
                                                       <label id="name-error" class="error" for="living_area"><?php echo e($errors->first('living_area')); ?></label>
                                                   <?php endif; ?>
                                              </div>
                                         </div>
                                         <div class=col-sm-3>
                                              <label class="form-label">Latitude <span class="req_field">*</span></label>
                                              <div class="form-group ">
                                                   <div class="form-line">
                                                       <input type="text" class="form-control" value="<?php echo e($property->property_location_latitude); ?>" name="property_location_latitude" id="latitude" placeholder="Enter Latitude Coordinates">
                                                   </div>
                                                   <?php if($errors->has('property_location_latitude')): ?>
                                                       <label id="name-error" class="error" for="property_location_latitude"><?php echo e($errors->first('property_location_latitude')); ?></label>
                                                   <?php endif; ?>
                                              </div>
                                         </div>
                                         <div class=col-sm-3>
                                              <label class="form-label">Longitude <span class="req_field">*</span></label>
                                              <div class="form-group ">
                                                   <div class="form-line">
                                                        <input type="text" class="form-control" value="<?php echo e($property->property_location_longitude); ?>" name="property_location_longitude" id="longitude" placeholder="Enter Longitude Coordinates">
                                                   </div>
                                                   <?php if($errors->has('property_location_longitude')): ?>
                                                       <label id="name-error" class="error" for="property_location_longitude"><?php echo e($errors->first('property_location_longitude')); ?></label>
                                                   <?php endif; ?>
                                              </div>
                                         </div>
                                         <div class="col-sm-3">
                                              <label class="form-label">Offer Type</label>
                                              <div class="form-group ">
                                                   <div class="form-line">
                                                        <select class="form-control" id="offer" name="offer_id" required>
                                                            <?php $__currentLoopData = $offers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $offer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <?php if($property->offer['id'] == $offer['id']): ?>
                                                                    <option value=<?php echo e($offer['id']); ?> selected><?php echo e($offer->offer_name); ?></option>
                                                                <?php else: ?>
                                                                    <option value=<?php echo e($offer->id); ?>><?php echo e($offer->offer_name); ?></option>
                                                                <?php endif; ?>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                         </select>
                                                   </div>
                                                   <?php if($errors->has('type_id')): ?>
                                                       <label id="name-error" class="error" for="offer_id"><?php echo e($errors->first('type_id')); ?></label>
                                                   <?php endif; ?>
                                               </div>
                                         </div>
                                         <div class="col-sm-3">
                                              <label class="form-label">Property Type</label>
                                              <div class="form-group ">
                                                   <div class="form-line">
                                                        <select class="form-control" id="type_id" name="type_id" required>
                                                            <?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <?php if($property->type->id == $type->id): ?>
                                                                    <option value=<?php echo e($type->id); ?> selected><?php echo e($type->type_name); ?></option>
                                                                <?php else: ?>
                                                                    <option value=<?php echo e($type->id); ?>><?php echo e($type->type_name); ?></option>
                                                                <?php endif; ?>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>
                                                   </div>
                                                   <?php if($errors->has('type_id')): ?>
                                                       <label id="name-error" class="error" for="type_id"><?php echo e($errors->first('type_id')); ?></label>
                                                   <?php endif; ?>
                                              </div>
                                         </div>
                                         <div class="col-sm-3">
                                              <label class="form-label">Property Condition</label>
                                              <div class="form-group ">
                                                   <div class="form-line">
                                                        <select class="form-control" id="condition" name="condition_id" required>
                                                            <?php $__currentLoopData = $conditions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $condition): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <?php if($property->condition->id == $condition->id): ?>
                                                                    <option value=<?php echo e($condition->id); ?> selected><?php echo e($condition->condition_display_name); ?></option>
                                                                <?php else: ?>
                                                                    <option value=<?php echo e($condition->id); ?>><?php echo e($condition->condition_display_name); ?></option>
                                                                <?php endif; ?>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>
                                                   </div>
                                                   <?php if($errors->has('condition_id')): ?>
                                                       <label id="name-error" class="error" for="condition_id"><?php echo e($errors->first('type_id')); ?></label>
                                                   <?php endif; ?>
                                               </div>
                                         </div>
                                         <div class="col-sm-3">
                                              <label class="form-label">Region</label>
                                              <div class="form-group ">
                                                   <div class="form-line">
                                                       <select class="form-control" id="region" name="region_id" required>
                                                           <?php $__currentLoopData = $regions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $region): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option value=<?php echo e($region->id); ?> <?php if($property->region_id == $region->id): ?><?php echo e('selected'); ?><?php endif; ?>><?php echo e($region->region_name); ?></option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                       </select>
                                                    </div>
                                                    <?php if($errors->has('region_id')): ?>
                                                        <label id="name-error" class="error" for="region_id"><?php echo e($errors->first('region_id')); ?></label>
                                                    <?php endif; ?>
                                               </div>
                                         </div>


                                         <div class="col-sm-3">
                                              <label class="form-label">Location</label>
                                              <div class="form-group ">
                                                   <div class="form-line">
                                                       <select class="form-control" id="area" name="area_id">
                                                           <?php $__currentLoopData = $areas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $area): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                               <option value=<?php echo e($area->id); ?> <?php if($property->area_id == $area->id): ?><?php echo e('selected'); ?><?php endif; ?>><?php echo e($area->area_name); ?></option>
                                                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                       </select>
                                                  </div>
                                                 <?php if($errors->has('area_id')): ?>
                                                     <label id="name-error" class="error" for="area_id"><?php echo e($errors->first('area_id')); ?></label>
                                                 <?php endif; ?>
                                              </div>
                                         </div>
                                         <div class="col-sm-3">
                                              <label class="form-label">Vat</label>
                                              <div class="form-group ">
                                                   <div class="form-line">
                                                        <input type="text" class="form-control" value=<?php echo e($property->vat); ?> name="vat" id="vat" placeholder="Enter Vat Amount" value="<?php echo e($settings->default_vat); ?>">
                                                   </div>
                                                   <?php if($errors->has('vat')): ?>
                                                       <label id="name-error" class="error" for="vat"><?php echo e($errors->first('vat')); ?></label>
                                                   <?php endif; ?>
                                              </div>
                                         </div>
                                         <div class="col-sm-3">
                                              <label class="form-label">Special Offer Price</label>
                                              <div class="form-group ">
                                                   <div class="form-line">
                                                        <input type="text" class="form-control" value="<?php echo e($property->price_upon_request); ?>" name="price_upon_request" id="price_upon_request" placeholder="Enter Price Up on Request">
                                                   </div>
                                                   <?php if($errors->has('price_upon_request')): ?>
                                                       <label id="name-error" class="error" for="price_upon_request"><?php echo e($errors->first('price_upon_request')); ?></label>
                                                   <?php endif; ?>
                                               </div>
                                         </div>
                                         <div class="col-sm-3">
                                              <label class="form-label">Nearest Destination</label>
                                              <div class="form-group ">
                                                   <div class="form-line">
                                                        <select class="form-control" id="destination" name="destination_id">
                                                            <option value=''>No Destination</option>
                                                                <?php $__currentLoopData = $destinations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $destination): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <?php if($property->destination_id == $destination->id): ?>
                                                                        <option value=<?php echo e($destination->id); ?> selected><?php echo e($destination->destination_name); ?></option>
                                                                    <?php else: ?>
                                                                        <option value=<?php echo e($destination->id); ?>><?php echo e($destination->destination_name); ?></option>
                                                                    <?php endif; ?>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>
                                                   </div>
                                                   <?php if($errors->has('destination_id')): ?>
                                                       <label id="name-error" class="error" for="destination_id"><?php echo e($errors->first('destination_id')); ?></label>
                                                   <?php endif; ?>
                                              </div>
                                         </div>
                                         <div class=col-sm-3>
                                              <label class="form-label">Availability</label>
                                              <div class="form-group ">
                                                   <div class="form-line">
                                                       <select class="form-control" id="availability" value="<?php echo e($property->availability); ?>" name="availability" required>
                                                             <option value="Y" <?php if($property->availability == "Y"): ?><?php echo e('selected'); ?><?php endif; ?>>Available</option>
                                                             <option value="N" <?php if($property->availability == "N"): ?><?php echo e('selected'); ?><?php endif; ?>>Sold/Moved</option>
                                                        </select>
                                                  </div>
                                                  <?php if($errors->has('availability')): ?>
                                                     <label id="name-error" class="error" for="availability"><?php echo e($errors->first('availability')); ?></label>
                                                  <?php endif; ?>
                                              </div>
                                         </div>
                                         <div class="col-sm-3">
                                              <label class="form-label">Agencies</label>
                                              <div class="form-group ">
                                                   <div class="form-line">
                                                        <select class="form-control" id="agent_id" name="agent_id">
                                                             <option value=''>No Agency</option>
                                                             <?php $__currentLoopData = $agencies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $agency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                  <option value=<?php echo e($agency->id); ?> <?php if($property->agent_id == $agency->id): ?><?php echo e('selected'); ?><?php endif; ?>><?php echo e($agency->agent_name); ?></option>
                                                             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                         </select>
                                                   </div>
                                                   <?php if($errors->has('destination_id')): ?>
                                                       <label id="name-error" class="error" for="agency_id"><?php echo e($errors->first('agency_id')); ?></label>
                                                   <?php endif; ?>
                                              </div>
                                         </div>
                                    </div>
                                    <?php
                                        $language_meta_title = json_decode($language_line_meta_title);
                                         $language_meta_desc = json_decode($language_line_meta_desc);
                                    ?>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label class="form-label">Meta Title <span class="req_field">*</span></label>
                                            <div class="form-group ">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" name="meta_title" id="meta_title" placeholder="Enter Meta Title" value="<?php echo e($property->meta_title); ?>">
                                                </div>
                                                <?php if($errors->has('meta_title')): ?>
                                                <label id="name-error" class="error" for="meta_title"><?php echo e($errors->first('meta_title')); ?></label>
                                                <?php endif; ?>
                                            </div>
                                            <label class="form-label">Meta Description <span class="req_field">*</span></label>
                                            <div class="form-group ">
                                                <div class="form-line">
                                                    <textarea rows="2" class="form-control" name="meta_description" id="meta_description" placeholder="Enter Meta Description" ><?php echo e($property->meta_description); ?></textarea>
                                                </div>
                                                <?php if($errors->has('meta_description')): ?>
                                                <label id="name-error" class="error" for="meta_description"><?php echo e($errors->first('meta_description')); ?></label>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="form-label">Meta Title German</label>
                                            <div class="form-group ">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" name="meta_title_german" id="meta_title_german" placeholder="Enter Meta Title German" value="<?php if(isset($language_meta_title->text->de)): ?> <?php echo e($language_meta_title->text->de); ?> <?php endif; ?>">
                                                </div>
                                                <?php if($errors->has('meta_title_german')): ?>
                                                <label id="name-error" class="error" for="meta_title_german"><?php echo e($errors->first('meta_title_german')); ?></label>
                                                <?php endif; ?>
                                            </div>
                                            <label class="form-label">Meta Description German</label>
                                            <div class="form-group ">
                                                <div class="form-line">
                                                    <textarea rows="2" class="form-control" name="meta_description_german" id="meta_description_german" placeholder="Enter Meta Description German"><?php if($language_meta_desc): ?> <?php echo e($language_meta_desc->text->de); ?> <?php endif; ?></textarea>
                                                </div>
                                                <?php if($errors->has('meta_description_german')): ?>
                                                <label id="name-error" class="error" for="meta_description_german"><?php echo e($errors->first('meta_description_german')); ?></label>
                                                <?php endif; ?>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <label class="form-label">Meta Title Italian</label>
                                            <div class="form-group ">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" name="meta_title_italian" id="meta_title_italian" placeholder="Enter Meta Title Italian" value="<?php if(isset($language_meta_title->text->it)): ?> <?php echo e($language_meta_title->text->it); ?> <?php endif; ?>">
                                                </div>
                                                <?php if($errors->has('meta_title_italian')): ?>
                                                <label id="name-error" class="error" for="meta_title_italian"><?php echo e($errors->first('meta_title_italian')); ?></label>
                                                <?php endif; ?>
                                            </div>
                                            <label class="form-label">Meta Description Italian</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <textarea rows="2" class="form-control" name="meta_description_italian" id="meta_description_italian" placeholder="Enter Meta Description Italian"><?php if($language_meta_desc): ?> <?php echo e($language_meta_desc->text->it); ?> <?php endif; ?></textarea>
                                                </div>
                                                <?php if($errors->has('meta_description_italian')): ?>
                                                <label id="name-error" class="error" for="meta_description_italian"><?php echo e($errors->first('meta_description_italian')); ?></label>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>

                                    

                                    

                                   <div class="row">
                                        <div class="col-sm-12">
                                             <label class="form-label">Ameneties</label>
                                             <div class="input-group input-group-lg">
                                                  <span class="input-group-addon">
                                                    <div class="row">
                                                  <?php $__currentLoopData = $amenities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $amenity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                      <div class="col-md-6">
                                                      <div class="amen-form-group">
                                                           <input type="checkbox" name="ameneties[]" class="amenity filled-in" value="<?php echo e($amenity['id']); ?>" id="ig_checkbox_<?php echo e($amenity['id']); ?>" <?php if(in_array($amenity->id,$selected_ameneties)): ?><?php echo e('checked'); ?><?php endif; ?>>
                                                           <label for="ig_checkbox_<?php echo e($amenity['id']); ?>" ><?php echo e($amenity['amenities_display_name']); ?></label>
                                                      </div>
                                                    </div>
                                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </div>
                                              </div>
                                         </div>
                                         <div class="col-sm-12">
                                              <label class="form-label">Property Cover Image <span class="req_field">*</span></label>
                                              <div class="form-group ">
                                                   <div class="form-line">
                                                       <img src=<?php echo e(asset("images/cover-images/" . $property->cover_image_name)); ?> width="300" height="150"/>
                                                        <input type="file" id="cover_image" name="cover_image" class="form-control" />
                                                   </div>
                                                   <?php if($errors->has('cover_image')): ?>
                                                        <label id="name-error" class="error" for="cover_image"><?php echo e($errors->first('cover_image')); ?></label>
                                                   <?php endif; ?>
                                              </div>
                                         </div>
                                         <input type="hidden" id="consolidated_imge" value="<?php echo e($property->cover_image_name); ?>">

                                   </div>
                                    <input type="hidden" name="source" id="data-source">
                                </div>
                            </div>
                            <button id="button" class="btn btn-primary waves-effect pro-submit" type="button">UPDATE</button>
                            <button id="preview-button" class="btn btn-primary waves-effect pro-submit" type="button">Preview(Single Property)</button>
                            <button id="preview-card-button" class="btn btn-primary waves-effect pro-submit" type="button">Preview(Property Card)</button>
                            <button class="btn btn-info1" type="button" onclick="window.history.back();" >BACK</button>
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

       $('body').on('keypress', '#latitude,#longitude,#vat, #price_upon_request', function(event) {
        var charCode = event.which;
        if (charCode > 31 && (charCode < 45 || charCode > 57))
        return false;
        
        return true;
    });

    $('body').on('keypress', '#property_sequence_id, #price, #property_beds, #property_baths, #property_kitchen, #property_parking, #property_fire_place, #property_terrace, #living_area, #plot_size', function(event) {
    var charCode = event.which;

    if ((charCode >= 32) && ((charCode < 48) || (charCode > 57))) {
      event.preventDefault();
    }
      
  });
        //drag and drop customization
        var k = parseInt(0);
        Dropzone.autoDiscover = false;
        var myDropzone = new Dropzone("div#mydropzone", {
          url: "/admin/image_gallery/"+$('#gallery_token').val(),
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
                        url: '/admin/delete_gallery_image',
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
        $("#button").click(function (e) {

            if($('.error').length > 0){
                $('.error').remove();
            }
            var name = $('#property_name').val().trim();
            var property_id = $('#property_id').val().trim();
            var property_sequence_id = $('#property_sequence_id').val().trim();
            var short_description = $('#short_description').val().trim();
            var detail_description = CKEDITOR.instances["ckeditor"].getData();
            var property_beds = $('#property_beds').val().trim();
            var property_baths = $('#property_baths').val().trim();
            var property_kitchen = $('#property_kitchen').val().trim();
            var property_parking = $('#property_parking').val().trim();
            var property_fire_place = $('#property_fire_place').val().trim();
            var property_terrace = $('#property_terrace').val().trim();

            var plot_size = $('#plot_size').val().trim();
            var living_area = $('#living_area').val().trim();
            var latitude = $('#latitude').val().trim();
            var longitude = $('#longitude').val().trim();
            var price = $('#price').val().trim();
            var meta_title = $('#meta_title').val().trim();
            var meta_description = $('#meta_description').val().trim();

            var vat = $('#vat').val().trim();
            //var price_upon_request = $('#price_upon_request').val().trim();

            if(name == '' || property_id == '' || property_sequence_id == '' || detail_description == '' || property_beds == '' || short_description == ''
            || property_baths == '' || property_kitchen == '' || property_parking == '' || property_fire_place == '' || property_terrace == ''
            || plot_size == '' || living_area == '' || latitude == '' || longitude == '' || price == '' || vat == '' || isNaN(property_beds)
            || isNaN(property_baths) || isNaN(property_kitchen) || isNaN(property_parking) || isNaN(property_fire_place) || isNaN(property_terrace)
            || isNaN(plot_size) || isNaN(living_area) || isNaN(latitude) || isNaN(longitude) || isNaN(price) || isNaN(vat) || meta_title == '' || meta_description == '' )
            {
                if(name == ''){
                    //console.log('1');
                    $('#property_name').after('<p class="error">Required</p>');
                }
                if(property_id == ''){
                    //console.log('2');
                    $('#property_id').after('<p class="error">Required</p>');
                }
                if(property_sequence_id == ''){
                    //console.log('3');
                    $('#property_sequence_id').after('<p class="error">Required</p>');
                }
                if(detail_description == ''){
                    //console.log('4');
                    $('#ckeditor').after('<p class="error">Required</p>');
                }
                if(short_description == ''){
                    //console.log('5');
                    $('#short_description').after('<p class="error">Required</p>');
                }
                if(property_beds == ''){
                    //console.log('6');
                    $('#property_beds').after('<p class="error">Required</p>');
                }
                if(property_baths == ''){
                    //console.log('7');
                    $('#property_baths').after('<p class="error">Required</p>');
                }
                if(property_kitchen == ''){
                    //console.log('8');
                    $('#property_kitchen').after('<p class="error">Required</p>');
                }

                if(property_parking == ''){
                    //console.log('9');
                    $('#property_parking').after('<p class="error">Required</p>');
                }
                if(property_fire_place == ''){
                    //console.log('10');
                    $('#property_fire_place').after('<p class="error">Required</p>');
                }
                if(property_terrace == ''){
                    //console.log('11');
                    $('#property_terrace').after('<p class="error">Required</p>');
                }
                if(plot_size == ''){
                    //console.log('12');
                    $('#plot_size').after('<p class="error">Required</p>');
                }
                if(living_area == ''){
                    //console.log('13');
                    $('#living_area').after('<p class="error">Required</p>');
                }
                if(latitude == ''){
                    //console.log('14');
                    $('#latitude').after('<p class="error">Required</p>');
                }
                if(longitude == ''){
                    //console.log('15');
                    $('#longitude').after('<p class="error">Required</p>');
                }
                if(price == ''){
                    //console.log('16');
                    $('#price').after('<p class="error">Required</p>');
                }
                if(vat == ''){
                    //console.log('17');
                    $('#vat').after('<p class="error">Required</p>');
                }
                // if(price_upon_request == ''){
                //     $('#price_upon_request').after('<p class="error">Required</p>');
                // }
                //numeric
                if(price != '' && isNaN(price)){
                    //console.log('18');
                    $('#price').after('<p class="error">Invalid Price</p>');
                }
                if(vat != '' && isNaN(vat)){
                    //console.log('18');
                    $('#vat').after('<p class="error">Invalid Vat</p>');
                }
                // if(price_upon_request != '' && isNaN(price_upon_request)){
                //     $('#price_upon_request').after('<p class="error">Invalid Price</p>');
                // }
                if(latitude != '' && isNaN(latitude)){
                    //console.log('19');
                    $('#latitude').after('<p class="error">Invalid Latitude</p>');
                }
                if(longitude != '' && isNaN(longitude)){
                    //console.log('20');
                    $('#longitude').after('<p class="error">Invalid Longitude</p>');
                }
                if(plot_size != '' && isNaN(plot_size)){
                    //console.log('21');
                    $('#plot_size').after('<p class="error">Invalid Plot Size</p>');
                }
                if(living_area != '' && isNaN(living_area)){
                    //console.log('22');
                    $('#living_area').after('<p class="error">Invalid Living Area</p>');
                }

                if(property_beds != '' && isNaN(property_beds)){
                    //console.log('23');
                    $('#property_beds').after('<p class="error">Invalid Bed</p>');
                }
                if(property_baths != '' && isNaN(property_baths)){
                    //console.log('24');
                    $('#property_baths').after('<p class="error">Invalid Baths</p>');
                }
                if(property_kitchen != '' && isNaN(property_kitchen)){
                    //console.log('25');
                    $('#property_kitchen').after('<p class="error">Invalid Kitchen</p>');
                }

                if(property_parking != '' && isNaN(property_parking)){
                    //console.log('26');
                    $('#property_parking').after('<p class="error">Invalid Parking</p>');
                }
                if(property_fire_place != '' && isNaN(property_fire_place)){
                    //console.log('27');
                    $('#property_fire_place').after('<p class="error">Invalid Fire Place</p>');
                }
                if(property_terrace != '' && isNaN(property_terrace)){
                    //console.log('28');
                    $('#property_terrace').after('<p class="error">Invalid Terrace</p>');
                }
                if(meta_title == ''){
                    //console.log('1');
                    $('#meta_title').after('<p class="error">Required</p>');
                }
                if(meta_description == ''){
                    //console.log('1');
                    $('#meta_description').after('<p class="error">Required</p>');
                }

                return false;
            }
            $('#form_validation').submit();
        });
        $("#preview-button").click(function(){
            console.log('dsadad');
            var name = $('#property_name').val().trim();
            var name_italian = $('#property_name_italian').val().trim();
            var name_german = $('#property_name_german').val().trim();

            var property_id = $('#property_id').val().trim();
            var property_sequence_id = $('#property_sequence_id').val().trim();

            var short_description = $('#short_description').val().trim();
            var short_description_in_italian = $('#short_description_italian').val().trim();
            var short_description_in_german = $('#short_description_german').val().trim();
            var italian_short_description = $('#short_description_italian').val().trim();
            var german_short_description = $('#short_description_german').val().trim();

            var detail_description = CKEDITOR.instances["ckeditor"].getData();

            var detail_description_in_italian = CKEDITOR.instances["ckeditor2"].getData();
            var detail_description_in_german = CKEDITOR.instances["ckeditor3"].getData();

            var italian = CKEDITOR.instances["ckeditor2"].getData();
            var german = CKEDITOR.instances["ckeditor3"].getData();

            var property_beds = $('#property_beds').val().trim();
            var property_baths = $('#property_baths').val().trim();
            var property_kitchen = $('#property_kitchen').val().trim();
            var property_parking = $('#property_parking').val().trim();
            var property_fire_place = $('#property_fire_place').val().trim();
            var property_terrace = $('#property_terrace').val().trim();

            var plot_size = $('#plot_size').val().trim();
            var living_area = $('#living_area').val().trim();

            var availability = $('#availability').val().trim();
            var latitude = $('#latitude').val().trim();
            var longitude = $('#longitude').val().trim();
            var area_id = $('#area').val().trim();
            var region_id = $('#region').val().trim();

            var type_id = $('#type_id').val().trim();
            var condition_id = $('#condition').val().trim();
            var offer_id = $('#offer').val().trim();

            var price = $('#price').val().trim();
            var cover_image = document.getElementById("cover_image").files;

            var image = $('#cover_image').prop("files")[0];

            var cover_image = document.getElementById("cover_image").files.length;
            var ameneties = [];
            $('.amenity').each(function(){
                if($(this).prop('checked') == true){
                    ameneties.push($(this).val());
                }
            });

            if(cover_image > 0){
                var formImage = new FormData();
                formImage.append('cover_image', image , image['name']);
            }else{
                var cover_image = $('#consolidated_imge').val();
            }



            var temp_id = $('#gallery_token').val();
            var vat = $('#vat').val().trim();
            var price_upon_request = $('#price_upon_request').val().trim();
            var destination_id = $('#destination').val().trim();
            var agent_id = $('#agent_id').val();



            $.ajax({
                url: '<?php echo e(url('')); ?>/admin/property_preview_edit',
                data: {
                    'name' : name,
                    'name_italian' : name_italian,
                    'name_german' : name_german,
                    'name_italian' : name_italian,
                    'property_id' : property_id,
                    'property_sequence_id' : property_sequence_id,
                    'short_description' : short_description,
                    'short_description_in_italian' : italian_short_description,
                    'short_description_in_german' : german_short_description,
                    'italian_short_description' : italian_short_description,
                    'german_short_description' : german_short_description,
                    'detail_description' : detail_description,
                    'detail_description_in_italian' : detail_description_in_italian,
                    'detail_description_in_german' : detail_description_in_german,
                    'italian' : italian,
                    'german' : german,
                    'beds' : property_beds,
                    'baths' : property_baths,
                    'kitchens' : property_kitchen,
                    'parking' : property_parking,
                    'fire_place' : property_fire_place,
                    'terrace' : property_terrace,
                    'plot_size' : plot_size,
                    'living_area' : living_area,
                    'availability' : availability,
                    'latitude' : latitude,
                    'longitude' : longitude,
                    'area_id' : area_id,
                    'region_id' : region_id,
                    'type_id' : type_id,
                    'condition_id' : condition_id,
                    'offer_id' : offer_id,
                    'price' : price,
                    'cover_image' : cover_image,
                    'vat' : vat,
                    'price_upon_request' : price_upon_request,
                    'destination_id' : destination_id,
                    'agent_id' : agent_id,
                    'temp_id' : temp_id,
                    'ameneties' : ameneties

                },
                type: "POST",
                success: function(data){
                    if(cover_image > 0){
                        $.ajax({
                            url: '<?php echo e(url('')); ?>/admin/property_preview_edit/'+temp_id,
                            processData: false,
                            dataType : "JSON",
                            contentType: false,
                            data: formImage,
                            type: "POST",
                            success: function(data){
                                var url = "<?php echo url('/admin/single_property');?>"+'/'+temp_id;
                                 window.open(url);
                            }
                       });
                   }else{
                       var url = "<?php echo url('/admin/single_property');?>"+'/'+temp_id;
                       window.open(url);
                   }

                }
          });


        });
        $('#preview-card-button').click(function(){
            var name = $('#property_name').val().trim();
            var name_italian = $('#property_name_italian').val().trim();
            var name_german = $('#property_name_german').val().trim();

            var property_id = $('#property_id').val().trim();
            var property_sequence_id = $('#property_sequence_id').val().trim();

            var short_description = $('#short_description').val().trim();
            var short_description_in_italian = $('#short_description_italian').val().trim();
            var short_description_in_german = $('#short_description_german').val().trim();
            var italian_short_description = $('#short_description_italian').val().trim();
            var german_short_description = $('#short_description_german').val().trim();

            var detail_description = CKEDITOR.instances["ckeditor"].getData();

            var detail_description_in_italian = CKEDITOR.instances["ckeditor2"].getData();
            var detail_description_in_german = CKEDITOR.instances["ckeditor3"].getData();

            var italian = CKEDITOR.instances["ckeditor2"].getData();
            var german = CKEDITOR.instances["ckeditor3"].getData();

            var property_beds = $('#property_beds').val().trim();
            var property_baths = $('#property_baths').val().trim();
            var property_kitchen = $('#property_kitchen').val().trim();
            var property_parking = $('#property_parking').val().trim();
            var property_fire_place = $('#property_fire_place').val().trim();
            var property_terrace = $('#property_terrace').val().trim();

            var plot_size = $('#plot_size').val().trim();
            var living_area = $('#living_area').val().trim();

            var availability = $('#availability').val().trim();
            var latitude = $('#latitude').val().trim();
            var longitude = $('#longitude').val().trim();
            var area_id = $('#area').val().trim();
            var region_id = $('#region').val().trim();

            var type_id = $('#type_id').val().trim();
            var condition_id = $('#condition').val().trim();
            var offer_id = $('#offer').val().trim();

            var price = $('#price').val().trim();
            var cover_image = document.getElementById("cover_image").files;

            var image = $('#cover_image').prop("files")[0];

            var cover_image = document.getElementById("cover_image").files.length;
            var ameneties = [];
            $('.amenity').each(function(){
                if($(this).prop('checked') == true){
                    ameneties.push($(this).val());
                }
            });

            if(cover_image > 0){
                var formImage = new FormData();
                formImage.append('cover_image', image , image['name']);
            }



            var temp_id = $('#gallery_token').val();
            var vat = $('#vat').val().trim();
            var price_upon_request = $('#price_upon_request').val().trim();
            var destination_id = $('#destination').val().trim();
            var agent_id = $('#agent_id').val();



            $.ajax({
                url: '/admin/property_preview_edit',
                data: {
                    'name' : name,
                    'name_italian' : name_italian,
                    'name_german' : name_german,
                    'name_italian' : name_italian,
                    'property_id' : property_id,
                    'property_sequence_id' : property_sequence_id,
                    'short_description' : short_description,
                    'short_description_in_italian' : italian_short_description,
                    'short_description_in_german' : german_short_description,
                    'italian_short_description' : italian_short_description,
                    'german_short_description' : german_short_description,
                    'detail_description' : detail_description,
                    'detail_description_in_italian' : detail_description_in_italian,
                    'detail_description_in_german' : detail_description_in_german,
                    'italian' : italian,
                    'german' : german,
                    'beds' : property_beds,
                    'baths' : property_baths,
                    'kitchens' : property_kitchen,
                    'parking' : property_parking,
                    'fire_place' : property_fire_place,
                    'terrace' : property_terrace,
                    'plot_size' : plot_size,
                    'living_area' : living_area,
                    'availability' : availability,
                    'latitude' : latitude,
                    'longitude' : longitude,
                    'area_id' : area_id,
                    'region_id' : region_id,
                    'type_id' : type_id,
                    'condition_id' : condition_id,
                    'offer_id' : offer_id,
                    'price' : price,
                    //'cover_image' : cover_image,
                    'vat' : vat,
                    'price_upon_request' : price_upon_request,
                    'destination_id' : destination_id,
                    'agent_id' : agent_id,
                    'temp_id' : temp_id,
                    'ameneties' : ameneties

                },
                type: "POST",
                success: function(data){
                    if(cover_image > 0){
                        $.ajax({
                            url: '/admin/property_preview/'+temp_id,
                            processData: false,
                            dataType : "JSON",
                            contentType: false,
                            data: formImage,
                            type: "POST",
                            success: function(data){
                                var url = "<?php echo url('/admin/property_card');?>"+'/'+temp_id;
                                window.open(url);
                            }
                       });
                   }else{
                       var url = "<?php echo url('/admin/property_card');?>"+'/'+temp_id;
                       window.open(url);
                   }

                }
           });

        });
        $(function () {
            //CKEditor
            CKEDITOR.replace('ckeditor');
            CKEDITOR.replace('ckeditor2');
            CKEDITOR.replace('ckeditor3');
            CKEDITOR.config.height = 300;
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>