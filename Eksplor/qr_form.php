<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "qr_mahasiswa";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
  die("Koneksi gagal: " . $conn->connect_error);
}

$showQR = false;
$qr_url = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nama = $_POST['nama'];
  $nim = $_POST['nim'];
  $usia = $_POST['usia'];

  $stmt = $conn->prepare("INSERT INTO mahasiswa (nama, nim, usia) VALUES (?, ?, ?)");
  $stmt->bind_param("ssi", $nama, $nim, $usia);
  $stmt->execute();
  $stmt->close();

  $qr_text = "Nama: $nama\nNIM: $nim\nUsia: $usia";
  $qr_url = "https://api.qrserver.com/v1/create-qr-code/?data=" . urlencode($qr_text) . "&size=250x250";
  $showQR = true;
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>QR Mahasiswa</title>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background: #f4f9f9;
      margin: 0;
      padding: 40px;
    }

    h2, h3 {
      color: #1f7a8c;
    }

    form {
      background: #ffffff;
      padding: 24px;
      border-radius: 12px;
      box-shadow: 0 6px 16px rgba(0,0,0,0.05);
      max-width: 500px;
      margin: 0 auto;
    }

    input, button {
      width: 100%;
      padding: 12px;
      margin-top: 10px;
      margin-bottom: 15px;
      border: 1px solid #ccc;
      border-radius: 8px;
      font-size: 16px;
    }

    button {
      background-color: #1f7a8c;
      color: white;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    button:hover {
      background-color: #16697a;
    }

    .center {
      text-align: center;
      margin-top: 30px;
    }

    .center img {
      border: 4px solid #1f7a8c44;
      border-radius: 8px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }

    #tabelData {
      display: none;
      margin-top: 40px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      background-color: white;
      border-radius: 8px;
      overflow: hidden;
      box-shadow: 0 2px 4px rgba(0,0,0,0.05);
    }

    th, td {
      padding: 12px 16px;
      text-align: left;
      border-bottom: 1px solid #eee;
    }

    th {
      background-color: #1f7a8c;
      color: white;
    }

    tr:hover {
      background-color: #f0f0f0;
    }

    .show-btn {
      text-align: center;
      margin-top: 40px;
    }
  </style>
</head>
<body>

  <h2 style="text-align:center;">Form Input Mahasiswa & QR Generator</h2>

  <form method="post">
    <input type="text" name="nama" placeholder="Nama" required>
    <input type="text" name="nim" placeholder="NIM" required>
    <input type="number" name="usia" placeholder="Usia" required>
    <button type="submit">Simpan & Buat QR</button>
  </form>

  <?php if ($showQR): ?>
    <div class="center">
      <h3>QR Code Mahasiswa</h3>
      <img src="<?= $qr_url ?>" alt="QR Mahasiswa">
    </div>
  <?php endif; ?>

  <div class="show-btn">
    <button id="lihatButton">Lihat Daftar Mahasiswa</button>
  </div>

  <div id="tabelData">
    <h3>Data Mahasiswa & QR</h3>
    <table>
      <tr><th>Nama</th><th>NIM</th><th>Usia</th><th>QR</th></tr>
      <?php
      $res = $conn->query("SELECT * FROM mahasiswa ORDER BY id DESC");
      while ($row = $res->fetch_assoc()) {
        $text = "Nama: {$row['nama']}\nNIM: {$row['nim']}\nUsia: {$row['usia']}";
        $url = "https://api.qrserver.com/v1/create-qr-code/?data=" . urlencode($text) . "&size=100x100";
        echo "<tr>
                <td>{$row['nama']}</td>
                <td>{$row['nim']}</td>
                <td>{$row['usia']}</td>
                <td><img src='$url'></td>
              </tr>";
      }
      ?>
    </table>
  </div>

  <script>
    document.addEventListener("DOMContentLoaded", function () {
      const btn = document.getElementById("lihatButton");
      const table = document.getElementById("tabelData");

      btn.addEventListener("click", function () {
        if (table.style.display === "none" || table.style.display === "") {
          table.style.display = "block";
          btn.innerText = "Sembunyikan Daftar Mahasiswa";
        } else {
          table.style.display = "none";
          btn.innerText = "Lihat Daftar Mahasiswa";
        }
      });
    });
  </script>

</body>
</html>
