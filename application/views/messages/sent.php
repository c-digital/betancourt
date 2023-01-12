<div class="row">
    <!--  table area -->
    <div class="col-sm-12">
        <div  class="panel panel-default thumbnail">
            <div class="panel-heading">
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

                </div> 
            </div>

            <?php
             if($this->permission->method('send','read')->access() || $this->permission->method('send','delete')->access()){
             ?>
            <div class="panel-body">
                <table width="100%" class="datatable table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th><?php echo display('serial') ?></th>
                            <th><?php echo display('receiver_name') ?></th>
                            <th><?php echo display('subject') ?></th>
                            <th><?php echo display('message') ?></th>
                            <th><?php echo display('date') ?></th> 
                            <th><?php echo display('status') ?></th> 
                            <?php
                            if($this->permission->method('send','read')->access() || $this->permission->method('send','delete')->access()){
                            ?>
                            <th><?php echo display('action') ?></th> 
                            <?php } ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($messages)) { ?>
                            <?php $sl = 1; ?>
                            <?php foreach ($messages as $message) { ?>
                                <tr>
                                    <td><?php echo $sl; ?></td>
                                    <td><?php echo $message->receiver_name; ?></td>
                                    <td><?php echo $message->subject; ?></td>
                                    <td><?php echo character_limiter(strip_tags($message->message),50); ?></td>
                                    <td><?php echo date('d M Y h:i:s a', strtotime($message->datetime)); ?></td>
                                    <td><?php echo (($message->receiver_status == 0) ? "<i class='label label-warning'>not seen</label>" : "<i class='label label-success'>seen</label>"); ?></td> 

                                    <?php
                                    if($this->permission->method('send','read')->access() || $this->permission->method('send','delete')->access()){
                                    ?>
                                    <td class="center" width="80">
                                        <?php
                                        if($this->permission->method('send','read')->access()){
                                        ?>
                                        <a href="<?php echo base_url("messages/message/sent_information/$message->id") ?>" class="btn btn-xs btn-success"><i class="fa fa-eye"></i></a>  
                                        <?php } ?>

                                        <?php
                                        if($this->permission->method('send','delete')->access()){
                                        ?>
                                        <a href="<?php echo base_url("messages/message/delete/$message->id/$message->sender_id/$message->receiver_id") ?>" class="btn btn-xs btn-danger" onclick="return confirm('<?php echo display('are_you_sure') ?>') "><i class="fa fa-trash"></i></a> 
                                        <?php } ?>
                                    </td>
                                    <?php } ?>



                                </tr>
                                <?php $sl++; ?>
                            <?php } ?> 
                        <?php } ?> 
                    </tbody>
                </table>  <!-- /.table-responsive -->
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
 
 