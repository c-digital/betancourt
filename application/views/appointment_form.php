<div class="row">
    <div class="col-sm-12">
        <div  class="panel panel-default thumbnail">
 
           <?php
            if($this->permission->method('appointment_list','read')->access() || $this->permission->method('appointment_list','delete')->access()){
           ?>
            <div class="panel-heading no-print">
                <div class="btn-group"> 
                    <a class="btn btn-primary" href="<?php echo base_url("appointment/") ?>"> <i class="fa fa-list"></i>  <?php echo display('appointment_list') ?> </a>  
                </div>
            </div> 
            <?php } ?>
            
          <?php
           if($this->permission->method('add_appointment','create')->access()){
          ?>
            <div class="panel-body panel-form">
                <div class="row">
                    <div class="col-md-11 col-sm-12">
                        <?php echo form_open('appointment/create','class="form-inner"') ?> 
                            <?php $patientID = (!empty($this->session->userdata('patientID'))?$this->session->userdata('patientID'):null)?>
                            <!-- patient id -->
                            <div class="form-group row">
                                <label for="patient_id" class="col-xs-3 col-form-label"><?php echo display('patient_id') ?> <i class="text-danger">*</i></label>
                                <div class="col-xs-4">
                                    <input name="patient_id" autocomplete="off" type="text" class="form-control patient" id="patient_id" placeholder="<?php echo display('patient_id') ?>" value="<?php echo $patientID ?>">
                                    <span></span>
                                </div>
                                <div class="col-xs-3">
                                    <input name="search" autocomplete="off" type="text" class="form-control" id="searchText" placeholder="<?php echo display('search').' '.display('patient') ?>">
                                </div>
                                <div class="col-xs-2">
                                    <a class="ui positive button" data-toggle="modal" data-target="#addPatient"><?php echo display('add_patient') ?></a>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-xs-3">
                                    
                                </div>
                                <div class="col-xs-9">
                                    <div id="searchValue"></div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="department_id" class="col-xs-3 col-form-label"><?php echo display('department_name') ?> <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                    <?php echo form_dropdown('department_id',$department_list,$appointment->department_id,'class="form-control" id="department_id"') ?>
                                    <span class="doctor_error"></span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="doctor_id" class="col-xs-3 col-form-label"><?php echo display('doctor_name') ?> <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                    <?php echo form_dropdown('doctor_id','','','class="form-control" id="doctor_id"') ?>
                                    <div id="available_days"></div>
                                </div>
                            </div> 

                            <div class="form-group row">
                                <label for="date" class="col-xs-3 col-form-label"><?php echo display('appointment_date') ?> <i class="text-danger">*</i></label>
                                <div class="col-xs-9"> 
                                    <input name="date" type="text" class="datepicker-avaiable-days form-control" id="date" placeholder="<?php echo display('appointment_date') ?>" >
                                </div>
                            </div>
 
 
                            <div class="form-group row">
                                <label for="serial_no" class="col-xs-3 col-form-label"><?php echo display('serial_no') ?> <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                    <div id="serial_preview">
                                        <div type="button" class="btn btn-success disabled btn-sm"> 01</div>
                                        <div type="button" class="btn btn-success disabled btn-sm"> 02</div>
                                        <div type="button" class="btn btn-success disabled btn-sm"> 03</div>...
                                        <div type="button" class="slbtn btn btn-success disabled btn-sm"> N</div>

                                    </div>
                                    <input type="hidden" name="schedule_id" id="schedule_id"/>
                                    <input type="hidden" name="serial_no" id="serial_no"/>
                                </div>
                            </div> 

                            <div class="form-group row">
                                <label for="problem" class="col-xs-3 col-form-label"><?php echo display('problem') ?></label>
                                <div class="col-xs-9">
                                    <textarea name="problem" class="form-control" placeholder="<?php echo display('problem') ?>" maxlength="140" rows="7"></textarea>
                                </div>
                            </div>  

                            <div class="form-group row">
                                <label class="col-sm-3"><?php echo display('status') ?></label>
                                <div class="col-xs-9">
                                    <div class="form-check">
                                        <label class="radio-inline">
                                        <input type="radio" name="status" value="1" <?php echo  set_radio('status', '1', TRUE); ?> ><?php echo display('active') ?>
                                        </label>
                                        <label class="radio-inline">
                                        <input type="radio" name="status" value="0" <?php echo  set_radio('status', '0'); ?> ><?php echo display('inactive') ?>
                                        </label>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group row">
                                <div class="col-sm-offset-3 col-sm-6">
                                    <div class="ui buttons">
                                        <button type="reset" class="ui button"><?php echo display('reset') ?></button>
                                        <div class="or"></div>
                                        <button class="ui positive button"><?php echo display('save') ?></button>
                                    </div>
                                </div>
                            </div>

                        <?php echo form_close() ?>
                    </div>
                    <div class="col-md-3"></div>
                </div>
            </div>
            <?php 
                }
                 else{
                 ?>
                   <div class="row">
                    <div class="col-sm-12">
                       <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                          <div class="panel-title">
                            <h4><?php echo display('you_do_not_have_permission_to_access_please_contact_with_administrator');?>.</h4>
                           </div>
                           </div>
                         </div>
                        </div>
                     </div>
                 <?php
                 }
                 ?>
        </div>
    </div>
