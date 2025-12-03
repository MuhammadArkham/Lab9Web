<?php
$id = $_GET['id'];
$sql = "DELETE FROM data_barang WHERE id_barang = '{$id}'";
mysqli_query($conn, $sql);
echo "<script>window.location.href='index.php?page=user/list';</script>";
?>