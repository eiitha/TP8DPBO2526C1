<?php
require_once __DIR__ . '/../models/Course.php';
require_once __DIR__ . '/../models/Lecturer.php';

class CourseController
{
    private Course $model;
    private Lecturer $lecturerModel;

    public function __construct()
    {
        $this->model = new Course();
        $this->lecturerModel = new Lecturer();
    }

    public function index(): void
    {
        $courses = $this->model->getAll();
        $pageTitle = "Daftar Mata Kuliah (Courses)";
        $activeMenu = "courses";
        require __DIR__ . '/../views/layouts/header.php';
        require __DIR__ . '/../views/courses/index.php';
        require __DIR__ . '/../views/layouts/footer.php';
    }

    public function create(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $code = trim($_POST['code'] ?? '');
            $course_name = trim($_POST['course_name'] ?? '');
            $credits = (int)($_POST['credits'] ?? 0);
            $semester = (int)($_POST['semester'] ?? 1);
            $lecturer_id = !empty($_POST['lecturer_id']) ? (int)$_POST['lecturer_id'] : null;

            $this->model->create($code, $course_name, $credits, $semester, $lecturer_id);
            header("Location: index.php?controller=courses&action=index&msg=created");
            exit;
        }

        $lecturers = $this->lecturerModel->getAll();
        $pageTitle = "Tambah Mata Kuliah";
        $activeMenu = "courses";
        require __DIR__ . '/../views/layouts/header.php';
        require __DIR__ . '/../views/courses/create.php';
        require __DIR__ . '/../views/layouts/footer.php';
    }

    public function edit(): void
    {
        $id = isset($_GET['id']) ? (int)$_GET['id'] : (int)($_POST['id'] ?? 0);
        if ($id <= 0) {
            header("Location: index.php?controller=courses&action=index");
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $code = trim($_POST['code'] ?? '');
            $course_name = trim($_POST['course_name'] ?? '');
            $credits = (int)($_POST['credits'] ?? 0);
            $semester = (int)($_POST['semester'] ?? 1);
            $lecturer_id = !empty($_POST['lecturer_id']) ? (int)$_POST['lecturer_id'] : null;

            $this->model->update($id, $code, $course_name, $credits, $semester, $lecturer_id);
            header("Location: index.php?controller=courses&action=index&msg=updated");
            exit;
        }

        $course = $this->model->getById($id);
        if (!$course) {
            header("Location: index.php?controller=courses&action=index");
            exit;
        }

        $lecturers = $this->lecturerModel->getAll();
        $pageTitle = "Edit Mata Kuliah";
        $activeMenu = "courses";
        require __DIR__ . '/../views/layouts/header.php';
        require __DIR__ . '/../views/courses/edit.php';
        require __DIR__ . '/../views/layouts/footer.php';
    }

    public function delete(): void
    {
        $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
        if ($id > 0) {
            $this->model->delete($id);
        }
        header("Location: index.php?controller=courses&action=index&msg=deleted");
        exit;
    }
}
