 <?php
if($this->permission->method('employee_list','read')->access() || $this->permission->method('employee_list','update')->access() || $this->permission->method('employee_list','delete')->access()){
?>
<div class="row">
    <div class="col-sm-12" id="PrintMe">
        <div class="panel panel-default thumbnail">

            <div class="panel-heading no-print">
                <div class="btn-group">
                    <button type="button" onclick="printContent('PrintMe')" class="btn btn-danger" ><i class="fa fa-print"></i></button>
                </div>
            </div> 
 
            <div class="panel-body">  
                <div class="row">
                    <div class="col-sm-12" align="center">  
                        <h1><?php echo display('employee_information') ?></h1>
                    <br>
                    <?php if(empty($profile)){?>
                        <i class="text-danger"><?php echo display('language_data_not_inserted_yet') ?></i>
                     <?php } ?>
                    </div>

                    <div class="col-sm-4" align="center"> 
                        <img alt="Picture" src="<?php echo (!empty($profile->picture) ? base_url($profile->picture) : base_url("assets/images/no-img.png")) ?>" class="img-thumbnail img-responsive">
                        <h3><?php echo (!empty($profile->fname)?$profile->fname:null) ?> <?php echo (!empty($profile->lname)?$profile->lname:null) ?></h3>
                         
                    </div> 

                    <div class="col-sm-8"> 
                        <dl class="dl-horizontal">
                           <dt><?php echo display('designation') ?></dt><dd><?php echo (!empty($profile->designation)?$profile->designation:null) ?></dd>
                            <dt><?php echo display('specialist') ?></dt><dd><?php echo (!empty($profile->specialist)?$profile->specialist:null) ?></dd>
                            <dt><?php echo display('email') ?></dt><dd><?php echo (!empty($profile->email)?$profile->email:null) ?></dd>
                            <dt><?php echo display('mobile') ?></dt><dd><?php echo (!empty($profile->mobile)?$profile->mobile:null) ?></dd> 
                            <dt><?php echo display('sex') ?></dt><dd><?php echo (!empty($profile->sex)?$profile->sex:null) ?></dd> 
                            <dt><?php echo display('address') ?></dt><dd><?php echo (!empty($profile->address)?$profile->address:null) ?></dd> 
                            <dt><?php echo display('create_date') ?></dt><dd><?php echo (!empty($profile->create_date)?date('d M Y',strtotime($profile->create_date)):null) ?></dd>
                            <dt>
                              <?php echo display('user_role') ?>    
                            </dt>
                            <dd>
                             <?php
                              foreach($role_type as $r_data){
                                if(!empty($profile->user_id)){
                                  if($r_data->user_id == $profile->user_id){
                                    ?>
                                    <button class="btn btn-info"><?php echo $r_data->type;?></button>
                                    <?php
                                  }
                                }
                              }
                             ?> 
                            </dd> 
                            <dt><?php echo display('status') ?></dt><dd><?php if(!empty($profile->status)){ echo (($profile->status==1)?display('active'):display('inactive')); }?></dd> 
                        </dl> 
                    </div>
                </div>  
            </div> 

            <div class="panel-footer">
                <div class="text-center">
                    <strong><?php echo $this->session->userdata('title') ?></strong>
                    <p class="text-center"><?php echo $this->session->userdata('address') ?></p>
                </div>
            </div>
        </div>
    </div>
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
