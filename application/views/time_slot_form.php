<div class="row">
    <!--  form area -->
    <div class="col-sm-12">
        <div  class="panel panel-default thumbnail"> 
           <?php
            if($this->permission->method('slot_list','read')->access() || $this->permission->method('slot_list','update')->access() || $this->permission->method('slot_list','delete')->access()){
            
            ?>
            <div class="panel-heading no-print">
                <div class="btn-group"> 
                    <a class="btn btn-primary" href="<?php echo base_url("schedule/time_slot") ?>"> <i class="fa fa-list"></i>  <?php echo display('slot_list') ?> </a>  
                </div>
            </div> 
            <?php } ?>


            <?php
              if($this->permission->method('add_time_slot','create')->access()){
             ?>
            <div class="panel-body panel-form">
                <div class="row">
                    <div class="col-md-9 col-sm-12">

                        <?php echo form_open('schedule/create_slot','class="form-inner"') ?>
                            
                            <?php echo form_hidden('id',$slot->id) ?>

                            
                            <div class="form-group row">
                                <label for="slot_name" class="col-xs-3 col-form-label"><?php echo display('slot_name') ?> <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                    <input class="form-control" name="slot_name" type="text" placeholder="<?php echo display('slot_name') ?>" id="slot_name"  value="<?php echo $slot->slot_name ?>">
                                </div>
                            </div>

                             <div class="form-group row">
                                <label for="slot" class="col-xs-3 col-form-label"><?php echo display('slot') ?> <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                    <input class="form-control" name="slot" type="text" placeholder="08:00 - 12:00" id="slot"  value="<?php echo $slot->slot ?>">
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

