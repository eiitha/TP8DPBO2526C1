<div class="col-lg-6 m-auto">
  <form method="post" action="index.php?controller=courses&action=edit&id=<?= $course['id'] ?>">
    <div class="card shadow-sm">
      <div class="card-header bg-warning">
        <h4 class="text-dark text-center mb-0">Update Course</h4>
      </div>
      <div class="card-body">
        <input type="hidden" name="id" value="<?= htmlspecialchars($course['id']) ?>">
        <div class="mb-3">
          <label class="form-label">COURSE CODE:</label>
          <input type="text" name="code" value="<?= htmlspecialchars($course['code']) ?>" class="form-control" required>
        </div>
        <div class="mb-3">
          <label class="form-label">COURSE NAME:</label>
          <input type="text" name="course_name" value="<?= htmlspecialchars($course['course_name']) ?>" class="form-control" required>
        </div>
        <div class="mb-3">
          <label class="form-label">CREDITS (SKS):</label>
          <input type="number" name="credits" min="1" max="6" value="<?= htmlspecialchars($course['credits']) ?>" class="form-control" required>
        </div>
        <div class="mb-3">
          <label class="form-label">SEMESTER:</label>
          <input type="number" name="semester" min="1" max="8" value="<?= htmlspecialchars($course['semester']) ?>" class="form-control" required>
        </div>
        <div class="mb-3">
          <label class="form-label">LECTURER (Dosen Pengampu):</label>
          <select name="lecturer_id" class="form-select">
            <option value="">-- Pilih Dosen Pengampu --</option>
            <?php foreach ($lecturers as $lec): ?>
              <option value="<?= $lec['id'] ?>" <?= ($course['lecturer_id'] == $lec['id']) ? 'selected' : '' ?>>
                <?= htmlspecialchars($lec['name']) ?> (<?= htmlspecialchars($lec['nidn']) ?>)
              </option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="d-grid gap-2">
          <button class="btn btn-success" type="submit" name="submit">Update</button>
          <a class="btn btn-secondary" href="index.php?controller=courses&action=index">Cancel</a>
        </div>
      </div>
    </div>
  </form>
</div>
