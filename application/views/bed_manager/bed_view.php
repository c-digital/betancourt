<div class="row">
    <!--  table area -->
    <div class="col-sm-12">
        <div class="panel panel-default thumbnail">
        <?php
        if($this->permission->method('add_bed','create')->access()){
        ?>
            <div class="panel-heading">
                <div class="btn-group">
                    <a class="btn btn-success" href="<?php echo base_url("bed_manager/bed/form") ?>"> <i class="fa fa-plus"></i>  <?php echo display('add_bed') ?> </a>  
                </div>
            </div>
        <?php } ?>


        <?php
        if($this->permission->method('bed_list','read')->access() || $this->permission->method('bed_list','update')->access() || $this->permission->method('bed_list','delete')->access()){
        ?>
            <div class="panel-body">
                <table class="datatable table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th><?php echo display('serial') ?></th>
                            <th><?php echo display('room_name') ?></th>
                            <th><?php echo display('bed_number') ?></th>
                            <th><?php echo display('description') ?></th>
                            <th><?php echo display('status') ?></th>
                            <?php
                            if($this->permission->method('bed_list','update')->access() || $this->permission->method('bed_list','delete')->access()){
                            ?>
                            <th><?php echo display('action') ?></th>
                            <?php } ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($beds)) { ?>
                            <?php $sl = 1; ?>
                            <?php foreach ($beds as $bed) { ?>
                                <tr class="<?php echo ($sl & 1)?"odd gradeX":"even gradeC" ?>">
                                    <td><?php echo $sl; ?></td>
                                    <td><?php echo $bed->room_name; ?></td>
                                    <td><?php echo character_limiter($bed->bed_number, 60); ?></td>
                                    <td><?php echo $bed->description; ?></td>
                                    <td><?php echo (($bed->status==1)?display('booked'):display('available')); ?></td>

                                    <?php
                                    if($this->permission->method('bed_list','update')->access() || $this->permission->method('bed_list','delete')->access()){
                                    ?>
                                    <td class="center">
                                        <?php
                                        if($this->permission->method('bed_list','update')->access()){
                                        ?>
                                        <a href="<?php echo base_url("bed_manager/bed/form/$bed->id") ?>" class="btn btn-xs  btn-primary"><i class="fa fa-edit"></i></a> 
                                        <?php } ?>


                                        <?php
                                        if($this->permission->method('bed_list','delete')->access()){
                                        ?>
                                        <a href="<?php echo base_url("bed_manager/bed/delete/$bed->id") ?>" onclick="return confirm('<?php echo display("are_you_sure") ?>')" class="btn btn-xs  btn-danger"><i class="fa fa-trash"></i></a> 
                                        <?php } ?>
                                        
                                    </td>
                                    <?php } ?>

                                </tr>
                                <?php $sl++; ?>
                            <?php } ?> 
                        <?php } ?> 
                    </tbody>
                </table>  <!-- /.table-responsive -->
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
