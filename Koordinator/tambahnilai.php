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
	if(isset($_GET['kode'])){
		$kode = $_GET['kode'];
	}
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
					<li class="active">
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
                            Tambah Nilai <small><?php echo $nama?></small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i> <a href="homek.php"> Dashboard </a>
                            </li>
							<li>
                                <i class="fa fa-pencil"></i> <a href="nilai.php"> Nilai </a> 
                            </li>
							<li class="active">
                                <i class="fa fa-pencil"></i> Tambah Nilai
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

               
                <!-- /.row -->

                <div class="row">
					<div class="col-lg-4">
                        <form role="form" action="" method="post">
							<div class="form-group">
                                <label for="disabledSelect">Nim</label>
                                <input name="nim" class="form-control" id="disabledInput" type="text" value="<?php echo $kode?>" readonly>
                            </div>
							
							<?php
										include "koneksi.php";
										$sql = "SELECT * FROM komponen";
										$kueri = mysql_query($sql);
										$no=1;
										while($data = mysql_fetch_array($kueri)){
												?>
												<div class="form-group">
													<input name="kompo[]" type="hidden" class="form-control" value="<?php echo $data['nilai']?>" >
													<!-- <p class="help-block">Example block-level help text here.</p> -->
												</div>
												<div class="form-group">
													<label><?php echo $data['komponen']?></label>
													<input name="nilai[]" type="text" class="form-control" required>
													<!-- <p class="help-block">Example block-level help text here.</p> -->
												</div>
									<?php	
									//kompo[] = $data['komponen'];
										$no++;}
									?>
							
							<button name="tambah" type="submit" class="btn btn-default">Simpan</button>
							<!-- <button name="batal" type="submit" class="btn btn-default">Batal</button> -->
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
		
		if (isset($_POST['tambah'])){
			$nilai = $_POST['nilai'];
			$nim = $_POST['nim'];
			$kompo = $_POST['kompo'];
			//$Ni=0;
			for ($i=0; $i<sizeof($nilai);$i++){
				$Ni+=(($kompo[$i]/100)*$nilai[$i]);
			}
			if($Ni>=80){
				$NA='A';
			}
			elseif (75<=$Ni && $Ni<80){
				$NA='A-';
			}
			elseif (70<=$Ni && $Ni<75){
				$NA='B+';
			}
			elseif (65<=$Ni && $Ni<70){
				$NA='B';
			}
			elseif (60<=$Ni && $Ni<65){
				$NA='B-';
			}
			elseif (55<=$Ni && $Ni<60){
				$NA='C+';
			}
			elseif (50<=$Ni && $Ni<55){
				$NA='C';
			}
			elseif (45<=$Ni && $Ni<50){
				$NA='C-';
			}
			elseif (40<=$Ni && $Ni< 45){
				$NA='D';
			}
			elseif ($Ni<80){
				$NA='E';
			}
			$sql = "INSERT INTO nilai_akhir values(NULL,'$nim','$NA')";
			$kueri = mysql_query($sql);
			if ($kueri){
				echo "<script> document.location='nilai.php'</script>";
			}
			else {
				echo "<script> alert('Nilai gagal dimasukkan ke database');document.location='tambahnilai.php'</script>";
				echo mysql_error();
			}
			 

		}
		?>			
	