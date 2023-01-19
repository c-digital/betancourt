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

                        <?php echo form_open('pharmacy/mercaderia/create','class="form-inner"') ?>

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
                                    <input name="numero_factura" required type="text" class="form-control" id="numero_factura">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="proveedor" class="col-xs-3 col-form-label"><?php echo 'Proveedor' ?></label>
                                <div class="col-xs-9">
                                    <div class="input-group">
                                        <select name="proveedor" class="form-control">
                                            <option value=""></option>

                                            <?php foreach ($proveedores as $proveedor): ?>
                                                <option value="<?php echo $proveedor->nombre; ?>"><?php echo $proveedor->nombre; ?></option>
                                            <?php endforeach; ?>
                                        </select>

                                        <div class="input-group-btn">
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#crear_proveedor">+</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr>

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
                                        <select name="nombre_producto" class="form-control">
                                            <option value=""></option>

                                            <?php foreach ($productos as $producto): ?>
                                                <option value="<?php echo $producto->name; ?>"><?php echo $producto->name; ?></option>
                                            <?php endforeach; ?>
                                        </select>

                                        <div class="input-group-btn">
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#crear_producto">+</button>
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
                                    <button class="ui positive button agregar-producto" type="button"><?php echo 'Agregar a factura' ?></button>
                                </div>
                            </div>

                            <hr>

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Código</th>
                                        <th>Producto</th>
                                        <th>Lote</th>
                                        <th>Cantidad</th>
                                        <th>Precio compra</th>
                                        <th>Total</th>
                                        <th>Fecha de vencimiento</th>
                                    </tr>
                                </thead>

                                <tbody class="tabla-productos"></tbody>

                                <tfooter>
                                    <tr>
                                        <th colspan="6"></th>
                                        <th class="total_general">0</th>
                                    </tr>
                                </tfooter>
                            </table>

                            <hr>
                            
                            <div class="form-group row">
                                <div class="col-sm-offset-3 col-sm-6">
                                    <div class="ui buttons">
                                        <button type="reset" class="ui button"><?php echo display('reset') ?></button>
                                        <div class="or"></div>
                                        <button class="ui positive button"><?php echo 'Registrar factura' ?></button>
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

    <div class="modal fade" id="crear_proveedor" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close close_crear_proveedor" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Crear proveedor</h4>
          </div>
          <div class="modal-body">
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" name="proveedor_nombre">
            </div>

            <div class="form-group">
                <label for="nit">NIT</label>
                <input type="text" class="form-control" name="proveedor_nit">
            </div>

            <div class="form-group">
                <label for="telefono">Teléfono</label>
                <input type="text" class="form-control" name="proveedor_telefono">
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="proveedor_email">
            </div>

            <div class="form-group">
                <label for="direccion">Dirección</label>
                <textarea name="proveedor_direccion" class="form-control"></textarea>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <button type="button" class="guardar-proveedor btn btn-primary">Guardar cambios</button>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="crear_producto" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close close_crear_producto" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Crear producto</h4>
          </div>
          <div class="modal-body">
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" name="producto_nombre">
            </div>

            <div class="form-group">
                <label for="codigo">Código</label>
                <input type="text" class="form-control" name="producto_codigo">
            </div>

            <div class="form-group">
                <label for="categoria">Categoría</label>
                <select name="producto_categoria" class="form-control">
                    <option value=""></option>
                    <?php foreach ($categorias as $categoria): ?>
                        <option value="<?php echo $categoria->id ?>"><?php echo $categoria->name ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="descripcion">Descripción</label>
                <textarea name="producto_descripcion" class="form-control"></textarea>
            </div>

            <div class="form-group">
                <label for="precio">Precio</label>
                <input type="text" class="form-control" name="producto_precio">
            </div>

            <div class="form-group">
                <label for="fabricado_por">Fabricado por</label>
                <select name="producto_fabricado_por" class="form-control">
                    <option value=""></option>
                    <?php foreach ($proveedores as $proveedor): ?>
                        <option value="<?php echo $proveedor->nombre ?>"><?php echo $proveedor->nombre ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <button type="button" class="guardar-producto btn btn-primary">Guardar cambios</button>
          </div>
        </div>
      </div>
    </div>

</div>

