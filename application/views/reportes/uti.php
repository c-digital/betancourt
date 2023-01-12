<div class="row">
    <form action="">
        <div class="col-sm-5">
            <div class="form-group">
                <label for="fecha">Fecha</label>
                <input type="date" value="<?php echo (isset($_GET['fecha'])) ? $_GET['fecha'] : '' ?>" class="form-control" name="fecha">
            </div>
        </div>

        <div class="col-sm-5">
            <div class="form-group">
                <label for="paciente">Paciente</label>
                <input type="text" value="<?php echo (isset($_GET['paciente'])) ? $_GET['paciente'] : '' ?>" class="form-control" name="paciente">
            </div>
        </div>

        <div class="col-sm-5">
            <div class="form-group">
                <label for="historia_clinica">Historia clínica</label>
                <input type="text" value="<?php echo (isset($_GET['historia_clinica'])) ? $_GET['historia_clinica'] : '' ?>" class="form-control" name="historia_clinica">
            </div>
        </div>

        <div class="col-sm-5">
        	<div class="form-group">
        		<label for="servicio">Servicios</label>
        		<select name="servicio" class="form-control">
        			<option value=""></option>
        			<?php foreach ($servicios as $servicio): ?>
        				<option <?php echo (isset($_GET['servicio']) && $_GET['servicio'] == $servicio->id) ? 'selected' : '' ?> value="<?php echo $servicio->id; ?>"><?php echo $servicio->nombre; ?></option>
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
                            <th><?php echo 'Paciente' ?></th>
                            <th><?php echo 'Tratamiento' ?></th>
                            <th><?php echo 'Valor' ?></th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $contador = 1; foreach ($utis as $uti): ?>
                            <tr class="<?php echo ($contador & 1)?" odd gradeX":"even gradeC" ?>">
                                <td><?php echo $contador; ?></td>
                                <td><?php echo $uti->paciente; ?></td>
                                <td><?php echo $uti->tratamiento; ?></td>
                                <td><?php echo $uti->valor; ?></td>
                            </tr>
                        <?php $contador++; endforeach; ?> 
                    </tbody>
                </table>           
            </div>
        </div>
    </div>
</div>
