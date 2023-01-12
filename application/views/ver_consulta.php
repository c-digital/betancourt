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
                <div class="row" style="background: white;">
                  <?php echo form_open('/admin/consultas/modificar', ['enctype' => 'multipart/form-data', 'method' => 'POST']); ?>
                     <div class="col-md-11">
                        <h3>Ver consulta</h3>
                     </div>

                     <div class="col-md-1">
                        <a href="/consultas" title="Volver a atras">
                           <i class="pull-right fa fa-times"></i>
                        </a>
                     </div>

                     <div class="col-md-2">
                        <img style="width: 150px;" class="img-responsive img-circle" src="<?php echo ($foto_perfil) ? '/uploads/consultas/' . $foto_perfil : '/assets/images/user-placeholder.jpg' ?>" alt="">
                     </div>

                     <div class="col-md-8">
                        <label for="patient_id">Paciente</label>
                        <select readonly name="patient_id" class="form-control">
                           <option value=""></option>
                           <?php foreach ($clientes as $cliente): ?>
                              <option <?php echo ($cliente->patient_id == $consulta->patient_id) ? 'selected' : ''; ?> value="<?php echo $cliente->patient_id; ?>"><?php echo $cliente->firstname . ' ' . $cliente->lastname; ?></option>
                           <?php endforeach; ?>
                        </select>
                     </div>

                     <div class="col-md-2">
                        <label for="edad">Edad</label>
                        <input readonly type="text" class="form-control" name="edad" value="<?php echo $edad; ?>">
                     </div>

                     <div class="col-md-8" style="margin-top: 20px">
                        <label for="profesional_id">Profesional</label>
                        <select readonly name="profesional_id" class="form-control">
                           <option value=""></option>
                           <?php foreach ($profesionales as $profesional): ?>
                              <option <?php echo ($profesional->user_id == $consulta->profesional_id) ? 'selected' : ''; ?> value="<?php echo $profesional->user_id; ?>"><?php echo $profesional->firstname . ' ' . $profesional->lastname; ?></option>
                           <?php endforeach; ?>
                        </select>
                     </div>

                     <div class="col-md-2" style="margin-top: 20px">
                        <label for="monto">Monto a cobrar</label>
                        <input readonly type="text" class="form-control" name="monto" value="<?php echo $consulta->monto; ?>">
                     </div>

                     <div class="col-md-12" style="margin-top: 30px; padding-top: 20px; border-top: 1px solid silver">
                        <div class="row">
                           <div class="col-md-12">
                              <h4>Anamnesis</h4>
                           </div>

                           <div class="col-md-6">
                              <div class="form-group">
                                 <label for="anamnesis[general]">Información general</label>
                                 <textarea readonly name="anamnesis[general]" cols="30" rows="10" class="form-control"><?php echo $anamnesis->general; ?></textarea>
                              </div>

                              <div class="row" style="margin-top: 50px">
                                 <div class="col-md-3">
                                    <label for="peso">Peso</label>
                                    <input readonly type="text" class="form-control" name="anamnesis[peso]" value="<?php echo $anamnesis->peso; ?>">
                                 </div>

                                 <div class="col-md-3">
                                    <label for="altura">Altura</label>
                                    <input readonly type="text" class="form-control" name="anamnesis[altura]" value="<?php echo $anamnesis->altura; ?>">
                                 </div>

                                 <div class="col-md-3">
                                    <label for="imc">IMC</label>
                                    <input readonly type="text" class="form-control" name="anamnesis[imc]" value="<?php echo $anamnesis->imc; ?>">
                                 </div>

                                 <div class="col-md-3">
                                    <label for="temperatura">Temperatura</label>
                                    <input readonly type="text" class="form-control" name="anamnesis[temperatura]" value="<?php echo $anamnesis->temperatura; ?>">
                                 </div>
                              </div>

                              <div class="row" style="margin-top: 10px">
                                 <div class="col-md-3">
                                    <label for="presion_sanguinea_sistolica">P. anguinea sistolica</label>
                                    <input readonly type="text" class="form-control" name="anamnesis[presion_sanguinea_sistolica]" value="<?php echo $anamnesis->presion_sanguinea_sistolica; ?>">
                                 </div>

                                 <div class="col-md-3">
                                    <label for="presion_sanguinea_diastolica">P. sanguinea diastolica</label>
                                    <input readonly type="text" class="form-control" name="anamnesis[presion_sanguinea_diastolica]" value="<?php echo $anamnesis->presion_sanguinea_diastolica; ?>">
                                 </div>

                                 <div class="col-md-3">
                                    <label for="frecuencia_respiratoria">Frecuencia respiratoria</label>
                                    <input readonly type="text" class="form-control" name="anamnesis[frecuencia_respiratoria]" value="<?php echo $anamnesis->frecuencia_respiratoria; ?>">
                                 </div>

                                 <div class="col-md-3">
                                    <label for="frecuencia_cardiaca">Frecuencia cardiaca</label>
                                    <input readonly type="text" class="form-control" name="anamnesis[frecuencia_cardiaca]" value="<?php echo $anamnesis->frecuencia_cardiaca; ?>">
                                 </div>
                              </div>

                              <div class="row" style="margin-top: 10px">
                                 <div class="col-md-3">
                                    <label for="imc_20">Exceso de peso, IMC 20</label>
                                    <input readonly type="text" class="form-control" name="anamnesis[imc_20]" value="<?php echo $anamnesis->imc_20; ?>">
                                 </div>

                                 <div class="col-md-3">
                                    <label for="imc_30">Exceso de peso, IMC 30</label>
                                    <input readonly type="text" class="form-control" name="anamnesis[imc_30]" value="<?php echo $anamnesis->imc_30; ?>">
                                 </div>
                              </div>

                              <div class="row" style="margin-top: 30px">
                                 <div class="col-md-12">
                                    <div class="form-group">
                                       <label for="examen_fisico">Examen físico</label>
                                       <textarea readonly name="anamnesis[examen_fisico]" cols="30" rows="10" class="form-control"><?php echo $anamnesis->examen_fisico; ?></textarea>
                                    </div>
                                 </div>
                              </div>

                              <div class="row" style="margin-top: 30px">
                                 <div class="col-md-12">
                                    <div class="form-group">
                                       <label for="diagnostico">Diagnostico</label>
                                       <textarea readonly name="anamnesis[diagnostico]" cols="30" rows="10" class="form-control"><?php echo $anamnesis->diagnostico; ?></textarea>
                                    </div>
                                 </div>
                              </div>

                              <div class="row" style="margin-top: 30px">
                                 <div class="col-md-12">
                                    <div class="form-group">
                                       <label for="cei10">CEI-10</label>
                                       <select readonly style="height: 150px" name="anamnesis[cie10]" class="form-control">
                                          <option value=""></option>
                                          <?php foreach ($enfermedades as $enfermedad): ?>
                                             <option <?php echo (isset($anamnesis->cie10) and in_array($enfermedad->nombre, $anamnesis->cie10)) ? 'selected' : ''; ?> value="<?php echo $enfermedad->nombre; ?>"><?php echo $enfermedad->nombre; ?></option>
                                          <?php endforeach; ?>
                                       </select>
                                    </div>
                                 </div>
                              </div>
                           </div>

                           <div class="col-md-6">
                              <div class="form-group">
                                 <label for="anamnesis">Actividad fisica</label>
                                 <input readonly class="form-control" name="anamnesis[actividad_fisica]" value="<?php echo $anamnesis->actividad_fisica; ?>">
                              </div>

                              <div class="form-group">
                                 <label for="anamnesis">Etilismo</label>
                                 <input readonly class="form-control" name="anamnesis[etilismo]" value="<?php echo $anamnesis->etilismo; ?>">
                              </div>

                              <div class="form-group">
                                 <label for="anamnesis">Fumador</label>
                                 <input readonly class="form-control" name="anamnesis[fumador]" value="<?php echo $anamnesis->fumador; ?>">
                              </div>

                              <div class="form-group">
                                 <label for="anamnesis">Drogas</label>
                                 <input readonly class="form-control" name="anamnesis[drogas]" value="<?php echo $anamnesis->drogas; ?>">
                              </div>

                              <div class="form-group">
                                 <label for="anamnesis">Alergias</label>
                                 <input readonly class="form-control" name="anamnesis[alergias]" value="<?php echo $anamnesis->alergias; ?>">
                              </div>

                              <div class="form-group">
                                 <label for="anamnesis">Diabetes</label>
                                 <input readonly class="form-control" name="anamnesis[diabetes]" value="<?php echo $anamnesis->diabetes; ?>">
                              </div>

                              <div class="form-group">
                                 <label for="anamnesis">Enfermedades cronicas</label>
                                 <input readonly class="form-control" name="anamnesis[enfermedades_cronicas]" value="<?php echo $anamnesis->enfermedades_cronicas; ?>">
                              </div>

                              <div class="form-group">
                                 <label for="anamnesis">Hipertension</label>
                                 <input readonly class="form-control" name="anamnesis[hipertension]" value="<?php echo $anamnesis->hipertension; ?>">
                              </div>

                              <div class="form-group">
                                 <label for="anamnesis">Neoplasma</label>
                                 <input readonly class="form-control" name="anamnesis[neoplasma]" value="<?php echo $anamnesis->neoplasma; ?>">
                              </div>

                              <div class="form-group">
                                 <label for="anamnesis">Medicamentos a pedido</label>
                                 <input readonly class="form-control" name="anamnesis[medicamentos_pedido]" value="<?php echo $anamnesis->medicamentos_pedido; ?>">
                              </div>

                              <div class="form-group">
                                 <label for="anamnesis">Metodos anticonceptivos</label>
                                 <input readonly class="form-control" name="anamnesis[metodos_anticonceptivos]" value="<?php echo $anamnesis->metodos_anticonceptivos; ?>">
                              </div>

                              <div class="form-group" style="margin-top: 30px">
                                 <div class="panel panel-default">
                                    <div class="panel-heading">Fotos</div>

                                    <div class="panel-body">
                                       <?php foreach (json_decode($consulta->fotos) as $foto): ?>
                                          <a href="<?php echo '/uploads/consultas/' . $foto; ?>" data-title="<?php echo $foto; ?>" data-lightbox="fotos">
                                             <img width="25%" src="<?php echo '/uploads/consultas/' . $foto; ?>" alt="">
                                          </a>
                                       <?php endforeach; ?>
                                    </div>
                                 </div>
                              </div>
                           </div>

                           <div class="col-md-12">
                              <div class="form-group">
                                 <label for="prescripcion_medica">Prescripcion medica</label>
                                 <textarea readonly cols="30" rows="10" name="anamnesis[prescripcion_medica]" class="form-control"><?php echo $anamnesis->prescripcion_medica; ?></textarea>
                              </div>
                           </div>
                        </div>
                     </div>

                     <input type="hidden" name="id" value="<?php echo $consulta->id; ?>">
                  <?php echo form_close(); ?>
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


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.css" integrity="sha512-Woz+DqWYJ51bpVk5Fv0yES/edIMXjj3Ynda+KWTIkGoynAMHrqTcDUQltbipuiaD5ymEo9520lyoVOo9jCQOCA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js" integrity="sha512-k2GFCTbp9rQU412BStrcD/rlwv1PYec9SNrkbQlo6RZCf75l6KcC3UwDY8H5n5hl4v77IDtIPwOk9Dqjs/mMBQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

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
   });
</script>
