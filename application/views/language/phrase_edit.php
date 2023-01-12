<div class="panel panel-default thumbnail">
 
    <div class="panel-heading">
        <div class="btn-group"> 
            <?php
            if($this->permission->method('add_phrase','create')->access()){
            ?>
            <a class="btn btn-success" href="<?php echo base_url("language/phrase") ?>"> <i class="fa fa-plus"></i><?php echo display('add_phrase')?></a>
            <?php } ?>

         <?php
          if($this->permission->method('language_setting','read')->access() || $this->permission->method('language_setting','update')->access()){
          ?>
            <a class="btn btn-primary" href="<?php echo base_url("language") ?>"> <i class="fa fa-list"></i><?php echo display('language_list')?></a> 
         <?php } ?>

        </div> 
    </div>


    <div class="panel-body">
        <div class="row">
            <?php
            if($this->permission->method('add_phrase','create')->access() || $this->permission->method('add_phrase','update')->access()){
            ?>
            <!-- phrase -->
            <div class="col-sm-12">
 
                <?= form_open('language/addlebel') ?>
                    <?= form_hidden('language', $language) ?>
                <table class="datatable3 table table-striped">
                    <thead> 
                        <tr>
                            <td colspan="3"> 
                                <button type="reset" class="btn btn-danger"><?php echo display('reset')?></button>
                                <button type="submit" class="btn btn-success"><?php echo display('save')?></button>
                            </td>
                        </tr>
                        <tr>
                            <th><i class="fa fa-th-list"></i></th>
                            <th>Phrase</th>
                            <th>Label</th> 
                        </tr>
                    </thead>

                    <tbody>
                            <?php if (!empty($phrases)) {?>
                                <?php $sl = 1 ?>
                                <?php foreach ($phrases as $value) {?>
                                <tr class="<?= (empty($value->$language)?"bg-danger":null) ?>">
                                
                                    <td><?= $sl++ ?></td>
                                    <td><input type="text" name="phrase[]" value="<?= $value->phrase ?>" class="form-control-custom" readonly></td>
                                    <td><input type="text" name="lang[]" value="<?= $value->$language ?>" class="form-control-custom"></td> 
                                </tr>
                                <?php } ?>
                            <?php } ?>
                    </tbody>
                    <tfooter>
                         <tr>
                            <td colspan="3"> 
                                <button type="reset" class="btn btn-danger"><?php echo display('reset')?></button>
                                <button type="submit" class="btn btn-success"><?php echo display('save')?></button>
                            </td>
                        </tr>
                    </tfooter>
                </table>
                <?= form_close() ?>
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
