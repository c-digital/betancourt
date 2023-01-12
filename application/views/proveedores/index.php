<div class="row">
    <!--  table area -->
    <div class="col-sm-12">
        <div  class="panel panel-default thumbnail">
            <div class="panel-heading no-print">
                <div class="row">
                    <div class="col-lg-2 col-sm-12">
                        <div class="btn-group"> 
                            <a class="btn btn-success" href="<?php echo base_url("pharmacy/proveedores/agregar") ?>"> <i class="fa fa-plus"></i>  <?php echo 'Agregar proveedor' ?> </a>  
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-12"></div>
                </div>
            </div>

            <div class="panel-body">
                <table width="100%" class="datatable table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th><?php echo '#' ?></th>
                            <th><?php echo 'Nombre' ?></th>
                            <th><?php echo 'NIT' ?></th>
                            <th><?php echo 'Teléfono' ?></th>
                            <th><?php echo 'Email' ?></th>
                            <th><?php echo 'Dirección' ?></th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody> 
                        <?php if (!empty($proveedores)) { ?>

                            <?php $sl = 1; ?>

                            <?php foreach ($proveedores as $proveedor) { ?>
                                <tr class="<?php echo ($sl & 1)?"odd gradeX":"even gradeC" ?>">
                                <td><?php echo $sl; ?></td>
                                <td><?php echo $proveedor->nombre; ?></td>
                                <td><?php echo $proveedor->nit; ?></td>
                                <td><?php echo $proveedor->telefono; ?></td>
                                <td><?php echo $proveedor->email; ?></td>
                                <td><?php echo $proveedor->direccion; ?></td>
                                <td nowrap="">
                                    <a href="<?php echo '/pharmacy/proveedores/editar/' . $proveedor->id ?>" class="btn btn-default btn-sm">
                                        <i class="fa fa-eye"></i> Editar
                                    </a>

                                    <a href="<?php echo '/pharmacy/proveedores/eliminar/' . $proveedor->id ?>" class="btn btn-danger btn-sm">
                                        <i class="fa fa-trash"></i> Eliminar
                                    </a>
                                </td>
                                <?php $sl++; ?>
                            <?php } ?> 
                        <?php } ?> 
                    </tbody>
                </table>  <!-- /.table-responsive -->
            </div>
        </div>
    </div>
</div>