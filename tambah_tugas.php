<?php
session_start();
$tugas = [];
// Cek apakah form sudah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form input
    $nama = $_POST['nama'];
    $prioritas = $_POST['prioritas'];
    $tenggat = $_POST['tenggat'];

    // Tambahkan data tugas ke dalam array session
    array_push($_SESSION['tugas'], [
        'nama' => $nama,
        'prioritas' => $prioritas,
        'tenggat' => $tenggat,
        'status' => 'belum selesai'
    ]);
    $_SESSION['successMessage'] = 'Tugas Berhasil Ditambahkan';// Set pesan sukses ke session
}
// Arahkan kembali ke halaman index.php setelah data ditambahkan
header("Location: index.php");
exit();
