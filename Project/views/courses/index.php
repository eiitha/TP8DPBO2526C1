<div class="d-flex justify-content-between align-items-center mb-3">
  <h3 class="mb-0">Data Mata Kuliah (Courses)</h3>
  <a class="btn btn-primary" href="index.php?controller=courses&action=create">+ Add New Course</a>
</div>

<div class="card shadow-sm">
  <div class="card-body table-responsive">
    <table class="table table-hover align-middle mb-0">
      <thead class="table-dark">
        <tr>
          <th>ID</th>
          <th>CODE</th>
          <th>COURSE NAME</th>
          <th>SKS (CREDITS)</th>
          <th>SEMESTER</th>
          <th>LECTURER</th>
          <th class="text-center">ACTIONS</th>
        </tr>
      </thead>
      <tbody>
        <?php if (empty($courses)): ?>
          <tr><td colspan="7" class="text-center text-muted py-4">Belum ada data mata kuliah.</td></tr>
        <?php else: ?>
          <?php foreach ($courses as $row): ?>
            <tr>
              <th><?= htmlspecialchars($row['id']) ?></th>
              <td><span class="badge bg-secondary"><?= htmlspecialchars($row['code']) ?></span></td>
              <td><?= htmlspecialchars($row['course_name']) ?></td>
              <td><?= htmlspecialchars($row['credits']) ?> SKS</td>
              <td>Semester <?= htmlspecialchars($row['semester']) ?></td>
              <td><?= htmlspecialchars($row['lecturer_name'] ?? 'Belum ditentukan') ?></td>
              <td class="text-center">
                <a class="btn btn-sm btn-success" href="index.php?controller=courses&action=edit&id=<?= $row['id'] ?>">Edit</a>
                <a class="btn btn-sm btn-danger" href="index.php?controller=courses&action=delete&id=<?= $row['id'] ?>" onclick="return confirm('Menghapus mata kuliah akan menghapus jadwal terkait. Lanjutkan?')">Delete</a>
              </td>
            </tr>
          <?php endforeach; ?>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</div>
