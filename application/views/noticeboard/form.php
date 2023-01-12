<div class="row">
    <!--  form area -->
    <div class="col-sm-12">
        <div class="panel panel-default thumbnail">

        <?php
        if($this->permission->method('notice_list','read')->access() || $this->permission->method('notice_list','update')->access() || $this->permission->method('notice_list','delete')->access()){
        ?>
            <div class="panel-heading">
                <div class="btn-group"> 
                    <a class="btn btn-primary" href="<?php echo base_url("noticeboard/notice") ?>"> <i class="fa fa-list"></i>  <?php echo display('notice_list') ?> </a> 
                </div>
            </div>
        <?php } ?>



    <?php
    if($this->permission->method('report','create')->access()){
    ?>
            <div class="panel-body panel-form">
                <div class="row">
                    <div class="col-md-9 col-sm-12">

                        <?php echo form_open('noticeboard/notice/form/','class="form-inner"') ?>

                            <div class="form-group row">
                                <label for="title" class="col-xs-3 col-form-label"><?php echo display('title')?> <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                    <input name="title"  type="text" class="form-control" id="title" placeholder="<?php echo display('title')?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="description" class="col-xs-3 col-form-label"><?php echo display('description') ?> <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                <textarea name="description" class="form-control tinymce"  placeholder="<?php echo display('description') ?>"  rows="7"></textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="start_date" class="col-xs-3 col-form-label"><?php echo display('start_date')?> <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                    <input name="start_date"  type="text" class="form-control datepicker" id="start_date" placeholder="<?php echo display('start_date')?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="end_date" class="col-xs-3 col-form-label"><?php echo display('end_date') ?> <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                    <input name="end_date"  type="text" class="form-control datepicker" id="end_date" placeholder="<?php echo display('end_date')?>">
                                </div>
                            </div>

                            <!--Radios-->
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
 