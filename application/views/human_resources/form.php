<div class="row">
    <div class="col-sm-12">
        <div  class="panel panel-default thumbnail">
        <?php
        if($this->permission->method('add_employee','create')->access()){
        ?>
            <div class="panel-body panel-form">
                <div class="row">
                    <div class="col-md-9 col-sm-12">
                        <?php echo form_open_multipart('human_resources/employee/form/'.$employee->user_id,'class="form-inner"') ?>
                            <?php echo form_hidden('user_id',$employee->user_id) ?>
                            <div class="form-group row">
                                <label for="user_role" class="col-xs-3 col-form-label"><?php echo display('user_role') ?>  <i class="text-danger">*</i></label>
                                <div class="col-xs-9"> 
                                    <select name='user_role' class="form-control" id="user_role" >
                                        <?php 
                                         foreach($userRoles as $r_data){
                                            ?>
                                              <option value="<?php echo $r_data->id?>"><?php echo $r_data->type; ?></option>
                                         <?php
                                         }
                                        ?>
                                    </select>
                                </div>
                            </div> 

                            <div class="form-group row">
                                <label for="firstname" class="col-xs-3 col-form-label"><?php echo display('first_name') ?> <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                    <input name="firstname" type="text" class="form-control" id="firstname" placeholder="<?php echo display('first_name') ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="lastname" class="col-xs-3 col-form-label"><?php echo display('last_name') ?> <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                    <input name="lastname" type="text" class="form-control" id="lastname" placeholder="<?php echo display('last_name') ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-xs-3 col-form-label"><?php echo display('email')?> <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                    <input name="email" class="form-control" type="text" placeholder="<?php echo display('email')?>" id="email">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-xs-3 col-form-label"><?php echo display('password') ?> <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                    <input name="password" class="form-control" type="password" placeholder="<?php echo display('password') ?>" id="password" >
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3"><?php echo display('gender') ?><i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                    <div class="form-check">
                                        <label class="radio-inline">
                                        <input type="radio" name="sex" value="Male"><?php echo display('male')?>
                                        </label>

                                        <label class="radio-inline">
                                        <input type="radio" name="sex" value="Female"><?php echo display('female')?>
                                        </label>

                                        <label class="radio-inline">
                                        <input type="radio" name="sex" value="Other"><?php echo display('others')?>
                                        </label>

                                    </div>
                                </div>
                            </div>

                             <div class="form-group row">
                                <label for="designation" class="col-xs-3 col-form-label"><?php echo display('designation') ?> <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                    <input name="designation" type="text" class="form-control" id="designation" placeholder="<?php echo display('designation') ?>" >
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="address" class="col-xs-3 col-form-label"><?php echo display('address') ?> <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                    <textarea name="address" class="form-control"  placeholder="<?php echo display('address') ?>" maxlength="140" rows="7" id="address"></textarea>
                                </div>
                            </div> 

                            <div class="form-group row">
                                <label for="phone" class="col-xs-3 col-form-label"><?php echo display('phone') ?> </label>
                                <div class="col-xs-9">
                                    <input name="phone" class="form-control" type="number" placeholder="<?php echo display('phone') ?>" id="phone" >
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="mobile" class="col-xs-3 col-form-label"><?php echo display('mobile') ?> <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                    <input name="mobile" class="form-control" type="number" placeholder="<?php echo display('mobile') ?>" id="mobile">
                                </div>
                            </div>

                             <div class="form-group row">
                                <label for="career_title" class="col-xs-3 col-form-label"><?php echo display('career_title') ?> <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                    <textarea name="career_title" class="form-control" placeholder="<?= display('career_title')?>" id="career_title" maxlength="255" rows="5"></textarea>
                                </div>
                            </div> 

                            <div class="form-group row">
                                <label for="short_biography" class="col-xs-3 col-form-label"><?php echo display('short_biography') ?></label>
                                <div class="col-xs-9">
                                    <textarea name="short_biography" class="tinymce form-control" placeholder="Address" id="short_biography" rows="7"></textarea>
                                </div>
                            </div> 

                            <div class="form-group row">
                                <label for="specialist" class="col-xs-3 col-form-label"><?php echo display('specialist') ?></label>
                                <div class="col-xs-9">
                                    <input type="text" name="specialist" class="form-control" placeholder="<?php echo display('specialist') ?>" id="specialist" >
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="degree" class="col-xs-3 col-form-label"><?php echo display('education_degree') ?></label>
                                <div class="col-xs-9">
                                    <textarea name="degree" class="tinymce form-control" placeholder="<?php echo display('education_degree') ?>" id="degree" maxlength="140" rows="7"></textarea>
                                </div>
                            </div> 

                            <!-- if employee picture is already uploaded -->
                            <div class="form-group row">
                                <label for="picture" class="col-xs-3 col-form-label"><?php echo display('picture') ?></label>
                                <div class="col-xs-9">
                                    <input type="file" name="picture" id="picture">
                                </div>
                            </div>
 
                            <div class="form-group row">
                                <label class="col-sm-3"><?php echo display('status') ?><i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                    <div class="form-check">
                                        <label class="radio-inline">
                                        <input type="radio" name="status" value="1"><?php echo display('active')?>
                                        </label>
                                        <label class="radio-inline">
                                        <input type="radio" name="status" value="0"><?php echo display('inactive')?>
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