<div class="row">

    <div class="col-sm-12">
        <div  class="panel panel-default thumbnail">
 
            <div class="panel-heading no-print">
                <div class="btn-group"> 
                    <?php
                    if($this->permission->method('add_menu','create')->access() ){
                    ?>
                    <a class="btn btn-success" href="<?php echo base_url("website/menu/create") ?>"> <i class="fa fa-plus"></i>  <?php echo display('add_menu') ?> </a>  
                    <?php } ?>

                </div>
            </div>  

            <div class="msg"></div>
             <?php
             if($this->permission->method('menu','read')->access()){
             ?>     
            <div class="panel-body"> 
                <!-- Nav tabs --> 
                <ul class="col-xs-12 nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"> 
                        <a href="#home" aria-controls="home" role="tab" data-toggle="tab"> <i class="fa fa-list"></i> <?php echo display('menu_list')?></a>
                    </li>
                    <li role="presentation">
                        <a href="#language" aria-controls="language" role="tab" data-toggle="tab"> <i class="fa fa-list"></i> <?php echo display('language') ?></a>
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
                                            <th><?php echo display('menu_name') ?></th>
                                            <th><?php echo display('position') ?></th>
                                            <th><?php echo display('add_to_website') ?></th>
                                            <th class="no-print"><?php echo display('action') ?></th> 
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($menus)) { ?>
                                            <?php $sl = 1; ?>
                                            <?php foreach ($menus as $menu) { ?>
                                                <tr>
                                                    <td><?php echo $sl; ?></td>
                                                    <td><?php echo $menu->name; ?></td>
                                                    <td><?php echo $menu->position; ?></td>
                                                    <td>
                                                        <input type="checkbox" id="add_to_website" data-value="<?= (($menu->status==1)?0:1) ?>" data-id="<?= $menu->id; ?>" <?= (($menu->status==1)?"checked":null) ?>>
                                                    </td> 
                                                    <td class="center no-print" width="110"> 
                                                        <a  href="<?php echo base_url('website/menu/create_language/'.$menu->id) ?>" class="btn btn-xs btn-success"><i class="fa fa-plus"></i></a>
                                                        <a  href="<?php echo base_url('website/menu/edit/'.$menu->id) ?>" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>
                                                        <a href="<?php echo base_url("website/menu/delete/".$menu->id) ?>" class="btn btn-xs btn-danger" onclick="return confirm('<?php echo display('are_you_sure') ?>') "><i class="fa fa-trash"></i></a> 
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

                    <div role="tabpanel" class="tab-pane" id="language">
                        <div class="row">
                            <div class="col-sm-12">
                               <table width="100%" class="datatable table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th><?php echo display('serial') ?></th>
                                            <th><?php echo display('menu_name') ?></th>
                                            <th><?php echo display('language') ?></th>
                                            <th><?php echo display('title') ?></th>
                                            <th class="no-print"><?php echo display('action') ?></th> 
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($menuLang)) { ?>
                                            <?php $sl = 1; ?>
                                            <?php foreach ($menuLang as $menu) { ?>
                                                <tr>
                                                    <td><?php echo $sl; ?></td>
                                                    <td><?php echo $menu->name; ?></td>
                                                    <td><?php echo $menu->language; ?></td>
                                                    <td><?php echo $menu->title; ?></td>
                                                    <td class="center no-print" width="110"> 
                                                        <a  href="<?php echo base_url('website/menu/edit_lang/'.$menu->id) ?>" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>
                                                        <a href="<?php echo base_url("website/menu/delete_lang/".$menu->id) ?>" class="btn btn-xs btn-danger" onclick="return confirm('<?php echo display('are_you_sure') ?>') "><i class="fa fa-trash"></i></a> 
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
            url      : '<?= base_url('website/menu/change_status') ?>',
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