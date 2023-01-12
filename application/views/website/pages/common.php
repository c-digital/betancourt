<div class="row">
    <div class="col-sm-12">
        <div  class="panel panel-default thumbnail">
            <div class="msg"></div>
        <?php
        if($this->permission->method('setting','create')->access()){
        ?>
            <div class="panel-heading">
                <a href="<?= base_url('website/setting') ?>" class="btn btn-success"><i class="fa fa-list"></i> <?php echo display('setting') ?></a>
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
                            <th><?php echo display('email') ?></th>
                            <th><?php echo display('logo') ?></th>
                            <th><?php echo display('favicon') ?></th>
                            <?php
                            if($this->permission->method('setting','update')->access()){
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
                                    <td><?php echo $setting->email; ?></td>
                                    <td><img class="img-fluid" src="<?php echo base_url($setting->logo); ?>"></td>
                                    <td><img class="img-fluid" src="<?php echo base_url($setting->favicon); ?>"></td>
                                    <?php
                                    if($this->permission->method('setting','update')->access()){
                                    ?>

                                    <td class="center">
                                    <?php
                                    if($this->permission->method('setting','update')->access()){
                                    ?>
                                        <a href="<?php echo base_url("website/setting/update_common/$setting->id") ?>" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a> 
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