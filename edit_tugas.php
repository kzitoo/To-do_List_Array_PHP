<?php
// Memeriksa apakah ada parameter 'edit' di URL
if (isset($_GET['edit'])) {
    $index = $_GET['edit']; // Ambil nilai index dari URL
    $task = $_SESSION['tugas'][$index]; // Ambil data tugas sesuai dengan index
    $namaTugas = $task['nama']; // Ambil nama tugas untuk ditampilkan
    $prioritas = $task['prioritas']; // Ambil prioritas tugas
    $tenggat = $task['tenggat']; // Ambil tenggat tugas
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil index dari url
    $index = $_GET['edit'];
    // Ambil data dari form input
    $nama = $_POST['nama'];
    $prioritas = $_POST['prioritas'];
    $tenggat = $_POST['tenggat'];
    //ambil status dari session
    $status = $_SESSION['tugas'][$index]['status'];

    // update data tugas
    $_SESSION['tugas'][$index] = [
        'nama' => $nama,
        'prioritas' => $prioritas,
        'tenggat' => $tenggat,
        'status' => $status
    ];

    $_SESSION['successMessage'] = 'Tugas Berhasil Diubah';// Set pesan sukses ke session

    // Arahkan kembali ke halaman index.php setelah data diupdate
    header("Location: index.php");
    exit();
}

?>

<!-- Modal Edit -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Tugas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-start">
                <form action="" method="POST">
                    <!-- Nama Tugas -->
                    <label for="nama" class="form-label">Nama Tugas:</label>
                    <input type="text" id="nama" name="nama" class="form-control" required autocomplete="off"
                        value="<?php echo $namaTugas; ?>">

                    <!-- Prioritas -->
                    <label for="prioritas" class="form-label">Prioritas:</label>
                    <select id="prioritas" name="prioritas" class="form-select">
                        <option value="Tinggi" <?php echo ($prioritas == "Tinggi" ? "selected" : ""); ?>>Tinggi</option>
                        <option value="Sedang" <?php echo ($prioritas == "Sedang" ? "selected" : ""); ?>>Sedang</option>
                        <option value="Rendah" <?php echo ($prioritas == "Rendah" ? "selected" : ""); ?>>Rendah</option>
                    </select>

                    <!-- Tenggat -->
                    <label for="tenggat" class="form-label">Tenggat:</label>
                    <input type="date" id="tenggat" name="tenggat" class="form-control" value="<?php echo $tenggat; ?>">

                    <!-- Tombol Submit -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Script untuk Menampilkan Modal secara otomatis -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        if (window.location.href.indexOf("edit") > -1) {
            // Hapus semua .modal-backdrop yang ada
            var backdrops = document.querySelectorAll('.modal-backdrop');
            backdrops.forEach(function (backdrop) {
                backdrop.remove();
            });

            // Tampilkan modal
            var myModal = new bootstrap.Modal(document.getElementById('editModal'), {
            });
            myModal.show();

            // event listener jika modal ditutup
            document.getElementById('editModal').addEventListener('hidden.bs.modal', function () {
                // Arahkan pengguna ke halaman index
                window.location.href = 'index.php';
            });
        }
    });
</script>

<!-- Pastikan Anda telah menyertakan file Bootstrap JS dan CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>