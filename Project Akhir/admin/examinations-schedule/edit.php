<?php require_once('../../layouts/admin/header.php') ?>

<?php

if (!isset($_GET['examination_id']) && !isset($_POST['examination_id'])) {
  header('Location: ./index.php');
}

$examination = examination_show($_GET['examination_id']);

$standard_id = $examination->standard_id;
$today = date('Y-m-d');
$auditor_by_standards = query("SELECT auditor_id FROM auditor_qualifications WHERE standard_id=$standard_id AND expiration_date > $today");
$auditor_ids = array_map(function ($auditor) {
  return $auditor->auditor_id;
}, $auditor_by_standards);
$str_auditor_ids = implode(", ", $auditor_ids);

$auditors = query("SELECT * FROM auditors WHERE id IN ($str_auditor_ids)");

if (isset($_POST['examination_id'])) {
  if (!isset($_POST['auditors'])) {
    flash("Jadwal masih tidak ada!", "error");
    header("Location: ${$_SERVER['PHP_SELF']}?id={$_POST['examination_id']}");
  }
  $examination_id = $_GET['examination_id'];

  $examination_auditor_ids = array_map(function ($schedule) {
    return $schedule->examination_auditor_id;
  }, $examination->schedules);
  delete_bulk("examination_auditors", $examination_auditor_ids);
  store_bulk("examination_auditors", $_POST['auditors']);
  flash("Penjadwalan Examination berhasil diubah!", "success");
  header("Location: ../examinations/show.php?id=$examination_id");
}
?>

<section id="registration">
  <div class="card mb-3">
    <div class="card-header">
      <div class="d-flex align-items-center justify-content-between">
        <h3>Detail Singkat Examination</h3>
      </div>
    </div>
    <div class="card-body">
      <div class="row descriptions">
        <div class="col col-6">
          <div class="description-item">
            <div class="description-label">Nama Perusahaan</div>
            <div class="description-value"><?= $examination->company_name ?></div>
          </div>
        </div>
        <div class="col col-6">
          <div class="description-item">
            <div class="description-label">Registration Number</div>
            <div class="description-value"><?= $examination->registration_number ?></div>
          </div>
        </div>
        <div class="col col-6">
          <div class="description-item">
            <div class="description-label">Periode</div>
            <div class="description-value"><?= format_date($examination->examination_start_date, "d/m/Y") ?> ~ <?= format_date($examination->examination_end_date, "d/m/Y") ?></div>
          </div>
        </div>
        <div class="col col-6">
          <div class="description-item">
            <div class="description-label">Examination Number</div>
            <div class="description-value"><?= $examination->examination_number ?></div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header">
      <div class="d-flex align-items-center justify-content-between">
        <h3>Ubah Penjadwalan Examination</h3>
        <button id="add-schedule-btn" class="btn btn-outline-primary">
          <i class="fa-solid fa-user-plus"></i>
          <span>Tambah Jadwal</span>
        </button>
      </div>
    </div>
    <div class="card-body">
      <form class="form" action="" method="POST">
        <input type="hidden" name="examination_id" value="<?= $_GET['examination_id'] ?>">
        <div id="schedules-container">
          <?php foreach ($examination->schedules as $key => $schedule) : ?>
            <div class="schedule" id="schedule-<?= $key + 1 ?>">
              <div class="d-flex align-items-center justify-content-between">
                <h3 class="schedule-name">Jadwal <?= $key + 1 ?> </h3>
                <button class="btn btn-danger delete-schedule-btn" data-id=<?= $key + 1 ?>>
                  <span>Hapus</span>
                </button>
              </div>
              <input type="hidden" name="auditors[<?= $key ?>][examination_id]" value="<?= $_GET['examination_id'] ?>">
              <div class="form-control">
                <label for="">Standar</label>
                <div class="input-wrapper">
                  <select name="auditors[<?= $key ?>][auditor_id]" class="select2 w-100" required>
                    <?php foreach ($auditors as $auditor) : ?>
                      <option value="<?= $auditor->id ?>" <?= $schedule->auditor_id == $auditor->id ? 'selected' : '' ?>>
                        <?= $auditor->first_name ?> <?= $auditor->last_name ?>
                      </option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
              <div class="form-control">
                <label for="">Tanggal Mulai</label>
                <div class="input-wrapper">
                  <input type="date" class="w-100" name="auditors[<?= $key ?>][start_date]" required value="<?= $schedule->start_date ?>">
                </div>
              </div>
              <div class="form-control">
                <label for="">Tanggal Selesai</label>
                <div class="input-wrapper">
                  <input type="date" class="w-100" name="auditors[<?= $key ?>][end_date]" required value="<?= $schedule->end_date ?>">
                </div>
              </div>
              <div class="form-control">
                <label for="">Posisi</label>
                <div class="input-wrapper">
                  <input type="radio" name="auditors[<?= $key ?>][position]" value="1" id="position<?= $key + 1 ?>-1" class="m-2" <?= $schedule->position == 1 ? 'checked' : '' ?>>
                  <label for="position<?= $key + 1 ?>-1" class="cursor-pointer bg-info">Team Leader</label>
                  <input type="radio" name="auditors[<?= $key ?>][position]" value="2" id="position<?= $key + 1 ?>-2" class="m-2" <?= $schedule->position == 2 ? 'checked' : '' ?>>
                  <label for="position<?= $key + 1 ?>-2" class="cursor-pointer bg-info">Member</label>
                </div>
              </div>
            </div>
          <?php endforeach; ?>

        </div>
        <div class="text-right mt-3 pt-3">
          <button class="btn" type="submit">
            <span>Simpan</span>
          </button>
        </div>
      </form>
    </div>
  </div>
