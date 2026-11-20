<?php
require_once __DIR__ . '/../config/database.php';

class Course
{
    private mysqli $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    public function getAll(): array
    {
        $sql = "SELECT courses.*, lecturers.name AS lecturer_name, lecturers.nidn AS lecturer_nidn
                FROM courses
                LEFT JOIN lecturers ON courses.lecturer_id = lecturers.id
                ORDER BY courses.id ASC";
        $result = $this->db->query($sql);
        $data = [];
        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
        return $data;
    }

    public function getById(int $id): ?array
    {
        $stmt = $this->db->prepare("SELECT * FROM courses WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $res = $stmt->get_result();
        $row = $res->fetch_assoc();
        $stmt->close();
        return $row ?: null;
    }

    public function create(string $code, string $course_name, int $credits, int $semester, ?int $lecturer_id): bool
    {
        $stmt = $this->db->prepare("INSERT INTO courses (code, course_name, credits, semester, lecturer_id) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("ssiii", $code, $course_name, $credits, $semester, $lecturer_id);
        $ok = $stmt->execute();
        $stmt->close();
        return $ok;
    }

    public function update(int $id, string $code, string $course_name, int $credits, int $semester, ?int $lecturer_id): bool
    {
        $stmt = $this->db->prepare("UPDATE courses SET code = ?, course_name = ?, credits = ?, semester = ?, lecturer_id = ? WHERE id = ?");
        $stmt->bind_param("ssiiii", $code, $course_name, $credits, $semester, $lecturer_id, $id);
        $ok = $stmt->execute();
        $stmt->close();
        return $ok;
    }

    public function delete(int $id): bool
    {
        $stmt = $this->db->prepare("DELETE FROM courses WHERE id = ?");
        $stmt->bind_param("i", $id);
        $ok = $stmt->execute();
        $stmt->close();
        return $ok;
    }
}
