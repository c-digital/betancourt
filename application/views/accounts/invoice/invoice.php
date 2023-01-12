<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default thumbnail">

            <?php
             if($this->permission->method('add_invoice','create')->access()){
            ?>
            <div class="panel-heading no-print">
                <div class="btn-group"> 
                    <a class="btn btn-success" href="<?php echo base_url("accounts/invoice/create") ?>"> <i class="fa fa-plus"></i>  <?php echo display('add_invoice') ?> </a>  
                </div>
            </div>  
            <?php } ?>

            <?php
            if($this->permission->method('invoice_list','read')->access() || $this->permission->method('invoice_list','update')->access() || $this->permission->method('invoice_list','delete')->access()){
            ?>
            <div class="panel-body">
                <table width="100%" class="datatable table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th><?php echo display('serial') ?></th>
                            <th><?php echo display('date') ?></th>
                            <th><?php echo display('patient_id') ?></th>
                            <th><?php echo display('total') ?>
                            <th><?php echo display('vat') ?></th></th>
                            <th><?php echo display('discount') ?></th></th>
                            <th><?php echo display('grand_total') ?></th></th>
                            <th><?php echo display('paid') ?></th></th>
                            <th><?php echo display('due') ?></th></th>
                            <th><?php echo display('status') ?></th>
                            <?php
                            if($this->permission->method('invoice_list','read')->access() || $this->permission->method('invoice_list','update')->access() || $this->permission->method('invoice_list','delete')->access()){
                            ?>
                            <th width="80"><?php echo display('action') ?></th>
                            <?php } ?>

                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        if (!empty($invoice)) {
                            $sl = 1;
                            foreach ($invoice as $value) {
                        ?>
                            <tr class="<?php echo ($sl & 1)?"odd gradeX":"even gradeC" ?>">
                                <td><?php echo $sl; ?></td>
                                <td><?php echo date('d-m-Y', strtotime($value->date)); ?></td>
                                <td><?php echo $value->patient_id; ?></td>
                                <td><?php echo sprintf('%0.2f', $value->total); ?></td>
                                <td><?php echo sprintf('%0.2f', $value->vat); ?></td>
                                <td><?php echo  sprintf('%0.2f', $value->discount); ?></td>
                                <td><?php echo sprintf('%0.2f', $value->grand_total); ?></td>
                                <td><?php echo  sprintf('%0.2f', $value->paid); ?></td>
                                <td><?php echo sprintf('%0.2f', $value->due); ?></td>
                                <td><?php echo (($value->status==1)?display('active'):display('inactive')); ?></td>

                                <?php
                                if($this->permission->method('invoice_list','read')->access()  || $this->permission->method('invoice_list','update')->access() || $this->permission->method('invoice_list','delete')->access()){
                                ?>
                                <td class="center">
                                     <?php
                                    if($this->permission->method('invoice_list','read')->access()){
                                    ?>
                                     <a href="<?php echo base_url("accounts/invoice/view/$value->id") ?>" class="btn btn-xs btn-success"><i class="fa fa-eye"></i></a> 
                                    <?php } ?>

                                   <?php
                                    if($this->permission->method('invoice_list','update')->access()){
                                    ?>
                                     <a href="<?php echo base_url("accounts/invoice/edit/$value->id") ?>" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a> 
                                    <?php } ?>

                                    <?php
                                    if($this->permission->method('invoice_list','delete')->access()){
                                    ?>
                                      <a href="<?php echo base_url("accounts/invoice/delete/$value->id") ?>" onclick="return confirm('<?php echo display("are_you_sure") ?>')" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a> 
                                    <?php } ?>

                                </td>
                                <?php } ?>

                            </tr>
                        <?php 
                            $sl++;

                            }
                        } 
                        ?> 
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
