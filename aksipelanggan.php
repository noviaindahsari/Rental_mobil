<!DOCTYPE html>
<html>
<head>
	<title>pelanggan</title>
</head>
<body>

<?php
$servername = 'trunojoyopython.com';
$username = 'trunojoy_kuliah';
$password = 'unijoyo2021';
$database = 'trunojoy_hotel';
// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

$id_pelanggan = $_POST['id_pelanggan'];
$nama = $_POST['nama'];
$noktp = $_POST['noktp'];
$jenkel = $_POST['jenkel'];
$alamat = $_POST['alamat'];
$notlp = $_POST['notlp'];
$email = $_POST['email'];
$sql="INSERT INTO 06_pelanggan(id_pelanggan, nama, noktp, jenkel, alamat, notlp, email) 
values('$id_pelanggan', '$nama' , '$noktp', '$jenkel', '$alamat', '$notlp', '$email')";
if (empty($nama)or empty($jenkel) or empty($alamat) or empty($email) or !is_numeric ($id_pelanggan) or !is_numeric ($noktp)) {
	echo "inputan tidak valid, mohon kembali isi from";
} else {
	$result = $conn->query($sql);
	echo "Record berhasil ditambahkan";
}
?>
<a href="pelanggan.php"> kembali ke menu utama</a>
</body>
</html>