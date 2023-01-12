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
                                <h2><?= (!empty($section->title)?$section->title:null)?></h2>
                                <p><?= (!empty($section->description)?$section->description:null)?></p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <nav class="breadcrumbs">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item"><a href="<?= base_url()?>"><?= display('home')?></a></li>
                                    <li class="breadcrumb-item active"><?= display('doctors')?></li>
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
<div class="doctor-list pb-70">
    <div class="container">
        <section class="grid">
          <?php 
            if(!empty($doctors)){
                foreach ($doctors as $doctor) {
            ?>
            <a class="grid__item" href="<?= base_url('doctors/profile/'.$doctor->user_id)?>">
                <h2 class="title title--preview"><?= $doctor->specialist;?></h2>
                <div class="loader"></div>
                <span class="dr-name"><?= $doctor->firstname . ' ' .$doctor->lastname;?></span>
                <div class="meta meta--preview">
                    <img class="meta__avatar" src="<?= (!empty($doctor->picture)?base_url($doctor->picture):base_url('assets_web/img/placeholder/profile.png'))?>" alt="author01" /> 
                    <span class="meta__position"><?= $doctor->name;?></span>
                    <span class="meta__email"><?= $doctor->email;?></span>
                </div>
            </a>
            <?php 
               }
            }
            ?>
            <div class="page-meta">
                <!--<span>Load more...</span>-->
                <nav aria-label="Page navigation">
                    <?= $links;?>
                </nav>
            </div>
        </section>
    </div>
</div>
<!-- /.doctor list -->