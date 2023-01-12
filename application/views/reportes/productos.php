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
                            <th><?php echo '#' ?></th>
                            <th><?php echo 'Producto' ?></th>
                            <th><?php echo 'Fecha de vencimiento' ?></th>
                            <th><?php echo 'Proveedor' ?></th>
                            <th><?php echo 'Cantidad' ?></th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $contador = 1; foreach ($productos as $producto): ?>
                            <tr class="<?php echo ($contador & 1)?" odd gradeX":"even gradeC" ?>">
                                <td><?php echo $contador; ?></td>
                                <td><?php echo $producto->producto; ?></td>
                                <td><?php echo $producto->fecha_vencimiento; ?></td>
                                <td><?php echo $producto->proveedor; ?></td>
                                <td><?php echo $producto->cantidad; ?></td>
                            </tr>
                        <?php $contador++; endforeach; ?> 
                    </tbody>
                </table>           
            </div>
        </div>
    </div>
</div>
