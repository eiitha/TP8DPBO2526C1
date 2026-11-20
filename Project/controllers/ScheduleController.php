<?php
require_once __DIR__ . '/../models/Schedule.php';
require_once __DIR__ . '/../models/Course.php';

class ScheduleController
{
    private Schedule $model;
    private Course $courseModel;

    public function __construct()
    {
        $this->model = new Schedule();
        $this->courseModel = new Course();
    }

    public function index(): void
    {
        $schedules = $this->model->getAll();
        $pageTitle = "Jadwal Perkuliahan (Schedules)";
        $activeMenu = "schedules";
        require __DIR__ . '/../views/layouts/header.php';
        require __DIR__ . '/../views/schedules/index.php';
        require __DIR__ . '/../views/layouts/footer.php';
    }

    public function create(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $course_id = (int)($_POST['course_id'] ?? 0);
            $day_of_week = trim($_POST['day_of_week'] ?? '');
            $start_time = trim($_POST['start_time'] ?? '');
            $end_time = trim($_POST['end_time'] ?? '');
            $room = trim($_POST['room'] ?? '');
            $class_group = trim($_POST['class_group'] ?? '');

            $this->model->create($course_id, $day_of_week, $start_time, $end_time, $room, $class_group);
            header("Location: index.php?controller=schedules&action=index&msg=created");
            exit;
        }

        $courses = $this->courseModel->getAll();
        $pageTitle = "Tambah Jadwal Kuliah";
        $activeMenu = "schedules";
        require __DIR__ . '/../views/layouts/header.php';
        require __DIR__ . '/../views/schedules/create.php';
        require __DIR__ . '/../views/layouts/footer.php';
    }

    public function edit(): void
    {
        $id = isset($_GET['id']) ? (int)$_GET['id'] : (int)($_POST['id'] ?? 0);
        if ($id <= 0) {
            header("Location: index.php?controller=schedules&action=index");
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $course_id = (int)($_POST['course_id'] ?? 0);
            $day_of_week = trim($_POST['day_of_week'] ?? '');
            $start_time = trim($_POST['start_time'] ?? '');
            $end_time = trim($_POST['end_time'] ?? '');
            $room = trim($_POST['room'] ?? '');
            $class_group = trim($_POST['class_group'] ?? '');

            $this->model->update($id, $course_id, $day_of_week, $start_time, $end_time, $room, $class_group);
            header("Location: index.php?controller=schedules&action=index&msg=updated");
            exit;
        }

        $schedule = $this->model->getById($id);
        if (!$schedule) {
            header("Location: index.php?controller=schedules&action=index");
            exit;
        }

        $courses = $this->courseModel->getAll();
        $pageTitle = "Edit Jadwal Kuliah";
        $activeMenu = "schedules";
        require __DIR__ . '/../views/layouts/header.php';
        require __DIR__ . '/../views/schedules/edit.php';
        require __DIR__ . '/../views/layouts/footer.php';
    }

    public function delete(): void
    {
        $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
        if ($id > 0) {
            $this->model->delete($id);
        }
        header("Location: index.php?controller=schedules&action=index&msg=deleted");
        exit;
    }
}
