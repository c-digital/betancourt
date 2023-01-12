<div class="page-header">
    <div class="page-header-carousel owl-carousel owl-theme">
        <?php if(!empty($banner)){ ?>
            <?php foreach($banner as $value): ?>
                <div class="carouselItem">
                    <div class="carousel-item-img" style="background-image: url(<?= (!empty($value->image)?base_url($value->image):base_url('assets_web/img/placeholder/banner_slider.png'))?>)"></div>
                </div>
            <?php endforeach; ?>
        <?php }?>
    </div>
    <div class="page-header-content">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3 d-none d-lg-block">
                    <a href="" class="carousel-item-content">
                        <h3><?= display('you_need_help')?></h3>
                        <div>
                            <?php 
                            if(!empty($setting->phone)){
                                $phone = explode(",",$setting->phone);
                                echo $phone[1];
                             }
                            ?>
                        </div>
                    </a>
                </div>
                <div class="col-md-12 col-lg-9">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <div class="header-text">
                                <h2><?= (!empty($section['about']['title'])?$section['about']['title']:null)?></h2>
                                <p><?= (!empty($section['about']['description'])?$section['about']['description']:null)?></p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <nav class="breadcrumbs">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item"><a href="<?= base_url()?>"><?= display('home')?></a></li>
                                    <li class="breadcrumb-item active"><?= display('about_us')?></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.Page header -->
<div class="about-wrapper">
    <div class="container">
        <div class="row align-items-center justify-content-between about-text">
            <div class="col-md-12 col-lg-7">
                <div class="feature-img">
                    <img src="<?= (!empty($about[0]->image)?base_url($about[0]->image):base_url('assets_web/img/placeholder/about.png'))?>" height="1100" width="740" class="img-fluid" alt="<?= display('about_us')?>">
                </div>
            </div>
            <div class="col-md-12 col-lg-5">
                <div class="text-block">
                    <h6 class="heading-sm"><?= display('about');?></h6>
                    <h3><?= (!empty($about[0]->title)?$about[0]->title:null);?></h3>
                    <ul>
                        <?php
                            $arr = explode("\n", (!empty($about[0]->description)?$about[0]->description:null));
                            $size=sizeof($arr);
                            for($i=1; $i<$size; $i++){
                                echo '<li>'.$arr[$i-1].'</li>';
                                echo "\r\n";
                            } 
                         ?>
                    </ul>
                    <hr>
                    <blockquote class="blockquote quote-text">
                        <p class="mb-0">“<?= (!empty($about[0]->quotation)?$about[0]->quotation:null);?>”</p>
                        <cite class="quote-attribution">— <?= (!empty($about[0]->author_name)?$about[0]->author_name:null);?></cite>
                        <div class="signature">
                             <img src="<?= (!empty($about[0]->signature)?base_url($about[0]->signature):base_url('assets_web/img/placeholder/signature.png'))?>" alt="<?= display('signature')?>" height="134" width="84">
                        </div>
                    </blockquote> 
                </div>
            </div>
        </div>
    </div>
</div>
<div class="team-content">
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-md-1 col-lg-6 offset-lg-3">
                <div class="section-title">
                    <h2><?= (!empty($section['team']['title'])?$section['team']['title']:null)?></h2>
                    <p><?= (!empty($section['team']['description'])?$section['team']['description']:null)?></p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="o-separator">
                    <hr><p class="o-separator-text"><?= display('doctors')?></p><hr>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <?php 
            if(!empty($doctors)){
                foreach ($doctors as $doctor) {
            ?>
            <div class="col-sm-6 col-md-3 col-lg-2">
                <article class="team-member">
                    <div class="member-header">
                        <a href="<?= base_url('doctors/profile/'.$doctor->user_id)?>"><img src="<?= (!empty($doctor->picture)?base_url($doctor->picture):base_url('assets_web/img/placeholder/profile.png'))?>" height="364" width="364" class="img-fluid" alt=""></a>
                        <ul class="member-social list-unstyled">
                            <li><a href="<?= $doctor->facebook?>"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="<?= $doctor->twitter?>"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="<?= $doctor->dribbble?>"><i class="fab fa-dribbble"></i></a></li>
                        </ul>
                    </div>
                    <div class="member-info">
                        <h5 class="member-name m-0"><a href=""><?= $doctor->firstname.' '. $doctor->lastname;?></a></h5>
                        <p><?= $doctor->name; ?></p>
                    </div>
                </article>
            </div>
            <?php } } ?>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="o-separator">
                    <hr><p class="o-separator-text"><?= display('nurses')?></p><hr>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <?php
            if(!empty($nurses)){
                foreach ($nurses as $nurse) {
            ?>
            <div class="col-sm-6 col-md-3 col-lg-2">
                <article class="team-member">
                    <div class="member-header">
                        <a href="<?= base_url('nurses/profile/'.$nurse->user_id)?>"><img src="<?= (!empty($nurse->picture)?base_url($nurse->picture):base_url('assets_web/img/placeholder/profile.png'))?>" class="img-fluid" alt=""></a>
                        <ul class="member-social list-unstyled">
                            <li><a href="<?= $nurse->facebook;?>"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="<?= $nurse->twitter;?>"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="<?= $nurse->dribbble;?>"><i class="fab fa-dribbble"></i></a></li>
                        </ul>
                    </div>
                    <div class="member-info">
                        <h5 class="member-name m-0"><?= $nurse->firstname.' '. $nurse->lastname;?></h5>
                        <p><?= $nurse->designation; ?></p>
                    </div>
                </article>
            </div>
            <?php } } ?>

        </div>
    </div>
</div>
<!-- /. End of team content-->
<div class="testimonialContent text-center">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="contentTitle"><?= display('what_client_say')?></h2>
                <div class="owl-testimonial owl-carousel owl-theme">
                    <?php
                    if(!empty($testimonials)){
                        $i=0;
                        foreach ($testimonials as $testimonial) {
                            $i++;?>

                           
                    <div class="testimonial">

                    <?php if($i==1){
                    ?>
                    <style type="text/css">
                        .owl-testimonial.owl-theme .owl-dots .owl-dot span {
                        width: 80px;
                        height: 80px;
                        border-radius: 0;
                        opacity: .5;
                        position: relative;
                        transition: all 0.3s ease-in-out 0s;
                        background: url("<?= (!empty($testimonial->image)?base_url($testimonial->image):base_url('assets_web/img/placeholder/profile.png'));?>") no-repeat !important;
                        background-size: cover !important;
                    }
                    </style>
                    <?php } else if($i>=2) {
                    
                        ?>
                        <style type="text/css">
                    .owl-testimonial.owl-theme .owl-dots .owl-dot:nth-child(<?php echo $i;?>) span {
                        background: url("<?= (!empty($testimonial->image)?base_url($testimonial->image):base_url('assets_web/img/placeholder/profile.png'));?>") no-repeat!important;
                        background-size: cover !important;
                    }

                    </style>
                    <?php } ?>
                    
                        <p class="description">

                            <?= $testimonial->quotation?>
                        </p>
                        <div class="mt-4">
                            <h3 class="title"><?= $testimonial->author_name?></h3>
                            <span class="post"><?= $testimonial->title?></span>
                        </div>
                    </div>
                    <?php } } ?>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.testimonial -->