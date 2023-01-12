<div class="row">
    <!--  table area -->
    <div class="col-sm-12" id="PrintMe">
        <div class="panel panel-default thumbnail">
            <div class="panel-heading no-print">
                <div class="btn-group"> 

                    <a class="btn btn-success" href="<?php echo base_url("dashboard_patient/message/new_message") ?>"> <i class="fa fa-send-o"></i>  <?php echo display('new_message') ?> </a>
                    
                    <a class="btn btn-primary" href="<?php echo base_url("dashboard_patient/message") ?>"> <i class="fa fa-inbox"></i>  <?php echo display('inbox') ?> </a>
                   
                    <a class="btn btn-info" href="<?php echo base_url("dashboard_patient/message/sent") ?>"> <i class="fa fa-share"></i>  <?php echo display('sent') ?> </a>
                   
                    <button type="button" onclick="printContent('PrintMe')" class="btn btn-danger"><i class="fa fa-print"></i></button> 
                    
                </div> 
            </div>

            <div class="panel-body">
                <div class="row">
                        <div class="col-sm-12">
                            <div class="mailbox">
                                
                                <div class="mailbox-body">
                                    <div class="row m-0">
                                       
                                        <div class="col-xs-12 col-sm-12 col-md-9 p-0 inbox-mail">
                                            <div class="inbox-avatar p-20 border-btm">
                                                <img src="<?= (!empty($messages->picture)?base_url($messages->picture):base_url('assets/images/staff.png'));?>" class="border-green" alt="">
                                                <div class="inbox-avatar-text">
                                                    <div class="avatar-name"><strong><?= display('to');?>: </strong>
                                                        <?= $messages->receiver_name;?> - <em><?= $messages->email;?></em>
                                                    </div>
                                                    <div><small><strong><?= display('subject');?>: </strong><?= $messages->subject;?> </small></div>
                                                </div>
                                                <div class="inbox-date text-right hidden-xs hidden-sm">
                                                    <div><span class="bg-green badge"><small><?= $messages->type;?></small></span></div>
                                                    <div><small><?= date('d M Y h:i:s a', strtotime($messages->datetime));?></small></div>
                                                </div>
                                            </div>
                                            <div class="inbox-mail-details p-20">
                                                <?= $messages->message;?>
                                                <hr>
                                                <h4> <i class="fa fa-comments"></i> All Replies <span>(<?= !empty($messages->allreplies)?count($messages->allreplies):0;?>)</span> </h4>
                                                <div class="row">
                                                    <div class="col-sm-12 col-xs-12">
                                                       <ul class="chat_list">
                                                        <?php if(!empty($messages->allreplies)){ ?>
                                                            <?php foreach($messages->allreplies as $reply){ ?>
                                                                <?php if($reply->sender_type==1){ ?>
                                                                    <li class="clearfix">
                                                                        <div class="chat-avatar">
                                                                            <img src="<?= (!empty($reply->info->picture)?base_url($reply->info->picture):base_url('assets/images/staff.png'));?>" alt="">
                                                                        </div>
                                                                        <div class="conversation-text">
                                                                            <div class="ctext-wrap">
                                                                                <i><?= $reply->info->fullname;?></i> 
                                                                                <small><?= date('d M Y h:i:s a', strtotime($reply->reply_date));?></small>
                                                                                <p><?= $reply->replies;?></p>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                <?php }else{ ?>
                                                                    <li class="clearfix odd">
                                                                        <div class="chat-avatar">
                                                                            <img src="<?= (!empty($reply->info->picture)?base_url($reply->info->picture):base_url('assets/images/staff.png'));?>" alt="">
                                                                        </div>
                                                                        <div class="conversation-text">
                                                                            <div class="ctext-wrap">
                                                                                <i><?= $reply->info->fullname;?></i> 
                                                                                <small class="text-white"><?= date('d M Y h:i:s a', strtotime($reply->reply_date));?></small>
                                                                                <p><?= $reply->replies;?></p>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                <?php }?>
                                                            <?php }?>
                                                        <?php }?>
                                                          
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="m-t-20 border-all p-20">
                                                    <div class="form-group">
                                                        <textarea class="form-control" name="replies" id="replies" placeholder="Reply messages" rows="4"></textarea>
                                                        <input type="hidden" id="message_id" value="<?= $messages->id;?>">
                                                    </div>
                                                    <div class="form-group Msg"></div>
                                                    <div class="form-group">
                                                        <button class="btn btn-success btn-replies"><?= display('add');?></button>
                                                    </div>
                                                </div> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>

            </div> 
        </div>
    </div> 
</div>
<script type="text/javascript">
    $(document).ready(function(){
        
        $('.btn-replies').on('click', function(){
            $('.Msg').html('');
            var content = $('.chat_list');
            var text = $('#replies').val();
            var mid = $('#message_id').val();
            if(text==''){
               $('.Msg').html('<div class="alert alert-danger">Comment field is required!</div>');
               setTimeout(function(){
                $('.Msg').html('');
               }, 3000);
            }else{
                 var item = '<li class="clearfix odd"><div class="chat-avatar"><img src="<?= base_url('assets/images/staff.png');?>" alt=""></div><div class="conversation-text"><div class="ctext-wrap"><i>Marco Lopes</i><small class="text-white"><?= date('d M Y h:i:s a');?></small><p>'+text+'</p></div></div></li>';
                content.append(item);
                $.ajax({
                    url: "<?php echo base_url('dashboard_patient/message/addReplies')?>",
                    method:"POST",
                    data:{message:text, mid:mid},
                    success:function(data){
                        $('#replies').val('');
                    }
                })
            }
        });

    });
</script>
 

  


