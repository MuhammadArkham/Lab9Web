<?php
if (isset($_POST['submit'])) {
    // Dummy login: User = admin, Pass = admin
    // Di proyek nyata, cek ke database tabel user
    if ($_POST['username'] == 'admin' && $_POST['password'] == 'admin') {
        
        $_SESSION['is_logged_in'] = true; // Set tanda sudah login
        $_SESSION['username'] = 'admin';
        
        // Redirect ke Home/Dashboard
        echo "<script>window.location.href='index.php?page=home';</script>";
        exit;
    } else {
        $error = "Username atau Password salah!";
    }
}
?>

<div class="content">
    <h2>Login Sistem</h2>
    
    <?php if(isset($error)): ?>
        <p style="color: red; margin-bottom: 10px;"><?= $error ?></p>
    <?php endif; ?>

    <form method="post" action="">
        <div class="input">
            <label>Username</label>
            <input type="text" name="username" placeholder="Masukan: admin" required>
        </div>
        <div class="input">
            <label>Password</label>
            <input type="password" name="password" placeholder="Masukan: admin" required>
        </div>
        <div class="submit">
            <input type="submit" name="submit" value="Login">
        </div>
    </form>
</div>