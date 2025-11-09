TP7DPBO2425C2

Saya M. Raffa Mizanul Insan dengan NIM 2409119 mengerjakan TP 7 dalam mata kuliah Desain Pemrograman Berorientasi Objek untuk keberkahan-Nya maka saya tidak akan melakukan kecurangan seperti yang telah di spesifikasikan Aamiin.

-----

## Dokumentasi

* Link Repository: https://github.com/piipapoy/TP7DPBO2425C2
* Demo Program (Screen Record CRUD): https://youtu.be/WNxqrUne8-Y

-----

## Desain dan Alur Program

Tema website ini adalah **Course Management System** (Sistem Manajemen Kursus), yang menerapkan konsep **OOP (Object-Oriented Programming)** dan **Separation of Concerns** (pemisahan tanggung jawab) berbasis **PHP Native** dan **MySQL (PDO)**.

Program ini dibagi menjadi beberapa direktori utama yang mewakili arsitektur Model-View-Controller (MVC) sederhana.

### Struktur Proyek

| Folder/File | Kategori MVC | Fungsi Utama |
| :--- | :--- | :--- |
| **class/** | **Model** | Berisi semua Class (Instruktur, Kursus, Pendaftaran) yang menangani logika bisnis dan interaksi database (CRUD). |
| **config/db.php** | **Model** | Menyimpan konfigurasi dan membuat koneksi PDO ke MySQL. |
| **view/** | **View** | Berisi template HTML modular (header.php, footer.php) dan tampilan daftar/form (instructors.php, courses.php, dll.). |
| **index.php** | **Controller** | Titik masuk (entry point). Menginisialisasi Model, menangani request POST/GET dari user, dan menentukan View mana yang akan dimuat. |

### Struktur Entitas Database

Program ini menggunakan 3 entitas (tabel) dengan 1 relasi Foreign Key yang wajib:

* **`instructors`**: Data dasar pengajar (ID, Nama, Email, Expertise). Target Relasi.
* **`courses`**: Data kursus (ID, Judul, Harga). Memiliki `instructor_id` (FK) ke `instructors`.
* **`enrollments`**: Data pendaftaran siswa. Memiliki `course_id` (FK) ke `courses`.

-----

## Implementasi Spesifikasi Wajib (OOP & CRUD)

Semua fungsionalitas wajib (CRUD lengkap dan Prepared Statement) diimplementasikan di dalam kelas Model PHP.

### 1. Kepatuhan OOP dan Prepared Statement

* **OOP Flow**: Setiap request dari View dikirim ke Controller (`index.php`), yang kemudian memanggil method di Model (`class/*.php`), Model berinteraksi dengan Database melalui koneksi PDO, dan hasil data dikirim kembali ke View.
* **Prepared Statement**: Semua query (SELECT, INSERT, UPDATE, DELETE) di dalam file **`Instructor.php`**, **`Course.php`**, dan **`Enrollment.php`** menggunakan sintaks `prepare()` dan `execute()` untuk memastikan keamanan data dari SQL Injection.

### 2. Implementasi Fitur CRUD

#### 1. Instruktur (`Instructors`)
* **Create**: Method `create()` di `Instructor.php` mengimplementasikan INSERT menggunakan Prepared Statement.
* **Update**: Method `update()` di `Instructor.php` memperbarui data Instruktur menggunakan ID sebagai kondisi WHERE.
* **Delete**: Method `delete()` menghapus Instruktur.

#### 2. Kursus (`Courses`)
* **Create**: Method `create()` menyisipkan data Kursus, termasuk memilih `instructor_id` (Foreign Key).
* **Read**: Method `getAll()` menggunakan **JOIN** query untuk menampilkan data kursus beserta **nama Instruktur** yang mengajar.
* **Update**: Method `update()` memungkinkan perubahan data kursus, termasuk mengganti instruktur.
* **Delete**: Menghapus Kursus.

#### 3. Pendaftaran (`Enrollments`)
* **Create**: Method `create()` mencatat pendaftaran siswa baru ke kursus.
* **Read**: Method `getAll()` menggunakan JOIN untuk menampilkan daftar pendaftaran beserta **judul kursus** yang diambil.
* **Delete**: Method `delete()` menghapus record pendaftaran siswa.
