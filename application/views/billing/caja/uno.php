<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-bd">

            <div class="panel-heading no-print row">
                <div class="btn-group col-xs-4">

                    <button onclick="printContent('printMe')" type="button" class="btn btn-danger"><i class="fa fa-print"></i> <?php echo display("print") ?></button>
                    <a class="btn btn-primary" href="<?php echo base_url("billing/caja") ?>"> <i class="fa fa-list"></i>  Volver a caja </a> 

                </div>
                <h2 class="col-xs-8 text-left text-success"><?php echo 'Recibo de caja' ?></h2>
            </div>  


           <?php if($this->permission->method('bill_list','read')->access()){ ?>

            <div class="panel-body" id="printMe">
                <div class="row">
                    <div class="col-xs-6 logo_bar">
                        <img src="<?php echo base_url("$website->logo") ?>" class="img-responsive" alt=""></br>
                        <?php echo display('phone') ?>: <?php echo $website->phone; ?></br>
                        <?php echo display('email') ?>: <?php echo $website->email; ?><br>
                        <?php echo display('address') ?>: <?php echo $website->description; ?><br>
                        <?php echo 'Cajero' ?>: <?php echo $this->session->userdata('fullname'); ?>
                        <br>
                    </div>
                </div>

                <hr>

                <!-- Patient Charge -->
                <div class="patient_charge">
                    <table class="charge">
                        <thead>
                            <tr>
                                <th colspan="6">Movimiento</th>
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
	                        <tr>
	                            <td class="description">
	                                <p><?php echo 1; ?></p> 
	                            </td>
	                            <td class="description">
	                                <p><?php echo $movimiento->tipo_movimiento; ?></p> 
	                            </td>
	                            <td class="charge">
	                                <p><?php echo $movimiento->fecha; ?></p> 
	                            </td>
	                            <td class="discount">
	                                <p><?php echo number_format($movimiento->monto, 2); ?></p> 
	                            </td>
	                            <td class="ballance">
	                                <p><?php echo $movimiento->metodo_pago; ?></p>
	                            </td>
	                            <td class="ballance">
	                                <p><?php echo $movimiento->concepto; ?></p>
	                            </td>
	                        </tr>
                        </tbody> 
                    </table>
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
