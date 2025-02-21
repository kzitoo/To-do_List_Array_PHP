<?php
session_start();
// Mengambil id dari URL
$id = $_GET['index'];
unset($_SESSION['tugas'][$id]);

$_SESSION['tugas'] = array_values($_SESSION['tugas']);// Mengurutkan ulang index array

$_SESSION['successMessage'] = 'Tugas Telah Dihapus';//Set pesan sukses ke session

// Kembalikan ke halaman index.php setelah data dihapus
header("Location: index.php");
exit();
?>