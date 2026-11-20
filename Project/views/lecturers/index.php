<div class="d-flex justify-content-between align-items-center mb-3">
  <h3 class="mb-0">Data Dosen (Lecturers)</h3>
  <a class="btn btn-primary" href="index.php?controller=lecturers&action=create">+ Add New Lecturer</a>
</div>

<div class="card shadow-sm">
  <div class="card-body table-responsive">
    <table class="table table-hover align-middle mb-0">
      <thead class="table-dark">
        <tr>
          <th>ID</th>
          <th>NAME</th>
          <th>NIDN</th>
          <th>PHONE</th>
          <th>EXPERTISE</th>
          <th>JOIN DATE</th>
          <th class="text-center">ACTIONS</th>
        </tr>
      </thead>
      <tbody>
        <?php if (empty($lecturers)): ?>
          <tr><td colspan="7" class="text-center text-muted py-4">Belum ada data dosen.</td></tr>
        <?php else: ?>
          <?php foreach ($lecturers as $row): ?>
            <tr>
              <th><?= htmlspecialchars($row['id']) ?></th>
              <td><?= htmlspecialchars($row['name']) ?></td>
              <td><?= htmlspecialchars($row['nidn']) ?></td>
              <td><?= htmlspecialchars($row['phone']) ?></td>
              <td><?= htmlspecialchars($row['expertise']) ?></td>
              <td><?= htmlspecialchars($row['join_date']) ?></td>
              <td class="text-center">
                <a class="btn btn-sm btn-success" href="index.php?controller=lecturers&action=edit&id=<?= $row['id'] ?>">Edit</a>
                <a class="btn btn-sm btn-danger" href="index.php?controller=lecturers&action=delete&id=<?= $row['id'] ?>" onclick="return confirm('Yakin ingin menghapus dosen ini?')">Delete</a>
              </td>
            </tr>
          <?php endforeach; ?>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</div>
