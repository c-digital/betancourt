<div class="row">
    <!--  form area -->
    <div class="col-sm-12">

       <div  class="panel panel-default thumbnail">
       <?php
        if($this->permission->method('testimonial','read')->access() || $this->permission->method('testimonial','update')->access() || $this->permission->method('testimonial','delete')->access()){
        ?>
            <div class="panel-heading no-print">
                <div class="btn-group"> 
                    <a class="btn btn-primary" href="<?php echo base_url("website/testimonials/") ?>"> <i class="fa fa-list"></i>  <?php echo display('testimonial_list') ?> </a>  
                </div>
            </div> 
        <?php } ?>
  
       <?php
        if($this->permission->method('testimonial','create')->access()){
        ?>
            <div class="panel-body  panel-form"> 
                <div class="row">
                    <div class="col-md-9 col-sm-12">

                        <?= form_open_multipart('website/testimonials/create','class="form-inner"') ?>
                            
                            <input type="hidden" name="id" value="<?= $testimonial->id ?>">

                            <div class="form-group row">
                                <label for="author_name" class="col-xs-3 col-form-label"><?php echo display('author_name') ?></label>
                                <div class="col-xs-9">
                                    <input type="text" name="author_name" class="form-control"  placeholder="<?php echo display('author_name') ?>"  value="<?= $testimonial->author_name ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="url" class="col-xs-3 col-form-label"><?php echo display('url') ?> </label>
                                <div class="col-xs-9">
                                    <input name="url"  type="text" class="form-control" id="url" placeholder="<?php echo display('url') ?>" value="<?= $testimonial->url ?>">
                                </div>
                            </div>

                            <!-- if featured image is already uploaded -->
                            <?php if(!empty($testimonial->image)) {  ?>
                            <div class="form-group row">
                                <label for="logoPreview" class="col-xs-3 col-form-label"></label>
                                <div class="col-xs-9">
                                    <img src="<?= base_url($testimonial->image) ?>" alt="Logo" class="img-thumbnail" />
                                </div>
                            </div>
                            <?php } ?>

                            <div class="form-group row">
                                <label for="image" class="col-xs-3 col-form-label"><?php echo display('picture')?> <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                    <input name="image"  type="file" id="image" >
                                    <input type="hidden" name="old_image" value="<?= $testimonial->image ?>">
                                </div>
                            </div>

                            <!--Radios-->
                            <div class="form-group row">
                                <label class="col-sm-3">Status</label>
                                <div class="col-xs-9"> 
                                    <div class="form-check">
                                        <label class="radio-inline">
                                            <input type="radio" name="status" value="1" <?= set_radio('status', '1'); ?> >Active
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="status" value="0" <?= set_radio('status', '0', true); ?> >Inactive
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