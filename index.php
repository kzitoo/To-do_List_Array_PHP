<?php
session_start();

// Pastikan session 'tugas' sudah diinisialisasi
if (!isset($_SESSION['tugas'])) {
    $_SESSION['tugas'] = [];
}

include 'functions.php';  // Include file functions.php untuk digunakan


include 'urutkan.php'; // Include file urutkan.php untuk ditampilkan
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-do List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" />
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <div class="container mt-5">
        <div class="card">
            <div class="text-center">
                <!-- Form untuk input tugas dengan row dan col -->
                <form method="POST" action="tambah_tugas.php">
                    <div class="row m-3">
                        <div class="col-md-6">
                            <label for="nama" class="form-label">Nama Tugas:</label>
                            <input type="text" id="nama" name="nama" class="form-control" required autocomplete="off">
                        </div>

                        <div class="col-md-2">
                            <label for="prioritas" class="form-label">Prioritas:</label>
                            <select name="prioritas" id="prioritas" class="form-select" required>
                                <option value="" hidden disabled selected>Pilih Prioritas</option>
                                <option value="Tinggi">Tinggi</option>
                                <option value="Sedang">Sedang</option>
                                <option value="Rendah">Rendah</option>
                            </select>


                        </div>

                        <div class="col-md-2">
                            <label for="tenggat" class="form-label">Tenggat:</label>
                            <input type="date" id="tenggat" name="tenggat" class="form-control" required>
                        </div>

                        <div class="col-md-2 d-flex align-items-end">
                            <button type="submit" class="btn btn-primary w-100">Tambah</button>
                        </div>
                    </div>
                </form>


                <!-- Tabel untuk menampilkan tugas -->
                <table class="table mt-4">
                    <thead>
                        <tr>
                            <td></td>
                            <td>Nama Tugas</td>
                            <td>Prioritas</td>
                            <td>Tenggat</td>
                            <td>Aksi</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($_SESSION['tugas'] as $index => $task) {
                            $tenggat = date('d-m-Y', strtotime($task['tenggat']));
                            $badge = checkStatus($task['tenggat'], $task['status']);  // Cek tenggat dan dapatkan badge
                        
                            echo "<tr>";

                            echo "<td class='check'>
                                    <form action='selesai_tugas.php' method='POST'>
                                    <input type='hidden' name='index' value='" . $index . "'> 
                                    <input class='form-check-input border-secondary' type='checkbox' name='status' value='selesai' 
                                    " . ($_SESSION['tugas'][$index]['status'] == 'selesai' ? 'checked' : '') . "
                                    onclick='this.form.submit()'>
                                    </form>
                                 </td>";

                            // Jika status selesai, maka tambahkan class text-decoration-line-through dan text-success
                            // Menampilkan nama tugas
                            $status = $task['status'];
                            if ($status == "selesai") {
                                echo "<td class='text-decoration-line-through text-success' >" . $task['nama'] . " " . $badge . "</td>";
                            } else {
                                echo "<td>" . $task['nama'] . " " . $badge . "</td>";
                            }

                            //menampilkan prioritas tugas
                            $prioritas = $task['prioritas'];
                            if ($prioritas == "Tinggi") {
                                echo "<td class='prioritas bg-danger text-white'>" . $prioritas . "</td>";
                            } elseif ($prioritas == "Sedang") {
                                echo "<td class='prioritas bg-warning text-white'>" . $prioritas . "</td>";
                            } else {
                                echo "<td class='prioritas bg-info text-white'>" . $prioritas . "</td>";
                            } // Menampilkan prioritas tugas
                        
                            echo "<td class='tenggat' >" . $tenggat . "</td>";  // Menampilkan tenggat tugas
                        
                            echo "<td class='aksi'>
                                      <a onclick='confirmDelete($index)' class='btnAksi btn btn-danger'>Hapus</a>
                                      <a href='?edit=$index' class='btnAksi btn btn-warning'>Edit</a>
                                  </td>"; // Menampilkan aksi tugas
                        
                            include 'edit_tugas.php'; // Include file edit_tugas.php untuk ditampilkan
                        
                            echo "</tr>";
                        }
                        ?>

                    </tbody>

                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <?php
    include 'alert.php';  // Include file alert.php untuk ditampilkan
    ?>
</body>



</html>