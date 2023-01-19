<style>
    .table-result {
        margin-top: 30px;
    }
</style>

<div class="row">
    <div class="col-sm-12">
        <?php if ($estado == 'Caja cerrada'): ?>
            <div class="alert alert-warning text-center">No puedes realizar ventas porque la caja esta cerrada</div>
        <?php endif; ?>
    </div>

    <div class="col-sm-6">
        <div  class="panel panel-default thumbnail">
            <div class="panel-body">
                <form id="buscar">
                    <div class="row">
                        <div class="col-md-10">
                            <input type="text" name="buscar" class="form-control" placeholder="Busca por nombre del producto o código...">
                        </div>

                        <div class="col-md-2">
                            <button class="btn btn-primary btn-sm btn-block">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>

                <table class="table table-result table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Precio</th>
                            <th>Stock</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody class="table-result-search">
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="col-sm-6">
        <div class="panel panel-default thumbnail">
            <div class="panel-body">
                <form action="/pharmacy/venta/guardar" id="venta" method="POST">
                    <label for="cliente">Cliente</label>
                    <select required name="cliente" class="form-control">
                        <option value=""></option>
                        <?php foreach ($clientes as $cliente): ?>
                            <option value="<?php echo $cliente->id_cliente ?>"><?php echo $cliente->nombre ?></option>
                        <?php endforeach; ?>
                    </select>

                    <hr>

                    <table class="table table-venta table-bordered table-hover">
                        <tbody class="table-venta-tbody">
                            
                        </tbody>

                        <tfoot>
                            <tr>
                                <th colspan="3">Descuento</th>
                                <th><input type="number" class="form-control form-control-sm" name="descuento" value="0.00"></th>
                            </tr>

                            <tr>
                                <th colspan="3">Total</th>
                                <th class="total">0.00</th>
                            </tr>
                        </tfoot>
                    </table>

                    <hr>

                    <table class="table table-bordered table-hover">
                        <tfoot>
                            <tr>
                                <th colspan="3">Efectivo</th>
                                <th><input type="number" class="form-control form-control-sm pagos" name="pagos[efectivo]" value="0.00"></th>
                            </tr>

                            <tr>
                                <th colspan="3">Crédito</th>
                                <th><input type="number" class="form-control form-control-sm pagos" name="pagos[credito]" value="0.00"></th>
                            </tr>

                            <tr>
                                <th colspan="3">Débito</th>
                                <th><input type="number" class="form-control form-control-sm pagos" name="pagos[debito]" value="0.00"></th>
                            </tr>

                            <tr>
                                <th colspan="3">QR</th>
                                <th><input type="number" class="form-control form-control-sm pagos" name="pagos[qr]" value="0.00"></th>
                            </tr>

                            <tr>
                                <th colspan="3">Transferencia</th>
                                <th><input type="number" class="form-control form-control-sm pagos" name="pagos[transferencia]" value="0.00"></th>
                            </tr>

                            <tr>
                                <th colspan="3">Otro</th>
                                <th><input type="number" class="form-control form-control-sm pagos" name="pagos[otro]" value="0.00"></th>
                            </tr>
                        </tfoot>
                    </table>

                    <?php if ($estado == 'Caja abierta'): ?>
                        <button class="btn btn-primary">Procesar</button>
                    <?php endif ?>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal" tabindex="-1" id="mostrarDescripcion" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Descripción</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<script>
    $(document).ready(function () {
        procesar = 0;

        $('#buscar').submit(function () {
            event.preventDefault();

            name = $('[name=buscar]').val();

            if (name == '') {
                return false;
            }

            html = '';

            $.ajax({
                type: 'GET',
                url: '/pharmacy/venta/buscar',
                data: {
                    name: name
                },
                success: function (response) {
                    $('.table-result-search').html(response);
                },
                error: function (error) {
                    $('body').html(error.responseText);
                }
            });
        });

        $('#venta').submit(function (event) {
            total = $('.total').html();
            total = parseFloat(total);

            pagos = 0;

            $('.pagos').each(function (key, value) {
                monto = $(value).val();
                monto = parseFloat(monto);

                pagos = pagos + monto;
            });

            if (pagos > total) {
                alert('El monto pagado no puede ser mayor al del total de la factura');
                event.preventDefault();
            }
        });

        $('#mostrarDescripcion').on('show.bs.modal', function (event) {
            button = $(event.relatedTarget);
            descripcion = button.attr('data-descripcion');
            $('#mostrarDescripcion').find('.modal-body').html(descripcion);
        })
    });

    function agregarAlCarrito(id, nombre, precio, stock) {
        total = $('.total').html();
        total = parseFloat(total);
        total = total + parseFloat(precio);

        descuento = $('[name=descuento]').val();
        descuento = parseFloat(descuento);

        if (descuento != 0.00) {
            total = total - descuento;
        }

        total = total.toFixed(2);
        $('.total').html(total);

        precio = parseFloat(precio).toFixed(2);

        html = '<tr class="items">';
        html += '<td class="nombre">'+nombre+'</td>';
        html += '<td class="precio">'+precio+'</td>';
        html += '<td><input onchange="actualizarTotales(this)" name="cantidad" class="form-control form-control-sm" type="number" value="1"></td>';
        html += '<td class="total_producto">'+precio+'</td>';
        html += '<td>';
        html += '<button onclick="quitarDelCarrito(this)" class="btn btn-danger btn-sm">';
        html += '<i class="fa fa-trash"></i>';
        html += '</button>';
        html += '</td>';
        html += '</tr>';

        $('.table-venta-tbody').append(html);
    }

    function actualizarTotales(that) {
        precio = $(that).parent().parent().find('.precio').html();
        cantidad = $(that).val();

        precio = parseFloat(precio);
        cantidad = parseFloat(cantidad);

        total_producto = precio*cantidad;
        total_producto = parseFloat(total_producto).toFixed(2);

        $(that).parent().parent().find('.total_producto').html(total_producto);

        calcular_total();
    }

    function calcular_total() {
        total = 0;

        descuento = $('[name=descuento]').val();
        descuento = parseFloat(descuento);

        $('.total_producto').each(function (key, value) {
            valor = $(value).html();
            valor = parseFloat(valor);
            total = total + valor;
        });

        if (descuento != 0.00) {
            total = total - descuento;
        }

        total = total.toFixed(2);
        $('.total').html(total);
    }

    function quitarDelCarrito(that) {
        total_producto = $(that).parent().parent().find('.total_producto').html();

        total = $('.total').html();
        total = parseFloat(total);
        total = total - parseFloat(total_producto);

        total = total.toFixed(2);
        $('.total').html(total);

        $(that).parent().parent().remove();
    }

    $('[name=descuento]').keyup(function () {
        calcular_total();
    });

    $('#venta').submit(function (event) {
        if (procesar == 0) {
            event.preventDefault();

            productos = [];

            $('.items').each(function (key, val) {
                producto = $(val).find('.nombre').html();
                precio = $(val).find('.precio').html();
                cantidad = $(val).find('[name=cantidad]').val();

                productos.push({
                    producto: producto,
                    cantidad: cantidad,
                    precio: precio
                });
            });

            productos = JSON.stringify(productos);

            $('#venta').append("<input type='hidden' name='productos' value='" + productos + "'/>");

            procesar = 1;

            $('#venta').submit();
        }
    });
</script>