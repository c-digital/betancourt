<div class="row">
    <!--  form area -->
    <div class="col-sm-12">
        <div  class="panel panel-default thumbnail">
            <div class="panel-body panel-form">
                <div class="row">
                    <div class="col-md-9 col-sm-12">

                        <?php echo form_open("laboratorio/completar/$solicitud->id",'class="form-inner"') ?>

                            <input type="hidden" name="guardar" value="1">

                            <div class="form-group row">
                                <label for="paciente" class="col-xs-3 col-form-label"><?php echo 'Nombre del paciente' ?></label>
                                <div class="col-xs-9">
                                    <?php echo $solicitud->paciente ?>
                                </div>                                
                            </div>

                            <div class="form-group row">
                                <label for="paciente" class="col-xs-3 col-form-label"><?php echo 'Fecha' ?></label>
                                <div class="col-xs-9">
                                    <?php echo $solicitud->fecha ?>
                                </div>                                
                            </div>

                            <div class="form-group row">
                                <label for="paciente" class="col-xs-3 col-form-label"><?php echo 'Estado' ?></label>
                                <div class="col-xs-9">
                                    <?php echo $solicitud->estado ?>
                                </div>                                
                            </div>

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Examen</th>
                                        <th>Precio</th>
                                        <th>Valor de referencia</th>
                                        <th>Resultado</th>
                                    </tr>
                                </thead>

                                <tbody class="tabla-examenes">
                                    <?php $i=1; $j=0; foreach (json_decode($solicitud->examenes) as $examen): ?>
                                        <input type="hidden" class="form-control" name="examenes[<?php echo $j ?>][id]" value="<?php echo $examen->id; ?>">
                                        <input type="hidden" class="form-control" name="examenes[<?php echo $j ?>][nombre]" value="<?php echo $examen->nombre; ?>">
                                        <input type="hidden" class="form-control" name="examenes[<?php echo $j ?>][precio]" value="<?php echo $examen->precio; ?>">
                                        <input type="hidden" class="form-control" name="examenes[<?php echo $j ?>][valor_referencia]" value="<?php echo $examen->valor_referencia; ?>">

                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $examen->nombre; ?></td>
                                            <td><?php echo $examen->precio; ?></td>
                                            <td><?php echo $examen->valor_referencia; ?></td>
                                            <td><input type="number" class="form-control" name="examenes[<?php echo $j ?>][resultado]"></td>
                                        </tr>

                                    <?php $i=$i+1; $j=$j+1; endforeach; ?>
                                </tbody>
                            </table>
                            
                            <div class="form-group row">
                                <div class="col-sm-offset-3 col-sm-6">
                                    <div class="ui buttons">
                                        <button type="reset" class="ui button"><?php echo display('reset') ?></button>
                                        <div class="or"></div>
                                        <button class="ui positive button"><?php echo 'Registrar' ?></button>
                                    </div>
                                </div>
                            </div>

                        <?php echo form_close() ?>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>