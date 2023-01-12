<div class="row">
    <!-- welcome message -->
    <?php if ($this->session->flashdata('welcome') != null) {  ?>
    <div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <?php echo $this->session->flashdata('welcome'); ?>
    </div> 
    <?php } ?>

    <?php
    if($this->permission->method('appointment_list','read')->access()){
    ?>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
        <div class="info-box bg-olive">
            <span class="info-box-icon"><i class="fa fa-edit"></i></span>

            <div class="info-box-content">
              <span class="info-box-text"><?= display('appointment')?></span>
              <span class="info-box-number"><?php echo number_format((!empty($notify[0]->total_app) ? $notify[0]->total_app : null)) ?></span>

              <div class="progress">
                <div class="progress-bar" style="width: 50%"></div>
              </div>
              <span class="progress-description">
                    <?= date('j F, Y');?>
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
    </div>
    <?php }?>

    <?php
    if($this->permission->method('patient_list','read')->access() ){
    ?>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4"">
        <div class="info-box bg-blue">
            <span class="info-box-icon"><i class="fa fa-wheelchair"></i></span>

            <div class="info-box-content">
              <span class="info-box-text"><?= display('patient')?></span>
              <span class="info-box-number"><?php echo number_format((!empty($notify[1]->total_patient) ? $notify[1]->total_patient : null)) ?></span>

              <div class="progress">
                <div class="progress-bar" style="width: 50%"></div>
              </div>
              <span class="progress-description">
                    <?= date('j F, Y');?>
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
    </div>
    <?php }?>
 
    <?php
    if($this->permission->method('prescription_list','read')->access()){
    ?>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4"">
        <div class="info-box bg-yellow">
            <span class="info-box-icon"><i class="ti-book"></i></span>

            <div class="info-box-content">
              <span class="info-box-text"><?= display('prescription')?></span>
              <span class="info-box-number"><?php echo number_format((!empty($notify[3]->total_prescription) ? $notify[3]->total_prescription : null)) ?></span>

              <div class="progress">
                <div class="progress-bar" style="width: 50%"></div>
              </div>
              <span class="progress-description">
                    <?= date('j F, Y');?>
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
    </div>
   <?php }?>

   <?php
    if($this->permission->method('doctor_list','read')->access()){
    ?>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
        <div class="info-box bg-green">
            <span class="info-box-icon"><i class="fa fa-user-md"></i></span>

            <div class="info-box-content">
              <span class="info-box-text"><?= display('doctor')?></span>
              <span class="info-box-number"><?php echo number_format((!empty($notify[2]->total_doctor) ? $notify[2]->total_doctor : null)) ?></span>

              <div class="progress">
                <div class="progress-bar" style="width: 50%"></div>
              </div>
              <span class="progress-description">
                   <?= date('j F, Y');?>
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
    </div>
    <?php }?>

    <?php
    if($this->permission->method('bed_list','read')->access()){
    ?>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
        <div class="info-box bg-navy-blue">
            <span class="info-box-icon"><i class="fa fa-bed"></i></span>

            <div class="info-box-content">
              <span class="info-box-text"><?= display('free_bed_list')?></span>
              <span class="info-box-number"><?php echo number_format((!empty($notify[4]->total_freebed) ? $notify[4]->total_freebed : null)) ?></span>

              <div class="progress">
                <div class="progress-bar" style="width: 50%"></div>
              </div>
              <span class="progress-description">
                   <?= date('j F, Y');?>
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
    </div>
    <?php }?>

    <?php
    if($this->permission->method('bed_list','read')->access()){
    ?>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
        <div class="info-box bg-light-green">
            <span class="info-box-icon"><i class="fa fa-sign-out"></i></span>

            <div class="info-box-content">
              <span class="info-box-text"><?= display('discharged')?></span>
              <span class="info-box-number"><?php echo number_format((!empty($notify[5]->total_discharged) ? $notify[5]->total_discharged : null)) ?></span>

              <div class="progress">
                <div class="progress-bar" style="width: 50%"></div>
              </div>
              <span class="progress-description">
                   <?= date('j F, Y');?>
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
    </div>
    <?php }?>
</div>
 
