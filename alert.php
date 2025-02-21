<?php
if (isset($_SESSION['successMessage'])) {
    $successMessage = $_SESSION['successMessage']; // Ambil pesan sukses dari session
    unset($_SESSION['successMessage']); // Hapus pesan setelah ditampilkan
}
?>

<script>
    <?php if (!empty($successMessage)) { ?> //cek apakah pesan tidak kosong
        Swal.fire({
            icon: 'success',
            title: '<?= $successMessage; ?>',
            allowOutsideClick: false,
            allowEscapeKey: false,
            showConfirmButton: true,
        });
    <?php } ?>

    function confirmDelete($index) {
        Swal.fire({
            icon: 'warning',
            title: 'Apa anda yakin ingin hapus data?',
            showDenyButton: true,
            confirmButtonText: 'Yes',
            denyButtonText: 'No',
            customClass: {
                actions: 'my-actions',
                confirmButton: 'order-1',
                denyButton: 'order-2',
            },
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = `hapus_tugas.php?index=${$index}`;
                Swal.fire('Data berhasil dihapus!', '', 'success')
            }
        })
    }
</script>