</section>
<?php require_once('../../layouts/admin/stacked_footer.php') ?>

<script>
  $(function() {
    let total_schedules = <?= count($examination->schedules) ?>;

    function renameSchedules() {
      $(".schedule-name").each(function(idx) {
        $(this).html(`Jadwal ${idx + 1}`)
      })
    }

    function createSchedule() {
      total_schedules++;
      const idx = total_schedules;
      const schedule = `<div class="schedule" id="schedule-${idx}">
        <div class="d-flex align-items-center justify-content-between">
          <h3 class="schedule-name">Jadwal ${total_schedules}</h3>
          <button class="btn btn-danger delete-schedule-btn" data-id=${idx}>
            <span>Hapus</span>
          </button>
        </div>
        <input type="hidden" name="auditors[${idx - 1}][examination_id]" value="<?= $_GET['examination_id'] ?>">
        <div class="form-control">
          <label for="">Standar</label>
          <div class="input-wrapper">
            <select name="auditors[${idx - 1}][auditor_id]" class="select2 w-100" required>
              <?php foreach ($auditors as $auditor) : ?>
                <option value="<?= $auditor->id ?>"><?= $auditor->first_name ?> <?= $auditor->last_name ?></option>
              <?php endforeach; ?>
            </select>
          </div>
        </div>
        <div class="form-control">
          <label for="">Tanggal Mulai</label>
          <div class="input-wrapper">
            <input type="date" class="w-100" name="auditors[${idx - 1}][start_date]" required>
          </div>
        </div>
        <div class="form-control">
          <label for="">Tanggal Selesai</label>
          <div class="input-wrapper">
            <input type="date" class="w-100" name="auditors[${idx - 1}][end_date]" required>
          </div>
        </div>
        <div class="form-control">
          <label for="">Posisi</label>
          <div class="input-wrapper">
            <input type="radio" name="auditors[${idx - 1}][position]" value="1" id="position${idx}-1" class="m-2">
            <label for="position${idx}-1" class="cursor-pointer bg-info">Team Leader</label>
            <input type="radio" name="auditors[${idx - 1}][position]" value="2" id="position${idx}-2" class="m-2">
            <label for="position${idx}-2" class="cursor-pointer bg-info">Member</label>
          </div>
        </div>
      </div>`
      $('#schedules-container').append(schedule)
      $('#schedules-container .select2').select2();
      renameSchedules();
    }

    $(document).on('click', '.delete-schedule-btn', function() {
      if (total_schedules != 1) {
        const id = $(this).data('id');
        $(`#schedule-${id}`).remove();
        total_schedules--;
        renameSchedules();
      } else {
        Swal.fire(
          'Jadwal Kosong!',
          'Examination harus memiliki setidkanya 1 penjadwalan',
          'error'
        )
      }
    })

    $(document).on('click', '#add-schedule-btn', function() {
      createSchedule();
    })
  })
</script>
</body>

</html>