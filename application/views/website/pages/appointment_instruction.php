<div class="row">
    <div class="col-sm-12">
        <div  class="panel panel-default thumbnail">
        <?php
        if($this->permission->method('appoint_instruction','create')->access()){
        ?>
            <div class="panel-heading">
                <a href="<?= base_url('website/appoint_instruction/instruction_form') ?>" class="btn btn-success"><i class="fa fa-plus"></i> <?php echo display('add_instruction') ?></a>
            </div>
        <?php } ?>

        <?php
        if($this->permission->method('appoint_instruction','read')->access() || $this->permission->method('appoint_instruction','update')->access()){
        ?>
            <div class="panel-body">
                <table width="100%" class="datatable table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th><?php echo display('serial') ?></th>
                            <th><?php echo display('language') ?></th>
                            <th><?php echo display('title') ?></th>
                            <th><?php echo display('short_instruction') ?></th>
                            <th><?php echo display('instructions') ?></th>
                            <th><?php echo display('notes') ?></th>
                            <?php
                            if($this->permission->method('appoint_instruction','update')->access() || $this->permission->method('appoint_instruction','delete')->access()){
                            ?>
                            <th><?php echo display('action') ?></th>
                            <?php } ?>

                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($instructions)) { ?>
                            <?php $sl = 1; ?>
                            <?php foreach ($instructions as $instruction) { ?>
                                <tr class="<?php echo ($sl & 1)?"odd gradeX":"even gradeC" ?>">
                                    <td><?php echo $sl; ?></td>
                                    <td><?php echo $instruction->language; ?></td>
                                    <td><?php echo $instruction->title; ?></td>
                                    <td><?php echo character_limiter(strip_tags($instruction->instruction), 30); ?></td>
                                    <td><?php echo character_limiter(strip_tags($instruction->instruction),50); ?></td>
                                    <td><?php echo $instruction->note; ?></td>
                                    <td class="center">
                                    <?php
                                    if($this->permission->method('appoint_instruction','update')->access() ){
                                    ?>
                                    <a href="<?php echo base_url("website/appoint_instruction/instruction_edit/$instruction->id") ?>" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a> 
                                    <?php } ?>

                                    <?php
                                    if($this->permission->method('appoint_instruction','delete')->access() ){
                                    ?>
                                    <a href="<?php echo base_url("website/appoint_instruction/instruction_delete/$instruction->id") ?>" onclick="return confirm('<?php echo display('are_you_sure') ?>')" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a> 
                                    <?php } ?>
                                    </td>
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