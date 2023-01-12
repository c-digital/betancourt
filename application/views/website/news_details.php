<div class="blogContent">
    <div class="big-title">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <header class="contentHeader">
                        <h1><?= (!empty($news->title)?$news->title:null);?></h1>
                        <div class="metaInfo">
                            <time datetime=""><?= date('j F, Y', strtotime(!empty($news->create_date)?$news->create_date:date('Y-m-d')));?></time>
                            <span>|</span>
                            <span><?= (!empty($news->name)?$news->name:null);?></span>
                        </div>
                    </header>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <div class="drtailsText">
                    <center>
                         <figure class="figure">
                            <img src="<?= base_url(!empty($news->featured_image)?$news->featured_image:base_url('assets_web/img/placeholder/blog.png'));?>" class="figure-img img-fluid" alt="<?= (!empty($news->title)?$news->title:null);?>">
                         </figure>
                    </center>
                    <?= (!empty($news->description)?$news->description:null);?>
                </div>
                <!-- /.Blog details text -->
                <div class="socialShare">
                    <ul class="list-unstyled">
                        <li class="shareTitle"><?= display('share_this')?> :</li>
                        <li><a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="#" class="twitter"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#" class="google-plus"><i class="fab fa-google-plus"></i></a></li>
                        <li><a href="#" class="pinterest"><i class="fab fa-pinterest-p"></i></a></li>
                    </ul>
                </div>
                <!-- /.Social share -->
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h3 class="contentTitle"><?= display('related_article')?></h3>
                <div class="sep"></div>
            </div>
            <?php 
              if(!empty($related_news)){
                  foreach ($related_news as $news) {
                     ?>
                        <div class="col-sm-6 col-md-6 col-lg-4">
                            <article class="grid-content">
                                <a href="<?= base_url('news/details/'.$news->nid.'/'.url_title($news->title))?>" class="img-link">
                                    <img src="<?= base_url($news->featured_image)?>" class="img-fluid" alt="">
                                </a>
                                <div class="textContent">
                                    <div class="post-meta d-flex">
                                        <span class="date"> <?= date('j F, Y', strtotime($news->create_date))?></span>
                                        <span class="categories">In <a href="#"><?php echo $news->name;?></a></span>
                                    </div>
                                    <h3><a href="<?= base_url('news/details/'.$news->nid.'/'.url_title($news->title))?>"><?= $news->title;?></a></h3>
                                    <p><?= character_limiter(strip_tags($news->description), 120);?> ...</p>
                                    <a href="<?= base_url('news/details/'.$news->nid.'/'.url_title($news->title))?>" class="read-more"><?= display('read_more')?> <i class="ti-arrow-right"></i></a>
                                </div>
                            </article>
                            <!-- /.Grid content -->
                     </div>
                   <?php 
                  }
               }   
            ?>
        </div>
        <!-- Related article -->
    </div>
</div>