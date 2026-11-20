-- Database: `db_tp8`
CREATE DATABASE IF NOT EXISTS `db_tp8` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `db_tp8`;

SET FOREIGN_KEY_CHECKS = 0;
DROP TABLE IF EXISTS `schedules`;
DROP TABLE IF EXISTS `courses`;
DROP TABLE IF EXISTS `lecturers`;
SET FOREIGN_KEY_CHECKS = 1;

-- --------------------------------------------------------
-- Tabel utama dari kode awal (ditambah atribut expertise)
-- --------------------------------------------------------
CREATE TABLE `lecturers` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(100) NOT NULL,
  `nidn` VARCHAR(20) NOT NULL UNIQUE,
  `phone` VARCHAR(20) NOT NULL,
  `join_date` DATE NOT NULL,
  `expertise` VARCHAR(100) NOT NULL DEFAULT 'Ilmu Komputer',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `lecturers` (`id`, `name`, `nidn`, `phone`, `join_date`, `expertise`) VALUES
(1, 'Dr. Rosa Ariani Sukamto, M.T.', '0015088201', '081223344556', '2010-09-01', 'Rekayasa Perangkat Lunak'),
(2, 'Eddy Prasetyo Nugroho, M.T.', '0021047902', '081334455667', '2008-03-15', 'Jaringan Komputer & Sistem Operasi'),
(3, 'Herbert Siregar, M.T.', '0010117503', '081445566778', '2006-08-20', 'Basis Data & Sistem Informasi');

-- --------------------------------------------------------
-- Tabel relasi 1: courses (berelasi dengan lecturers)
-- --------------------------------------------------------
CREATE TABLE `courses` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `code` VARCHAR(15) NOT NULL UNIQUE,
  `course_name` VARCHAR(100) NOT NULL,
  `credits` TINYINT(2) NOT NULL DEFAULT 3,
  `semester` TINYINT(2) NOT NULL DEFAULT 1,
  `lecturer_id` INT(11) NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_courses_lecturer` FOREIGN KEY (`lecturer_id`) REFERENCES `lecturers`(`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `courses` (`id`, `code`, `course_name`, `credits`, `semester`, `lecturer_id`) VALUES
(1, 'IK204', 'Desain dan Pemrograman Berbasis Objek', 3, 4, 1),
(2, 'IK206', 'Sistem Operasi', 3, 4, 2),
(3, 'IK208', 'Sistem Basis Data', 3, 4, 3);

-- --------------------------------------------------------
-- Tabel relasi 2: schedules (berelasi dengan courses)
-- --------------------------------------------------------
CREATE TABLE `schedules` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `course_id` INT(11) NOT NULL,
  `day_of_week` ENUM('Senin','Selasa','Rabu','Kamis','Jumat','Sabtu') NOT NULL,
  `start_time` TIME NOT NULL,
  `end_time` TIME NOT NULL,
  `room` VARCHAR(50) NOT NULL,
  `class_group` VARCHAR(20) NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_schedules_course` FOREIGN KEY (`course_id`) REFERENCES `courses`(`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `schedules` (`id`, `course_id`, `day_of_week`, `start_time`, `end_time`, `room`, `class_group`) VALUES
(1, 1, 'Senin', '07:00:00', '09:30:00', 'C-201', 'C1'),
(2, 2, 'Rabu', '09:30:00', '12:00:00', 'Lab Kom 2', 'C1'),
(3, 3, 'Kamis', '13:00:00', '15:30:00', 'C-305', 'C1');
