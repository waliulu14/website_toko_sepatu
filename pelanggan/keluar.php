<?php
// Mulai sesi
session_start();

// Hapus semua data sesi
session_unset();

// Hancurkan sesi
session_destroy();

// Alihkan pengguna ke halaman login atau halaman lain yang diinginkan setelah logout
header("Location: ../index.php");
exit;
?>
