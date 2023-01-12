<div class="row">
    <div class="col-sm-12">
        <div  class="panel panel-default thumbnail">
            <div class="msg"></div>
        <?php
        if($this->permission->method('setting','create')->access()){
        ?>
            <div class="panel-heading">
                <a href="<?= base_url('website/setting/create') ?>" class="btn btn-success"><i class="fa fa-plus"></i> <?php echo display('setting') ?></a>
                 <a href="<?= base_url('website/setting/common') ?>" class="btn btn-primary"> <?php echo display('common_settings') ?></a>
            </div>
        <?php } ?>

        <?php
        if($this->permission->method('setting','read')->access() || $this->permission->method('setting','update')->access()){
        ?>
            <div class="panel-body">
                <table width="100%" class="datatable table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th><?php echo display('serial') ?></th>
                            <th><?php echo display('language') ?></th>
                            <th><?php echo display('title') ?></th>
                            <th><?php echo display('phone') ?></th>
                            <th><?php echo display('address') ?></th>
                            <?php
                            if($this->permission->method('setting','update')->access() || $this->permission->method('setting','create')->access()){
                            ?>
                            <th><?php echo display('action') ?></th>
                            <?php } ?>

                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($settings)) { ?>
                            <?php $sl = 1; ?>
                            <?php foreach ($settings as $setting) { ?>
                                <tr class="<?php echo ($sl & 1)?"odd gradeX":"even gradeC" ?>">
                                    <td><?php echo $sl; ?></td>
                                    <td><?php echo $setting->language; ?></td>
                                    <td><?php echo $setting->title; ?></td>
                                    <td><?php echo $setting->phone; ?></td>
                                    <td><?= $setting->address?></td>

                                    <?php
                                    if($this->permission->method('setting','update')->access() || $this->permission->method('setting','delete')->access()){
                                    ?>

                                    <td class="center">
                                    <?php
                                    if($this->permission->method('setting','update')->access()){
                                    ?>
                                        <a href="<?php echo base_url("website/setting/edit/$setting->id") ?>" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a> 
                                    <?php } ?>

                                    <?php
                                    if($this->permission->method('setting','delete')->access()){
                                    ?>
                                       <a href="<?php echo base_url("website/setting/delete/$setting->id") ?>" onclick="return confirm('<?php echo display('are_you_sure') ?>')" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a> 
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
<script type="text/javascript">
$(document).ready(function() {

    var source = $('input[id^="add_to_website"]');
    var target = $('.msg');
    source.on('change', function() {
        var id     = $(this).attr('data-id');
        var value  = $(this).attr('data-value'); 

        $.ajax({
            url      : '<?= base_url('website/setting/change_qr') ?>',
            type     : 'post',
            dataType : 'json',
            data     : {
                '<?= $this->security->get_csrf_token_name(); ?>' : '<?= $this->security->get_csrf_hash(); ?>',
                id, 
                value
            },
            success : function(data) { 
                if (data.message) {
                    target.removeClass('alert alert-danger');
                    target.addClass('alert alert-info');
                    target.html(data.message);
                } else {
                    target.removeClass('alert alert-info');
                    target.addClass('alert alert-danger');
                    target.html(data.exception);
                } 

                setInterval(function(){ 
                    history.go(0);
                }, 1500);

            },
            error   : function(exc){
                alert('failed');
            }
        });
 

    }); 
});
</script>