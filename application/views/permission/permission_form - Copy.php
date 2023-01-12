<?php
if($this->permission->method('role_permission','create')->access()){
?>
<div class="row">
    <div class="col-sm-12 col-md-12">
     <div class="panel panel-bd lobidrag">
            <div class="panel-heading">
                <div class="panel-title">
                    
                </div>
            </div>
        <?php echo form_open_multipart('permission_assign/permission_insert','class="form-inner"') ?>      
        <div class="panel-body">
         <div class="form-group row">
          <label for="role_name" class="col-xs-3 col-form-label"><?php echo display('role_name') ?> </label>
          <div class="col-xs-6"> 
             <select class="form-control" name="role_id" id="role_name">
                 <option></option>
                <?php
                  foreach($role as $r_data){
                 ?>
                     <option value="<?php echo $r_data->id?>"><?php echo $r_data->type?></option>
                <?php
                  }
                ?>
             </select>
           </div>
        </div>
      </div>
     </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12 col-md-12">
     <div class="panel panel-bd lobidrag">
            <div class="panel-heading">
                <div class="panel-title">
                    <h4><?php echo (!empty($title)?$title:null) ?></h4>
                </div>
            </div>
       <div class="panel-body">

        <?php
        $m=0;
         foreach($module_all_list as $m_data){
             $account_sub = $this->db->select('*')->from('sub_module')->where('mid',$m_data->id)->get()->result();
        ?>
         <h2><?php echo $m_data->name;?></h2>
         <table class="table table-bordered">
            <thead>
            <tr>
                <th><?php echo display('sl_no') ?></th>
                <th><?php echo display('module_name') ?></th>
                <th><?php echo display('create') ?></th>
                <th><?php echo display('read') ?></th>
                <th><?php echo display('update') ?></th>
                <th><?php echo display('delete') ?></th>
            </tr>
            </thead>
                <?php $sl = 0 ?>
                <?php if (!empty($account_sub)) { ?>
                    <?php foreach ($account_sub as $fk_module_id => $module_name) { ?>
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
                                    <?php echo form_checkbox('create['.$m.']['.$sl.'][]', '1', null, $createID); ?>
                                    <label for="create<?php echo $m ?><?php echo $sl ?>"></label>
                                </div>
                            </td>
                            <td>
                                <div class="checkbox checkbox-success text-center">
                                    <?php echo form_checkbox('read['.$m.']['.$sl.'][]', '1', null, $readID); ?>
                                    <label for="read<?php echo $m ?><?php echo $sl ?>"></label>
                                </div>
                            </td>
                            <td>
                                <div class="checkbox checkbox-success text-center">
                                    <?php echo form_checkbox('update['.$m.']['.$sl.'][]', '1', null, $updateID); ?>
                                    <label for="update<?php echo $m ?><?php echo $sl ?>"></label>
                                </div>
                            </td>
                            <td>
                                <div class="checkbox checkbox-success text-center">
                                    <?php echo form_checkbox('delete['.$m.']['.$sl.'][]', '1', null, $deleteID); ?>
                                    <label for="delete<?php echo $m ?><?php echo $sl ?>"></label>
                                </div>
                            </td>
                        </tr>
                           </tbody>
                        <?php $sl++ ?>
                         <?php } ?>
                       <?php } ?>
                </table>
                <?php
                  $m++; }
                ?>
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