</div>

<!-- add patient modal -->
<div class="modal fade" id="addPatient" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Patient</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php echo form_open_multipart('appointment/create_patient','class="form-inner"') ?>
      <div class="modal-body">
             <div class="form-group row">
                <label for="patient_id" class="col-xs-3 col-form-label"><?php echo display('patient_id') ?> <i class="text-danger">*</i></label>
                <div class="col-xs-9">
                    <input name="patient_id" type="text" class="form-control" id="patient_id" placeholder="<?php echo display('patient_id') ?>" autocomplete="off">
                </div>
            </div>

            <div class="form-group row">
                <label for="firstname" class="col-xs-3 col-form-label"><?php echo display('first_name') ?> <i class="text-danger">*</i></label>
                <div class="col-xs-9">
                    <input name="firstname" type="text" class="form-control" id="firstname" placeholder="<?php echo display('first_name') ?>" >
                </div>
            </div>

            <div class="form-group row">
                <label for="lastname" class="col-xs-3 col-form-label"><?php echo display('last_name') ?> <i class="text-danger">*</i></label>
                <div class="col-xs-9">
                    <input name="lastname" type="text" class="form-control" id="lastname" placeholder="<?php echo display('last_name') ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-xs-3 col-form-label"><?php echo display('email') ?></label>
                <div class="col-xs-9">
                    <input name="email" type="text" class="form-control" id="email" placeholder="<?php echo display('email') ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="mobile" class="col-xs-3 col-form-label"><?php echo display('mobile') ?> <i class="text-danger">*</i></label>
                <div class="col-xs-9">
                    <input name="mobile" class="form-control" type="text" placeholder="<?php echo display('mobile') ?>" id="mobile">
                </div>
            </div>
            <div class="form-group row">
                <label for="date_of_birth" class="col-xs-3 col-form-label"><?php echo display('date_of_birth') ?> <i class="text-danger">*</i></label>
                <div class="col-xs-9">
                    <input name="date_of_birth" class="dropdown-month-years form-control" type="text" placeholder="<?php echo display('date_of_birth') ?>" id="date_of_birth">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-xs-3"><?php echo display('sex') ?> <i class="text-danger">*</i></label>
                <div class="col-xs-9">
                    <div class="form-check">
                        <label class="radio-inline">
                        <input type="radio" name="sex" value="Male" <?php echo  set_radio('sex', 'Male', TRUE); ?> ><?php echo display('male') ?>
                        </label>
                        <label class="radio-inline">
                        <input type="radio" name="sex" value="Female" <?php echo  set_radio('sex', 'Female'); ?> ><?php echo display('female') ?>
                        </label>
                        <label class="radio-inline">
                        <input type="radio" name="sex" value="Other" <?php echo  set_radio('sex', 'Other'); ?> ><?php echo display('other') ?>
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="address" class="col-xs-3 col-form-label"><?php echo display('address') ?> <i class="text-danger">*</i></label>
                <div class="col-xs-9">
                    <textarea name="address" class="form-control"  placeholder="<?php echo display('address') ?>" maxlength="140" rows="5"></textarea>
                </div>
            </div> 
            <div class="form-group row">
                <label for="blood_group" class="col-xs-3 col-form-label"><?php echo display('blood_group') ?></label>
                <div class="col-xs-9"> 
                    <?php
                        $bloodList = array(
                            ''   => display('select_option'),
                            'A+' => 'A+',
                            'A-' => 'A-',
                            'B+' => 'B+',
                            'B-' => 'B-',
                            'O+' => 'O+',
                            'O-' => 'O-',
                            'AB+' => 'AB+',
                            'AB-' => 'AB-'
                        );
                        echo form_dropdown('blood_group', $bloodList, '', 'class="form-control" id="blood_group" '); 
                    ?>
                </div>
            </div>

      </div>
      <div class="modal-footer">
        <div class="form-group row">
            <div class="col-sm-offset-3 col-sm-6">
                <div class="ui buttons">
                    <button type="reset" class="ui button"><?php echo display('reset') ?></button>
                    <div class="or"></div>
                    <button class="ui positive button"><?php echo display('save') ?></button>
                </div>
            </div>
        </div>
      </div>
      <?php echo form_close() ?>
    </div>
  </div>
