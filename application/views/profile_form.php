<div class="row">
    <div class="col-sm-12">
        <div  class="panel panel-default thumbnail">
            <div class="panel-heading no-print">
                <div class="btn-group"> 
                    <?php
                     if($this->permission->method('profile','read')->access() || $this->permission->method('profile','update')->access()){
                    ?>
                    <a class="btn btn-primary" href="<?php echo base_url("dashboard/profile") ?>"> <i class="fa fa-list"></i>  <?php echo display('profile') ?> </a>  
                    <?php } ?>
                </div>
            </div>

       <?php
       if($this->permission->method('edit_profile','update')->access()){
       ?>
        <div class="panel-body panel-form">
            <div class="row">
                <div class="col-md-9 col-sm-12">
                    <?php echo form_open_multipart('dashboard/form/','class="form-inner"') ?> 
                        <?php echo form_hidden('user_id',$doctor->user_id) ?>
                            <div class="form-group row">
                                <label for="firstname" class="col-xs-3 col-form-label"><?php echo display('first_name') ?> <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                    <input name="firstname" type="text" class="form-control" id="firstname" placeholder="<?php echo display('first_name') ?>" value="<?php echo $doctor->firstname ?>" >
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="lastname" class="col-xs-3 col-form-label"><?php echo display('last_name') ?> <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                    <input name="lastname" type="text" class="form-control" id="lastname" placeholder="<?php echo display('last_name') ?>" value="<?php echo $doctor->lastname ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-xs-3 col-form-label"><?php echo display('email')?> <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                    <input name="email" class="form-control" type="text" placeholder="<?php echo display('email')?>" id="email"  value="<?php echo $doctor->email ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-xs-3 col-form-label"><?php echo display('password') ?> <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                    <input name="password" class="form-control" type="password" placeholder="<?php echo display('password') ?>" id="password" >
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3"><?php echo display('sex') ?></label>
                                <div class="col-xs-9">
                                    <div class="form-check">
                                        <label class="radio-inline">
                                        <input type="radio" name="sex" value="Male" <?php echo  set_radio('sex', 'Male', TRUE); ?> ><?php echo display('male') ?>
                                        </label>
                                        <label class="radio-inline">
                                        <input type="radio" name="sex" value="Female" <?php echo  set_radio('sex', 'Female'); ?> ><?php echo display('female') ?>
                                        </label>
                                        <label class="radio-inline">
                                        <input type="radio" name="sex" value="Other" <?php echo  set_radio('sex', 'Other'); ?> ><?php echo display('other') ?>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <!-- if employee picture is already uploaded -->
                            <?php if(!empty($doctor->picture)) {  ?>
                            <div class="form-group row">
                                <label for="picturePreview" class="col-xs-3 col-form-label"></label>
                                <div class="col-xs-9">
                                    <img src="<?php echo base_url($doctor->picture) ?>" alt="Picture" class="img-thumbnail" />
                                </div>
                            </div>
                            <?php } ?>

                            <div class="form-group row">
                                <label for="picture" class="col-xs-3 col-form-label"><?php echo display('picture') ?></label>
                                <div class="col-xs-9">
                                    <input type="file" name="picture" id="picture" value="<?php echo $doctor->picture ?>">
                                    <input type="hidden" name="old_picture" value="<?php echo $doctor->picture ?>">
                                </div>
                            </div>

                             <div class="form-group row">
                                <label for="vacation" class="col-xs-3 col-form-label"><?php echo display('vacation') ?> </label>
                                <div class="col-xs-9">
                                    <input name="vacation" class="form-control" type="text" placeholder="<?php echo display('vacation') ?>" id="vacation"  value="<?php echo $doctor->vacation ?>">
                                </div> 
                            </div>
                            <div class="form-group row">
                                <label for="facebook" class="col-xs-3 col-form-label"><?php echo display('facebook_url') ?></label>
                                <div class="col-xs-9">
                                    <input name="facebook" type="text" class="form-control" id="facebook" placeholder="http://facebook/"  value="<?php echo $doctor->facebook ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="twitter" class="col-xs-3 col-form-label"><?php echo display('twitter_url') ?></label>
                                <div class="col-xs-9">
                                    <input name="twitter" type="text" class="form-control" id="twitter" placeholder="http://twitter.com/"  value="<?php echo $doctor->twitter ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="youtube" class="col-xs-3 col-form-label"><?php echo display('youtube_url') ?></label>
                                <div class="col-xs-9">
                                    <input name="youtube" type="text" class="form-control" id="youtube" placeholder="http://youtube.com/"  value="<?php echo $doctor->youtube ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="dribbble" class="col-xs-3 col-form-label"><?php echo display('dribbble_url') ?></label>
                                <div class="col-xs-9">
                                    <input name="dribbble" type="text" class="form-control" id="dribbble" placeholder="http://dribbble.com/"  value="<?php echo $doctor->dribbble ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="behance" class="col-xs-3 col-form-label"><?php echo display('behance_url') ?></label>
                                <div class="col-xs-9">
                                    <input name="behance" type="text" class="form-control" id="behance" placeholder="http://behance.com/"  value="<?php echo $doctor->behance ?>">
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
                        <?php echo form_close() ?>
                    </div>
                    <div class="col-md-3"></div>
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

 