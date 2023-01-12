<div class="row">
    <div class="col-sm-12">
        <div  class="panel panel-default thumbnail">
             <?php
             if($this->permission->method('add_doctor','create')->access() ){
             ?>
            <div class="panel-heading no-print">
                <div class="btn-group"> 
                    <a class="btn btn-success" href="<?php echo base_url("patient") ?>"> <i class="fa fa-list"></i>  <?php echo display('patient_list') ?> </a>  
                    <a download class="btn btn-info" href="<?php echo base_url("assets/data/patient_list.csv") ?>"> <i class="fa fa-download"></i>  <?php echo display('sample_csv') ?> </a> 
                </div>
            </div> 
            <?php } ?>

            <?php
               if($this->permission->method('add_patient','create')->access() ){?>
                <div class="panel-body">
                    <div class="col-xs-12 tab-content">
                        <form method="post" id="import_csv" enctype="multipart/form-data">

                         <div class="form-group row">
                            <label for="patient_id" class="col-xs-3 col-form-label"></label>
                            <div class="col-xs-9">
                               <input type="file" name="csv_file" id="csv_file" required accept=".csv" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-offset-3 col-sm-6">
                                <div class="ui buttons">
                                    <button type="reset" class="ui button"><?php echo display('reset') ?></button>
                                    <div class="or"></div>
                                    <button type="submit" class="ui positive button" name="import_csv" id="import_csv_btn"><?php echo display('import_csv_data') ?></button>
                                </div>
                            </div>
                        </div>

                     </form>
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
    $(document).ready(function(){
        $('#import_csv').on('submit', function(event){
          event.preventDefault();
          $.ajax({
           url:"<?php echo base_url(); ?>patient/import",
           method:"POST",
           data:new FormData(this),
           contentType:false,
           cache:false,
           processData:false,
           beforeSend:function(){
            $('#import_csv_btn').html('Importing...');
           },
           success:function(data)
           {
            $('#import_csv')[0].reset();
            $('#import_csv_btn').attr('disabled', false);
            $('#import_csv_btn').html('Import Done');
            setInterval(function(){
                window.location.href = "<?= base_url('patient')?>";
            }, 5000);
           }
          })
         });
    });
</script>
