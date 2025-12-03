<?php
// Proses Simpan Data
if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $kategori = $_POST['kategori'];
    $harga_jual = $_POST['harga_jual'];
    $harga_beli = $_POST['harga_beli'];
    $stok = $_POST['stok'];
    $file_gambar = $_FILES['file_gambar'];
    $gambar = null;

    if ($file_gambar['error'] == 0) {
        $filename = str_replace(' ', '_', $file_gambar['name']);
        $destination = 'gambar/' . $filename;
        if (move_uploaded_file($file_gambar['tmp_name'], $destination)) {
            $gambar = $filename;
        }
    }

    $sql = "INSERT INTO data_barang (nama, kategori, harga_jual, harga_beli, stok, gambar) ";
    $sql .= "VALUES ('{$nama}', '{$kategori}', '{$harga_jual}', '{$harga_beli}', '{$stok}', '{$gambar}')";
    
    $result = mysqli_query($conn, $sql);
    
    // Redirect ke halaman Data Barang
    echo "<script>alert('Data Berhasil Ditambahkan'); window.location.href='index.php?page=user/list';</script>";
}
?>

<div class="content">
    <h2>Tambah Barang Baru</h2>
    <form method="post" action="index.php?page=user/add" enctype="multipart/form-data">
        <div class="input">
            <label>Nama Barang</label>
            <input type="text" name="nama" placeholder="Contoh: HP Samsung" required />
        </div>
        <div class="input">
            <label>Kategori</label>
            <select name="kategori">
                <option value="Komputer">Komputer</option>
                <option value="Elektronik">Elektronik</option>
                <option value="Hand Phone">Hand Phone</option>
            </select>
        </div>
        <div class="input">
            <label>Harga Jual</label>
            <input type="text" name="harga_jual" placeholder="Contoh: 2000000" />
        </div>
        <div class="input">
            <label>Harga Beli</label>
            <input type="text" name="harga_beli" placeholder="Contoh: 1500000" />
        </div>
        <div class="input">
            <label>Stok</label>
            <input type="text" name="stok" placeholder="Contoh: 10" />
        </div>
        <div class="input">
            <label>File Gambar</label>
            <input type="file" name="file_gambar" />
        </div>
        <div class="submit">
            <input type="submit" name="submit" value="Simpan Data" />
            <a href="index.php?page=user/list" class="btn" style="background-color: #95a5a6; margin-left: 10px;">Batal</a>
        </div>
    </form>
</div>