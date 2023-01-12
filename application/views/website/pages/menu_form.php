<div class="row">
    <!--  form area -->
    <div class="col-sm-12"> 

       <div  class="panel panel-default thumbnail">
        <?php
        if($this->permission->method('menu','read')->access() || $this->permission->method('menu','update')->access() || $this->permission->method('menu','delete')->access()){
        ?>
        <div class="panel-heading no-print">
            <div class="btn-group"> 
                <a class="btn btn-primary" href="<?php echo base_url("website/menu/") ?>"> <i class="fa fa-list"></i>  <?php echo display('menu_list') ?> </a>  
            </div>
        </div> 
        <?php } ?>

 
        <?php
        if($this->permission->method('add_menu','create')->access()){
        ?>
            <div class="panel-body  panel-form">
                <div class="row">
                    <div class="col-md-9 col-sm-12">

                        <?= form_open_multipart('website/menu/create','class="form-inner"') ?>
                            
                            <input type="hidden" name="id" value="<?= $menu->id ?>">

                            <div class="form-group row">
                                <label for="menu_name" class="col-xs-3 col-form-label"><?php echo display('menu_name') ?> <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                     <input name="name"  type="text" class="form-control" id="name" placeholder="<?php echo display('menu_name') ?>" value="<?= $menu->name ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="parent_id" class="col-xs-3 col-form-label"><?php echo display('parent_menu') ?> </label>
                                <div class="col-xs-9">
                                     <?= form_dropdown('parent_id',$menu_list, $menu->parent_id,'class="form-control" id="parent_id" ') ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="position" class="col-xs-3 col-form-label"><?php echo display('position') ?> <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                    <input name="position" type="number" class="form-control" value="<?= $menu->position ?>" placeholder="<?php echo display('position') ?>" />
                                </div>
                            </div>

                            <!--Radios-->
                            <div class="form-group row">
                                <label class="col-sm-3">Status</label>
                                <div class="col-xs-9"> 
                                    <div class="form-check">
                                        <label class="radio-inline">
                                            <input type="radio" name="status" value="1" <?= set_radio('status', '1', true); ?> >Active
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="status" value="0" <?= set_radio('status', '0'); ?> >Inactive
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

                        <?= form_close() ?>

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