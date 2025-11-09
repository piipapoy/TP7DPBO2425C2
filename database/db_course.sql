-- Membuat Database
CREATE DATABASE IF NOT EXISTS course_management_db;
USE course_management_db;

-- 1. Tabel INSTRUCTORS
CREATE TABLE instructors (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    expertise VARCHAR(100)
);

-- 2. Tabel COURSES (Relasi ke INSTRUCTORS)
CREATE TABLE courses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    price DECIMAL(10, 2) NOT NULL,
    instructor_id INT NOT NULL,
    FOREIGN KEY (instructor_id) REFERENCES instructors(id) ON DELETE CASCADE
);

-- 3. Tabel ENROLLMENTS (Relasi ke COURSES)
CREATE TABLE enrollments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    student_name VARCHAR(100) NOT NULL,
    course_id INT NOT NULL,
    enrollment_date DATE NOT NULL,
    FOREIGN KEY (course_id) REFERENCES courses(id) ON DELETE CASCADE
);


-- Data Dummy
INSERT INTO instructors (name, email, expertise) VALUES
('Budi Santoso', 'budi.s@mail.com', 'PHP & MySQL'),
('Citra Dewi', 'citra.d@mail.com', 'UI/UX Design'),
('Arif Rachman', 'arif@mail.com', 'Digital Marketing');

INSERT INTO courses (title, description, price, instructor_id) VALUES
('Dasar Web Backend PHP OOP', 'Belajar PHP, OOP, dan database PDO.', 450000.00, 1),
('Figma: Desain Interaktif', 'Membuat prototype desain web dan aplikasi.', 300000.00, 2),
('Strategi Iklan Google Ads', 'Menguasai teknik beriklan di Google.', 500000.00, 3);

INSERT INTO enrollments (student_name, course_id, enrollment_date) VALUES
('Joko Widodo', 1, CURDATE()),
('Prabowo Subianto', 2, CURDATE()),
('Ganjar Pranowo', 3, CURDATE());