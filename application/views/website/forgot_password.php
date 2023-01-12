<div class="panel">
   
    <!-- alert message -->
    <?php if ($this->session->flashdata('message') != null) {  ?>
    <div class="alert alert-info alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <?php echo $this->session->flashdata('message'); ?>
    </div> 
    <?php } ?>
    
    <?php if ($this->session->flashdata('exception') != null) {  ?>
    <div class="alert alert-danger alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <?php echo $this->session->flashdata('exception'); ?>
    </div>
    <?php } ?>
    
    <?php if (validation_errors()) {  ?>
    <div class="alert alert-danger alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <?php echo validation_errors(); ?>
    </div>
    <?php } ?> 
    <p><?php echo display('forgot').' '.display('password');?></p>
    <div class="register-form">
        <?php echo form_open('forgot_password','id="forgotForm" novalidate'); ?>

            <div class="form-group">
                <input type="email" placeholder="<?= display('email') ?>" name="email" id="email" class="form-control" value="<?php echo $patient->email;?>"> 
                <div class="text-success"><?= display('please_provide_a_valid_email')?></div>
            </div>
            <div class="form-group">
                <input type="password" placeholder="<?= display('password') ?>" name="new_pass" id="new_pass" class="form-control"> 
            </div>
           
            <button type="submit" class="btn btn-primary btn-block"><?= display('update').' '.display('password')?></button>
        </form>
    </div>
    <p class="m-t-10"><a href="<?php echo base_url('patient_login');?>"><?= display('sign_in')?></a></p>
</div>
