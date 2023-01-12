<div class="row">
    <!--  form area -->
    <div class="col-sm-12">
        <div  class="panel panel-default thumbnail">


           <?php
           if($this->permission->method('add_medication','create')->access()){
           ?>
            <div class="panel-body panel-form">
                <div class="row">
                    <div class="col-md-9 col-sm-12">

                        <?php echo form_open('laboratorio/guardar_solicitud','class="form-inner"') ?>

                            <div class="form-group row">
                                <label for="paciente" class="col-xs-3 col-form-label"><?php echo 'Nombre del paciente' ?></label>
                                <div class="col-xs-9">
                                    <select name="paciente" class="form-control">
                                        <option value=""></option>

                                        <?php foreach ($pacientes as $paciente): ?>
                                            <option value="<?php echo $paciente->id; ?>"><?php echo $paciente->nombre; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>                                
                            </div>

                            <div class="form-group row">
                                <label for="paciente" class="col-xs-3 col-form-label"><?php echo 'Numero de internación' ?></label>
                                <div class="col-xs-9">
                                    <input type="text" name="internacion" class="form-control">
                                </div>                                
                            </div>

                            <div class="form-group row">
                                <label for="nombre_examen" class="col-xs-3 col-form-label"><?php echo 'Nombre del examen' ?></label>
                                <div class="col-xs-9">
                                    <select name="nombre_examen" class="form-control">
                                        <option value=""></option>

                                        <?php foreach ($examenes as $examen): ?>
                                            <option data-nombre="<?php echo $examen->nombre; ?>" data-precio="<?php echo $examen->precio; ?>" data-referencia="<?php echo $examen->valor_referencia; ?>" value="<?php echo $examen->id; ?>"><?php echo $examen->nombre; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>                                
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-offset-3 col-sm-6">
                                    <button class="ui positive button agregar-examen" type="button"><?php echo 'Agregar' ?></button>
                                </div>
                            </div>

                            <hr>

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Examen</th>
                                        <th>Precio</th>
                                    </tr>
                                </thead>

                                <tbody class="tabla-examenes"></tbody>
                            </table>

                            <hr>
                            
                            <div class="form-group row">
                                <div class="col-sm-offset-3 col-sm-6">
                                    <div class="ui buttons">
                                        <button type="reset" class="ui button"><?php echo display('reset') ?></button>
                                        <div class="or"></div>
                                        <button class="ui positive button"><?php echo 'Registrar solicitud' ?></button>
                                    </div>
                                </div>
                            </div>

                        <?php echo form_close() ?>

                    </div>
                </div>
            </div>
        <?php 
        }
         else{
         ?>
          
            <div class="col-sm-12">
               <div class="panel panel-bd lobidrag">
                <div class="panel-heading">
                  <div class="panel-title">
                    <h4><?php echo display('you_do_not_have_permission_to_access_please_contact_with_administrator');?>.</h4>
                   </div>
                   </div>
                 </div>
                </div>
           
         <?php
         }
         ?>

        </div>
    </div>

</div>

<script>
    $(document).ready(function () {
        i = 0;
        j = 1;

        $('.agregar-examen').click(function () {

            id = $('[name=nombre_examen]').val();
            nombre = $('[name=nombre_examen]').find(':selected').attr('data-nombre');
            precio = $('[name=nombre_examen]').find(':selected').attr('data-precio');
            valor_referencia = $('[name=nombre_examen]').find(':selected').attr('data-referencia');

            $('.tabla-examenes').append(`
                <tr>
                    <td>${j}</td>
                    <td>${nombre}</td>
                    <td>${precio}</td>
                    <td>
                        <button type="button" onclick="$(this).parent().parent().remove()" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                    </td>

                    <input type="hidden" name="examenes[${i}][id]" value="${id}">
                    <input type="hidden" name="examenes[${i}][nombre]" value="${nombre}">
                    <input type="hidden" name="examenes[${i}][precio]" value="${precio}">
                    <input type="hidden" name="examenes[${i}][valor_referencia]" value="${valor_referencia}">
                </tr>
            `);

            $('[name=nombre_examen]').val(null).trigger('change');

            i = i+1;
        });
    });
</script>