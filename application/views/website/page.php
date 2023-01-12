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
                               $phone = explode(",",$setting->phone);
                               echo $phone[0];
                            ?>
                        </div>
                    </a>
                </div>
                <div class="col-md-12 col-lg-9">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <div class="header-text">
                                <h2><?= $contents->menu?></h2>
                                <p><?= (!empty($contents->title)?$contents->title:null);?></p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <nav class="breadcrumbs">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item"><a href="<?= base_url()?>"><?= display('home')?></a></li>
                                    <li class="breadcrumb-item active"><?= $contents->menu?></li>
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
<div class="service-list">
    <div class="container">
        <div class="row">
            <div class="col-md-8">

                <div class="big-title">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <header class="contentHeader">
                                    <h3><?= $contents->title;?></h3>
                                </header>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                             <figure class="figure">
                                <img src="<?= (!empty($contents->featured_image)?base_url($contents->featured_image):base_url('assets_web/img/placeholder/blog.png'));?>" class="figure-img img-fluid" alt="">
                            </figure>
                            <?= $contents->description;?>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="col-md-4 sideber-right">
                <div class="contactCard">
                    <h4 class="contactCard-title"><?= display('call_us')?></h4>
                    <div class="contactCard-icon"><i class="ti-mobile"></i>
                        <?php
                           echo $phone[1];
                        ?>
                    </div>
                    <a href="<?= base_url('contact')?>" class="link-underlined"><?= display('all_addresses_and_support_hotlines')?></a>
                </div>
                <div class="contactCard">
                    <h4 class="contactCard-title"><?= display('write_us')?></h4>
                    <div class="contactCard-icon"><i class="ti-email"></i>
                        <?php
                           $email = explode(",",$basics->email);
                           echo $email[0];
                          ?>
                    </div>
                </div>
                <article class="about-content">
                    <a href="#" class="m-content-teaser-stacked__image">
                        <img alt="" src="<?= (!empty($about[0]->image)?base_url($about[0]->image):base_url('assets_web/img/placeholder/about.png'))?>" class="img-fluid">
                    </a>
                    <div class="a-text-info">
                        <h3><?= display('about_us')?></h3>
                        <p><?= (!empty($about[0]->description)?character_limiter(strip_tags($about[0]->description), 200):null)?></p>
                        <a href="<?= base_url('about')?>" class="read-link"> <?= display('read_more').' '.display('about_us')?> <i class="ti-arrow-right"></i></a>
                    </div>
                </article>
                <!-- About info -->
            </div>
        </div>
    </div>
</div>