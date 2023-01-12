<div class="blog-content">
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-md-1 col-lg-8 offset-lg-2 col-xl-6 offset-xl-3">
                <div class="section-title">
                    <h2><?= (!empty($section['news']['title'])?$section['news']['title']:null)?></h2>
                    <p><?= (!empty($section['news']['description'])?$section['news']['description']:null)?></p>
                </div>
            </div>
        </div>
        <div class="row">
            <?php 
            if(!empty($latest_news)){
                foreach ($latest_news as $value) {
            ?>
                <div class="col-sm-6 col-md-6 col-lg-4">
                    <article class="grid-content">
                        <a href="<?= base_url('news/details/'.$value->nid.'/'.url_title($value->title))?>" class="img-link">
                            <img src="<?= (!empty($value->featured_image)?base_url($value->featured_image):base_url('assets_web/img/placeholder/blog.png'))?>" class="img-fluid" alt="">
                        </a>
                        <div class="textContent">
                            <div class="post-meta d-flex">
                                <span class="date"> <?= date('j F, Y', strtotime($value->create_date));?></span>
                                <span class="categories">In <a href="#"><?= $value->name;?></a></span>
                            </div>
                            <h3><a href="<?= base_url('news/details/'.$value->nid.'/'.url_title($value->title))?>"><?= word_limiter($value->title, 4);?></a></h3>
                            <p><?= character_limiter(strip_tags($value->description), 120);?> ...</p>
                            <a href="<?= base_url('news/details/'.$value->nid.'/'.url_title($value->title))?>" class="read-more"><?php echo display('read_more') ?> <i class="ti-arrow-right"></i></a>
                        </div>
                    </article>
                    <!-- /.Grid content -->
                </div>
            <?php } } ?>
        </div>
    </div> 
</div>