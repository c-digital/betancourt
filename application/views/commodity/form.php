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

                        <?php echo form_open('pharmacy/commodity/create','class="form-inner"') ?>

                            <div class="form-group row">
                                <div class="col-xs-4">
                                    <label for="fecha_entrada"><?php echo 'Fecha de entrada' ?></label>
                                    <input name="fecha_entrada" type="date" class="form-control" id="fecha_entrada">
                                </div>

                                <div class="col-xs-4">
                                    <label for="fecha_factura"><?php echo 'Fecha de factura' ?></label>
                                    <input name="fecha_factura" type="date" class="form-control" id="fecha_factura">
                                </div>

                                <div class="col-xs-4">
                                    <label for="numero_factura"><?php echo 'Número factura' ?></label>
                                    <input name="numero_factura" type="date" class="form-control" id="numero_factura">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="proveedor" class="col-xs-3 col-form-label"><?php echo 'Proveedor' ?></label>
                                <div class="col-xs-9">
                                    <div class="input-group">
                                        <input name="proveedor" type="text" class="form-control" id="proveedor">

                                        <div class="input-group-btn">
                                            <button class="btn btn-primary">+</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="codigo" class="col-xs-3 col-form-label"><?php echo 'Código' ?></label>
                                <div class="col-xs-9">
                                    <input name="codigo" type="text" class="form-control" id="codigo">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="nombre_producto" class="col-xs-3 col-form-label"><?php echo 'Nombre del producto' ?></label>
                                <div class="col-xs-9">
                                    <div class="input-group">
                                        <input name="nombre_producto" type="text" class="form-control" id="nombre_producto">

                                        <div class="input-group-btn">
                                            <button class="btn btn-primary">+</button>
                                        </div>
                                    </div>
                                </div>                                
                            </div>

                            <div class="form-group row">
                                <label for="lote" class="col-xs-3 col-form-label"><?php echo 'Lote' ?></label>
                                <div class="col-xs-9">
                                    <input name="lote" type="text" class="form-control" id="lote">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="cantidad" class="col-xs-3 col-form-label"><?php echo 'Cantidad' ?></label>
                                <div class="col-xs-9">
                                    <input name="cantidad" type="text" class="form-control" id="cantidad">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="precio_compra" class="col-xs-3 col-form-label"><?php echo 'Precio compra' ?></label>
                                <div class="col-xs-9">
                                    <input name="precio_compra" type="text" class="form-control" id="precio_compra">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="fecha_vencimiento_producto" class="col-xs-3 col-form-label"><?php echo 'Fecha vencimiento producto' ?></label>
                                <div class="col-xs-9">
                                    <input name="fecha_vencimiento_producto" type="date" class="form-control" id="fecha_vencimiento_producto">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <div class="col-sm-offset-3 col-sm-6">
                                    <div class="ui buttons">
                                        <button type="reset" class="ui button"><?php echo display('reset') ?></button>
                                        <div class="or"></div>
                                        <button class="ui positive button"><?php echo display('save') ?></button>
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
<script type="text/javascript">
$(document).ready(function() {

    //check patient id
    $('body').on('keyup change click', '#patient_id', function(){
        var pid = $(this);

        $.ajax({
            url  : '<?= base_url('medication_visit/medications/check_patient/') ?>',
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
});
 
 </script>