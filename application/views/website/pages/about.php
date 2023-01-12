<div class="row">
    <div class="col-sm-12">
        <div  class="panel panel-default thumbnail">
            
        
        <?php
        if($this->permission->method('about','read')->access() || $this->permission->method('about','update')->access() || $this->permission->method('about','delete')->access()){
        ?>
            <div class="panel-body">
                <table width="100%" class="datatable table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th><?php echo display('language') ?></th>
                            <th><?php echo display('picture') ?></th>
                            <th><?php echo display('signature') ?></th>
                            <th><?php echo display('title') ?></th>
                            <th><?php echo display('description') ?></th>
                            <th><?php echo display('quotation') ?></th>
                            <th><?php echo display('author_name') ?></th>
                            <th><?php echo display('status') ?></th>
                            <?php
                            if($this->permission->method('about','update')->access() || $this->permission->method('about','delete')->access()){
                            ?>
                            <th><?php echo display('action') ?></th>
                            <?php } ?>

                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($abouts)) { ?>
                            <?php $sl = 1; ?>
                            <?php foreach ($abouts as $about) { ?>
                                <tr class="<?php echo ($sl & 1)?"odd gradeX":"even gradeC" ?>">
                                    <td><?php echo $about->language; ?></td>
                                    <td><img src="<?php echo (!empty($about->image)?base_url($about->image):base_url('assets_web/img/placeholder/about.png')); ?>" width="65" height="50"></td>
                                    <td><img src="<?php echo (!empty($about->signature)?base_url($about->signature):base_url('assets_web/img/placeholder/signature.png')); ?>" width="65" height="50"></td>
                                    <td><?php echo $about->title; ?></td>
                                    <td><?php echo character_limiter(strip_tags($about->description),70); ?></td>
                                    <td><?php echo $about->quotation; ?></td>
                                    <td><?php echo $about->author_name; ?></td>
                                    <td><?php echo (($about->status==1)?display('active'):display('inactive')); ?></td>

                                    <?php
                                    if($this->permission->method('about','update')->access() || $this->permission->method('about','delete')->access()){
                                    ?>

                                    <td class="center">
                                    <?php
                                    if($this->permission->method('about','update')->access()){
                                    ?>
                                       <?php if($about->id==1){ ?>
                                             <a href="<?php echo base_url("website/about/add_lang/$about->id") ?>" class="btn btn-xs btn-success"><i class="fa fa-plus"></i></a> 
                                       <?php }?>
                                      <a href="<?php echo base_url("website/about/edit/$about->id") ?>" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a> 
                                    <?php } ?>

                                    <?php
                                    if($this->permission->method('about','delete')->access()){
                                    ?>
                                    <a href="<?php echo base_url("website/about/delete/$about->id") ?>" onclick="return confirm('<?php echo display('are_you_sure') ?>')" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a> 
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