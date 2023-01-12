<div class="row">
    <div class="col-sm-12">
        <div  class="panel panel-default thumbnail">
        <?php
        if($this->permission->method('slider','create')->access()){
        ?>
            <div class="panel-heading">
                <a href="<?= base_url('website/banner_sliders/create') ?>" class="btn btn-success"><i class="fa fa-plus"></i> <?php echo display('add_banner_slider') ?></a>
            </div>
        <?php } ?>

        <?php
        if($this->permission->method('slider','read')->access() || $this->permission->method('slider','update')->access() || $this->permission->method('slider','delete')->access()){
        ?>
            <div class="panel-body">
                <table width="100%" class="datatable table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th><?php echo display('serial') ?></th>
                            <th><?php echo display('picture') ?></th>
                            <th><?php echo display('status') ?></th>
                            <?php
                            if($this->permission->method('slider','update')->access() || $this->permission->method('slider','delete')->access()){
                            ?>
                            <th><?php echo display('action') ?></th>
                            <?php } ?>

                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($banners)) { ?>
                            <?php $sl = 1; ?>
                            <?php foreach ($banners as $slider) { ?>
                                <tr class="<?php echo ($sl & 1)?"odd gradeX":"even gradeC" ?>">
                                    <td><?php echo $sl; ?></td>
                                    <td><img src="<?php echo (!empty($slider->image)?base_url($slider->image):base_url('assets_web/img/placeholder/banner_slider.png')); ?>" width="200" height="50"></td>
                                    <td><?php echo (($slider->status==1)?display('active'):display('inactive')); ?></td>

                                    <?php
                                    if($this->permission->method('slider','update')->access() || $this->permission->method('slider','delete')->access()){
                                    ?>

                                    <td class="center">
                                    <?php
                                    if($this->permission->method('slider','update')->access()){
                                    ?>
                                    <a href="<?php echo base_url("website/banner_sliders/edit/$slider->id") ?>" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a> 
                                    <?php } ?>

                                    <?php
                                    if($this->permission->method('slider','delete')->access()){
                                    ?>
                                    <a href="<?php echo base_url("website/banner_sliders/delete/$slider->id") ?>" onclick="return confirm('<?php echo display('are_you_sure') ?>')" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a> 
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