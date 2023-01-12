<div class="panel">
    <div class="panel-header text-center">
        <h3><?= (!empty($section->title)?$section->title:null)?></h3>
    </div>
    <p><?= (!empty($section->description)?$section->description:null)?></p>
    <div class="msg"></div>
    <div class="register-form">
        <div class="form-group">
            <input type="text" class="form-control" name="firstname" id="firstname" placeholder="<?= display('first_name')?>">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="lastname" id="lastname" placeholder="<?= display('last_name')?>">
        </div>
        <div class="form-group">
            <input type="email" class="form-control is-invalid" name="email" id="email" placeholder="<?= display('email')?>">
            <div class="invalid-feedback"><?= display('please_provide_a_valid_email')?></div>
        </div>
        <div class="form-group">
            <input type="password" class="form-control" name="password" id="password" placeholder="<?= display('password')?>">
        </div>
        <div class="custom-control custom-checkbox mb-3">
            <input type="checkbox" class="custom-control-input" id="customCheck1" required>
            <label class="custom-control-label" for="customCheck1">Yes, I'd like to be invited to Hospital events and receive new resources like tutorials, templates or the latest advice. (You can opt out at any time.) </label>
        </div>
        <button type="submit" id="submit" class="btn btn-primary btn-block"><?= display('sign_up')?></button>
        <p class="muted">
            <!-- By signing up, you agree to our <a class="external" href="#">terms of use</a>. -->
        </p>
    </div>
</div>