<div class="row">
    <!-- Total doctor status -->
     <?php
         $isEnquiry = $this->permission->method('enquiry','read')->access();
        ?>
    <?php
    if($this->permission->method('graph','read')->access()){
    ?>
    <div class="col-lg-<?php if($isEnquiry==true){echo 8;}else{echo 12;}?>">
         <div class="panel panel-default" id="js-timer">
            <div class="panel-body">
                <div class="widget-title">
                    <h3><?= ($this->session->userdata('title')!=null?$this->session->userdata('title'):null) ?> <?= display('total_progress')?></h3>
                    <span><?= display('last_year_status') ?></span>
                    
                </div>
                <canvas id="lineChart" style="height: 170px !important;"></canvas>
             
            </div> <!-- /.panel-body -->
         </div>
    </div>
    <?php } ?>

    <!-- Message area -->
     <?php
       if($this->permission->method('enquiry','read')->access()){
        ?>
    <div class="col-lg-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3><?= display('enquiry') ?></h3>
                <span><?= display('latest_enquiry') ?></span>
            </div>
            <div class="panel-body"> 
                <div class="message_inner">
                    <?php if (!empty($enquires)) {  ?>
                        <?php foreach ($enquires as $enquiry) {  ?>
                        <a href="<?php echo base_url("enquiry/view/$enquiry->enquiry_id") ?>">
                            <div class="inbox-item">
                                <strong class="inbox-item-author"><?php echo $enquiry->name; ?></strong>
                                <span class="inbox-item-date"></span>
                                <p class="inbox-item-text"><?php echo character_limiter(strip_tags($enquiry->enquiry),70); ?></p>
                            </div>
                        </a>
                        <?php } ?>
                    <?php } ?>
                </div> 
            </div>
        </div>
    </div>
    <?php } ?>
</div> <!-- /.row -->

