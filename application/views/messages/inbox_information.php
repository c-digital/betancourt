<div class="row">
    <!--  table area -->
    <div class="col-sm-12" id="PrintMe">
        <div class="panel panel-default thumbnail">
            <div class="panel-heading  no-print">
                <div class="btn-group"> 
                    <?php
                    if($this->permission->method('new_message','create')->access()){
                    ?>
                    <a class="btn btn-success" href="<?php echo base_url("messages/message/new_message") ?>"> <i class="fa fa-send-o"></i>  <?php echo display('new_message') ?> </a>
                    <?php } ?>

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

                    <?php
                    if($this->permission->method('inbox','read')->access()){
                    ?>
                    <button type="button" onclick="printContent('PrintMe')" class="btn btn-danger"><i class="fa fa-print"></i></button> 
                    <?php } ?>
                </div> 
            </div>

            <?php
            if($this->permission->method('inbox','read')->access()){
            ?>
            <div class="panel-body">
                <dl class="dl-horizontal">
                    <dt><?php echo display('sender') ?></dt>
                    <dd><?php echo $message->sender_name ?></dd>
                    <dt><?php echo display('receiver_name') ?></dt>
                    <dd><?php echo $this->session->userdata('fullname') ?></dd>
                    <dt><?php echo display('date') ?></dt>
                    <dd><?php echo date('d M Y h:i:s a', strtotime($message->datetime)) ?></dd>
                    <dt><?php echo display('subject') ?></dt>
                    <dd><?php echo $message->subject ?></dd>
                    <dt><?php echo display('message') ?></dt> 
                    <dd><?php echo $message->message ?></dd>
                </dl>
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
 

  


