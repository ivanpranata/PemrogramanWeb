   <?php
      $Nama_Barang = "Keyboard";
      $Jumlah_Beli = 2;
      define("Pajak", 0.1 );

   
      $harga = [150000,20000];
      $total_bayar_sebelum_pajak = $harga[0]*$Jumlah_Beli;
      $total_pajak = $total_bayar_sebelum_pajak*Pajak;
      $total_bayar = $total_bayar_sebelum_pajak + $total_pajak;
   ?>


<!DOCTYPE html>
<html lang="en"> 
<title>Perhitungan Total Pembelian</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 30px;
        }
        .kotak {
            border: 1px solid #000;
            padding: 20px;
            width: fit-content;
        }
        hr {
            border: 1px solid #000;
        }
        strong {
            font-weight: bold;
        }
    </style>
</head>
<body>
   <div class="kotak">
        <h3>Perhitungan Total Pembelian (Dengan Array)</h3>
        <hr>
        <p>Nama Barang: <?= $Nama_Barang; ?></p>
        <p>Harga Satuan: Rp <?= number_format($harga[0]); ?></p>
        <p>Jumlah Beli: <?= $Jumlah_Beli; ?></p>
        <p>Total Harga (Sebelum Pajak): Rp <?= number_format($total_bayar_sebelum_pajak); ?></p>
        <p>Pajak (10%): Rp <?= number_format($total_pajak); ?></p>
        <p><strong>Total Bayar: Rp <?= number_format($total_bayar); ?></strong></p>
    </div>

</body>





 