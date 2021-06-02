<?php
include 'koneksi.php';

$id_sewa = $_GET["id_sewa"];
$data = "SELECT * FROM 06_sewa WHERE id_sewa='$id_sewa'";
$qry = mysqli_query($koneksi,$data);
$row = mysqli_fetch_array($qry);
//membuat id 
$query = "SELECT max(id_pengembalian) as maxKode FROM 06_pengembalian";
$hasil = mysqli_query($koneksi,$query);
$data2 = mysqli_fetch_array($hasil);
$id_pengembalian = $data2['maxKode'];

$noUrut = (int) substr($id_pengembalian, 3, 3);
$noUrut++;

$char = "510";
$id_pengembalian = $char . sprintf("%03s", $noUrut);
//mulai perhitungan denda
$tanggal_kembali = $row["tanggal_kembali"];
$tanggal_pengembalian = date('Y-m-d');

function dateDiff($start, $end) {
    $start_ts = strtotime($start);
    $end_ts = strtotime($end);
    $diff = $end_ts - $start_ts;
    return round($diff / 86400);
}

$diff = dateDiff($tanggal_pengembalian,$tanggal_kembali);
$denda = $diff * 200000;
$total = $denda;


mysqli_query($koneksi,"INSERT INTO 06_pengembalian(id_pengembalian, id_sewa, tanggal_kembali, tanggal_pengembalian, denda) VALUES('$id_pengembalian', '$id_sewa', '$tanggal_kembali', '$tanggal_pengembalian', '$total')");
?>
<script language="JavaScript">
	alert('Transaksi Sukses');
	document.location='pengembalian.php';
</script>