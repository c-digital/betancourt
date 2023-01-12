<div class="row">
    <!--  form area -->
    <div class="col-sm-12">
        <div  class="panel panel-default thumbnail">
           <?php
            if($this->permission->method('schedule_list','read')->access() || $this->permission->method('schedule_list','update')->access() || $this->permission->method('schedule_list','delete')->access()){
            
            ?>
            <div class="panel-heading no-print">
                <div class="btn-group"> 
                    <a class="btn btn-primary" href="<?php echo base_url("schedule/") ?>"> <i class="fa fa-list"></i>  <?php echo display('schedule_list') ?> </a>  
                </div>
            </div> 
            <?php } ?>


            <?php
              if($this->permission->method('add_schedule','create')->access()){
             ?>
            <div class="panel-body panel-form">
                <div class="row">
                    <div class="col-md-9 col-sm-12">

                        <?php echo form_open('schedule/create','class="form-inner"') ?>
                            
                            <?php echo form_hidden('schedule_id',$schedule->schedule_id) ?>

                            <div class="form-group row">
                                <label for="slot_name" class="col-xs-3 col-form-label"><?php echo display('slot_name') ?></label>
                                <div class="col-xs-9">
                                    <?php echo form_dropdown('slot_id',$slots,$schedule->slot_id,'class="form-control" id="slot_id"') ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="doctor_id" class="col-xs-3 col-form-label"><?php echo display('doctor_name') ?></label>
                                <div class="col-xs-9">
                                    <?php echo form_dropdown('doctor_id',$doctor_list,$schedule->doctor_id,'class="form-control" id="doctor_id"') ?>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="available_days" class="col-xs-3 col-form-label"><?php echo display('available_days') ?></label>
                                <div class="col-xs-9"> 
                                    <?php 
                                        $AvailableDays = array(  
                                            'Sunday'   => 'Sunday', 
                                            'Monday'   => 'Monday', 
                                            'Tuesday'  => 'Tuesday', 
                                            'Wednesday' => 'Wednesday', 
                                            'Thursday' => 'Thursday', 
                                            'Friday'   => 'Friday', 
                                            'Saturday' => 'Saturday' 
                                        );
                                        echo form_dropdown('available_days',$AvailableDays,$schedule->available_days,'class="form-control" id="available_days"'); 
                                    ?>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-xs-3 col-form-label"><?php echo display('available_time') ?> </label>
                                <div class="col-xs-9">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <input name="start_time" class="timepicker form-control" type="text" placeholder="<?php echo display('start_time') ?>" value="<?php echo $schedule->start_time ?>" autocomplete="off">
                                        </div>
                                        <div class="col-xs-6">
                                            <input name="end_time" class="timepicker form-control" type="text" placeholder="<?php echo display('end_time') ?>"  value="<?php echo $schedule->end_time ?>" autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="per_patient_time" class="col-xs-3 col-form-label"><?php echo display('per_patient_time') ?></label>
                                <div class="col-xs-9">
                                    <input class="timepicker-hour-min-only form-control" name="per_patient_time" type="text" placeholder="<?php echo display('per_patient_time') ?>" id="per_patient_time"  value="<?php echo $schedule->per_patient_time ?>" autocomplete="off">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="serial_visibility_type" class="col-xs-3 col-form-label"><?php echo display('serial_visibility_type') ?></label>
                                <div class="col-xs-9"> 
                                    <?php 
                                        $visibilityTypes = [
                                            '1' => display('sequential'),
                                            '2' => display('timestamp'),
                                        ];
                                        echo form_dropdown('serial_visibility_type',$visibilityTypes,$schedule->serial_visibility_type,'class="form-control" id="serial_visibility_type"'); 
                                    ?>

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

