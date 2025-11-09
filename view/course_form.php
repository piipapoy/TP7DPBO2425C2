<?php
$id = $_GET['id'] ?? null;
$courseData = $id ? $course->getById($id) : null;
$allInstructors = $instructor->getAll(); // Ambil data instruktur untuk dropdown
$action = $id ? 'edit_course' : 'add_course';
$title = $id ? 'Edit Course' : 'Add New Course';
?>

<h3><?= $title ?></h3>
<form method="POST">
    <?php if ($id): ?>
        <input type="hidden" name="id" value="<?= $id ?>">
    <?php endif; ?>
    
    <label>Title:</label>
    <input type="text" name="title" value="<?= $courseData['title'] ?? '' ?>" required>

    <label>Description:</label>
    <textarea name="description"><?= $courseData['description'] ?? '' ?></textarea>
    
    <label>Price (Rp):</label>
    <input type="number" name="price" step="any" value="<?= $courseData['price'] ?? '' ?>" required>
    
    <label>Instructor:</label>
    <select name="instructor_id" required>
        <option value="">-- Pilih Instruktur --</option>
        <?php foreach ($allInstructors as $i): ?>
            <option value="<?= $i['id'] ?>" 
                <?= (isset($courseData['instructor_id']) && $courseData['instructor_id'] == $i['id']) ? 'selected' : '' ?>>
                <?= $i['name'] ?>
            </option>
        <?php endforeach; ?>
    </select>

    <button type="submit" name="<?= $action ?>" class="btn btn-success">Save</button>
    <a href="?page=courses" class="btn btn-danger">Cancel</a>
</form>