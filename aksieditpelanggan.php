<?php
$koneksi=mysqli_connect("trunojoyopython.com","trunojoy_kuliah","unijoyo2021","trunojoy_hotel");
$id_pelanggan=$_GET['id_pelanggan'];
$nama= $_GET['nama'];
$noktp= $_GET['noktp'];
$jenkel= $_GET['jenkel'];
$alamat = $_GET['alamat'];
$notlp= $_GET['notlp'];
$email= $_GET['email'];
$update="UPDATE 06_pelanggan SET nama='$nama',noktp='$noktp',jenkel='$jenkel',alamat='$alamat,'notlp='$notlp',email='$email', WHERE id_pelanggan='$id_pelanggan' ";
$hasil=mysqli_query($koneksi, $update);
if($hasil) {
 header("location:pelanggan.php"); }
else {
 echo "Maaf gagal edit"; }
?>