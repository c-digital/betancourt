<div class="row">
    <form action="">
        <div class="col-sm-5">
            <div class="form-group">
                <label for="producto">Producto</label>
                <input type="text" value="<?php echo (isset($_GET['producto'])) ? $_GET['producto'] : '' ?>" class="form-control" name="producto">
            </div>
        </div>

        <div class="col-sm-5">
        	<div class="form-group">
        		<label for="almacen">Almacen</label>
        		<select name="almacen" class="form-control">
        			<option value=""></option>
        			<?php foreach ($almacenes as $almacen): ?>
        				<option <?php echo (isset($_GET['almacen']) && $almacen->id == $_GET['almacen']) ? 'selected' : '' ?> value="<?php echo $almacen->id; ?>"><?php echo $almacen->nombre; ?></option>
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
                <table width="100%" class="datatable table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th><?php echo '#' ?></th>
                            <th><?php echo 'Producto' ?></th>
                            <th><?php echo 'Cantidad' ?></th>
                            <th><?php echo 'Almacen' ?></th>
                            <th><?php echo 'Fecha vencimiento' ?></th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $contador = 1; foreach ($productos as $producto): ?>
                            <tr class="<?php echo ($contador & 1)?" odd gradeX":"even gradeC" ?>">
                                <td><?php echo $contador; ?></td>
                                <td><?php echo $producto->producto; ?></td>
                                <td><?php echo $producto->cantidad; ?></td>
                                <td><?php echo $producto->almacen; ?></td>
                                <td><?php echo $producto->fecha_vencimiento; ?></td>
                            </tr>
                        <?php $contador++; endforeach; ?> 
                    </tbody>
                </table>           
            </div>
        </div>
    </div>
</div>
