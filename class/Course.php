<?php
require_once 'config/db.php';

class Course {
    private $db;

    public function __construct() {
        $this->db = (new Database())->conn;
    }

    // [R]ead - Mengambil semua kursus beserta nama instrukturnya
    public function getAll() {
        $stmt = $this->db->prepare("SELECT c.*, i.name AS instructor_name
                                  FROM courses c
                                  JOIN instructors i ON c.instructor_id = i.id
                                  ORDER BY c.id DESC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    // [R]ead - Mengambil satu kursus berdasarkan ID
    public function getById($id) {
        $stmt = $this->db->prepare("SELECT * FROM courses WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // [C]reate - Menambahkan kursus baru
    public function create($title, $description, $price, $instructor_id) {
        $stmt = $this->db->prepare("INSERT INTO courses (title, description, price, instructor_id) VALUES (?, ?, ?, ?)");
        return $stmt->execute([$title, $description, $price, $instructor_id]);
    }

    // [U]pdate - Memperbarui data kursus
    public function update($id, $title, $description, $price, $instructor_id) {
        $stmt = $this->db->prepare("UPDATE courses SET title = ?, description = ?, price = ?, instructor_id = ? WHERE id = ?");
        return $stmt->execute([$title, $description, $price, $instructor_id, $id]);
    }

    // [D]elete - Menghapus kursus
    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM courses WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
?>