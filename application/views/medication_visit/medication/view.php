<div class="row">
    <!--  table area -->
    <div class="col-sm-12">
        <div class="panel panel-default thumbnail">

        <?php
        if($this->permission->method('add_medication','create')->access()){
        ?>
            <div class="panel-heading">
                <div class="btn-group">
                    <a class="btn btn-success" href="<?php echo base_url("medication_visit/medications/create") ?>"> <i class="fa fa-plus"></i>  <?php echo display('add_medication') ?> </a>  
                </div>
            </div>
        <?php } ?>

        <?php
        if($this->permission->method('medication_list','read')->access() || $this->permission->method('medication_list','update')->access() || $this->permission->method('medication_list','delete')->access()){
        ?>
            <div class="panel-body">
                <table class="datatable table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th><?php echo display('serial') ?></th>
                            <th><?php echo display('patient_name') ?></th>
                            <th><?php echo display('patient_id') ?></th>
                            <th><?php echo display('medicine_name') ?></th>
                            <th><?php echo display('dosage') ?></th>
                            <th><?php echo display('per_day_intake') ?></th>
                            <th><?php echo display('full_stomach') ?></th> 
                            <th><?php echo display('other_instruction') ?></th> 
                            <th><?php echo display('from_date') ?></th> 
                            <th><?php echo display('to_date') ?></th>
                            <th><?php echo display('prescribe_by') ?></th>
                            <th><?php echo display('intake_time') ?></th>
                            <?php
                            if($this->permission->method('medication_list','update')->access() || $this->permission->method('medication_list','delete')->access()){
                            ?>
                             <th><?php echo display('action') ?></th>
                            <?php } ?>

                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($medications)) { ?>
                            <?php $sl = 1; ?>
                            <?php foreach ($medications as $value) { ?>
                                <tr class="<?php echo ($sl & 1)?"odd gradeX":"even gradeC" ?>">
                                    <td><?php echo $sl; ?></td>
                                    <td>
                                        <a href="<?= base_url('patient/profile/'.$value->pid)?>"><?php echo $value->patient; ?></a>
                                    </td>
                                    <td><?php echo $value->patient_id; ?></td>
                                    <td><?php echo $value->name; ?></td>
                                    <td><?php echo $value->dosage; ?></td>
                                    <td><?php echo $value->per_day_intake; ?></td>
                                    <td><?php if($value->full_stomach==1){echo display('yes');}else{echo display('no');} ?></td>
                                    <td><?php echo $value->other_instruction; ?></td>
                                    <td><?php echo $value->from_date; ?></td>
                                    <td><?php echo $value->to_date; ?></td>
                                    <td><?php echo $value->doctor; ?></td>
                                    <td><?php echo $value->intake_time; ?></td>
                                    
                                    <?php
                                    if($this->permission->method('medication_list','update')->access() || $this->permission->method('medication_list','delete')->access()){
                                    ?>
                                    <td class="center">
                                    <?php
                                    if($this->permission->method('medication_list','update')->access()){
                                    ?>
                                        <a href="<?php echo base_url("medication_visit/medications/create/$value->id") ?>" class="btn btn-xs  btn-primary"><i class="fa fa-edit"></i></a> 
                                    <?php } ?>


                                    <?php
                                    if($this->permission->method('medication_list','delete')->access()){
                                    ?>
                                        <a href="<?php echo base_url("medication_visit/medications/delete/$value->id") ?>" onclick="return confirm('<?php echo display("are_you_sure") ?>')" class="btn btn-xs  btn-danger"><i class="fa fa-trash"></i></a> 
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
