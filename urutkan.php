<?php
$priorityMap = [
    'Tinggi' => 3,    // prioritas tinggi
    'Sedang' => 2,    // prioritas sedang
    'Rendah' => 1     // prioritas rendah
];

//urutkan dari tinggi ke rendah
usort($_SESSION['tugas'], function ($a, $b) use ($priorityMap) {
    return $priorityMap[$b['prioritas']] - $priorityMap[$a['prioritas']];
});
?>