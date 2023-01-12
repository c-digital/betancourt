<div class="department">
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-md-1 col-lg-8 offset-lg-2 col-xl-6 offset-xl-3">
                <div class="section-title">
                    <h2><?= (!empty($section['department']['title'])?$section['department']['title']:null)?></h2>
                    <p><?= (!empty($section['department']['description'])?$section['department']['description']:null)?></p>
                </div>
            </div>
        </div>
        <div class="row">
            <?php 
            if(!empty($departments)){
                foreach ($departments as $department) {
            ?>
                <div class="col-6 col-md-4 col-lg-2">
                    <div class="box-widget">
                        <a href="<?= base_url('departments/details/'.$department->dprt_id.'/'.url_title($department->name))?>">
                            <div class="box-icon">
                                <i class="flaticon-<?= (!empty($department->flaticon)?$department->flaticon:'heart');?>"></i>
                            </div>
                            <div class="box-text">
                                <h5><?= $department->name;?></h5>
                                <p><?= substr($department->description, 0, 30);?>...</p>
                            </div>
                        </a>
                    </div>
                    <!-- /.box widget -->
                </div>
            <?php
                 }
              }
            ?>
        </div>
    </div>
</div>