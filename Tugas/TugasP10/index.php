<!DOCTYPE html>
<html>
<head>
    <title>Latihan Switch PHP</title>
</head>
<body>
    <h1>Menu Soal</h1>
    <ul>
        <li><a href="?soal=1">Soal 1: Jenis Kendaraan</a></li>
        <li><a href="?soal=2">Soal 2: Bilangan Genap</a></li>
        <li><a href="?soal=3">Soal 3: Daftar Hewan</a></li>
        <li><a href="?soal=4">Soal 4: Genap atau Ganjil</a></li>
    </ul>

    <hr>

    <?php
    if (isset($_GET['soal'])) {
        $soal = $_GET['soal'];
        switch ($soal) {
            case '1':
                include 'soal1.php';
                break;
            case '2':
                include 'soal2.php';
                break;
            case '3':
                include 'soal3.php';
                break;
            case '4':
                include 'soal4.php';
                break;
            default:
                echo "Soal tidak ditemukan.";
        }
    }
    ?>
</body>
</html>
