<div class="row">
    <!--  form area -->
    <div class="col-sm-12">
        <div  class="panel panel-default thumbnail">
          <?php
          if($this->permission->method('service','read')->access() || $this->permission->method('service','update')->access() || $this->permission->method('service','delete')->access()){
          ?>
            <div class="panel-heading no-print">
                <div class="btn-group"> 
                    <a class="btn btn-primary" href="<?php echo base_url("website/services/") ?>"> <i class="fa fa-list"></i>  <?php echo display('service_list') ?> </a>  
                </div>
            </div> 
            <?php } ?>


        <?php
        if($this->permission->method('service','create')->access()){
        ?>
            <div class="panel-body panel-form">
                <div class="row">
                    <div class="col-md-9 col-sm-12">

                        <?= form_open_multipart('website/services/create_language/'.$service->id,'class="form-inner"') ?>
                            
                            <?= form_hidden('id', $service->id)?>
                            <?= form_hidden('service_id', $service->is_parent)?>

                            <div class="form-group row">
                                <label for="language" class="col-sm-3"><?php echo display('content_language') ?> <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                    <div class="form-check">
                                        <?php foreach ($languageList as $value) {?>
                                        <label class="radio-inline">
                                            <?php echo form_radio('language', lcfirst($value), (!empty($service->language)?lcfirst($value)==$service->language:lcfirst($value)=='english')).' ' .$value;?>
                                        </label>
                                        <?php }?>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-xs-3 col-form-label"><?php echo display('name') ?> <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                    <input name="name"  type="text" class="form-control" id="name" placeholder="<?php echo display('name') ?>" value="<?= $service->name;?>">
                                </div>
                            </div>

                            <!-- if icon_image is already uploaded -->
                            <?php if(!empty($service->icon_image)) {  ?>
                            <div class="form-group row">
                                <label for="logoPreview" class="col-xs-3 col-form-label"></label>
                                <div class="col-xs-9">
                                    <img src="<?= base_url($service->icon_image) ?>" alt="Logo" class="img-thumbnail" />
                                </div>
                            </div>
                            <?php } ?>

                            <div class="form-group row">
                                <label for="picture" class="col-xs-3 col-form-label"><?php echo display('picture') ?></label>
                                <div class="col-xs-9">
                                    <input name="icon_image"  type="file" id="icon_image" >
                                    <input type="hidden" name="old_image" value="<?= $service->icon_image ?>">
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="title" class="col-xs-3 col-form-label"><?php echo display('title') ?>  <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                    <input name="title"  type="text" class="form-control" id="title" placeholder="<?php echo display('title') ?>" value="<?= $service->title;?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="description" class="col-xs-3 col-form-label"><?php echo display('description') ?>  <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                    <textarea name="description" id="description" class="form-control tinymce"  placeholder="<?php echo display('description') ?>" maxlength="140" rows="7"><?= $service->description;?></textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="position" class="col-xs-3 col-form-label"><?php echo display('service_position') ?></label>
                                <div class="col-xs-9">
                                    <input name="position"  type="text" class="form-control" id="position" placeholder="<?php echo display('service_position') ?>" value="<?= $service->position ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3"><?php echo display('status') ?></label>
                                <div class="col-xs-9">
                                    <div class="form-check">
                                        <label class="radio-inline">
                                        <input type="radio" name="status" value="1" <?php echo  set_radio('status', '1', TRUE); ?> ><?php echo display('active') ?>
                                        </label>
                                        <label class="radio-inline">
                                        <input type="radio" name="status" value="0" <?php echo  set_radio('status', '0'); ?> ><?php echo display('inactive') ?>
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

                        <?= form_close() ?>

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
 
