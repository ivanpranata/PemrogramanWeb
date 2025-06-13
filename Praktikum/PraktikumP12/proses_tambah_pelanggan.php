<?php
include 'koneksi.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   $Nama = $_POST['Nama'];
   $Alamat = $_POST['Alamat'];
   $Email = $_POST['Email'];
   $Telepon = $_POST['Telepon'];


   $stmt = $conn->prepare("INSERT INTO Pelanggan (Nama, Alamat, Email, Telepon) VALUES (?, ?, ?, ?)");
   $stmt->bind_param("sssi", $Nama, $Alamat, $Email, $Telepon);


   if ($stmt->execute()) {
       echo "<script>
           alert('Pelanggan berhasil ditambahkan!');
           window.location.href = 'tambah_pelanggan.php';
       </script>";
   } else {
       echo "<script>
           alert('Gagal menambahkan Pelanggan: " . addslashes($stmt->error) . "');
           window.location.href = 'tambah_pelanggan.php';
       </script>";
   }
}
?>