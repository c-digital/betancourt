<div class="row">
    <!--  table area -->
    <div class="col-sm-12">
        <div  class="panel panel-default thumbnail">
        <?php
        if($this->permission->method('news','create')->access()){
        ?>
            <div class="panel-heading">
                <a href="<?= base_url('website/news/create') ?>" class="btn btn-success"><i class="fa fa-plus"></i> <?php echo display('add_news') ?></a>
            </div>
            <?php } ?>
 
        <div class="msg"></div>
        <?php
        if($this->permission->method('news','read')->access() || $this->permission->method('news','update')->access() || $this->permission->method('news','delete')->access()){
        ?>
            <div class="panel-body">
                <!-- Nav tabs --> 
                <ul class="col-xs-12 nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"> 
                        <a href="#home" aria-controls="home" role="tab" data-toggle="tab"> <i class="fa fa-list"></i> <?php echo display('news_list') ?></a>
                    </li>
                    <li role="presentation">
                        <a href="#language" aria-controls="language" role="tab" data-toggle="tab"> <i class="fa fa-list"></i> <?php echo display('content_language') ?></a>
                    </li>
                </ul>  

                <!-- Tab panes --> 
                <div class="col-xs-12 tab-content">
                    <br>
                    <!-- INFORMATION -->
                    <div role="tabpanel" class="tab-pane active" id="home">
                        <div class="row">
                            <div class="col-md-12"> 
                                 <table width="100%" class="datatable table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th><?php echo display('serial') ?></th>
                                            <th><?php echo display('picture') ?></th>
                                            <th><?php echo display('department_name') ?></th>
                                            <th><?php echo display('title') ?></th>
                                            <th><?php echo display('add_to_website') ?></th>
                                             <?php
                                            if($this->permission->method('news','update')->access() || $this->permission->method('news','delete')->access()){
                                            ?>
                                            <th><?php echo display('action') ?></th> 
                                            <?php } ?>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($news)) { ?>
                                            <?php $sl = 1; ?>
                                            <?php foreach ($news as $new) { ?>
                                                <tr class="<?php echo ($sl & 1)?"odd gradeX":"even gradeC" ?>">
                                                    <td><?php echo $sl; ?></td>
                                                    <td><img src="<?php echo (!empty($new->featured_image)?base_url($new->featured_image):base_url('assets_web/img/placeholder/blog.png')); ?>"  width="65" height="50"></td>
                                                    <td><?php echo $new->name; ?></td>
                                                    <td><?php echo $new->title; ?></td>
                                                     <td>
                                                        <input type="checkbox" id="add_to_website" data-value="<?= (($new->status==1)?0:1) ?>" data-id="<?= $new->id; ?>" <?= (($new->status==1)?"checked":null) ?>>
                                                    </td>
                                                    <?php
                                                    if($this->permission->method('news','update')->access() || $this->permission->method('news','delete')->access()){
                                                    ?>
                                                    <td class="center" width="10%">
                                                        <?php
                                                        if($this->permission->method('news','update')->access()){
                                                        ?>
                                                             <a href="<?php echo base_url("website/news/add_lang/$new->id") ?>" class="btn btn-xs btn-primary" data-toggle="tooltip" data-placement="top" title="<?= display('content_language')?>"><i class="fa fa-plus"></i></a>
                                                        <?php }?>
                                                        <a href="<?php echo base_url("website/news/edit/$new->id") ?>" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a> 
                                                       
                                                        <?php
                                                        if($this->permission->method('news','delete')->access()){
                                                        ?>
                                                       <a href="<?php echo base_url("website/news/delete/$new->id") ?>" onclick="return confirm('<?php echo display('are_you_sure') ?>')" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a> 
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
                        </div>
                    </div> 

                    <div role="tabpanel" class="tab-pane" id="language">
                        <div class="row">
                            <div class="col-sm-12">
                                 <table width="100%" class="datatable table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th><?php echo display('serial') ?></th>
                                            <th><?php echo display('language') ?></th>
                                            <th><?php echo display('picture') ?></th>
                                            <th><?php echo display('department_name') ?></th>
                                            <th><?php echo display('title') ?></th>
                                            <th><?php echo display('description') ?></th>
                                             <?php
                                            if($this->permission->method('news','update')->access() || $this->permission->method('news','delete')->access()){
                                            ?>
                                            <th><?php echo display('action') ?></th> 
                                            <?php } ?>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($newsLang)) { ?>
                                            <?php $sl = 1; ?>
                                            <?php foreach ($newsLang as $new) { ?>
                                                <tr class="<?php echo ($sl & 1)?"odd gradeX":"even gradeC" ?>">
                                                    <td><?php echo $sl; ?></td>
                                                    <td><?php echo $new->language; ?></td>
                                                    <td><img src="<?php echo (!empty($new->featured_image)?base_url($new->featured_image):null); ?>"  width="65" height="50"></td>
                                                    <td><?php echo $new->name; ?></td>
                                                    <td><?php echo $new->title; ?></td>
                                                     <td><?php echo $new->description; ?></td>
                                                    <?php
                                                    if($this->permission->method('news','update')->access() || $this->permission->method('news','delete')->access()){
                                                    ?>
                                                    <td class="center" width="10%">
                                                        
                                                        <a href="<?php echo base_url("website/news/edit_language/$new->id") ?>" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a> 
                                                        
                                                        <?php
                                                        if($this->permission->method('news','delete')->access()){
                                                        ?>
                                                       <a href="<?php echo base_url("website/news/delete_language/$new->id") ?>" onclick="return confirm('<?php echo display('are_you_sure') ?>')" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a> 
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
                        </div>
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
<script type="text/javascript">
$(document).ready(function() {

    var source = $('input[id^="add_to_website"]');
    var target = $('.msg');
    source.on('change', function() {
        var id     = $(this).attr('data-id');
        var value  = $(this).attr('data-value'); 

        $.ajax({
            url      : '<?= base_url('website/news/change_status') ?>',
            type     : 'post',
            dataType : 'json',
            data     : {
                '<?= $this->security->get_csrf_token_name(); ?>' : '<?= $this->security->get_csrf_hash(); ?>',
                id, 
                value
            },
            success : function(data) { 
                if (data.message) {
                    target.removeClass('alert alert-danger');
                    target.addClass('alert alert-info');
                    target.html(data.message);
                } else {
                    target.removeClass('alert alert-info');
                    target.addClass('alert alert-danger');
                    target.html(data.exception);
                } 

                setInterval(function(){ 
                    history.go(0);
                }, 1500);

            },
            error   : function(exc){
                alert('failed');
            }
        });
 

    }); 
});
</script>

