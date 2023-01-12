<div class="row">
    <!--  form area -->
    <div class="col-sm-12">
        <div  class="panel panel-default thumbnail">
           
            <?php
            if($this->permission->method('visit_list','read')->access() || $this->permission->method('visit_list','update')->access() || $this->permission->method('visit_list','delete')->access()){
            ?>
            <div class="panel-heading no-print">
                <div class="btn-group"> 
                    <a class="btn btn-primary" href="<?php echo base_url("medication_visit/visits") ?>"> <i class="fa fa-list"></i>  <?php echo display('visit_list') ?> </a>  
                </div>
            </div> 
            <?php } ?>

 
           <?php
           if($this->permission->method('add_visit','create')->access()){
           ?>
            <div class="panel-body panel-form">
                <div class="row">
                    <div class="col-md-9 col-sm-12">

                        <?php echo form_open('medication_visit/visits/create','class="form-inner"') ?>

                            <div class="form-group row">
                                <label for="patient_id" class="col-xs-3 col-form-label"><?php echo display('patient_id') ?> <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                    <input name="patient_id"  type="text" class="form-control" id="patient_id" placeholder="<?php echo display('patient_id') ?>" value="<?= (!empty($patient_id)?$patient_id:null)?>">
                                    <span></span>
                                </div>
                            </div>

                            <?php if($this->session->userdata('user_role')!=2){ ?>
                            <div class="form-group row">
                                <label for="visit_by" class="col-xs-3 col-form-label"><?php echo display('visit_by') ?> <i class="text-danger">*</i></label>
                                <div class="col-xs-9"> 
                                    <?php 
                                        $VisitBy = array(  
                                            ''         => display('select_option'), 
                                            '2'   => 'Doctor', 
                                            '5'   => 'Nurse'  
                                        );
                                        echo form_dropdown('visit_by',$VisitBy,$visit->user_type,'class="form-control" id="visit_by"'); 
                                    ?>
                                    <span class="user_error"></span>
                                </div>
                            </div>

                             <div class="form-group row">
                                <label for="user_id" class="col-xs-3 col-form-label"><?php echo display('select_option') ?> <i class="text-danger">*</i> </label>
                                <div class="col-xs-9">
                                <?php echo form_dropdown('user_id', '', '', 'class="form-control" id="user_id"') ?>
                                </div>
                            </div>
                            <?php }?>
                            <div class="form-group row">
                                <label for="visit_date" class="col-xs-3 col-form-label"><?php echo display('visit_date') ?> <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                    <input name="visit_date" type="text" class="form-control datepicker" id="visit_date" placeholder="<?php echo display('visit_date') ?>" autocomplete="off">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="visit_time" class="col-xs-3 col-form-label"><?php echo display('visit_time') ?> <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                    <input name="visit_time" type="text" class="timepicker form-control" id="visit_time" placeholder="<?php echo display('visit_time') ?>" autocomplete="off">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="finding" class="col-xs-3 col-form-label"><?php echo display('finding') ?></label>
                                <div class="col-xs-9">
                                     <textarea name="finding" class="form-control" id="finding"  placeholder="<?php echo display('finding') ?>" rows="3"></textarea>
                                </div>
                            </div>

                             <div class="form-group row">
                                <label for="instructions" class="col-xs-3 col-form-label"><?php echo display('instructions') ?></label>
                                <div class="col-xs-9">
                                     <textarea name="instructions" class="form-control" id="instructions"  placeholder="<?php echo display('instructions') ?>" rows="3"></textarea>
                                </div>
                            </div>


                             <div class="form-group row">
                                <label for="fees" class="col-xs-3 col-form-label"><?php echo display('fees') ?></label>
                                <div class="col-xs-9">
                                    <input name="fees" type="number" class="form-control" id="fees" placeholder="<?php echo display('fees') ?>">
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
                </div>
            </div>
<?php 
}
 else{
 ?>
  
    <div class="col-sm-12">
       <div class="panel panel-bd lobidrag">
        <div class="panel-heading">
          <div class="panel-title">
            <h4><?php echo display('you_do_not_have_permission_to_access_please_contact_with_administrator');?>.</h4>
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
<script type="text/javascript">
$(document).ready(function() {

    //check patient id
    $('#patient_id').on('keyup change click',function(){
        var pid = $(this);

        $.ajax({
            url  : '<?= base_url('bed_manager/bed_assign/check_patient/') ?>',
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

    // check visiting user
    $("#visit_by").change(function(){
        var output = $('.user_error'); 
        var user_list = $('#user_id'); 

        $.ajax({
            url  : '<?= base_url('medication_visit/visits/doctor_or_nurse_list/') ?>',
            type : 'post',
            dataType : 'JSON',
            data : {
                '<?= $this->security->get_csrf_token_name(); ?>' : '<?= $this->security->get_csrf_hash(); ?>',
                user_role : $(this).val()
            },
            success : function(data) 
            {
                if (data.status == true) {
                    user_list.html(data.message);
                    output.html('');
                } else {
                    user_list.html('');
                    output.html(data.message).addClass('text-danger').removeClass('text-success');
                } 
            }, 
            error : function()
            {
                alert('failed');
            }
        });
    });  

});
 
 </script>