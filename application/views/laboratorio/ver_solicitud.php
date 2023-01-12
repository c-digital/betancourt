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
                <h2 class="col-xs-8 text-left text-success"><?php echo 'Solicitud de examenes' ?></h2>
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
                                <?php echo $website->description; ?><br>
                                <img width="100px" src="/uploads/qr/<?php echo $solicitud->id; ?>.png" alt="">
                            </address>
                        </div>
                    </div>
                </div> <hr>
                <!-- Patient Info -->
                <div class="row patient_info">
                    <table class="info">
                        <tbody>
                            <tr>
                                <td><?php echo 'ID'; ?>:</td>
                                <td><?php echo $solicitud->code; ?></td>
                                <td><?php echo 'Paciente'; ?>:</td>
                                <td><?php echo $solicitud->paciente; ?></td>                                
                            </tr>
                            <tr>
                                <td><?php echo 'Fecha'; ?>:</td>
                                <td><?php echo $solicitud->fecha; ?></td>
                                <td><?php echo 'Estado'; ?>:</td>
                                <td><?php echo $solicitud->estado; ?></td>
                            </tr>
                            <tr>
                                <td><?php echo 'Número de internación'; ?>:</td>
                                <td><?php echo $solicitud->internacion; ?></td>
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
                                <th><?php echo 'Nombre'; ?></th>

                                <?php if ($solicitud->estado != 'Completado'): ?>
                                    <th><?php echo 'Precio'; ?></th>
                                <?php endif; ?>

                                <?php if ($solicitud->estado == 'Completado'): ?>
                                    <th><?php echo 'Valor de referencia'; ?></th>
                                <?php endif; ?>

                                <?php if ($solicitud->estado == 'Completado'): ?>
                                    <th><?php echo 'Resultado'; ?></th>
                                <?php endif; ?>
                            </tr>
                        </thead>
                        <tbody>
                        	<?php $i = 1; foreach (json_decode($solicitud->examenes) as $item): ?>
	                        <tr>
	                            <td>
	                                <p><?php echo $i; ?></p> 
	                            </td>

	                            <td>
	                                <p><?php echo $item->nombre; ?></p> 
	                            </td>

                                <?php if ($solicitud->estado != 'Completado'): ?>
    	                            <td>
    	                                <p><?php echo $item->precio; ?></p> 
    	                            </td>
                                <?php endif; ?>

                                <?php if ($solicitud->estado == 'Completado'): ?>
                                    <td>
                                        <p><?php echo $item->valor_referencia; ?></p> 
                                    </td>
                                <?php endif; ?>

                                <?php if ($solicitud->estado == 'Completado'): ?>
                                    <td>
                                        <p><?php echo $item->resultado; ?></p> 
                                    </td>
                                <?php endif; ?>
	                        </tr>
	                    	<?php $i++; endforeach; ?>
                        </tbody> 
                    </table>
                </div>

                <div class="my_sign">
                    <span>___________________________</span>
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
