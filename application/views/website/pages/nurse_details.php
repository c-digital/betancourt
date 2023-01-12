
<!-- doctors details -->
<div class="profile-header">
    <div id="author-header">
        <img src="<?= base_url()?>assets_web/img/banner-slider/01.jpg" alt="">
    </div>
    <div class="author-text">
        <div class="container">
            <div class="author-avatar">
                <h2 class="author-name"><?= $doctor->firstname .' '. $doctor->lastname;?> <small><?= $doctor->name;?></small></h2>
                <div class="author-social-link">
                    <a class="social-link" href="<?= $doctor->facebook?>"><i class="fab fa-facebook-f"></i></a>
                    <a class="social-link" href="<?= $doctor->twitter?>"><i class="fab fa-twitter"></i></a>
                    <a class="social-link" href="<?= $doctor->behance?>"><i class="fab fa-behance"></i></a>
                    <a class="social-link" href="<?= $doctor->dribbble?>"><i class="fab fa-dribbble"></i></a>
                    <a class="social-link" href="<?= $doctor->youtube?>"><i class="fab fa-youtube"></i></a>
                </div>
                <img src="<?= (!empty($doctor->picture)?base_url($doctor->picture):base_url('assets/images/no-img.png'))?>" alt="">
            </div>
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <div class="resume-text">
                        <p class="lead text-lg"><?= $doctor->career_title;?></p>
                        <p class="lead mb-5"><?= $doctor->short_biography;?></p>
                    </div>
                </div>
            </div>
            <div class="row text-left mb-5">
                <div class="col-md-6 ">
                    <h3 class="title-thin"><?= display('personal_information')?></h3>
                    <dl class="dl-horizontal"><dt><?= display('practicing')?></dt>
                        <dd>+<?= $practicing.' '.display('years');?></dd><dt><?= display('date_of_birth')?></dt>
                        <dd><?= date('j F, Y', strtotime($doctor->date_of_birth));?></dd><dt><?= display('address')?></dt>
                        <dd><?= $doctor->address;?></dd><dt><?= display('email')?></dt>
                        <dd><?= $doctor->email;?></dd><dt><?= display('phone')?></dt>
                        <dd><?= $doctor->phone;?></dd>
                        <!-- if vacation field not empty -->
                        <?php if(!empty($doctor->vacation)){?>
                            <dt><?= display('vacation')?></dt>
                            <dd><?= $doctor->vacation?></dd>
                        <?php }?>
                    </dl>
                </div> 
                <!-- language rating  -->
                <div class="col-md-6">
                    <h3 class="title-thin"><?= display('languages')?></h3>
                    <?php 
                     if(!empty($languages)){
                        foreach ($languages as $language) {
                    ?>
                    <div class="progress-bullets" role="progressbar" aria-valuenow="97" aria-valuemin="0" aria-valuemax="10"> 
                        <strong class="progress-title"><?= $language->name;?></strong> 
                        <span class="progress-bars">

                            <?php 
                            for ($i=1; $i <= $language->rating; $i++){
                               echo '<span class="bullet fill"></span>';
                             
                            }?>

                            <?php 
                            $blank = 10 - $language->rating;
                            for ($i=1; $i <= $blank; $i++){
                               echo '<span class="bullet"></span>';
                             
                            }?>
                        </span> 
                        <span class="progress-text text-muted"><?= $language->type;?></span>
                    </div>
                  <?php } }?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.End of profile header --> 
<div class="container">
    <div class="row">
        <div class="col-md-10 offset-md-1 col-lg-6 offset-lg-3">
            <div class="section-title">
                <h2><?= (!empty($section['portfolio']['title'])?$section['portfolio']['title']:null)?></h2>
                <p><?= (!empty($section['portfolio']['description'])?$section['portfolio']['description']:null)?></p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="main-timeline">
                <?php
                 $flaticon = array(
                    '0'=>'globe',
                    '1'=>'rocket',
                    '2'=>'briefcase',
                    '3'=>'user-md',
                    '4'=>'user-md',
                    '5'=>'mobile'
                 );
                 if(!empty($portfolio)){
                    $icon = 0;
                    foreach ($portfolio as $value) {
                ?>
                <a href="#" class="timeline">
                    <div class="timeline-icon"><i class="fa fa-<?= $flaticon[$icon]?>"></i></div>
                    <div class="timeline-content">
                        <?php if(!empty($value->from_date)){?>
                        <div class="date"><?= $value->from_date.' - '.$value->to_date?></div>
                        <?php }?>

                        <?php if(!empty($value->title)){?>
                        <div class="post"><?= $value->title?></div>
                        <?php }?>

                        <h3 class="title"><?= $value->institute?></h3>
                        <p class="description">
                            <?= (!empty($value->description)?$value->description:null)?>
                        </p>
                    </div>
                </a>
                <?php 
                    $icon ++;
                    }
                }
                ?>

            </div>
        </div>
    </div>
</div>
<!-- ./end nurse details -->