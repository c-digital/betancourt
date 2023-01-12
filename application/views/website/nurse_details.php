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
<!-- ./end nurse details -->
<?php }else{?>
<div class="profile-header">
    <div id="author-header">
        <img src="<?= base_url()?>assets_web/img/banner-slider/01.jpg" alt="">
    </div>
    <div class="author-text">
        <div class="container">
            <div class="author-avatar">
                <h2 class="author-name"><p style="color: #F7B77F;">Sorry, This language not set yet for this nurse!</p></h2>
            </div>
        </div>
    </div>
</div>
<br>
<?php }?>

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