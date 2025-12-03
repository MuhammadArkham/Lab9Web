<?php
session_destroy(); // Hapus sesi
// Redirect kembali ke login
echo "<script>alert('Anda telah logout'); window.location.href='index.php?page=auth/login';</script>";
?>