<div class="row">
    <div class="col-sm-12">
        <div  class="panel panel-default thumbnail">
        <?php
        if($this->permission->method('testimonial','create')->access()){
        ?>
            <div class="panel-heading">
                <a href="<?= base_url('website/testimonials/create') ?>" class="btn btn-success"><i class="fa fa-plus"></i> <?php echo display('add_testimonial') ?></a>
            </div>
        <?php } ?>

        <?php
        if($this->permission->method('testimonial','read')->access() || $this->permission->method('testimonial','update')->access() || $this->permission->method('testimonial','delete')->access()){
        ?>
            <div class="panel-body">
                <!-- Nav tabs --> 
                <ul class="col-xs-12 nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"> 
                        <a href="#home" aria-controls="home" role="tab" data-toggle="tab"> <i class="fa fa-list"></i> <?php echo display('testimonial_list') ?></a>
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
                                            <th><?php echo display('author_name') ?></th>
                                            <th><?php echo display('url') ?></th>
                                            <th><?php echo display('status') ?></th>
                                            <?php
                                            if($this->permission->method('testimonial','update')->access() || $this->permission->method('testimonial','delete')->access()){
                                            ?>
                                            <th><?php echo display('action') ?></th>
                                            <?php } ?>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($testimonials)) { ?>
                                            <?php $sl = 1; ?>
                                            <?php foreach ($testimonials as $testimonial) { ?>
                                                <tr class="<?php echo ($sl & 1)?"odd gradeX":"even gradeC" ?>">
                                                    <td><?php echo $sl; ?></td>
                                                    <td><img src="<?php echo (!empty($testimonial->image)?base_url($testimonial->image):base_url('assets_web/img/placeholder/profile.png')); ?>" width="65" height="50"></td>
                                                    <td><?php echo $testimonial->author_name; ?></td>
                                                    <td><?php echo $testimonial->url; ?></td>
                                                    <td><?php echo (($testimonial->status==1)?display('active'):display('inactive')); ?></td>

                                                    <?php
                                                    if($this->permission->method('testimonial','update')->access() || $this->permission->method('testimonial','delete')->access()){
                                                    ?>

                                                    <td class="center">
                                                    <?php
                                                    if($this->permission->method('testimonial','update')->access()){
                                                    ?>
                                                    <a href="<?php echo base_url("website/testimonials/create_language/$testimonial->id") ?>" class="btn btn-xs btn-success"><i class="fa fa-plus"></i></a> 
                                                    <a href="<?php echo base_url("website/testimonials/edit/$testimonial->id") ?>" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a> 
                                                    <?php } ?>

                                                    <?php
                                                    if($this->permission->method('testimonial','delete')->access()){
                                                    ?>
                                                    <a href="<?php echo base_url("website/testimonials/delete/$testimonial->id") ?>" onclick="return confirm('<?php echo display('are_you_sure') ?>')" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a> 
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
                                            <th><?php echo display('author_name') ?></th>
                                            <th><?php echo display('language') ?></th>
                                             <th><?php echo display('author_name') ?></th>
                                            <th><?php echo display('title') ?></th>
                                            <th><?php echo display('quotation') ?></th>
                                            <?php
                                            if($this->permission->method('testimonial','update')->access() || $this->permission->method('testimonial','delete')->access()){
                                            ?>
                                            <th><?php echo display('action') ?></th>
                                            <?php } ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($languages)) { ?>
                                            <?php $sl = 1; ?>
                                            <?php foreach ($languages as $testimonial) { ?>
                                                <tr class="<?php echo ($sl & 1)?"odd gradeX":"even gradeC" ?>">
                                                    <td><?php echo $sl; ?></td>
                                                    <td><?php echo $testimonial->author; ?></td>
                                                    <td><?php echo $testimonial->language; ?></td>
                                                     <td><?php echo $testimonial->author_name; ?></td>
                                                    <td><?php echo $testimonial->title; ?></td>
                                                    <td><?php echo character_limiter(strip_tags($testimonial->quotation),70); ?></td>

                                                    <?php
                                                    if($this->permission->method('testimonial','update')->access() || $this->permission->method('testimonial','delete')->access()){
                                                    ?>

                                                    <td class="center">
                                                    <?php
                                                    if($this->permission->method('testimonial','update')->access()){
                                                    ?>
                                                    <a href="<?php echo base_url("website/testimonials/edit_lang/$testimonial->id") ?>" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a> 
                                                    <?php } ?>

                                                    <?php
                                                    if($this->permission->method('testimonial','delete')->access()){
                                                    ?>
                                                    <a href="<?php echo base_url("website/testimonials/delete_lang/$testimonial->id") ?>" onclick="return confirm('<?php echo display('are_you_sure') ?>')" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a> 
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