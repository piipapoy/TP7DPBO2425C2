<?php
$id = $_GET['id'] ?? null;
$instData = $id ? $instructor->getById($id) : null;
$action = $id ? 'edit_instructor' : 'add_instructor';
$title = $id ? 'Edit Instruktur' : 'Add New Instruktur';
?>

<h3><?= $title ?></h3>
<form method="POST">
    <?php if ($id): ?>
        <input type="hidden" name="id" value="<?= $id ?>">
    <?php endif; ?>
    
    <label>Name:</label>
    <input type="text" name="name" value="<?= $instData['name'] ?? '' ?>" required>

    <label>Email:</label>
    <input type="email" name="email" value="<?= $instData['email'] ?? '' ?>" required>
    
    <label>Expertise:</label>
    <input type="text" name="expertise" value="<?= $instData['expertise'] ?? '' ?>">

    <button type="submit" name="<?= $action ?>" class="btn btn-success">Save</button>
    <a href="?page=instructors" class="btn btn-danger">Cancel</a>
</form>