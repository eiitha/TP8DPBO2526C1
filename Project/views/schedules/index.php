<div class="d-flex justify-content-between align-items-center mb-3">
  <h3 class="mb-0">Jadwal Perkuliahan (Schedules)</h3>
  <a class="btn btn-primary" href="index.php?controller=schedules&action=create">+ Add New Schedule</a>
</div>

<div class="card shadow-sm">
  <div class="card-body table-responsive">
    <table class="table table-hover align-middle mb-0">
      <thead class="table-dark">
        <tr>
          <th>ID</th>
          <th>DAY</th>
          <th>TIME</th>
          <th>COURSE</th>
          <th>CLASS</th>
          <th>ROOM</th>
          <th>LECTURER</th>
          <th class="text-center">ACTIONS</th>
        </tr>
      </thead>
      <tbody>
        <?php if (empty($schedules)): ?>
          <tr><td colspan="8" class="text-center text-muted py-4">Belum ada data jadwal kuliah.</td></tr>
        <?php else: ?>
          <?php foreach ($schedules as $row): ?>
            <tr>
              <th><?= htmlspecialchars($row['id']) ?></th>
              <td><span class="badge bg-info text-dark"><?= htmlspecialchars($row['day_of_week']) ?></span></td>
              <td><?= htmlspecialchars(substr($row['start_time'], 0, 5)) ?> - <?= htmlspecialchars(substr($row['end_time'], 0, 5)) ?></td>
              <td><strong><?= htmlspecialchars($row['course_code']) ?></strong> - <?= htmlspecialchars($row['course_name']) ?></td>
              <td><?= htmlspecialchars($row['class_group']) ?></td>
              <td><?= htmlspecialchars($row['room']) ?></td>
              <td><?= htmlspecialchars($row['lecturer_name'] ?? '-') ?></td>
              <td class="text-center">
                <a class="btn btn-sm btn-success" href="index.php?controller=schedules&action=edit&id=<?= $row['id'] ?>">Edit</a>
                <a class="btn btn-sm btn-danger" href="index.php?controller=schedules&action=delete&id=<?= $row['id'] ?>" onclick="return confirm('Yakin ingin menghapus jadwal ini?')">Delete</a>
              </td>
            </tr>
          <?php endforeach; ?>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</div>
