<?php if(!empty($doctor)){ ?>
<!-- doctors details -->
<div class="profile-header">
    <div id="author-header">
        <?php if(!empty($banner)){ ?>
            <?php foreach($banner as $value): ?>
                <img src="<?= (!empty($value->image)?base_url($value->image):base_url('assets_web/img/placeholder/banner_slider.png'))?>" alt="">
            <?php endforeach; ?>
        <?php }?>
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
<div class="time-table">
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-md-1 col-lg-6 offset-lg-3">
                <div class="section-title">
                    <h2><?= display('my_schedule_for_this_week')?></h2>
                    <p><?= (!empty($section['timetable']['description'])?$section['timetable']['description']:null)?></p>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- <center>
                    <button class="btn btn-primary" data-toggle="modal" data-target="#schedule"><?= display('view').' '.display('schedule')?></button>
                </center> -->
    
             <!-- slot times -->
            <?php if(!empty($slots)){ ?>
                <?php foreach ($slots as $value) {?>
                    <div class="col-md-3">

                        <div class="box-widget">
                            <div class="box-text">
                                <div class="event-container">
                                   <b><a class="event_header" href=""><?= display('time')?></a></b>
                                    <div class="hours_container"><span></span></div>
                                    <b><a class="event_header"><?= $value->name?></a></b>
                                </div>
                            </div>
                        </div>

                    </div>
                      <!-- day timetable -->
                      <?php if(!empty($schedules)){ ?>
                        <div class="col-md-9 col-lg-9">
                            <div class="row">
                              <?php foreach ($schedules as $schedule) {?>
                                 <?php if($value->id==$schedule->slot_id){ ?>
                                        <div class="col-md-3">
                                            <div class="box-widget">
                                                <div class="box-text">
                                                    <div class="event-container">
                                                       <b><a class="event_header" href=""><?= $doctor->firstname.' '.$doctor->lastname?></a></b>
                                                        <div class="before_hour_text"><?= $doctor->designation ?></div>
                                                        
                                                        <div class="hours_container"><span  class="hours"><?= date('H:i', strtotime($schedule->start_time)).' - '.date('H:i', strtotime($schedule->end_time))?></span></div>
                                                        <b><a class="event_header"><?= $schedule->available_days?></a></b>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                <?php }?>
                              <?php }?>
                           </div>
                        </div>
                      <?php }?>

                <?php }?>
            <?php }else{?>
                <div class="col-md-12 mb-1">
                     <div class="event-container">
                        <center><?= display('no_schedule_available')?></center>
                    </div>
                </div>
            <?php }?>

        </div>
       
    </div>
</div>
<!-- /.Time table -->
<div id="appointment-form" class="appointment-content">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-6 demo-left">
                <div class="appointment-text">
                    <h1><?= (!empty($instruction->title)?$instruction->title:null)?></h1>
                    <h3><?= (!empty($instruction->short_instruction)?$instruction->short_instruction:null)?></h3>
                    <div class="row">
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <div class="media contact-service">
                                <i class="flaticon-world mr-3"></i>
                                <div class="media-body">
                                    <h4 class="mt-0"><?= display('address')?></h4>
                                    <div><?= (!empty($setting->address)?$setting->address:null)?></div>
                                </div>
                            </div>
                            <div class="media contact-service">
                                <i class="flaticon-24-hours mr-3"></i>
                                <div class="media-body">
                                   <h4><?= display('working_hours')?></h4>
                                    <div>
                                        <?= (!empty($setting->open_day)?$setting->open_day:null)?> <br>
                                        <?= $setting->closed_day;?>: <?= display('closed')?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <div class="media contact-service">
                                <i class="flaticon-email mr-3"></i>
                                <div class="media-body">
                                    <h4><?= display('write_us')?></h4>
                                    <div>
                                        <?php
                                           $email = (!empty($basics->email)?$basics->email:null);
                                           $arr = explode(",",$email);
                                           echo implode("<br>", $arr);
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="media contact-service">
                                <i class="flaticon-phone-call  mr-3"></i>
                                <div class="media-body">
                                    <h4><?= display('call_us')?></h4>
                                    <div> 
                                        <?php
                                           $phone = (!empty($setting->phone)?$setting->phone:null);
                                           $arr = explode(",",$phone);
                                           echo implode("<br>", $arr);
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p class="color-grey">
                        <strong><?= display('notes_submitted_to_the_attendance_office_must_include_following')?>:</strong>
                    </p>
                    <ul class="list-checkmark list-unstyled">
                        <?php
                            $arr = explode("\n", $instruction->instruction);
                            $size=sizeof($arr);
                            for($i=1; $i<=$size; $i++)
                            {
                                echo '<li>'.$arr[$i-1].'</li>';
                                echo "\r\n";
                            } 
                        ?>
                    </ul>
                    <?php
                      if(!empty($instruction->note)){
                    ?>
                    <aside class="alert alert-success">
                        <strong><?= display('notes')?> — </strong>
                        <span><?= $instruction->note; ?></span>
                    </aside>
                   <?php }?>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-5 offset-lg-1">
                <div class="form-container">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true"><?= display('new_patient')?></a>
                            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false"><?= display('old_patient')?></a>

                        </div>
                    </nav>
                     <!-- Message & exception -->
                    <div class="col-sm-12">
                        <?php if ($this->session->flashdata('success') != null) {  ?>
                        <div class="alert alert-info"> 
                            <?php echo $this->session->flashdata('success'); ?>
                        </div> 
                        <?php } ?>
                        
                        <?php if ($this->session->flashdata('exception') != null) {  ?>
                        <div class="alert alert-danger">
                        <?php echo $this->session->flashdata('exception'); ?>
                        </div>
                        <?php } ?> 
                    </div>

                    <div class="tab-content" id="nav-tabContent">
                        <!-- for new patient -->
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                            <h2 class="semibold"><span><?= display('1')?></span><?= display('provide_your_primary_information_about_the_following_details')?></h2>    
                            <?= form_open_multipart('website/appointment/new_patient','id="appointmentForm"') ?> 

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label><?= display('first_name')?>*</label>
                                    <input type="text" class="form-control" name="firstname" id="firstname" placeholder="<?= display('first_name')?>" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label><?= display('last_name')?>*</label>
                                    <input type="text" class="form-control" name="lastname" id="lastname" placeholder="<?= display('last_name')?>" required>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label><?= display('email')?>*</label>
                                    <input type="email" class="form-control" name="email" id="email" placeholder="<?= display('email')?>" required>
                                    <label><?= display('please_provide_a_valid_email')?></label>
                                </div>
                                <div class="form-group col-md-6">
                                    <label><?= display('mobile')?></label>
                                    <input type="text" class="form-control" name="mobile" id="phone1" placeholder="<?= display('mobile')?>" required>
                                </div>
                            </div>
                           
                            <h2 class="semibold"><span><?= display('2')?></span> <?= display('help_us_with_accurate_information_about_the_following_details')?></h2> 
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label><?= display('appointment_date')?> *</label>
                                    <!-- doctor id -->
                                    <input type="hidden" name="doctor_id" id="doctorId" value="<?= $doctor->user_id;?>" />
                                    <!-- department id -->
                                    <input type="hidden" name="department_id" id="departmentId" value="<?= $doctor->department_id;?>"/>

                                    <input type="text" class="form-control datepicker" name="date" id="date1" placeholder="<?= display('appointment_date')?>" autocomplete="off">
                                </div>
                            </div>

                            <div class="form-group">
                                <label><?php echo display('serial_no') ?> <i class="text-danger">*</i></label>
                                <div id="serialPreview">
                                    <div class="btn btn-success disabled btn-sm"> 01</div>
                                    <div class="btn btn-success disabled btn-sm"> 02</div>
                                    <div class="btn btn-success disabled btn-sm"> 03</div>...
                                    <div class="slbtn btn btn-success disabled btn-sm"> N</div>

                                </div>
                                <input type="hidden" name="schedule_id" id="scheduleId"/>
                                <input type="hidden" name="serial_no" id="serialNo"/>
                            </div>

                            <div class="form-group">
                                <label><?= display('problem')?></label>
                                <textarea class="form-control" name="problem" id="problem1" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck1">
                                    <label class="custom-control-label" for="customCheck1"><?= display('i_consent_to_having_this_website_store_my_submitted_information_so_they_can_respond_to_my_inquiry')?></label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-block btn-primary"><?= display('book_appointment')?></button>
                           <?= form_close() ?>
                        </div>

                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <h2 class="semibold"><span><?= display('1')?></span> <?= display('provide_your_primary_information_about_the_following_details')?></h2>                            
                            <?= form_open('website/appointment/create','id="appointmentForm"') ?> 

                             <div class="form-group">
                                <label><?= display('patient_id')?> *</label>
                                 <!-- doctor id -->
                                    <input type="hidden" name="doctor_id" id="doctor_id" value="<?= $doctor->user_id;?>" />
                                    <!-- department id -->
                                    <input type="hidden" name="department_id" id="department_id" value="<?= $doctor->department_id;?>"/>

                                <input type="text" class="form-control patient" name="patient_id" id="patient_id" placeholder="<?= display('patient_id')?>" required>
                                <span></span>
                            </div>

                             <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck2">
                                    <label class="custom-control-label" for="customCheck2"><?= display('if_forgot_patient_id_please_selected_the_checkbox')?></label>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                 <div id="txtSearch">
                                   <input type="text" class="form-control" name="textSearch" id="textSearch" placeholder="<?= display('full_name').'/'. display('mobile')?>">
                               </div>
                               <div id="valid_patient"></div>
                            </div>
                            
                            <div class="form-group">
                                <label><?= display('appointment_date')?> *</label>
                                <input type="text" class="form-control datepicker" name="date" id="date" placeholder="<?= display('appointment_date')?>" autocomplete="off">
                            </div>

                             <div class="form-group">
                                <label><?php echo display('serial_no') ?> <i class="text-danger">*</i></label>
                                <div id="serial_preview">
                                    <div class="btn btn-success disabled btn-sm"> 01</div>
                                    <div class="btn btn-success disabled btn-sm"> 02</div>
                                    <div class="btn btn-success disabled btn-sm"> 03</div>...
                                    <div class="slbtn btn btn-success disabled btn-sm"> N</div>

                                </div>
                                <input type="hidden" name="schedule_id" id="schedule_id"/>
                                <input type="hidden" name="serial_no" id="serial_no"/>
                            </div>

                            <div class="form-group">
                                <label><?= display('problem')?></label>
                                <textarea class="form-control" name="problem" id="problem2" rows="3"></textarea>
                            </div>
                            <button type="submit" class="btn btn-block btn-primary"><?= display('book_appointment')?></button>
                            <?= form_close() ?>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ./end doctor details -->
<?php }else{?>
<div class="profile-header">
    <div id="author-header">
        <img src="<?= base_url()?>assets_web/img/banner-slider/01.jpg" alt="">
    </div>
    <div class="author-text">
        <div class="container">
            <div class="author-avatar">
                <h2 class="author-name"><p style="color: #F7B77F;">Sorry, This language not set yet for this doctor!</p></h2>
            </div>
        </div>
    </div>
</div>
<br>
<?php }?>
<!-- shedule modal -->
<div class="modal fade" id="schedule" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><?= display('schedule')?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <div class="row">
            <!-- slot times -->
            <?php if(!empty($slots)){ ?>
                <?php foreach ($slots as $value) {?>
                    <div class="col-md-2 mb-1">
                         <div class="event-container">
                            <b><a class="event_header" href="#"><?= display('time')?></a></b>
                            <div class="hours_container"><span class="hours"><?= $value->name?></span></div>
                        </div>
                    </div>
                      <!-- day timetable -->
                      <?php if(!empty($schedules)){ ?>
                          <?php foreach ($schedules as $schedule) {?>
                             <?php if($value->id==$schedule->slot_id){ ?>
                                 <div class="col-md-2 mb-1">
                                     <div class="event-container">
                                        <b><a class="event_header"><?= $schedule->available_days?></a></b>
                                        <b><a class="event_header">Room: 16</a></b>
                                        <div class="hours_container"><span class="hours"><?= date('H:i', strtotime($schedule->start_time)).' - '.date('H:i', strtotime($schedule->end_time))?></span></div>
                                        <div class="after_hour_text"><?= $doctor->firstname.' '.$doctor->lastname?></div>
                                    </div>
                                </div>
                            <?php }?>
                          <?php }?>
                      <?php }?>

                <?php }?>
            <?php }else{?>
                <div class="col-md-12 mb-1">
                     <div class="event-container">
                        <center><?= display('data_not_available')?></center>
                    </div>
                </div>
            <?php }?>
        </div>

      </div>
      <div class="modal-footer">
        
      </div>
    </div>
  </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {

    //check patient id
    $('#patient_id').keyup(function(){
        var pid = $(this);

        $.ajax({
            url  : '<?= base_url('website/appointment/check_patient/') ?>',
            type : 'post',
            dataType : 'JSON',
            data : {
                '<?= $this->security->get_csrf_token_name(); ?>' : '<?= $this->security->get_csrf_hash(); ?>',
                patient_id : pid.val()
            },
            success : function(data) 
            {
                if (data.status == true) {
                    pid.next().text(data.message).addClass('text-success').removeClass('text-danger');
                } else if (data.status == false) {
                    pid.next().text(data.message).addClass('text-danger').removeClass('text-success');
                } else {
                    pid.next().text(data.message).addClass('text-danger').removeClass('text-success');
                }
            }, 
            error : function()
            {
                alert('failed');
            }
        });
    });
 
    //department_id
    $("#department_id").change(function(){
        var output = $('.doctor_error'); 
        var doctor_list = $('#doctor_id');
        var available_day = $('#available_day');

        $.ajax({
            url  : '<?= base_url('website/appointment/doctor_by_department/') ?>',
            type : 'post',
            dataType : 'JSON',
            data : {
                '<?= $this->security->get_csrf_token_name(); ?>' : '<?= $this->security->get_csrf_hash(); ?>',
                department_id : $(this).val()
            },
            success : function(data) 
            {
                if (data.status == true) {
                    doctor_list.html(data.message);
                    available_day.html(data.available_days);
                    output.html('');
                } else if (data.status == false) {
                    doctor_list.html('');
                    output.html(data.message).addClass('text-danger').removeClass('text-success');
                } else {
                    doctor_list.html('');
                    output.html(data.message).addClass('text-danger').removeClass('text-success');
                }
            }, 
            error : function()
            {
                alert('failed');
            }
        });
    }); 


    //doctor_id
    $("#doctor_id").change(function(){
        var doctor_id = $('#doctor_id'); 
        var output = $('#available_days'); 

        $.ajax({
            url  : '<?= base_url('website/appointment/schedule_day_by_doctor/') ?>',
            type : 'post',
            dataType : 'JSON',
            data : {
                '<?= $this->security->get_csrf_token_name(); ?>' : '<?= $this->security->get_csrf_hash(); ?>',
                doctor_id : $(this).val()
            },
            success : function(data) 
            {
                if (data.status == true) {
                    output.html(data.message).addClass('text-success').removeClass('text-danger');
                } else if (data.status == false) {
                    output.html(data.message).addClass('text-danger').removeClass('text-success');
                } else {
                    output.html(data.message).addClass('text-danger').removeClass('text-success');
                }
            }, 
            error : function()
            {
                alert('failed');
            }
        });
    });

    //date
    $("#date").change(function(){
        var date        = $('#date'); 
        var serial_preview   = $('#serial_preview'); 
        var doctor_id   = $('#doctor_id'); 
        var schedule_id = $("#schedule_id"); 
        var patient_id  = $("#patient_id"); 
 
        $.ajax({
            url  : '<?= base_url('website/appointment/serial_by_date/') ?>',
            type : 'post',
            dataType : 'JSON',
            data : {
                '<?= $this->security->get_csrf_token_name(); ?>' : '<?= $this->security->get_csrf_hash(); ?>',
                doctor_id  : doctor_id.val(),
                patient_id : patient_id.val(), 
                date : $(this).val()
            },
            success : function(data) 
            { 
                if (data.status == true) {
                    //set schedule id
                    schedule_id.val(data.schedule_id); 
                    serial_preview.html(data.message);
                } else if (data.status == false) {
                    schedule_id.val('');
                    serial_preview.html(data.message).addClass('text-danger').removeClass('text-success');
                } else {
                    schedule_id.val('');
                    serial_preview.html(data.message).addClass('text-danger').removeClass('text-success');
                }
            }, 
            error : function()
            {
                alert('failed');
            }
        });
    });


    //======for new patient appointment======//
    //department_id
    $("#departmentId").change(function(){
        var output = $('.doctorError'); 
        var doctor_list = $('#doctorId');
        var available_day = $('#availableDay');

        $.ajax({
            url  : '<?= base_url('website/appointment/doctor_by_department/') ?>',
            type : 'post',
            dataType : 'JSON',
            data : {
                '<?= $this->security->get_csrf_token_name(); ?>' : '<?= $this->security->get_csrf_hash(); ?>',
                department_id : $(this).val()
            },
            success : function(data) 
            {
                if (data.status == true) {
                    doctor_list.html(data.message);
                    available_day.html(data.available_days);
                    output.html('');
                } else if (data.status == false) {
                    doctor_list.html('');
                    output.html(data.message).addClass('text-danger').removeClass('text-success');
                } else {
                    doctor_list.html('');
                    output.html(data.message).addClass('text-danger').removeClass('text-success');
                }
            }, 
            error : function()
            {
                alert('failed');
            }
        });
    }); 

     //doctor_id
    $("#doctorId").change(function(){
        var doctor_id = $('#doctorId'); 
        var output = $('#availableDays'); 

        $.ajax({
            url  : '<?= base_url('website/appointment/schedule_day_by_doctor/') ?>',
            type : 'post',
            dataType : 'JSON',
            data : {
                '<?= $this->security->get_csrf_token_name(); ?>' : '<?= $this->security->get_csrf_hash(); ?>',
                doctor_id : $(this).val()
            },
            success : function(data) 
            {
                if (data.status == true) {
                    output.html(data.message).addClass('text-success').removeClass('text-danger');
                } else if (data.status == false) {
                    output.html(data.message).addClass('text-danger').removeClass('text-success');
                } else {
                    output.html(data.message).addClass('text-danger').removeClass('text-success');
                }
            }, 
            error : function()
            {
                alert('failed');
            }
        });
    });


    //date
    $("#date1").change(function(){
        var date        = $('#date1'); 
        var serial_preview   = $('#serialPreview'); 
        var doctor_id   = $('#doctorId'); 
        var schedule_id = $("#scheduleId"); 
 
        $.ajax({
            url  : '<?= base_url('website/appointment/new_patient_serial_by_date/') ?>',
            type : 'post',
            dataType : 'JSON',
            data : {
                '<?= $this->security->get_csrf_token_name(); ?>' : '<?= $this->security->get_csrf_hash(); ?>',
                doctor_id  : doctor_id.val(),
                date : $(this).val()
            },
            success : function(data) 
            { 
                if (data.status == true) {
                    //set schedule id
                    schedule_id.val(data.schedule_id); 
                    serial_preview.html(data.message);
                } else if (data.status == false) {
                    schedule_id.val('');
                    serial_preview.html(data.message).addClass('text-danger').removeClass('text-success');
                } else {
                    schedule_id.val('');
                    serial_preview.html(data.message).addClass('text-danger').removeClass('text-success');
                }
            }, 
            error : function()
            {
                alert('failed');
            }
        });
    });

       
    //serial_no 
    $("body").on('click','.serial_no',function(){
        var serial_no = $(this).attr('data-item');
        $("#serial_no").val(serial_no);
        $("#serialNo").val(serial_no);
        $('.serial_no').removeClass('btn-danger').addClass('btn-primary').not(".disabled");
        $(this).removeClass('btn-primary').addClass('btn-danger').not(".disabled");
    });

    // for search input field show hide
    if(document.getElementById('customCheck2').checked) {
    $("#txtSearch").show();
    } else {
        $("#txtSearch").hide();
    }

    $('#customCheck2').click(function() {
      $("#txtSearch").toggle(this.checked);
    });

    //search patient by full name or mobile number
    $('#textSearch').keyup(function(){
        var search = $(this).val();
        //alert(search);
        $.ajax({
            url  : '<?= base_url('website/appointment/search_patient/') ?>',
            type : 'post',
            data : {
                '<?= $this->security->get_csrf_token_name(); ?>' : '<?= $this->security->get_csrf_hash(); ?>',
                query : search
            },
            success : function(data) 
            {
                //alert(data);
                $('#valid_patient').html(data);
            }, 
        });
    });

});

// patient id throw in patient field
function patientInfo(id){
     $(".patient").val(id);
}
</script>