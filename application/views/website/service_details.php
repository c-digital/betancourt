<div class="blogContent">
    <div class="big-title">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <header class="contentHeader">
                        <h1><?= $service->title;?></h1>
                        <div class="metaInfo">
                            <time datetime="<?= $service->date;?>"><?= date('j F, Y', strtotime($service->date));?></time>
                            <span>|</span>
                            <span><?= $service->name;?></span>
                        </div>
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
                            <img src="<?= (!empty($service->icon_image)?base_url($service->icon_image):base_url('assets_web/img/placeholder/services.png'));?>" class="figure-img img-fluid" alt="<?= $service->title;?>">
                         </figure>
                    </center>
                    <?= $service->description;?>
                </div>
                <!-- /.Blog details text -->
                <div class="socialShare">
                    <ul class="list-unstyled">
                        <li class="shareTitle"><?= display('share_this')?> :</li>
                        <li><a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="#" class="twitter"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#" class="google-plus"><i class="fab fa-google-plus"></i></a></li>
                        <li><a href="#" class="pinterest"><i class="fab fa-pinterest-p"></i></a></li>
                    </ul>
                </div>
                <!-- /.Social share -->
            </div>
        </div>
        <!-- Related article -->
    </div>
</div>