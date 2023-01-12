<div class="row">
    <div class="col-sm-12">
        <div  class="panel panel-default thumbnail">
             <?php
             if($this->permission->method('add_doctor','create')->access() ){
             ?>
            <div class="panel-heading no-print">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="btn-group"> 
                            <a class="btn btn-success" href="<?php echo base_url("doctor/create") ?>"> <i class="fa fa-plus"></i>  <?php echo display('add_doctor') ?> </a>  
                        </div>
                    </div>
                    <form method="post" id="import_csv" enctype="multipart/form-data">
                        <div class="col-lg-1">
                            <div class="pull-right"> 
                                    <input type="file" name="csv_file" id="csv_file" required accept=".csv" />
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <button type="submit" name="import_csv" class="btn btn-info" id="import_csv_btn"><i class="fa fa-upload"></i> <?php echo display('import_csv_data') ?></button>
                        </div>
                    </form> 
                        <div class="col-lg-2">
                            <a download class="btn btn-primary" href="<?php echo base_url("assets/data/data.csv") ?>"> <i class="fa fa-download"></i>  <?php echo display('sample_csv') ?> </a> 
                        </div>
                </div>
            </div> 
            <?php } ?>


            <?php
            if($this->permission->method('doctor_list','read')->access() || $this->permission->method('doctor_list','update')->access() || $this->permission->method('doctor_list','delete')->access()){
            ?>
            <div class="panel-body">
                <!-- Nav tabs --> 
                <ul class="col-xs-12 nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"> 
                        <a href="#home" aria-controls="home" role="tab" data-toggle="tab"> <i class="fa fa-list"></i> <?php echo display('doctor_list')?></a>
                    </li>
                    <li role="presentation">
                        <a href="#language" aria-controls="language" role="tab" data-toggle="tab"> <i class="fa fa-list"></i> <?php echo display('language') ?></a>
                    </li>
                </ul>  

                <!-- Tab panes --> 
                <div class="col-xs-12 tab-content">
                    <br>
                    <!-- INFORMATION -->
                    <div role="tabpanel" class="tab-pane active" id="home">
                        <div class="row">
                            <div class="col-md-12"> 
                                <table class="datatable table table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th><?php echo display('serial') ?></th>
                                            <th><?php echo display('picture') ?></th>
                                            <th><?php echo display('first_name') ?></th>
                                            <th><?php echo display('last_name') ?></th>
                                            <th><?php echo display('department') ?></th>
                                            <th><?php echo display('email') ?></th> 
                                            <th><?php echo display('sex') ?></th>   
                                            <th><?php echo display('blood_group') ?></th> 
                                            <th><?php echo display('date_of_birth') ?></th> 
                                            <th><?php echo display('action') ?></th> 
                                            <th><?php echo display('user_role') ?></th> 
                                            <th><?php echo display('create_date') ?></th> 
                                            <?php
                                            if($this->permission->method('doctor_list','read')->access() || $this->permission->method('doctor_list','update')->access() || $this->permission->method('doctor_list','delete')->access()){
                                            ?>
                                            <th><?php echo display('status') ?></th>
                                            <?php } ?>
                                        </tr>
                                    </thead>
                                   <tbody>
                                   <?php if (!empty($doctors)) { ?>
                                    <?php $sl = 1; ?>
                                    <?php foreach ($doctors as $doctor) { ?>
                                        <tr class="<?php echo ($sl & 1)?"odd gradeX":"even gradeC" ?>">
                                            <td><?php echo $sl; ?></td>
                                            <td><img src="<?php echo (!empty($doctor->picture)?base_url($doctor->picture):base_url('assets_web/img/placeholder/profile.png')); ?>" alt="" width="65" height="50"/></td>
                                            <td><?php echo $doctor->firstname; ?></td>
                                            <td><?php echo $doctor->lastname; ?></td>
                                            <td><?php echo $doctor->name; ?></td>
                                            <td><?php echo $doctor->email; ?></td>
                                            <td><?php echo $doctor->sex; ?></td>
                                            <td><?php echo $doctor->blood_group; ?></td>
                                            <td><?php echo $doctor->date_of_birth; ?></td>
                                            <td>
                                                <?php
                                                if($this->permission->method('doctor_list','read')->access() || $this->permission->method('doctor_list','update')->access() || $this->permission->method('doctor_list','delete')->access()){
                                                ?>
                                                <div class="action-btn">
                                                <?php
                                                if($this->permission->method('doctor_list','read')->access()){
                                                ?>
                                                   <a href="<?php echo base_url("doctor/add_language/$doctor->user_id") ?>" class="btn btn-xs btn-success"><i class="fa fa-plus"></i></a>
                                                   <a href="<?php echo base_url("doctor/profile/$doctor->user_id") ?>" class="btn btn-xs btn-success"><i class="fa fa-eye"></i></a> 
                                                <?php } ?>

                                                <?php
                                                if($this->permission->method('doctor_list','update')->access()){
                                                ?>
                                                 <a href="<?php echo base_url("doctor/edit/$doctor->user_id") ?>" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a> 
                                               <?php } ?>

                                                <?php
                                                if($this->permission->method('doctor_list','delete')->access()){
                                                ?>
                                                 <a href="<?php echo base_url("doctor/delete/$doctor->user_id") ?>" class="btn btn-xs btn-danger" onclick="return confirm('<?php echo display('are_you_sure') ?> ')"><i class="fa fa-trash"></i></a>
                                               <?php } ?>
                                                
                                                </div> 
                                                <?php } ?>
                                            </td>
                                            <td><?php echo (($doctor->user_role == 2)?display('doctor'):null) ?></td> 
                                            <td><?php echo $doctor->create_date; ?></td>
                                            <td><?php echo (($doctor->status==1)?display('active'):display('inactive')); ?></td>
                                        </tr>
                                          <?php $sl++; ?>
                                       <?php } ?> 
                                    <?php } ?> 
                                  </tbody>
                                </table>  <!-- /.table-responsive -->
                            </div>
                        </div>
                    </div> 

                    <div role="tabpanel" class="tab-pane" id="language">
                        <div class="row">
                            <div class="col-sm-12">
                               <table class="datatable table table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th><?php echo display('serial') ?></th>
                                            <th><?php echo display('language') ?></th>
                                            <th><?php echo display('doctor_name') ?></th>
                                            <th><?php echo display('designation') ?></th>
                                            <th><?php echo display('specialist') ?></th> 
                                            <th><?php echo display('mobile') ?></th> 
                                         <?php
                                            if($this->permission->method('doctor_list','read')->access() || $this->permission->method('doctor_list','update')->access() || $this->permission->method('doctor_list','delete')->access()){
                                            ?>
                                             <th><?php echo display('action') ?></th> 
                                            <?php }?>
                                        </tr>
                                    </thead>
                                   <tbody>
                                   <?php if (!empty($languages)) { ?>
                                    <?php $sl = 1; ?>
                                    <?php foreach ($languages as $doctor) { ?>
                                        <tr class="<?php echo ($sl & 1)?"odd gradeX":"even gradeC" ?>">
                                            <td><?php echo $sl; ?></td>
                                             <td><?php echo $doctor->language; ?></td>
                                            <td><?php echo $doctor->firstname.' '.$doctor->lastname; ?></td>
                                            <td><?php echo $doctor->designation; ?></td>
                                            <td><?php echo $doctor->specialist; ?></td>
                                            <td><?php echo $doctor->mobile; ?></td>
                                            <td>
                                                <?php
                                                if($this->permission->method('doctor_list','read')->access() || $this->permission->method('doctor_list','update')->access() || $this->permission->method('doctor_list','delete')->access()){
                                                ?>
                                                <div class="action-btn">

                                                <?php
                                                if($this->permission->method('doctor_list','update')->access()){
                                                ?>
                                                 <a href="<?php echo base_url("doctor/edit_lang/$doctor->id") ?>" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a> 
                                               <?php } ?>

                                                <?php
                                                if($this->permission->method('doctor_list','delete')->access()){
                                                ?>
                                                 <a href="<?php echo base_url("doctor/delete_lang/$doctor->id") ?>" class="btn btn-xs btn-danger" onclick="return confirm('<?php echo display('are_you_sure') ?> ')"><i class="fa fa-trash"></i></a>
                                               <?php } ?>
                                                
                                                </div> 
                                                <?php } ?>
                                            </td>
                                            
                                        </tr>
                                          <?php $sl++; ?>
                                       <?php } ?> 
                                    <?php } ?> 
                                  </tbody>
                                </table>  <!-- /.table-responsive -->
                            </div>
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
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $('#import_csv').on('submit', function(event){
          event.preventDefault();
          $.ajax({
           url:"<?php echo base_url(); ?>doctor/import",
           method:"POST",
           data:new FormData(this),
           contentType:false,
           cache:false,
           processData:false,
           beforeSend:function(){
            $('#import_csv_btn').html('Importing...');
           },
           success:function(data)
           {
            $('#import_csv')[0].reset();
            $('#import_csv_btn').attr('disabled', false);
            $('#import_csv_btn').html('Import Done');
            setInterval(function(){
                history.go(0);
            }, 5000);
           }
          })
         });
    });
</script>
