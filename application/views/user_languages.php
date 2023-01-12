<div class="row">
    <!--  table area -->
    <div class="col-sm-12">
        <div  class="panel panel-default thumbnail">
            <?php
            if($this->permission->method('add_doctor','create')->access() ){
            ?>
            <div class="panel-heading no-print">
                <div class="btn-group"> 
                    <a class="btn btn-success" href="<?php echo base_url("doctor/create_language") ?>"> <i class="fa fa-plus"></i>  <?php echo display('language') ?> </a>  
                </div>
            </div>
            <?php } ?>


            <?php
                if($this->permission->method('add_doctor','read')->access() || $this->permission->method('add_doctor','delete')->access()){
                ?>
            <div class="panel-body">
                <table width="100%" class="datatable table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th><?php echo display('serial') ?></th>
                            <th><?php echo display('doctor_name') ?></th>
                            <th><?php echo display('name') ?></th>
                            <th><?php echo display('type') ?></th>
                            <th><?php echo display('rating') ?></th>

                         <?php
                         if($this->permission->method('add_doctor','delete')->access()){
                          ?>
                            <th><?php echo display('action') ?></th>
                          <?php } ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($languages)) { ?>
                            <?php $sl = 1; ?>
                            <?php foreach ($languages as $language) { ?>
                                <tr class="<?php echo ($sl & 1)?"odd gradeX":"even gradeC" ?>">
                                <td><?php echo $sl; ?></td>
                                <td><?php echo $language->dname; ?></td>
                                <td><?php echo $language->name; ?></td>
                                <td><?php echo $language->type; ?></td>
                                <td><?php echo $language->rating; ?></td>

                                <?php
                                if($this->permission->method('add_doctor','delete')->access()){
                                 ?>
                                <td class="center">
                                   <a href="<?php echo base_url("doctor/delete_language/$language->id") ?>" class="btn btn-xs btn-danger" onclick="return confirm('<?php echo display('are_you_sure') ?>')"><i class="fa fa-trash"></i></a> 
                                  
                                </td>
                                <?php } ?>
                                </tr>
                                <?php $sl++; ?>
                            <?php } ?> 
                        <?php } ?> 
                    </tbody>
                </table>  <!-- /.table-responsive -->
            </div>
            <?php }else{
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
            } ?>
        </div>
    </div>
</div>

