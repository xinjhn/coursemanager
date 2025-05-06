<a href="<?php echo site_url('course/create') ?>" class="btn btn-secondary">+Course</a><br/>
<table class="table table-light table-striped table-bordered table-hover table-sm">
    <th>Initial</th>
    <th>Title</th>
    <th>Description</th>
    <th>Credits</th>
    <th>Status</th>
    <th>Grade</th>
    <th>Action</th>
    
    <?php foreach($courses as $course): ?>
    <tr>
        <td><?php echo $course->initial ?></td>
        <td><?php echo $course->title ?></td>
        <td><?php echo $course->description ?></td>
        <td class="center"><?php echo $course->credits ?></td>
        <td class="center"><?php echo $status_list[$course->status] ?></td>
        <td class="center"><?php echo $grade_list[$course->grade_point] ?></td>
        <td>
            <a href="<?php echo site_url('course/edit/' . $course->id) ?>" class = "btn btn-success">Edit</a>
            <a href="<?php echo site_url('course/delete/' . $course->id) ?>" class = "btn btn-danger" onclick="return confirm('You are about to delete this course. Are you sure?')" title = "Delete course">Delete</a>
        </td>
    </tr>
    <?php endforeach ?>
</table>
<h5>Summary</h5>
<p>Credits completed: <?php echo $result['total_credits'] ?></p>
<p>CGPA: <?php echo $result['gpa'] ?></p>
<h5>Backup
    <a href="course/excel"><?php echo img('assets/img/xl.png') ?></a>
    <a href="course/csv"><?php echo img('assets/img/csv.png') ?></a>
</h5>