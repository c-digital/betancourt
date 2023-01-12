<div class="panel">
    <div class="panel-header text-center">
        <h3><?= (!empty($section->title)?$section->title:null)?></h3>
    </div>
    <p><?= (!empty($section->description)?$section->description:null)?></p>

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

    <div class="register-form">
        <?php echo form_open('patient_login','id="loginForm" novalidate'); ?>

            <div class="form-group">
                <input type="email" placeholder="<?= display('email') ?>" name="email" id="email" class="form-control"> 
                <div class="text-success"><?= display('please_provide_a_valid_email')?></div>
            </div>
            <div class="form-group">
                <input type="password" placeholder="<?= display('password') ?>" name="password" id="password" class="form-control"> 
            </div>
            <input type="hidden" name="user_role" value="10"> 
            <div class="custom-control custom-checkbox mb-3">
                <input type="checkbox" name="chkuserpss" class="custom-control-input" id="customCheck1">
                <label class="custom-control-label" for="customCheck1"><?= display('remember_me_next_time')?> </label>
            </div>
            <div class="form-group">
                 <?php echo form_dropdown('userLang',$languageList, $this->input->cookie('Lng', true),'class="form-control basic-single" id="userLang"') ?> 
            </div>

            <button type="submit" class="btn btn-primary btn-block"><?= display('sign_in')?></button>
        </form>
    </div>
</div>
<div class="bottom-text">
    <?= display('do_not_have_an_account')?> <a href="<?= base_url('registration')?>"><?= display('sign_up')?></a><br>
    <?= display('remind')?> <a href="<?php echo base_url('forgot_password');?>"><?= display('password')?></a>
</div>