</div>

<script type="text/javascript">
$(document).ready(function() {

    //check patient id
    $('#patient_id').keyup(function(){
        var pid = $(this);

        $.ajax({
            url  : '<?= base_url('appointment/check_patient/') ?>',
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

    //search patient id 
    $('#searchText').keyup(function(){
        var text = $(this).val();
        
        $.ajax({
            url  : '<?= base_url('appointment/search_patient/') ?>',
            type : 'POST',
            data : {
                '<?= $this->security->get_csrf_token_name(); ?>' : '<?= $this->security->get_csrf_hash(); ?>',
                query : text
            },
            success : function(data) {
                $('#searchValue').html(data);
            }, 
            error : function(){
                
            }
        });
    });
 
    //department_id
    $("#department_id").change(function(){
        var output = $('.doctor_error'); 
        var doctor_list = $('#doctor_id');
        var available_day = $('#available_day');

        $.ajax({
            url  : '<?= base_url('appointment/doctor_by_department/') ?>',
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
            url  : '<?= base_url('appointment/schedule_day_by_doctor/') ?>',
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
            url  : '<?= base_url('appointment/serial_by_date/') ?>',
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

    //serial_no 
    $("body").on('click','.serial_no',function(){
        var serial_no = $(this).attr('data-item');
        $("#serial_no").val(serial_no);
        $('.serial_no').removeClass('btn-danger').addClass('btn-success').not(".disabled");
        $(this).removeClass('btn-success').addClass('btn-danger').not(".disabled");
    });

     // show dropdown month name and previous years
    $( ".dropdown-month-years" ).datepicker({
        dateFormat: "dd-mm-yy",
        changeMonth: true,
        changeYear: true,
        yearRange: "-50:+0"
     });
    
    $( ".datepicker-avaiable-days" ).datepicker({
        dateFormat: "yy-mm-dd",
        changeMonth: true,
        changeYear: true,
        showButtonPanel: false,
        minDate: 0,  
        // beforeShowDay: DisableDays 
     });


});

// patient id throw in patient field
function patientInfo(id){
     $(".patient").val(id);
     $('#searchValue').html('');
     $('#searchText').val('');
}
</script>

