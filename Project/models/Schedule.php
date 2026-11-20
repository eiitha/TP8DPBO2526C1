<?php
require_once __DIR__ . '/../config/database.php';

class Schedule
{
    private mysqli $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    public function getAll(): array
    {
        $sql = "SELECT schedules.*, 
                       courses.code AS course_code, 
                       courses.course_name AS course_name,
                       lecturers.name AS lecturer_name
                FROM schedules
                INNER JOIN courses ON schedules.course_id = courses.id
                LEFT JOIN lecturers ON courses.lecturer_id = lecturers.id
                ORDER BY FIELD(schedules.day_of_week, 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'), schedules.start_time ASC";
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
        $stmt = $this->db->prepare("SELECT * FROM schedules WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $res = $stmt->get_result();
        $row = $res->fetch_assoc();
        $stmt->close();
        return $row ?: null;
    }

    public function create(int $course_id, string $day_of_week, string $start_time, string $end_time, string $room, string $class_group): bool
    {
        $stmt = $this->db->prepare("INSERT INTO schedules (course_id, day_of_week, start_time, end_time, room, class_group) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("isssss", $course_id, $day_of_week, $start_time, $end_time, $room, $class_group);
        $ok = $stmt->execute();
        $stmt->close();
        return $ok;
    }

    public function update(int $id, int $course_id, string $day_of_week, string $start_time, string $end_time, string $room, string $class_group): bool
    {
        $stmt = $this->db->prepare("UPDATE schedules SET course_id = ?, day_of_week = ?, start_time = ?, end_time = ?, room = ?, class_group = ? WHERE id = ?");
        $stmt->bind_param("isssssi", $course_id, $day_of_week, $start_time, $end_time, $room, $class_group, $id);
        $ok = $stmt->execute();
        $stmt->close();
        return $ok;
    }

    public function delete(int $id): bool
    {
        $stmt = $this->db->prepare("DELETE FROM schedules WHERE id = ?");
        $stmt->bind_param("i", $id);
        $ok = $stmt->execute();
        $stmt->close();
        return $ok;
    }
}
