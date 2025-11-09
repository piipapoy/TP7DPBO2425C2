<?php
class Database {
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "course_management_db"; // Database baru
    public $conn;

    public function __construct() {
        try {
            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Koneksi gagal: " . $e->getMessage();
        }
    }
}
?>