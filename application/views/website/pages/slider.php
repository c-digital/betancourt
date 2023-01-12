<div class="row">
    <div class="col-sm-12">
        <div  class="panel panel-default thumbnail">
        <?php
        if($this->permission->method('slider','create')->access()){
        ?>
            <div class="panel-heading">
                <a href="<?= base_url('website/slider/create') ?>" class="btn btn-success"><i class="fa fa-plus"></i> <?php echo display('new_slide') ?></a>
            </div>
        <?php } ?>

        <?php
        if($this->permission->method('slider','read')->access() || $this->permission->method('slider','update')->access() || $this->permission->method('slider','delete')->access()){
        ?>
            <div class="panel-body">
                <!-- Nav tabs --> 
                <ul class="col-xs-12 nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"> 
                        <a href="#home" aria-controls="home" role="tab" data-toggle="tab"> <i class="fa fa-list"></i> <?php echo display('slider') ?></a>
                    </li>
                    <li role="presentation">
                        <a href="#language" aria-controls="language" role="tab" data-toggle="tab"> <i class="fa fa-list"></i> <?php echo display('language') ?></a>
                    </li>
                </ul>  

                <!-- Tab panes --> 
                <div class="col-xs-12 tab-content">
                    <br>
                    <!-- INFORMATION -->
                    <div role="tabpanel" class="tab-pane active" id="home">
                        <div class="row">
                            <div class="col-md-12"> 
                                <table width="100%" class="datatable table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th><?php echo display('serial') ?></th>
                                            <th><?php echo display('picture') ?></th>
                                            <th><?php echo display('title') ?></th>
                                            <th><?php echo display('slide_position') ?></th>
                                            <th><?php echo display('status') ?></th>
                                            <?php
                                            if($this->permission->method('slider','update')->access() || $this->permission->method('slider','delete')->access()){
                                            ?>
                                            <th><?php echo display('action') ?></th>
                                            <?php } ?>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($sliders)) { ?>
                                            <?php $sl = 1; ?>
                                            <?php foreach ($sliders as $slider) { ?>
                                                <tr class="<?php echo ($sl & 1)?"odd gradeX":"even gradeC" ?>">
                                                    <td><?php echo $sl; ?></td>
                                                    <td><img src="<?php echo (!empty($slider->image)?base_url($slider->image):base_url('assets_web/img/placeholder/slider.png')); ?>" width="65" height="50"></td>
                                                    <td><?php echo $slider->title; ?></td>
                                                    <td><?php echo $slider->position; ?></td>
                                                    <td><?php echo (($slider->status==1)?display('active'):display('inactive')); ?></td>

                                                    <?php
                                                    if($this->permission->method('slider','update')->access() || $this->permission->method('slider','delete')->access()){
                                                    ?>

                                                    <td class="center">
                                                    <?php
                                                    if($this->permission->method('slider','update')->access()){
                                                    ?>
                                                        <a href="<?php echo base_url("website/slider/create_language/$slider->id") ?>" class="btn btn-xs btn-success"><i class="fa fa-plus"></i></a> 
                                                        <a href="<?php echo base_url("website/slider/edit/$slider->id") ?>" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a> 
                                                    <?php } ?>

                                                    <?php
                                                    if($this->permission->method('slider','delete')->access()){
                                                    ?>
                                                       <a href="<?php echo base_url("website/slider/delete/$slider->id") ?>" onclick="return confirm('<?php echo display('are_you_sure') ?>')" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a> 
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
                        </div>
                    </div> 

                    <div role="tabpanel" class="tab-pane" id="language">
                        <div class="row">
                            <div class="col-sm-12">
                                <table width="100%" class="datatable table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th><?php echo display('serial') ?></th>
                                            <th><?php echo display('slider').' '.display('title') ?></th>
                                            <th><?php echo display('language') ?></th>
                                            <th><?php echo display('title') ?></th>
                                            <th><?php echo display('subtitle') ?></th>
                                            <th><?php echo display('description') ?></th>
                                            <?php
                                            if($this->permission->method('slider','update')->access() || $this->permission->method('slider','delete')->access()){
                                            ?>
                                            <th><?php echo display('action') ?></th>
                                            <?php } ?>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($slideLang)) { ?>
                                            <?php $sl = 1; ?>
                                            <?php foreach ($slideLang as $slider) { ?>
                                                <tr class="<?php echo ($sl & 1)?"odd gradeX":"even gradeC" ?>">
                                                    <td><?php echo $sl; ?></td>
                                                    <td><?php echo $slider->sliderTitle; ?></td>
                                                    <td><?php echo $slider->language; ?></td>
                                                    <td><?php echo $slider->title; ?></td>
                                                    <td><?php echo $slider->subtitle; ?></td>
                                                    <td><?php echo character_limiter(strip_tags($slider->description),70); ?></td>

                                                    <?php
                                                    if($this->permission->method('slider','update')->access() || $this->permission->method('slider','delete')->access()){
                                                    ?>

                                                    <td class="center">
                                                    <?php
                                                    if($this->permission->method('slider','update')->access()){
                                                    ?>
                                                        <a href="<?php echo base_url("website/slider/edit_lang/$slider->id") ?>" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a> 
                                                    <?php } ?>

                                                    <?php
                                                    if($this->permission->method('slider','delete')->access()){
                                                    ?>
                                                       <a href="<?php echo base_url("website/slider/delete_lang/$slider->id") ?>" onclick="return confirm('<?php echo display('are_you_sure') ?>')" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a> 
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
                        </div>
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