<div class="row">
    <!-- Total Product Sales area -->
     <?php
       $quick_menu = $this->permission->method('quick_menu','read')->access();
      ?>
    <?php
    if($this->permission->method('patient_list','read')->access() && $this->permission->method('appointment_list','read')->access()){
    ?>
    <div class="col-lg-<?php if($quick_menu==true){echo 8;}else{echo 12;}?>">
         <div class="panel panel-default" style="height: 505px !important;">
            <div class="panel-body">
                <div class="widget-title">
                    <h3><?= display('today_patient_list')?></h3>
                </div>
                <div class="table-wrapper-scroll-y">
                    <!-- today patient list -->
                    <table width="100%" class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th><?php echo display('id_no') ?></th>
                                <th><?php echo display('first_name') ?></th>
                                <th><?php echo display('last_name') ?></th>
                                <th><?php echo display('mobile') ?></th>
                                <th><?php echo display('sex') ?></th>
                                <th><?php echo display('blood_group') ?></th>
                                <th><?php echo display('action') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($lastPatient)) { ?>
                                <?php $sl = 1; ?>
                                <?php foreach ($lastPatient as $patient) { ?>
                                    <tr class="<?php echo ($sl & 1)?"odd gradeX":"even gradeC" ?>">
                                        <td><?php echo $patient->patient_id; ?></td>
                                        <td><?php echo $patient->firstname; ?></td>
                                        <td><?php echo $patient->lastname; ?></td>
                                        <td><?php echo $patient->mobile; ?></td>
                                        <td><?php echo $patient->sex; ?></td>
                                        <td><?php echo $patient->blood_group; ?></td>
                                        <td class="center">
                                            <a href="<?php echo base_url("patient/profile/$patient->id") ?>" class="btn btn-xs btn-success"><i class="fa fa-eye"></i></a> 
                                        </td>
                                   
                                    </tr>
                                    <?php $sl++; ?>
                                <?php } ?> 
                            <?php }else{?>
                                    <tr>
                                        <td colspan="7"><?= display('data_not_available')?></td>
                                    </tr>
                           <?php } ?> 
                        </tbody>
                    </table>  <!-- /.table-responsive -->
                </div>
            </div> <!-- /.panel-body -->
         </div>
    </div>
    <?php } ?>

    <!-- Message area -->
     <?php
       if($this->permission->method('quick_menu','read')->access()){
        ?>
       <div class="col-lg-4">
           <div class="panel panel-default">
                <div class="panel-body"> 
                    <div class="widget-title">
                      <h3><?= display('quick_links')?></h3>
                    </div>
                    <div class="fancy-collapse-panel">
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            <div class="panel panel-primary">
                                <div class="panel-heading" role="tab" id="headingOne">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#billing" aria-expanded="true" aria-controls="billing"><?php echo display('billing') ?>
                                        </a>
                                    </h4>
                                </div>
                                <div id="billing" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                    <div class="panel-body">
                                       <ul class="quick-menu">
                                            <?php
                                            if($this->permission->method('service_list','read')->access() || $this->permission->method('service_list','update')->access() || $this->permission->method('service_list','delete')->access()){
                                            ?>
                                            <li><a class="btn bg-green btn-block" href="<?php echo base_url("billing/service/index") ?>"><?php echo display('service_list') ?></a></li> 
                                            <?php } ?>

                                            <?php
                                            if($this->permission->method('package_list','read')->access() || $this->permission->method('package_list','update')->access() || $this->permission->method('package_list','delete')->access()){
                                            ?>
                                            <li><a class="btn bg-olive btn-block" href="<?php echo base_url("billing/package/index") ?>"><?php echo display('package_list') ?></a></li>   
                                            <?php } ?>


                                            <?php
                                            if($this->permission->method('admission_list','read')->access() || $this->permission->method('admission_list','update')->access() || $this->permission->method('admission_list','delete')->access()){
                                            ?>
                                            <li><a class="btn bg-blue btn-block" href="<?php echo base_url("billing/admission") ?>"><?php echo display('admission_list') ?></a></li> 
                                            <?php } ?>

                                           <?php
                                            if($this->permission->method('bill_list','read')->access() || $this->permission->method('bill_list','update')->access() || $this->permission->method('bill_list','delete')->access()){
                                            ?>
                                            <li><a class="btn bg-primary btn-block" href="<?php echo base_url("billing/bill") ?>"><?php echo display('bill_list') ?></a></li> 
                                            <?php } ?>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-info">
                                <div class="panel-heading" role="tab" id="headingTwo">
                                    <h4 class="panel-title">
                                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#hactivity" aria-expanded="false" aria-controls="hactivity"><?php echo display('hospital_activities') ?>
                                        </a>
                                    </h4>
                                </div>
                                <div id="hactivity" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                    <div class="panel-body">
                                        <ul class="quick-menu">
                                            <?php
                                            if($this->permission->method('birth_report','read')->access() || $this->permission->method('birth_report','update')->access() || $this->permission->method('birth_report','delete')->access()){
                                            ?>
                                            <li><a class="btn bg-green btn-block" href="<?php echo base_url('hospital_activities/birth/index') ?>"><?php echo display('birth_report') ?></a></li>
                                            <?php } ?>
                                            <?php
                                            if($this->permission->method('death_report','read')->access() || $this->permission->method('death_report','update')->access() || $this->permission->method('death_report','delete')->access()){
                                            ?>
                                            <li><a class="btn bg-red btn-block" href="<?php echo base_url('hospital_activities/death/index') ?>"><?php echo display('death_report') ?></a></li>
                                            <?php } ?>

                                            <?php
                                            if($this->permission->method('operation_report','read')->access() || $this->permission->method('operation_report','update')->access() || $this->permission->method('operation_report','delete')->access()){
                                            ?>
                                            <li><a class="btn bg-yellow btn-block" href="<?php echo base_url('hospital_activities/operation/index') ?>"><?php echo display('operation_report') ?></a></li>
                                             <?php } ?>

                                             <?php
                                              if($this->permission->method('investigation_report','read')->access() || $this->permission->method('investigation_report','update')->access() || $this->permission->method('investigation_report','delete')->access()){
                                              ?>
                                            <li><a class="btn bg-primary btn-block" href="<?php echo base_url('hospital_activities/investigation/index') ?>"><?php echo display('investigation_report') ?></a></li>
                                             <?php } ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-success">
                                <div class="panel-heading" role="tab" id="headingThree">
                                    <h4 class="panel-title">
                                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#account" aria-expanded="false" aria-controls="account"><?php echo display('account_manager') ?>
                                        </a>
                                    </h4>
                                </div>
                                <div id="account" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                    <div class="panel-body">
                                        <ul class="quick-menu">
                                            <?php
                                            if($this->permission->method('account_list','read')->access()){
                                            ?>
                                            <li><a class="btn bg-primary btn-block" href="<?php echo base_url("accounts/accounts/show_tree") ?>"><?php echo display('chart_of_account') ?></a></li>
                                            <?php } ?>

                                            <?php
                                            if($this->permission->method('general_ledger','create')->access()){
                                            ?>
                                             <li><a class="btn bg-olive btn-block" href="<?php echo base_url("accounts/accounts/general_ledger") ?>"><?php echo display('general_ledger') ?></a></li>
                                            <?php } ?>

                                             <?php
                                            if($this->permission->method('account_list','read')->access()){
                                            ?>
                                            <li><a class="btn bg-blue btn-block" href="<?php echo base_url("accounts/accounts/trial_balance") ?>"><?php echo display('trial_balance') ?></a></li>
                                            <?php } ?>

                                            <?php
                                            if($this->permission->method('profit_loss','read')->access()){
                                            ?>
                                            <li><a class="btn bg-green btn-block" href="<?php echo base_url("accounts/accounts/profit_loss_report") ?>"><?php echo display('profit_loss') ?></a></li>
                                            <?php } ?>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-warning">
                                <div class="panel-heading" role="tab" id="headingThree">
                                    <h4 class="panel-title">
                                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#insurance" aria-expanded="false" aria-controls="insurance"><?php echo display('insurance') ?>
                                        </a>
                                    </h4>
                                </div>
                                <div id="insurance" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                    <div class="panel-body">
                                        <ul class="quick-menu">
                                            <?php
                                            if($this->permission->method('add_insurance','create')->access()){
                                            ?>
                                            <li><a class="btn bg-green btn-block" href="<?php echo base_url("insurance/insurance/form") ?>"><?php echo display('add_insurance') ?></a></li> 
                                            <?php } ?>


                                            <?php
                                            if($this->permission->method('insurance_list','read')->access() || $this->permission->method('insurance_list','update')->access() || $this->permission->method('insurance_list','delete')->access()){
                                            ?>
                                            <li><a class="btn bg-blue btn-block" href="<?php echo base_url("insurance/insurance") ?>"><?php echo display('insurance_list') ?></a></li>  
                                            <?php } ?>



                                            <?php
                                            if($this->permission->method('add_limit_approval','create')->access()){
                                            ?>
                                            <li><a class="btn bg-olive btn-block" href="<?php echo base_url("insurance/limit_approval/form") ?>"><?php echo display('add_limit_approval') ?></a></li> 
                                            <?php } ?>



                                            <?php
                                            if($this->permission->method('limit_approval_list','read')->access() || $this->permission->method('limit_approval_list','update')->access() || $this->permission->method('limit_approval_list','delete')->access()){
                                            ?>
                                            <li><a class="btn bg-yellow btn-block" href="<?php echo base_url("insurance/limit_approval") ?>"><?php echo display('limit_approval_list') ?></a></li>  
                                            <?php } ?>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
       </div>
       <?php } ?>
    </div>
    
    <!-- /.row --> 

    <div class="row">
    <!-- Notice Board area -->
     <?php
       if($this->permission->method('noticeboard','read')->access()){
        ?>
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3><?= display('noticeboard') ?></h3>
            </div>
            <div class="panel-body"> 
               <table width="100%" class="datatable table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th><?php echo display('serial') ?></th>
                            <th><?php echo display('title') ?></th>
                            <th><?php echo display('description') ?></th>
                            <th><?php echo display('start_date') ?></th>
                            <th><?php echo display('end_date') ?></th>
                            <th><?php echo display('assign_by') ?></th>
                            <th><?php echo display('status') ?></th> 
                            <?php
                            if($this->permission->method('notice_list','read')->access()){
                            ?>
                            <th><?php echo display('action') ?></th> 
                            <?php } ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($notices)) { ?>
                            <?php $sl = 1; ?>
                            <?php foreach ($notices as $notice) { ?>
                                <tr class="<?php echo ($sl & 1)?"odd gradeX":"even gradeC" ?>">
                                    <td><?php echo $sl; ?></td>
                                    <td><?php echo $notice->title; ?></td>
                                    <td><?php echo character_limiter(strip_tags($notice->description),50); ?></td>
                                    <td><?php echo $notice->start_date; ?></td> 
                                    <td><?php echo $notice->end_date; ?></td> 
                                    <td><?php echo $notice->assign_by; ?></td> 
                                    <td><?php echo (($notice->status==1)?display('active'):display('inactive')); ?></td>


                                    <?php
                                    if($this->permission->method('notice_list','read')->access()){
                                    ?>
                                    <td class="center" width="80">

                                     <?php
                                     if($this->permission->method('notice_list','read')->access()){
                                     ?>
                                        <a href="<?php echo base_url("noticeboard/notice/details/$notice->id") ?>" class="btn btn-xs btn-success"><i class="fa fa-eye"></i></a> 
                                     <?php } ?>
   
                                    </td>
                                    <?php } ?>
                                </tr>
                                <?php $sl++; ?>
                            <?php } ?> 
                        <?php } ?> 
                    </tbody>
                </table>  <!-- /.table-responsive -->
            </div>
        </div>
    </div>
    <?php } ?>
