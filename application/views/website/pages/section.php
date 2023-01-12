<div class="row">
    <!--  table area -->
    <div class="col-sm-12">
        <div  class="panel panel-default thumbnail">
        <?php
        if($this->permission->method('section','create')->access()){
        ?>
            <div class="panel-heading">
                <a href="<?= base_url('website/section/create') ?>" class="btn btn-success"><i class="fa fa-plus"></i> <?php echo display('new_section') ?></a>
            </div>
            <?php } ?>


        <?php
        if($this->permission->method('section','read')->access() || $this->permission->method('section','update')->access() || $this->permission->method('section','delete')->access()){
        ?>
            <div class="panel-body">
                <!-- Nav tabs --> 
                <ul class="col-xs-12 nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"> 
                        <a href="#home" aria-controls="home" role="tab" data-toggle="tab"> <i class="fa fa-list"></i> <?php echo display('section') ?></a>
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
                                            <th><?php echo display('section_name') ?></th>
                                            
                                             <?php
                                            if($this->permission->method('section','update')->access() || $this->permission->method('section','delete')->access()){
                                            ?>
                                            <th><?php echo display('action') ?></th> 
                                            <?php } ?>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($sections)) { ?>
                                            <?php $sl = 1; ?>
                                            <?php foreach ($sections as $section) { ?>
                                                <tr class="<?php echo ($sl & 1)?"odd gradeX":"even gradeC" ?>">
                                                    <td><?php echo $sl; ?></td>
                                                    <td><?php echo $section->name; ?></td>

                                                    <?php
                                                    if($this->permission->method('section','update')->access() || $this->permission->method('section','delete')->access()){
                                                    ?>
                                                    <td class="center">
                                                        <?php
                                                        if($this->permission->method('section','update')->access()){
                                                        ?>
                                                            <a href="<?php echo base_url("website/section/create_language/$section->id") ?>" class="btn btn-xs btn-success"><i class="fa fa-plus"></i></a> 
                                                            <a href="<?php echo base_url("website/section/edit/$section->id") ?>" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a> 
                                                        <?php } ?>


                                                        <?php
                                                        if($this->permission->method('section','delete')->access()){
                                                        ?>
                                                       <a href="<?php echo base_url("website/section/delete/$section->id") ?>" onclick="return confirm('<?php echo display('are_you_sure') ?>')" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a> 
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
                                            <th><?php echo display('section_name') ?></th>
                                            <th><?php echo display('language') ?></th>
                                            <th><?php echo display('title') ?></th>
                                            <th><?php echo display('description') ?></th>
                                             <?php
                                            if($this->permission->method('section','update')->access() || $this->permission->method('section','delete')->access()){
                                            ?>
                                            <th><?php echo display('action') ?></th> 
                                            <?php } ?>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($languages)) { ?>
                                            <?php $sl = 1; ?>
                                            <?php foreach ($languages as $section) { ?>
                                                <tr class="<?php echo ($sl & 1)?"odd gradeX":"even gradeC" ?>">
                                                    <td><?php echo $sl; ?></td>
                                                    <td><?php echo $section->name; ?></td>
                                                    <td><?php echo $section->language; ?></td>
                                                    <td><?php echo $section->title; ?></td>
                                                    <td><?php echo character_limiter($section->description, 120); ?></td>

                                                    <?php
                                                    if($this->permission->method('section','update')->access() || $this->permission->method('section','delete')->access()){
                                                    ?>
                                                    <td class="center">
                                                        <?php
                                                        if($this->permission->method('section','update')->access()){
                                                        ?>
                                                            <a href="<?php echo base_url("website/section/edit_lang/$section->id") ?>" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a> 
                                                        <?php } ?>


                                                        <?php
                                                        if($this->permission->method('section','delete')->access()){
                                                        ?>
                                                       <a href="<?php echo base_url("website/section/delete_lang/$section->id") ?>" onclick="return confirm('<?php echo display('are_you_sure') ?>')" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a> 
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


