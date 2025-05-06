<h1><?php echo lang('login_heading') ?></h1>

<div id="infoMessage"><?php echo $message ?></div>

<?php echo form_open("auth/login") ?>
<div class="form-group row">
  <div class="col-sm-6">
    <?php $identity['placeholder'] = 'E-mail' ?>
    <?php $identity['class'] = 'form-control' ?>
    <?php $identity['type'] = 'email' ?>
    <?php $identity['required'] = 'required' ?>
    <?php echo form_input($identity) ?>
  </div>
</div>
<div class="form-group row">
  <div class="col-sm-6">
    <?php $password['class'] = 'form-control' ?>
    <?php $password['placeholder'] = 'Password' ?>
    <?php $password['required'] = 'required' ?>
    <?php echo form_input($password) ?>
  </div>
</div>
<div class="form-group row">
  <div class="col-sm-6">
    <button type="submit" class="btn btn-primary">Sign in</button>
  </div>
</div>
</form>

<p><a href="create_user">Don't have an account?</a></p>