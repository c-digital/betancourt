<div class="row">
    <!--  table area -->
    <div class="col-sm-12">
        <div  class="panel panel-default thumbnail">
            <?php if($this->permission->method('add_patient','create')->access() ): ?>
                <div class="panel-heading no-print">
                    <div class="row">
                        <div class="col-lg-2 col-sm-12">
                            <div class="btn-group"> 
                                <a class="btn btn-success" href="<?php echo base_url("pharmacy/mercaderia/form") ?>"> <i class="fa fa-plus"></i>  <?php echo 'Ingreso de mercaderia' ?> </a>  
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-12"></div>
                    </div>
                </div>
            <?php endif; ?>


            <?php if($this->permission->method('patient_list','read')->access() || $this->permission->method('patient_list','update')->access() || $this->permission->method('patient_list','delete')->access()): ?>
            <div class="panel-body">

                <form action="">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="fecha_entrada">Fecha entrada</label>
                                <input type="date" name="fecha_entrada" class="form-control" value="<?php echo $_GET['fecha_entrada']; ?>">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="proveedor">Proveedor</label>
                                <select name="proveedor" class="form-control">
                                    <option value=""></option>

                                    <?php foreach ($proveedores as $proveedor): ?>
                                        <option <?php echo $proveedor->nombre == $_GET['proveedor'] ? 'selected' : ''; ?> value="<?php echo $proveedor->nombre; ?>"><?php echo $proveedor->nombre; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="medicamento">Medicamento</label>
                                <select name="medicamento" class="form-control">
                                    <option value=""></option>

                                    <?php foreach ($medicamentos as $medicamento): ?>
                                        <option <?php echo $medicamento->nombre_producto == $_GET['medicamento'] ? 'selected' : ''; ?> value="<?php echo $medicamento->nombre_producto; ?>"><?php echo $medicamento->nombre_producto; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-1">
                            <div class="form-group" style="margin-top: 25px">
                                <button class="btn btn-primary">
                                    <i class="fa fa-eye"></i> Buscar
                                </button>
                            </div>
                        </div>
                    </div>
                </form>

                <hr>

                <table width="100%" class="datatable table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th><?php echo display('id') ?></th>
                            <th><?php echo display('date_entry') ?></th>
                            <th><?php echo display('date_invoice') ?></th>
                            <th><?php echo display('number_invoice') ?></th>
                            <th><?php echo display('provider') ?></th>
                            <th><?php echo display('name_product') ?></th>
                            <th><?php echo display('batch') ?></th>
                            <th><?php echo display('quantity') ?></th>
                            <th><?php echo display('purchase_price') ?></th>
                            <th><?php echo display('date_expiration_product') ?></th>
                            <th><?php echo display('user') ?></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody> 
                        <?php if (!empty($mercaderias)): ?>
                            <?php $i = 1; foreach ($mercaderias as $mercaderia): ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $mercaderia->fecha_entrada; ?></td>
                                    <td><?php echo $mercaderia->fecha_factura; ?></td>
                                    <td><?php echo $mercaderia->numero_factura; ?></td>
                                    <td><?php echo $mercaderia->proveedor; ?></td>
                                    <td><?php echo $mercaderia->nombre_producto; ?></td>
                                    <td><?php echo $mercaderia->lote; ?></td>
                                    <td><?php echo $mercaderia->cantidad; ?></td>
                                    <td><?php echo $mercaderia->precio_compra; ?></td>
                                    <td><?php echo $mercaderia->fecha_vencimiento_producto; ?></td>
                                    <td><?php echo $mercaderia->usuario; ?></td>
                                    <td>
                                        <a href="<?php echo '/pharmacy/mercaderia/view/' . $mercaderia->id; ?>" class="btn btn-default btn-sm">
                                            <i class="fa fa-eye"></i> Ver
                                        </a>
                                    </td>
                                </tr>
                            <?php $i++; endforeach; ?> 
                        <?php endif; ?> 
                    </tbody>
                </table>  <!-- /.table-responsive -->
            </div>
            <?php else: ?>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="panel panel-bd lobidrag">
                            <div class="panel-heading">
                                <div class="panel-title">
                                    <h4><?php echo display('you_do_not_have_permission_to_access_please_contact_with_administrator'); ?>.</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
