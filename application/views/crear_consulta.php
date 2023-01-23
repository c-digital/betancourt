<div class="row">
    <div class="col-sm-12">
        <div  class="panel panel-default thumbnail">
 
           <?php
            if($this->permission->method('appointment_list','read')->access() || $this->permission->method('appointment_list','delete')->access()){
           ?>
            <div class="panel-heading no-print">
                <div class="btn-group"> 
                    <a class="btn btn-primary" href="<?php echo base_url("consultas") ?>"> <i class="fa fa-list"></i>  Listado de consultas</a>  
                </div>
            </div> 
            <?php } ?>
            
          <?php
           if($this->permission->method('add_appointment','create')->access()){
          ?>
            <div class="panel-body panel-form">
                <div id="wrapper" class="customer_profile">
				   <div class="content">
				      <div class="row" style="background: white;">
				         <?php echo form_open('/consultas/guardar', ['enctype' => 'multipart/form-data', 'method' => 'POST']); ?>
				            <div class="col-md-11">
				               <h3>Agregar nueva consulta</h3>
				            </div>

				            <div class="col-md-1">
				               <a href="/consultas" title="Volver a atras">
				                  <i class="pull-right fa fa-times"></i>
				               </a>
				            </div>

				            <div class="col-md-2">
				               <img style="width: 150px; cursor: pointer" class="img-responsive img-circle user_photo" src="/assets/images/user-placeholder.jpg" alt="">

				               <input type="file" style="display: none;" name="foto_perfil" id="user">
				            </div>

				            <div class="col-md-8">
				               <label for="patient_id">Paciente</label>
				               <select name="patient_id" class="form-control">
				               	  <option value=""></option>
				                  <?php foreach ($clientes as $cliente): ?>
				                     <option value="<?php echo $cliente->patient_id; ?>"><?php echo $cliente->firstname . ' ' . $cliente->lastname; ?></option>
				                  <?php endforeach; ?>
				               </select>
				            </div>

				            <div class="col-md-2">
				               <label for="edad">Edad</label>
				               <input type="text" class="form-control" readonly name="edad">
				            </div>

				            <div class="col-md-10" style="margin-top: 20px">
				               <label for="profesional_id">Profesional</label>
				               <select name="profesional_id" class="form-control">
				               	  <option value=""></option>
				                  <?php foreach ($profesionales as $profesional): ?>
				                     <option value="<?php echo $profesional->user_id; ?>"><?php echo $profesional->firstname . ' ' . $profesional->lastname; ?></option>
				                  <?php endforeach; ?>
				               </select>
				            </div>

				            <div class="col-md-10" style="margin-top: 20px">
				               <label for="tipo_consulta">Tipo de consulta</label>
				               <select name="tipo_consulta" class="form-control">
				               	  <option value=""></option>
				                  <?php foreach ($tipo_consultas as $tipo_consulta): ?>
				                     <option data-amount="<?php echo $tipo_consulta->amount; ?>" value="<?php echo $tipo_consulta->id; ?>"><?php echo $tipo_consulta->name; ?></option>
				                  <?php endforeach; ?>
				               </select>
				            </div>

				            <div class="col-md-2" style="margin-top: 20px">
				               <label for="monto">Monto a cobrar</label>
				               <input type="text" class="form-control" name="monto" required>
				            </div>

				            <div class="col-md-12" style="margin-top: 30px; padding-top: 20px; border-top: 1px solid silver">
				               <div class="row">
				                  <div class="col-md-12">
				                     <h4>Anamnesis</h4>
				                  </div>

				                  <div class="col-md-6">
				                     <div class="form-group">
				                        <label for="anamnesis[general]">Información general</label>
				                        <textarea name="anamnesis[general]" cols="30" rows="10" class="form-control"></textarea>
				                     </div>

				                     <div class="row" style="margin-top: 50px">
				                        <div class="col-md-3">
				                           <label for="peso">Peso</label>
				                           <input type="number" class="form-control" id="peso" name="anamnesis[peso]">
				                        </div>

				                        <div class="col-md-3">
				                           <label for="altura">Altura</label>
				                           <input type="number" class="form-control" id="altura" name="anamnesis[altura]">
				                        </div>

				                        <div class="col-md-3">
				                           <label for="imc">IMC</label>
				                           <input type="text" readonly id="imc" class="form-control" name="anamnesis[imc]">
				                        </div>

				                        <div class="col-md-3">
				                           <label for="temperatura">Temperatura</label>
				                           <input type="text" class="form-control" name="anamnesis[temperatura]">
				                        </div>
				                     </div>

				                     <div class="row" style="margin-top: 10px">
				                        <div class="col-md-3">
				                           <label for="presion_sanguinea_sistolica">P. anguinea sistolica</label>
				                           <input type="text" class="form-control" name="anamnesis[presion_sanguinea_sistolica]">
				                        </div>

				                        <div class="col-md-3">
				                           <label for="presion_sanguinea_diastolica">P. sanguinea diastolica</label>
				                           <input type="text" class="form-control" name="anamnesis[presion_sanguinea_diastolica]">
				                        </div>

				                        <div class="col-md-3">
				                           <label for="frecuencia_respiratoria">Frecuencia respiratoria</label>
				                           <input type="text" class="form-control" name="anamnesis[frecuencia_respiratoria]">
				                        </div>

				                        <div class="col-md-3">
				                           <label for="frecuencia_cardiaca">Frecuencia cardiaca</label>
				                           <input type="text" class="form-control" name="anamnesis[frecuencia_cardiaca]">
				                        </div>
				                     </div>

				                     <div class="row" style="margin-top: 10px">
				                        <div class="col-md-3">
				                           <label for="imc_20">Exceso de peso, IMC 20</label>
				                           <input type="text" class="form-control" name="anamnesis[imc_20]">
				                        </div>

				                        <div class="col-md-3">
				                           <label for="imc_30">Exceso de peso, IMC 30</label>
				                           <input type="text" class="form-control" name="anamnesis[imc_30]">
				                        </div>
				                     </div>

				                     <div class="row" style="margin-top: 30px">
				                        <div class="col-md-12">
				                           <div class="form-group">
				                              <label for="examen_fisico">Examen físico</label>
				                              <textarea name="anamnesis[examen_fisico]" cols="30" rows="10" class="form-control"></textarea>
				                           </div>
				                        </div>
				                     </div>

				                     <div class="row" style="margin-top: 30px">
				                        <div class="col-md-12">
				                           <div class="form-group">
				                              <label for="diagnostico">Diagnostico</label>
				                              <textarea name="anamnesis[diagnostico]" cols="30" rows="10" class="form-control"></textarea>
				                           </div>
				                        </div>
				                     </div>

				                     <div class="row">
				                        <div class="col-md-12" style="margin-top: 30px">
				                           <div class="form-group">
				                              <label for="cie10">CIE-10</label>
				                              <select style="height: 150px" name="anamnesis[cie10]" class="form-control">
				                              	 <option value=""></option>
				                                 <?php foreach ($enfermedades as $enfermedad): ?>
				                                    <option value="<?php echo $enfermedad->nombre; ?>"><?php echo $enfermedad->nombre; ?></option>
				                                 <?php endforeach; ?>
				                              </select>
				                           </div>
				                        </div>
				                     </div>
				                  </div>

				                  <div class="col-md-6">
				                     <div class="form-group">
				                        <label for="anamnesis">Actividad fisica</label>
				                        <input class="form-control" name="anamnesis[actividad_fisica]">
				                     </div>

				                     <div class="form-group">
				                        <label for="anamnesis">Etilismo</label>
				                        <input class="form-control" name="anamnesis[etilismo]">
				                     </div>

				                     <div class="form-group">
				                        <label for="anamnesis">Fumador</label>
				                        <input class="form-control" name="anamnesis[fumador]">
				                     </div>

				                     <div class="form-group">
				                        <label for="anamnesis">Drogas</label>
				                        <input class="form-control" name="anamnesis[drogas]">
				                     </div>

				                     <div class="form-group">
				                        <label for="anamnesis">Alergias</label>
				                        <input class="form-control" name="anamnesis[alergias]">
				                     </div>

				                     <div class="form-group">
				                        <label for="anamnesis">Diabetes</label>
				                        <input class="form-control" name="anamnesis[diabetes]">
				                     </div>

				                     <div class="form-group">
				                        <label for="anamnesis">Enfermedades cronicas</label>
				                        <input class="form-control" name="anamnesis[enfermedades_cronicas]">
				                     </div>

				                     <div class="form-group">
				                        <label for="anamnesis">Hipertension</label>
				                        <input class="form-control" name="anamnesis[hipertension]">
				                     </div>

				                     <div class="form-group">
				                        <label for="anamnesis">Neoplasma</label>
				                        <input class="form-control" name="anamnesis[neoplasma]">
				                     </div>

				                     <div class="form-group">
				                        <label for="anamnesis">Medicamentos a pedido</label>
				                        <input class="form-control" name="anamnesis[medicamentos_pedido]">
				                     </div>

				                     <div class="form-group">
				                        <label for="anamnesis">Metodos anticonceptivos</label>
				                        <input class="form-control" name="anamnesis[metodos_anticonceptivos]">
				                     </div>

				                     <div class="form-group" style="margin-top: 30px">
				                        <div class="panel panel-default">
				                           <div class="panel-heading">Fotos</div>

				                           <div class="panel-body">
				                              <input type="file" multiple name="fotos[]">
				                           </div>
				                        </div>
				                     </div>
				                  </div>

				                  <div class="col-md-12">
				                     <div class="form-group">
				                        <label for="prescripcion_medica">Prescripcion medica</label>
				                        <textarea cols="30" rows="10" name="anamnesis[prescripcion_medica]" class="form-control"></textarea>
				                     </div>
				                  </div>

				                  <div class="col-md-12">
				                     <button type="submit" class="btn btn-info">Registrar consulta</button>
				                  </div>
				               </div>
				            </div>
				         <?php echo form_close(); ?>
				      </div>
				   </div>
				</div>
            </div>
            <?php 
                }
                 else{
                 ?>
                   <div class="row">
                    <div class="col-sm-12">
                       <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                          <div class="panel-title">
                            <h4><?php echo display('you_do_not_have_permission_to_access_please_contact_with_administrator');?>.</h4>
                           </div>
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

<!-- add patient modal -->
<div class="modal fade" id="addPatient" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Patient</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php echo form_open_multipart('appointment/create_patient','class="form-inner"') ?>
      <div class="modal-body">
             <div class="form-group row">
                <label for="patient_id" class="col-xs-3 col-form-label"><?php echo display('patient_id') ?> <i class="text-danger">*</i></label>
                <div class="col-xs-9">
                    <input name="patient_id" type="text" class="form-control" id="patient_id" placeholder="<?php echo display('patient_id') ?>" autocomplete="off">
                </div>
            </div>

            <div class="form-group row">
                <label for="firstname" class="col-xs-3 col-form-label"><?php echo display('first_name') ?> <i class="text-danger">*</i></label>
                <div class="col-xs-9">
                    <input name="firstname" type="text" class="form-control" id="firstname" placeholder="<?php echo display('first_name') ?>" >
                </div>
            </div>

            <div class="form-group row">
                <label for="lastname" class="col-xs-3 col-form-label"><?php echo display('last_name') ?> <i class="text-danger">*</i></label>
                <div class="col-xs-9">
                    <input name="lastname" type="text" class="form-control" id="lastname" placeholder="<?php echo display('last_name') ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-xs-3 col-form-label"><?php echo display('email') ?></label>
                <div class="col-xs-9">
                    <input name="email" type="text" class="form-control" id="email" placeholder="<?php echo display('email') ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="mobile" class="col-xs-3 col-form-label"><?php echo display('mobile') ?> <i class="text-danger">*</i></label>
                <div class="col-xs-9">
                    <input name="mobile" class="form-control" type="text" placeholder="<?php echo display('mobile') ?>" id="mobile">
                </div>
            </div>
            <div class="form-group row">
                <label for="date_of_birth" class="col-xs-3 col-form-label"><?php echo display('date_of_birth') ?> <i class="text-danger">*</i></label>
                <div class="col-xs-9">
                    <input name="date_of_birth" class="dropdown-month-years form-control" type="text" placeholder="<?php echo display('date_of_birth') ?>" id="date_of_birth">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-xs-3"><?php echo display('sex') ?> <i class="text-danger">*</i></label>
                <div class="col-xs-9">
                    <div class="form-check">
                        <label class="radio-inline">
                        <input type="radio" name="sex" value="Male" <?php echo  set_radio('sex', 'Male', TRUE); ?> ><?php echo display('male') ?>
                        </label>
                        <label class="radio-inline">
                        <input type="radio" name="sex" value="Female" <?php echo  set_radio('sex', 'Female'); ?> ><?php echo display('female') ?>
                        </label>
                        <label class="radio-inline">
                        <input type="radio" name="sex" value="Other" <?php echo  set_radio('sex', 'Other'); ?> ><?php echo display('other') ?>
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="address" class="col-xs-3 col-form-label"><?php echo display('address') ?> <i class="text-danger">*</i></label>
                <div class="col-xs-9">
                    <textarea name="address" class="form-control"  placeholder="<?php echo display('address') ?>" maxlength="140" rows="5"></textarea>
                </div>
            </div> 
            <div class="form-group row">
                <label for="blood_group" class="col-xs-3 col-form-label"><?php echo display('blood_group') ?></label>
                <div class="col-xs-9"> 
                    <?php
                        $bloodList = array(
                            ''   => display('select_option'),
                            'A+' => 'A+',
                            'A-' => 'A-',
                            'B+' => 'B+',
                            'B-' => 'B-',
                            'O+' => 'O+',
                            'O-' => 'O-',
                            'AB+' => 'AB+',
                            'AB-' => 'AB-'
                        );
                        echo form_dropdown('blood_group', $bloodList, '', 'class="form-control" id="blood_group" '); 
                    ?>
                </div>
            </div>

      </div>
      <div class="modal-footer">
        <div class="form-group row">
            <div class="col-sm-offset-3 col-sm-6">
                <div class="ui buttons">
                    <button type="reset" class="ui button"><?php echo display('reset') ?></button>
                    <div class="or"></div>
                    <button class="ui positive button"><?php echo display('save') ?></button>
                </div>
            </div>
        </div>
      </div>
      <?php echo form_close() ?>
    </div>
  </div>
</div>

<script type="text/javascript">
$(document).ready(function() {

	$('[name=tipo_consulta]').change(function () {
		amount = $('[name=tipo_consulta] option:selected').attr('data-amount');
		$('[name=monto]').val(amount);
	});

    //check patient id
    $('#patient_id').keyup(function(){
        var pid = $(this);

        $.ajax({
            url  : '<?= base_url('appointment/check_patient/') ?>',
            type : 'post',
            dataType : 'JSON',
            data : {
                '<?= $this->security->get_csrf_token_name(); ?>' : '<?= $this->security->get_csrf_hash(); ?>',
                patient_id : pid.val()
            },
            success : function(data) 
            {
                if (data.status == true) {
                    pid.next().text(data.message).addClass('text-success').removeClass('text-danger');
                } else if (data.status == false) {
                    pid.next().text(data.message).addClass('text-danger').removeClass('text-success');
                } else {
                    pid.next().text(data.message).addClass('text-danger').removeClass('text-success');
                }
            }, 
            error : function()
            {
                alert('failed');
            }
        });
    });

    //search patient id 
    $('#searchText').keyup(function(){
        var text = $(this).val();
        
        $.ajax({
            url  : '<?= base_url('appointment/search_patient/') ?>',
            type : 'POST',
            data : {
                '<?= $this->security->get_csrf_token_name(); ?>' : '<?= $this->security->get_csrf_hash(); ?>',
                query : text
            },
            success : function(data) {
                $('#searchValue').html(data);
            }, 
            error : function(){
                
            }
        });
    });

});
 
    
</script>

<script>
   $(document).ready(function () {
      $('#user').change(function () {
         input = this;
         if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (event) {
               $('.user_photo').attr('src', event.target.result);
            }
            reader.readAsDataURL(input.files[0]);
         }
      });

      $('.img-circle').click(function () {
         $('[name=foto_perfil]').click();
      });

      function imc() {
         peso = $('#peso').val();
         altura = $('#altura').val();

         if (peso != '') {
            peso = parseInt(peso);
         }

         if (altura != '') {
            altura = parseInt(altura);
         }

         if (peso != '' && altura == '') {
            $('#imc').val(peso);
         }

         if (altura != '' && peso == '') {
            $('#imc').val(altura * altura);
         }

         if (peso != '' && altura != '') {
            $('#imc').val(peso + (altura * altura));
         }
      }

      $('#peso').change(function () {
         imc();
      });

      $('#altura').change(function () {
         imc();
      });

      $('[name=patient_id]').on('change', function () {
         value = $(this).val();
         console.log(value);

         $.ajax({
            type: 'POST',
            url: '/consultas/info',
            data: {
               id: value
            },
            success: function (response) {
            	$('[name=edad]').val(response);
            },
            error: function (error) {
            	console.log(error.responseText);
            }
         });
      });
   });
</script>
