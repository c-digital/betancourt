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
                <label for="numero_internacion">Número internación</label>
                <input type="text" value="<?php echo (isset($_GET['numero_internacion'])) ? $_GET['numero_internacion'] : '' ?>" class="form-control" name="numero_internacion">
            </div>
        </div>

        <div class="col-sm-5">
        	<div class="form-group">
        		<label for="profesional">Profesional</label>
        		<select name="profesional" class="form-control">
        			<option value=""></option>
        			<?php foreach ($profesionales as $profesional): ?>
        				<option <?php echo (isset($_GET['profesional']) && $_GET['profesional'] == $profesional->id) ? 'selected' : '' ?> value="<?php echo $profesional->id; ?>"><?php echo $profesional->nombre; ?></option>
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
                            <th><?php echo 'Fecha' ?></th>
                            <th><?php echo 'Numero internación' ?></th>
                            <th><?php echo 'Paciente' ?></th>
                            <th><?php echo 'Servicio' ?></th>
                            <th><?php echo 'Profesional' ?></th>
                            <th><?php echo 'Monto' ?></th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $contador = 1; foreach ($comisiones as $comision): ?>
                            <tr class="<?php echo ($contador & 1)?" odd gradeX":"even gradeC" ?>">
                                <td><?php echo $contador; ?></td>
                                <td><?php echo $comision->fecha; ?></td>
                                <td><?php echo $comision->numero_internacion; ?></td>
                                <td><?php echo $comision->paciente; ?></td>
                                <td><?php echo $comision->servicio; ?></td>
                                <td><?php echo $comision->profesional; ?></td>
                                <td><?php echo $comision->monto; ?></td>
                            </tr>
                        <?php $contador++; endforeach; ?> 
                    </tbody>
                </table>           
            </div>
        </div>
    </div>
</div>
comisiones.php