<div class="row">
    <div class="col-sm-12">
        <div  class="panel panel-default thumbnail">
            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                        <div class="info-box bg-olive">
                            <span class="info-box-icon"><i class="fa fa-arrow-up"></i></span>

                            <div class="info-box-content">
                              <span class="info-box-text">Entradas</span>
                              <span class="info-box-number">BOB <?php echo number_format($entradas, 2) ?></span>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                        <div class="info-box bg-yellow">
                            <span class="info-box-icon"><i class="fa fa-arrow-down"></i></span>

                            <div class="info-box-content">
                              <span class="info-box-text">Salidas</span>
                              <span class="info-box-number">BOB <?php echo number_format($salidas, 2) ?></span>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                        <div class="info-box bg-navy-blue">
                            <span class="info-box-icon"><i class="fa fa-money"></i></span>

                            <div class="info-box-content">
                              <span class="info-box-text"><?= 'Dinero en caja' ?></span>
                              <span class="info-box-number">BOB <?php echo number_format((float) $saldo, 2); ?></span>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                        <div class="info-box bg-blue">
                            <span class="info-box-icon"><i class="fa <?php echo ($estado == 'Caja abierta') ? 'fa-check' : 'fa-times' ?>"></i></span>

                            <div class="info-box-content">
                              <span class="info-box-text"><?= 'Estado' ?></span>
                              <span class="info-box-number"><?php echo $estado ?></span>
                            </div>
                        </div>
                    </div>
                </div>

                <form action="" style="margin-bottom: 3%; margin-top: 3%">
                    <div class="row">
                        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                            <label for="inicio">Fecha inicio</label>
                            <input type="date" class="form-control" name="inicio" value="<?php echo (isset($_GET['inicio'])) ? $_GET['inicio'] : '' ?>">
                        </div>

                        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                            <label for="fin">Fecha fin</label>
                            <input type="date" class="form-control" name="fin" value="<?php echo (isset($_GET['inicio'])) ? $_GET['fin'] : '' ?>">
                        </div>

                        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                            <label for="metodo_pago">Método de pago</label>
                            <select name="metodo_pago" class="form-control">
                                <option value="Todos">Todos</option>
                                <option <?php echo (isset($_GET['metodo_pago']) && $_GET['metodo_pago'] == 'Efectivo') ? 'selected' : '' ?> value="Efectivo">Efectivo</option>
                                <option <?php echo (isset($_GET['metodo_pago']) && $_GET['metodo_pago'] == 'Transferencia') ? 'selected' : '' ?> value="Transferencia">Transferencia</option>
                                <option <?php echo (isset($_GET['metodo_pago']) && $_GET['metodo_pago'] == 'Cheque') ? 'selected' : '' ?> value="Cheque">Cheque</option>
                            </select>
                        </div>

                        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                            <label for="tipo_movimiento">Tipo de movimiento</label>
                            <select name="tipo_movimiento" class="form-control">
                                <option value="Todos">Todos</option>
                                <option <?php echo (isset($_GET['tipo_movimiento']) && $_GET['tipo_movimiento'] == 'Entrada') ? 'selected' : '' ?> value="Entrada">Entrada</option>
                                <option <?php echo (isset($_GET['tipo_movimiento']) && $_GET['tipo_movimiento'] == 'Salida') ? 'selected' : '' ?> value="Salida">Salida</option>
                            </select>
                        </div>

                        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                            <label for="cajero">Cajero</label>
                            <select name="cajero" class="form-control">
                                <option value="Todos">Todos</option>
                                <?php foreach ($cajeros as $cajero): ?>
                                    <option <?php echo (isset($_GET['cajero']) && $_GET['cajero'] == $cajero->nombre) ? 'selected' : '' ?> value="<?php echo $cajero->nombre; ?>"><?php echo $cajero->nombre; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                            <label for="">&nbsp;</label>
                            <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-eye"></i> Buscar</button>
                        </div>
                    </div>
                </form>

                <div class="text-center" style="margin-bottom: 3%">
                    <?php if ($estado == 'Caja abierta'): ?>
                        <a href="" class="btn btn-success" data-toggle="modal" data-target="#agregar_movimiento">Agregar movimiento</a>

                        <a href="/billing/bill/form" class="btn btn-success">Vender</a>
                    <?php endif; ?>

                    <?php if ($estado == 'Caja abierta'): ?>
                        <a href="/billing/caja/cierre" class="btn btn-primary">Cierre de caja</a>
                    <?php else: ?>
                        <a data-toggle="modal" data-target="#apertura_caja" href="" class="btn btn-primary">Aperturar caja</a>
                    <?php endif; ?>
                </div>

                <table class="datatable table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr> 
                            <th class="text-center">ID</th>
                            <th class="text-center">Tipo de movimiento</th>
                            <th class="text-center">Fecha</th>
                            <th class="text-center">Monto</th>
                            <th class="text-center">Método de pago</th>
                            <th class="text-center">Concepto</th>
                            <th class="text-center">Cajero</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($movimientos as $movimiento): ?>
                            <tr> 
                                <td class="text-center"><?php echo $movimiento->id; ?></td>
                                <td class="text-center"><?php echo $movimiento->tipo_movimiento; ?></td>
                                <td class="text-center"><?php echo $movimiento->fecha; ?></td>
                                <td class="text-center"><?php echo $movimiento->monto; ?></td>
                                <td class="text-center"><?php echo $movimiento->metodo_pago; ?></td>
                                <td class="text-center"><?php echo $movimiento->concepto; ?></td>
                                <td class="text-center"><?php echo $movimiento->cajero; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>




<div class="modal fade" id="agregar_movimiento" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close close_crear_proveedor" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Agregar movimiento</h4>
      </div>

      <form action="/billing/caja/guardar" method="POST">
          <div class="modal-body">
            <div class="form-group">
                <label for="tipo_movimiento">Tipo de movimiento</label>
                <select name="tipo_movimiento" class="form-control" required>
                    <option value=""></option>
                    <option value="Entrada">Entrada</option>
                    <option value="Salida">Salida</option>
                </select>
            </div>

            <div class="form-group">
                <label for="monto">Monto</label>
                <input type="number" required class="form-control" name="monto">
            </div>

            <div class="form-group">
                <label for="metodo_pago">Método de pago</label>
                <select name="metodo_pago" class="form-control" required>
                    <option value=""></option>
                    <option value="Efectivo">Efectivo</option>
                    <option value="Transferencia">Transferencia</option>
                    <option value="Cheque">Cheque</option>
                </select>
            </div>

            <div class="form-group">
                <label for="concepto">Concepto</label>
                <textarea name="concepto" required class="form-control"></textarea>
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

<div class="modal fade" id="cierre_caja" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close close_crear_proveedor" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Cierre de caja</h4>
      </div>

      <form action="/billing/caja/cierre" method="POST">
          <div class="modal-body">
            <div class="form-group">
                <label for="monto">Monto</label>
                <input type="number" required class="form-control" name="monto">
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

<div class="modal fade" id="apertura_caja" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close close_crear_proveedor" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Apertura de caja</h4>
      </div>

      <form action="/billing/caja/apertura" method="POST">
          <div class="modal-body">
            <div class="form-group">
                <label for="monto">Monto</label>
                <input type="number" min="0.01" step="0.01" required class="form-control" name="monto">
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