<!doctype html>
<html lang="id">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="assets/css/bootstrap.min.css" rel="stylesheet">
  <title><?= htmlspecialchars($pageTitle ?? 'Sistem Akademik MVC') ?></title>
</head>

<body class="bg-light">
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
    <div class="container">
      <a class="navbar-brand fw-bold" href="index.php?controller=lecturers&action=index">SIAKAD MVC</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link <?= ($activeMenu ?? '') === 'lecturers' ? 'active fw-semibold' : '' ?>" href="index.php?controller=lecturers&action=index">Lecturers</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= ($activeMenu ?? '') === 'courses' ? 'active fw-semibold' : '' ?>" href="index.php?controller=courses&action=index">Courses</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= ($activeMenu ?? '') === 'schedules' ? 'active fw-semibold' : '' ?>" href="index.php?controller=schedules&action=index">Schedules</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container my-4">
    <?php if (isset($_GET['msg'])): ?>
      <?php
        $messages = [
            'created' => ['success', 'Data berhasil ditambahkan!'],
            'updated' => ['info', 'Data berhasil diperbarui!'],
            'deleted' => ['warning', 'Data berhasil dihapus!']
        ];
        $alert = $messages[$_GET['msg']] ?? null;
      ?>
      <?php if ($alert): ?>
        <div class="alert alert-<?= $alert[0] ?> alert-dismissible fade show" role="alert">
          <?= $alert[1] ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php endif; ?>
    <?php endif; ?>
