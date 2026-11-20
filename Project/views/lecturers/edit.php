<div class="col-lg-6 m-auto">
  <form method="post" action="index.php?controller=lecturers&action=edit&id=<?= $lecturer['id'] ?>">
    <div class="card shadow-sm">
      <div class="card-header bg-warning">
        <h4 class="text-dark text-center mb-0">Update Lecturer</h4>
      </div>
      <div class="card-body">
        <input type="hidden" name="id" value="<?= htmlspecialchars($lecturer['id']) ?>">
        <div class="mb-3">
          <label class="form-label">NAME:</label>
          <input type="text" name="name" value="<?= htmlspecialchars($lecturer['name']) ?>" class="form-control" required>
        </div>
        <div class="mb-3">
          <label class="form-label">NIDN:</label>
          <input type="text" name="nidn" value="<?= htmlspecialchars($lecturer['nidn']) ?>" class="form-control" required>
        </div>
        <div class="mb-3">
          <label class="form-label">PHONE:</label>
          <input type="text" name="phone" value="<?= htmlspecialchars($lecturer['phone']) ?>" class="form-control" required>
        </div>
        <div class="mb-3">
          <label class="form-label">EXPERTISE (Bidang Keahlian):</label>
          <input type="text" name="expertise" value="<?= htmlspecialchars($lecturer['expertise']) ?>" class="form-control" required>
        </div>
        <div class="mb-3">
          <label class="form-label">JOIN DATE:</label>
          <input type="date" name="join_date" value="<?= htmlspecialchars($lecturer['join_date']) ?>" class="form-control" required>
        </div>
        <div class="d-grid gap-2">
          <button class="btn btn-success" type="submit" name="submit">Update</button>
          <a class="btn btn-secondary" href="index.php?controller=lecturers&action=index">Cancel</a>
        </div>
      </div>
    </div>
  </form>
</div>
