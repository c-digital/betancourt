<div class="row">
    <!--  form area -->
    <div class="col-sm-12">
        <div  class="panel panel-default thumbnail">
           
            <?php
            if($this->permission->method('medication_list','read')->access() || $this->permission->method('medication_list','update')->access() || $this->permission->method('medication_list','delete')->access()){
            ?>
            <div class="panel-heading no-print">
                <div class="btn-group"> 
                    <a class="btn btn-primary" href="<?php echo base_url("medication_visit/medications") ?>"> <i class="fa fa-list"></i>  <?php echo display('medication_list') ?> </a>  
                </div>
            </div> 
            <?php } ?>


           <?php
           if($this->permission->method('add_medication','update')->access()){
           ?>
            <div class="panel-body panel-form">
                <div class="row">
                    <div class="col-md-9 col-sm-12">

                        <?php echo form_open('medication_visit/medications/create/'.$medication->id,'class="form-inner"') ?>
                            <?php echo form_hidden('id',$medication->id) ?>
                            <div class="form-group row">
                                <label for="patient_id" class="col-xs-3 col-form-label"><?php echo display('patient_id') ?> <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                    <input name="patient_id"  type="text" class="form-control" id="patient_id" value="<?= $medication->patient_id; ?>">
                                </div>
                            </div>

                             <div class="form-group row">
                                <label for="medicine_id" class="col-xs-3 col-form-label"><?php echo display('medicine_name') ?> <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                <?php echo form_dropdown('medicine_id', $medicine_list, $medication->medicine_id, 'class="form-control" id="medicine_id"') ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="dosage" class="col-xs-3 col-form-label"><?php echo display('dosage') ?> <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                    <input name="dosage" type="text" class="form-control" id="dosage" value="<?= $medication->dosage; ?>">
                                </div>
                            </div>

                             <div class="form-group row">
                                <label for="per_day_intake" class="col-xs-3 col-form-label"><?php echo display('per_day_intake') ?> <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                    <input name="per_day_intake" type="text" class="form-control" id="per_day_intake" value="<?= $medication->per_day_intake; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="full_stomach" class="col-xs-3 col-form-label"><?php echo display('full_stomach') ?></label>
                                <div class="col-xs-9">
                                    <?php if($medication->full_stomach==1){?>
                                    <input type="checkbox" class="custom-control-input" id="full_stomach" name="full_stomach" checked="checked">
                                <?php }else{?>
                                    <input type="checkbox" class="custom-control-input" id="full_stomach" name="full_stomach">
                                <?php }?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="other_instruction" class="col-xs-3 col-form-label"><?php echo display('other_instruction') ?> <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                     <textarea name="other_instruction" class="form-control" id="description"  placeholder="<?php echo display('other_instruction') ?>" rows="3"><?= $medication->other_instruction; ?></textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="from_date" class="col-xs-3 col-form-label"><?php echo display('from_date') ?> <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                    <input name="from_date" type="text" class="form-control datepicker" id="from_date" value="<?= $medication->from_date; ?>" autocomplete="off">
                                </div>
                            </div>

                             <div class="form-group row">
                                <label for="to_date" class="col-xs-3 col-form-label"><?php echo display('to_date') ?> <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                    <input name="to_date" type="text" class="form-control datepicker" id="to_date" value="<?= $medication->to_date; ?>" autocomplete="off">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="prescribe_by" class="col-xs-3 col-form-label"><?php echo display('doctor_name') ?> <i class="text-danger">*</i> </label>
                                <div class="col-xs-9">
                                <?php echo form_dropdown('prescribe_by', $doctor_list, $medication->prescribe_by, 'class="form-control" id="doctor_id"') ?>
                                </div>
                            </div>

                             <div class="form-group row">
                                <label for="intake_time" class="col-xs-3 col-form-label"><?php echo display('intake_time') ?> <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                    <input name="intake_time" type="text" class="timepicker form-control" id="intake_time" value="<?= $medication->intake_time; ?>" autocomplete="off">
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