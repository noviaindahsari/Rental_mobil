<?php
include 'koneksi.php';

$id_pelanggan = $_POST["pelanggan"];
$data = "SELECT * FROM 06_pelanggan WHERE id_pelanggan='$id_pelanggan'";
$qry = mysqli_query($koneksi,$data);
$row = mysqli_fetch_array($qry);

$id_mobil = $_POST["id_mobil"];
$data1 = "SELECT * FROM 06_mobil WHERE id_mobil='$id_mobil'";
$qry1 = mysqli_query($koneksi,$data1);
$row1 = mysqli_fetch_array($qry1);

$nama = $_POST["pilihsupir"];
$data2 = "SELECT * FROM 06_supir WHERE nama='$nama'";
$qry2 = mysqli_query($koneksi,$data2);
$row2 = mysqli_fetch_array($qry2);


$id_sewa = $_POST["id_sewa"];
$nama_pelanggan = $row["nama"];
$harga = $row1["harga"];
$id_supir = $row2["id_supir"];
$tanggal_sewa = $_POST["tanggal_sewa"];
$lama = $_POST["lama"];
$tanggal_kembali = $_POST["tanggal_kembali"];
$total = $lama*$harga;

mysqli_query($koneksi,"INSERT INTO 06_sewa(id_sewa, id_pelanggan, nama_pelanggan, id_mobil, harga, id_supir, nama, tanggal_sewa, lama, tanggal_kembali, total) VALUES('$id_sewa', '$id_pelanggan', '$nama_pelanggan', '$id_mobil', '$harga','$id_supir', '$nama', '$tanggal_sewa', '$lama', '$tanggal_kembali', '$total')");
        ?>
            <script language="JavaScript">
                alert('Transaksi Sukses');
                document.location='sewaform.php';
            </script>
        <?php
