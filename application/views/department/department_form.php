<div class="row">
    <div class="col-sm-12">
        <div  class="panel panel-default thumbnail">
            <?php
            if($this->permission->method('department_list','read')->access()  || $this->permission->method('department_list','update')->access() || $this->permission->method('department_list','delete')->access()){
            ?>
            <div class="panel-heading no-print">
                <div class="btn-group"> 
                    <a class="btn btn-primary" href="<?php echo base_url("department") ?>"> <i class="fa fa-list"></i>  <?php echo display('department_list') ?> </a>  
                </div>
            </div> 
            <?php } ?>


            <?php
            if($this->permission->method('add_department','create')->access()){
            ?>
            <div class="panel-body panel-form">
                <div class="row">
                    <div class="col-md-9 col-sm-12">

                        <?php echo form_open_multipart('department/create','class="form-inner"') ?> 

                            <?php echo form_hidden('dprt_id',$department->dprt_id) ?>

                            <div class="form-group row">
                                <label for="name" class="col-xs-3 col-form-label"><?php echo display('department_name') ?> <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                    <input name="name"  type="text" class="form-control" id="name" placeholder="<?php echo display('department_name') ?>" value="<?php echo $department->name ?>">
                                </div>
                            </div>

                             <div class="form-group row">
                                <label for="main_department" class="col-xs-3 col-form-label"><?php echo display('main_department') ?> <i class="text-danger">*</i></label>
                                <div class="col-xs-9"> 
                                    <?php 
                                        echo form_dropdown('main_id',$main_department,$department->main_id,'class="form-control" id="main_id"'); 
                                    ?>
                                </div>
                            </div>

                             <div class="form-group row">
                                <label for="flaticon" class="col-xs-3 col-form-label"><?php echo display('flaticon') ?></label>
                                <div class="col-xs-9"> 
                                    <?php 
                                        $flaticon = array(  
                                            ''         => display('select_option'), 
                                            'neurology'   => 'Neurology', 
                                            'drug'   => 'Pharmacy',
                                            'focus'   => 'Psychology',
                                            'heart'   => 'Cardiology',
                                            'herbal'   => 'Therapy',
                                            'feeder'   => 'Nursing',
                                            'tooth'   => 'Dental',
                                            'kidney'   => 'Urology',
                                            'traumatology'   => 'traumatology',
                                            'x-ray'   => 'X-ray',
                                            'focus'   => 'Psychology',
                                            'vitamins'   => 'Vitamins',
                                            'penis'   => 'Penis',
                                            'kidney-1'   => 'Kidney 1',
                                            'kidney-2'   => 'Kidney 2',
                                            'sperm-2'   => 'Pregnancy',
                                            'surgery'   => 'Surgery'
                                        );
                                        echo form_dropdown('flaticon',$flaticon,$department->flaticon,'class="form-control" id="flaticon"'); 
                                    ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="description" class="col-xs-3 col-form-label"><?php echo display('description') ?></label>
                                <div class="col-xs-9">
                                    <textarea name="description" class="form-control"  placeholder="<?php echo display('description') ?>" rows="7"><?php echo $department->description ?></textarea>
                                </div>
                            </div>

                            <!-- if department image is already uploaded -->
                            <?php if(!empty($department->image)) {  ?>
                            <div class="form-group row">
                                <label for="logoPreview" class="col-xs-3 col-form-label"></label>
                                <div class="col-xs-9">
                                    <img src="<?= base_url($department->image) ?>" alt="image" class="img-thumbnail" />
                                </div>
                            </div>
                            <?php } ?>

                            <div class="form-group row">
                                <label for="image" class="col-xs-3 col-form-label"><?php echo display('picture')?> <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                    <input name="image"  type="file" id="image" >
                                    <input type="hidden" name="old_image" value="<?= $department->image ?>">
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