<div class="row">
    <!--  form area -->
    <div class="col-sm-12">
        <div  class="panel panel-default thumbnail">
           
            <?php
            if($this->permission->method('portfolio','read')->access() || $this->permission->method('portfolio','update')->access() || $this->permission->method('portfolio','delete')->access()){
            ?>
            <div class="panel-heading no-print">
                <div class="btn-group"> 
                    <a class="btn btn-primary" href="<?php echo base_url("portfolio") ?>"> <i class="fa fa-list"></i>  <?php echo display('portfolio_list') ?> </a>  
                </div>
            </div> 
            <?php } ?>

           <?php
           if($this->permission->method('add_portfolio','create')->access()){
           ?>
            <div class="panel-body panel-form">
                <div class="row">
                    <div class="col-md-9 col-sm-12">

                        <?php echo form_open('portfolio/create','class="form-inner"') ?>
                            <?php echo form_hidden('id',$portfolio->id) ?>

                            <div class="form-group row">
                                <label for="user_id" class="col-xs-3 col-form-label"><?php echo display('doctor_name') ?> <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                <?php echo form_dropdown('user_id', $doctor_list, $portfolio->user_id, 'class="form-control" id="user_id"') ?>
                                </div>
                            </div>
 
                            <div class="form-group row">
                                <label for="language" class="col-sm-3"><?php echo display('content_language') ?> <i class="text-danger">*</i></label></label>
                                <div class="col-xs-9">
                                    <div class="form-check">
                                        <?php foreach ($languageList as $value) {?>
                                        <label class="radio-inline">
                                            <?php echo form_radio('language', lcfirst($value), (!empty($portfolio->language)?lcfirst($value)==$portfolio->language:lcfirst($value)=='english')).' ' .$value;?>
                                        </label>
                                        <?php }?>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="designation" class="col-xs-3 col-form-label"><?php echo display('designation') ?> <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                    <input name="title" type="text" class="form-control" id="title" placeholder="<?php echo display('designation') ?>" value="<?= $portfolio->title;?>">
                                </div>
                            </div>

                             <div class="form-group row">
                                <label for="institute_name" class="col-xs-3 col-form-label"><?php echo display('institute_name') ?> <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                    <input name="institute" type="text" class="form-control" id="institute" placeholder="<?php echo display('institute_name') ?>" value="<?= $portfolio->institute;?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="from_date" class="col-xs-3 col-form-label"><?php echo display('from_date') ?></label>
                                <div class="col-xs-9">
                                    <input name="from_date" type="text" class="form-control datepicker" id="from_date" placeholder="<?php echo display('from_date') ?>" autocomplete="off" value="<?= $portfolio->from_date;?>">
                                </div>
                            </div>

                             <div class="form-group row">
                                <label for="to_date" class="col-xs-3 col-form-label"><?php echo display('to_date') ?></label>
                                <div class="col-xs-9">
                                    <input name="to_date" type="text" class="form-control datepicker" id="to_date" placeholder="<?php echo display('to_date') ?>" autocomplete="off" value="<?= $portfolio->to_date;?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="description" class="col-xs-3 col-form-label"><?php echo display('description') ?> <i data-toggle="tooltip" data-placement="top" title="Minimum Character 200">?</i> <i class="text-danger">*</i> </label>
                                <div class="col-xs-9">
                                    <textarea class="form-control" name="description" placeholder="<?= display('description')?>" rows="5"><?= $portfolio->description;?></textarea>
                                </div>
                            </div>

                            <!--Radio-->
                            <div class="form-group row">
                                <label class="col-sm-3"><?php echo display('status') ?></label>
                                <div class="col-xs-9"> 
                                    <div class="form-check">
                                        <label class="radio-inline">
                                <input type="radio" name="status" value="1" checked><?php echo display('active') ?>
                                        </label>
                                        <label class="radio-inline">
                                 <input type="radio" name="status" value="0"><?php echo display('inactive') ?>
                                        </label>
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
          
            <div class="col-sm-12">
               <div class="panel panel-bd lobidrag">
                <div class="panel-heading">
                  <div class="panel-title">
                    <h4><?php echo display('you_do_not_have_permission_to_access_please_contact_with_administrator');?>.</h4>
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