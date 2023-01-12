<div class="row">
    <form action="" style="margin-bottom: 3%; margin-top: 3%">
        <div class="col-sm-12">
            <div class="row">
                <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
                    <label for="inicio">Fecha inicio</label>
                    <input type="date" class="form-control" name="inicio" value="<?php echo (isset($_GET['inicio'])) ? $_GET['inicio'] : '' ?>">
                </div>

                <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
                    <label for="fin">Fecha fin</label>
                    <input type="date" class="form-control" name="fin" value="<?php echo (isset($_GET['inicio'])) ? $_GET['fin'] : '' ?>">
                </div>

                <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
                    <label for="estado">Estado</label>
                    <select name="estado" class="form-control">
                        <option value="Todos">Todos</option>
                        <option <?php echo (isset($_GET['estado']) && $_GET['estado'] == 'Pagado') ? 'selected' : '' ?> value="Pagado">Pagado</option>
                        <option <?php echo (isset($_GET['estado']) && $_GET['estado'] == 'Pendiente') ? 'selected' : '' ?> value="Pendiente">Pendiente</option>
                    </select>
                </div>

                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                        <label for="profesional">Profesional</label>
                        <select name="profesional" class="form-control">
                            <option value="Todos">Todos</option>
                            <?php foreach ($profesionales as $profesional): ?>
                                <option <?php echo (isset($_GET['profesional']) && $_GET['profesional'] == $profesional->id) ? 'selected' : '' ?> value="<?php echo $profesional->id; ?>"><?php echo $profesional->nombre; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
                    <label for="">&nbsp;</label>
                    <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-eye"></i> Buscar</button>
                </div>
            </div>
        </div>
    </form>

    <!--  table area -->
    <div class="col-sm-12" style="margin-top: 3%">
        <div  class="panel panel-default thumbnail">
            <div class="panel-body">
                <table id="billList" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr> 
                            <th class="text-center"><?php echo 'ID' ?></th>
                            <th class="text-center"><?php echo 'Servicio' ?></th>
                            <th class="text-center"><?php echo 'Profesional' ?></th>
                            <th class="text-center"><?php echo 'Fecha' ?></th>
                            <th class="text-center"><?php echo 'Factura' ?></th>
                            <th class="text-center"><?php echo 'Monto' ?></th>
                            <th class="text-center"><?php echo 'Estado' ?></th>
                            <th class="text-center"><?php echo 'Acción' ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($services)) { ?>
                            <?php $sl = 1; ?>
                            <?php foreach ($services as $service) { ?>
                                <tr>
                                    <td class="text-center"><?php echo $sl; ?></td>
                                    <td class="text-center"><?php echo $service->service_name; ?></td>
                                    <td class="text-center"><?php echo $service->professional_name; ?></td>
                                    <td class="text-center"><?php echo $service->date; ?></td>
                                    <td class="text-center"><?php echo $service->bill_id; ?></td>
                                    <td class="text-center"><?php echo $service->amount; ?></td>
                                    <td class="text-center"><?php echo ($service->status) ? 'Pagado' : 'Pendiente'; ?></td>
                                    <td class="text-center">
                                        <?php if (!$service->status): ?>
                                            <a href="/billing/professional/pagada/<?php echo $service->id ?>" class="btn btn-primary btn-sm">Marcar como pagada</a>
                                        <?php endif; ?>

                                        <a href="/billing/professional/eliminar/<?php echo $service->id ?>" class="btn btn-danger btn-sm">Eliminar</a>
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