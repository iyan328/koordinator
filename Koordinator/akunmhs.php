<?php
session_start();

//cek apakah user sudah login
if(!isset($_SESSION['username'])){
die("Anda belum login");//jika belum login jangan lanjut..
}
else{
	$nm = $_SESSION['username'];
}

//cek level user
if($_SESSION['hak_akses']!="koordinator"){
die("Anda bukan koordinator");//jika bukan admin jangan lanjut
}
?>
<?php
	include "koneksi.php";
	
	$sql = "SELECT * FROM koordinator WHERE username='$nm'";
	$kueri = mysql_query($sql);
	$data = mysql_fetch_array($kueri);
	$nama = $data['nama'];
	$pro = $data['prodi'];
	?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Home Page Koordinator</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
	
	<script type="text/javascript" src="js/DataTable/media/js/jquery.js"></script>
	<script type="text/javascript" src="js/DataTable/media/js/jquery.dataTables.js"></script>
	<!--<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">-->
	<link rel="stylesheet" type="text/css" href="js/DataTable/media/css/jquery.dataTables.css">
	<link rel="stylesheet" type="text/css" href="js/DataTable/media/css/dataTables.bootstrap.css">
	
	
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
		
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="homek.php">Dosen Koordinator</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
			
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $nama?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <!-- <li>
                            <a href="profile.php"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li> -->
                        <li>
                            <a href="setting.php"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="homek.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li class="active">
                        <a href="javascript:;" data-toggle="collapse" data-target="#akun"><i class="fa fa-fw fa-th-list"></i> Akun <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="akun" class="collapse">
                            <li>
                                <a href="akunmhs.php"><i class="fa fa-fw fa-user"></i>Mahasiswa</a>
                            </li>
                            <li>
                                <a href="akundosenp.php"><i class="fa fa-fw fa-user"></i>Dosen Pembimbing</a>
                            </li>
                        </ul>
                    </li>
					<li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#mg"><i class="fa fa-fw fa-th-list"></i> Magang <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="mg" class="collapse">
                            <li>
                                <a href="perusahaan.php"><i class="fa fa-fw fa-info"></i>Lowongan Magang</a>
                            </li>
                            <li>
                                <a href="../upload-download-files/pendaftaranmagang.php"><i class="fa fa-fw fa-info"></i>Pendaftaran</a>
                            </li>
							<li>
                                <a href="lihatdosen.php"><i class="fa fa-fw fa-edit"></i>Dosen Pembimbing</a>
                            </li>
                            <li>
                                <a href="nilai.php"><i class="fa fa-fw fa-pencil"></i>Nilai</a>
                            </li>
							<li>
                                <a href="umpanbalik.php"><i class="fa fa-fw fa-check"></i>Umpan Balik Mahasiswa</a>
                            </li>
							<li>
                                <a href="umpanbalik_i.php"><i class="fa fa-fw fa-check"></i>Umpan Balik Industri</a>
                            </li>
							<li>
                                <a href="../upload-download-files/surat_m.php"><i class="fa fa-fw fa-tag"></i>Surat Magang</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">
			<form action="" method="post">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Akun Mahasiswa <small><?php echo $nama?></small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i> <a href="homek.php"> Dashboard </a>
                            </li>
							<li class="active">
                                <i class="fa fa-user"></i> Akun Mahasiswa
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
				<div class="row">
                    <div class="col-lg-2 form-group">
                       
						<label>Kelas</label>
						<select class="form-control form-group" name="kelas" required>
							<option value>Pilih Kelas</option>
								<?php
								include "koneksi.php";
								$sql = "SELECT kelas FROM mahasiswa group by kelas";
								$kueri = mysql_query($sql);
								$no=1;
								while($data = mysql_fetch_array($kueri)){
								?>
								<option value="<?php echo $data['kelas']?>"><?php echo $data['kelas']?></option>
								<?php
								$no++;}
								?>
						</select>
						
                    </div>
					
                </div>
				<div class="row">
					<div class="col-lg-6 form-group">
					<input class="btn btn-default" name="tampilkan" type="submit" id="tampilkan" value="Tampilkan"/>
					<input class="btn btn-default" name="buat" type="submit" value="Buat Akun (semua)"/>
					</div>
					</div>
               
                <!-- /.row -->

                <div class="row">
				<div class="col-lg-12">
					<div class="table-responsive">
						<div class="container">
                            <table class="table table-striped table-bordered data">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
										<th>Nim</th>
										<!--<th>Kelas</th> -->
										<th>Prodi</th> 
										<th>Akun</th>
										<th>Ubah</th>
										<th>Hapus</th>
                                    </tr>
                                </thead>
                                <tbody>
									<?php
									
						include "koneksi.php";
						
						if(isset($_POST['buat'])){
							$kelas = $_POST['kelas'];
							$sql3 = "SELECT * FROM mahasiswa where kelas = '$kelas' and prodi = '$pro'";
							$kueri3 = mysql_query($sql3);
							//$jml_mhs = mysql_num_rows($kueri);
							$no=1;
							
							while($data3 = mysql_fetch_array($kueri3)){
								$nim_buat[]=$data3['nim'];
								$nama1[]=$data3['nama'];
							}
							
							for($i=0;$i<sizeof($nim_buat);$i++){
								$sql4 = "insert into akun values ('$nim_buat[$i]', '$nim_buat[$i]', 'mahasiswa')";
								$kueri4 = mysql_query($sql4);
								$sql_akun = "select * from akun where username = '$nim_buat[$i]'";
								$cek_akun = mysql_query($sql_akun);
								$data_akun = mysql_fetch_array($cek_akun);
								$usrnm=$data_akun['username'];
								$insert_mhs="insert into mhs values ('$usrnm', '$usrnm', '$nama1[$i]', '$pro', '$kelas')";
								$cek_insert_mhs=mysql_query($insert_mhs);
								if ($kueri4 && $cek_insert_mhs){
									echo "<script> alert('Akun berhasil dibuat');document.location='akunmhs.php'</script>";
											}
								else {
									echo "<script> alert('Akun sudah ada');document.location='akunmhs.php'</script>";
									echo mysql_error();
									}
							}
							
						}
						
						
						if (isset($_POST['tampilkan'])){
							$kelas = $_POST['kelas'];
							$sql = "SELECT * FROM mahasiswa where kelas = '$kelas' and prodi = '$pro'";
							$kueri = mysql_query($sql);
							$jml_mhs = mysql_num_rows($kueri);
							$no=1;
							
							while($data = mysql_fetch_array($kueri)){
								$nim_buat[]=$data['nim'];
					?>
								<tr>
								<td><?php echo $data['nama']?></td>
								<td><?php echo $data['nim']?></td>
								<!--<td><?php echo $data['kelas']?></td> -->
								<td><?php echo $data['prodi']?></td> 
					<?php
						include "koneksi.php";
						$nim1 = $data['nim'];
						$sql1 = "SELECT * FROM mhs WHERE nim='$nim1'";
						$kueri1 = mysql_query($sql1);
						$data1 = mysql_fetch_array($kueri1);
						$nim2 = $data1['nim'];
						if ($nim2 == ""){
					?>
						<td><a href="tambahakunmhs.php?kode=<?php echo $data['nim']?>"> Buat </a> </td>
							<?php
										}
						else {
							?>							
							<td><a href="lihatakunmhs.php?kode=<?php echo $data['nim']?>"> Lihat </a> </td>
					<?php
							}
					?>
							<td><a href="ubahmhs.php?kode=<?php echo $data['nim']?>"> Ubah </a> </td>
							<td><a href="hapusmhs.php?kode=<?php echo $data['nim']?>"> Hapus </a> </td>
								</tr>
							<?php
								$no++;}
							?>

								
								
                                </tbody>
                            </table>
							<?php
							}
							
							?>
							
                        </div>
						</div>
                </div>
				
				</div>
                <!-- /.row -->

                <!-- /.row -->
			</form> 
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <!--<script src="js/jquery.js"></script>-->

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <!--<script src="js/plugins/morris/morris-data.js"></script>-->

</body>
<script type="text/javascript">
	$(document).ready(function(){
		$('.data').DataTable();
	});
</script>
</html>

