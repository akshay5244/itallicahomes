<?php $__env->startSection('custom-css'); ?>
    <title><?php echo e(__('app.search')); ?></title>
<?php
if($properties && sizeof($properties)>0){
    $meta_descr = strip_tags($properties[0]->detail_description);
    $meta_descr= substr($meta_descr,0,160);
    $metakey= preg_replace('/[[:space:]]+/',',',$meta_descr);
}
?>
<meta name="description" content="<?php echo e(isset($meta_descr) ? $meta_descr : ''); ?>">
<meta name="keywords" content="<?php echo e(isset($metakey) ? $metakey : ''); ?>">

    <link rel="icon" href=<?php echo e(asset("ui/images/favicon.png")); ?> sizes="16x16" type="image/png">
    <!-- Bootstrap CSS Start -->
    <link rel="stylesheet" href=<?php echo e(asset("ui/css/bootstrap.min.css")); ?>>
    <!-- Bootstrap CSS End -->
    <!-- Custom CSS Start -->
    <link rel="stylesheet" href=<?php echo e(asset("ui/css/styles.css")); ?>>
    <link rel="stylesheet" href=<?php echo e(asset("ui/css/responsive.css")); ?>>
    <!-- Custom CSS End -->
    <!-- Autosearch CSS Start -->
    <link rel="stylesheet" href=<?php echo e(asset("ui/css/autosearch.css")); ?>>
    <link rel="stylesheet" href=<?php echo e(asset("ui/css/owl.carousel.min.css")); ?>>
    <link rel="stylesheet" href=<?php echo e(asset("ui/css/custom.css")); ?>>
    <!-- Autosearch CSS End -->
    <!-- Properties Slider Start -->
    <link rel="stylesheet" href=<?php echo e(asset("ui/css/thumbnail-slider.css")); ?> type="text/css" media="screen" />
    <!-- Properties Slider End -->
    <style type="text/css">
        .reset-btn {
                font-style: normal;
                text-transform: uppercase;
                font-size: 13px;
                font-family: 'robotomedium';
                display: block;
                background: #ef0000;
                color: #fff;
                text-align: center;
                width: 91px;
                border-radius: 24px;
                padding: 8px 6px;
                margin: 0px auto;
                border: 0px;
                cursor: pointer;

        }
    </style>

<?php $__env->stopSection(); ?>
<?php if(Session::has('message')): ?>
<div class="fav-alert-box row">
   <div class="col-11">
      <p class="fav-alert alert <?php echo e(Session::get('alert-class', 'alert-info')); ?>"><span class="fav-alert-icon"><i class="fas fa-heart"></i></span><?php echo e(Session::get('message')); ?></p>
   </div>
   <div class="col-1">
        <a href="javascript:void(0);" class="fav-alert-close"><i class="fas fa-times"></i></a>
   </div>
