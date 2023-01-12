<div class="row">
    <?php
    if($this->permission->method('setting','read')->access() || $this->permission->method('setting','update')->access()){
    ?>
    <div class="col-sm-12">
       <div class="panel panel-default thumbnail"> 
            <?php
            if($this->permission->method('setting','read')->access()){
            ?>
                <div class="panel-heading no-print">
                    <div class="btn-group"> 
                        <a class="btn btn-primary" href="<?php echo base_url("website/setting/") ?>"> <i class="fa fa-list"></i>  <?php echo display('setting') ?> </a>  
                    </div>
                </div> 
            <?php } ?>
 
            <div class="panel-body  panel-form"> 
                <div class="row">
                    <div class="col-md-9 col-sm-12">
                        <?php echo form_open_multipart('website/setting/create/'.$setting->id,'class="form-inner"') ?>
                            <?php echo form_hidden('id',$setting->id) ?>
 
                            <div class="form-group row">
                                <label for="language" class="col-sm-3"><?php echo display('content_language') ?> <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                    <div class="form-check">
                                        <?php foreach ($languageList as $value) {?>
                                        <label class="radio-inline">
                                            <?php echo form_radio('language', lcfirst($value), (!empty($setting->language)?lcfirst($value)==$setting->language:lcfirst($value)=='english')).' ' .$value;?>
                                        </label>
                                        <?php }?>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="title" class="col-xs-3 col-form-label"><?php echo display('application_title') ?> <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                    <input name="title" type="text" class="form-control" id="title" placeholder="<?php echo display('application_title') ?>" value="<?php echo $setting->title ?>">
                                </div>
                            </div> 

                            <div class="form-group row">
                                <label for="description" class="col-xs-3 col-form-label"><?php echo display('description') ?></label>
                                <div class="col-xs-9">
                                    <textarea name="description" class="form-control"  placeholder="<?php echo display('description') ?>" rows="2"><?php echo $setting->description ?></textarea>
                                </div>
                            </div> 

                            <div class="form-group row">
                                <label for="meta_keyword" class="col-xs-3 col-form-label"><?php echo display('meta_keyword') ?></label>
                                <div class="col-xs-9">
                                    <textarea name="meta_keyword" class="form-control"  placeholder="<?php echo display('meta_keyword') ?>" rows="2"> <?php echo $setting->meta_keyword ?></textarea>
                                </div>
                            </div> 

                            <div class="form-group row">
                                <label for="meta_tag" class="col-xs-3 col-form-label"><?php echo display('meta_description') ?></label>
                                <div class="col-xs-9">
                                    <textarea name="meta_tag" class="form-control"  placeholder="<?php echo display('meta_description') ?>" rows="2"><?php echo $setting->meta_tag ?></textarea>
                                </div>
                            </div>                             

                            <div class="form-group row">
                                <label for="address" class="col-xs-3 col-form-label"><?php echo display('address') ?> <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                    <textarea name="address" class="form-control"  placeholder="<?php echo display('address') ?>" rows="2"><?php echo $setting->address ?></textarea>
                                </div>
                            </div>
 
                            <div class="form-group row">
                                <label for="phone" class="col-xs-3 col-form-label"><?php echo display('phone') ?> <i class="fa fa-exclamation-triangle" data-toggle="tooltip" data-placement="top" title="Number Separate by Comma"></i> <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                    <input name="phone" type="text" class="form-control" id="phone" placeholder="<?php echo display('phone') ?>"  value="<?php echo $setting->phone ?>" >
                                </div>
                            </div>

                             <div class="form-group row">
                                <label for="open_day" class="col-xs-3 col-form-label"><?php echo display('open_day') ?> <i class="fa fa-exclamation-triangle" data-toggle="tooltip" data-placement="top" title="MAX 30 character"></i> <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                    <input name="open_day" type="text" class="form-control" id="open_day" placeholder="<?php echo display('open_day') ?>"  value="<?php echo $setting->open_day ?>" >
                                </div>
                            </div>

                             <div class="form-group row">
                                <label for="closed_day" class="col-xs-3 col-form-label"><?php echo display('closed_day') ?> <i class="fa fa-exclamation-triangle" data-toggle="tooltip" data-placement="top" title="MAX 25 character"></i> <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                    <input name="closed_day" type="text" class="form-control" id="closed_day" placeholder="<?php echo display('closed_day') ?>"  value="<?php echo $setting->closed_day ?>" >
                                </div>
                            </div>

                             <div class="form-group row">
                                <label for="text" class="col-xs-3 col-form-label"><?php echo display('text') ?></label>
                                <div class="col-xs-9">
                                    <input name="text" type="text" class="form-control" id="text" placeholder="<?php echo display('text') ?>"  value="<?php echo $setting->text ?>" >
                                </div>
                            </div>

                             <div class="form-group row">
                                <label for="fax" class="col-xs-3 col-form-label"><?php echo display('fax') ?></label>
                                <div class="col-xs-9">
                                    <input name="fax" type="text" class="form-control" id="fax" placeholder="<?php echo display('fax') ?>"  value="<?php echo $setting->fax ?>" >
                                </div>
                            </div>

                             <div class="form-group row">
                                <label for="working_hours" class="col-xs-3 col-form-label"><?php echo display('working_hours') ?></label>
                                <div class="col-xs-9">
                                    <textarea name="working_hour" class="form-control"  placeholder="<?php echo display('working_hours') ?>" rows="7"><?php echo $setting->working_hour ?></textarea>
                                </div>
                            </div> 

                            <div class="form-group row">
                                <label for="copyright_text" class="col-xs-3 col-form-label"><?php echo display('copyright_text') ?></label>
                                <div class="col-xs-9">
                                    <textarea name="copyright_text" class="form-control tinymce"  placeholder="<?php echo display('copyright_text') ?>" rows="2"><?php echo $setting->copyright_text ?></textarea>
                                </div>
                            </div>  

                            <div class="form-group row">
                                <label class="col-sm-3"><?php echo display('website_status') ?></label>
                                <div class="col-xs-9">
                                    <div class="form-check">
                                        <label class="radio-inline">
                                        <input type="radio" name="status" value="1" checked><?php echo display('active') ?>
                                        </label>
                                        <label class="radio-inline">
                                        <input type="radio" name="status" value="0" ><?php echo display('inactive') ?>
                                        </label>
                                    </div>
                                </div>
                            </div>


                            <?php
                            if($this->permission->method('setting','update')->access()){
                            ?>
                            <div class="form-group row">
                                <div class="col-sm-offset-3 col-sm-6">
                                    <div class="ui buttons">
                                        <button type="reset" class="ui button"><?php echo display('reset') ?></button>
                                        <div class="or"></div>
                                        <button class="ui positive button"><?php echo display('save') ?></button>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        <?php echo form_close() ?>
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

     