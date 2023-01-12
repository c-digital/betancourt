<div class="row">
    <!--  form area -->
    <div class="col-sm-12">

       <div  class="panel panel-default thumbnail">
       <?php
        if($this->permission->method('about','read')->access() || $this->permission->method('about','update')->access() || $this->permission->method('about','delete')->access()){
        ?>
            <div class="panel-heading no-print">
                <div class="btn-group"> 
                    <a class="btn btn-primary" href="<?php echo base_url("website/about/") ?>"> <i class="fa fa-list"></i>  <?php echo display('about') ?> </a>  
                </div>
            </div> 
        <?php } ?>

       <?php
        if($this->permission->method('about','create')->access()){
        ?>
            <div class="panel-body  panel-form"> 
                <div class="row">
                    <div class="col-md-9 col-sm-12">
 
                        <?= form_open_multipart('website/about/create','class="form-inner"') ?>
                            
                           <div class="form-group row">
                                <label for="language" class="col-sm-3"><?php echo display('content_language') ?> <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                    <div class="form-check">
                                        <?php foreach ($languageList as $value) {?>
                                        <label class="radio-inline">
                                            <?php echo form_radio('language', lcfirst($value),  (lcfirst($value)=='english')).' ' .$value;?>
                                        </label>
                                        <?php }?>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="title" class="col-xs-3 col-form-label"><?php echo display('title') ?> </label>
                                <div class="col-xs-9">
                                    <input name="title"  type="text" class="form-control" id="title" placeholder="<?php echo display('title') ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="description" class="col-xs-3 col-form-label"><?php echo display('description') ?></label>
                                <div class="col-xs-9">
                                    <textarea name="description" class="form-control tinymce"  placeholder="<?php echo display('description') ?>"  rows="7"></textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="quotation" class="col-xs-3 col-form-label"><?php echo display('quotation') ?> </label>
                                <div class="col-xs-9">
                                    <input name="quotation"  type="text" class="form-control" id="url" placeholder="<?php echo display('quotation') ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="author_name" class="col-xs-3 col-form-label"><?php echo display('author_name') ?> </label>
                                <div class="col-xs-9">
                                    <input name="author_name"  type="text" class="form-control" id="url" placeholder="<?php echo display('author_name') ?>">
                                </div>
                            </div>

                            <!-- if featured image is already uploaded -->
                            <?php if(!empty($about->image)) {  ?>
                            <div class="form-group row">
                                <label for="logoPreview" class="col-xs-3 col-form-label"></label>
                                <div class="col-xs-9">
                                    <img src="<?= base_url($about->image) ?>" alt="Logo" class="img-thumbnail" />
                                </div>
                            </div>
                            <?php } ?>

                            <div class="form-group row">
                                <label for="image" class="col-xs-3 col-form-label"><?php echo display('picture').' '?> <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                    <input name="image"  type="file" id="image" >
                                    <input type="hidden" name="old_image" value="<?= $about->image ?>">
                                </div>
                            </div>

                            <!-- if signature is already uploaded -->
                            <?php if(!empty($about->signature)) {  ?>
                            <div class="form-group row">
                                <label for="logoPreview" class="col-xs-3 col-form-label"></label>
                                <div class="col-xs-9">
                                    <img src="<?= base_url($about->signature) ?>" alt="Logo" class="img-thumbnail" />
                                </div>
                            </div>
                            <?php } ?>

                            <div class="form-group row">
                                <label for="signature" class="col-xs-3 col-form-label"><?php echo display('signature').' ' ?> <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                    <input name="signature"  type="file" id="signature" >
                                    <input type="hidden" name="old_signature" value="<?= $about->signature ?>">
                                </div>
                            </div>


                            <!--Radios-->
                            <div class="form-group row">
                                <label class="col-sm-3">Status</label>
                                <div class="col-xs-9"> 
                                    <div class="form-check">
                                        <label class="radio-inline">
                                            <input type="radio" name="status" value="1" <?= set_radio('status', '1', true); ?> >Active
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="status" value="0" <?= set_radio('status', '0'); ?> >Inactive
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