<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-bd">

            <div class="panel-heading no-print row">
                <div class="btn-group col-xs-4">


                    <?php
                    if($this->permission->method('bill_list','read')->access()){
                    ?>
                    <button onclick="printContent('printMe')" type="button" class="btn btn-danger"><i class="fa fa-print"></i> <?php echo display("print") ?></button>
                    <?php } ?>

                </div>
                <h2 class="col-xs-8 text-left text-success"><?php echo 'Ingreso de mercadería' ?></h2>
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
                                <td><?php echo 'Fecha de entrada'; ?>:</td>
                                <td><?php echo $mercaderia[0]->fecha_entrada; ?></td>
                                <td><?php echo 'Fecha de factura'; ?>:</td>
                                <td><?php echo $mercaderia[0]->fecha_factura; ?></td>
                            </tr>
                            <tr>
                                <td><?php echo 'Número de factura'; ?>:</td>
                                <td><?php echo $mercaderia[0]->numero_factura; ?></td>
                                <td><?php echo 'Proveedor'; ?>:</td>
                                <td><?php echo $mercaderia[0]->proveedor; ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- Patient Charge -->
                <div class="patient_charge">
                    <table class="charge">
                        <thead>
                            <tr>
                                <th><?php echo '#'; ?></th>
                                <th><?php echo 'Código'; ?></th>
                                <th><?php echo 'Nombre producto'; ?></th>
                                <th><?php echo 'Lote'; ?></th>
                                <th><?php echo 'Cantidad'; ?></th> 
                                <th><?php echo 'Precio compra'; ?></th>
                                <th><?php echo 'Fecha vencimiento'; ?></th>
                            </tr>
                        </thead>
                        <tbody>
                        	<?php $i = 1; foreach ($mercaderia as $item): ?>
	                        <tr>
	                            <td class="description">
	                                <p><?php echo $i; ?></p> 
	                            </td>
	                            <td class="description">
	                                <p><?php echo $item->codigo; ?></p> 
	                            </td>
	                            <td class="charge">
	                                <p><?php echo $item->nombre_producto; ?></p> 
	                            </td>
	                            <td class="discount">
	                                <p><?php echo $item->lote; ?></p> 
	                            </td>
	                            <td class="ballance">
	                                <p><?php echo $item->cantidad; ?></p>
	                            </td>
	                            <td class="ballance">
	                                <p><?php echo $item->precio_compra; ?></p>
	                            </td>
	                            <td class="ballance">
	                                <p><?php echo $item->fecha_vencimiento_producto; ?></p>
	                            </td>
	                        </tr>
	                    	<?php $i++; endforeach; ?>
                        </tbody> 
                    </table>
                </div>

                <div class="my_sign">
                    <span>___________________________</span>
                    <p><?php echo $mercaderia[0]->usuario ?></p>
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
