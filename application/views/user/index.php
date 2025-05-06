<h4>User Profile</h4>
<form>
	<div class="form-group row">
	    <label class="col-sm-2 col-form-label">First Name</label>
	    <div class="col-sm-10">
	      <input type="text" readonly class="form-control" value="<?php echo $user->first_name ?>">
	    </div>
  	</div>

  	<div class="form-group row">
	    <label class="col-sm-2 col-form-label">Last Name</label>
	    <div class="col-sm-10">
	      <input type="text" readonly class="form-control" value="<?php echo $user->last_name ?>">
	    </div>
	 </div>

	<div class="form-group row">
	    <label class="col-sm-2 col-form-label">Username</label>
	    <div class="col-sm-10">
	      <input type="text" readonly class="form-control" value="<?php echo $user->username ?>">
	    </div>
  	</div>

  	<div class="form-group row">
	    <label class="col-sm-2 col-form-label">Registered On</label>
	    <div class="col-sm-10">
	      <input type="text" readonly class="form-control" value="<?php echo $user->created_on ?>">
	    </div>
  	</div>

	<div class="form-group row">
		<label class="col-sm-2 col-form-label">Last Activity</label>
		<div class="col-sm-10">
		  <input type="text" readonly class="form-control" value="<?php echo $user->last_login ?>">
		</div>
	</div>

	<div class="form-group row">
		<label class="col-sm-2 col-form-label">Company</label>
		<div class="col-sm-10">
		  <input type="text" readonly class="form-control" value="<?php echo $user->company ?>">
		</div>
	</div>

	<div class="form-group row">
		<label class="col-sm-2 col-form-label">Phone</label>
		<div class="col-sm-10">
		  <input type="text" readonly class="form-control" value="<?php echo $user->phone ?>">
		</div>
	</div>
</form>