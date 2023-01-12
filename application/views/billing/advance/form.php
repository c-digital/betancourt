<div class="row">
    <!--  form area -->
    <div class="col-sm-12">
        <div  class="panel panel-default thumbnail">

        <?php
        if($this->permission->method('advance_list','read')->access() || $this->permission->method('advance_list','update')->access() || $this->permission->method('advance_list','delete')->access()){
        ?>
            <div class="panel-heading no-print">
                <div class="btn-group"> 
                    <a class="btn btn-primary" href="<?php echo base_url("billing/advance/index") ?>"> <i class="fa fa-list"></i>  <?php echo display('advance_list') ?> </a>  
                </div>
            </div> 
        <?php } ?>



        <?php
          if($this->permission->method('add_advance','create')->access()){
          ?>
            <div class="panel-body panel-form">
                <div class="row">
                    <div class="col-md-9 col-sm-12">

                        <?php echo form_open('billing/advance/form/'.$advance->id,'class="form-inner"') ?>

                            <?php echo form_hidden('id',$advance->id) ?>

                            <div class="form-group row">
                                <label for="admission_id" class="col-xs-3 col-form-label"><?php echo display('admission_id') ?> <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                    <input name="admission_id"  type="text" class="form-control" id="admission_id" placeholder="<?php echo display('admission_id') ?>" value="<?php echo (!empty($advance->admission_id)?$advance->admission_id:$admission_id) ?>">
                                    <div id="admission_error"></div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="patient_id" class="col-xs-3 col-form-label"><?php echo display('patient_id') ?> <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                    <input name="patient_id"  type="text" class="form-control" id="patient_id" placeholder="<?php echo display('patient_id') ?>" value="<?php echo $advance->patient_id ?>">
                                </div>
                            </div> 
                            <div class="form-group row">
                                <label for="amount" class="col-xs-3 col-form-label"><?php echo display('amount') ?> <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                    <input name="amount"  type="text" class="form-control" id="amount" placeholder="<?php echo display('amount') ?>" value="<?php echo $advance->amount ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="payment_method" class="col-xs-3 col-form-label"><?php echo display('payment_method') ?></label>
                                <div class="col-xs-9">
                                    <input name="payment_method"  type="text" class="form-control" id="payment_method" placeholder="<?php echo display('payment_method') ?>" value="<?php echo $advance->payment_method ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="cash_card_or_cheque" class="col-xs-3 col-form-label"><?php echo display('cash_card_or_cheque') ?></label>
                                <div class="col-xs-9">
                                    <?php 
                                        $paymentList = array(
                                            ''    => display('select_option'),
                                            'Cash'=>display('cash'),
                                            'Card'=>display('card'),
                                            'Cheque'=>display('cheque'),
                                        );
                                        echo form_dropdown('cash_card_or_cheque', $paymentList, $advance->cash_card_or_cheque, array('class'=>'form-control'));
                                    ?> 
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="receipt_no" class="col-xs-3 col-form-label"><?php echo display('receipt_no') ?></label>
                                <div class="col-xs-9">
                                    <input name="receipt_no"  type="text" class="form-control" id="receipt_no" placeholder="<?php echo display('receipt_no') ?>" value="<?php echo $advance->receipt_no ?>">
                                </div>
                            </div>

                            <!--Radio-->
                            <div class="form-group row">
                                <label class="col-sm-3"><?php echo display('status') ?></label>
                                <div class="col-xs-9"> 
                                    <div class="form-check">
                                        <label class="radio-inline"><input type="radio" name="status" value="1" checked><?php echo display('active') ?></label>
                                        <label class="radio-inline"><input type="radio" name="status" value="0"><?php echo display('inactive') ?></label>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <div class="col-sm-offset-3 col-sm-6">
                                    <div class="ui buttons">
                                        <button type="reset" class="ui button"><?php echo display('reset') ?></button>
                                        <div class="or"></div>
                                        <button class="ui positive button"><?php echo display('save') ?></button>
                                    </div>
                                </div>
                            </div>

                        <?php echo form_close() ?>

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
<script type="text/javascript">
$(document).ready(function() {
 
    //patient id
    $("#admission_id").on('keyup change click', function(){
        var output = $('#admission_error'); 
        var patient_id = $('#patient_id');
        

        $.ajax({
            url  : '<?= base_url('billing/advance/patient_id_by_admission/') ?>',
            type : 'post',
            dataType : 'JSON',
            data : {
                '<?= $this->security->get_csrf_token_name(); ?>' : '<?= $this->security->get_csrf_hash(); ?>',
                admission_id : $(this).val()
            },
            success : function(data) 
            {
                if (data.status == true) {
                    patient_id.val(data.message);
                    output.html('');
                } else if (data.status == false) {
                    patient_id.val('');
                    output.html(data.message).addClass('text-danger').removeClass('text-success');
                } else {
                    patient_id.val('');
                    output.html(data.message).addClass('text-danger').removeClass('text-success');
                }
            }, 
            error : function()
            {
                alert('failed');
            }
        });
     });

    });
</script>