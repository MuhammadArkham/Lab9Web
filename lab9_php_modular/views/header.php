<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Praktikum 9 - Modular</title>
    <link href="assets/css/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <div class="container">
        <header>
            <h1>Modularisasi Data Barang</h1>
        </header>
        <nav>
            <?php if (isset($_SESSION['is_logged_in'])): ?>
                <a href="index.php?page=home">Home</a>
                <a href="index.php?page=user/list">Data Barang</a>
                <a href="index.php?page=user/add">Tambah Data</a>
                <a href="index.php?page=auth/logout" style="background:#e74c3c;">Logout</a>
            <?php else: ?>
                <a href="index.php?page=auth/login">Login</a>
            <?php endif; ?>
        </nav>
        <div class="main">