<div class="row">

        <?php
        if($this->permission->method('report','read')->access()){
        ?>
         <div class="col-sm-12">
            <div  class="panel panel-default"> 
                <div class="panel-body"> 
                    <form class="form-inline" action="<?php echo base_url('medication_visit/medications/report') ?>">
                        <div class="form-group">
                            <label class="sr-only" for="start_date"><?php echo display('start_date') ?></label>
                            <input type="text" name="start_date" class="form-control datepicker" id="start_date" placeholder="<?php echo display('start_date') ?>" value="<?php echo $date->start_date ?>" autocomplete="off">
                        </div> 
                        <div class="form-group">
                            <label class="sr-only" for="end_date"><?php echo display('end_date') ?></label>
                            <input type="text" name="end_date" class="form-control datepicker" id="end_date" placeholder="<?php echo display('end_date') ?>" value="<?php echo $date->end_date ?>" autocomplete="off">
                        </div>  
                        <button type="submit" class="btn btn-success"><?php echo display('filter') ?></button>
                    </form>
                </div>
            </div>
         </div>
        <?php } ?>
 

<?php
if($this->permission->method('report','read')->access()){
?>
    <!--  table area -->
    <div class="col-sm-12">
        <div  class="panel panel-default">
            <div class="panel-body">
                <table class="table table-striped table-bordered" cellspacing="0" width="100%" id="mvReport">
                    <thead>
                        <tr>
                            <th><?php echo display('serial') ?></th>
                            <th><?php echo display('patient_id') ?></th>
                            <th><?php echo display('medicine_name') ?></th>
                            <th><?php echo display('dosage') ?></th>
                            <th><?php echo display('per_day_intake') ?></th>
                            <th><?php echo display('full_stomach') ?></th> 
                            <th><?php echo display('other_instruction') ?></th> 
                            <th><?php echo display('from_date') ?></th> 
                            <th><?php echo display('to_date') ?></th>
                            <th><?php echo display('doctor_name') ?></th>
                            <th><?php echo display('intake_time') ?></th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php if (!empty($result)) { ?>
                            <?php $sl = 1; ?>
                            <?php foreach ($result as $value) { ?>
                                <tr class="<?php echo ($sl & 1)?"odd gradeX":"even gradeC" ?>">
                                    
                                    <td><?php echo $sl; ?></td>
                                    <td><?php echo $value->patient_id; ?></td>
                                    <td><?php echo $value->mname; ?></td>
                                    <td><?php echo $value->dosage; ?></td>
                                    <td><?php echo $value->per_day_intake; ?></td>
                                    <td><?php if($value->full_stomach==1){echo 'Yes';}else{echo 'Before Eat';} ?></td>
                                    <td><?php echo $value->other_instruction; ?></td>
                                    <td><?php echo $value->from_date; ?></td>
                                    <td><?php echo $value->to_date; ?></td>
                                    <td><?php echo $value->assign_by; ?></td>
                                    <td><?php echo $value->intake_time; ?></td>
                                </tr>
                                <?php $sl++; ?>
                            <?php } ?> 
                        <?php } ?> 
                    </tbody>
                </table>  <!-- /.table-responsive -->
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


<script type="text/javascript">
$(document).ready(function() {

    $('#mvReport').DataTable( {
        responsive: true, 
        dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>tp", 
        "lengthMenu": [[10, 25, 50, 100, 150, 200, -1], [10, 25, 50, 100, 150, 200, "All"]], 
        buttons: [ {extend: 'copy', className: 'btn-sm'}, 
        {extend: 'csv', title: 'ExampleFile', className: 'btn-sm'}, 
        {extend: 'excel', title: 'ExampleFile', className: 'btn-sm'}, 
        {extend: 'pdf', title: 'ExampleFile', className: 'btn-sm'}, 
        {extend: 'print', className: 'btn-sm'} ], 

    });
});
</script>
