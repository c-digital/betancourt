<footer class="main-footer footer-dark">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                
                <div class="footer-des">
                    <h3 class="footer-title"><?= display('about_us')?></h3>
                    <!--<img src="assets/img/logo.png" class="img-responsive footer-logo" alt="">-->
                    <p class="des">
                        <?= (!empty($about[0]->description)?character_limiter(strip_tags($about[0]->description), 200):null)?>
                    </p>
                    <div class="btnBlock ">
                        <a href="<?= base_url('contact')?>" class="btn btn-link"><?= display('contact_us')?><i class="ti-arrow-right"></i></a>
                    </div>
                </div>
               
            </div>
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-3">
                        <div class="col-block">
                            <h3 class="footer-title"><?= display('departments')?></h3>
                            <ul class="footer-link list-unstyled">
                                <?php if(!empty($deptsFooter)){ ?>
                                    <?php foreach ($deptsFooter as $department) {?>
                                         <li><a href="<?= base_url('departments/details/'.$department->dprt_id)?>"><?= $department->name;?></a></li>
                                    <?php }?>
                                <?php }?>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="col-block">
                            <h3 class="footer-title"><?= display('quick_links')?></h3>
                            <ul class="footer-link list-unstyled quickLink">

                                <?php if(!empty($parent_menu)){ ?>
                                    <?php foreach ($parent_menu as $menu) { ?>
                                         <li><a href="<?= base_url($menu->url)?>"><?= $menu->title?></a></li>
                                    <?php }?>
                                <?php }?>

                            </ul>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <h3 class="footer-title"><?= display('contact_details')?></h3>
                         <?php 
                           $phone = explode(",",$setting->phone);
                           $email = explode(",",$basics->email);
                            ?>
                        <div class="addressLink">
                            <p><?= (!empty($setting->address)?$setting->address:null)?></p>
                            <ul class="list-unstyled">
                                <li><i class="ti-mobile"></i> <?= display('phone')?>: <a href="<?= display('phone')?>:<?= $phone[0];?>"><?= $phone[0];?></a></li>
                                <li><i class="icon-mobile"></i> <?= display('text')?>: <a href="<?= (!empty($setting->text)?$setting->text:null)?>"> <?= (!empty($setting->text)?$setting->text:null)?></a></li>
                                <li><i class="ti-email"></i> <?= display('email')?>: <a href="<?= $email[0];?>" class="linkUnderlined"><?= $email[0];?></a></li>
                                <li><i class="ti-printer"></i> <?= display('fax')?>: <span><?= (!empty($setting->fax)?$setting->fax:null)?></span></li>
                            </ul>
                            <div class="btnBlock ">
                                <a href="<?= (!empty($basics->direction)?$basics->direction:'https://www.google.com/maps/place/Apollo+Hospital/@23.8099168,90.4289362,17z/data=!3m1!4b1!4m5!3m4!1s0x3755c64aba47cf9d:0x2650d783b08350a5!8m2!3d23.8099168!4d90.4311249')?>" class="btn btn-link" target="_blank"><?= display('get_directions')?><i class="ti-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- /.footer -->
<div class="sub-footer dark">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <div class="coptText">
                    <?= (!empty($setting->copyright_text)?$setting->copyright_text:null);?>
                </div>
            </div>
        </div>
    </div>
</div>