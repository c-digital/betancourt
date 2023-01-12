<div class="blogContent">
    <div class="big-title">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <header class="contentHeader">
                        <h2><?= $details->name .' '. display('department');?></h2>
                    </header>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <div class="drtailsText">
                    <center>
                         <figure class="figure">
                            <img src="<?= (!empty($details->image)?base_url($details->image):base_url('assets_web/img/placeholder/departments.png'));?>" class="figure-img img-fluid" alt="<?= $details->name;?>">
                         </figure>
                    </center>
                    <?= $details->description;?>
                </div>
                <!-- /.Blog details text -->
                <div class="socialShare">
                    <ul class="list-unstyled">
                        <li class="shareTitle"><?= display('share_this')?> :</li>
                        <li><a href="http://www.facebook.com/sharer.php?u=https://jondavidjohn.com/using-the-facebook-api-with-codeigniter/" target="_blank" class="facebook"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="#" class="twitter"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#" class="google-plus"><i class="fab fa-google-plus"></i></a></li>
                        <li><a href="#" class="pinterest"><i class="fab fa-pinterest-p"></i></a></li>
                    </ul>
                </div>
                <!-- /.Social share -->
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h3 class="contentTitle"><?= display('related_departments')?></h3>
                <div class="sep"></div>
            </div>
            <?php 
              if(!empty($departments)){
                  foreach ($departments as $department) {
                     ?>
                        <div class="col-sm-6 col-md-6 col-lg-4">
                            <article class="grid-content">
                                <a href="<?= base_url('departments/details/'.$department->dprt_id.'/'.url_title($department->name))?>" class="img-link">
                                    <img src="<?= (!empty($department->image)?base_url($department->image):base_url('assets_web/img/placeholder/departments.png'))?>" class="img-fluid" alt="">
                                     <div class="mask-icon"><i class="flaticon-<?= (!empty($department->flaticon)?$department->flaticon:null);?>"></i></div>
                                </a>
                                <div class="textContent">
                                    <div class="post-meta d-flex">
                                        <span class="categories"><a href="#"><?php echo $department->name;?></a></span>
                                    </div>
                                    <h3><a href="<?= base_url('departments/details/'.$department->dprt_id.'/'.url_title($department->name))?>"><?= $department->name;?></a></h3>
                                    <p><?= character_limiter(strip_tags($department->description), 120);?> ...</p>
                                    <a href="<?= base_url('departments/details/'.$department->dprt_id.'/'.url_title($department->name))?>" class="read-more"><?= display('read_more')?> <i class="ti-arrow-right"></i></a>
                                </div>
                            </article>
                            <!-- /.Grid content -->
                     </div>
                   <?php 
                  }
               }   
            ?>
        </div>
        <!-- Related article -->
    </div>
</div>