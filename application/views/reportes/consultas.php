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
                <label for="profesional">Profesional</label>
                <select name="profesional" class="form-control">
                	<option value=""></option>
                	<?php foreach ($profesionales as $profesional): ?>
                		<option  <?php echo (isset($_GET['profesional']) && $profesional->profesional == $_GET['profesional']) ? 'selected' : ''; ?> value="<?php echo $profesional->profesional; ?>"><?php echo $profesional->profesional; ?></option>
                	<?php endforeach; ?>
                </select>
            </div>
        </div>

        <div class="col-sm-5">
            <div class="form-group">
                <label for="paciente">Paciente</label>
                <input type="text" value="<?php echo (isset($_GET['paciente'])) ? $_GET['paciente'] : '' ?>" class="form-control" name="paciente">
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
                            <th><?php echo 'Fecha' ?></th>
                            <th><?php echo 'Numero consulta' ?></th>
                            <th><?php echo 'Profesional' ?></th>
                            <th><?php echo 'Paciente' ?></th>
                            <th><?php echo 'Monto' ?></th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $contador = 1; foreach ($consultas as $consulta): ?>
                            <tr class="<?php echo ($contador & 1)?" odd gradeX":"even gradeC" ?>">
                                <td><?php echo $contador; ?></td>
                                <td><?php echo $consulta->fecha; ?></td>
                                <td><?php echo $consulta->numero_consulta; ?></td>
                                <td><?php echo $consulta->profesional; ?></td>
                                <td><?php echo $consulta->paciente; ?></td>
                                <td><?php echo $consulta->monto; ?></td>
                            </tr>
                        <?php $contador++; endforeach; ?> 
                    </tbody>
                </table>           
            </div>
        </div>
    </div>
</div>
