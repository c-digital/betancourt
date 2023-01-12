<div class="row">
    <!--  table area -->
    <div class="col-sm-12">
        <div  class="panel panel-default thumbnail">
        <?php
        if($this->permission->method('add_admission','create')->access()){
        ?>
            <div class="panel-heading no-print">
                <div class="btn-group"> 
                    <a class="btn btn-success" href="<?php echo base_url("billing/admission/form") ?>"> <i class="fa fa-plus"></i>  <?php echo display('add_bill') ?> </a>  

                </div>
            </div>
        <?php } ?>

 
        <?php
        if($this->permission->method('admission_list','read')->access() || $this->permission->method('admission_list','update')->access() || $this->permission->method('admission_list','delete')->access()){
        ?>
            <div class="panel-body">
                <table class="datatable table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead> 
                        <tr>
                            <th><?php echo display('serial') ?></th>
                            <th><?php echo display('patient_name') ?></th>
                            <th><?php echo display('patient_id') ?></th>
                            <th><?php echo display('admission_id') ?></th>
                            <th><?php echo display('admission_date') ?></th>
                            <th><?php echo display('discharge_date') ?></th>
                            <th><?php echo display('doctor_name') ?></th>
                            <th><?php echo display('guardian_name') ?></th>
                            <th><?php echo display('guardian_contact') ?></th>
                            <?php
                            if($this->permission->method('admission_list','update')->access() || $this->permission->method('admission_list','delete')->access()){
                            ?>
                            <th><?php echo display('action') ?></th>
                            <?php } ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($admissions)) { ?>
                            <?php $sl = 1; ?>
                            <?php foreach ($admissions as $admission) { ?>
                                <tr>
                                    <td><?php echo $sl; ?></td>
                                    <td><a href="<?= base_url('patient/profile/'.$admission->pid)?>"><?php echo $admission->patient_name; ?></a></td>
                                    <td><?php echo $admission->patient_id; ?></td>
                                    <td><?php echo $admission->admission_id; ?></td>
                                    <td><?php echo $admission->admission_date; ?></td>
                                    <td><?php echo $admission->discharge_date; ?></td>
                                    <td><?php echo $admission->doctor_name; ?></td>
                                    <td><?php echo $admission->guardian_name; ?></td>
                                    <td><?php echo $admission->guardian_contact; ?></td>
                                    <td><center>
                                        <?php
                                        if($this->permission->method('admission_list','read')->access()){
                                        ?>
                                        <a href="<?php echo base_url("billing/bill/view/".$admission->bill_id) ?>" class="btn btn-xs  btn-primary" data-toggle="tooltip" data-placement="top" title="<?= display('view')?>"><i class="fa fa-eye"></i> <?= display('view')?></a> 
                                         <?php } ?>
                                       </center>
                                    </td>
                                   
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
