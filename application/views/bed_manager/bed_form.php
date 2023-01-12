<div class="row">
    <!--  form area -->
    <div class="col-sm-12"> 
        <div class="panel panel-default thumbnail"> 
        <?php
        if($this->permission->method('bed_list','read')->access() || $this->permission->method('bed_list','update')->access() || $this->permission->method('bed_list','delete')->access()){
        ?>
            <div class="panel-heading">
                <div class="btn-group">
                    <a class="btn btn-primary" href="<?php echo base_url("bed_manager/bed") ?>"> <i class="fa fa-list"></i>  <?php echo display('bed_list') ?> </a> 
                </div>
            </div>
        <?php
        }
        ?>


        <?php
        if($this->permission->method('add_bed','create')->access()){
        ?>
            <div class="panel-body panel-form">
                <div class="row">
                    <div class="col-md-9 col-sm-12">

                        <?php echo form_open('bed_manager/bed/form/'.$room->id,'class="form-inner"') ?>

                            <?php echo form_hidden('id',$room->id) ?>

                            <div class="form-group row">
                                <label for="room_id" class="col-xs-3 col-form-label"><?php echo display('room_name') ?> <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                    <?php echo form_dropdown('room_id', $room_list, $room->room_id, 'class="form-control" id="room_id"') ?>
                                </div>
                            </div> 

                             <div class="form-group row">
                                <label for="bed_number" class="col-xs-3 col-form-label"><?php echo display('bed_number') ?> <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                    <input name="bed_number"  type="text" class="form-control" id="bed_number" placeholder="<?php echo display('bed_number') ?>">
                                     <span class="bed"></span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="description" class="col-xs-3 col-form-label"><?php echo display('description') ?></label>
                                <div class="col-xs-9">
                                    <textarea name="description" class="form-control"  placeholder="<?php echo display('description') ?>" rows="7"></textarea>
                                </div>
                            </div>

                            <!--Radio-->
                            <div class="form-group row">
                                <label class="col-sm-3"><?php echo display('status') ?></label>
                                <div class="col-xs-9"> 
                                    <div class="form-check">
                                        <label class="radio-inline">
                                <input type="radio" name="status" value="0" checked><?php echo display('active') ?>
                                        </label>
                                        <label class="radio-inline">
                                 <input type="radio" name="status" value="1"><?php echo display('inactive') ?>
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<script type="text/javascript">
$(document).ready(function() { 

    //check bed limit
    $('#room_id').change(function(){
        var room_id = $(this);
        var limit = $('.bed');
        $.ajax({
            url  : '<?= base_url('bed_manager/bed/check_bed_limit/') ?>',
            type : 'post',
            dataType : 'JSON',
            data : {
                '<?= $this->security->get_csrf_token_name(); ?>' : '<?= $this->security->get_csrf_hash(); ?>',
                room_id : room_id.val()
            },
            success : function(data) 
            {
                if (data.status == true) {
                    limit.text(data.message).addClass('text-success').removeClass('text-danger');
                }else {
                    limit.text(data.message).addClass('text-danger').removeClass('text-success');
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