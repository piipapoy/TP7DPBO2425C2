<?php $data = $instructor->getAll(); ?>

<h3>Instruktur List</h3>
<a href="?page=instructor_form" class="btn btn-success">Add New Instructor</a>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Expertise</th>
        <th>Action</th>
    </tr>
    <?php foreach ($data as $i): ?>
    <tr>
        <td><?= $i['id'] ?></td>
        <td><?= $i['name'] ?></td>
        <td><?= $i['email'] ?></td>
        <td><?= $i['expertise'] ?></td>
        <td class="table-actions">
            <a href="?page=instructor_form&id=<?= $i['id'] ?>" class="btn btn-warning">Edit</a>
            <a href="?delete_instructor=<?= $i['id'] ?>" class="btn btn-danger" onclick="return confirm('Yakin hapus data ini?')">Delete</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>