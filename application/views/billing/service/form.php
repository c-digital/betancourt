<div class="row">
    <!--  form area -->
    <div class="col-sm-12">
        <div  class="panel panel-default thumbnail">
 
        <?php
        if($this->permission->method('service_list','read')->access() || $this->permission->method('service_list','update')->access() || $this->permission->method('service_list','delete')->access()){
        ?>
            <div class="panel-heading no-print">
                <div class="btn-group"> 
                    <a class="btn btn-primary" href="<?php echo base_url("billing/service/index") ?>"> <i class="fa fa-list"></i>  <?php echo display('service_list') ?> </a>  
                </div>
            </div> 
        <?php } ?>


            <?php
            if($this->permission->method('add_service','create')->access()){
            ?>
            <div class="panel-body panel-form">
                <div class="row">
                    <div class="col-md-9 col-sm-12">

                        <?php echo form_open('billing/service/form/'.$service->id,'class="form-inner"') ?>

                            <?php echo form_hidden('id',$service->id) ?>

                            <div class="form-group row">
                                <label for="name" class="col-xs-3 col-form-label"><?php echo display('service_name') ?> <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                    <input name="name"  type="text" class="form-control" id="name" placeholder="<?php echo display('service_name') ?>" value="<?php echo $service->name ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="description" class="col-xs-3 col-form-label"><?php echo display('description') ?></label>
                                <div class="col-xs-9">
                                    <textarea name="description" class="form-control"  placeholder="<?php echo display('description') ?>" rows="7"><?php echo $service->description ?></textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="quantity" class="col-xs-3 col-form-label"><?php echo display('quantity') ?> <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                    <input name="quantity"  type="text" class="form-control" id="quantity" placeholder="<?php echo display('quantity') ?>" value="<?php echo $service->quantity ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="amount" class="col-xs-3 col-form-label"><?php echo display('rate') ?> <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                    <input name="amount"  type="text" class="form-control" id="amount" placeholder="<?php echo display('amount') ?>" value="<?php echo $service->amount ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="professional_commission" class="col-xs-3 col-form-label"><?php echo 'Comisi??n a profesional %' ?></label>
                                <div class="col-xs-9">
                                    <input name="professional_commission"  type="text" class="form-control" id="professional_commission" placeholder="<?php echo 'Comisi??n a profesional' ?>" value="<?php echo isset($service->professional_commission) ? $service->professional_commission : '' ?>">
                                </div>
                            </div>

                            <!--Radio-->
                            <div class="form-group row">
                                <label class="col-sm-3"><?php echo 'Relacionado a UTI' ?></label>
                                <div class="col-xs-9"> 
                                    <div class="form-check">
                                        <label class="radio-inline"><input <?php echo ($service->uci == 'Si') ? 'checked' : '' ?> type="radio" name="uci" required value="Si"><?php echo 'Si' ?></label>
                                        <label class="radio-inline"><input <?php echo ($service->uci == 'No') ? 'checked' : '' ?> type="radio" name="uci" required value="No"><?php echo 'No' ?></label>
                                    </div>
                                </div>
                            </div>

                            <!--Radio-->
                            <div class="form-group row">
                                <label class="col-sm-3"><?php echo 'Relacionado a consulta' ?></label>
                                <div class="col-xs-9"> 
                                    <div class="form-check">
                                        <label class="radio-inline"><input <?php echo ($service->consulta == 'Si') ? 'checked' : '' ?> type="radio" name="consulta" required value="Si"><?php echo 'Si' ?></label>
                                        <label class="radio-inline"><input <?php echo ($service->consulta == 'No') ? 'checked' : '' ?> type="radio" name="consulta" required value="No"><?php echo 'No' ?></label>
                                    </div>
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