</div> <!-- /.row -->

<div class="row">
    <!-- Notice Board area -->
     <?php
       if($this->permission->method('messages','read')->access()){
        ?>
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3><?= display('messages') ?></h3>
            </div>
            <div class="panel-body"> 
              <table width="100%" class="datatable table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th><?php echo display('serial') ?></th>
                            <th><?php echo display('sender') ?></th>
                            <th><?php echo display('subject') ?></th>
                            <th><?php echo display('message') ?></th>
                            <th><?php echo display('date') ?></th> 
                            <th><?php echo display('status') ?></th> 
                            <?php
                            if($this->permission->method('inbox','read')->access() || $this->permission->method('inbox','update')->access() || $this->permission->method('inbox','delete')->access()){
                            ?>
                            <th><?php echo display('action') ?></th> 
                            <?php } ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($messages)) { ?>
                            <?php $sl = 1; ?>
                            <?php foreach ($messages as $message) { ?>
                                <tr>
                                    <td><?php echo $sl; ?></td>
                                    <td><?php echo $message->sender_name; ?></td>
                                    <td><?php echo $message->subject; ?></td>
                                    <td><?php echo character_limiter(strip_tags($message->message),50); ?></td>
                                    <td><?php echo date('d M Y h:i:s a', strtotime($message->datetime)); ?></td>  
                                    <td><?php echo (($message->receiver_status == 0) ? "<i class='label label-warning'>not seen</label>" : "<i class='label label-success'>seen</label>"); ?></td>


                                    <?php
                                    if($this->permission->method('inbox','read')->access() || $this->permission->method('inbox','update')->access() || $this->permission->method('inbox','delete')->access()){
                                    ?>

                                    <td class="center" width="80">
                                        <?php
                                        if($this->permission->method('inbox','read')->access()){
                                        ?>
                                        <a href="<?php echo base_url("messages/message/inbox_information/$message->id") ?>" class="btn btn-xs btn-success"><i class="fa fa-eye"></i></a> 
                                        <?php } ?>

                                        <?php
                                        if($this->permission->method('inbox','read')->access() || $this->permission->method('inbox','update')->access() || $this->permission->method('inbox','delete')->access()){
                                        ?>
                                        <a href="<?php echo base_url("messages/message/delete/$message->id/$message->sender_id/$message->receiver_id") ?>" class="btn btn-xs btn-danger" onclick="return confirm('<?php echo display('are_you_sure') ?>') "><i class="fa fa-trash"></i></a> 
                                        <?php } ?>

                                    </td>
                                     <?php } ?>
                                </tr>
                                <?php $sl++; ?>
                            <?php } ?> 
                        <?php } ?> 
                    </tbody>
                </table>  <!-- /.table-responsive -->
            </div>
        </div>
    </div>
    <?php } ?>
</div> <!-- /.row -->
    
<?php
if($this->permission->method('graph','read')->access()){
?>
<script type="text/javascript"> 
$(window).on('load', function(){
    //line chart
    var ctx = document.getElementById("lineChart");
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: [<?php echo $allmonth;?>],
            datasets: [
                {
                    label: "Appointment",
                    borderColor: "#37a000",
                    borderWidth: "1",
                    //backgroundColor: "#73BC4D",
                    pointHighlightStroke: "rgba(55,160,0)",
                    data: [<?php echo $allAppoint;?>]
                },
                {
                    label: "Prescription",
                    borderColor: "#FFB61E",
                    borderWidth: "1",
                    //backgroundColor: "#1ABC9C",
                    pointHighlightStroke: "rgba(130, 224, 170,1)",
                    data: [<?php echo $allPrescrip;?>]
                }
            ]
        },
        options: {
            responsive: true,
            tooltips: {
                mode: 'index',
                intersect: false
            },
            hover: {
                mode: 'nearest',
                intersect: true
            }

        }
    });

});

</script>
 <?php } ?>

 