<section class="grid-inner">
    <div class="container">
        <div class="row">
            <!-- Service List -->
            <div class="col-md-4 coloumn c-box-1">
                <div class="icon-widget">
                    <i class="flaticon-email"></i>
                </div>
                <div class="text-content">
                    <h3><?= (!empty($section['timetable']['title'])?$section['timetable']['title']:null)?></h3>
                    <p><?= (!empty($section['timetable']['description'])?$section['timetable']['description']:null)?></p>
                    <a href="<?= base_url('doctors/timetable')?>" class="btn btn-link"><?= display('view').' '.display('timetable')?><i class="ti-arrow-right"></i></a>
                </div>
            </div>
            <!-- Benefits -->
            <div class="col-md-4 coloumn c-box-2">
                <div class="icon-widget">
                    <i class="flaticon-world"></i>
                </div>
                <div class="text-content">
                    <h3><?= (!empty($section['benefits']['title'])?$section['benefits']['title']:null)?></h3>
                    <ul class="list-unstyled">
                        <?php
                            $arr = explode("\n", (!empty($section['benefits']['description'])?$section['benefits']['description']:null));
                            $size=sizeof($arr);
                            for($i=1; $i<$size; $i++){
                                echo '<li><i class="fa fa-caret-right"></i>'.$arr[$i-1].'</li>';
                                echo "\r\n";
                            } 
                         ?>
                    </ul>
                </div>
            </div>
            <!-- Working Hours -->
            <div class="col-md-4 coloumn c-box-3">
                <div class="icon-widget">
                    <i class="flaticon-24-hours"></i>
                </div>
                <div class="text-content">
                    <h3><?= (!empty($section['working_hours']['title'])?$section['working_hours']['title']:null)?></h3>
                    <p><?= (!empty($section['working_hours']['description'])?$section['working_hours']['description']:null)?></p>
                    <?= (!empty($setting->working_hour)?$setting->working_hour:null)?>
                </div>
            </div>
        </div>
    </div>
</section>