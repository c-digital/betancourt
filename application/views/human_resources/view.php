<div class="row">
    <div class="col-sm-12">
        <div  class="panel panel-default thumbnail">
        <?php
        if($this->permission->method('add_employee','create')->access()){
        ?>
            <div class="panel-heading no-print">
                <div class="btn-group"> 
                    <a class="btn btn-success" href="<?php echo base_url("human_resources/employee/form") ?>"> <i class="fa fa-plus"></i>  <?php echo display('add_employee') ?> </a>   
                </div>
            </div> 
        <?php } ?>

            <div class="panel-body">
                <!-- Nav tabs --> 
                <ul class="col-xs-12 nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"> 
                        <a href="#home" aria-controls="home" role="tab" data-toggle="tab"> <i class="fa fa-list"></i> <?php echo display('employee_list')?></a>
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
                                <table width="100%" class="datatable table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th><?php echo display('serial') ?></th>
                                            <th><?php echo display('picture') ?></th>
                                            <th><?php echo display('first_name') ?></th>
                                            <th><?php echo display('last_name') ?></th>
                                            <th><?php echo display('email') ?></th>
                                            <th><?php echo display('sex') ?></th>
                                            <th><?php echo display('create_date') ?></th>
                                            <th><?php echo display('status') ?></th>
                                            <th><?php echo display('action') ?></th> 
                                            <th><?php echo display('user_role') ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($employees)) { ?>
                                            <?php $sl = 1; ?>
                                            <?php foreach ($employees as $employee) { ?>
                                                <tr class="<?php echo ($sl & 1)?"odd gradeX":"even gradeC" ?>">
                                                    <td><?php echo $sl; ?></td>
                                                    <td><img src="<?php echo (!empty($employee->picture) ? base_url($employee->picture) : base_url("assets_web/img/placeholder/profile.png")) ?>" width="65" height="50"/></td>
                                                    <td><?php echo $employee->firstname; ?></td>
                                                    <td><?php echo $employee->lastname; ?></td>
                                                    <td><?php echo $employee->email; ?></td>
                                                    <td><?php echo $employee->sex; ?></td>
                                                    <td><?php echo $employee->create_date; ?></td>
                                                    <td><?php echo (($employee->status==1)?display('active'):display('inactive')); ?></td>
                                                    <td class="center">
                                                     <a href="<?php echo base_url("human_resources/employee/add_language/$employee->user_id") ?>" class="btn btn-xs btn-success"><i class="fa fa-plus"></i></a> 
                                                     <a href="<?php echo base_url("billing/professional?profesional=$employee->user_id") ?>" class="btn btn-xs btn-success"><i class="fa fa-money"></i> Ver pagos por servicios</a> 
                                                     <a href="<?php echo base_url("human_resources/employee/profile/$employee->user_id") ?>" class="btn btn-xs btn-info"><i class="fa fa-eye"></i></a> 
                                                     <a href="<?php echo base_url("human_resources/employee/form/$employee->user_id") ?>" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>   
                                                     <a href="<?php echo base_url("human_resources/employee/delete/$employee->user_id/$employee->user_role") ?>" class="btn btn-xs btn-danger" onclick="return confirm('<?php echo display('are_you_sure') ?>')"><i class="fa fa-trash"></i></a> 
                                                    </td>
                                                    <td>
                                                        <?php
                                                        foreach($role_name as $r_data){
                                                          if($r_data->user_id == $employee->user_id){
                                                            ?>
                                                            <button class="btn btn-info"><?php echo $r_data->type;?></button>
                                                            <?php
                                                          }
                                                        }
                                                        ?>
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

                    <div role="tabpanel" class="tab-pane" id="language">
                        <div class="row">
                            <div class="col-sm-12">
                               <table width="100%" class="datatable table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th><?php echo display('serial') ?></th>
                                            <th><?php echo display('user') ?></th>
                                            <th><?php echo display('language') ?></th>
                                            <th><?php echo display('first_name') ?></th>
                                            <th><?php echo display('last_name') ?></th>
                                            <th><?php echo display('designation') ?></th>
                                            <th><?php echo display('phone') ?></th>
                                            <th><?php echo display('specialist') ?></th>
                                            <th><?php echo display('address') ?></th>
                                            <th><?php echo display('action') ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($employeeLang)) { ?>
                                            <?php $sl = 1; ?>
                                            <?php foreach ($employeeLang as $employee) { ?>
                                                <tr class="<?php echo ($sl & 1)?"odd gradeX":"even gradeC" ?>">
                                                    <td><?php echo $sl; ?></td>
                                                    <td><?php echo $employee->fullname; ?></td>
                                                    <td><?php echo $employee->language; ?></td>
                                                    <td><?php echo $employee->firstname; ?></td>
                                                    <td><?php echo $employee->lastname; ?></td>
                                                    <td><?php echo $employee->designation; ?></td>
                                                    <td><?php echo $employee->phone; ?></td>
                                                    <td><?php echo $employee->specialist; ?></td>
                                                    <td><?php echo $employee->address; ?></td>
                 
                                                    <td class="center">
                                                     <a href="<?php echo base_url("human_resources/employee/profile/$employee->user_id") ?>" class="btn btn-xs btn-info"><i class="fa fa-eye"></i></a> 
                                                     <a href="<?php echo base_url("human_resources/employee/edit_lang/$employee->id") ?>" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>   
                                                     <a href="<?php echo base_url("human_resources/employee/delete_lang/$employee->id") ?>" class="btn btn-xs btn-danger" onclick="return confirm('<?php echo display('are_you_sure') ?>')"><i class="fa fa-trash"></i></a> 
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

        </div>
    </div>
</div>