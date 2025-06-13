<?php
session_start();        // Memulai sesi

session_unset();        // Menghapus semua variabel sesi
session_destroy();      // Mengakhiri sesi

// Redirect ke halaman login
header("Location: login.php");
exit;
?>
