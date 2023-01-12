<div class="row">
    <!--  table area -->
    <div class="col-sm-12">
        <div class="panel panel-default thumbnail">
        <?php
        if($this->permission->method('add_room','create')->access()){
        ?>
            <div class="panel-heading">
                <div class="btn-group">
                    <a class="btn btn-success" href="<?php echo base_url("bed_manager/room/form") ?>"> <i class="fa fa-plus"></i>  <?php echo display('add_room') ?> </a>  
                </div>
            </div>
        <?php } ?>


        <?php
        if($this->permission->method('room_list','read')->access() || $this->permission->method('room_list','update')->access() || $this->permission->method('room_list','delete')->access()){
        ?>
            <div class="panel-body">
                <table class="datatable table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th><?php echo display('serial') ?></th>
                            <th><?php echo display('room_name') ?></th>
                            <th><?php echo display('description') ?></th>
                            <th><?php echo display('bed_limit') ?></th>
                            <th><?php echo display('charge') ?></th>
                            <th><?php echo display('status') ?></th>
                            <?php
                            if($this->permission->method('room_list','read')->access() || $this->permission->method('room_list','update')->access() || $this->permission->method('room_list','delete')->access()){
                            ?>
                            <th><?php echo display('action') ?></th>
                            <?php } ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($rooms)) { ?>
                            <?php $sl = 1; ?>
                            <?php foreach ($rooms as $room) { ?>
                                <tr class="<?php echo ($sl & 1)?"odd gradeX":"even gradeC" ?>">
                                    <td><?php echo $sl; ?></td>
                                    <td><?php echo $room->room_name; ?></td>
                                    <td><?php echo character_limiter($room->description, 60); ?></td>
                                    <td><?php echo $room->limit; ?></td>
                                    <td><?php echo number_format($room->charge,2); ?></td>
                                    <td><?php echo (($room->status==1)?display('active'):display('inactive')); ?></td>

                                    <?php
                                    if($this->permission->method('room_list','update')->access() || $this->permission->method('room_list','delete')->access()){
                                    ?>
                                    <td class="center">
                                        <?php
                                        if($this->permission->method('room_list','update')->access()){
                                        ?>
                                        <a href="<?php echo base_url("bed_manager/room/form/$room->id") ?>" class="btn btn-xs  btn-primary"><i class="fa fa-edit"></i></a> 
                                        <?php } ?>


                                        <?php
                                        if($this->permission->method('room_list','delete')->access()){
                                        ?>
                                        <a href="<?php echo base_url("bed_manager/room/delete/$room->id") ?>" onclick="return confirm('<?php echo display("are_you_sure") ?>')" class="btn btn-xs  btn-danger"><i class="fa fa-trash"></i></a> 
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
