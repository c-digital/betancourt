<div class="row">
    <!--  form area -->
    
    <div class="col-sm-12">
        <div  class="panel panel-default thumbnail">
            <div class="panel-heading">
                <div class="btn-group"> 
                    <?php
                    if($this->permission->method('inbox','read')->access() || $this->permission->method('inbox','delete')->access()){
                    ?>
                    <a class="btn btn-primary" href="<?php echo base_url("messages/message") ?>"> <i class="fa fa-inbox"></i>  <?php echo display('inbox') ?> </a>
                    <?php } ?>


                    <?php
                    if($this->permission->method('sent','read')->access() || $this->permission->method('sent','delete')->access()){
                    ?>
                    <a class="btn btn-info" href="<?php echo base_url("messages/message/sent") ?>"> <i class="fa fa-share"></i>  <?php echo display('sent') ?> </a>
                    <?php } ?>

                </div> 

            </div>


            <?php
            if($this->permission->method('new_message','create')->access()){
            ?>
            <div class="panel-body  panel-form">
                <div class="row">
                    <div class="col-md-9 col-sm-12">
                        <?php echo form_open('messages/message/new_message/','class="form-inner"') ?>
                            <div class="form-group row">
                                <label for="receiver_id" class="col-xs-3 col-form-label"><?php echo display('receiver_name')?> <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                    <?php echo form_dropdown('receiver_id', $user_list, $message->receiver_id ,'class="form-control" id="receiver_id"') ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="subject" class="col-xs-3 col-form-label"><?php echo display('subject')?> <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                    <input name="subject"  type="text" class="form-control" id="subject" placeholder="<?php echo display('subject')?>" value="<?php echo $message->subject ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="message" class="col-xs-3 col-form-label"><?php echo display('message') ?> <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                    <textarea name="message" class="form-control tinymce"  placeholder="<?php echo display('message') ?>"  rows="7"><?php echo $message->message ?></textarea>
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