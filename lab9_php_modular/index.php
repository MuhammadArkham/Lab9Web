<?php
session_start(); // Mulai sesi
include("config/database.php");

$page = isset($_GET['page']) ? $_GET['page'] : 'home';

// --- LOGIKA PAKSA LOGIN ---
// Jika session 'is_logged_in' belum ada, DAN halaman yang diakses BUKAN login
if (!isset($_SESSION['is_logged_in']) && $page != 'auth/login') {
    // Redirect paksa ke halaman login
    header("Location: index.php?page=auth/login");
    exit;
}

include("views/header.php");

switch ($page) {
    case 'home':
        include("views/dashboard.php");
        break;
    case 'user/list':
        include("modules/user/list.php");
        break;
    case 'user/add':
        include("modules/user/add.php");
        break;
    case 'user/edit':
        include("modules/user/edit.php");
        break;
    case 'user/delete':
        include("modules/user/delete.php");
        break;
    case 'auth/login':
        include("modules/auth/login.php");
        break;
    case 'auth/logout':
        include("modules/auth/logout.php");
        break;
    default:
        include("views/dashboard.php");
}

include("views/footer.php");
?>