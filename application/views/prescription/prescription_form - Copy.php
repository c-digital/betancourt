<div class="row">
    <!--  form area -->
    <div class="col-sm-12">
        <div  class="panel panel-default thumbnail">
 
            <div class="panel-heading no-print">
                <div class="btn-group"> 
                    <a class="btn btn-primary" href="<?php echo base_url("prescription/prescription") ?>"> <i class="fa fa-list"></i>  <?php echo display('prescription_list') ?> </a>  
                </div>
            </div> 

            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12 col-sm-12 table-responsive">
                        <?php echo form_open('prescription/prescription/create') ?> 

                        <!-- Information -->
                        <table class="table"> 
                            <thead>
                                <tr>  
                                    <th width="33.33%">
                                        <ul class="list-unstyled">
                                            <li> 
                                                <input type="text" placeholder="<?php echo display('patient_id') ?> *" required name="patient_id" id="patient_id" class="invoice-input form-control" value="<?php echo (!empty($patient_id)?$patient_id:null) ?>">
                                                <p class="text-danger  invlid_patient_id"></p>
                                            </li>   
                                            <li> 
                                                <input type="text" placeholder="<?php echo display('patient_name') ?>" class="invoice-input form-control" id="patient_name" autocomplete="off">
                                            </li>  
                                            <li>  
                                                <input type="text" placeholder="<?php echo display('sex') ?>" class="invoice-input form-control" id="sex">
                                            </li>  
                                            <li>  
                                                <input type="text" placeholder="<?php echo display('date_of_birth') ?>" class="invoice-input form-control dropdown-month-years" id="date_of_birth" autocomplete="off">
                                            </li>  
                                            <li> 
                                                <input type="text" name="blood" placeholder="<?php echo display('blood_group') ?>" id="blood" class="invoice-input form-control">
                                            </li> 
                                             <li> 
                                                <input type="text" name="email" placeholder="<?php echo display('email') ?>" id="email" class="invoice-input form-control" autocomplete="off">
                                            </li> 
                                            <li> 
                                                <input type="text" name="wphone" placeholder="<?php echo display('work_phone') ?>" id="wphone" class="invoice-input form-control" autocomplete="off">
                                            </li> 
                                            <li> 
                                                <input type="number" name="weight" placeholder="<?php echo display('weight') ?> (kg)" onkeyup="calculation()" id="weight" class="invoice-input form-control" autocomplete="off">
                                            </li> 
                                            
                                        </ul>
                                    </th>  
                                    <th width="33.33%">
                                        <ul class="list-unstyled">
                                            <li> 
                                                <input type="text" name="mobile" placeholder="<?php echo display('cell_phone') ?> *" id="mobile" class="invoice-input form-control" autocomplete="off" required>

                                            </li>   
                                            <li> 
                                                <input type="text" name="address" placeholder="<?php echo display('address') ?>" id="address" class="invoice-input form-control" autocomplete="off">
                                            </li> 
                                            <li> 
                                                <input type="text" placeholder="<?php echo display('religion') ?>" id="religion" class="invoice-input form-control" autocomplete="off">
                                            </li>  
                                            <li>  
                                                <input type="text" name="nss" placeholder="<?php echo display('number_of_social_security') ?>" id="nss" class="invoice-input form-control" autocomplete="off"> 
                                            </li>    
                                             <li> 
                                                <input type="text" name="city_of_birth" placeholder="<?php echo display('city_of_birth') ?>" id="city_of_birth" class="invoice-input form-control" autocomplete="off">
                                            </li> 
                                             <li> 
                                                <input type="text" name="civil_status" placeholder="<?php echo display('civil_status') ?>" id="civil_status" class="invoice-input form-control" autocomplete="off">
                                            </li> 
                                            <li> 
                                                <input type="text" name="level_of_study" placeholder="<?php echo display('level_of_study') ?>" id="level_of_study" class="invoice-input form-control" autocomplete="off">
                                            </li> 
                                            <li> 
                                                <input type="number" name="height" placeholder="<?php echo display('height').' ('.display('inch').')'; ?>" onkeyup="calculation()" id="height" class="invoice-input form-control">
                                            </li> 
                                        </ul>
                                    </th>   
                                    <th width="33.33%">
                                        <ul class="list-unstyled">
                                            <li><input type="text" name="appointment_id" value="<?php echo (!empty($appointment_id)?$appointment_id:null) ?>" class="invoice-input form-control" placeholder="<?php echo display('appointment_id') ?>"></li>
                                            <li><input type="text" name="date" required value="<?php echo date('d-m-Y') ?>" class="datepicker invoice-input form-control" placeholder="<?php echo display('date') ?>"></li> 
                                            <li><input type="text" value="<?php echo $website->title; ?>" class="invoice-input form-control" placeholder="<?php echo display('hospital_name') ?>"></li> 
                                            <li><input type="text" value="<?php echo $website->description; ?>" class="invoice-input form-control" placeholder="<?php echo display('address') ?>"></li> 
                                             <li> 
                                                <input type="text" name="allergies" placeholder="<?php echo display('allergies') ?> *" id="allergies" class="invoice-input form-control" autocomplete="off" required>
                                            </li> 
                                             <li> 
                                                <input type="text" name="medications" placeholder="<?php echo display('medications') ?> *" id="medications" class="invoice-input form-control" autocomplete="off" required>
                                            </li> 
                                            <li> 
                                                <input type="number" name="emergency_contact" placeholder="<?php echo display('emergency_contact') ?>" id="emergency_contact" class="invoice-input form-control" autocomplete="off">
                                            </li> 
                                            <li> 
                                                <input type="number" name="mass" placeholder="<?php echo display('body_mass_index') ?>" id="mass" class="invoice-input form-control" readonly>
                                            </li> 
                                        </ul>
                                    </th> 
                                </tr> 
                                <tr>
                                    <th>
                                        <textarea type="text" required placeholder="<?php echo display('chief_complain') ?> *" name="chief_complain" class="invoice-input form-control" ></textarea>
                                    </th> 
                                    <th class="text-center">    
                                        <div class="btn-group">
                                        <button type="button" class="btn btn-info btn-sm caseStudyBtn" data-toggle="modal" data-target="#myModal"><?php echo display('case_study') ?></button>

                                        <?php echo form_dropdown('insurance_id', $insurance_list, null, 'class="btn btn-sm select2"'); ?> 
                                        </div>
                                    </th> 
                                    <th>
                                        <input type="text" name="policy_no" class="invoice-input form-control" placeholder="<?php echo display('policy_no') ?>">
                                    </th>
                                </tr>
                            </thead>
                        </table>

                        <!-- Medicine -->
                        <table class="table table-striped"> 
                            <thead>
                                <tr class="bg-primary">
                                    <th width="160"><?php echo display('medicine_name') ?></th>
                                    <th width="160"><?php echo display('medicine_type') ?></th>
                                    <th><?php echo display('instruction') ?></th>
                                    <th width="80"><?php echo display('days') ?></th>
                                    <th width="160"><?php echo display('add_or_remove') ?></th>  
                                </tr>
                            </thead>
                            <tbody id="medicine">
                                <tr>
                                    <td><input type="text" name="medicine_name[]" autocomplete="off" class="medicine form-control" placeholder="<?php echo display('medicine_name') ?>" ></td>
                                    <td><input type="text" name="medicine_type[]" autocomplete="off" class="form-control" placeholder="<?php echo display('medicine_type') ?>" ></td>
                                    <td><textarea name="medicine_instruction[]" class="form-control" placeholder="<?php echo display('instruction') ?>"></textarea></td> 
                                    <td><input type="text" name="medicine_days[]" autocomplete="off" class="form-control" placeholder="<?php echo display('days') ?>"  ></td> 
                                    <td>
                                      <div class="btn btn-group">
                                        <button type="button" class="btn btn-sm btn-primary MedAddBtn"><?php echo display('add') ?></button>
                                        <button type="button" class="btn btn-sm btn-danger MedRemoveBtn"><?php echo display('remove') ?></button>
                                        </div>
                                    </td>   
                                </tr>  
                            </tbody> 
                        </table> 

                        <!-- diagnosis -->
                        <table class="table table-striped"> 
                            <thead>
                                <tr class="bg-danger">
                                    <th width="230"><?php echo display('diagnosis') ?></th>
                                    <th><?php echo display('instruction') ?></th>
                                    <th width="160"><?php echo display('add_or_remove') ?></th>  
                                </tr>
                            </thead>
                            <tbody id="diagnosis">
                                <tr>
                                    <td><input type="text" name="diagnosis_name[]" autocomplete="off" class="form-control" placeholder="<?php echo display('diagnosis') ?>" ></td>
                                    <td><textarea name="diagnosis_instruction[]" class="form-control" placeholder="<?php echo display('instruction') ?>"></textarea></td> 
                                    <td>
                                      <div class="btn btn-group">
                                        <button type="button" class="btn btn-sm btn-primary DiaAddBtn"><?php echo display('add') ?></button>
                                        <button type="button" class="btn btn-sm btn-danger DiaRemoveBtn"><?php echo display('remove') ?></button>
                                        </div>
                                    </td>   
                                </tr>  
                            </tbody> 
                        </table>  

                        <div class="row">
                            <div class="col-md-12">
                            
                                <div class="fancy-collapse-panel">
                                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                    <?php if(!empty($clinicalInfo)){ 
                                        $colorArr = array('1'=>'primary', '2'=>'success','3'=>'info','4'=>'warning');
                                        ?>
                                        <?php $i=0; foreach($clinicalInfo as $category){ $rand = rand(1, 4);
                                            ?>

                                            <div class="panel panel-<?= $colorArr[$rand]?>">
                                                <div class="panel-heading" role="tab" id="heading<?= $category->id;?>">
                                                    <h4 class="panel-title">
                                                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#h<?= $category->id;?>" aria-expanded="false" aria-controls="h<?= $category->id;?>"><?= $category->cat_name;?>
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div id="h<?= $category->id;?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?= $category->id;?>">
                                                    <div class="panel-body">
                                                       
                                                        <ul class="quick-menu">
                                                           <?php if(!empty($category->subitems)){ ?>
                                                              <?php foreach($category->subitems as $subitem){ 
                                                               
                                                                $subsub = json_decode($subitem->sub_sub_name);
                                                                ?>
                                                                <?php if($subitem->is_dropdown==1){ ?>
                                                                <li>
                                                                    <b style="padding: 3px;"><?= $subitem->sub_cat_name;?> :</b>
                                                                    <select name="subitem[<?= $i?>][]" class="form-control">
                                                                        <option value=""><?= display('select_option')?></option>
                                                                        <?php 
                                                                        if (!empty($subsub) && sizeof($subsub) > 0) 
                                                                          foreach ($subsub as $value) {
                                                                        ?>
                                                                        <option value="<?= $value->value;?>"><?= $value->value;?></option>
                                                                        <?php }?>
                                                                    </select>
                                                                </li>
                                                               <?php }else{?>
                                                                <li>
                                                                    <div class="checkbox checkbox-success text-success">
                                                                        <input type="checkbox" value="<?= $subitem->sub_cat_name;?>" name="sub_cat_name[<?= $i?>][]" id="sub<?= $subitem->id;?>">
                                                                        <label for="sub<?= $subitem->id;?>"> <?= $subitem->sub_cat_name;?></label>
                                                                    </div>
                                                                   
                                                                </li>
                                                                <?php }  }
                                                            }?>
                                                            <li>
                                                                <input type="hidden" name="cid[<?= $i?>][]" value="<?= $subitem->cat_id;?>">
                                                                <b style="padding: 3px;"><?= display('add_more');?> :</b>
                                                                <div class="form-group">
                                                                    <textarea name="sub_cat_name[<?= $i?>][]" rows="2" class="form-control" ></textarea>
                                                                </div>
                                                               
                                                            </li>
                                                            
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php $i++;}
                                    }?>
                                    </div>
                                </div>
                                    
                            </div>
                        </div>
                        <!-- Fees & Comments -->
                        <div class="row">
                            <div class="col-sm-12">

                                <div class="form-group row">
                                    <label for="visiting_fees" class="col-xs-3 col-form-label"><?php echo display('visiting_fees') ?></label>
                                    <div class="col-xs-9">
                                        <input name="visiting_fees"  type="text" class="form-control" id="visiting_fees" placeholder="<?php echo display('visiting_fees') ?>">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="patient_notes" class="col-xs-3 col-form-label"><?php echo display('patient_notes') ?></label>
                                    <div class="col-xs-9">
                                        <textarea name="patient_notes" class="form-control"  placeholder="<?php echo display('patient_notes') ?>"></textarea>
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

                            </div>
                        </div>

                        <?php echo form_close() ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
 

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><?php echo display('case_study') ?></h4>
      </div>
      <div class="modal-body" id="caseStudyOutput">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <a href="<?php echo base_url("prescription/case_study/create?patient_id=".$this->session->userdata('casePid')) ?>" class="btn btn-primary hideAction"><?php echo display('add_patient_case_study') ?></a>
      </div>
    </div>
  </div>
