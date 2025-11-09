<?php
// Autoloading atau manual require untuk semua Class Model
require_once 'class/Instructor.php';
require_once 'class/Course.php';
require_once 'class/Enrollment.php';

// Inisialisasi Objek Model
$instructor = new Instructor();
$course = new Course();
$enrollment = new Enrollment();

// --- LOGIKA CONTROLLER CRUD (POST/GET ACTIONS) ---

// Instruktur (Create, Update, Delete)
if (isset($_POST['add_instructor'])) {
    $instructor->create($_POST['name'], $_POST['email'], $_POST['expertise']);
    header("Location: index.php?page=instructors"); exit;
}
if (isset($_POST['edit_instructor'])) {
    $instructor->update($_POST['id'], $_POST['name'], $_POST['email'], $_POST['expertise']);
    header("Location: index.php?page=instructors"); exit;
}
if (isset($_GET['delete_instructor'])) {
    $instructor->delete($_GET['delete_instructor']);
    header("Location: index.php?page=instructors"); exit;
}

// Kursus (Create, Update, Delete)
if (isset($_POST['add_course'])) {
    $course->create($_POST['title'], $_POST['description'], $_POST['price'], $_POST['instructor_id']);
    header("Location: index.php?page=courses"); exit;
}
if (isset($_POST['edit_course'])) {
    $course->update($_POST['id'], $_POST['title'], $_POST['description'], $_POST['price'], $_POST['instructor_id']);
    header("Location: index.php?page=courses"); exit;
}
if (isset($_GET['delete_course'])) {
    $course->delete($_GET['delete_course']);
    header("Location: index.php?page=courses"); exit;
}

// Pendaftaran (Create, Delete)
if (isset($_POST['add_enrollment'])) {
    $enrollment->create($_POST['student_name'], $_POST['course_id']);
    header("Location: index.php?page=enrollments"); exit;
}
if (isset($_GET['delete_enrollment'])) {
    $enrollment->delete($_GET['delete_enrollment']);
    header("Location: index.php?page=enrollments"); exit;
}

// Ambil parameter halaman yang diminta user
$currentPage = $_GET['page'] ?? 'instructors';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Course Management System</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <?php include 'view/header.php'; ?>
        
        <nav>
            <ul>
                <li>
                    <a href="?page=instructors" class="<?= ($currentPage == 'instructors' || $currentPage == 'instructor_form') ? 'active' : '' ?>">
                        Instructors
                    </a>
                </li>
                <li>
                    <a href="?page=courses" class="<?= ($currentPage == 'courses' || $currentPage == 'course_form') ? 'active' : '' ?>">
                        Courses
                    </a>
                </li>
                <li>
                    <a href="?page=enrollments" class="<?= ($currentPage == 'enrollments') ? 'active' : '' ?>">
                        Enrollments
                    </a>
                </li>
            </ul>
        </nav>
        
        <div class="content-header">
            <h2>
                <?php
                // Menentukan judul dinamis berdasarkan halaman saat ini
                if ($currentPage == 'instructors' || $currentPage == 'instructor_form') {
                    echo "Instructor Management";
                } elseif ($currentPage == 'courses' || $currentPage == 'course_form') {
                    echo "Course Catalog";
                } elseif ($currentPage == 'enrollments') {
                    echo "Enrollment Records";
                } else {
                    echo "Dashboard";
                }
                ?>
            </h2>
        </div>
        
        <main>
            <?php
            // Logika Routing View
            if ($currentPage == 'instructors') {
                include 'view/instructors.php';
            } elseif ($currentPage == 'courses') {
                include 'view/courses.php';
            } elseif ($currentPage == 'enrollments') {
                include 'view/enrollments.php';
            } elseif ($currentPage == 'instructor_form') {
                include 'view/instructor_form.php';
            } elseif ($currentPage == 'course_form') {
                include 'view/course_form.php';
            }
            ?>
        </main>
        
        <?php include 'view/footer.php'; ?>
    </div>
</body>
</html>