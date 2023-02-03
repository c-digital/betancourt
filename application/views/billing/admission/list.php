<div class="row">
    <!--  table area -->
    <div class="col-sm-12">
        <div  class="panel panel-default thumbnail">
        <?php
        if($this->permission->method('add_admission','create')->access()){
        ?>
            <div class="panel-heading no-print">
                <div class="btn-group"> 
                    <a class="btn btn-success" href="<?php echo base_url("billing/admission/form") ?>"> <i class="fa fa-plus"></i>  <?php echo display('add_admission') ?> </a>  

                     <a class="btn btn-primary" href="<?php echo base_url("billing/bill/") ?>"> <i class="fa fa-list"></i>  <?php echo display('bill_list') ?> </a>  

                     <a class="btn btn-primary" href="<?php echo base_url("billing/admission") ?>"> <i class="fa fa-list"></i>  <?php echo 'Ver no finalizadas' ?> </a>  

                     <a class="btn btn-primary" href="<?php echo base_url("billing/admission?estado=finished") ?>"> <i class="fa fa-list"></i>  <?php echo 'Ver finalizadas' ?> </a>  
                    
                </div>
            </div>
        <?php } ?>

 
        <?php
        if($this->permission->method('admission_list','read')->access() || $this->permission->method('admission_list','update')->access() || $this->permission->method('admission_list','delete')->access()){
        ?>
            <div class="panel-body">
                <table class="datatable2 table table-striped table-bordered" cellspacing="0" width="100%">
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
                            <th><?php echo display('action') ?></th>
                            <th><?php echo display('package_name') ?></th>
                            <th><?php echo display('insurance_name') ?></th>
                            <th><?php echo display('policy_no') ?></th>
                            <th><?php echo display('agent_name') ?></th>
                            <th><?php echo display('guardian_relation') ?></th>
                            <th><?php echo display('guardian_address') ?></th>
                            <th><?php echo display('status') ?></th>
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
                                    <td>
                                        <center>

                                        <!-- <a href="/billing/sales/cash?id_admission=<?php echo $admission->admission_id; ?>" class="btn btn-primary btn-xs">Venta a contado</a>

                                        <a href="/billing/sales/credit?id_admission=<?php echo $admission->admission_id; ?>" class="btn btn-primary btn-xs">Venta a crédito</a>-->

                                        <!--  <a href="<?php echo base_url("billing/advance/form?aid=$admission->admission_id") ?>" class="btn btn-xs  btn-primary" data-toggle="tooltip" data-placement="top" title="<?= display('advance_payment')?>"><i class="fa fa-dollar"></i></a> -->

                                        <a href="/billing/bill/all/<?php echo $admission->admission_id ?>" class="btn btn-info btn-xs">Liquidación</a>

                                         <?php
                                        if($this->permission->method('admission_list','create')->access() || $this->permission->method('admission_list','update')->access()){
                                        ?>
                                        <a href="<?php echo base_url("billing/bill/form?aid=$admission->admission_id") ?>" class="btn btn-xs  btn-success" data-toggle="tooltip" data-placement="top" title="<?= display('add_bill')?>"> Venta de contado</a> 
                                         <?php } ?>  

                                          <?php
                                        if($this->permission->method('admission_list','create')->access() || $this->permission->method('admission_list','update')->access()){
                                        ?>
                                        <a href="<?php echo base_url("billing/bill/form_credit?aid=$admission->admission_id") ?>" class="btn btn-xs  btn-success" data-toggle="tooltip" data-placement="top" title="<?= display('add_bill')?>"> Venta a credito</a> 
                                         <?php } ?>  

                                        <!--   <?php
                                        if($this->permission->method('admission_list','create')->access() || $this->permission->method('admission_list','update')->access()){
                                        ?>
                                        <a href="<?php echo base_url("billing/bill/form?aid=$admission->admission_id") ?>" class="btn btn-xs  btn-success" data-toggle="tooltip" data-placement="top" title="<?= display('add_bill')?>"><i class="fa fa-file"></i></a> 
                                         <?php } ?>   -->

                                         <?php
                                        if($this->permission->method('add_medication','create')->access()){
                                        ?>
                                        <a href="<?php echo base_url("medication_visit/medications/create?pid=$admission->patient_id") ?>" class="btn btn-xs  btn-info" data-toggle="tooltip" data-placement="top" title="<?= display('add_medication')?>"><i class="fa fa-user-md"></i> Agregar medicación</a> 
                                         <?php } ?> 

                                          <?php
                                        if($this->permission->method('add_medication','create')->access()){
                                        ?>
                                        <a href="<?php echo base_url("medication_visit/visits/create?pid=$admission->patient_id") ?>" class="btn btn-xs  bg-navy-blue" data-toggle="tooltip" data-placement="top" title="<?= display('add_visit')?>"><?= display('patient_visit')?></a> 
                                         <?php } ?>

                                         <a data-toggle="modal" data-target="#modalFinalizarInternacion" data-admission-id="<?php echo $admission->admission_id; ?>" class="btn btn-success btn-xs marcar-como-finalizado">Marcar como finalizado</a>

                                         </center>
                                    </td>
                                    <td><?php echo $admission->package_name; ?></td>
                                    <td><?php echo $admission->insurance_name; ?></td>
                                    <td><?php echo $admission->policy_no; ?></td>
                                    <td><?php echo $admission->agent_name; ?></td>
                                    <td><?php echo $admission->guardian_relation; ?></td>
                                    <td><?php echo $admission->guardian_address; ?></td>
                                    <td><?php echo (($admission->status==1)?display('active'):display('inactive')); ?></td>

                                    <?php
                                    if($this->permission->method('admission_list','update')->access() || $this->permission->method('admission_list','delete')->access()){
                                    ?>
                                     <td class="center">
                                        <?php
                                        if($this->permission->method('admission_list','update')->access()){
                                        ?>
                                        <a href="<?php echo base_url("billing/admission/edit/$admission->admission_id") ?>" class="btn btn-xs  btn-primary"><i class="fa fa-edit"></i></a> 
                                         <?php } ?> 

                                        <?php
                                        if($this->permission->method('admission_list','delete')->access()){
                                        ?>
                                        <a href="<?php echo base_url("billing/admission/delete/$admission->admission_id") ?>" onclick="return confirm('<?php echo display("are_you_sure") ?>')" class="btn btn-xs  btn-danger"><i class="fa fa-trash"></i></a> 
                                         <?php } ?>


                                     </td>
                                    <?php } ?> 
                                </tr>
                                <?php $sl++; ?>
                            <?php } ?> 
                        <?php } ?> 
                    </tbody>
                </table>  <!-- /.table-responsive -->
                <?php echo (!empty($links)?$links:null); ?>
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


<div class="modal fade" id="modalFinalizarInternacion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close close_crear_proveedor" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Agregar pago</h4>
      </div>

      <form action="/billing/admission/finish" method="POST">
          <div class="modal-body">
            <div class="form-group">
                <label for="fecha">Fecha de alta</label>
                <input type="date" required class="form-control" name="fecha">
                <input type="hidden" name="admission_id" required>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary">Registrar</button>
          </div>
      </form>
    </div>
  </div>
</div>

<script>
    $(document).ready(function () {
        $('.marcar-como-finalizado').click(function () {
            admission_id = $(this).attr('data-admission-id');
            $('[name=admission_id]').val(admission_id);
        });
    });
</script>