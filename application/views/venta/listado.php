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
                            <a class="btn btn-success" href="<?php echo base_url("pharmacy/venta") ?>"> <i class="fa fa-plus"></i>  <?php echo 'Agregar venta' ?> </a>  
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-12"></div>
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
                            <th><?php echo '#' ?></th>
                            <th><?php echo 'Cliente' ?></th>
                            <th><?php echo 'Fecha' ?></th>
                            <th><?php echo 'Total' ?></th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody> 
                        <?php if (!empty($ventas)) { ?>
                            <?php $sl = 1; ?>
                            <?php
                                foreach ($ventas as $venta) {
                                    $total = 0;

                                    foreach (json_decode($venta->productos) as $item) {
                                        $total = $total + ($item->precio * $item->cantidad);
                                    }

                                    $total = $total - $venta->descuento;

                                    $total = number_format($total, 2);
                            ?>
                                <tr class="<?php echo ($sl & 1)?"odd gradeX":"even gradeC" ?>">
                                <td><?php echo $sl; ?></td>
                                <td><?php echo $venta->cliente; ?></td>
                                <td><?php echo $venta->fecha; ?></td>
                                <td><?php echo $total; ?></td>
                                <td>
                                    <a target="_blank" href="/pharmacy/venta/factura/<?php echo $venta->id; ?>" class="btn btn-xs btn-success">Ver factura</a>
                                </td>
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

 <div class="modal fade" id="modal_form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h2 class="modal-title pull-left" id="exampleModalLabel"><?= display('discharged')?></h2>
              </div>
              <div class="modal-body form">
                 <?php echo form_open('bed_manager/bed_assign/discharged_pid','class="form-horizontal" id="form"') ?>
           
                    <div class="form-body">
                      <div class="form-group">
                        <label class="control-label col-md-3"><?php echo display('patient_id') ?> <i class="text-danger">*</i></label>
                        <div class="col-md-9">
                          <input name="patient_id" placeholder="<?php echo display('patient_id') ?>" class="form-control" type="text" readonly>
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="control-label col-md-3"><?= display('discharge_date')?> <i class="text-danger">*</i></label>
                        <div class="col-md-9">
                          <input name="discharge_date" placeholder="<?= display('discharge_date')?>" class="form-control cdatepicker" type="text">
                        </div>
                      </div>

                      
                   </div>
                </div>
                <div class="modal-footer">
                  <button type="submit" id="btnSave" class="btn btn-primary">Save</button>
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
                <?php echo form_close() ?>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal"><?= display('close')?></button>
              </div>
            </div>
          </div>
        </div>
<script type="text/javascript">
     function discharged(id){
          $('#form')[0].reset();
          $('[name="patient_id"]').val(id);
    };

    $(document).ready(function() {
        //custom date picker
        $('.cdatepicker').datepicker({
            minDate:0,
            dateFormat: "dd-mm-yy"
        });
    });
 </script>