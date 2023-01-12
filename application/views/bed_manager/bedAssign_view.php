<div class="row">
    <!--  table area -->
    <div class="col-sm-12">
        <div class="panel panel-default thumbnail">

        <?php
        if($this->permission->method('bed_assign','create')->access()){
        ?>
            <div class="panel-heading">
                <div class="btn-group">
                    <a class="btn btn-success" href="<?php echo base_url("bed_manager/bed_assign/create") ?>"> <i class="fa fa-plus"></i>  <?php echo display('bed_assign') ?> </a>  
                </div>
            </div>
        <?php } ?>

        <?php
        if($this->permission->method('bed_assign_list','read')->access() || $this->permission->method('bed_assign_list','update')->access() || $this->permission->method('bed_assign_list','delete')->access()){
        ?>
            <div class="panel-body">
                <table class="datatable table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th><?php echo display('serial') ?></th>
                            <th><?php echo display('patient_name') ?></th>
                            <th><?php echo display('patient_id') ?></th>
                            <th><?php echo display('bed_type') ?></th>
                            <th><?php echo display('charge') ?></th> 
                            <th><?php echo display('day') ?></th> 
                            <th><?php echo display('total') ?></th> 
                            <th><?php echo display('assign_date') ?></th>
                            <th><?php echo display('discharge_date') ?></th>
                            <th><?php echo display('assign_by') ?></th>
                            <th><?php echo display('status') ?></th>
                            <?php
                            if($this->permission->method('bed_assign_list','update')->access() || $this->permission->method('bed_assign_list','delete')->access()){
                            ?>
                             <th><?php echo display('action') ?></th>
                            <?php } ?>

                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($beds)) { ?>
                            <?php $sl = 1; ?>
                            <?php foreach ($beds as $bed) { 
                                $assign_date = strtotime($bed->assign_date);
                                $discharge_date = strtotime(($bed->discharge_date)=='0000-00-00'?date('Y-m-d'):$bed->discharge_date);
                                $timeDiff = abs($discharge_date - $assign_date);
                                $numberDays = $timeDiff/86400;  
                                $numberDays = intval($numberDays);
                                ?>
                                <tr class="<?php echo ($sl & 1)?"odd gradeX":"even gradeC" ?>">
                                    <td><?php echo $sl; ?></td>
                                     <td>
                                         <a href="<?= base_url('patient/profile/'.$bed->pid)?>"><?php echo $bed->patient_name;?></a>
                                     </td>
                                    <td><?php echo $bed->patient_id; ?></td>
                                    <td><?php echo $bed->bed_name; ?></td>
                                    <td><?php echo $bed->charge; ?></td>
                                    <td><?php echo $numberDays; ?></td>
                                    <td><?php echo number_format($bed->charge * $numberDays, 2); ?></td>
                                    <td><?php echo $bed->assign_date; ?></td>
                                    <td><?php echo $bed->discharge_date; ?></td>
                                    <td><?php echo $bed->assign_by; ?></td>
                                    <td><?php echo (($bed->status==1)?display('active'):display('inactive')); ?></td>
                                    
                                    <?php
                                    if($this->permission->method('bed_assign_list','update')->access() || $this->permission->method('bed_assign_list','delete')->access()){
                                    ?>
                                    <td class="center">
                                    <?php
                                    if($this->permission->method('bed_assign_list','update')->access()){
                                    ?>
                                    <a href="<?php echo base_url("bed_manager/bed_assign/discharged/$bed->serial") ?>" class="btn btn-xs  btn-warning"><?= display('discharged')?></a> 
                                      <a href="<?php echo base_url("bed_manager/bed_assign/transfer/$bed->serial") ?>" class="btn btn-xs  btn-success"><?= display('bed_transfer')?></a> 
                                        <a href="<?php echo base_url("bed_manager/bed_assign/edit/$bed->serial") ?>" class="btn btn-xs  btn-primary"><i class="fa fa-edit"></i></a> 
                                    <?php } ?>


                                    <?php
                                    if($this->permission->method('bed_assign_list','delete')->access()){
                                    ?>
                                        <a href="<?php echo base_url("bed_manager/bed_assign/delete/$bed->serial") ?>" onclick="return confirm('<?php echo display("are_you_sure") ?>')" class="btn btn-xs  btn-danger"><i class="fa fa-trash"></i></a> 
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