<div class="partners-content">
    <div class="container">
        <div class="row align-items-center">
            <?php
             if(!empty($partners)):
                foreach ($partners as $partner) :
            ?>
            <div class="col-6 col-sm-4 col-md-2">
                <div class="partner-logo">
                    <a href="<?= $partner->url;?>"><img src="<?= (!empty($partner->image)?base_url($partner->image):base_url('assets_web/img/placeholder/clients.png'));?>" title="<?= $partner->name;?>" width="500" height="500" class="img-fluid"></a>
                </div>
            </div>
            <?php 
                endforeach;
            endif;
            ?>
        </div>
    </div>
</div>