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
                                <h2><?php echo display('appointment_information') ?></h2>
                                <p></p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <nav class="breadcrumbs">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item"><a href="<?= base_url()?>"><?= display('home')?></a></li>
                                    <li class="breadcrumb-item active"><?= display('appointment')?></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <div class="container"> 
        <div class="row">

            <div class="col-sm-2"></div>
            <div class="col-sm-8" id="PrintMe">
                <div  class="panel panel-info"> 
                    <div class="panel-heading"> 
                        <div class="row">
                            <div class="col-sm-6 col-md-7">
                                <dl class="dl-horizontal">
                                    <dt><?php echo display('doctor') ?></dt> <dd><?php echo "$appointment->firstname $appointment->lastname"?></dd>
                                    <dt><?php echo display('department') ?></dt> <dd><?php echo $appointment->department ?></dd>
                                    <dt><?php echo display('available_days') ?></dt> <dd><?php echo $appointment->available_days ?></dd>
                                    <dt><?php echo display('schedule_time') ?></dt> <dd><?php echo "$appointment->start_time - $appointment->end_time" ?></dd>
                                </dl>
                            </div>
                            <div class="col-sm-6 col-md-5">
                                <dl class="dl-horizontal">
                                    <dt><?php echo display('serial_no') ?></dt> <dd>#<?php echo ($appointment->serial_no<=9)?"0$appointment->serial_no":$appointment->serial_no ?></dd>
                                    <dt><?php echo display('date') ?></dt> <dd><?php echo $appointment->date ?></dd>
                                </dl>
                            </div>
                        </div>
                    </div>

                    <div class="panel-body">  
                        <div class="row">
                            <div class="col-sm-12" align="center">  
                                <h1><?php echo display('appointment_information') ?></h1>
                            <br>
                            </div>

                            <div class="col-sm-4" align="center"> 
                                <img alt="Picture" src="<?php echo (!empty($appointment->picture)?base_url($appointment->picture):base_url("assets/images/no-img.png")) ?>" class="img-thumbnail img-responsive">
                                <h3><?php echo "$appointment->pfirstname $appointment->plastname " ?></h3>
                            </div>

                            <div class="col-sm-8"> 
                                <dl class="dl-horizontal">
                                    <dt><?php echo display('appointment_id') ?></dt><dd><?php echo $appointment->appointment_id ?></dd>
                                    <dt><?php echo display('full_name') ?></dt><dd><?php echo "$appointment->pfirstname $appointment->plastname " ?></dd>
                                    <dt><?php echo display('patient_id') ?></dt><dd><?php echo $appointment->patient_id ?></dd> 
                                    <dt><?php echo display('date_of_birth') ?></dt><dd><?php echo date('d M Y',strtotime($appointment->date_of_birth)) ?></dd> 
                                    <dt><?php echo display('age') ?></dt>
                                        <dd>
                                            <?php echo date_diff(date_create($appointment->date_of_birth), date_create('now'))->y; ?> <?php echo display('year') ?>
                                            <?php echo date_diff(date_create($appointment->date_of_birth), date_create('now'))->m; ?> <?php echo display('month') ?>
                                        </dd> 
                                    <dt><?php echo display('sex') ?></dt><dd><?php echo $appointment->sex ?></dd> 
                                    <dt><?php echo display('mobile') ?></dt><dd><?php echo $appointment->mobile ?></dd> 
                                    <dt><?php echo display('problem') ?></dt><dd><?php echo $appointment->problem ?></dd> 
                                </dl> 
                            </div>
                        </div>  

                    </div> 

                    <div class="panel-footer">
                        <div class="text-center">
                            <strong><?= (!empty($setting->title)?$setting->title:null) ?></strong>
                            <p class="text-center no-print"><?= (!empty($setting->copyright_text)?$setting->copyright_text:null) ?></p>
                        </div>
                    </div>
                </div>
            </div>  
            <div class="col-sm-2"></div>
        </div>

        <center>
             <div class="btn-group">
                <button type="button" onclick="printContent('PrintMe')" class="btn btn-primary" align="center" ><?php echo display('print') ?></button> 
            </div>
        </center> 
    </div>
<br>
<script src="<?= base_url('assets/js/custom.js')?>"></script>
