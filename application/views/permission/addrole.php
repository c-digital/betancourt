<div class="row">
    <div class="col-sm-12">
        <div  class="panel panel-default thumbnail">
       <?php
        if($this->permission->method('add_role','create')->access()){
        ?>
            <div class="panel-body panel-form">
                <div class="row">
                    <div class="col-md-9 col-sm-12">
                        <?php echo form_open_multipart('permission_assign/create','class="form-inner"') ?> 

                            <div class="form-group row">
                                <label for="lastname" class="col-xs-3 col-form-label"><?php echo display('role_name') ?> <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                    <input name="type" type="text" class="form-control" id="lastname" placeholder="<?php echo display('role_name') ?>">
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
            <div class="panel panel-bd lobidrag">
              <div class="panel-heading">
                <div class="panel-title">
                    <h4><?php echo display('you_do_not_have_permission_to_access_please_contact_with_administrator');?>.</h4>
                </div>
              </div>
            </div>
            <?php
            }
            ?>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-sm-12">
        <div  class="panel panel-default thumbnail">
        <?php
        if($this->permission->method('add_role','read')->access() || $this->permission->method('add_role','update')->access() || $this->permission->method('add_role','delete')->access()){
        ?>
            <div class="panel-body">
                <table class="datatable table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th><?php echo display('serial') ?></th>
                            <th><?php echo display('role_list') ?></th> 
                             <?php
                               if($this->permission->method('add_role','update')->access() || $this->permission->method('add_role','delete')->access()){
                             ?>
                              <th><?php echo display('action') ?></th>
                            <?php } ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($role)) { ?>
                            <?php $sl = 1; ?>
                            <?php foreach ($role as $role) { ?>
                                <tr>
                                    <td><?php echo $sl; ?></td>
                                    <td><?php echo $role->type; ?></td>   
                                    <?php
                                    if($this->permission->method('add_role','update')->access() || $this->permission->method('add_role','delete')->access()){
                                    ?>
                                    <td>
                                        <div class="action-btn">
                                        <?php
                                        if($this->permission->method('add_role','update')->access()){
                                          ?>
                                            <a href="<?php echo base_url("permission_assign/edit/$role->id") ?>" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a> 
                                            <?php } ?>

                                            <?php
                                            if($this->permission->method('add_role','delete')->access()){
                                            ?>

                                            <a href="<?php echo base_url("permission_assign/delete/$role->id") ?>" class="btn btn-xs btn-danger" onclick="return confirm('<?php echo display('are_you_sure') ?> ')"><i class="fa fa-trash"></i></a>
                                            <?php } ?>

                                        </div> 
                                    </td>
                                    <?php } ?>
                                </tr>
                                <?php $sl++; ?>
                            <?php } ?> 
                        <?php } ?>     
                    </tbody>
                </table>
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



