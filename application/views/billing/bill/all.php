<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-bd">

            <div class="panel-heading no-print row">
                <div class="btn-group col-xs-4"> 
                    <?php
                    if($this->permission->method('bill_list','read')->access() || $this->permission->method('bill_list','update')->access() || $this->permission->method('bill_list','delete')->access()){
                    ?>
                    <a class="btn btn-primary" href="<?php echo base_url("billing/bill") ?>"> <i class="fa fa-list"></i>  <?php echo display('bill_list') ?> </a> 
                    <?php } ?>


                    
                    <?php
                    if($this->permission->method('add_bill','create')->access()){
                    ?>
                    <a class="btn btn-success" href="<?php echo base_url("billing/bill/form") ?>"> <i class="fa fa-plus"></i>  <?php echo display('add_bill') ?> </a> 
                    <?php } ?>


                    <?php
                    if($this->permission->method('bill_list','read')->access()){
                    ?>
                    <button onclick="printContent('printMe')" type="button" class="btn btn-danger"><i class="fa fa-print"></i> <?php echo display("print") ?></button>
                    <?php } ?>

                </div>
                <h2 class="col-xs-8 text-left text-success"><?php echo display('bill_details') ?></h2>
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
                                <td><?php echo display('admission_id'); ?>:</td>
                                <td><?php echo $bill->admission_id; ?></td>
                                <td><?php echo display('bill_date'); ?>:</td>
                                <td><?php echo $bill->bill_date; ?></td>
                            </tr>
                            <tr>
                                <td><?php echo display('patient_id'); ?>:</td>
                                <td><?php echo $bill->patient_id; ?></td>
                                <td><?php echo display('date_of_birth'); ?>:</td>
                                <td><?php echo $bill->date_of_birth; ?></td>
                            </tr>
                            <tr>
                                <td><?php echo display('patient_name'); ?>:</td>
                                <td><?php echo $bill->patient_name; ?></td>
                                <td><?php echo display('sex'); ?>:</td>
                                <td><?php echo $bill->sex ?></td>
                            </tr>
                            <tr>
                                <td><?php echo display('address'); ?>:</td>
                                <td><?php echo $bill->address; ?></td>
                                <td><?php echo display('doctor_name'); ?>:</td>
                                <td><?php echo $bill->doctor_name; ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- Patient Package -->
                <div class="patient_package">
                    <table class="package">
                        <tbody>
                            <tr>
                                <td><?php echo display('admission_date'); ?>:</td>
                                <td><?php echo $bill->admission_date; ?></td>
                                <td><?php echo display('package_name'); ?>:</td>
                                <td><?php echo $bill->package_name; ?></td>
                                <td><?php echo display('total_days'); ?>:</td>
                                <td><?php echo !empty($bill->total_days)?$bill->total_days+1:0; ?></td>
                            </tr>
                            <tr>
                                <td><?php echo display('discharge_date'); ?>:</td>
                                <td><?php echo $bill->discharge_date; ?></td>
                                <td><?php echo display('insurance_name'); ?>:</td>
                                <td><?php echo $bill->insurance_name; ?></td>
                                <td><?php echo display('policy_no'); ?>:</td>
                                <td><?php echo $bill->policy_no; ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- Patient Charge -->
                <div class="patient_charge">
                    <table class="charge">
                        <thead>
                            <tr>
                                <th><?php echo display('serial'); ?></th>
                                <th><?php echo display('service_name'); ?></th>
                                <th><?php echo display('quantity'); ?></th>
                                <th><?php echo display('rate'); ?></th>
                                <th><?php echo display('subtotal'); ?></th> 
                                <th>Numero factura</th>
                                <th>Estado factura</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                        $subtotal = "0.00"; 
                        $sl = 1; 
                        $pagado = 0;
                        foreach($services as $service)
                        {  
                            $subtotal+=($service->quantity*$service->amount);
                        ?>
                        <tr>
                            <td class="description">
                                <p><?php echo $sl++; ?></p> 
                            </td>
                            <td class="description">
                                <p>
                                    <?php if ($service->product): ?>
                                        <?php $medicine = $this->db->from('almacenes_productos')->where('id', $service->service_id)->get()->row() ?>

                                        <?php echo 'Producto: ' . $medicine->name; ?>

                                    <?php else: ?>
                                        <?php echo 'Servicio: ' . $service->name; ?>

                                        <?php if ($service->professional_id): ?> 
                                            <?php echo '<br>(Profesional: ' . $service->professional . ')'; ?>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </p> 
                            </td>
                            <td class="charge">
                                <p><?php echo $service->quantity; ?></p> 
                            </td>
                            <td class="discount">
                                <p><?php echo $service->amount; ?></p> 
                            </td>
                            <td class="ballance">
                                <p><?php echo ($service->quantity*$service->amount); ?></p> 
                            </td>
                            <td class="discount">
                                <p>
                                    <a href="https://clinicamedicabetancourt.com/billing/bill/view/<?php echo $service->bill_id; ?>">
                                        <?php echo $service->bill_id; ?>                                        
                                    </a>
                                </p> 
                            </td>
                            <td class="discount">
                                <?php if ($service->bill_status == 'Pagada'): $pagado = $pagado + ($service->quantity*$service->amount); ?>
                                    <span class="label label-xs label-success"><?php echo $service->bill_status; ?></span>
                                <?php else: ?>
                                    <span class="label label-xs label-danger"><?php echo $service->bill_status; ?></span>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <?php
                        } 
                        ?> 



                        <?php 
                        if ($bill->exam) {
                            $id = $bill->exam;
                            $solicitud = $this->db->query("SELECT * FROM laboratorio_solicitudes WHERE id = $id")->row();
                            foreach(json_decode($solicitud->examenes) as $service)
                            {  
                                $subtotal+=(float)$service->precio;
                            ?>
                            <tr>
                                <td class="description">
                                    <p><?php echo $sl++; ?></p> 
                                </td>
                                <td class="description">
                                    <p><?php echo 'Examen: ' . $service->nombre; ?></p> 
                                </td>
                                <td class="charge">
                                    <p><?php echo 1; ?></p> 
                                </td>
                                <td class="discount">
                                    <p><?php echo $service->precio; ?></p> 
                                </td>
                                <td class="ballance">
                                    <p><?php echo $service->precio; ?></p> 
                                </td>
                            </tr>
                            <?php
                            } 
                        } ?>
                        </tbody> 
                    </table>
                </div>
                
                <div class="row">
                    <div class="col-xs-8">
                        <div class="row">
                             <div class="col-xs-6">
                                <div class="advance_payment"> 
                                    <table class="payment">
                                        <thead>
                                            <tr>
                                                <th colspan="3"><h4><?php echo display('advance_payment'); ?></h4></th> 
                                            </tr>
                                            <tr>
                                                <th><?php echo display('date'); ?></th>
                                                <th><?php echo display('receipt_no'); ?></th>
                                                <th><?php echo display('amount'); ?></th>
                                            </tr> 
                                        </thead>
                                        <tbody>
                                            <?php  
                                            $pay_advance = "0.00";
                                            foreach($advance as $adv)
                                            {
                                            $pay_advance+=$adv->amount;
                                            ?>
                                            <tr>
                                                <td><?php echo $adv->date ?></td>
                                                <td><?php echo $adv->receipt_no ?></td>
                                                <td><?php echo $adv->amount ?></td>
                                            </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="table-responsive table-height">
                                    <table class="payment">
                                        <thead>
                                            <tr>
                                                <th><?php echo display('payment_method'); ?></th>
                                                <th><?php echo $bill->payment_method ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><?php echo display('card_cheque_no'); ?></td>
                                                <td><?php echo $bill->card_cheque_no ?></td>
                                            </tr>
                                            <tr>
                                                <td><?php echo display('receipt_no'); ?></td>
                                                <td><?php echo $bill->receipt_no ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                 </div>
                            </div>
                        </div>
                        <br>
                        <!-- bed bill info -->
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="payment">
                                    <thead>
                                        <tr>
                                            <th colspan="5"><h4><?php echo display('bed_payment'); ?></h4></th> 
                                        </tr>
                                        <tr>
                                            <th><?php echo display('assign_date') ?></th>
                                            <th><?php echo display('discharge_date') ?></th>
                                            <th><?php echo display('total_days') ?></th>
                                            <th><?php echo display('bed_number') ?></th>
                                            <th><?php echo display('amount') ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php  
                                        $pay_bed = "0.00";
                                        if(!empty($bed)){
                                            foreach($bed as $value){
                                                $totalDays = $value->tdays + 1;
                                                $pay_bed += $totalDays*$value->charge;
                                                ?>
                                                <tr>
                                                    <td><?php echo $value->adate ?></td>
                                                    <td><?php echo $value->ddate ?></td>
                                                    <td><?php echo $totalDays ?></td>
                                                    <td><?php echo $value->bed_number ?></td>
                                                    <td><?php echo $pay_bed ?></td>
                                                </tr>
                                            <?php
                                              } 
                                           }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-4">
                        <table class="payment">
                            <thead>
                                <tr>
                                    <td><?php echo 'Total'; ?></td>
                                    <th><?php echo  @sprintf("%.2f", (isset($subtotal)?$subtotal+$pay_medicine+$pay_bed:"0.00")) ?></th>
                                </tr>
                            </thead>
                            <tbody> 
                                <!-- <tr>
                                    <td><?php echo display('medicine').' '.display('bill'); ?></td>
                                    <td><?php echo  @sprintf("%.2f", (isset($pay_medicine)?$pay_medicine:0.00)) ?></td>
                                </tr> --> 
                                <tr> 
                                    <td><?php echo display('bed_bill'); ?></td>
                                    <td><?php echo  @sprintf("%.2f", $pay_bed) ?></td>
                                </tr>
                                <!-- <tr>
                                    <td><?php echo display('pay_advance'); ?></td>
                                    <td><?php echo  @sprintf("%.2f", (isset($pay_advance)?$pay_advance:"0.00")) ?></td>
                                </tr>  -->
                                <tr> 
                                    <td><?php echo display('discount'); ?> (<?php echo  @sprintf("%.2f", (($bill->discount/$subtotal)*100)) ?>%)</td>
                                    <td><?php echo  @sprintf("%.2f", $bill->discount) ?></td>
                                </tr>
                                <tr>
                                    <td><?php echo display('tax'); ?> (<?php echo  @sprintf("%.2f", (($bill->tax/$subtotal)*100)) ?>%)</td>
                                    <td><?php echo  @sprintf("%.2f", $bill->tax) ?></td>
                                </tr>
                            </tbody>
                            <thead>
                                <tr>
                                    <td><?php echo 'Total a pagar'; ?></td>
                                    <th><?php echo  @sprintf("%.2f", ($subtotal-$bill->discount+$bill->tax+$pay_bed+$pay_medicine-$pay_advance),2) ?></th>
                                </tr>
                            </thead>
                        </table>

                        <br>

                        <table class="payment">
                            <thead>
                                <tr>
                                    <td><?php echo 'Total pagado'; ?></td>
                                    <th><?php echo  @sprintf("%.2f", ($pagado),2) ?></th>
                                </tr>

                                <tr>
                                    <td><?php echo 'Total pendiente'; ?></td>
                                    <th><?php echo  @sprintf("%.2f", (($subtotal-$bill->discount+$bill->tax+$pay_bed+$pay_medicine-$pay_advance)-$pagado),2) ?></th>
                                </tr>
                            </thead>
                        </table>
                    </div>
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
