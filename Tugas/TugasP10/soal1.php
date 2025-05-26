<?php
$jumlah_roda = 4; // Ganti sesuai input

switch ($jumlah_roda) {
    case 2:
        echo "Kendaraan: Motor";
        break;
    case 3:
        echo "Kendaraan: Bajaj";
        break;
    case 4:
        echo "Kendaraan: Mobil";
        break;
    case 6:
    case 8:
        echo "Kendaraan: Truk";
        break;
    default:
        echo "Kendaraan tidak diketahui";
}
?>
