<div class="row">
    <div class="col-sm-12" id="PrintMe">
        <div  class="panel panel-default thumbnail"> 
            <div class="panel-heading no-print">
                 <div class="btn-group">
                    <?php
                     if($this->permission->method('profile','update')->access()){
                    ?> 
                    <a href="<?php echo base_url('dashboard/form/') ?>" class="btn btn-primary"><i class="fa fa-edit"></i></a> 
                    <a href="<?php echo base_url('dashboard/profile_languages/') ?>" class="btn btn-success"><i class="fa fa-list"></i> <?php echo display('language') ?></a> 
                    <?php } ?>
                </div>
            </div>

            <?php
             if($this->permission->method('profile','read')->access()){
            ?>
            <div class="panel-body">  
                <div class="row">
                    <div class="col-md-12 col-sm-12" align="center">  
                        <table class="datatable table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th><?php echo display('serial') ?></th>
                                    <th><?php echo display('language') ?></th>
                                    <th><?php echo display('full_name') ?></th>
                                    <th><?php echo display('designation') ?></th>
                                    <th><?php echo display('specialist') ?></th> 
                                    <th><?php echo display('mobile') ?></th> 
                                     <th><?php echo display('action') ?></th> 
                                </tr>
                            </thead>
                           <tbody>
                           <?php if (!empty($languages)) { ?>
                            <?php $sl = 1; ?>
                            <?php foreach ($languages as $user) { ?>
                                <tr class="<?php echo ($sl & 1)?"odd gradeX":"even gradeC" ?>">
                                    <td><?php echo $sl; ?></td>
                                     <td><?php echo $user->language; ?></td>
                                    <td><?php echo $user->firstname.' '.$user->lastname; ?></td>
                                    <td><?php echo $user->designation; ?></td>
                                    <td><?php echo $user->specialist; ?></td>
                                    <td><?php echo $user->mobile; ?></td>
                                    <td>
                                        <div class="action-btn">

                                        <?php
                                        if($this->permission->method('profile','update')->access()){
                                        ?>
                                         <a href="<?php echo base_url("dashboard/edit_language/$user->id") ?>" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a> 
                                       <?php } ?>

                                        <?php
                                        if($this->permission->method('profile','delete')->access()){
                                        ?>
                                         <a href="<?php echo base_url("user/delete_lang/$user->id") ?>" class="btn btn-xs btn-danger" onclick="return confirm('<?php echo display('are_you_sure') ?> ')"><i class="fa fa-trash"></i></a>
                                       <?php } ?>
                                        
                                        </div> 
                                    </td>
                                    
                                </tr>
                                  <?php $sl++; ?>
                               <?php } ?> 
                            <?php } ?> 
                          </tbody>
                        </table>  <!-- /.table-responsive -->
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

