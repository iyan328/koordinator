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
	$nama1 = $data['nama'];
	$pro = $data['prodi'];
	?>
	<?php
	include "koneksi.php";

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
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $nama1?> <b class="caret"></b></a>
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
                    <li class="active">
                        <a href="homek.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
					<li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#data"><i class="fa fa-fw fa-th-list"></i> Data <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="data" class="collapse">
                            <li>
								<a href="tambah_data.php"><i class="fa fa-fw fa-book"></i>Tambah Data</a>
							</li>
							<li>
								<a href="import.php"><i class="fa fa-fw fa-book"></i>Import Data</a>
							</li>
                        </ul>
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
                            Tambah Data <small><?php echo $nama1?></small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i> <a href="homek.php"> Dashboard </a>
                            </li>
							<li class="active">
                                <i class="fa fa-book"></i> Tambah Data
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

               
                <!-- /.row -->

                
                    <form name="form1" role="form" action="" method="post">
							<div class="row">
								<div class="col-lg-3">
									<div class = "form-group">
										<label>Pilih data</label>
										<select class="form-control" name="data" onchange="check(this.value)" required>
											<option value="">Pilih Data</option>
											<option value="mahasiswa">Mahasiswa</option>
											<option value="dosen">Dosen Pembimbing</option>
										</select>
									</div>
								</div>
							</div>
							<script type="text/javascript">
								function check(val){
									if (val=='mahasiswa'){
										document.form1.kelas1.style.display="block";
										document.form1.nim.style.display="block";
										document.form1.name.style.display="block";
										//document.form1.prodi.style.display="block";
										document.form1.kelas.style.display="block";
										document.form1.nama2.style.display="none";
										document.form1.nik.style.display="none";
										//document.form1.tbltambah.style.display="block";
									}
									else if(val=='dosen'){
										document.form1.kelas1.style.display="none";
										document.form1.nim.style.display="none";
										document.form1.name.style.display="none";
										//document.form1.prodi.style.display="none";
										document.form1.kelas.style.display="none";
										document.form1.nama2.style.display="block";
										document.form1.nik.style.display="block";
										//document.form1.tbltambah.style.display="block";
									}
								}
							</script>
							<div class="row">
								<div class="col-lg-3">
									<div class = "form-group">
										<!--<label>Pilih Kelas</label>-->
										<select class="form-control" name="kelas1" id="kelas1" >
											<option value="">Pilih Kelas</option>
											<option value="reguler">Reguler</option>
											<option value="karyawan">Karyawan</option>
										</select>
									</div>
								</div>
							</div>
				<div class="row">
				<div class="col-lg-4">
							<div class="form-group">
                                <input name="nim" id="nim" class="form-control" type="text" placeholder="Nim" >
                            </div>
							<div class="form-group">
								<input name="nama" id="name" type="text" class="form-control" placeholder="Nama" >
								<!-- <p class="help-block">Example block-level help text here.</p> -->
                            </div>
							<div class="form-group">
                                <input name="prodi" id="prodi" class="form-control" type="hidden" value="<?php echo $pro ?>">
                            </div>
							<div class="form-group">
								<input name="kelas" id="kelas" type="text" class="form-control" placeholder="kelas" >
								<!-- <p class="help-block">Example block-level help text here.</p> -->
                            </div>
							<div class="form-group">
								<input name="nama2" id="nama2" type="text" class="form-control" placeholder="Nama" >
								<!-- <p class="help-block">Example block-level help text here.</p> -->
                            </div>
							<div class="form-group">
								<input name="nik" id="nik" type="text" class="form-control" placeholder="Nik" >
								<!-- <p class="help-block">Example block-level help text here.</p> -->
                            </div>
							
							<button name="tbltambah" type="submit" id="tbltambah" class="btn btn-default">Simpan</button>
							<button name="batal" type="submit" class="btn btn-default">Batal</button>
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
		if (isset($_POST['tbltambah'])){
			$nama = $_POST['nama'];
			$nim = $_POST['nim'];
			$kelas = $_POST['kelas'];
			$prodi = $_POST['prodi'];
			$kelas1=$_POST['kelas1'];
			$data1=$_POST['data'];
			$nama2=$_POST['nama2'];
			$nik=$_POST['nik'];
			if($data1=='mahasiswa'){
				$sql = "INSERT INTO mahasiswa values('$nim','$nama','$kelas', '$prodi', '$kelas1')";
				$kueri = mysql_query($sql);
			}elseif($data1=='dosen'){
				$sql1 = "INSERT INTO dosen values('$nama2', '$nik')";
				$kueri1 = mysql_query($sql1);
			}

			if ($kueri ){
				echo "<script> document.location='tambah_data.php'</script>";
			}
			else {
				echo "<script> alert('Data gagal dimasukkan ke database');document.location='tambah_data.php'</script>";
				echo mysql_error();
			}
		}
		if (isset($_POST['batal'])){
		echo "<script> document.location='homek.php'</script>";
		
		}
		?>			
	