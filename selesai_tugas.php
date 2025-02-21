<?php
session_start();

// Mengambil id dari POST
$id = $_POST['index'];

// Mengecek apakah checkbox dicentang atau tidak
if ($_POST['status'] == 'selesai') {
    $_SESSION['tugas'][$id]['status'] = 'selesai';
    $_SESSION['successMessage'] = 'Tugas Telah Selesai';// Set pesan sukses ke session
} else {
    $_SESSION['tugas'][$id]['status'] = 'belum selesai';
}


// Kembalikan ke halaman index.php setelah data diubah
header("Location: index.php");
exit();
?>