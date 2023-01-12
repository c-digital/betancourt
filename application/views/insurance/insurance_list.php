<div class="row">
    <div class="col-sm-12">
        <div  class="panel panel-default thumbnail">
            <?php
            if($this->permission->method('add_insurance','create')->access()){
            ?>
            <div class="panel-heading no-print">
                <div class="btn-group"> 
                    <a class="btn btn-success" href="<?php echo base_url("insurance/insurance/form") ?>"> <i class="fa fa-plus"></i>  <?php echo display('add_insurance') ?> </a>  
                </div>
            </div> 
            <?php } ?>


            <?php
            if($this->permission->method('insurance_list','read')->access() || $this->permission->method('insurance_list','update')->access() || $this->permission->method('insurance_list','delete')->access()){
            ?>
            <div class="panel-body">
                <table width="100%" class="datatable2 table table-striped table-bordered table-hover">
                    <thead> 
                        <tr>
                            <th><?php echo display('serial') ?></th>
                            <th><?php echo display('insurance_name') ?></th>
                            <th><?php echo display('service_tax') ?></th>
                            <th><?php echo display('discount') ?></th>
                            <th><?php echo display('insurance_no') ?></th>
                            <th><?php echo display('insurance_code') ?></th>
                            <th><?php echo display('hospital_rate') ?></th>
                            <th><?php echo display('insurance_rate') ?></th>
                            <th><?php echo display('total') ?></th>
                            <th><?php echo display('status') ?></th>
                            <?php
                            if($this->permission->method('insurance_list','read')->access() || $this->permission->method('insurance_list','update')->access() || $this->permission->method('insurance_list','delete')->access()){
                            ?>
                            <th width="80"><?php echo display('action') ?></th>
                            <?php } ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($insurances)) { ?>
                            <?php $sl = 1; ?>
                            <?php foreach ($insurances as $insurance) { ?>
                                <tr>
                                    <td><?php echo $sl; ?></td>
                                    <td><?php echo $insurance->insurance_name; ?></td>
                                    <td><?php echo $insurance->service_tax; ?></td>
                                    <td><?php echo $insurance->discount; ?></td>
                                    <td><?php echo $insurance->insurance_no; ?></td>
                                    <td><?php echo $insurance->insurance_code; ?></td> 
                                    <td><?php echo $insurance->hospital_rate; ?></td> 
                                    <td><?php echo $insurance->insurance_rate; ?></td> 
                                    <td><?php echo $insurance->total; ?></td> 
                                    <td><?php echo (($insurance->status==1)?display('active'):display('inactive')); ?></td>

                                    <?php
                                    if($this->permission->method('insurance_list','read')->access() || $this->permission->method('insurance_list','update')->access() || $this->permission->method('insurance_list','delete')->access()){
                                    ?>
                                    <td class="center">
                                    <?php
                                    if($this->permission->method('insurance_list','read')->access()){
                                    ?>
                                        <a href="<?php echo base_url("insurance/insurance/view/$insurance->id") ?>" class="btn btn-xs btn-success"><i class="fa fa-eye"></i></a> 
                                    <?php } ?>

                                    <?php
                                    if($this->permission->method('insurance_list','update')->access()){
                                    ?>
                                        <a href="<?php echo base_url("insurance/insurance/update/$insurance->id") ?>" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a> 
                                    <?php } ?>


                                    <?php
                                    if($this->permission->method('insurance_list','delete')->access()){
                                    ?>
                                        <a href="<?php echo base_url("insurance/insurance/delete/$insurance->id") ?>" class="btn btn-xs btn-danger" onclick="return confirm('<?php echo display('are_you_sure') ?>')"><i class="fa fa-trash"></i></a> 
                                    <?php } ?>

                                    </td>
                                    <?php } ?>

                                </tr>
                                <?php $sl++; ?>
                            <?php } ?> 
                        <?php } ?> 
                    </tbody>
                </table>  <!-- /.table-responsive -->
                <?php echo $links; ?>
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