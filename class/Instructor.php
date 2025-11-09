<?php
require_once 'config/db.php';

class Instructor {
    private $db;

    public function __construct() {
        $this->db = (new Database())->conn;
    }

    // [R]ead - Mengambil semua instruktur
    public function getAll() {
        $stmt = $this->db->prepare("SELECT * FROM instructors ORDER BY id DESC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    // [R]ead - Mengambil satu instruktur berdasarkan ID
    public function getById($id) {
        $stmt = $this->db->prepare("SELECT * FROM instructors WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // [C]reate - Menambahkan instruktur baru
    public function create($name, $email, $expertise) {
        $stmt = $this->db->prepare("INSERT INTO instructors (name, email, expertise) VALUES (?, ?, ?)");
        return $stmt->execute([$name, $email, $expertise]);
    }

    // [U]pdate - Memperbarui data instruktur
    public function update($id, $name, $email, $expertise) {
        $stmt = $this->db->prepare("UPDATE instructors SET name = ?, email = ?, expertise = ? WHERE id = ?");
        return $stmt->execute([$name, $email, $expertise, $id]);
    }

    // [D]elete - Menghapus instruktur
    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM instructors WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
?>