<div class="col-lg-6 m-auto">
  <form method="post" action="index.php?controller=lecturers&action=create">
    <div class="card shadow-sm">
      <div class="card-header bg-primary">
        <h4 class="text-white text-center mb-0">Create Lecturer</h4>
      </div>
      <div class="card-body">
        <div class="mb-3">
          <label class="form-label">NAME:</label>
          <input type="text" name="name" class="form-control" placeholder="Contoh: Dr. Budi Santoso, M.Kom." required>
        </div>
        <div class="mb-3">
          <label class="form-label">NIDN:</label>
          <input type="text" name="nidn" class="form-control" placeholder="Contoh: 0012048501" required>
        </div>
        <div class="mb-3">
          <label class="form-label">PHONE:</label>
          <input type="text" name="phone" class="form-control" placeholder="Contoh: 081234567890" required>
        </div>
        <div class="mb-3">
          <label class="form-label">EXPERTISE (Bidang Keahlian):</label>
          <input type="text" name="expertise" class="form-control" placeholder="Contoh: Rekayasa Perangkat Lunak" required>
        </div>
        <div class="mb-3">
          <label class="form-label">JOIN DATE:</label>
          <input type="date" name="join_date" class="form-control" required>
        </div>
        <div class="d-grid gap-2">
          <button class="btn btn-success" type="submit" name="submit">Submit</button>
          <a class="btn btn-secondary" href="index.php?controller=lecturers&action=index">Cancel</a>
        </div>
      </div>
    </div>
  </form>
</div>
