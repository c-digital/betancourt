<div class="row">

    <?php
    if($this->permission->method('gateway_setting','read')->access() || $this->permission->method('gateway_setting','update')->access()){
    ?>
    <div class="col-md-12">
        <div class="panel panel-success">
            <div class="panel-heading">
                <h3><?php echo display('sms_setting')?></h3> 
            </div>
            <div class="panel-body">
                <?php echo form_open('sms/sms_setup_controller/sms_setting') ?>
                    <?php echo form_hidden('id', $sms_setting->id) ?>
                    
                  <div class="checkbox checkbox-success">
                        <input id="appointment" type="checkbox" name="appointment" <?php echo (($sms_setting->appointment==1)?'checked':null) ?>>
                        <label for="appointment"><?php echo display('appointment') ?></label>
                  </div>
                  <div class="checkbox checkbox-success">
                        <input id="registration" type="checkbox" name="registration" <?php echo (($sms_setting->registration==1)?'checked':null) ?>>
                        <label for="registration"><?php echo display('registration') ?></label>
                  </div>
                  <div class="checkbox checkbox-success">
                        <input id="schedule" type="checkbox" name="schedule" <?php echo (($sms_setting->schedule==1)?'checked':null) ?>>
                        <label for="schedule"><?php echo display('schedule') ?></label>
                  </div>

                <button type="submit" class="btn btn-success"><?php echo display('save') ?></button>
                <?php echo form_close() ?>
            </div>
        </div>
    </div>
    <?php } ?>



   <?php
    if($this->permission->method('gateway_setting','read')->access() || $this->permission->method('gateway_setting','update')->access()){
    ?>
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr class="center bg-success">
                            <th><?php echo display('status');?></th>
                            <th><?php echo display('provider');?> </th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <?php
                                if($this->permission->method('gateway_setting','update')->access()){
                                ?>
                            <th><?php echo display('action');?> </th>
                            <?php } ?>

                        </tr>
                    </thead>

                    <tbody>
                        
                        <?php echo form_open('sms/sms_setup_controller/save_gateway', array('method'=>'post','role'=>'form')); ?>   
                        <tr> 
                            <input type="hidden" name="id" value="<?php echo $gateway_list[0]->gateway_id;?>">
                            <td><input type="radio" <?php echo $gateway_list[0]->default_status==1?'checked':''?> class="form-control"></td>
                            <td><?php echo '<a target="_blank" href="'.$gateway_list[0]->link.'">'.$gateway_list[0]->provider_name.'</a>'?></td>
                            <td><input type="text" class="form-control" value="<?php echo $gateway_list[0]->user;?>" name="user" placeholder="From"></td>
                            <td><input type="text" class="form-control" value="<?php echo $gateway_list[0]->password?>" name="password" placeholder="Enter Api Secret Key"></td>
                            <td><input type="text" class="form-control" value="<?php echo $gateway_list[0]->authentication?>" name="authentication" placeholder="Enter Api Key"></td>
                            <?php
                                if($this->permission->method('gateway_setting','update')->access()){
                                ?>
                            <td width="70">
                                <input type="submit" value="<?php echo display('update');?>" class="btn btn-xs btn-info">
                            </td>
                        </tr>
                        </form>
                        <?php } ?>

                        <?php echo form_open('sms/sms_setup_controller/save_gateway', array('method'=>'post','role'=>'form')); ?>   
                        <tr> 
                            <input type="hidden" name="id" value="<?php echo $gateway_list[1]->gateway_id;?>">
                            <td><input type="radio" <?php echo $gateway_list[1]->default_status==1?'checked':''?> class="form-control"></td>
                            <td><?php echo '<a target="_blank" href="'.$gateway_list[1]->link.'">'.$gateway_list[1]->provider_name.'</a>'?></td>
                            <td><input type="text" class="form-control" value="<?php echo $gateway_list[1]->user;?>" name="user" placeholder="User Name(Optional)"></td>
                            <td><input type="text" class="form-control" value="<?php echo $gateway_list[1]->password?>" name="password" placeholder="Password(Optional)"></td>
                            <td><input type="text" class="form-control" value="<?php echo $gateway_list[1]->authentication?>" name="authentication" placeholder="Enter Api Key"></td>
                            <?php
                                if($this->permission->method('gateway_setting','update')->access()){
                                ?>
                            <td width="70">
                                <input type="submit" value="<?php echo display('update');?>" class="btn btn-xs btn-info">
                            </td>
                        </tr>
                        </form>
                        <?php } ?>

                        <?php echo form_open('sms/sms_setup_controller/save_gateway', array('method'=>'post','role'=>'form')); ?>   
                        <tr> 
                            <input type="hidden" name="id" value="<?php echo $gateway_list[2]->gateway_id;?>">
                            <td><input type="radio" <?php echo $gateway_list[2]->default_status==1?'checked':''?> class="form-control"></td>
                            <td><?php echo '<a target="_blank" href="'.$gateway_list[2]->link.'">'.$gateway_list[2]->provider_name.'</a>'?></td>
                            <td><input type="text" class="form-control" value="<?php echo $gateway_list[2]->user;?>" name="user" placeholder="User Name"></td>
                            <td><input type="text" class="form-control" value="<?php echo $gateway_list[2]->password?>" name="password" placeholder="Password(Optional)"></td>
                            <td><input type="text" class="form-control" value="<?php echo $gateway_list[2]->authentication?>" name="authentication" placeholder="Enter Api Key"></td>
                            <?php
                                if($this->permission->method('gateway_setting','update')->access()){
                                ?>
                            <td width="70">
                                <input type="submit" value="<?php echo display('update');?>" class="btn btn-xs btn-info">
                            </td>
                        </tr>
                        </form>
                        <?php } ?>
                       
                    </tbody>
                </table>
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