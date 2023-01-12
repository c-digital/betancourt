<div class="row">
    <div class="col-sm-12 col-md-12">
     <div class="panel panel-bd lobidrag">
            <div class="panel-heading">
                <div class="panel-title">
                    
                </div>
            </div>
        <?php echo form_open_multipart('permission_assign/permission_assign_insert','class="form-inner"') ?>
        <?php
           if($this->permission->method('assign_role_to_user','read')->access()){
        ?>
        <div class="panel-body">
          <div class="col-sm-12 col-md-12">
              <div class="col-sm-12 col-md-8">
                 <div class="form-group row">
            <label for="user_id" class="col-xs-3 col-form-label"><?php echo display('user') ?> </label>
               <div class="col-xs-6"> 
                 <select class="form-control" onchange="userRole(this.value)" name="userid" id="userid">
                     <option></option>
                    <?php
                      foreach($user as $u_data){
                     ?>
                         <option value="<?php echo $u_data->user_id?>"><?php echo $u_data->firstname.' '.$u_data->lastname ?></option>
                    <?php
                      }
                    ?>
                 </select>
               </div>
        </div>


        <div class="form-group row">
          <label for="roleid" class="col-xs-3 col-form-label"><?php echo display('role_name') ?> </label>
          <div class="col-xs-6"> 
             <select class="form-control" name="roleid" id="roleid">
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

        <div class="form-group row">
           <?php
           if($this->permission->method('assign_role_to_user','create')->access()){
           ?>
            <div class="col-sm-offset-3 col-sm-6">
                <div class="ui buttons">
                    <button type="reset" class="ui button"><?php echo display('reset') ?></button>
                    <div class="or"></div>
                    <button class="ui positive button"><?php echo display('save') ?></button>
                </div>
            </div>
            <?php } ?>

        </div>
         <?php echo form_close() ?>
              </div>
              <div class="col-sm-12 col-md-4">
                <div class="col-md-12" style="border: 1px">
                    <h3><?php echo display('exsisting_role') ?></h3>
                    <div id="existrole" style="">

                    </div>
                </div>
              </div>
          </div>
      </div>
      <?php } ?>
     </div>
    </div>
</div>
<script type="text/javascript">
    function userRole(id){
        $.ajax({
            url : "<?php echo site_url('permission_assign/userassign/')?>" + id,
            type: "GET",
            success: function(data)
            {
                $('#existrole').html(data);
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                $('#existrole').html("<p style='color:red'>No Role Selected.</p>");
            }
        });
    }
    // $("#roleassign_delete").on('click',function(){
    //    alert('okk');
    // });
</script>