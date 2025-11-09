<?php $data = $course->getAll(); ?>

<h3>Course List</h3>
<a href="?page=course_form" class="btn btn-success">Add New Course</a>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Instructor</th>
        <th>Price</th>
        <th>Action</th>
    </tr>
    <?php foreach ($data as $c): ?>
    <tr>
        <td><?= $c['id'] ?></td>
        <td><?= $c['title'] ?></td>
        <td><?= $c['instructor_name'] ?></td>
        <td><?= number_format($c['price'], 0, ',', '.') ?></td>
        <td class="table-actions">
            <a href="?page=course_form&id=<?= $c['id'] ?>" class="btn btn-warning">Edit</a>
            <a href="?delete_course=<?= $c['id'] ?>" class="btn btn-danger" onclick="return confirm('Yakin hapus data ini?')">Delete</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>