</div>
<?php endif; ?>
<?php $__env->startSection('content'); ?>
    <!-- Banner Section Start -->
    <div class="wrapper">
          <form id="form_validation" method="POST" action="<?php echo e(url(''.__('route.search').'')); ?>">
         <?php echo e(csrf_field()); ?>

        <div class="search-property-bg-img">
            <div class="main-container-wrapper">
                

                <div class="properties-searchbar-block">
                          <span>
                              <select class="form-control" name="property_offer">
                                <option value="" selected disabled><?php echo app('translator')->getFromJson('app.please_select'); ?></option>
                                  <?php $__currentLoopData = $propertyOffers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $propertyOffer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                      <?php if(\Lang::has('property_offer.property_offer_title_'.$propertyOffer->id)): ?>
                                          <option value=<?php echo e($propertyOffer->id); ?> <?php if($request->offer_id == $propertyOffer->id): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo e(trans('property_offer.property_offer_title_'.$propertyOffer->id)); ?></option>
                                      <?php else: ?>
                                          <option value=<?php echo e($propertyOffer->id); ?> <?php if($request->offer_id == $propertyOffer->id): ?> <?php echo e('selected'); ?> <?php endif; ?> ><?php echo e($propertyOffer->offer_name); ?></option>
                                      <?php endif; ?>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              </select>
                          </span>
                    <abbr>
                        <input type="text" name="q" value="<?php if(trim($request->q)): ?> <?php echo e($request->q); ?> <?php endif; ?>" placeholder="<?php echo app('translator')->getFromJson('app.keyword_or_listing'); ?>" id="autosearchbar"/>
                        
                    </abbr>
                    <em>
                        <button class="ser-btn" type="submit" href="javascript:void(0)"><?php echo app('translator')->getFromJson('app.submit'); ?></button>
                        
                    </em>
                </div>
                <ul class="properties-filter-more">
                    <li>
                        <select class="form-control" name="region_id">
                            <option value="" selected disabled><?php echo app('translator')->getFromJson('app.region'); ?></option>
                            <?php $__currentLoopData = $regions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $region): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(\Lang::has('region.region_title_'.$region->id)): ?>
                                    <option value=<?php echo e($region->id); ?> <?php if($request->region_id == $region->id): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo e(trans('region.region_title_'.$region->id)); ?></option>
                                <?php else: ?>
                                    <option value=<?php echo e($region->id); ?> <?php if($request->region_id == $region->id): ?> <?php echo e('selected'); ?> <?php endif; ?> ><?php echo e($region->region_name); ?></option>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </li>
                    <li>
                        <select class="form-control" name="destination_id">
                            <option value="" selected disabled><?php echo app('translator')->getFromJson('app.destinations'); ?></option>
                            <?php $__currentLoopData = $destinations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $destination): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(\Lang::has('destination.destination_title_'.$destination->id)): ?>
                                    <option value=<?php echo e($destination->id); ?>  <?php if($request->destination_id == $destination->id): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo e(trans('destination.destination_title_'.$destination->id)); ?></option>
                                <?php else: ?>
                                    <option value=<?php echo e($destination->id); ?>  <?php if($request->destination_id == $destination->id): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo e($destination->destination_name); ?></option>
                                <?php endif; ?>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </li>
                    <li>
                        <select class="form-control" name="property_type_id">
                            <option value="" selected disabled><?php echo app('translator')->getFromJson('app.type'); ?></option>
                            <?php $__currentLoopData = $propertyTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $propertyType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <?php if(Config::get('app.locale') == 'en'): ?>
                                    <?php
                                        $property_type_name = $propertyType->type_name;
                                    ?>
                                <?php elseif(Config::get('app.locale') == 'it'): ?>
                                    <?php
                                        $property_type_name = $propertyType->name_italian;
                                    ?>
                                <?php elseif(Config::get('app.locale') == 'de'): ?>
                                    <?php
                                        $property_type_name = $propertyType->name_german;
                                    ?>
                                <?php endif; ?>
                            <option value=<?php echo e($propertyType->id); ?>  <?php if($request->property_type_id == $propertyType->id): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo e(isset($property_type_name) ? $property_type_name : ''); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </li>
                    <li>
                        <select class="form-control" name="property_condition_id">
                            <option value="" selected disabled><?php echo app('translator')->getFromJson('app.condition'); ?></option>
                            <?php $__currentLoopData = $conditions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $condition): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(\Lang::has('condition.condition_display_name_'.$condition->id)): ?>
                                    <option value=<?php echo e($condition->id); ?> <?php if($request->property_condition_id == $condition->id): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo e(trans('condition.condition_display_name_'.$condition->id)); ?></option>
                                <?php else: ?>
                                    <option value=<?php echo e($condition->id); ?> <?php if($request->property_condition_id == $condition->id): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo e($condition->condition_display_name); ?></option>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </li>
                    <li>
                        <select class="form-control" name="price_range_id">
                            <option value="" selected disabled><?php echo app('translator')->getFromJson('app.price'); ?></option>
                            <option value="100000" <?php if($request->price_range_id == 100000): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo app('translator')->getFromJson('app.to'); ?> 100.000 <i>&euro;</i></option>
                            <option value="200000" <?php if($request->price_range_id == 200000): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo app('translator')->getFromJson('app.to'); ?> 200.000 <i>&euro;</i></option>
                            <option value="300000" <?php if($request->price_range_id == 300000): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo app('translator')->getFromJson('app.to'); ?> 300.000 <i>&euro;</i></option>
                            <option value="400000" <?php if($request->price_range_id == 400000): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo app('translator')->getFromJson('app.to'); ?> 400.000 <i>&euro;</i></option>
                            <option value="500000" <?php if($request->price_range_id == 500000): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo app('translator')->getFromJson('app.to'); ?> 500.000 <i>&euro;</i></option>
                            <option value="750000" <?php if($request->price_range_id == 750000): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo app('translator')->getFromJson('app.to'); ?> 750.000 <i>&euro;</i></option>
                            <option value="1000000" <?php if($request->price_range_id == 1000000): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo app('translator')->getFromJson('app.to'); ?> 1.000.000 <i>&euro;</i></option>
                            <option value="1500000" <?php if($request->price_range_id == 1500000): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo app('translator')->getFromJson('app.to'); ?> 1.500.000 <i>&euro;</i></option>
                        </select>
                    </li>
                </ul>
            </div>
        </div>
        <div class="properties-more-advance-filter-main">
            <div class="properties-more-advance-filter">
                <div class="main-container-wrapper">
                    <div class="wrapper">
                        <!-- <ul class="search-map-filter">
                           <li class="">
                             <a href = "#"><i>&#xf279;</i>Map View</a>
                           </li>
                           <li>
                             <a href = "#"><i>&#xf00b;</i>List View</a>
                           </li>
                        </ul> -->
                        <!-- <ul id = "myTab" class = "nav nav-tabs">
                           <li class = "active">
                              <a href = "#home" data-toggle = "tab">
                                 Tutorial Point Home
                              </a>
                           </li>
                           <li><a href = "#ios" data-toggle = "tab">iOS</a></li>
                        </ul> -->


                        <ul class="search-bed-filter">
                            <li>
                                <select class="form-control" name="beds">
                                    <option value="" selected disabled><?php echo app('translator')->getFromJson('app.bedrooms'); ?></option>
                                    <?php for($i=1; $i<=10; $i++ ): ?>
                                    <option value=<?php echo e($i); ?> <?php if($request->beds == $i): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo e($i); ?></option>
                                        <?php endfor; ?>
                                </select>
                            </li>
                            <li>
                                <select class="form-control" name="baths">
                                    <option value="" selected disabled><?php echo app('translator')->getFromJson('app.baths'); ?></option>
                                    <?php for($i=1; $i<=10; $i++ ): ?>
                                        <option value=<?php echo e($i); ?> <?php if($request->baths == $i): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo e($i); ?></option>
                                    <?php endfor; ?>
                                </select>
                            </li>
                            <li>
                                <select class="form-control" name="default_plot_size">
                                    <option value="" selected disabled><?php echo app('translator')->getFromJson('app.area'); ?></option>
                                    <option value="1-100" <?php if($request->default_plot_size == '1-100'): ?> <?php echo e('selected'); ?> <?php endif; ?>>1 - 100 m&sup2;</option>
                                    <option value="100-500" <?php if($request->default_plot_size == '100-500'): ?> <?php echo e('selected'); ?> <?php endif; ?>>100 - 500 m&sup2;</option>
                                    <option value="500-1000" <?php if($request->default_plot_size == '500-1000'): ?> <?php echo e('selected'); ?> <?php endif; ?>>500 - 1000 m&sup2;</option>
                                    <option value="1000-10000" <?php if($request->default_plot_size == '1000-10000'): ?> <?php echo e('selected'); ?> <?php endif; ?>>1000 - 10000 m&sup2;</option>
                                    <option value="10000-more" <?php if($request->default_plot_size == '10000-more'): ?> <?php echo e('selected'); ?> <?php endif; ?>>10000 - more m&sup2;</option>
                                </select>
                            </li>
                        </ul>

                        <ul class="search-newest-filter">
                            <li>
                                <select class="form-control" name="order">
                                    <option value="" selected disabled><?php echo app('translator')->getFromJson('app.newest'); ?></option>
                                    <option value="asc" <?php if($request->order == 'asc'): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo app('translator')->getFromJson('app.property_asc'); ?></option>
                                    <option value="desc" <?php if($request->order == 'desc'): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo app('translator')->getFromJson('app.property_desc'); ?></option>
                                    <option value="price_asc" <?php if($request->order == 'price_asc'): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo app('translator')->getFromJson('app.price_low'); ?></option>
                                    <option value="price_desc" <?php if($request->order == 'price_desc'): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo app('translator')->getFromJson('app.price_high'); ?></option>
                                </select>
                            </li>
                             <li>
                             <button class="reset-btn" id="reset-btn" type="reset" href="javascript:void(0)">reset</button>
                            </li>
                            <li>
                               <em class="filer-show-block">
                                    <span class="show-all"><?php echo app('translator')->getFromJson('app.show_all_filter'); ?></span>
                                    <span class="close-all"><?php echo app('translator')->getFromJson('app.close_all_filter'); ?></span>
                               </em>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="">
           <div class="wrapper adv-filter-block">
               <div class="">
                 <div class="main-container-wrapper">
                   <div class="price-filter">
                       <span><?php echo app('translator')->getFromJson('app.price'); ?></span>
                       <ul class="price-filter-adv">
                           <li>
                               <span>Min</span>
                               <abbr>
                                   <input type="text" name="min_price" class="min_price" value="<?php if($request->min_price): ?> <?php echo e($request->min_price); ?> <?php else: ?> <?php echo e(0); ?> <?php endif; ?>" placeholder="Min">
                               </abbr>
                           </li>
                           <li>
                               <span>Max</span>
                               <abbr>
                                   <input type="text" name="max_price" class="max_price" value="<?php if($request->max_price): ?> <?php echo e($request->max_price); ?> <?php else: ?> <?php echo e(0); ?> <?php endif; ?>" placeholder="Max">
                               </abbr>
                           </li>
                           <li>
                               <span><?php echo app('translator')->getFromJson('app.sq_ft_min'); ?></span>
                               <abbr>
                                   <input type="text" name="min_sq_ft" class="min_sq_ft" value="<?php if($request->min_sq_ft): ?> <?php echo e($request->min_sq_ft); ?> <?php else: ?> <?php echo e(0); ?> <?php endif; ?>" placeholder="Min">
                               </abbr>
                           </li>
                           <li>
                               <span><?php echo app('translator')->getFromJson('app.sq_ft_max'); ?></span>
                               <abbr>
                                  <input type="text" name="max_sq_ft" class="max_sq_ft" value="<?php if($request->max_sq_ft): ?> <?php echo e($request->max_sq_ft); ?> <?php else: ?> <?php echo e(0); ?> <?php endif; ?>" placeholder="Max">
                               </abbr>
                           </li>
                       </ul>
                   </div>
                   <div class="price-filter">
                       <span><?php echo app('translator')->getFromJson('app.location'); ?></span>
                       <ul class="location-filter-adv">
                           <?php $__currentLoopData = $default_areas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $area): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                               
                               <li>
                                 <span>
                                   <input type="radio" id="test<?php echo e($area['area_id']); ?>" name="area_id" value="<?php echo e($area['area_id']); ?>" <?php if($request->area_id == $area['area_id']): ?> <?php echo e('checked'); ?> <?php endif; ?>>
                                   <label for="test<?php echo e($area['area_id']); ?>">

                                       <?php if(\Lang::has('area.area_title_'.$area['area_id'])): ?>
                                           <?php echo e(trans('area.area_title_'.$area['area_id'])); ?>

                                       <?php else: ?>
                                          <?php echo e($area['area_name']); ?>

                                       <?php endif; ?>

                                 <b>(<?php echo e($area['total']); ?>)</b></label>
                                 </span>
                               </li>
                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                       </ul>
                   </div>
                   <div class="price-filter">
                       <span><?php echo app('translator')->getFromJson('app.ameneties'); ?></span>
                       <ul class="facilities-filter-adv">
                           <?php $__currentLoopData = $amenities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $amenity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                               <li>
                                   <span>
                                     <input type="checkbox" name="amenity_id[]" value="<?php echo e($amenity['id']); ?>" id="check_<?php echo e($amenity['id']); ?>"  <?php if(is_array($request->amenity_id) && in_array($amenity['id'],$request->amenity_id)): ?> <?php echo e('checked'); ?> <?php endif; ?>/>
                                     <label for="check_<?php echo e($amenity['id']); ?>">

                                         <?php if(\Lang::has('ameneties.ameneties_display_name_'.$amenity['id'])): ?>
                                             <?php echo e(trans('ameneties.ameneties_display_name_'.$amenity['id'])); ?>

                                         <?php else: ?>
                                            <?php echo e($amenity['amenities_display_name']); ?>

                                         <?php endif; ?>
                                    <b>(<?php echo e($amenity['total']); ?>)</b></label>
                                   </span>
                               </li>
                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                       </ul>
                   </div>
                   <div class="text-center">
                        <a href="javascript:void(0)" class="refine-search"><?php echo app('translator')->getFromJson('app.update_search'); ?></a>
                    </div>
                 </div>
               </div>
           </div>

        </div>
    </div>
