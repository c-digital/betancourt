<div class="row">
    <!--  form area -->
    <div class="col-sm-12"> 
        <div class="panel panel-default thumbnail"> 
        <?php
        if($this->permission->method('bed_assign','read')->access() || $this->permission->method('bed_assign','update')->access() || $this->permission->method('bed_assign','delete')->access()){
        ?>
            <div class="panel-heading">
                <div class="btn-group">
                    <a class="btn btn-primary" href="<?php echo base_url("bed_manager/bed_assign") ?>"> <i class="fa fa-list"></i>  <?php echo display('bed_assign_list') ?> </a> 
                </div>
            </div>
        <?php
        }
        ?>


        <?php
        if($this->permission->method('bed_assign','create')->access()){
        ?>
            <div class="panel-body panel-form">
                <div class="row">
                    <div class="col-md-9 col-sm-12">

                        <?php echo form_open('bed_manager/bed_assign/discharged/'.$discharged->serial,'class="form-inner"') ?>

                             <div class="form-group row">
                                <label for="patient_id" class="col-xs-3 col-form-label"><?php echo display('patient_id') ?> <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                    <input name="serial"  type="hidden" class="form-control" id="serial" value="<?= $discharged->serial?>">
                                    <input name="patient_id"  type="text" class="form-control" id="patient_id" value="<?= $discharged->patient_id?>">

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="date" class="col-xs-3 col-form-label"><?php echo display('discharge_date') ?> <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                    <input name="discharge_date" class="datepicker form-control" value="<?= date('Y-m-d')?>">
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
<script type="text/javascript">
    //custom date picker
    $('.cdatepicker').datepicker({
        minDate:0,
        dateFormat: "dd-mm-yy"
    });
</script>
