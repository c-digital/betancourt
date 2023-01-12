<div class="row">
    <form action="">
        <div class="col-sm-4">
            <div class="form-group">
                <label for="inicio">Fecha inicio</label>
                <input type="date" value="<?php echo (isset($_GET['inicio'])) ? $_GET['inicio'] : '' ?>" class="form-control" name="inicio">
            </div>
        </div>

        <div class="col-sm-4">
            <div class="form-group">
                <label for="fin">Fecha fin</label>
                <input type="date" value="<?php echo (isset($_GET['fin'])) ? $_GET['fin'] : '' ?>" class="form-control" name="fin">
            </div>
        </div>

        <div class="col-sm-4">
        	<div class="form-group">
        		<label for="proveedor">Proveedor</label>
        		<select name="proveedor" class="form-control">
        			<option value=""></option>
        			<?php foreach ($proveedores as $proveedor): ?>
        				<option <?php echo (isset($_GET['proveedor']) && $proveedor->nombre == $_GET['proveedor']) ? 'selected' : '' ?> value="<?php echo $proveedor->nombre; ?>"><?php echo $proveedor->nombre; ?></option>
        			<?php endforeach; ?>
        		</select>
        	</div>
        </div>

        <div class="col-sm-4">
            <div class="form-group">
                <label for="numero_factura">Número factura</label>
                <input type="text" value="<?php echo (isset($_GET['numero_factura'])) ? $_GET['numero_factura'] : '' ?>" class="form-control" name="numero_factura">
            </div>
        </div>

        <div class="col-sm-4">
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
                            <th><?php echo 'Fecha' ?></th>
                            <th><?php echo 'Numero factura' ?></th>
                            <th><?php echo 'Proveedor' ?></th>
                            <th><?php echo 'Monto total' ?></th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $contador = 1; foreach ($mercaderias as $mercaderia): ?>
                            <tr class="<?php echo ($contador & 1)?" odd gradeX":"even gradeC" ?>">
                                <td><?php echo $contador; ?></td>
                                <td><?php echo $mercaderia->fecha; ?></td>
                                <td><?php echo $mercaderia->numero_factura; ?></td>
                                <td><?php echo $mercaderia->proveedor; ?></td>
                                <td><?php echo number_format($mercaderia->monto_total, 2); ?></td>
                            </tr>
                        <?php $contador++; endforeach; ?> 
                    </tbody>
                </table>           
            </div>
        </div>
    </div>
</div>
