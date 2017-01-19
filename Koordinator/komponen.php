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
	$sql = "SELECT * FROM akun WHERE username='$nm'";
	$kueri = mysql_query($sql);
	$data = mysql_fetch_array($kueri);
	$user = $data['username'];
	$pass= $data['password'];
	$hak= $data['hak_akses'];
	$sql1 = "SELECT * FROM koordinator WHERE username='$nm'";
	$kueri1 = mysql_query($sql1);
	$data1 = mysql_fetch_array($kueri1);
	$nama = $data1['nama'];
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
                    <li>
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
					<li class="active">
                        <a href="setting.php"><i class="fa fa-fw fa-gear"></i> Setting</a>
						<ul>
							<li class="active">
								<a href="ubahpass.php"><i class="fa fa-fw fa-edit"></i> Ubah Password</a>
							</li>
							<li class="active">
								<a href="komponen.php"><i class="fa fa-fw fa-pencil"></i> Komponen Penilaian</a>
							</li>
						</ul>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Komponen Penilaian <small><?php echo $nama?></small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i><a href="homek.php"> Dashboard </a>
                            </li>
							<li>
                                <i class="fa fa-gear"></i> <a href="setting.php"> Setting </a>
                            </li>
							<li class="active">
                                <i class="fa fa-pencil"></i> Komponen Penilaian
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
				<div class="row form-group">
                    <div class="col-lg-4">
                        <form role="form" action="" method="post">
							<div class="form-group">
                                <label>Komponen</label>
                                <input name="komponen" class="form-control" type="text" placeholder="Masukkan Komponen" required>
                            </div>
							<div class="form-group">
								<label>Nilai(%)</label>
								<input name="nilai" type="text" class="form-control" placeholder="Masukkan Nilai" required>
								<!-- <p class="help-block">Example block-level help text here.</p> -->
                            </div>
							
							<button name="tblEdit" type="submit" class="btn btn-default ">Tambah</button>
							<!-- <button name="batal" type="submit" class="btn btn-default">Batal</button> -->
						</form>
					</div>
				</div>
                <!-- /.row -->
				<div class="row">
					<div class="col-lg-12">
					<form method="post" action="">
						<div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
										<th>Komponen</th>
										<th>Nilai(%)</th>
										<!--<th>Ubah</th>-->
										<th>Hapus</th>
									</tr>
                                </thead>
                                <tbody>
									<?php
										include "koneksi.php";
										$sql = "SELECT * FROM komponen";
										$kueri = mysql_query($sql);
										$no=1;
										$sum="select sum(nilai) as nilai from komponen";
										$cek_sum=mysql_query($sum);
										$data_sum=mysql_fetch_array($cek_sum);

										while($data = mysql_fetch_array($kueri)){
											$komp[]=$data['komponen'];
												?>
												<tr>
												<!-- <td><?php echo $no ?></td> -->
												<td><?php echo $data['komponen']?></td>
												<td><input name="nilai[]" value="<?php echo $data['nilai']?>" required></td>
												<!--<td><a href="ubahkom.php?kode=<?php echo $data['komponen']?>"> Ubah </a> </td>-->
												<td><a href="delkom.php?kode=<?php echo $data['komponen']?>"> Hapus </a> </td>
												</tr>
									<?php	
										$no++;}
									?>
									<tr>
										<td align="center"><b>Jumlah</b></td>
										<td><?php echo $data_sum['nilai'];										
										if($data_sum['nilai']>100 || $data_sum['nilai']<100){
											echo "   <b><i>Jumlah Nilai Harus 100 </i></b>";
										}?></td>
									</tr>
                                </tbody>
                            </table>
							<input class="btn btn-default" name="ubah" type="submit" value="Ubah"/>
                        </div>
						</form>
					</div>
				
				</div>
                
                <!-- /.row -->

                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>

</body>

</html>
		<?php
		include "koneksi.php";
		if (isset($_POST['tblEdit'])){
			$user = $_POST['komponen'];
			$pass = $_POST['nilai'];
			$sql = "INSERT into komponen values('$user', '$pass')";
			$kueri = mysql_query($sql);
			if ($kueri){
				echo "<script> document.location='komponen.php'</script>";
			}
			else {
				echo "<script> alert('Komponen gagal ditambah');document.location='komponen.php'</script>";
				echo mysql_error();
			}
			
		}
		
		if(isset($_POST['ubah'])){
			$nilai1=$_POST['nilai'];
			
			for($i=0;$i<sizeof($nilai1);$i++){
					$sql = "update komponen set nilai = '$nilai1[$i]' where komponen='$komp[$i]'";
					$kueri = mysql_query($sql);
					if ($kueri){
						echo "<script> document.location='komponen.php'</script>";
					}
					else {
						echo "<script> alert('Komponen gagal diubah');document.location='komponen.php'</script>";
						echo mysql_error();
					}
			}
		}
		
		//if (isset($_POST['batal'])){
		//echo "<script> document.location='setting.php'</script>";
		
		//}
						
		?>