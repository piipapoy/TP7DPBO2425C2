<?php 
$data = $enrollment->getAll(); 
$allCourses = $course->getAll(); // Ambil semua kursus untuk form
?>

<h3>Enrollment List</h3>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Student Name</th>
        <th>Course</th>
        <th>Enrollment Date</th>
        <th>Action</th>
    </tr>
    <?php foreach ($data as $e): ?>
    <tr>
        <td><?= $e['id'] ?></td>
        <td><?= $e['student_name'] ?></td>
        <td><?= $e['course_title'] ?></td>
        <td><?= $e['enrollment_date'] ?></td>
        <td class="table-actions">
            <a href="?delete_enrollment=<?= $e['id'] ?>" class="btn btn-danger" onclick="return confirm('Yakin hapus data ini?')">Delete</a>
            </td>
    </tr>
    <?php endforeach; ?>
</table>

<h3 class="mt-20">Add New Enrollment</h3>
<form method="POST">
    <label>Student Name:</label>
    <input type="text" name="student_name" required>

    <label>Course:</label>
    <select name="course_id" required>
        <?php foreach ($allCourses as $c): ?>
            <option value="<?= $c['id'] ?>"><?= $c['title'] ?></option>
        <?php endforeach; ?>
    </select>
    
    <button type="submit" name="add_enrollment" class="btn btn-success">Enroll</button>
</form>