<?php
//get language setting
$settings = $this->db->select("language")->get('setting')->row();
?>
<header class="mainHeader">
    <div class="topBar">
        <div class="container">
            <div class="d-flex justify-content-between">
                <div class="info-outer d-flex align-items-center">
                    <div class="info-box d-none d-md-block">
                        <?php if (!empty($basics->email)): 
                            $email = explode(",",$basics->email);
                            ?>
                            <div class="icon"><span class="icon-envelope "></span></div>
                            <a href="mailt:<?= $email[0];?>"><?= $email[0];?></a>
                        <?php endif ?>
                    </div>
                    <div class="info-box">
                        <?php if (!empty($setting->phone)): 
                           $phone = explode(",",$setting->phone);
                            ?>
                            <div class="icon"><span class="icon-mobile"></span></div>
                            <a class="phone" href="#"><?= $phone[0];?></a>
                         <?php endif; ?>
                    </div>
                </div>
                <div class="social">
                    <ul>
                        <li> <?php echo form_dropdown('userLang',$languageList, (!empty($this->input->cookie('Lng', true))?$this->input->cookie('Lng', true):$settings->language),'id="userLang"') ?></li>
                        <li><a href="<?= (!empty($basics->facebook)?$basics->facebook:base_url())?>"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="<?= (!empty($basics->twitter)?$basics->twitter:base_url())?>"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="<?= (!empty($basics->instagram)?$basics->instagram:base_url())?>"><i class="fab fa-instagram"></i></a></li>
                        <!--<li><a href="#"><i class="fab fa-vimeo-v"></i></a></li>-->
                        <li><a href="<?= (!empty($basics->dribbble)?$basics->dribbble:base_url())?>"><i class="fab fa-dribbble"></i></a></li>
                        <li><a href="<?= (!empty($basics->skype)?$basics->skype:base_url())?>"><i class="fab fa-skype"></i></a></li>
                    </ul>
                </div>
                <!-- /.Header Social Icon -->
            </div>
        </div>
    </div>
    <!-- /.Top bar -->
    <div class="middBar">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-4 col-lg-3 col-xl-4">
                    <div class="d-flex align-items-center logo-wrap">
                        <div class="main-logo">
                            <a href="<?= base_url()?>" class="headerLogo"><img src="<?= (!empty($basics->logo)?base_url($basics->logo):base_url('assets_web/img/placeholder/logo.png'))?>" alt=""></a>
                        </div>
                        <div class="order-md-first sidebar-toggle-btn">
                            <button type="button" id="sidebarCollapse" class="btn">
                                <i class="ti-menu"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 col-lg-9 col-xl-8 d-none d-md-block">
                    <div class="d-flex justify-content-end">
                        <div class="media helpInfo">
                            <div class="icon"><i class="icon-clock "></i></div>
                            <div class="media-body">
                                <h6 class="mb-0 helpInfo-title"><?= (!empty($setting->open_day)?$setting->open_day:null)?></h6>
                                <?php if(!empty($setting->closed_day)): ?>
                                   <p class="subText"><?= $setting->closed_day;?> - <span style="text-transform: uppercase;"><?= display('closed')?></span></p>
                                <?php endif ?>
                            </div>
                        </div>
                        <div class="media helpInfo">
                            <div class="icon"><i class="icon-mobile"></i></div>
                            <div class="media-body"> 
                                <h6 class="mb-0"><?= $phone[1];?></h6>
                                <p class="subText"><?= display('contact_us_for_help')?></p>
                            </div>
                        </div>
                        <div class="media helpInfo">
                            <div class="icon"><i class="icon-map-pin "></i></div>
                            <div class="media-body">
                                <h6 class="mb-0">
                                    <?php 
                                      echo substr($setting->address, 0, 15);
                                    ?>
                                </h6>
                                <p class="subText"><?php echo substr($setting->address, 15, 80);?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.Middle bar -->
    <nav class="navbar navbar-expand-lg d-none d-lg-block header-sticky">
        <div class="container">
            <div class="collapse navbar-collapse" id="navbarNavDropdown"> 
                <ul class="navbar-nav mr-auto">

                    <!-- Parent menu -->
                    <?php if(!empty($parent_menu)){ ?>
                        <?php foreach ($parent_menu as $parent) { 
                            //print_r($parent);
                         ?>
                            <li class="nav-item <?php if(!empty($parent->sub)){ echo "dropdown";}?> <?php echo (($this->uri->segment(1)==$parent->url)?"active":null)?>">

                                <?php if(!empty($parent->sub)){?> 
                                        <a class="nav-link dropdown-toggle" href="" id="pages" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                          <?= $parent->title?>
                                         </a>
                                 <?php }else{?>
                                    <?php if($parent->url=="page"){ ?>
                                         <a class="nav-link" href="<?= base_url($parent->url.'/'.$parent->content_id)?>"><?= $parent->title?></a>
                                    <?php }else{?>
                                        <a class="nav-link" href="<?= base_url($parent->url)?>"><?= $parent->title?></a>
                                    <?php }?>
                                <?php }?>

                                <!-- Sub Menu -->
                                 <?php if(!empty($parent->sub)){ ?>
                                      <ul class="dropdown-menu" aria-labelledby="pages">
                                        <?php  foreach ($parent->sub as $sub) {
                                            //$sub->content_id
                                            ?>
                                            <li>

                                                <?php if(!empty($sub->sub)){?>
                                                    <a class="dropdown-item <?php if(!empty($sub->sub)){ echo "dropdown-toggle";}?>" href=""><?= $sub->title?></a>
                                                <?php }else{?>
                                                    <?php if($sub->url=="page"){ ?>
                                                        <a class="dropdown-item" href="<?= base_url($sub->url.'/'.$sub->content_id)?>"><?= $sub->title?></a>
                                                    <?php }else{?>
                                                        <a class="dropdown-item" href="<?= base_url($sub->url)?>"><?= $sub->title?></a>
                                                    <?php }?>
                                                <?php }?>

                                                    <!-- Sub Sub Menu -->
                                                     <?php if(!empty($sub->sub)){ ?>
                                                        <ul class="dropdown-menu">
                                                            <?php  foreach ($sub->sub as $subs) {?>
                                                              <li><a class="dropdown-item" href="<?=  base_url($subs->url.'/'.$subs->content_id)?>"><?= $subs->title?></a></li>
                                                            <?php }?>
                                                        </ul>
                                                      <?php }?>
                                          <?php }?>
                                        </ul>
                                  <?php }?>
                            </li>
                        <?php }?>
                    <?php }?>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item nav-btn">
                        <a class="nav-link js-scroll-trigger" href="<?= base_url()?>#appointment-form"><i class="icon-calendar"></i><?= display('appointment')?></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- /. Navbar -->
    <nav id="sidebar" class="sidebar-nav">
        <div id="dismiss">
            <i class="ti-arrow-right"></i>
        </div>
        <ul class="metismenu list-unstyled" id="mobile-menu">
            <!-- Parent menu -->
        <?php if(!empty($parent_menu)){ ?>
            <?php foreach ($parent_menu as $parent) {
                //print_r($parent);
             ?>
                <li class="<?php echo (($this->uri->segment(1)==$parent->url)?"active":null)?>">

                    <?php if(!empty($parent->sub)){?> 
                            <a href="" aria-expanded="false">
                              <?= $parent->title?>
                             <span class="fa arrow"></span></a>
                     <?php }else{?>
                        <?php if($parent->url=="page"){ ?>
                             <a href="<?= base_url($parent->url.'/'.$parent->content_id)?>"><?= $parent->title?></a>
                        <?php }else{?>
                            <a  href="<?= base_url($parent->url)?>"><?= $parent->title?></a>
                        <?php }?>
                    <?php }?>

                    <!-- Sub Menu -->
                     <?php if(!empty($parent->sub)){ ?>
                          <ul aria-expanded="false">
                            <?php  foreach ($parent->sub as $sub) {
                                //$sub->content_id
                                ?>
                                <li>

                                    <?php if(!empty($sub->sub)){?>
                                        <a href="" aria-expanded="false"><?= $sub->title?><span class="fa arrow"></span></a>
                                    <?php }else{?>
                                        <?php if($sub->url=="page"){ ?>
                                            <a  href="<?= base_url($sub->url.'/'.$sub->content_id)?>"><?= $sub->title?></a>
                                        <?php }else{?>
                                            <a  href="<?= base_url($sub->url)?>"><?= $sub->title?></a>
                                        <?php }?>
                                    <?php }?>

                                        <!-- Sub Sub Menu -->
                                         <?php if(!empty($sub->sub)){ ?>
                                            <ul aria-expanded="false">
                                                <?php  foreach ($sub->sub as $subs) {?>
                                                  <li><a  href="<?=  base_url($subs->url.'/'.$subs->content_id)?>"><?= $subs->title?></a></li>
                                                <?php }?>
                                            </ul>
                                          <?php }?>
                              <?php }?>
                            </ul>
                      <?php }?>
                </li>
            <?php }?>
        <?php }?>
        </ul>
    </nav>
    <div class="overlay"></div>
    <!-- /.End of mobile menu side bar -->
</header>