<script>
    $(document).ready(function () {

        $('[name=codigo]').keyup(function () {
            codigo = $('[name=codigo]').val();

            $.ajax({
                type: 'GET',
                url: '/pharmacy/mercaderia/info',
                data: {
                    codigo: codigo
                },
                success: function (response) {
                    response = JSON.parse(response);
                    $('[name=nombre_producto]').val(response.name);
                    $('[name=nombre_producto]').trigger('change');
                },
                error: function (error) {
                    console.log(error.responseText);
                },
            });
        });

        $('.guardar-proveedor').click(function () {
            proveedor_nombre = $('[name=proveedor_nombre]').val();
            proveedor_nit = $('[name=proveedor_nit]').val();
            proveedor_telefono = $('[name=proveedor_telefono]').val();
            proveedor_email = $('[name=proveedor_email]').val();
            proveedor_direccion = $('[name=proveedor_direccion]').val();

            $.ajax({
                type: 'POST',
                url: '/proveedores/create',
                data: {
                    nombre: proveedor_nombre,
                    nit: proveedor_nit,
                    telefono: proveedor_telefono,
                    email: proveedor_email,
                    direccion: proveedor_direccion
                }
            });

            $('[name=proveedor]').append('<option selected value="' + proveedor_nombre + '">' + proveedor_nombre + '</option>');
            $('.close_crear_proveedor').click();
        });

        $('.guardar-producto').click(function () {
            producto_nombre = $('[name=producto_nombre]').val();
            producto_categoria = $('[name=producto_categoria]').val();
            producto_descripcion = $('[name=producto_descripcion]').val();
            producto_precio = $('[name=producto_precio]').val();
            producto_fabricado_por = $('[name=producto_fabricado_por]').val();
            producto_codigo = $('[name=producto_codigo]').val();

            $.ajax({
                type: 'POST',
                url: '/productos/create',
                data: {
                    nombre: producto_nombre,
                    categoria: producto_categoria,
                    descripcion: producto_descripcion,
                    precio: producto_precio,
                    fabricado_por: producto_fabricado_por,
                    codigo: producto_codigo
                }
            });

            $('[name=producto_nombre]').val('');
            $('[name=producto_categoria]').val('').trigger('change');
            $('[name=producto_descripcion]').val('');
            $('[name=producto_precio]').val('');
            $('[name=producto_fabricado_por]').val('');
            $('[name=producto_codigo]').val('');

            $('[name=nombre_producto]').append('<option selected value="' + producto_nombre + '">' + producto_nombre + '</option>');
            $('.close_crear_producto').click();
        });

        i = 0;
        j = 1;

        total_general = $('.total_general').html();
        total_general = parseFloat(total_general);

        $('.agregar-producto').click(function () {
            codigo = $('[name=codigo]').val();
            nombre_producto = $('[name=nombre_producto]').val();
            lote = $('[name=lote]').val();
            cantidad = $('[name=cantidad]').val();
            precio_compra = $('[name=precio_compra]').val();
            fecha_vencimiento_producto = $('[name=fecha_vencimiento_producto]').val();
            total = parseFloat(cantidad) * parseFloat(precio_compra);

            $('.tabla-productos').append(`
                <tr>
                    <td>${j}</td>
                    <td>${codigo}</td>
                    <td>${nombre_producto}</td>
                    <td>${lote}</td>
                    <td>${cantidad}</td>
                    <td>${precio_compra}</td>
                    <td>${total}</td>
                    <td>${fecha_vencimiento_producto}</td>
                </tr>

                <input type="hidden" name="productos[${i}][codigo]" value="${codigo}">
                <input type="hidden" name="productos[${i}][nombre_producto]" value="${nombre_producto}">
                <input type="hidden" name="productos[${i}][lote]" value="${lote}">
                <input type="hidden" name="productos[${i}][cantidad]" value="${cantidad}">
                <input type="hidden" name="productos[${i}][precio_compra]" value="${precio_compra}">
                <input type="hidden" name="productos[${i}][fecha_vencimiento_producto]" value="${fecha_vencimiento_producto}">
            `);

            total_general = total_general + total;

            $('.total_general').html(total_general);

            $('[name=codigo]').val('');
            $('[name=nombre_producto]').val('').trigger('change');
            $('[name=lote]').val('');
            $('[name=cantidad]').val('');
            $('[name=precio_compra]').val('');
            $('[name=fecha_vencimiento_producto]').val('');

            i = i+1;
        });
    });
</script>