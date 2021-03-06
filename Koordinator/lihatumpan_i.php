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
		$sql1 = "SELECT * FROM mhs WHERE nim='$kode'";
		$kueri1 = mysql_query($sql1);
		$data1 = mysql_fetch_array($kueri1);
		$nama1 = $data1['nama'];
		$sql2 = "SELECT * FROM magang WHERE nim='$kode'";
		$kueri2 = mysql_query($sql2);
		$data2 = mysql_fetch_array($kueri2);
		$peru=$data2['perusahaan'];
		$sql3 = "SELECT * FROM umpanbalik_i WHERE nim='$kode'";
		$kueri3 = mysql_query($sql3);
		$data3 = mysql_fetch_array($kueri3);
	}
	$sql = "SELECT * FROM koordinator WHERE username='$nm'";
	$kueri = mysql_query($sql);
	$data = mysql_fetch_array($kueri);
	$nama = $data['nama'];
	$prodi = $data['prodi'];
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
                            Umpan Balik <small><?php echo $nama?></small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i><a href="homek.php"> Dashboard </a>
                            </li>
							<li class="active">
                                <i class="fa fa-check"></i> Umpan Balik
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
				<div class="row">
                    <div class="col-lg-4">
							<h4>A.	Data Peserta Magang </h4>
							<div class="form-group">
                                <label for="disabledSelect">Nama</label>
                                <input name="nama" class="form-control" id="disabledInput" type="text" value="<?php echo $nama1?>" readonly>
                            </div>
							<div class="form-group">
								<label>Nim</label>
								<input name="nim" type="text" class="form-control" value="<?php echo $kode?>" readonly>
								<!-- <p class="help-block">Example block-level help text here.</p> -->
                            </div>
							<div class="form-group">
								<label>Prodi</label>
								<input name="prodi" type="text" class="form-control" value="<?php echo $prodi?>" readonly>
								<!-- <p class="help-block">Example block-level help text here.</p> -->
                            </div>
							<div class="form-group">
								<label>Tempat Magang</label>
								<input name="tempat" type="text" class="form-control" value="<?php echo $data2['perusahaan']?>" readonly>
								<!-- <p class="help-block">Example block-level help text here.</p> -->
                            </div>
							<div class="form-group">
								<label>Tahun</label>
								<input name="tahun" type="text" class="form-control" value="<?php echo $data3['tahun']?>" readonly>
								<!-- <p class="help-block">Example block-level help text here.</p> -->
                            </div>

					</div>
				</div>
                <!-- /.row -->
				<div class="row">
                    <div class="col-lg-12">
							<h4>B.	Parameter Penilaian </h4>
							<div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Parameter</th>
                                        <th>Tanggapan</th>
                                    </tr>
                                </thead>
                                <tbody>
									<tr>
										<td>1</td>
										<td>Tingkat kedisiplinan</td>
										<td><?php echo $data3['parameter1']?></td>

									</tr>
									<tr>
										<td>2</td>
										<td>Integritas (etika dan moral)</td>
										<td><?php echo $data3['parameter2']?></td>

									</tr>
									<tr>
										<td>3</td>
										<td>Keahlian berdasarkan bidang ilmu (kompetensi utama)</td>
										<td><?php echo $data3['parameter3']?></td>

									</tr>
									<tr>
										<td>4</td>
										<td>Bahasa Inggris</td>
										<td><?php echo $data3['parameter4']?></td>

									</tr>
									<tr>
										<td>5</td>
										<td>Penggunaan teknologi informasi</td>
										<td><?php echo $data3['parameter5']?></td>

									</tr>
									<tr>
										<td>6</td>
										<td>Komunikasi</td>
										<td><?php echo $data3['parameter6']?></td>

									</tr>
									<tr>
										<td>7</td>
										<td>Kerjasama tim</td>
										<td><?php echo $data3['parameter7']?></td>

									</tr>
									<tr>
										<td>8</td>
										<td>Pengembangan diri</td>
										<td><?php echo $data3['parameter8']?></td>

									</tr>
									<tr>
										<td>9</td>
										<td>Kerapihan</td>
										<td><?php echo $data3['parameter9']?></td>

									</tr>
                                </tbody>
                            </table>
                        </div>

					</div>
				</div>
                
				<div class="row">
					<div class="col-lg-12">
						<h5>2. Penilaian terhadap mahasiswa MAGANG secara umum (dalam skala 1-100)</h5>
						<input name="nilai" class="form-control" placeholder="1-100" value="<?php echo $data3['nilai'] ?>" readonly>
					</div>
				</div>
                <!-- /.row -->
				<div class="row">
                    <div class="col-lg-6">
							<h4>C.	Catatan Bagi Mahasiswa dan Politeknik Batam </h4>
							<div class="form-group">
                                <label for="disabledSelect">1. Bagi mahasiswa</label>
                                <textarea name="kesan" class="form-control" readonly><?php echo $data3['catatan1']?></textarea>
                            </div>
							<div class="form-group">
								<label>2. Bagi Politeknik Batam mengenai pelaksanaan MAGANG:</label>
								<textarea name="kendala" class="form-control" readonly><?php echo $data3['catatan2']?></textarea>
								<!-- <p class="help-block">Example block-level help text here.</p> -->
                            </div>
							<div class="form-group">
								<label>3. Apakah mahasiswa yang melaksanakan magang di perusahaan/instansi akan langsung diterima di tempat anda setelah selesai melaksanakan MAGANG</label>
								<textarea name="masukan" class="form-control" readonly><?php echo $data3['catatan3']?></textarea>
								<!-- <p class="help-block">Example block-level help text here.</p> -->
                            </div>
							
							<!--<button name="tblEdit" type="submit" class="btn btn-default">Simpan</button> 
							<button name="batal" type="submit" class="btn btn-default">Batal</button> -->
					</div>
				</div>
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