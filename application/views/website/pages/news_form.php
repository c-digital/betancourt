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
 
                        <?= form_open_multipart('website/news/create','class="form-inner"') ?>
                            
                            <input type="hidden" name="id" value="<?= $new->id ?>">

                            <div class="form-group row">
                                <label for="department_name" class="col-xs-3 col-form-label"><?php echo display('department_name') ?> <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                    <?= form_dropdown('dept_id',$department_list, $new->dept_id,'class="form-control" id="dept_id" ') ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="title" class="col-xs-3 col-form-label"><?php echo display('title') ?> <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                    <input name="title"  type="text" class="form-control" id="title" placeholder="<?php echo display('title') ?>" value="<?= $new->title ?>">
                                </div>
                            </div>

                            <?php if(empty($new->id)) {  ?>
                             <div class="form-group row">
                                <label for="description" class="col-xs-3 col-form-label"><?php echo display('description') ?> <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                    <textarea name="description" class="tinymce form-control"  placeholder="<?php echo display('description') ?>" rows="7"></textarea>
                                </div>
                            </div>
                            <?php }?>
                            <!-- if featured image is already uploaded -->
                            <?php if(!empty($new->featured_image)) {  ?>
                            <div class="form-group row">
                                <label for="logoPreview" class="col-xs-3 col-form-label"></label>
                                <div class="col-xs-9">
                                    <img src="<?= base_url($new->featured_image) ?>" alt="Logo" class="img-thumbnail" />
                                </div>
                            </div>
                            <?php } ?>

                            <div class="form-group row">
                                <label for="featured_image" class="col-xs-3 col-form-label"><?php echo display('featured_image') ?> <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                    <input name="featured_image"  type="file" id="featured_image" >
                                    <input type="hidden" name="old_image" value="<?= $new->featured_image ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="create_date" class="col-xs-3 col-form-label"><?php echo display('create_date') ?> <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                    <input name="create_date" class="datepicker form-control" type="text" value="<?php echo $new->create_date ?>" >
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