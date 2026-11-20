<div class="col-lg-6 m-auto">
  <form method="post" action="index.php?controller=schedules&action=create">
    <div class="card shadow-sm">
      <div class="card-header bg-primary">
        <h4 class="text-white text-center mb-0">Create Schedule</h4>
      </div>
      <div class="card-body">
        <div class="mb-3">
          <label class="form-label">COURSE (Mata Kuliah):</label>
          <select name="course_id" class="form-select" required>
            <option value="">-- Pilih Mata Kuliah --</option>
            <?php foreach ($courses as $c): ?>
              <option value="<?= $c['id'] ?>"><?= htmlspecialchars($c['code']) ?> - <?= htmlspecialchars($c['course_name']) ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="mb-3">
          <label class="form-label">DAY (Hari):</label>
          <select name="day_of_week" class="form-select" required>
            <?php foreach (['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'] as $day): ?>
              <option value="<?= $day ?>"><?= $day ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="row">
          <div class="col-md-6 mb-3">
            <label class="form-label">START TIME:</label>
            <input type="time" name="start_time" class="form-control" required>
          </div>
          <div class="col-md-6 mb-3">
            <label class="form-label">END TIME:</label>
            <input type="time" name="end_time" class="form-control" required>
          </div>
        </div>
        <div class="mb-3">
          <label class="form-label">ROOM (Ruangan):</label>
          <input type="text" name="room" class="form-control" placeholder="Contoh: Lab Kom 2 / C-201" required>
        </div>
        <div class="mb-3">
          <label class="form-label">CLASS GROUP (Kelas):</label>
          <input type="text" name="class_group" class="form-control" placeholder="Contoh: C1 / C2" required>
        </div>
        <div class="d-grid gap-2">
          <button class="btn btn-success" type="submit" name="submit">Submit</button>
          <a class="btn btn-secondary" href="index.php?controller=schedules&action=index">Cancel</a>
        </div>
      </div>
    </div>
  </form>
</div>
