<div class="row">

        <?php
        if($this->permission->method('report','read')->access()){
        ?>
         <div class="col-sm-12">
            <div  class="panel panel-default"> 
                <div class="panel-body"> 

                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon btn-success">Search</span>
                            <input type="text" name="search_text" id="search_text" placeholder="Search by Patient Details" class="form-control" />
                        </div>
                    </div>
                    <br />
                    <div id="result"></div>

                </div>
            </div>
         </div>
        <?php } 
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

<script type="text/javascript">
$(document).ready(function() {
    
    $('#search_text').keyup(function(){
        var search = $(this).val();
        
        $.ajax({
            url  : '<?= base_url('medication_visit/medications/fetch/') ?>',
            type : 'post',
            data : {
                '<?= $this->security->get_csrf_token_name(); ?>' : '<?= $this->security->get_csrf_hash(); ?>',
                query : search
            },
            success : function(data) 
            {
                $('#result').html(data);
            }, 
        });
    });
});
</script>
