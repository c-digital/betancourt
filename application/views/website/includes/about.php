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
                            <img src="<?= (!empty($about[0]->signature)?base_url($about[0]->signature):base_url('assets_web/img/placeholder/signature.png'))?>" alt="Signature" height="134" width="84">
                        </div>
                    </blockquote> 
                </div>
            </div>
        </div>
    </div>
</div>