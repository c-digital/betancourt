<div class="row">
    <!--  form area -->
    <div class="col-sm-12"> 

       <div  class="panel panel-default thumbnail">
        <?php
        if($this->permission->method('news','read')->access() || $this->permission->method('news','update')->access() || $this->permission->method('news','delete')->access()){
        ?>
        <div class="panel-heading no-print">
            <div class="btn-group"> 
                <a class="btn btn-primary" href="<?php echo base_url("website/news/") ?>"> <i class="fa fa-list"></i>  <?php echo display('news_list') ?> </a>  
            </div>
        </div> 
        <?php } ?>


        <?php
        if($this->permission->method('news','create')->access()){
        ?>
            <div class="panel-body  panel-form">
                <div class="row">
                    <div class="col-md-9 col-sm-12">

                        <?= form_open_multipart('website/news/add_lang/'.$new->id,'class="form-inner"') ?>
                           <?= form_hidden('id', $new->id)?>
                           <?= form_hidden('news_id', $new->news_id)?>


                           <div class="form-group row">
                                <label for="language" class="col-sm-3"><?php echo display('content_language') ?> <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                    <div class="form-check">
                                        <?php foreach ($languageList as $value) {?>
                                        <label class="radio-inline">
                                            <?php echo form_radio('language', lcfirst($value), (!empty($new->language)?lcfirst($value)==$new->language:lcfirst($value)=='english')).' ' .$value;?>
                                        </label>
                                        <?php }?>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="title" class="col-xs-3 col-form-label"><?php echo display('title') ?> <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                    <input name="title"  type="text" class="form-control" id="title" value="<?= $new->title;?>" placeholder="<?php echo display('title') ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="description" class="col-xs-3 col-form-label"><?php echo display('description') ?> <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                    <textarea name="description" class="tinymce form-control"  placeholder="<?php echo display('description') ?>" rows="7"><?= $new->description;?></textarea>
                                </div>
                            </div>

                            <!-- if featured image is already uploaded -->
                            <?php if(!empty($new->featured_image)) {  ?>
                            <div class="form-group row">
                                <label for="featured_image" class="col-xs-3 col-form-label"><?php echo display('featured_image') ?></label>
                                <div class="col-xs-9">
                                    <img src="<?= base_url($new->featured_image) ?>" alt="Logo" class="img-thumbnail" />
                                </div>
                            </div>
                            <?php } ?>


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