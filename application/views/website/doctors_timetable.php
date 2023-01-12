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
                               <h2><?= (!empty($section['timetable']['title'])?$section['timetable']['title']:null)?></h2>
                               <p><?= (!empty($section['timetable']['description'])?$section['timetable']['description']:null)?></p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <nav class="breadcrumbs">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item"><a href="<?= base_url()?>"><?= display('home')?></a></li>
                                    <li class="breadcrumb-item active"><?= display('timetable')?></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.Page header -->
<div class="time-table">
    <div class="department">
        <div class="container">
            <div class="row">
                <div class="col-md-10 offset-md-1 col-lg-8 offset-lg-2 col-xl-6 offset-xl-3">
                    <div class="section-title">
                        <h2><?= display('schedule_list')?></h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php 
                if(!empty($departments)){
                    foreach ($departments as $department) {
                      ?>
                    <div class="col-6 col-md-4 col-lg-3">
                            <div class="box-widget">
                                <div class="box-icon">
                                    <i class="flaticon-<?= (!empty($department->flaticon)?$department->flaticon:'heart');?>"></i>
                                </div>
                                <div class="box-text">
                                    <h5><input type="button" class="btn btn-info btn-sm view_data" value="<?= $department->name; ?>" id="<?= $department->dprt_id; ?>"></h5>
                                </div>
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
</div>
 <!-- shedule modal -->
<div class="modal fade" id="scheduleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><?= display('schedule')?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container">
            <div id="schedule_result" class="row">
                
             </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {

    //check patient id
    $('.view_data').click(function(){
        var did = $(this).attr('id');

        $.ajax({
            url  : '<?= base_url('doctors/get_schedule_result') ?>',
            type : 'post',
            data : {
                '<?= $this->security->get_csrf_token_name(); ?>' : '<?= $this->security->get_csrf_hash(); ?>',
                did : did
            },
            success : function(data) 
            {
                
                $('#schedule_result').html(data);
                // Display the Bootstrap modal
                $('#scheduleModal').modal('show');
            }, 
            error : function()
            {
                alert('failed');
            }
        });
    });
 });
</script>