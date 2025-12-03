<?php
// Query data
$sql = 'SELECT * FROM data_barang';
$result = mysqli_query($conn, $sql);
?>

<div class="content">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; border-bottom: 2px solid #1abc9c; padding-bottom: 10px;">
        <h2 style="margin: 0; border: none; padding: 0;">Data Barang</h2>
        <a href="index.php?page=user/add" class="btn" style="background-color: #27ae60;">+ Tambah Barang</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>Gambar</th>
                <th>Nama Barang</th>
                <th>Kategori</th>
                <th>Harga Jual</th>
                <th>Harga Beli</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result && mysqli_num_rows($result) > 0): ?>
                <?php while($row = mysqli_fetch_array($result)): ?>
                <tr>
                    <td><img src="gambar/<?= $row['gambar']; ?>" alt="<?= $row['nama']; ?>"></td>
                    <td><?= $row['nama']; ?></td>
                    <td><?= $row['kategori']; ?></td>
                    <td>Rp. <?= number_format($row['harga_jual']); ?></td>
                    <td>Rp. <?= number_format($row['harga_beli']); ?></td>
                    <td><?= $row['stok']; ?></td>
                    <td>
                        <a href="index.php?page=user/edit&id=<?= $row['id_barang']; ?>" class="btn-edit">Ubah</a>
                        <a href="index.php?page=user/delete&id=<?= $row['id_barang']; ?>" onclick="return confirm('Yakin hapus?')" class="btn-delete">Hapus</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="7" style="text-align:center; padding: 20px;">Belum ada data barang. Silakan tambah data baru.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>