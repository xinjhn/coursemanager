<h4>New Course</h4>
<?php echo validation_errors() ?>

<form method="POST">
	<div class="form-group">
		<label>Initial</label>
		<?php echo form_input(['name' => 'initial', 'placeholder' => 'MAT101', 'class' => 'form-control text-uppercase', 'required' => 'required']) ?>
	</div>

	<div class="form-group">
		<label>Title</label>
		<?php echo form_input(['name' => 'title', 'placeholder' => 'Introduction to General Math', 'class' => 'form-control']) ?>
	</div>

	<div class="form-group">
		<label>Description</label>
		<?php echo form_input(['name' => 'description', 'class' => 'form-control']) ?>
	</div>

	<div class="form-group">
		<label>Credits</label>
		<?php echo form_dropdown(['name' => 'credits', 'options' => [0 => '0', 1 => '1', 2 => '2', 3 => '3'], 'class' => 'form-control']) ?>
	</div>

	<div class="form-group">
		<label>Completion Status</label>
		<?php echo form_dropdown(['name' => 'status', 'options' => [0 => 'Pending', 1 => 'Complete'], 'class' => 'form-control']) ?>
	</div>

	<div class="form-group">
		<label>Grade</label>
		<?php echo form_dropdown(['name' => 'grade_point', 'options' => $grade_dropdown, 'class' => 'form-control']) ?>
	</div>

	<button type = "submit" class="btn btn-primary">Create</button>
</form>

<a href="<?php echo site_url('course') ?>" class="btn btn-link">Back</a>