<?php
if($this->permission->method('role_permission','create')->access()){
?>
<div class="row">
    <div class="col-sm-12 col-md-12">
     <div class="panel panel-bd lobidrag">
            <div class="panel-heading">
                <div class="panel-title">
                    
                </div>
            </div>
       <!--  <?php echo form_open_multipart('permission_assign/permission_insert','class="form-inner"') ?>       -->
        <div class="panel-body">
         <div class="form-group row">
          <label for="role_name" class="col-xs-3 col-form-label"><?php echo display('role_name') ?> </label>
          <div class="col-xs-6"> 
             <select class="form-control" name="role_id" id="role_name">
                 <option></option>
                <?php
                  foreach($role as $r_data){
                 ?>
                     <option value="<?php echo $r_data->id?>"><?php echo $r_data->type?></option>
                <?php
                  }
                ?>
             </select>
           </div>
        </div>
      </div>
     </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12 col-md-12">
     <div class="panel panel-bd lobidrag">
            <div class="panel-heading">
                <div class="panel-title">
                    <h4><?php echo (!empty($title)?$title:null) ?></h4>
                </div>
            </div>
         <div class="panel-body">
           
            <!-- show permission if assign -->
            <div id="showPermission"></div>
        
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
 <script type="text/javascript">
    $('#role_name').on('change', function() {
        $user_id = this.value;

          $.ajax({
          url : "<?php echo site_url('permission_assign/showpermission/')?>" + $user_id,
          type: "GET",
          dataType: "json",
          success: function(data)
          {
              $('#showPermission').html(data);
          },
          error: function (jqXHR, textStatus, errorThrown)
          {
              alert('Error get data from ajax');
          }
       });
    });
 </script>