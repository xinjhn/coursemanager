<h4>Edit Course</h4>
<?php echo validation_errors() ?>
<?php if(! isset($course)): ?>
<div class="alert alert-info">No such record</div>
<?php else: ?>
<form method="POST">
    <div class="form-group">
        <label>Initial</label>
        <?php echo form_input(['name' => 'initial', 'value' => $course->initial, 'class' => 'form-control text-uppercase', 'required' => 'required']) ?>
    </div>

    <div class="form-group">
        <label>Title</label>
        <?php echo form_input(['name' => 'title', 'value' => $course->title, 'class' => 'form-control']) ?>
    </div>

    <div class="form-group">
        <label>Description</label>
        <?php echo form_input(['name' => 'description', 'value' => $course->description, 'class' => 'form-control']) ?>
    </div>

    <div class="form-group">
        <label>Credits</label>
        <?php echo form_dropdown(['name' => 'credits', 'options' => [0 => '0', 1 => '1', 2 => '2', 3 => '3'], 'selected' => $course->credits,'class' => 'form-control']) ?>
    </div>

    <div class="form-group">
        <label>Completion Status</label>
        <?php echo form_dropdown(['name' => 'status', 'options' => [0 => 'Pending', 1 => 'Complete'], 'selected' => $course->status, 'class' => 'form-control']) ?>
    </div>

    <div class="form-group">
        <label>Grade</label>
        <?php echo form_dropdown(['name' => 'grade_point', 'options' => $grade_dropdown, 'selected' => $course->grade_point, 'class' => 'form-control']) ?>
    </div>
    
    <button type = "submit" class="btn btn-primary">Update</button>
</form>
<?php endif ?>

<a href="<?php echo site_url('course') ?>" class="btn btn-link">Back</a>