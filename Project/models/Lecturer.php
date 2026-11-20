<?php
require_once __DIR__ . '/../config/database.php';

class Lecturer
{
    private mysqli $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    public function getAll(): array
    {
        $sql = "SELECT * FROM lecturers ORDER BY id ASC";
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
        $stmt = $this->db->prepare("SELECT * FROM lecturers WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $res = $stmt->get_result();
        $row = $res->fetch_assoc();
        $stmt->close();
        return $row ?: null;
    }

    public function create(string $name, string $nidn, string $phone, string $join_date, string $expertise): bool
    {
        $stmt = $this->db->prepare("INSERT INTO lecturers (name, nidn, phone, join_date, expertise) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $name, $nidn, $phone, $join_date, $expertise);
        $ok = $stmt->execute();
        $stmt->close();
        return $ok;
    }

    public function update(int $id, string $name, string $nidn, string $phone, string $join_date, string $expertise): bool
    {
        $stmt = $this->db->prepare("UPDATE lecturers SET name = ?, nidn = ?, phone = ?, join_date = ?, expertise = ? WHERE id = ?");
        $stmt->bind_param("sssssi", $name, $nidn, $phone, $join_date, $expertise, $id);
        $ok = $stmt->execute();
        $stmt->close();
        return $ok;
    }

    public function delete(int $id): bool
    {
        $stmt = $this->db->prepare("DELETE FROM lecturers WHERE id = ?");
        $stmt->bind_param("i", $id);
        $ok = $stmt->execute();
        $stmt->close();
        return $ok;
    }
}
