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

                        <?php echo form_open('pharmacy/masivo/store','class="form-inner"') ?>

                            <div class="form-group row">
                                <label for="producto" class="col-xs-3 col-form-label"><?php echo 'Nombre del producto' ?></label>
                                <div class="col-xs-9">
                                    <select name="producto" class="form-control">
                                        <option value=""></option>

                                        <?php foreach ($productos as $producto): ?>
                                            <option value="<?php echo $producto->name; ?>"><?php echo $producto->name; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>                                
                            </div>

                            <div class="form-group row">
                                <label for="almacen" class="col-xs-3 col-form-label"><?php echo 'Almacen' ?></label>
                                <div class="col-xs-9">
                                    <select name="almacen" class="form-control">
                                        <option value=""></option>

                                        <?php foreach ($almacenes as $almacen): ?>
                                            <option value="<?php echo $almacen->nombre; ?>"><?php echo $almacen->nombre; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>                                
                            </div>

                            <div class="form-group row">
                                <label for="cantidad" class="col-xs-3 col-form-label"><?php echo 'Cantidad' ?></label>
                                <div class="col-xs-9">
                                    <input type="number" class="form-control" name="cantidad">
                                </div>                                
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-offset-3 col-sm-6">
                                    <button type="button" class="add-product ui positive button"><?php echo 'Agregar' ?></button>
                                </div>
                            </div>

                            <hr>

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Producto</th>
                                        <th>Almacen</th>
                                        <th>Cantidad</th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody class="tabla-productos"></tbody>
                            </table>

                            <hr>
                            
                            <div class="form-group row">
                                <div class="col-sm-offset-3 col-sm-6">
                                    <div class="ui buttons">
                                        <button type="reset" class="ui button"><?php echo display('reset') ?></button>
                                        <div class="or"></div>
                                        <button class="ui positive button"><?php echo 'Completar movimiento masivo' ?></button>
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

        $('.add-product').click(function () {
            producto = $('[name=producto]').val();
            almacen = $('[name=almacen]').val();
            cantidad = $('[name=cantidad]').val();

            $('.tabla-productos').append(`
                <tr>
                    <td>${j}</td>
                    <td>${producto}</td>
                    <td>${almacen}</td>
                    <td><input type="number" class="form-control" name="productos[${j}][cantidad]" value="${cantidad}"></td>
                    <td>
                        <button class="btn btn-danger btn-sm" type="button" onclick="removeProduct(this)">
                            <i class="fa fa-trash"></i>
                        </button>
                    </td>

                    <input type="hidden" name="productos[${j}][producto]" value="${producto}">
                    <input type="hidden" name="productos[${j}][almacen]" value="${almacen}">
                </tr>
            `);

            j = j + 1;
            i = i + 1;

            $('[name=cantidad]').val('');
        });
    });

    function removeProduct(that) {
        $(that).parent().parent().remove();
    }
</script>