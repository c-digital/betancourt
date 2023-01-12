<div class="row">
    <!--  table area -->
    <div class="col-sm-12">
        <div  class="panel panel-default thumbnail">

            <?php
            if($this->permission->method('case_add_patient','create')->access()){
            ?>
            <div class="panel-heading no-print">
                <div class="btn-group"> 
                    <a class="btn btn-success" href="<?php echo base_url("case_manager/patient/form") ?>"> <i class="fa fa-plus"></i>  <?php echo display('add_patient') ?> </a>  
                </div>
            </div> 
            <?php } ?>



            <?php
            if($this->permission->method('case_patient_list','read')->access() || $this->permission->method('case_patient_list','update')->access() || $this->permission->method('case_patient_list','delete')->access()){
            ?>
            <div class="panel-body">
                <table width="100%" class="datatable table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th></th>
                            <th colspan="4" class="bg-info"><?php echo display('patient_information') ?></th>
                            <th colspan="8"></th>
                        </tr>
                        <tr>
                            <th><?php echo display('serial') ?></th>
                            <th><?php echo display('patient_id') ?></th>
                            <th><?php echo display('patient_name') ?></th>
                            <th><?php echo display('mobile') ?></th>
                            <th><?php echo display('case_manager') ?></th>
                            <th><?php echo display('ref_doctor_name') ?></th>
                            <th><?php echo display('hospital_name') ?></th>
                            <th><?php echo display('date') ?></th>
                            <th><?php echo display('status') ?></th>
                            <?php
                            if($this->permission->method('case_patient_list','read')->access() || $this->permission->method('case_patient_list','update')->access() || $this->permission->method('case_patient_list','delete')->access()){
                            ?>
                            <th width="80"><?php echo display('action') ?></th>
                            <?php } ?>

                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($patients)) { ?>
                            <?php $sl = 1; ?>
                            <?php foreach ($patients as $patient) { ?>
                                <tr>
                                    <td><?php echo $sl; ?></td>
                                    <td><a href="<?php echo base_url("/case_manager/patient/profile/$patient->id"); ?>"><?php echo $patient->patient_id ?></a></td>
                                    <td><?php echo $patient->patient_name; ?></td>
                                    <td><?php echo $patient->mobile; ?></td>
                                    <td><?php echo $patient->case_manager; ?></td>
                                    <td><?php echo $patient->ref_doctor_name; ?></td>
                                    <td><?php echo $patient->hospital_name; ?></td>
                                    <td><?php echo $patient->date; ?></td> 
                                    <td><?php echo (($patient->status==1)?display('active'):display('inactive')); ?></td>


                                    <?php
                                    if($this->permission->method('case_patient_list','read')->access() || $this->permission->method('case_patient_list','update')->access() || $this->permission->method('case_patient_list','delete')->access()){
                                    ?>
                                    <td class="center">
                                        <?php
                                        if($this->permission->method('case_patient_list','read')->access()){
                                        ?>
                                        <a href="<?php echo base_url("case_manager/patient/profile/$patient->id") ?>" class="btn btn-xs btn-success"><i class="fa fa-eye"></i></a> 
                                        <?php } ?>

                                         <?php
                                        if($this->permission->method('case_patient_list','update')->access()){
                                        ?>
                                        <a href="<?php echo base_url("case_manager/patient/form/$patient->id") ?>" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a> 
                                        <?php } ?>

                                        <?php
                                        if($this->permission->method('case_patient_list','delete')->access()){
                                        ?>
                                        <a href="<?php echo base_url("case_manager/patient/delete/$patient->id") ?>" class="btn btn-xs btn-danger" onclick="return confirm('<?php echo display('are_you_sure') ?>')"><i class="fa fa-trash"></i></a> 
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