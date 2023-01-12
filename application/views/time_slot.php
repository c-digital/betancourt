<div class="row">
    <div class="col-sm-12">
        <div  class="panel panel-default thumbnail">
           <?php
            if($this->permission->method('add_time_slot','create')->access()){
           ?>
            <div class="panel-heading no-print">
                <div class="btn-group"> 
                    <a class="btn btn-success" href="<?php echo base_url("schedule/create_slot") ?>"> <i class="fa fa-plus"></i>  <?php echo display('add_time_slot') ?> </a>  
                </div>
            </div> 
            <?php } ?>


            <?php
            if($this->permission->method('slot_list','read')->access() || $this->permission->method('slot_list','update')->access() || $this->permission->method('slot_list','delete')->access()){
            
            ?>
            <div class="panel-body">
                <table width="100%" class="datatable table table-striped table-bordered table-hover">
                    <thead>
                        <tr> 
                            <th><?php echo display('serial') ?></th>
                            <th><?php echo display('slot_name') ?></th>
                            <th><?php echo display('slot') ?></th>
                            <th><?php echo display('status') ?></th>
                            <?php
                            if($this->permission->method('slot_list','update')->access() || $this->permission->method('slot_list','delete')->access()){ 
                            ?>
                             <th><?php echo display('action') ?></th>
                            <?php } ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($slots)) { ?>
                            <?php $sl = 1; ?>
                            <?php foreach ($slots as $slot) { ?>
                                <tr class="<?php echo ($sl & 1)?"odd gradeX":"even gradeC" ?>">
                                    <td><?php echo $sl; ?></td>
                                    <td><?php echo $slot->slot_name; ?></td>
                                    <td><?php echo $slot->slot; ?></td>
                                    <td><?php echo (($slot->status==1)?display('active'):display('inactive')); ?></td>

                                    <?php
                                    if($this->permission->method('slot_list','update')->access() || $this->permission->method('slot_list','delete')->access()){
                                    ?>
                                    <td class="center">
                                     <?php
                                      if($this->permission->method('slot_list','update')->access()){
                                     ?>
                                        <a href="<?php echo base_url("schedule/edit_slot/$slot->id") ?>" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a> 
                                      <?php } ?>


                                       <?php
                                         if($this->permission->method('slot_list','delete')->access()){                                      
                                        ?>
                                        <a href="<?php echo base_url("schedule/delete_slot/$slot->id") ?>" onclick="return confirm('<?php echo display('are_you_sure') ?>')" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
                                        <?php } ?> 

                                    </td>
                                    <?php } ?>
                                </tr>

                                <?php $sl++; ?>
                            <?php } ?> 
                        <?php } ?> 
                    </tbody>
                </table>  <!-- /.table-responsive -->
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