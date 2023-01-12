<div class="row">
    <div class="col-sm-12">
        <div  class="panel panel-default thumbnail">
            
           <?php
            if($this->permission->method('profile','read')->access()){ 
            ?>
            <div class="panel-heading no-print">
                <div class="btn-group"> 
                    <?php
                     if($this->permission->method('profile','update')->access()){
                    ?> 
                    <a href="<?php echo base_url('dashboard/form/') ?>" class="btn btn-primary"><i class="fa fa-edit"></i></a> 
                    <a href="<?php echo base_url('dashboard/profile_languages/') ?>" class="btn btn-success"><i class="fa fa-list"></i> <?php echo display('language') ?></a> 
                    <?php } ?>
                </div>
            </div> 
            <?php } ?>


            <?php
            if($this->permission->method('profile','update')->access()){
            ?>
            <div class="panel-body panel-form">
                <div class="row">
                    <div class="col-md-9 col-sm-12">
                        <?php echo form_open('dashboard/update_language/','class="form-inner"') ?> 

                            <?php echo form_hidden('user_id',$user->user_id) ?>
                            <?php echo form_hidden('id',$user->id) ?>
 
                            <div class="form-group row">
                                <label for="language" class="col-sm-3"><?php echo display('content_language') ?> <i class="text-danger">*</i></label></label>
                                <div class="col-xs-9">
                                    <div class="form-check">
                                        <?php foreach ($languageList as $value) {?>
                                        <label class="radio-inline">
                                            <?php echo form_radio('language', lcfirst($value),  (lcfirst($value)==$user->language)).' ' .$value;?>
                                        </label>
                                        <?php }?>
                                    </div>
                                </div>
                            </div>

                             <div class="form-group row">
                                <label for="firstname" class="col-xs-3 col-form-label"><?php echo display('first_name')?> <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                    <input name="firstname" type="text" class="form-control" id="firstname" placeholder="<?php echo display('first_name')?>" value="<?php echo $user->firstname ?>" >
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="lastname" class="col-xs-3 col-form-label"><?php echo display('last_name') ?> <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                    <input name="lastname" type="text" class="form-control" id="lastname" placeholder="<?php echo display('last_name') ?>" value="<?php echo $user->lastname ?>" >
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="designation" class="col-xs-3 col-form-label"><?php echo display('designation') ?> <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                    <input name="designation" type="text" class="form-control" id="designation" placeholder="<?php echo display('designation') ?>" value="<?php echo $user->designation ?>" >
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="address" class="col-xs-3 col-form-label"><?php echo display('address') ?> <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                    <textarea name="address" class="form-control"  placeholder="<?php echo display('address') ?>" maxlength="140" rows="7" id="address"><?php echo $user->address ?></textarea>
                                </div>
                            </div> 

                            <div class="form-group row">
                                <label for="phone" class="col-xs-3 col-form-label"><?php echo display('phone') ?> </label>
                                <div class="col-xs-9">
                                    <input name="phone" class="form-control" type="text" placeholder="<?php echo display('phone') ?>" id="phone" value="<?php echo $user->phone ?>" >
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="mobile" class="col-xs-3 col-form-label"><?php echo display('mobile') ?> <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                    <input name="mobile" class="form-control" type="text" placeholder="<?php echo display('mobile') ?>" id="mobile" value="<?php echo $user->mobile ?>" >
                                </div>
                            </div>

                             <div class="form-group row">
                                <label for="career_title" class="col-xs-3 col-form-label"><?php echo display('career_title') ?> <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                    <textarea name="career_title" class="form-control" placeholder="<?= display('career_title')?>" id="career_title" maxlength="255" rows="5"><?php echo $user->career_title ?></textarea>
                                </div>
                            </div> 

                            <div class="form-group row">
                                <label for="short_biography" class="col-xs-3 col-form-label"><?php echo display('short_biography') ?></label>
                                <div class="col-xs-9">
                                    <textarea name="short_biography" class="tinymce form-control" placeholder="Address" id="short_biography" rows="7"><?php echo $user->short_biography ?></textarea>
                                </div>
                            </div> 

                            <div class="form-group row">
                                <label for="specialist" class="col-xs-3 col-form-label"><?php echo display('specialist') ?></label>
                                <div class="col-xs-9">
                                    <input type="text" name="specialist" class="form-control" placeholder="<?php echo display('specialist') ?>" id="specialist" value="<?php echo $user->specialist ?>" >
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="degree" class="col-xs-3 col-form-label"><?php echo display('education_degree') ?></label>
                                <div class="col-xs-9">
                                    <textarea name="degree" class="tinymce form-control" placeholder="<?php echo display('education_degree') ?>" id="degree" maxlength="140" rows="7"><?php echo $user->degree ?></textarea>
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
                        </form>
                    </div>
                    <div class="col-md-3"></div>
                </div>
            </div>
            <?php 
            }
            else{
                ?>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="panel panel-bd lobidrag">
                            <div class="panel-heading">
                                <div class="panel-title">
                                  <h4><?php echo display('you_do_not_have_permission_to_access_please_contact_with_administrator');?>.</h4>
                                </div>
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
