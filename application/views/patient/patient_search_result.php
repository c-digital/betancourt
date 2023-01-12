<div class="row">
    <!--  table area -->
    <div class="col-sm-12">
        <div  class="panel panel-default thumbnail">
            <?php
            if($this->permission->method('add_patient','create')->access() ){
            ?>
            <div class="panel-heading no-print">
                <div class="row">
                    <div class="col-lg-2 col-sm-12">
                        <div class="btn-group"> 
                          <a class="btn btn-primary" href="<?php echo base_url("patient") ?>"> <i class="fa fa-list"></i>  <?php echo display('patient_list') ?> </a>  
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-12"></div>
                    <?php echo form_open('patient/search',array('method'=>'get')) ?>
                        <div class="col-lg-5 col-sm-12">
                            <input name="search_text" type="text" class="form-control" id="search_text" placeholder="<?php echo display('patient_id').'/'.display('name') ?>" autocomplete="off">
                        </div>
                        <div class="col-lg-2 col-sm-12">
                            <div class="btn-group"> 
                                <button class="btn btn-primary">  <?php echo display('search') ?> </button>  
                            </div>
                        </div>
                    <?php echo form_close() ?>
                </div>
            </div>
            <?php } ?>


            <?php
                if($this->permission->method('patient_list','read')->access() || $this->permission->method('patient_list','update')->access() || $this->permission->method('patient_list','delete')->access()){
                ?>
            <div class="panel-body">
                <table width="100%" class="datatable table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th><?php echo display('serial') ?></th>
                            <th><?php echo display('id_no') ?></th>
                            <th><?php echo display('picture') ?></th>
                            <th><?php echo display('first_name') ?></th>
                            <th><?php echo display('last_name') ?></th>
                            <th><?php echo display('email') ?></th>
                            <th><?php echo display('mobile') ?></th>
                            <th><?php echo display('address') ?></th>
                            <th><?php echo display('sex') ?></th>
                            <?php  
                            if($this->permission->method('add_admission','create')->access()){
                            ?> 
                            <th><?php echo display('admission') ?></th>
                            <?php }?>
                             <?php
                             if($this->permission->method('patient_list','read')->access() || $this->permission->method('patient_list','update')->access() || $this->permission->method('patient_list','delete')->access()){
                              ?>
                            <th><?php echo display('action') ?></th>
                            <?php } ?>
                            <th><?php echo display('blood_group') ?></th>
                            <th><?php echo display('date_of_birth') ?></th>
                            <th><?php echo display('create_date') ?></th>
                            <th><?php echo display('status') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($patients)) { ?>
                            <?php $sl = 1; ?>
                            <?php foreach ($patients as $patient) { ?>
                                <tr class="<?php echo ($sl & 1)?"odd gradeX":"even gradeC" ?>">
                                <td><?php echo $sl; ?></td>
                                <td><?php echo $patient->patient_id; ?></td>
                                <td><img src="<?php echo (!empty($patient->picture)?base_url($patient->picture):base_url('assets_web/img/placeholder/profile.png')); ?>"  width="65" height="50"/></td>
                                <td><?php echo $patient->firstname; ?></td>
                                <td><?php echo $patient->lastname; ?></td>
                                <td><?php echo $patient->email; ?></td>
                                <td><?php echo $patient->mobile; ?></td>
                                <td><?php echo $patient->address; ?></td>
                                <td><?php echo $patient->sex; ?></td>
                                 <?php  
                                if($this->permission->method('add_admission','create')->access()){
                                ?> 
                                <td>
                                    <div class="btn-group"> 
                                        <a href="<?php echo base_url("billing/admission/form?pid=$patient->patient_id") ?>" class="btn btn-xs btn-primary"><i class="fa fa-plus"></i> <?= display('admission')?></a>
                                    </div>
                                </td>
                                <?php }?>

                                    <?php
                                    if($this->permission->method('patient_list','read')->access() || $this->permission->method('patient_list','update')->access() || $this->permission->method('patient_list','delete')->access()){
                                     ?>
                                <td class="center">
                                    <?php
                                    if($this->permission->method('patient_list','read')->access()){
                                    ?>
                                        <a href="<?php echo base_url("patient/profile/$patient->id") ?>" class="btn btn-xs btn-success"><i class="fa fa-eye"></i></a> 
                                    <?php } ?>

                                    <?php
                                    if($this->permission->method('patient_list','update')->access()){
                                    ?>
                                        <a href="<?php echo base_url("patient/edit/$patient->id") ?>" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a> 
                                    <?php } ?>
                                    

                                        <a href="<?php echo base_url("case_manager/patient/form?pid=$patient->patient_id") ?>" class="btn btn-xs btn-warning" title="Add to Case Manager"><i class="fa fa-plus"></i></a> 


                                    <?php
                                    if($this->permission->method('patient_list','delete')->access()){
                                    ?>
                                        <a href="<?php echo base_url("patient/delete/$patient->id") ?>" class="btn btn-xs btn-danger" onclick="return confirm('<?php echo display('are_you_sure') ?>')"><i class="fa fa-trash"></i></a> 
                                    <?php } ?>
                                </td>
                                <?php } ?>

                                    <td><?php echo $patient->blood_group; ?></td>
                                    <td><?php echo $patient->date_of_birth; ?></td> 
                                    <td><?php echo $patient->create_date; ?></td>
                                    <td><?php echo (($patient->status==1)?display('active'):display('inactive')); ?></td>
                                </tr>
                                <?php $sl++; ?>
                            <?php } ?> 
                        <?php } ?> 
                    </tbody>
                </table>  <!-- /.table-responsive -->
            </div>
            <?php }else{
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
            } ?>
        </div>
    </div>
</div>

