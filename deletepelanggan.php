<?php 
require_once "koneksi.php";

if (isset($_GET['id_pelanggan'])) {

	$id_pelanggan = $_GET['id_pelanggan'];
	
	// perintah query untuk menghapus data pada tabel is_siswa
	$query = mysqli_query($koneksi, "DELETE FROM 06_pelanggan WHERE id_pelanggan='$id_pelanggan'");

	// cek hasil query
	if ($query) {
		// jika berhasil tampilkan pesan berhasil delete data
		header('location: pelanggan.php?alert=4');
	} else {
		// jika gagal tampilkan pesan kesalahan
		header('location: pelanggan.php?alert=1');
	}	
}			
?>