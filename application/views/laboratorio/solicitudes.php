<div class="row">
    <!--  table area -->
    <div class="col-sm-12">
        <div  class="panel panel-default thumbnail">

            <div class="panel-heading no-print">
                <div class="btn-group">
                    <a class="btn btn-success" href="<?php echo base_url("laboratorio/crear_solicitud") ?>"> <i class="fa fa-plus"></i>  <?php echo 'Crear solicitud' ?> </a> 
                </div>
            </div> 

            <div class="panel-body">
                <table width="100%" class="datatable table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th><?php echo display('serial') ?></th>
                            <th><?php echo 'Paciente' ?></th>
                            <th><?php echo 'Fecha' ?></th>
                            <th><?php echo 'Estado' ?></th> 
                            <th><?php echo display('action') ?></th> 

                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($solicitudes)) { ?>
                            <?php $sl = 1; ?>
                            <?php foreach ($solicitudes as $solicitud) { ?>
                                <tr class="<?php echo ($sl & 1)?"odd gradeX":"even gradeC" ?>">
                                    <td><?php echo $sl; ?></td>
                                    <td><?php echo $solicitud->paciente; ?></td>
                                    <td><?php echo $solicitud->fecha; ?></td>
                                    <td><?php echo $solicitud->estado; ?></td>

                                    <td class="center" width="80">

                                        <a href="<?php echo base_url("laboratorio/ver_solicitud/$solicitud->id") ?>" class="btn btn-xs btn-primary">Ver</a>

                                        <?php if ($solicitud->estado == 'Pendiente'): ?>
                                            <a href="<?php echo base_url("laboratorio/en_analisis/$solicitud->id") ?>" class="btn btn-xs btn-success">Poner en análisis</a>
                                        <?php endif; ?>

                                        <?php if ($solicitud->estado == 'En análisis'): ?>
                                            <a href="<?php echo base_url("laboratorio/completar/$solicitud->id") ?>" class="btn btn-xs btn-success">Completar</a>
                                        <?php endif; ?>

                                        <a href="<?php echo base_url("laboratorio/eliminar_solicitud/$solicitud->id") ?>" class="btn btn-xs btn-danger" onclick="return confirm('<?php echo display('are_you_sure') ?>') "><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                <?php $sl++; ?>
                            <?php } ?> 
                        <?php } ?> 
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
 
 