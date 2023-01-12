<div class="row">
    <!--  table area -->
    <div class="col-sm-12" id="PrintMe">
        <div class="panel panel-default thumbnail">

            <div class="panel-heading no-print">
                <div class="btn-group">
                    <?php
                    if($this->permission->method('report','create')->access()){
                    ?>
                      <a class="btn btn-success" href="<?php echo base_url("noticeboard/notice/form") ?>"> <i class="fa fa-plus"></i>  <?php echo display('add_notice') ?> </a> 
                    <?php } ?>

                    <?php
                    if($this->permission->method('notice_list','read')->access() || $this->permission->method('notice_list','update')->access() || $this->permission->method('notice_list','delete')->access()){
                    ?>
                       <a class="btn btn-primary" href="<?php echo base_url("noticeboard/notice") ?>"> <i class="fa fa-list"></i>  <?php echo display('notice_list') ?> </a> 
                    <?php } ?>

                    
                     <?php
                     if($this->permission->method('notice_list','read')->access()){
                     ?>
                       <button type="button" onclick="printContent('PrintMe')" class="btn btn-danger" ><i class="fa fa-print"></i></button>
                    <?php } ?>
                    
                </div>
            </div> 




        <?php
        if($this->permission->method('notice_list','read')->access()){
        ?>

            <div class="panel-heading">
                <h3 class="heading"><?php echo (!empty($title) ? $title : null) ?></h3>
            </div> 

            <div class="panel-body">
                <?php echo $notice->description ?>
            </div>

            <div class="panel-footer">
                <div class="col-md-offset-8 col-sm-offset-6">
                <dl class="dl-horizontal">
                    <dt><?php echo display('assign_by') ?></dt><dd><?php echo $notice->assign_by ?></dd>
                    <dt><?php echo display('start_date') ?></dt><dd><?php echo date('d M Y', strtotime($notice->start_date)) ?></dd>
                    <dt><?php echo display('end_date') ?></dt><dd><?php echo date('d M Y', strtotime($notice->end_date)) ?></dd>
                </dl>
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
 
  


