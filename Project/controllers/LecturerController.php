<?php
require_once __DIR__ . '/../models/Lecturer.php';

class LecturerController
{
    private Lecturer $model;

    public function __construct()
    {
        $this->model = new Lecturer();
    }

    public function index(): void
    {
        $lecturers = $this->model->getAll();
        $pageTitle = "Daftar Dosen (Lecturers)";
        $activeMenu = "lecturers";
        require __DIR__ . '/../views/layouts/header.php';
        require __DIR__ . '/../views/lecturers/index.php';
        require __DIR__ . '/../views/layouts/footer.php';
    }

    public function create(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = trim($_POST['name'] ?? '');
            $nidn = trim($_POST['nidn'] ?? '');
            $phone = trim($_POST['phone'] ?? '');
            $join_date = trim($_POST['join_date'] ?? '');
            $expertise = trim($_POST['expertise'] ?? '');

            $this->model->create($name, $nidn, $phone, $join_date, $expertise);
            header("Location: index.php?controller=lecturers&action=index&msg=created");
            exit;
        }

        $pageTitle = "Tambah Dosen";
        $activeMenu = "lecturers";
        require __DIR__ . '/../views/layouts/header.php';
        require __DIR__ . '/../views/lecturers/create.php';
        require __DIR__ . '/../views/layouts/footer.php';
    }

    public function edit(): void
    {
        $id = isset($_GET['id']) ? (int)$_GET['id'] : (int)($_POST['id'] ?? 0);
        if ($id <= 0) {
            header("Location: index.php?controller=lecturers&action=index");
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = trim($_POST['name'] ?? '');
            $nidn = trim($_POST['nidn'] ?? '');
            $phone = trim($_POST['phone'] ?? '');
            $join_date = trim($_POST['join_date'] ?? '');
            $expertise = trim($_POST['expertise'] ?? '');

            $this->model->update($id, $name, $nidn, $phone, $join_date, $expertise);
            header("Location: index.php?controller=lecturers&action=index&msg=updated");
            exit;
        }

        $lecturer = $this->model->getById($id);
        if (!$lecturer) {
            header("Location: index.php?controller=lecturers&action=index");
            exit;
        }

        $pageTitle = "Edit Dosen";
        $activeMenu = "lecturers";
        require __DIR__ . '/../views/layouts/header.php';
        require __DIR__ . '/../views/lecturers/edit.php';
        require __DIR__ . '/../views/layouts/footer.php';
    }

    public function delete(): void
    {
        $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
        if ($id > 0) {
            $this->model->delete($id);
        }
        header("Location: index.php?controller=lecturers&action=index&msg=deleted");
        exit;
    }
}
