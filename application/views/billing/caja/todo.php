<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-bd">

            <div class="panel-heading no-print row">
                <div class="btn-group col-xs-4">


                    <button onclick="printContent('printMe')" type="button" class="btn btn-danger"><i class="fa fa-print"></i> <?php echo display("print") ?></button>

                    <a class="btn btn-primary" href="<?php echo base_url("billing/caja") ?>"> <i class="fa fa-list"></i>  Volver a caja </a> 

                </div>
                <h2 class="col-xs-8 text-left text-success"><?php echo 'Cierre de caja' ?></h2>
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
                                <td><?php echo 'Fecha'; ?>:</td>
                                <td><?php echo date('d/m/Y h:i A'); ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- Patient Charge -->
                <div class="patient_charge">
                    <table class="charge">
                        <thead>
                            <tr>
                                <th colspan="6">Movimientos</th>
                            </tr>

                            <tr>
                                <th><?php echo '#'; ?></th>
                                <th><?php echo 'Tipo de movimiento'; ?></th>
                                <th><?php echo 'Fecha'; ?></th>
                                <th><?php echo 'Monto'; ?></th>
                                <th><?php echo 'Método de pago'; ?></th> 
                                <th><?php echo 'Concepto'; ?></th>
                            </tr>
                        </thead>
                        <tbody>
                        	<?php $i = 1; foreach ($movimientos as $item): ?>
	                        <tr>
	                            <td class="description">
	                                <p><?php echo $i; ?></p> 
	                            </td>
	                            <td class="description">
	                                <p><?php echo $item->tipo_movimiento; ?></p> 
	                            </td>
	                            <td class="charge">
	                                <p><?php echo $item->fecha; ?></p> 
	                            </td>
	                            <td class="discount">
	                                <p><?php echo $item->monto; ?></p> 
	                            </td>
	                            <td class="ballance">
	                                <p><?php echo $item->metodo_pago; ?></p>
	                            </td>
	                            <td class="ballance">
	                                <p><?php echo $item->concepto; ?></p>
	                            </td>
	                        </tr>
	                    	<?php $i++; endforeach; ?>
                        </tbody> 
                    </table>

                    <br>

                    <div class="row">
                        <div class="col-md-8"></div>

                        <div class="col-md-4">
                            <table class="charge">
                                <thead>
                                    <tr>
                                        <th colspan="2"><?php echo 'Totales'; ?></th>
                                    </tr>

                                    <tr>
                                        <th><?php echo 'Tipo'; ?></th>
                                        <th><?php echo 'Monto'; ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="description">
                                            <p><?php echo 'Entradas'; ?></p> 
                                        </td>
                                        <td class="description">
                                            <p><?php echo number_format($entradas, 2); ?></p> 
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="description">
                                            <p><?php echo 'Salidas'; ?></p> 
                                        </td>
                                        <td class="description">
                                            <p><?php echo number_format($salidas, 2); ?></p> 
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="description">
                                            <p><?php echo 'Dinero en caja'; ?></p> 
                                        </td>
                                        <td class="description">
                                            <p><?php echo number_format($entradas-$salidas, 2); ?></p> 
                                        </td>
                                    </tr>

                                    <?php foreach ($tipos as $tipo): ?>
                                    <tr>
                                        <td class="description">
                                            <p><?php echo $tipo->metodo_pago; ?></p> 
                                        </td>
                                        <td class="description">
                                            <p><?php echo number_format($tipo->total, 2); ?></p> 
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody> 
                            </table>
                        </div>
                    </div>
                </div>

                <div class="my_sign">
                    <span>___________________________</span>
                    <p><?php echo '' ?></p>
                    <p><?php echo display('signature'); ?></p>
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
