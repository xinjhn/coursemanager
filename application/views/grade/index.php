<h4>New Policy</h4>
<?php echo form_open('grade/create') ?>
<div class="form-group row">
    <div class="col-sm-6">
        <?php echo form_input(['name' => 'grade_letter', 'placeholder' => 'A']) ?>
        <?php echo form_input(['name' => 'grade_point', 'placeholder' => '4.0']) ?>
        <input type="submit" value="Add" class="btn btn-primary"/>
    </div>
    
</div>
</form>
<h4>Existing Policy</h4>
<table class="table-light table-striped table-bordered table-hover table-sm">
    <th>Letter</th>
    <th>Point</th>
    <th>Action</th>
    
    <?php foreach($grades as $grade): ?>
    <tr>
        <td><?php echo $grade->grade_letter ?></td>
        <td><?php echo $grade->grade_point ?></td>
        <td>
            <a href="grade/delete/<?php echo $grade->id ?>" class = "btn btn-danger" title = "Delete policy" onclick="return confirm('You are about to delete this policy. Are you sure?')">X</a>
        </td>
    </tr>
    <?php endforeach ?>
</table>

<?php echo anchor('user', 'Back') ?>