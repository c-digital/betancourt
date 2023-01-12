<div class="row">
    <form action="">
        <div class="col-sm-5">
            <div class="form-group">
                <label for="inicio">Fecha inicio</label>
                <input type="date" value="<?php echo (isset($_GET['inicio'])) ? $_GET['inicio'] : '' ?>" class="form-control" name="inicio">
            </div>
        </div>

        <div class="col-sm-5">
            <div class="form-group">
                <label for="fin">Fecha fin</label>
                <input type="date" value="<?php echo (isset($_GET['fin'])) ? $_GET['fin'] : '' ?>" class="form-control" name="fin">
            </div>
        </div>

        <div class="col-sm-5">
            <div class="form-group">
                <label for="usuario">Usuario</label>
                <select name="usuario" class="form-control">
                    <option value=""></option>
                    <?php foreach ($usuarios as $usuario): ?>
                        <option <?php echo (isset($_GET['usuario']) && $usuario->nombre == $_GET['usuario']) ? 'selected' : '' ?> value="<?php echo $usuario->nombre; ?>"><?php echo $usuario->nombre; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>

        <div class="col-sm-2">
            <div class="form-group">
                <label>&nbsp;</label>
                <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-search"></i> Buscar</button>
            </div>
        </div>
    </form>
</div>

<div class="row">
    <div class="col-sm-12">
        <div  class="panel panel-default thumbnail">
            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Efectivo</th>
                            <th>Transferencia</th>
                            <th>Cheque</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td><?php echo number_format($efectivo, 2); ?></td>
                            <td><?php echo number_format($transferencia, 2); ?></td>
                            <td><?php echo number_format($cheque, 2); ?></td>
                        </tr>
                    </tbody>
                </table>

                <table width="100%" class="datatable table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th><?php echo '#' ?></th>
                            <th><?php echo 'Tipo movimiento' ?></th>
                            <th><?php echo 'Monto' ?></th>
                            <th><?php echo 'Metodo de pago' ?></th>
                            <th><?php echo 'Concepto' ?></th>
                            <th><?php echo 'Usuario' ?></th>
                            <th><?php echo 'Fecha' ?></th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $contador = 1; foreach ($movimientos as $movimiento): ?>
                            <tr class="<?php echo ($contador & 1)?" odd gradeX":"even gradeC" ?>">
                                <td><?php echo $contador; ?></td>
                                <td><?php echo $movimiento->tipo_movimiento; ?></td>
                                <td><?php echo $movimiento->monto; ?></td>
                                <td><?php echo $movimiento->metodo_pago; ?></td>
                                <td><?php echo $movimiento->concepto; ?></td>
                                <td><?php echo $movimiento->usuario; ?></td>
                                <td><?php echo $movimiento->fecha; ?></td>
                            </tr>
                        <?php $contador++; endforeach; ?> 
                    </tbody>
                </table>           
            </div>
        </div>
    </div>
</div>