</div>


<script type="text/javascript">
$(document).ready(function() {   
 
    //patient information 
    $('body').on("click", ".caseStudyBtn", function () {

        var patient_id = $("#patient_id").val();
        $.ajax({
            url     : '<?php echo base_url('prescription/prescription/case_study') ?>',
            method  : 'post',
            dataType: 'json', 
            data    : {
                'patient_id' : patient_id,
                '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
            },
            success : function(data) {
                if (data) {

                    html = "<table class='table table-striped'>"+
                                "<thead>"+
                                    "<tr class='bg-info'>"+
                                        "<td>CASE</td>"+
                                        "<td>STATUS</td>"+ 
                                    "</tr>"+
                                "</thead>"+
                                "<tbody>";

                    $.each(data, function(i, v) {
                        if (i!='id' && i!='status') {
                            var i = i.replace('_', ' ').toUpperCase();
                            html += "<tr><td>"+i+"</td><td>"+v+"</td></tr>";
                        }
                    });

                    html += "</tbody></table>";
                    $('.hideAction').hide();
                    $("#caseStudyOutput").html(html);
                } else {
                    $('.hideAction').show();
                    $("#caseStudyOutput").html('<?= display('data_not_available')?>');
                }
            },
            error   : function() {
                alert('failed!');
            } 
        });   
    });
 
    // medicine list
    $('body').on('keyup change click', '.medicine', function(){
        $(this).autocomplete({
            source: [
                <?php 
                    if(!empty($medicine_list)) {
                        for ($i=0; $i<sizeof($medicine_list);$i++) { 
                            echo '"'.(!empty($medicine_list[$i])?$medicine_list[$i]:null).'",'; 
                        }
                    } 
                ?>
            ]
        });
    });    



    //#------------------------------------
    //   STARTS OF MEDICINE 
    //#------------------------------------    
    //add row
    $('body').on('click','.MedAddBtn' ,function() {
        var itemData = $(this).parent().parent().parent(); 
        $('#medicine').append("<tr>"+itemData.html()+"</tr>");
        $('#medicine tr:last-child').find(':input').val('');
    });
    //remove row
    $('body').on('click','.MedRemoveBtn' ,function() {
        $(this).parent().parent().parent().remove();
    });

    //#------------------------------------
    //   STARTS OF DIAGNOSIS 
    //#------------------------------------    
    //add row
    $('body').on('click','.DiaAddBtn' ,function() {
        var itemData = $(this).parent().parent().parent(); 
        $('#diagnosis').append("<tr>"+itemData.html()+"</tr>"); 
        $('#diagnosis tr:last-child').find(':input').val('');
    });
    //remove row
    $('body').on('click','.DiaRemoveBtn' ,function() {
        $(this).parent().parent().parent().remove();
    });


    //#------------------------------------
    //   ENDS OF PATIENT INFORMATION
    //#------------------------------------

    $(window).on('load', function(){
        var patient_id = '<?php echo $this->input->get('pid') ?>';
        if(patient_id.length > 0)
        patientInfo(patient_id);
    });

    $('body').on('keyup change', '#patient_id', function() {
        var patient_id = $(this).val();
        patientInfo(patient_id);
    });

    function patientInfo(patient_id)
    { 
        if(patient_id.length > 0)
        $.ajax({
            url     : '<?php echo base_url('prescription/prescription/patient') ?>',
            method  : 'post',
            dataType: 'json', 
            data    : {
                'patient_id' : patient_id,
                '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
            },
            success : function(data) {
                if (data.status == true) { 
                    $(".invlid_patient_id").text('');
                    $("#patient_name").val(data.name);
                    $("#sex").val(data.sex);
                    $("#date_of_birth").val(data.date_of_birth);
                    $("#email").val(data.email);
                    $("#wphone").val(data.phone);
                    $("#mobile").val(data.mobile);
                    $("#address").val(data.address);
                    $("#blood").val(data.blood_group);
                    $("#occupation").val(data.occupation);
                    $("#nss").val(data.nss);
                    $("#religion").val(data.religion);
                } else {
                    $(".invlid_patient_id").text('<?php echo display("invalid_patient_id") ?>');
                }
            },
            error   : function() {
                alert('failed!');
            } 
        });
    } 
    
    // show dropdown month name and previous years
    $( ".dropdown-month-years" ).datepicker({
        dateFormat: "dd-mm-yy",
        changeMonth: true,
        changeYear: true,
        yearRange: "-90:+0"
     });

});
function calculation() {
    //alert('test');
    var w = $('#weight').val();
    var h = $('#height').val();
    var inch =parseFloat(h);
    var inchtot = parseFloat(inch * inch);
    var cal = parseFloat(((w * 2.204622622) / inchtot) * 703);

    $("#mass").val(cal.toFixed(2,2));
}
</script>