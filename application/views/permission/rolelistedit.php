<div class="row">
    <?php
    if($this->permission->method('role_list','update')->access()){
      ?>
    <div class="col-sm-12 col-md-12">
        <div class="panel panel-bd lobidrag">
            <div class="panel-heading">
                <div class="panel-title">
                    <h4><?php echo (!empty($title)?$title:null) ?></h4>
                </div>
            </div>
            <div class="panel-body">
                <?php echo form_open("permission_assign/permission_update/") ?>
                <div class="panel-body">

                    <div class="form-group row">
                        <label for="type" class="col-sm-3 col-form-label"><?php echo display('role_name') ?> <i class="text-danger">*</i></label>
                        <div class="col-sm-6">
                            <input type="text" value="<?php echo  $role->type;?>" tabindex="2" class="form-control" name="role_name" id="type" placeholder="<?php echo display('role_name') ?>" required />
                        </div>
                    </div>
                    <input type="hidden" name="rid" value="<?php echo $role->id?>">
                </div>
                <!--manage-->
                <?php
                $m=0;
                foreach ($modules as $key=>$value) {
                    $account_sub = $this->db->select('*')->from('sub_module')->where('mid',$value->id)->get()->result();
                    ?>
                    <table class="table table-bordered hidetable">
                        <h2 class="hidetable"><?php echo $value->name;?></h2>
                        <thead>
                        <tr>
                            <th><?php echo display('sl_no');?></th>
                            <th><?php echo display('module_name');?></th>
                            <th><?php echo display('create');?></th>
                            <th><?php echo display('read');?></th>
                            <th><?php echo display('update');?></th>
                            <th><?php echo display('delete');?></th>
                        </tr>
                        </thead>
                        <?php $sl = 0; ?>
                        <?php if(!empty($account_sub)){ ?>

                            <?php
                            foreach ($account_sub as $key1 => $module_name)
                            {
                                $ck_data = $this->db->select('*')
                                    ->where('fk_module_id',$module_name->id)
                                    ->where('role_id',$role->id)
                                    ->get('role_permission')
                                    ->row();
                                ?>
                                <?php
                                $createID = 'id="create'.$m.''.$sl.'"';
                                $readID   = 'id="read'.$m.''.$sl.'"';
                                $updateID = 'id="update'.$m.''.$sl.'"';
                                $deleteID = 'id="delete'.$m.''.$sl.'"';
                                ?>
                                <tbody>
                                <tr>
                                    <td><?php echo ($sl+1) ?></td>
                                    <td>
                                        <?php echo $module_name->name?>
                                        <input type="hidden" name="fk_module_id[<?php echo $m?>][<?php echo $sl?>][]" value="<?php echo $module_name->id ?>" id="id_<?php echo $module_name->id ?>">
                                    </td>
                                    <td>
                                        <div class="checkbox checkbox-success text-center">
                                            <input type="checkbox" name="create[<?php echo $m?>][<?php echo $sl ?>][]" value="1" <?php echo ((@$ck_data->create==1)?"checked":null) ?> id="create[<?php echo $m?>]<?php echo $sl?>">
                                            <label for="create[<?php echo $m ?>]<?php echo $sl ?>"></label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="checkbox checkbox-success text-center">
                                            <input type="checkbox" name="read[<?php echo $m?>][<?php echo $sl ?>][]" value="1" <?php echo ((@$ck_data->read==1)?"checked":null) ?> id="read[<?php echo $m?>]<?php echo $sl?>">
                                            <label for="read[<?php echo $m ?>]<?php echo $sl ?>"></label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="checkbox checkbox-success text-center">
                                            <input type="checkbox" name="update[<?php echo $m?>][<?php echo $sl ?>][]" value="1" <?php echo ((@$ck_data->update==1)?"checked":null) ?> id="update[<?php echo $m?>]<?php echo $sl?>">
                                            <label for="update[<?php echo $m ?>]<?php echo $sl ?>"></label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="checkbox checkbox-success text-center">
                                            <input type="checkbox" name="delete[<?php echo $m?>][<?php echo $sl ?>][]" value="1" <?php echo ((@$ck_data->delete==1)?"checked":null) ?> id="delete[<?php echo $m?>]<?php echo $sl?>">
                                            <label for="delete[<?php echo $m ?>]<?php echo $sl ?>"></label>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                                <?php $sl++ ?>
                            <?php } ?>
                        <?php } ?>
                    </table>
                    <?php $m++; } ?>

                    <div class="form-group pull-right">         
                        <div class="ui buttons">
                            <button type="reset" class="ui button"><?php echo display('reset') ?></button>
                            <div class="or"></div>
                            <button class="ui positive button"><?php echo display('save') ?></button>
                        </div>  
                </div>
                <?php echo form_close() ?>

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