<?php
// Fungsi untuk mengecek apakah tenggat sudah lewat dan mengembalikan badge
function checkStatus($tenggat, $status)
{
    $currentDate = new DateTime('today');  // Mengambil tanggal hari ini
    $dueDate = DateTime::createFromFormat('Y-m-d', $tenggat);// Mengubah tenggat dari string  menjadi objek DateTime

    // cek apakah status belum selesai
    if ($status == "belum selesai") {
        // Jika tenggat lebih kecil dari hari ini
        if ($dueDate < $currentDate) {
            return "<span class='badge bg-danger'>Terlambat</span>";  // Badge jika tenggat lewat
        }
    }


    return '';  // Tidak ada badge jika tenggat belum lewat
}
?>