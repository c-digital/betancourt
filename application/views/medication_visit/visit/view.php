<div class="row">
    <!--  table area -->
    <div class="col-sm-12">
        <div class="panel panel-default thumbnail">

        <?php
        if($this->permission->method('add_visit','create')->access()){
        ?>
            <div class="panel-heading">
                <div class="btn-group">
                    <a class="btn btn-success" href="<?php echo base_url("medication_visit/visits/create") ?>"> <i class="fa fa-plus"></i>  <?php echo display('add_visit') ?> </a>  
                </div>
            </div>
        <?php } ?>


        <?php
        if($this->permission->method('visit_list','read')->access() || $this->permission->method('visit_list','update')->access() || $this->permission->method('visit_list','delete')->access()){
        ?>
            <div class="panel-body">
                <table class="datatable table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th><?php echo display('serial') ?></th>
                            <th><?php echo display('patient_id') ?></th>
                            <th><?php echo display('visit_type') ?></th>
                            <th><?php echo display('visit_by') ?></th>
                            <th><?php echo display('visit_date') ?></th>
                            <th><?php echo display('visit_time') ?></th> 
                            <th><?php echo display('finding') ?></th> 
                            <th><?php echo display('instructions') ?></th> 
                            <th><?php echo display('fees') ?></th> 
                            <?php
                            if($this->permission->method('visit_list','update')->access() || $this->permission->method('visit_list','delete')->access()){
                            ?>
                             <th><?php echo display('action') ?></th>
                            <?php } ?>

                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($visits)) { ?>
                            <?php $sl = 1; ?>
                            <?php foreach ($visits as $value) { ?>
                                <tr class="<?php echo ($sl & 1)?"odd gradeX":"even gradeC" ?>">
                                    <td><?php echo $sl; ?></td>
                                    <td><?php echo $value->patient_id; ?></td>
                                    <td><?php if($value->user_type==2){echo 'Doctor';}else{echo 'Nurse';} ?></td>
                                    <td><?php echo $value->name; ?></td>
                                    <td><?php echo $value->visit_date; ?></td>
                                    <td><?php echo $value->visit_time; ?></td>
                                    <td><?php echo $value->finding; ?></td>
                                    <td><?php echo $value->instructions; ?></td>
                                    <td><?php echo $value->fees; ?></td>
                                    
                                    <?php
                                    if($this->permission->method('visit_list','update')->access() || $this->permission->method('visit_list','delete')->access()){
                                    ?>
                                    <td class="center">
                                    <?php
                                    if($this->permission->method('visit_list','update')->access()){
                                    ?>
                                        <a href="<?php echo base_url("medication_visit/visits/create/$value->id") ?>" class="btn btn-xs  btn-primary"><i class="fa fa-edit"></i></a> 
                                    <?php } ?>


                                    <?php
                                    if($this->permission->method('visit_list','delete')->access()){
                                    ?>
                                        <a href="<?php echo base_url("medication_visit/visits/delete/$value->id") ?>" onclick="return confirm('<?php echo display("are_you_sure") ?>')" class="btn btn-xs  btn-danger"><i class="fa fa-trash"></i></a> 
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
