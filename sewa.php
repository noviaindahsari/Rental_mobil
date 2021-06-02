<?php
//memasukkan file config.php
include('koneksi.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Jenis Mobil</title>
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
                <a class="nav-link" href="sewa.php">
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
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->
	
	<div class="container" style="margin-top:20px">
		<h2>Tabel Mobil</h2>
		
		<hr>
		
		<table class="table table-striped table-hover table-sm table-bordered">
			<thead class="thead-dark">
				<tr>
					<th>ID Mobil.</th>
					<th>Plat</th>
                    <th>Nama Mobil</th>
                    <th>Harga</th>
                    <th>Transaksi</th>
				</tr>
			</thead>
			<tbody>
				<?php
				//query ke database SELECT tabel mahasiswa urut berdasarkan id yang paling besar
				$sql = mysqli_query($koneksi, "SELECT * FROM 06_mobil") or die(mysqli_error($koneksi));
				//jika query diatas menghasilkan nilai > 0 maka menjalankan script di bawah if...
				if(mysqli_num_rows($sql) > 0){
					//membuat variabel $no untuk menyimpan nomor urut
					$no = 1;
					//melakukan perulangan while dengan dari dari query $sql
					while($data = mysqli_fetch_assoc($sql)){
						//menampilkan data perulangan
						echo '
						<tr>
							<td>'.$data['id_mobil'].'</td>
                            <td>'.$data['plat'].'</td>
                            <td>'.$data['namamobil'].'</td>
                            <td>'.$data['harga'].'</td>
							<td>
								<a href="sewaform.php?id_mobil='.$data['id_mobil'].'" class="badge badge-warning mb-2">Sewa</a>
							</td>
						</tr>
						';
						$no++;
					}
				//jika query menghasilkan nilai 0
				}else{
					echo '
					<tr>
						<td colspan="6">Tidak ada data.</td>
					</tr>
					';
				}
				?>
        </tbody>
    </table>
</div>

                <div class="container" style="margin-top:20px">
        <h2>Tabel Sewa</h2>
        
        <hr>
        
        <table class="table table-striped table-hover table-sm table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>ID Sewa</th>
                    <th>ID Pelanggan</th>
                    <th>Nama Pelanggan</th>
                    <th>ID Mobil</th>
                    <th>Harga</th>
                    <th>ID Supir</th>
                    <th>Nama</th>
                    <th>Tanggal Sewa</th>
                    <th>Lama Sewa</th>
                    <th>Tanggal Pengembalian</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php
                //query ke database SELECT tabel mahasiswa urut berdasarkan id yang paling besar
                $sql = mysqli_query($koneksi, "SELECT * FROM 06_sewa") or die(mysqli_error($koneksi));
                //jika query diatas menghasilkan nilai > 0 maka menjalankan script di bawah if...
                if(mysqli_num_rows($sql) > 0){
                    //membuat variabel $no untuk menyimpan nomor urut
                    $no = 1;
                    //melakukan perulangan while dengan dari dari query $sql
                    while($data = mysqli_fetch_assoc($sql)){
                        //menampilkan data perulangan
                        echo '
                        <tr>
                            <td>'.$data['id_sewa'].'</td>
                            <td>'.$data['id_pelanggan'].'</td>
                            <td>'.$data['nama_pelanggan'].'</td>
                            <td>'.$data['id_mobil'].'</td>
                            <td>'.$data['harga'].'</td>
                            <td>'.$data['id_supir'].'</td>
                            <td>'.$data['nama'].'</td>
                            <td>'.$data['tanggal_sewa'].'</td>
                            <td>'.$data['lama'].'</td>
                            <td>'.$data['tanggal_kembali'].'</td>
                            <td>'.$data['total'].'</td>
                        </tr>
                        ';
                        $no++;
                    }
                //jika query menghasilkan nilai 0
                }else{
                    echo '
                    <tr>
                        <td colspan="6">Tidak ada data.</td>
                    </tr>
                    ';
                }
                ?>
			<tbody>
		</table>
		
	</div>
	
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	
</body>
</html>