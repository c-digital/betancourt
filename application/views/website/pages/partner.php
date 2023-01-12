<div class="row">
    <div class="col-sm-12">
        <div  class="panel panel-default thumbnail">
        <?php
        if($this->permission->method('partner','create')->access()){
        ?>
            <div class="panel-heading">
                <a href="<?= base_url('website/partners/create') ?>" class="btn btn-success"><i class="fa fa-plus"></i> <?php echo display('add_partner') ?></a>
            </div>
        <?php } ?>

        <?php
        if($this->permission->method('partner','read')->access() || $this->permission->method('partner','update')->access() || $this->permission->method('partner','delete')->access()){
        ?>
            <div class="panel-body">
                <table width="100%" class="datatable table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th><?php echo display('serial') ?></th>
                            <th><?php echo display('logo') ?></th>
                            <th><?php echo display('name') ?></th>
                            <th><?php echo display('url') ?></th>
                            <th><?php echo display('status') ?></th>
                            <?php
                            if($this->permission->method('partner','update')->access() || $this->permission->method('partner','delete')->access()){
                            ?>
                            <th><?php echo display('action') ?></th>
                            <?php } ?>

                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($partners)) { ?>
                            <?php $sl = 1; ?>
                            <?php foreach ($partners as $partner) { ?>
                                <tr class="<?php echo ($sl & 1)?"odd gradeX":"even gradeC" ?>">
                                    <td><?php echo $sl; ?></td>
                                    <td><img src="<?php echo (!empty($partner->image)?base_url($partner->image):base_url('assets_web/img/placeholder/clients.png')); ?>" width="65" height="50"></td>
                                    <td><?php echo $partner->name; ?></td>
                                    <td><?php echo $partner->url; ?></td>
                                    <td><?php echo (($partner->status==1)?display('active'):display('inactive')); ?></td>

                                    <?php
                                    if($this->permission->method('partner','update')->access() || $this->permission->method('partner','delete')->access()){
                                    ?>

                                    <td class="center">
                                    <?php
                                    if($this->permission->method('partner','update')->access()){
                                    ?>
                                    <a href="<?php echo base_url("website/partners/edit/$partner->id") ?>" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a> 
                                    <?php } ?>

                                    <?php
                                    if($this->permission->method('partner','delete')->access()){
                                    ?>
                                    <a href="<?php echo base_url("website/partners/delete/$partner->id") ?>" onclick="return confirm('<?php echo display('are_you_sure') ?>')" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a> 
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