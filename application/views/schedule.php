<div class="row">
    <div class="col-sm-12">
        <div  class="panel panel-default thumbnail">
           <?php
            if($this->permission->method('add_schedule','create')->access()){
           ?>
            <div class="panel-heading no-print">
                <div class="btn-group"> 
                    <a class="btn btn-success" href="<?php echo base_url("schedule/create") ?>"> <i class="fa fa-plus"></i>  <?php echo display('add_schedule') ?> </a>  
                </div>
            </div> 
            <?php } ?>


            <?php
            if($this->permission->method('schedule_list','read')->access() || $this->permission->method('schedule_list','update')->access() || $this->permission->method('schedule_list','delete')->access()){
            
            ?>
            <div class="panel-body">
                <table width="100%" class="datatable table table-striped table-bordered table-hover">
                    <thead>
                        <tr> 
                            <th><?php echo display('serial') ?></th>
                            <th><?php echo display('doctor_name') ?></th>
                            <th><?php echo display('department_name') ?></th>
                            <th><?php echo display('day') ?></th>
                            <th><?php echo display('start_time') ?></th>
                            <th><?php echo display('end_time') ?></th>
                            <th><?php echo display('per_patient_time') ?></th>
                            <th><?php echo display('serial_visibility_type') ?></th>
                            <th><?php echo display('status') ?></th>
                            <?php
                            if($this->permission->method('schedule_list','update')->access() || $this->permission->method('schedule_list','delete')->access()){ 
                            ?>
                             <th><?php echo display('action') ?></th>
                            <?php } ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($schedules)) { ?>
                            <?php $sl = 1; ?>
                            <?php foreach ($schedules as $schedule) { ?>
                                <tr class="<?php echo ($sl & 1)?"odd gradeX":"even gradeC" ?>">
                                    <td><?php echo $sl; ?></td>
                                    <td><?php echo $schedule->firstname; ?> <?php echo $schedule->lastname; ?></td>
                                    <td><?php echo $schedule->name; ?></td>
                                    <td><?php echo $schedule->available_days; ?></td>
                                    <td><?php echo $schedule->start_time; ?></td>
                                    <td><?php echo $schedule->end_time; ?></td>
                                    <td><?php echo $schedule->per_patient_time; ?></td>
                                    <td><?php echo (($schedule->serial_visibility_type==1)?display('sequential'):display('timestamp')); ?></td>
                                    <td><?php echo (($schedule->status==1)?display('active'):display('inactive')); ?></td>

                                    <?php
                                    if($this->permission->method('schedule_list','update')->access() || $this->permission->method('schedule_list','delete')->access()){
                                    ?>
                                    <td class="center">
                                     <?php
                                      if($this->permission->method('schedule_list','update')->access()){
                                     ?>
                                        <a href="<?php echo base_url("schedule/edit/$schedule->schedule_id") ?>" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a> 
                                      <?php } ?>


                                       <?php
                                         if($this->permission->method('schedule_list','delete')->access()){                                      
                                        ?>
                                        <a href="<?php echo base_url("schedule/delete/$schedule->schedule_id") ?>" onclick="return confirm('<?php echo display('are_you_sure') ?>')" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
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