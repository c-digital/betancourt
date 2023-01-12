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
                                    <li class="breadcrumb-item active"><?= display('department_list')?></li>
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
<header class="headerContent">
    <div class="container">
        <div class="row">
            <?php 
            if(!empty($mainDeparts)){
                foreach ($mainDeparts as $mainDepart) {
            ?>
                <div class="col-sm-6 col-md-3">
                    <div class="catLink">
                        <h3 class="catLink-title"><?= $mainDepart->name;?></h3>
                        <ul class="list-unstyled">
                            <?php
                            if(!empty($departments)){
                                foreach ($departments as $department) {
                                    if($mainDepart->mid==$department->main_id){
                            ?>
                               <li><a href="<?= base_url('departments/details/'.$department->dprt_id.'/'.url_title($department->name))?>"><?= $department->name;?></a></li>
                            <?php } } } ?>
    
                        </ul>
                    </div>
                </div>
           <?php } } ?>
        </div>
    </div>
</header>
<!-- /.Header -->
<div class="department-list">
    <div class="container">
        <div class="row">
            <?php 
            if(!empty($departments)){
                foreach ($departments as $department) {
            ?>
                <div class="col-sm-6 col-md-6">
                    <a href="<?= base_url('departments/details/'.$department->dprt_id.'/'.url_title($department->name))?>" class="department-item">
                        <div class="img-container">
                            <img src="<?= (!empty($department->image)?base_url($department->image):base_url('assets_web/img/placeholder/departments.png'))?>" alt="" >
                        </div>
                        <div class="mask">
                            <div class="content">
                                <h2><?= $department->name;?></h2><span><?= substr($department->description, 0, 100);?> ...</span>
                                <div class="svg-wrap">
                                    <svg width="28px" height="12px" viewBox="0 0 28 12" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g class="icon-arrow" transform="translate(-714.000000, -120.000000)" fill="#000000">
                                    <path d="M737.608907,124.700519 L734.322602,121.414214 L735.736815,120 L739.990251,124.253436 L740.001047,124.242641 L741.41526,125.656854 L741.404465,125.66765 L741.41526,125.678445 L740.001047,127.092659 L739.990251,127.081863 L735.736815,131.3353 L734.322602,129.921086 L737.543169,126.700519 L714,126.700519 L714,124.700519 L737.608907,124.700519 Z"></path>
                                    </g>
                                    </g>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="mask-icon"><i class="flaticon-<?= (!empty($department->flaticon)?$department->flaticon:null);?>"></i></div>
                    </a>
                </div>
             <?php } } ?>
        </div>
    </div>
</div>
<!-- /.department list -->