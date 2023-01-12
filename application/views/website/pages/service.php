<div class="row">
    <!--  table area -->
    <div class="col-sm-12">
        <div  class="panel panel-default thumbnail">
        <?php
        if($this->permission->method('service','create')->access()){
        ?>
            <div class="panel-heading no-print">
                <div class="btn-group">
                    <a class="btn btn-success" href="<?php echo base_url("website/services/create") ?>"> <i class="fa fa-plus"></i>  <?php echo display('add_service') ?> </a>  
                </div>
            </div> 
            <?php } ?>


        <?php
        if($this->permission->method('service','read')->access() || $this->permission->method('service','update')->access() || $this->permission->method('service','delete')->access()){
        ?>
            <div class="panel-body">
                <!-- Nav tabs --> 
                <ul class="col-xs-12 nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"> 
                        <a href="#home" aria-controls="home" role="tab" data-toggle="tab"> <i class="fa fa-list"></i> <?php echo display('service')?></a>
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
                                            <th><?php echo display('language') ?></th>
                                            <th><?php echo display('picture') ?></th>
                                            <th><?php echo display('name') ?></th>
                                            <th><?php echo display('title') ?></th>
                                            <th><?php echo display('description') ?></th>
                                            <th><?php echo display('service_position') ?></th>
                                            <th><?php echo display('date') ?></th>
                                            <?php
                                             if($this->permission->method('service','update')->access() || $this->permission->method('service','delete')->access()){
                                            ?>
                                            <th><?php echo display('action') ?></th> 
                                            <?php } ?>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($services)) { ?>
                                            <?php $sl = 1; ?>
                                            <?php foreach ($services as $service) { ?>
                                                <tr class="<?php echo ($sl & 1)?"odd gradeX":"even gradeC" ?>">
                                                    <td><?php echo $sl; ?></td>
                                                    <td><?php echo $service->language; ?></td>
                                                    <td><img src="<?php echo (!empty($service->icon_image)?base_url($service->icon_image):base_url('assets_web/img/placeholder/services.png')); ?>" width="65" height="50"></td>
                                                    <td><?php echo $service->name; ?></td>
                                                    <td><?php echo $service->title; ?></td>
                                                    <td><?php echo character_limiter($service->description,100); ?></td>
                                                    <td><?php echo $service->position; ?></td>
                                                    <td><?php echo date('d, M Y',strtotime($service->date)); ?></td>

                                                    <?php
                                                    if($this->permission->method('service','update')->access() || $this->permission->method('service','delete')->access()){
                                                    ?>
                                                     <td class="center">
                                                        <?php
                                                        if($this->permission->method('service','update')->access()){
                                                        ?>
                                                            <a href="<?php echo base_url("website/services/create_language/$service->id") ?>" data-toggle="tooltip" data-placement="top" title="<?= display('content_language')?>" class="btn btn-xs btn-success"><i class="fa fa-plus"></i></a>
                                                            <a href="<?php echo base_url("website/services/edit/$service->id") ?>" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>
                                                        <?php } ?>

                                                        <?php
                                                        if($this->permission->method('service','delete')->access()){
                                                        ?>
                                                        <a href="<?php echo base_url("website/services/delete/$service->id") ?>" onclick="return confirm('<?php echo display('are_you_sure') ?>')" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a> 
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
                                            <th><?php echo display('language') ?></th>
                                            <th><?php echo display('picture') ?></th>
                                            <th><?php echo display('name') ?></th>
                                            <th><?php echo display('title') ?></th>
                                            <th><?php echo display('description') ?></th>
                                            <th><?php echo display('service_position') ?></th>
                                            <th><?php echo display('date') ?></th>
                                            <?php
                                             if($this->permission->method('service','update')->access() || $this->permission->method('service','delete')->access()){
                                            ?>
                                            <th><?php echo display('action') ?></th> 
                                            <?php } ?>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($languages)) { ?>
                                            <?php $sl = 1; ?>
                                            <?php foreach ($languages as $service) { ?>
                                                <tr class="<?php echo ($sl & 1)?"odd gradeX":"even gradeC" ?>">
                                                    <td><?php echo $sl; ?></td>
                                                    <td><?php echo $service->language; ?></td>
                                                    <td><img src="<?php echo (!empty($service->icon_image)?base_url($service->icon_image):base_url('assets_web/img/placeholder/services.png')); ?>" width="65" height="50"></td>
                                                    <td><?php echo $service->name; ?></td>
                                                    <td><?php echo $service->title; ?></td>
                                                    <td><?php echo character_limiter($service->description,100); ?></td>
                                                    <td><?php echo $service->position; ?></td>
                                                    <td><?php echo date('d, M Y',strtotime($service->date)); ?></td>

                                                    <?php
                                                    if($this->permission->method('service','update')->access() || $this->permission->method('service','delete')->access()){
                                                    ?>
                                                     <td class="center">
                                                        <?php
                                                        if($this->permission->method('service','update')->access()){
                                                        ?>
                                                            <a href="<?php echo base_url("website/services/edit_lang/$service->id") ?>" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>
                                                        <?php } ?>

                                                        <?php
                                                        if($this->permission->method('service','delete')->access()){
                                                        ?>
                                                        <a href="<?php echo base_url("website/services/delete/$service->id") ?>" onclick="return confirm('<?php echo display('are_you_sure') ?>')" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a> 
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