</form>
    <!-- Banner Section End -->
    <!-- Properties Heading Start -->
    <div class="wrapper">
        <div class="about-us-text-wrapper properties-text-wrapper remove-shadow-section">
            <div class="main-container-wrapper">
                <span class="main-heading"><?php echo app('translator')->getFromJson('app.properties'); ?><p><?php echo app('translator')->getFromJson('app.we_found'); ?> <abbr><?php echo e(count($properties)); ?></abbr><?php echo app('translator')->getFromJson('app.matches'); ?></p></span>
            </div>
        </div>
    </div>
    <!-- Properties Heading End -->
    <!-- Properties List Start -->
    <div class="wrapper">
        <div class="properties-view-main">
            <div class="">

                <div class="row tab-content panel-container">
                    <div class="col-md-6" >
                    <div class="res-properties-view panel-left">
                        <?php
                            $fills = 0;
                            $property_markers = array();
                        ?>
                        <?php $__currentLoopData = $properties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $property): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                if(\Lang::has('property.property_title_'.$property->id)){
                                    $property_markers[$fills]['name'] = trans('property.property_title_'.$property->id);
                                }else{
                                    $property_markers[$fills]['name'] = $property->name;
                                }
                                if(\Lang::has('region.region_title_'.$property->region_id)){
                                    $property_markers[$fills]['region'] = trans('region.region_title_'.$property->region_id);
                                }else{
                                    $property_markers[$fills]['region'] = (new \App\Services\PropertyService)->getRegion($property->region_id);
                                }
                                $property_markers[$fills]['latitude'] = $property->property_location_latitude;
                                $property_markers[$fills]['longitude'] = $property->property_location_longitude;
                                $property_markers[$fills]['image'] = asset("/images/cover-images/".$property->cover_image_name);
                                $property_markers[$fills]['url'] = '/properties/'.$property->id;
                                $property_markers[$fills]['id'] = $property->id;
                                $property_markers[$fills]['price'] = number_format($property->price , 0, ',', '.');
                                $property_markers[$fills]['fav'] = 1;
                                $property_markers[$fills]['fav'] = (new \App\Services\PropertyService)->checkQuickFav($property->id);
                                $fills++
                            ?>
                            <div class="col-md-6 properties-list-block">
                                <div class="properties-list-wrapper properties-inner-list">
                                    <div class="properties-pic-section">
                                        <span><a href="<?php echo e(url('')); ?>/properties/<?php echo e(preg_replace('/[[:space:]]+/', '+',(new \App\Services\PropertyService)->getPropertytitle(trans('property.property_title_'.$property->id)))); ?>" class=""><img src=<?php echo e(asset("/images/cover-images/".$property->cover_image_name)); ?>></a></span>
                                        <ul class="properties-list">
                                            <?php if($property->beds > 0): ?>
                                                <li>
                                                    <span><?php echo e($property->beds); ?></span>
                                                    <abbr><?php echo app('translator')->getFromJson('app.bedrooms'); ?></abbr>
                                                    <em>&#xf236;</em>
                                                </li>
                                            <?php endif; ?>
                                            <?php if($property->baths > 0): ?>
                                                <li>
                                                    <span><?php echo e($property->baths); ?></span>
                                                    <abbr><?php echo app('translator')->getFromJson('app.baths'); ?></abbr>
                                                    <em>&#xf2cd;</em>
                                                </li>
                                            <?php endif; ?>
                                            <?php if($property->kitchens > 0): ?>
                                                <li>
                                                    <span><?php echo e($property->kitchens); ?></span>
                                                    <abbr><?php echo app('translator')->getFromJson('app.kitchen'); ?></abbr>
                                                    <em>&#xf0f5;</em>
                                                </li>
                                            <?php endif; ?>
                                            <?php if($property->parking > 0): ?>
                                                <li>
                                                    <span><?php echo e($property->parking); ?></span>
                                                    <abbr><?php echo app('translator')->getFromJson('app.parking'); ?></abbr>
                                                    <em><i class="fas fa-car"></i></em>
                                                </li>
                                            <?php endif; ?>
                                            <?php if($property->fire_place > 0): ?>
                                                <li>
                                                    <span><?php echo e($property->fire_place); ?></span>
                                                    <abbr><?php echo app('translator')->getFromJson('app.fireplace'); ?></abbr>
                                                    <em><img src="<?php echo e(asset("ui/images/campfire.svg")); ?>" class="pro-icon-img small-icon"></em>
                                                </li>
                                            <?php endif; ?>
                                        </ul>
                                        <?php
                                            $new = (new \App\Services\PropertyService)->propertySingleType($property->type_id);
                                        ?>
                                        <abbr class="red-tag" style="background: <?php echo e($property->type->ui_color); ?>"><?php echo e($new); ?></abbr>
                                    </div>
                                    <div class="properties-name">
                                        <?php if(\Lang::has('property.property_title_'.$property->id)): ?>
                                            <span><em><?php echo e((new \App\Services\PropertyService)->truncate(trans('property.property_title_'.$property->id))); ?></em><i><a class="heart-fav" href="/favourite/<?php echo e($property->id); ?>"><?php echo (new \App\Services\PropertyService)->checkFav($property->id); ?></a></i></span>
                                        <?php else: ?>
                                            <span><em><?php echo e((new \App\Services\PropertyService)->truncate($property->name)); ?></em><i><a href="/favourite/<?php echo e($property->id); ?>"><?php echo (new \App\Services\PropertyService)->checkFav($property->id); ?></a></i></span>
                                        <?php endif; ?>
                                        <abbr class="properties-loction"><em>&#xf041;</em>
                                            <?php if(\Lang::has('region.region_title_'.$property->region_id)): ?>
                                                <?php echo e(trans('region.region_title_'.$property->region_id)); ?>

                                            <?php else: ?>
                                                <?php echo e((new \App\Services\PropertyService)->getRegion($property->region_id)); ?>

                                            <?php endif; ?>

                                        </abbr>
                                        <i class="properties-price-doller"><span class="price-range"><?php echo e(number_format($property->price , 0, ',', '.')); ?></span></i>
                                    </div>
                                    <div class="properties-decription">
                                        <?php if(\Lang::has('property.property_short_desc_'.$property->id)): ?>
                                            <?php echo e((new \App\Services\PropertyService)->truncate(trans('property.property_short_desc_'.$property->id),150)); ?>

                                        <?php else: ?>
                                            <?php echo e((new \App\Services\PropertyService)->truncate($property->short_description,150)); ?>

                                        <?php endif; ?>
                                    </div>
                                    <a href="<?php echo e(url('')); ?>/properties/<?php echo e(preg_replace('/[[:space:]]+/', '+',(new \App\Services\PropertyService)->getPropertytitle(trans('property.property_title_'.$property->id)))); ?>" class="properties-link"><?php echo app('translator')->getFromJson('app.read_more'); ?></a>
                                  </div>
                            </div>

                            <div class="popupslider modal quick-map-modal fade" id="quick-map-modal-<?php echo e($property->id); ?>" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <div class="row">
                                                <!-- Quick Map View Left Starts -->
                                                <div class="col-md-6">
                                                    <div class="demo">
                                                        <ul id="light_Slider" class="light_Slider">
                                                            <?php $__currentLoopData = $property->property_image_gallery; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gallery_image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <li class="gal-img" data-thumb=<?php echo e(asset("/images/cover-images/".$gallery_image->image)); ?>>
                                                                    <img src=<?php echo e(asset("/images/cover-images/".$gallery_image->image)); ?> />
                                                                </li>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <!-- Quick Map View Left Ends -->
                                                <!-- Quick Map View Right Starts -->
                                                <div class="col-md-6">
                                                    <div class="quick-map-right">
                                                        <div class="map-det-head">
                                                            <h3 class="map-det-tit">
                                                                <?php if(\Lang::has('property.property_title_'.$property->id)): ?>
                                                                    <?php echo e(trans('property.property_title_'.$property->id)); ?>

                                                                <?php else: ?>
                                                                    <?php echo e($property->name); ?>

                                                                <?php endif; ?>

                                                            </h3>
                                                            <p class="map-det-txt">Property ID: <?php echo e($property->property_id); ?></p>
                                                        </div>
                                                        <div class="pos-rel">
                                                            <div class="txt-overlay"></div>
                                                            <p class="map-view-main-txt">
                                                                <?php if(\Lang::has('property.property_short_desc_'.$property->id)): ?>
                                                                    <?php echo e((new \App\Services\PropertyService)->truncate(trans('property.property_short_desc_'.$property->id),150)); ?>

                                                                <?php else: ?>
                                                                    <?php echo e((new \App\Services\PropertyService)->truncate($property->short_description,150)); ?>

                                                                <?php endif; ?>
                                                            </p>
                                                        </div>
                                                        <ul class="properties-list12">
                                                            <?php if($property->beds > 0): ?>
                                                                <li>
                                                                    <span><?php echo e($property->beds); ?></span>
                                                                    <abbr><?php echo app('translator')->getFromJson('app.bedrooms'); ?></abbr>
                                                                    <em>&#xf236;</em>
                                                                </li>
                                                            <?php endif; ?>
                                                            <?php if($property->baths > 0): ?>
                                                                <li>
                                                                    <span><?php echo e($property->baths); ?></span>
                                                                    <abbr><?php echo app('translator')->getFromJson('app.baths'); ?></abbr>
                                                                    <em>&#xf2cd;</em>
                                                                </li>
                                                            <?php endif; ?>
                                                            <?php if($property->kitchens > 0): ?>
                                                                <li>
                                                                    <span><?php echo e($property->kitchens); ?></span>
                                                                    <abbr><?php echo app('translator')->getFromJson('app.kitchen'); ?></abbr>
                                                                    <em>&#xf0f5;</em>
                                                                </li>
                                                            <?php endif; ?>
                                                            <?php if($property->parking > 0): ?>
                                                                <li>
                                                                    <span><?php echo e($property->parking); ?></span>
                                                                    <abbr><?php echo app('translator')->getFromJson('app.parking'); ?></abbr>
                                                                    <em><i class="fas fa-car"></i></em>
                                                                </li>
                                                            <?php endif; ?>
                                                            <?php if($property->fire_place > 0): ?>
                                                                <li>
                                                                    <span><?php echo e($property->fire_place); ?></span>
                                                                    <abbr><?php echo app('translator')->getFromJson('app.fireplace'); ?></abbr>
                                                                    <em><img src="<?php echo e(asset("ui/images/campfire.svg")); ?>" class="pro-icon-img small-icon"></em>
                                                                </li>
                                                            <?php endif; ?>
                                                        </ul>
                                                        <div>
                                                            <h2 class="map-rate">From <?php echo e(number_format($property->price , 0, ',', '.')); ?> €</h2>
                                                            <a href="/favourite/<?php echo e($property->id); ?>" class="map-fav"><?php echo e((new \App\Services\PropertyService)->checkFavTxt($property->id)); ?></a>
                                                            <div>
                                                         
                                        <a href="<?php echo e(url('')); ?>/properties/<?php echo e(preg_replace('/[[:space:]]+/', '+',(new \App\Services\PropertyService)->getPropertytitle(trans('property.property_title_'.$property->id)))); ?>" class="map-read-more cmn-btn red-bg"><?php echo app('translator')->getFromJson('app.read_more'); ?></a>
                                    
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Quick Map View Right Starts -->
                                            </div>
                                        </div>
                                        <div class="modal-footer custom-model-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        <?php if($fills < count($properties)): ?>
                            <div class="properties-view-all">
                                <a href="#">View More</a>
                            </div>
                        <?php endif; ?>
                    </div>
                    </div>
                    <div class="col-md-6 properties-map-section panel-right">
                        <span class="splitter map-arrow-btn">&#xf104;<i>&#xf105;</i></span>
                        <div class="property-view-map">
                            <!-- <div style="width:100%;height:100%;"><iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d5297.447035450058!2d13.3855753!3d48.4042525!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4774435f60d1e2b7%3A0x3714d97cce651b72!2sSch%C3%B6merweg+14%2C+94060+Pocking%2C+Germany!5e0!3m2!1sen!2sin!4v1537985697608" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe></div> -->
                            <div id="map" class="search-map" style="width:100%;height:1020px"></div>
                        </div>
                    </div>
                    <!-- Map Pointer Hover Start -->
                    <!-- <div class="map-hover-view">
                       <div class="properties-list-wrapper properties-map-inner-list">
                           <div class="properties-pic-section">
                              <span><img src="images/hotol.png"></span>
                           </div>
                           <div class="properties-name">
                              <span><em>Unique Seafront Villa in The</em><i>&#xf006;</i></span>
                              <abbr class="properties-loction"><em>&#xf041;</em>Laglio, Como, Italy</abbr>
                              <i class="properties-price-doller">12540</i>
                           </div>
                           <div class="map-hover-properties-btn">
                             <a href="#" data-toggle="modal" data-target="#view-properties-details" class="quick-btn">Quick View</a>
                             <a href="#" class="property-btn">Go to Property</a>
                           </div>
                        </div>
                    </div> -->
                    <!-- Map Pointer Hover End -->
                </div>
            </div>
        </div>
    </div>

    <!-- Properties List End -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('custom-js'); ?>
    <!-- Bootstrap JS Start -->
    <script src=<?php echo e(asset("ui/js/jquery-library.js")); ?>></script>
    <script src=<?php echo e(asset("ui/js/popper.min.js")); ?>></script>
    <script src=<?php echo e(asset("ui/js/bootstrap.min.js")); ?>></script>
    <script src=<?php echo e(asset("ui/js/auto-search.js")); ?>></script>
    <script src=<?php echo e(asset("ui/js/owl.carousel.min.js")); ?>></script>
    <script src=<?php echo e(asset("ui/js/thumbnail-slider.js")); ?>></script>
    <script src=<?php echo e(asset("ui/js/jquery-resizable.js")); ?>></script>
    <script src=<?php echo e(asset("ui/js/price_range_script.js")); ?>></script>
    <script src=<?php echo e(asset("ui/js/jquery.matchHeight-min.js")); ?>></script>
    <script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD_Z8VD5Hdbl77SrQVIdvc8YwIMlxEBwgM&callback=initMap" type="text/javascript"></script>

    <script>
      $(document).ready(function(){
            if($('.fav-alert-box').length){
                $('.fav-alert-box').fadeOut(3000);
            }

        });
        $('#reset-btn').click(function(){
           $("select").each(function() { this.selectedIndex = 0 });
           $('#form_validation:input', $(this)).each(function(index) {
      this.value = "";
    });
           $('#autosearchbar').val('');
           $('#form_validation').submit();
        });

          $(".fav-alert-close").click(function(){
             $(".fav-alert-box").fadeOut(3000);
          });
    </script>
    <script>
    $(document).ready(function() {
        var count = 0;
        $('.popupslider').on('shown.bs.modal', function() {
            var x = document.getElementsByClassName("lSGallery");
           
            for(var i = 0;i < x.length;i++){
                if(i != 0){
                    x[i].remove();
                }
            }
            if (count === 1) return;
            $('#image-gallery').addClass('cS-hidden');
            $('#light_Slider.light_Slider').lightSlider({
                gallery: true,
                item: 1,
                thumbItem: 4,
                slideMargin: 0,
                speed: 1000,
                auto: true,
                loop: true,
                onSliderLoad: function() {
                   // $('#image-gallery').removeClass('cS-hidden');
                }
            });
            count++;
        });
    });
    </script>
    <?php
        //dd($property_markers);exit;
        $t = json_encode($property_markers,true);
    ?>
    <script>

        var l = '<?php echo $t;?>';
        var locations = JSON.parse(l.replace(/^"/,""));
        //Initialize and add the map
        function initMap() {

            var map = new google.maps.Map(document.getElementById('map'), {
              zoom: 8,
              center: new google.maps.LatLng(41.8719, 12.5674),
              mapTypeId: google.maps.MapTypeId.ROADMAP
            });

            var infowindow = new google.maps.InfoWindow();

            var marker, i;
            var obj = {};
            var URL = "<?php echo e(url('')); ?>";
            for (i = 0; i < locations.length; i++) {
                if(locations[i]['fav'] == 1){
                    var d = "<i class='fas fa-heart'></i>";
                }else{
                    var d = "<i class='far fa-heart'></i>";
                }
              marker = new google.maps.Marker({
                position: new google.maps.LatLng(locations[i]['latitude'], locations[i]['longitude']),
                map: map
              });
              con = '';
              con = '<div class="map-hover-view"><div><div class="properties-pic-section"><span><img src="'+locations[i]['image']+'"></span></div>';
              con+='<div class="properties-name"><span><em>'+locations[i]['name']+'</em><i>'+'<a class="heart-fav" href="/favourite/'+locations[i]['id']+'">'+d+'</a></i></span><abbr class="properties-loction"><em> &#xf041; '+locations[i]['region']+'</abbr>';
              con+='<i class="properties-price-doller">'+locations[i]['price']+'</i></div> <div class="map-hover-properties-btn"><a href="javascript:void(0);" data-toggle="modal" data-target="#quick-map-modal-'+locations[i]['id']+'" class="quick-btn"><?php echo app('translator')->getFromJson('app.quick_view'); ?></a>';
              con+='<a href="'+URL+''+locations[i]['url']+'" class="property-btn"><?php echo app('translator')->getFromJson('app.got_to_property'); ?></a></div></div></div>';
              obj['content'+i] = con;
             
              google.maps.event.addListener(marker, 'mouseover', (function(marker, i) {
                return function() {
                  infowindow.setContent(obj['content'+i]);
                  infowindow.open(map, marker);
                }
              })(marker, i));
                // google.maps.event.addListener(map, 'idle', function() {
                //     jQuery('.gm-style').removeClass('gm-style');
                // });
            }
        }
    </script>
    <script type="text/javascript">

  </script>
    <script>
     resizefunction();
     $('.panel-left').resize(function() {
       clearTimeout(window.resizedFinished);
       window.resizedFinished = setTimeout(function(){
          resizefunction();
       }, 250);
     });

     function resizefunction() {
       if($('.panel-left').outerWidth() > 480 ) {
         $('.panel-left').removeClass('below_width');
         $('.panel-left').addClass('above_width');
       }
       else {
         $('.panel-left').removeClass('above_width');
         $('.panel-left').addClass('below_width');
       }
    }

        $(".panel-left").resizable({
            handleSelector: ".splitter",
            resizeHeight: false,
            handles: 'e',
            distance:0,
            minWidth: 320,
            maxWidth: 690
        });
    </script>
    <!-- resizable Start -->
    <script>
        $(document).ready(function(){
            $('.adv-filter-block').toggle('hide');
            $('.price-location-adv-filter-wrapper').hide();
            $('.filer-show-block').on('click', function(event) {
                $('.adv-filter-block').toggle('show');
                $(this).toggleClass('active');
            });
        });
         // Match Height
        $(function() {
            $('.equal-height').matchHeight({
                byRow: true,
                property: 'height'
            });
        });
        // Autosearch Start
        $( function() {
            var availableTags = [];
            $.ajax({
                url: '<?php echo e(url('')); ?>/properties/autocomplete',
                dataType: "JSON",
                type: "GET",
                success: function(data){
                    var properties = data.properties;
                    for(var i = 0;i < properties.length;i++){
                        availableTags.push(properties[i]['name']);
                        availableTags.push(properties[i]['property_id']);
                    }
                }
            });
            $( "#autosearchbar" ).autocomplete({
                source: availableTags,
            });
        } );

        $(".quick-btn").click(function() {
            $(window).resize();
            $(window).resize();
        });
    </script>
    <!-- Properties Slider End -->
    <script>
        // Responsive Menu  Start
        $(document).on('ready', function() {
            $( ".menu-list li ul" ).before( "<i class='sub-menu-icon'> &#xf0dd; </i>" );
            $('#menuBtn').click(function(){
                $('#menuBtn').toggleClass('open');
                $('.menu-list').toggleClass('menuvisible');
            });
            $(".menu-list li i").click(function(e) {
                $(this).next("ul").slideToggle();
            });

            $('.ser-btn').click(function(){
                if($('.error').length > 0){
                    $('.error').remove();
                }
                var min_value = $('.min_price').val();
                var max_value = $('.max_price').val();
                var min_sq = $('.min_sq_ft').val();
                var max_sq = $('.max_sq_ft').val();
                if(min_value > max_value || min_sq > max_sq){
                    if(min_value > max_value){
                        $('.min_price').after('<p class="error">Minimum price should not be greater than maximum price</p>');
                    }
                    if(min_sq > max_sq){

                        $('.min_sq_ft').after('<p class="error">Minimum sq.ft should not be greater than maximum sq.ft</p>');
                    }
                    return false;
                }
            });

            $('.refine-search').click(function(){
                $('#form_validation').submit();
            });
        });
        // Responsive Menu  Start
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('ui.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>