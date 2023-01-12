<div class="row">
    <form action="">
        <div class="col-sm-5">
            <div class="form-group">
                <label for="vencimiento">Fecha vencimiento</label>
                <input type="date" value="<?php echo (isset($_GET['vencimiento'])) ? $_GET['vencimiento'] : '' ?>" class="form-control" name="vencimiento">
            </div>
        </div>

        <div class="col-sm-5">
            <div class="form-group">
                <label for="ingreso">Fecha ingreso</label>
                <input type="date" value="<?php echo (isset($_GET['ingreso'])) ? $_GET['ingreso'] : '' ?>" class="form-control" name="ingreso">
            </div>
        </div>

        <div class="col-sm-5">
            <div class="form-group">
                <label for="proveedor">Proveedor</label>
                <select name="proveedor" class="form-control">
                	<option value=""></option>
                	<?php foreach ($proveedores as $proveedor): ?>
                		<option <?php echo (isset($_GET['proveedor']) && $proveedor->proveedor == $_GET['proveedor']) ? 'selected' : '' ?> value="<?php echo $proveedor->proveedor; ?>"><?php echo $proveedor->proveedor; ?></option>
                	<?php endforeach; ?>
                </select>
            </div>
        </div>

        <div class="col-sm-5">
            <div class="form-group">
                <label for="producto">Producto</label>
                <input type="text" value="<?php echo (isset($_GET['producto'])) ? $_GET['producto'] : '' ?>" class="form-control" name="producto">
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
                <table width="100%" class="datatable table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th><?php echo '#' ?></th>
                            <th><?php echo 'Lote' ?></th>
                            <th><?php echo 'Producto' ?></th>
                            <th><?php echo 'Cantidad' ?></th>
                            <th><?php echo 'Fecha de vencimiento' ?></th>
                            <th><?php echo 'Proveedor' ?></th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $contador = 1; foreach ($medicamentos as $medicamento): ?>
                            <tr class="<?php echo ($contador & 1)?" odd gradeX":"even gradeC" ?>">
                                <td><?php echo $contador; ?></td>
                                <td><?php echo $medicamento->lote; ?></td>
                                <td><?php echo $medicamento->producto; ?></td>
                                <td><?php echo $medicamento->cantidad; ?></td>
                                <td><?php echo $medicamento->fecha_vencimiento; ?></td>
                                <td><?php echo $medicamento->proveedor; ?></td>
                            </tr>
                        <?php $contador++; endforeach; ?> 
                    </tbody>
                </table>           
            </div>
        </div>
    </div>
</div>
