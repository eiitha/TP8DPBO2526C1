<?php
// Front Controller / Router
$controllerName = $_GET['controller'] ?? 'lecturers';
$actionName     = $_GET['action'] ?? 'index';

switch ($controllerName) {
    case 'lecturers':
        require_once __DIR__ . '/controllers/LecturerController.php';
        $controller = new LecturerController();
        break;
    case 'courses':
        require_once __DIR__ . '/controllers/CourseController.php';
        $controller = new CourseController();
        break;
    case 'schedules':
        require_once __DIR__ . '/controllers/ScheduleController.php';
        $controller = new ScheduleController();
        break;
    default:
        require_once __DIR__ . '/controllers/LecturerController.php';
        $controller = new LecturerController();
        break;
}

if (method_exists($controller, $actionName)) {
    $controller->$actionName();
} else {
    $controller->index();
}
