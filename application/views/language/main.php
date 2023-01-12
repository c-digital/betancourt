 <div class="panel panel-default thumbnail">

    <?php
    if($this->permission->method('add_phrase','create')->access()){
    ?>
    <div class="panel-heading">
        <div class="btn-group"> 
            <a class="btn btn-success" href="<?php echo base_url("language/phrase") ?>"> <i class="fa fa-plus"></i> Add Phrase</a> 
        </div> 
    </div>
    <?php }?>


    <div class="panel-body">
        <div class="row">
            <!-- language -->

        <?php
        if($this->permission->method('language_setting','create')->access() || $this->permission->method('language_setting','read')->access() || $this->permission->method('language_setting','update')->access()){
        ?>
            <div class="col-sm-12">
              <table class="table table-striped">
                <thead>

                   <?php
                    if($this->permission->method('language_setting','create')->access()){
                    ?>
                      <tr>
                        <td colspan="3">
                            <?= form_open('language/addlanguage', ' class="form-inline" ') ?> 
                                <div class="form-group">
                                    <label class="sr-only" for="addLanguage"> Language Name</label>
                                    <input name="language" type="text" class="form-control" id="addLanguage" placeholder="Language Name">
                                </div>
                                  
                                <button type="submit" class="btn btn-primary"><?php echo display('save')?></button>
                            <?= form_close(); ?>
                        </td>
                       </tr>
                    <?php } ?>


                   <?php
                    if($this->permission->method('language_setting','read')->access() || $this->permission->method('language_setting','update')->access()){
                    ?> 
                    <tr>
                        <th><i class="fa fa-th-list"></i></th>
                        <th>Language</th>
                        <?php
                        if($this->permission->method('language_setting','update')->access()){
                        ?> 
                        <th><i class="fa fa-cogs"></i></th>
                        <?php } ?>
                    </tr>
                    <?php } ?>
                </thead>


                <tbody>
                    <?php
                    if($this->permission->method('language_setting','read')->access() || $this->permission->method('language_setting','update')->access()){
                    ?> 

                    <?php if (!empty($languages)) {?>
                        <?php $sl = 1 ?>
                        <?php foreach ($languages as $key => $language) {?>
                        <tr>
                            <td><?= $sl++ ?></td>
                            <td><?= $language ?></td>
                             <?php
                             if($this->permission->method('language_setting','update')->access()){
                             ?> 
                            <td><a href="<?= base_url("language/editPhrase/$key") ?>" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>  
                            <a href="<?= base_url("language/delete/$key") ?>" onclick="return confirm('<?php echo display('are_you_sure');?>')" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
                            </td> 
                            <?php } ?>

                        </tr>
                        <?php } ?>
                    <?php } ?>
                     <?php } ?>
                </tbody>

              </table>
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

