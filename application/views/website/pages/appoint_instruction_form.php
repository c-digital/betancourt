<div class="row">
    <!--  form area -->
    <div class="col-sm-12">

       <div  class="panel panel-default thumbnail">
       <?php
        if($this->permission->method('appoint_instruction','read')->access() || $this->permission->method('appoint_instruction','update')->access() || $this->permission->method('appoint_instruction','delete')->access()){
        ?>
            <div class="panel-heading no-print">
                <div class="btn-group"> 
                    <a class="btn btn-primary" href="<?php echo base_url("website/appoint_instruction/instructions") ?>"> <i class="fa fa-list"></i>  <?php echo display('instructions') ?> </a>  
                </div>
            </div> 
        <?php } ?>
 
       <?php
        if($this->permission->method('appoint_instruction','create')->access()){
        ?>
            <div class="panel-body  panel-form"> 
                <div class="row">
                    <div class="col-md-9 col-sm-12">

                        <?= form_open_multipart('website/appoint_instruction/instruction_form','class="form-inner"') ?>
                            
                            <input type="hidden" name="id" value="<?= $instruction->id ?>">
 
                            <div class="form-group row">
                                <label for="language" class="col-sm-3"><?php echo display('content_language') ?> <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                    <div class="form-check">
                                        <?php foreach ($languageList as $value) {?>
                                        <label class="radio-inline">
                                            <?php echo form_radio('language', lcfirst($value), (!empty($instruction->language)?lcfirst($value)==$instruction->language:lcfirst($value)=='english')).' ' .$value;?>
                                        </label>
                                        <?php }?>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="title" class="col-xs-3 col-form-label"><?php echo display('title') ?> <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                    <input name="title"  type="text" class="form-control" id="title" placeholder="<?php echo display('title') ?>" value="<?= $instruction->title ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="short_instruction" class="col-xs-3 col-form-label"><?php echo display('short_instruction') ?> <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                    <input name="short_instruction"  type="text" class="form-control" id="short_instruction" placeholder="<?php echo display('short_instruction') ?>" value="<?= $instruction->short_instruction ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="instructions" class="col-xs-3 col-form-label"><?php echo display('instructions') ?> <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                    <textarea name="instruction" class="form-control"  placeholder="<?php echo display('instructions') ?>"  rows="7"><?= $instruction->instruction ?></textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="notes" class="col-xs-3 col-form-label"><?php echo display('notes') ?> <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                    <input name="note"  type="text" class="form-control" id="note" placeholder="<?php echo display('notes') ?>" value="<?= $instruction->note ?>">
                                </div>
                            </div>

                            <!--Radios-->
                            <div class="form-group row">
                                <label class="col-sm-3">Status</label>
                                <div class="col-xs-9"> 
                                    <div class="form-check">
                                        <label class="radio-inline">
                                            <input type="radio" name="status" value="1" <?= set_radio('status', '1', true); ?> >Active
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="status" value="0" <?= set_radio('status', '0'); ?> >Inactive
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

                        <?= form_close() ?>

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