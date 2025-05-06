<h1>Registration</h1>

<div id="infoMessage"><?php echo $message ?></div>

<?php echo form_open("auth/create_user") ?>
<div class="form-group row">
  <div class="col-sm-6">
    <label>First Name</label>
    <?php $first_name['class'] = 'form-control' ?>
    <?php $first_name['required'] = 'required' ?>
    <?php echo form_input($first_name) ?>
  </div>
</div>

<div class="form-group row">
  <div class="col-sm-6">
    <label>Last Name</label>
    <?php $last_name['class'] = 'form-control' ?>
    <?php $last_name['required'] = 'required' ?>
    <?php echo form_input($last_name) ?>
  </div>
</div>

<div class="form-group row">
  <div class="col-sm-6">
    <label>Company</label>
    <?php $company['class'] = 'form-control' ?>
    <?php echo form_input($company) ?>
  </div>
</div>

<div class="form-group row">
  <div class="col-sm-6">
    <label>Phone</label>
    <?php $phone['class'] = 'form-control' ?>
    <?php echo form_input($phone) ?>
  </div>
</div>

<div class="form-group row">
  <div class="col-sm-6">
    <label>Email</label>
    <?php $email['type'] = 'email' ?>
    <?php $email['class'] = 'form-control' ?>
    <?php $email['required'] = 'required' ?>
    <?php echo form_input($email) ?>
  </div>
</div>

<div class="form-group row">
  <div class="col-sm-6">
    <label>Password</label>
    <?php $password['class'] = 'form-control' ?>
    <?php $password['required'] = 'required' ?>
    <?php echo form_password($password) ?>
  </div>
</div>

<div class="form-group row">
  <div class="col-sm-6">
    <label>Confirm Password</label>
    <?php $password_confirm['class'] = 'form-control' ?>
    <?php $password_confirm['required'] = 'required' ?>
    <?php echo form_password($password_confirm) ?>
  </div>
</div>

<button type="submit" class="btn btn-primary">Sign Up</button>
</form>