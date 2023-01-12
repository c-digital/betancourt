<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-bd">

            <div class="panel-heading no-print row">
                <div class="btn-group col-xs-4">


                    <button onclick="printContent('printMe')" type="button" class="btn btn-danger"><i class="fa fa-print"></i> <?php echo display("print") ?></button>

                    <a class="btn btn-primary" href="<?php echo base_url("/pharmacy/venta") ?>"> <i class="fa fa-list"></i>  Volver a punto de venta </a> 

                </div>
                <h2 class="col-xs-8 text-left text-success"><?php echo 'Factura de venta en farmacia' ?></h2>
            </div>  


           <?php
            if($this->permission->method('bill_list','read')->access()){
            ?>
            <div class="panel-body" id="printMe">
                <div class="row">
                    <div class="col-xs-6 logo_bar">
                        <img src="<?php echo base_url("$website->logo") ?>" class="img-responsive" alt=""></br>
                        <?php echo display('phone') ?>: <?php echo $website->phone; ?></br>
                        <?php echo display('email') ?>: <?php echo $website->email; ?>
                        <br>
                    </div>
                    <div class="col-xs-6 address_bar">
                        <div class="address_inner">
                            <address>
                                <strong><?php echo display('address') ?></strong><br>
                                <strong><?php echo $website->title; ?></strong><br>
                                <?php echo $website->description; ?>
                            </address>
                        </div>
                    </div>
                </div> <hr>
                <!-- Patient Info -->
                <div class="row patient_info">
                    <table class="info">
                        <tbody>
                            <tr>
                                <td><?php echo 'Número de factura'; ?>:</td>
                                <td><?php echo $venta->numero_factura; ?></td>
                            </tr>

                            <tr>
                                <td><?php echo 'Cliente'; ?>:</td>
                                <td><?php echo $venta->cliente; ?></td>

                                <td><?php echo 'Fecha'; ?>:</td>
                                <td><?php echo date_format(date_create($venta->fecha), 'd/m/Y h:i A'); ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- Patient Charge -->
                <div class="patient_charge">
                    <table class="charge">
                        <thead>
                            <tr>
                                <th colspan="6">Detalles</th>
                            </tr>

                            <tr>
                                <th><?php echo '#'; ?></th>
                                <th><?php echo 'Producto'; ?></th>
                                <th><?php echo 'Cantidad'; ?></th>
                                <th><?php echo 'Precio'; ?></th>
                                <th><?php echo 'Precio total'; ?></th>
                            </tr>
                        </thead>
                        <tbody>
                        	<?php $i = 1; $subtotal = 0; foreach (json_decode($venta->detalles) as $item): ?>
    	                        <tr>
    	                            <td class="description">
    	                                <p><?php echo $i; ?></p> 
    	                            </td>
    	                            <td class="description">
    	                                <p><?php echo $item->producto; ?></p> 
    	                            </td>
    	                            <td class="charge">
    	                                <p><?php echo $item->cantidad; ?></p> 
    	                            </td>
    	                            <td class="discount">
    	                                <p><?php echo $item->precio; ?></p> 
    	                            </td>
    	                            <td class="ballance">
    	                                <p><?php echo number_format($item->cantidad * $item->precio, 2); ?></p>
    	                            </td>
    	                        </tr>
	                    	<?php $i++; $subtotal = $subtotal + ($item->cantidad * $item->precio); endforeach; ?>
                        </tbody> 
                    </table>

                    <br>

                    <div class="row">
                        <div class="col-md-8"></div>

                        <div class="col-md-4">
                            <table class="charge">
                                <tbody>
                                    <tr>
                                        <th>Subtotal</th>
                                        <td><?php echo number_format($subtotal, 2) ?></td>
                                    </tr>

                                    <tr>
                                        <th>Descuento</th>
                                        <td><?php echo $venta->descuento ?></td>
                                    </tr>

                                    <tr>
                                        <th>Total</th>
                                        <td><?php echo number_format($subtotal - $venta->descuento, 2) ?></td>
                                    </tr>
                            </table>
                        </div>
                    </div>

                    <br>

                    <div class="row">
                        <div class="col-md-8"></div>

                        <div class="col-md-4">
                            <table class="charge">
                                <tbody>
                                    <tr>
                                        <th colspan="2">Pagos</th>
                                    </tr>

                                    <?php $total_pagos = 0; foreach (json_decode($venta->pagos) as $metodo => $monto): ?>
                                        <tr>
                                            <th><?php echo ucfirst($metodo); ?></th>
                                            <td><?php echo number_format($monto, 2); ?></td>
                                        </tr>
                                    <?php $total_pagos = $total_pagos + $monto; endforeach; ?>

                                    <tr>
                                        <th>Total pagado</th>
                                        <td><?php echo number_format($total_pagos, 2); ?></td>
                                    </tr>

                                    <tr>
                                        <th>Restante</th>
                                        <td><?php echo number_format(($subtotal - $venta->descuento) - $total_pagos, 2); ?></td>
                                    </tr>
                            </table>
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
