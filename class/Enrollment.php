<?php
require_once 'config/db.php';

class Enrollment {
    private $db;

    public function __construct() {
        $this->db = (new Database())->conn;
    }

    // [R]ead - Mengambil semua pendaftaran
    public function getAll() {
        $stmt = $this->db->prepare("SELECT e.*, c.title AS course_title
                                  FROM enrollments e 
                                  JOIN courses c ON e.course_id = c.id
                                  ORDER BY e.id DESC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    // [R]ead - Mengambil satu pendaftaran berdasarkan ID
    public function getById($id) {
        $stmt = $this->db->prepare("SELECT * FROM enrollments WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // [C]reate - Menambahkan pendaftaran baru
    public function create($student_name, $course_id) {
        $stmt = $this->db->prepare("INSERT INTO enrollments (student_name, course_id, enrollment_date) VALUES (?, ?, CURDATE())");
        return $stmt->execute([$student_name, $course_id]);
    }

    // [U]pdate - Memperbarui data pendaftaran (misal nama siswa)
    public function update($id, $student_name, $course_id) {
        $stmt = $this->db->prepare("UPDATE enrollments SET student_name = ?, course_id = ? WHERE id = ?");
        return $stmt->execute([$student_name, $course_id, $id]);
    }

    // [D]elete - Menghapus pendaftaran
    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM enrollments WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
?>