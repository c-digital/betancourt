<div class="row">
    <form action="">
        <div class="col-sm-4">
            <div class="form-group">
                <label for="inicio">Fecha inicio</label>
                <input type="date" class="form-control" name="inicio" value="<?php echo (isset($_GET['inicio']) && $_GET['inicio'] != '') ? $_GET['inicio'] : ''; ?>">
            </div>
        </div>

        <div class="col-sm-4">
            <div class="form-group">
                <label for="fin">Fecha fin</label>
                <input type="date" class="form-control" name="fin" value="<?php echo (isset($_GET['fin']) && $_GET['fin'] != '') ? $_GET['fin'] : ''; ?>">
            </div>
        </div>

        <div class="col-sm-4">
            <div class="form-group">
                <label for="profesional">Profesional</label>
                <input type="text" class="form-control" name="profesional" value="<?php echo (isset($_GET['profesional']) && $_GET['profesional'] != '') ? $_GET['profesional'] : ''; ?>">
            </div>
        </div>

        <div class="col-sm-4">
            <div class="form-group">
                <label for="paciente">Paciente</label>
                <input type="text" class="form-control" name="paciente" value="<?php echo (isset($_GET['paciente']) && $_GET['paciente'] != '') ? $_GET['paciente'] : ''; ?>">
            </div>
        </div>

        <div class="col-sm-4">
            <div class="form-group">
                <label for="estado">Estado</label>
                <select name="estado" class="form-control">
                    <option value=""></option>
                    <option value="En espera">En espera</option>
                    <option value="En atención">En atención</option>
                    <option value="Pagado">Pagado</option>
                    <option value="Cancelada">Cancelada</option>
                </select>
            </div>
        </div>

        <div class="col-sm-4" style="margin-top: 24px">
            <div class="form-group">
                <button type="submit" class="btn btn-success btn-block">
                    <i class="fa fa-eye"></i> Buscar
                </button>
            </div>
        </div>
    </form>
</div>

<div class="row">
    <div class="col-sm-12">
        <div  class="panel panel-default thumbnail">
            <div class="panel-heading no-print">
                <div class="btn-group">
                    <?php if ($this->permission->method('add_consulta', 'create')->access()): ?>
                            <a class="btn btn-success" href="<?php echo base_url("consultas/create") ?>"> <i class="fa fa-plus"></i>  <?php echo 'Crear consulta' ?> </a>
                    <?php endif; ?>
                </div>
            </div> 

            <?php if ($this->permission->method('consultas','read')->access()) { ?>
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                              <th>Paciente</th>
                              <th>Profesional</th>
                              <th>Fecha</th>
                              <th>Monto</th>
                              <th>Estado</th>
                              <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($consultas)) { ?>
                                <?php $sl = 1; ?>
                                <?php foreach ($consultas as $consulta) { ?>
                                    <tr>
                                        <td><?php echo $consulta->id; ?></td>
                                        <td><?php echo $consulta->paciente; ?></td>
                                        <td><?php echo $consulta->profesional; ?></td>
                                        <td><?php echo $consulta->fecha; ?></td>
                                        <td><?php echo $consulta->monto; ?></td>
                                        <td><?php echo ($consulta->estado) ? $consulta->estado : 'En espera'; ?></td>
                                        <td>
                                           <?php if (!$consulta->estado): ?>
                                              <a class="btn btn-default btn-xs" href="/consultas/editar/<?php echo $consulta->id; ?>?estado=En atención">
                                                 <i class="fa fa-check"></i> Atender
                                              </a>

                                              <a class="btn btn-default btn-xs" href="/consultas/editar/<?php echo $consulta->id; ?>?estado=Cancelar">
                                                 <i class="fa fa-times"></i> Cancelar
                                              </a>
                                           <?php endif; ?>

                                           <a class="btn btn-default btn-xs" href="/consultas/ver/<?php echo $consulta->id; ?>">
                                              <i class="fa fa-eye"></i> Ver
                                           </a>

                                           <?php if ($estado == 'Caja abierta' && $consulta->estado != 'Pagado'): ?>
                                               <button type="button" data-toggle="modal" data-id="<?php echo $consulta->id; ?>" data-target="#modalCobrar" class="btn btn-default btn-xs">
                                                  <i class="fa fa-money"></i> Cobrar
                                               </button>
                                           <?php endif; ?>

                                           <?php if ($consulta->estado == 'Pagado'): ?>
                                               <a class="btn btn-default btn-xs" href="/consultas/factura/<?php echo $consulta->id; ?>">
                                                  <i class="fa fa-file"></i> Ver factura
                                               </a>
                                           <?php endif; ?>

                                            <?php if ($this->permission->method('consultas','update')->access()): ?>
                                               <a class="btn btn-default btn-xs" href="/consultas/editar/<?php echo $consulta->id; ?>">
                                                  <i class="fa fa-edit"></i> Editar
                                               </a>
                                            <?php endif; ?>


                                            <?php if ($this->permission->method('consultas','delete')->access()): ?>
                                               <a onclick="confirm_delete(event, this)" class="btn btn-danger btn-xs" href="/consultas/eliminar/<?php echo $consulta->id; ?>">
                                                  <i class="fa fa-trash"></i> Eliminar
                                               </a>
                                            <?php endif; ?>
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

<div class="modal fade" id="modalCobrar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close close_crear_proveedor" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Agregar movimiento</h4>
      </div>

      <form action="" method="POST">
          <div class="modal-body">
            <div class="form-group">
                <label for="efectivo">Efectivo</label>
                <input type="number" name="pagos[efectivo]" value="0.00" class="form-control">
            </div>

            <div class="form-group">
                <label for="credito">Crédito</label>
                <input type="number" name="pagos[credito]" value="0.00" class="form-control">
            </div>

            <div class="form-group">
                <label for="debito">Débito</label>
                <input type="number" name="pagos[debito]" value="0.00" class="form-control">
            </div>

            <div class="form-group">
                <label for="qr">QR</label>
                <input type="number" name="pagos[qr]" value="0.00" class="form-control">
            </div>

            <div class="form-group">
                <label for="transferancia">Transferencia</label>
                <input type="number" name="pagos[transferancia]" value="0.00" class="form-control">
            </div>

            <div class="form-group">
                <label for="otro">Otro</label>
                <input type="number" name="pagos[otro]" value="0.00" class="form-control">
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
        $('#modalCobrar').on('show.bs.modal', function (event) {
          id = $(event.relatedTarget).attr('data-id');
          modal = $(this);
          form = modal.parents().find('form');
          form.attr('action', '/consultas/cobrar/' + id);
        })
    });
</script>