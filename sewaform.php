<?php
include('koneksi.php');
?>
<!DOCTYPE html>
<html>
<head>
  <title>Mobil</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body>
  <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-car"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Rental Mobil</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Fiture
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-list"></i>
                    <span>Kelola</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="mobil.php">Mobil</a>
                        <a class="collapse-item" href="supir.php">Supir</a>
                        <a class="collapse-item" href="pelanggan.php">Pelanggan</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="sewa.html">
                    <i class="fas fa-fw fa-file-alt"></i>
                    <span>Sewa</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="pengembalian.php">
                    <i class="fas fa-fw fa-file-alt"></i>
                    <span>Pengembalian</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
        </ul>
        <!-- End of Sidebar -->
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
            </nav>


    <div class="container" style="margin-top:20px">
<br>
	<?php 
include "koneksi.php"; 
    if (isset($_GET['id_mobil'])) {
    	$id_mobil = $_GET['id_mobil'];
    	$result = mysqli_query($koneksi,"SELECT * FROM 06_mobil WHERE id_mobil= '$id_mobil'");
    	$row = mysqli_fetch_array($result);
    }


?>
<table  border="1" cellspacing="1" cellpadding="4">
	<form>
		
	</form>


<form action="aksisewa.php" method="POST">
	<center>
	<table>
		<h1>Inputkan Sewa</h1>
		<hr><br>
		<tr>
			<td>ID Sewa</td>
			<td>:</td>
			<td><input type="number" name="id_sewa" class="input" value="<?php echo "400".rand(0, 999)?>"></input></td>
		</tr>

		<tr>
			<td>Pelanggan</td>
			<td>:</td>
			<td><select name="pelanggan" >
				<option>--pilih pelanggan--
				<?php
				$sql1 = ("SELECT * FROM 06_pelanggan ORDER BY id_pelanggan");
				$run_query = mysqli_query($koneksi,$sql1);
				if (mysqli_num_rows($run_query) != 0) {
					while($row1 = mysqli_fetch_assoc($run_query)){
						echo '<option>'.$row1['id_pelanggan'].'</option>';
					}			
				}
				?>
				</option>
			</select></td>
		</tr>
		
		<tr>
			<td>ID Mobil</td>
			<td>:</td>
			<?php
            include 'koneksi.php';
            ?>  
	         <td><select name="id_mobil" id="id_mobil" class="form-control" onchange='changeValue(this.value)' required >  
	         	<option>--pilih Mobil--</option>
	              <?php   
	              $query = mysqli_query($koneksi, "select * from 06_mobil order by id_mobil esc");  
	              $result = mysqli_query($koneksi, "select * from 06_mobil");
	              $x          = "var namamobil = new Array();\n;";   
	              $a          = "var plat = new Array();\n;";  
	              $b          = "var harga = new Array();\n;";  
	              while ($row = mysqli_fetch_array($result)) {  
	                   echo '<option name="id_mobil" value="'.$row['id_mobil'] . '">' . $row['id_mobil'] . '</option>';
	              $x .= "namamobil['" . $row['id_mobil'] . "'] = {namamobil:'" . addslashes($row['namamobil'])."'};\n";   
	              $a .= "plat['" . $row['id_mobil'] . "'] = {plat:'" . addslashes($row['plat'])."'};\n";  
	              $b .= "harga['" . $row['id_mobil'] . "'] = {harga:'" . addslashes($row['harga'])."'};\n";  
	              }  
	              ?>  
	         </select></td>
		</tr>
		<tr>
			<td>Nama Mobil</td>
			<td>:</td>
			<td><input type="text" class="form-control" id="namamobil" name="namamobil" disabled></td>
		</tr>
		<tr>
			<td>Plat</td>
			<td>:</td>
			<td><input type="text" class="form-control" id="plat" name="plat" disabled></td>
		</tr>
		<tr>
			<td>Harga</td>
			<td>:</td>
			<td><input type="text" class="form-control" id="harga" name="harga" disabled></td>
		</tr>

		<tr>
			<td>Tanggal Sewa</td>
			<td>:</td>
			<td><input type="date" placeholder="Tanggal Sewa" name="tanggal_sewa" class="input"></input></td>
		</tr>
		<tr>
			<td>Lama Sewa</td>
			<td>:</td>
			<td><input type="number" name="lama" class="input" required placeholder="Lama Sewa "></input></td><td>/Hari</td>
		</tr>
		<tr>
			<td>Tanggal Kembali</td>
			<td>:</td>
			<td><input type="date" placeholder="Tanggal Kembali" name="tanggal_kembali" class="input"></input></td>
		</tr>
		<tr>
			<td>Supir</td>
			<td>:</td>
			<td><select name="pilihsupir">
				<option >--pilih supir--
				<?php
				$sql1 = ("SELECT * FROM 06_supir ORDER BY id_supir");
				$run_query = mysqli_query($koneksi,$sql1);
				if (mysqli_num_rows($run_query) != 0) {
					while($row1 = mysqli_fetch_assoc($run_query)){
						echo '<option>'.$row1['nama'].'</option>';
					}
				}
				?>
				</option>
			</select></td>
		</tr>
		<script type="text/javascript">   
          <?php   
          echo $a;   
          echo $b; 
          echo $x;?>  
          function changeValue(id){
          	document.getElementById('namamobil').value = namamobil[id].namamobil;  
            document.getElementById('plat').value = plat[id].plat;  
            document.getElementById('harga').value = harga[id].harga;  
          };  
          </script>  
	</table>
	<br>
	<a class="btn btn-primary" href="sewa.php" role="button">Kembali</a>
	<input class="btn btn-primary" type="submit" value="Submit">
	
</form>
</body>
</html>