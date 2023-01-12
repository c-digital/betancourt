<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="panel panel-bd billing-panel ">

            <div class="panel-heading no-print row">
                <div class="btn-group col-xs-3">  
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

                </div>

                <?php
                if($this->permission->method('bill_list','update')->access()){
                ?>
                 <h2 class="col-xs-9 text-left text-success"><?php echo display('update_bill') ?></h2>
                <?php } ?>

            </div> 
 


           <?php
            if($this->permission->method('bill_list','update')->access()){
                $pay_medicine = 0;
                $result = "";
                if ($medicines){
                    foreach ($medicines as $medi) {
                        $from = strtotime($medi->from_date);
                        $to = strtotime($medi->to_date);
                        $day = abs($to - $from);
                        $totalDay = $day/86400 +1;
                        $quantity = $totalDay*$medi->per_day_intake;
                        $price = $quantity*$medi->price;

                        $result .= "<tr>";
                        $result .= "<td>$medi->name</td>";
                        $result .= "<td>$quantity</td>";
                        $result .= "<td>$medi->price</td>";
                        $result .= "<td>$medi->doctor</td>";
                        $result .= "<td>$price</td>";
                        $result .= "</tr>";

                        $pay_medicine = $pay_medicine + $price;
                    } 
                }else{
                    $result .= "<tr><td colspan=\"5\" align=\"center\">No record found!</td></tr>";
                }
            ?>
            <div class="panel-body">
            <?php echo form_open('billing/bill/edit/'.$bill->bill_id, array('class'=>'billig-form')) ?>
            <?php echo form_hidden('id', $bill->id) ?>
            <?php echo form_hidden('bill_id', $bill->bill_id) ?>
                <div class="row">
                    <div class="col-sm-9">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-6">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="admission_id" value="<?php echo $bill->admission_id ?>" name="admission_id" placeholder="<?php echo display('admission_id') ?>" readonly/>
                                            <span class="input-group-btn"></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="patient_id" value="<?php echo $bill->patient_id ?>" placeholder="<?php echo display('patient_id') ?>" disabled/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6">
                                <div class="form-group">
                                    <input name="bill_date" type="text" class="form-control datepicker" id="bill_date"  placeholder="<?php echo display('bill_date') ?>" value="<?php echo $bill->bill_date ?>" required/>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="patient_name" placeholder="<?php echo display('patient_name') ?>" value="<?php echo $bill->patient_name ?>" disabled/>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="date_of_birth" placeholder="<?php echo display('date_of_birth') ?>" value="<?php echo $bill->date_of_birth ?>" disabled/>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6">
                                <div class="form-group">
                                    <textarea class="form-control" rows="3" placeholder="<?php echo display('address') ?>" id="address" disabled><?php echo $bill->address ?></textarea>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6">
                                <div class="form-group row">
                                    <label for="sex" class="col-sm-4 col-md-2 col-form-label"><?php echo display('sex') ?></label>
                                    <div id="sex" class="col-sm-8 col-md-10">
                                        <div class="radio radio-info radio-inline">
                                            <input type="radio" id="male"  disabled <?php echo (($bill->sex=="Male")?"checked":"") ?>>
                                            <label for="male"><?php echo display('male') ?></label>
                                        </div>
                                        <div class="radio radio-inline">
                                            <input type="radio" id="female" <?php echo (($bill->sex=="Female")?"checked":"") ?>  disabled>
                                            <label for="female"><?php echo display('female') ?></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="doctor_name"  placeholder="<?php echo display('doctor_name') ?>" value="<?php echo $bill->doctor_name ?>" disabled/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="avatar-img center-block">
                            <img id="picture" src="<?php echo (!empty($bill->picture)?base_url($bill->picture):base_url('assets/images/staff.png')) ?>" style="max-height:178px" class="img-responsive" alt="">
                        </div> 
                    </div>
                </div>

                <!--<hr>-->
                <div class="form-horizontal">
                    <div class="row"> 
                        <div class="col-xs-12 col-sm-6 col-md-4">
                            <div class="form-group row">
                                <label for="admission_date" class="col-sm-4 col-form-label"><?php echo display('admission_date') ?></label>
                                <div class="col-sm-8">
                                    <input class="form-control" type="text" value="<?php echo $bill->admission_date ?>" placeholder="<?php echo display('admission_date') ?>" id="admission_date" disabled>
                                </div>
                            </div>
                        </div> 
                        <div class="col-xs-12 col-sm-6 col-md-4">
                            <div class="form-group row">
                                <label for="package_name" class="col-sm-4 col-form-label"><?php echo display('package_name') ?></label>
                                <div class="col-sm-8">
                                    <input class="form-control" id="package_name" type="text" value="<?php echo $bill->package_name ?>" placeholder="<?php echo display('package_name') ?>" id="package_name" disabled>
                                    <input name="package_id" type="hidden" id="package_id"  value="<?php echo $bill->package_id ?>">
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-4">
                            <div class="form-group row">
                                <label for="total_days" class="col-sm-4 col-form-label"><?php echo display('total_days') ?><br/>&nbsp;</label>
                                <div class="col-sm-8">
                                    <input class="form-control" type="text"  placeholder="<?php echo display('total_days') ?>" value="<?php echo !empty($bill->total_days)?$bill->total_days+1:0; ?>" id="total_days" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-4">
                            <div class="form-group row">
                                <label for="discharge_date" class="col-sm-4 col-form-label"><?php echo display('discharge_date') ?></label>
                                <div class="col-sm-8">
                                    <input class="form-control" type="text" value="<?php echo $bill->discharge_date ?>" placeholder="<?php echo display('discharge_date') ?>" id="discharge_date" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-4">
                            <div class="form-group row">
                                <label for="insurance_name" class="col-sm-4 col-form-label"><?php echo display('insurance_name') ?></label>
                                <div class="col-sm-8">
                                    <input class="form-control" type="text" value="<?php echo $bill->insurance_name ?>" placeholder="<?php echo display('insurance_name') ?>" id="insurance_name" disabled>
                                </div>
                            </div>
                        </div> 
                        <div class="col-xs-12 col-sm-6 col-md-4">
                            <div class="form-group row">
                                <label for="policy_no" class="col-sm-4 col-form-label"><?php echo display('policy_no') ?></label>
                                <div class="col-sm-8">
                                    <input class="form-control" type="text" value="<?php echo $bill->policy_no ?>" placeholder="<?php echo display('policy_no') ?>" id="policy_no" disabled>
                                </div>
                            </div>
                        </div>  
                    </div>
                </div>

 
                <div id="parentx" class="table-responsive">
                    <table id="fixTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th><?php echo display('service_name') ?></th>
                                <th><?php echo display('quantity') ?></th>
                                <th><?php echo display('rate') ?></th>
                                <th><?php echo display('subtotal') ?></th>
                            </tr>
                        </thead>
                        <tbody id="services">
                           <?php 
                            $subtotal = 0; 
                            $subtotal +=$pay_medicine;
                            $sl = 1;  
                            foreach($services as $service)
                            {  
                                $subtotal+=($service->quantity*$service->amount); 
                            ?>
                            <tr>
                                <td>
                                    <input name="service_name[]" class="form-control service_name service_data" type="text" placeholder="<?php echo display('service_name') ?>" value="<?php echo $service->name; ?>" readonly>

                                    <?php if ($service->professional_id): ?>
                                        <input class="form-control" type="text" value="<?php echo '(Profesional: ' . $service->professional . ')'; ?>" readonly>
                                    <?php endif; ?>

                                    <input name="service_id[]" type="hidden" class="service_id" value="<?php echo $service->id; ?>" required>
                                </td>
                                <td>
                                    <input name="quantity[]" class="form-control quantity item-calc" type="text" placeholder="<?php echo display('quantity') ?>" value="<?php echo $service->quantity; ?>" readonly>
                                </td>
                                <td>
                                    <input name="amount[]" class="form-control amount item-calc" type="text" placeholder="<?php echo display('amount') ?>"  value="<?php echo $service->amount; ?>"  readonly>
                                </td>
                                <td>
                                    <input name="subtotal[]" class="form-control subtotal" type="text" placeholder="<?php echo display('subtotal') ?>"  value="<?php echo ($service->quantity*$service->amount); ?>" required>
                                </td>
                            </tr>
                            <?php
                            } 
                            ?> 

                            <?php 
                            if ($bill->exam) {
                                $id = $bill->exam;
                                $solicitud = $this->db->query("SELECT * FROM laboratorio_solicitudes WHERE id = $id")->row(); ?>

                            <input type="hidden" name="exam" value="<?php echo $bill->exam; ?>">

                            <?php foreach(json_decode($solicitud->examenes) as $service)
                                {  
                                    $subtotal+=(float)$service->precio;
                                ?>
                            <tr>
                                <td>
                                    <input  class="form-control service_name service_data" type="text" placeholder="<?php echo display('service_name') ?>" value="<?php echo 'Examen: ' . $service->nombre; ?>" readonly><input type="hidden" class="service_id" value="<?php echo $service->id; ?>" required>
                                </td>
                                <td>
                                    <input class="form-control quantity item-calc" type="text" placeholder="<?php echo display('quantity') ?>" value="<?php echo 1; ?>" readonly>
                                </td>
                                <td>
                                    <input class="form-control amount item-calc" type="text" placeholder="<?php echo display('amount') ?>"  value="<?php echo $service->precio; ?>"  readonly>
                                </td>
                                <td>
                                    <input class="form-control subtotal" readonly type="text" placeholder="<?php echo display('subtotal') ?>"  value="<?php echo $service->precio; ?>" required>
                                </td>
                            </tr>
                            <?php
                            } 
                        } ?>
                        </tbody>
                    </table>
                </div>

                <div class="row">
                    <div class="col-sm-8">
                        <div class="row">
                            <div class="col-sm-6">
                                <h3 class="block-title-2"><?php echo display('advance_payment') ?></h3>
                                <div class="table-responsive table-height">
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th><?php echo display('date') ?></th>
                                                <th><?php echo display('receipt_no') ?></th>
                                                <th><?php echo display('amount') ?></th>
                                            </tr>
                                        </thead>
                                        <tbody id="advance_data"> 
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
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-md-4 col-form-label"><?php echo display('payment_method') ?></label>
                                    <div class="col-sm-8 col-md-8">
                                        <?php 
                                            $paymentList = array(
                                                ''    => display('select_option'),
                                                'Cash'=>display('cash'),
                                                'Card'=>display('card'),
                                                'Cheque'=>display('cheque'),
                                            );
                                            echo form_dropdown('payment_method', $paymentList, $bill->payment_method, array('class'=>'form-control basic-single', 'required'=>'required'));
                                        ?>  
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="card_cheque_no" class="col-sm-4 col-md-4 col-form-label"><?php echo display('card_cheque_no') ?></label>
                                    <div class="col-sm-8 col-md-8">
                                        <input name="card_cheque_no" value="<?php echo $bill->card_cheque_no; ?>" class="form-control" type="text" id="card_cheque_no" placeholder="<?php echo display('card_cheque_no') ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="receipt_no" class="col-sm-4 col-md-4 col-form-label"><?php echo display('receipt_no') ?></label>
                                    <div class="col-sm-8 col-md-8">
                                        <input name="receipt_no" class="form-control" type="text" value="<?php echo $bill->receipt_no; ?>" id="receipt_no" placeholder="<?php echo display('receipt_no') ?>">
                                    </div>
                                </div> 
                            </div>
                        </div>
                        <!-- bed bill info -->
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-bordered table-striped">
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
                                        $pay_bed = 0;
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
                    <div class="col-sm-4">
                        <div class="table-responsive m-b-20">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th><?php echo display('total') ?></th>
                                        <th><?php echo display('receipt') ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><?php echo display('total') ?></td>
                                        <td><input name="total" type="text" class="form-control grand-calc" id="total" value="<?php echo @sprintf("%.2f",(isset($subtotal)?$subtotal+$pay_bed:0.00)) ?>"></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="input-group">
                                              <div class="input-group-addon"><?php echo display('discount') ?> %</div>
                                              <input type="text" id="discountPercent" required="" autocomplete="off" class="form-control tax-discount-calc" value="<?php echo @sprintf("%.2f",(($bill->discount/($subtotal+$pay_bed))*100)) ?>">
                                            </div>
                                        </td>
                                        <td><input name="discount" type="text" class="form-control grand-calc" id="discount" value="<?php echo @sprintf("%.2f", $bill->discount) ?>"></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="input-group">
                                              <div class="input-group-addon"><?php echo display('tax') ?> %</div>
                                              <input type="text" id="taxPercent" required="" autocomplete="off" class="form-control tax-discount-calc" value="<?php echo @sprintf("%.2f", (($bill->tax/($subtotal+$pay_bed))*100)) ?>">
                                            </div>
                                        </td>
                                        <td><input name="tax" type="text" class="form-control grand-calc" id="tax" value="<?php echo @sprintf("%.2f", $bill->tax) ?>"></td>
                                    </tr>
                                    <tr>
                                        <td><a href="javascript:void(0)" data-toggle="modal" data-target="#viewMedicine"><?php echo display('medicine'); ?></a></td>
                                        <td>
                                        <input type="text" class="form-control grand-calc" id="medicine_bill" value="<?php echo number_format($pay_medicine, 2);?>"></td> 
                                    </tr>
                                    <tr>
                                        <td><?php echo display('bed_bill') ?></td>
                                        <td>
                                        <input type="text" class="form-control grand-calc" id="pay_bed" value="<?php echo number_format($pay_bed, 2)?>"></td> 
                                    </tr>
                                    <tr>
                                        <td><?php echo display('pay_advance') ?></td>
                                        <td><input type="text" class="form-control grand-calc" id="pay_advance" value="<?php echo @sprintf("%.2f", (isset($pay_advance)?$pay_advance:"0.00")) ?>"></td> 
                                    </tr>
                                    <tr>
                                        <td><?php echo display('payable') ?></td>
                                        <td><input type="text" class="form-control grand-calc" id="payable" value="<?php echo @sprintf("%.2f", ($subtotal+$pay_bed-$bill->discount+$bill->tax-$pay_advance)) ?>"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <textarea name="note" class="form-control" rows="5" placeholder="<?php echo display('notes') ?>"><?php echo $bill->note; ?></textarea>
                </div> 


                <div class="form-group">
                    <div class="form-check">
                        <label class="radio-inline"><input type="radio" name="status" value="0" <?php echo (($bill->status==0)?"checked":null) ?>><?php echo display('unpaid') ?></label>
                        <label class="radio-inline"><input type="radio" name="status" value="1" <?php echo (($bill->status==1)?"checked":null) ?>><?php echo display('paid') ?></label>
                    </div>
                </div> 


                <div class="panel-footer text-center"> 
                    <button type="submit" class="btn btn-success w-md"><?php echo display('update') ?></button>
                </div>

            <?php echo form_close() ?>
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
   

<script type="text/javascript">
$(document).ready(function(){

    // Enable sidebar push menu
    if ($("body").hasClass('sidebar-collapse')) {
        $("body").removeClass('sidebar-collapse').trigger('expanded.pushMenu');
    } else {
        $("body").addClass('sidebar-collapse').trigger('collapsed.pushMenu');
    }

});
</script>
<!-- view medicine modal -->
<div class="modal fade" id="viewMedicine" tabindex="-1" role="dialog" aria-labelledby="vmModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h5 class="modal-title" id="vmModalLabel"><?= display('medicine_list')?></h5>
      </div>
      <div class="modal-body">
          <div class="row">
                <div class="col-sm-12">
                    <h3 class="block-title-2"><?php echo display('medicine') ?></h3>
                    <div class="table-responsive table-height">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th><?php echo display('medicine_name') ?></th>
                                    <th><?php echo display('quantity') ?></th>
                                    <th><?php echo display('price') ?></th>
                                    <th><?php echo display('assign_by') ?></th>
                                    <th><?php echo display('amount') ?></th>
                                </tr>
                            </thead>
                            <tbody> 
                                <?php echo $result;?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
      </div>
    </div>
  </div>
</div>