           <div class="header-slider header-slider-preloader" id="header-slider">
                <div class="animation-slide owl-carousel owl-theme" id="animation-slide">
                <?php 
                   if(!empty($sliders)){
                      foreach ($sliders as $slider) {
                        if($slider->position==1){
                    ?>
                    <!-- Slide 1-->
                    <div class="item" style="background-image: url(<?= (!empty($slider->image)?base_url($slider->image):base_url('assets_web/img/placeholder/slider.png'))?>);">
                        <div class="slide-table">
                            <div class="slide-tablecell">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="slide-text text-center">
                                                <h2><?= (!empty($slider->title)?$slider->title:null)?> </h2>
                                                <p><?= (!empty($slider->subtitle)?$slider->subtitle:null)?></p>
                                                <div class="service-icon d-flex justify-content-center">
                                                    <?php 
                                                    if(!empty($sliderDepart)){
                                                        foreach ($sliderDepart as $department) {
                                                    ?>
                                                    <div class="icon-box" data-toggle="tooltip" data-placement="top" title="<?= $department->name;?>">
                                                        <i class="flaticon-<?= $department->flaticon;?>"></i>
                                                    </div>
                                                    <?php } }?>
                                                    <a href="<?= base_url('departments')?>" class="icon-box view-all">
                                                        <span><i class="ti-plus"></i><?= display('view_all')?></span>
                                                    </a>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                 <?php }elseif($slider->position==2){?>
                    <!-- Slide 2-->
                    <div class="item" style="background-image: url(<?= (!empty($slider->image)?base_url($slider->image):base_url('assets_web/img/placeholder/slider.png'))?>);">
                        <div class="slide-table">
                            <div class="slide-tablecell">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="slide-text">
                                                <h2><?= (!empty($slider->title)?$slider->title:null)?></h2>
                                                <p><?= (!empty($slider->subtitle)?$slider->subtitle:null)?></p>
                                                <div class="slide-buttons">
                                                    <a href="<?= (!empty($slider->url)?$slider->url:null)?>" class="btn btn-primary slide-btn"><?php echo display('download_now');?></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php }elseif($slider->position==3){?>
                    <!-- Slide 3-->
                    <div class="item" style="background-image: url(<?= (!empty($slider->image)?base_url($slider->image):base_url('assets_web/img/placeholder/slider.png'))?>);">
                        <div class="slide-table">
                            <div class="slide-tablecell">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="slide-text text-right">
                                                <h2><?= (!empty($slider->title)?$slider->title:null)?></h2>
                                                <p><?= (!empty($slider->subtitle)?$slider->subtitle:null)?></p>
                                                <div class="slide-buttons">
                                                    <a href="<?= (!empty($slider->url)?$slider->url:null)?>" class="btn btn-primary slide-btn"><?php echo display('start_now');?></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php }else{}}}?>
                </div>
                <!-- /.End of slider -->
                <!-- Preloader -->
                <div class="slider_preloader">
                    <div class="slider_preloader_status">&nbsp;</div>
                </div>
            </div>