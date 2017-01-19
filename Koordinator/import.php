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
                        <a href="import.php"><i class="fa fa-fw fa-book"></i> Import Data</a>
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
                            Import Data <small><?php echo $nama?></small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i> <a href="homek.php"> Dashboard </a>
                            </li>
							<li class="active">
                                <i class="fa fa-book"></i> Import Data
                            </li>
                        </ol>
                    </div>
                </div>
				<form action="" method="post" enctype="multipart/form-data" name="form1">
                <!-- /.row -->
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
							document.form1.kelas.style.display="block";
						}
						else{
							document.form1.kelas.style.display="none";
						}
					}
				</script>
				<div class="row">
                    <div class="col-lg-3">
						<div class = "form-group">
							<!--<label>Pilih Kelas</label>-->
							<select class="form-control" name="kelas" id="kelas">
								<option value="">Pilih Kelas</option>
								<option value="reguler">Reguler</option>
								<option value="karyawan">Karyawan</option>
							</select>
						</div>
					</div>
                </div>
                <!-- /.row -->

                <div class="row">
					<div class="col-lg-12">
						<div class="form-group">
							<label>Pilih File .xls</label> <input name="import" type="file" required>
						</div>
						<button class="btn btn-default" name="simpan" id="simpan" type="submit">Import</button>
					</div>
				</div>
                <!-- /.row -->

                <!-- /.row -->

            </div>
			</form>
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
if(isset($_POST['simpan'])){
$value=$_POST['data'];
$kelas1=$_POST['kelas'];

//menggunakan class phpExcelReader
require_once 'excel_reader.php';

//koneksi ke database
include "koneksi.php";

//membaca file excel yang diupload
$data = new Spreadsheet_Excel_Reader($_FILES['import']['tmp_name']);

//membaca jumlah baris dari excel
$baris=$data->rowcount($sheet_index=0);

//nilai awal counter jumlah data yang sukses dan yang gagal di import
$sukses=0;
$gagal=0;

//jika data yang dipilih dosen
		if($value=='dosen'){
//import data excel dari baris kedua
for($i=2;$i<=$baris;$i++){
	//membaca data nama
	$nama=$data->val($i,1);
	$nik=$data->val($i,2);
	

	//insert kedalam tabel dosen
	   $simpan = mysql_query("INSERT INTO dosen VALUES ('$nama', '$nik')");
	   if($simpan){
		   $sukses++;
		   echo "<script> document.location='../koordinator/import.php'</script>";
		   
	   }else{
		   $gagal++;
		   echo "<script>alert('data gagal di import'); document.location='../koordinator/import.php'</script>";
	   }
		}
		}
		//jika data yang dipilih mahasiswa
		else{
			
//import data excel dari baris kedua
for($i=2;$i<=$baris;$i++){
	//membaca data nama
	$nim=$data->val($i,1);
	$nama=$data->val($i,2);
	$kelas=$data->val($i,3);
	$prodi=$data->val($i,4);
			
		$simpan = mysql_query("INSERT INTO mahasiswa VALUES ('$nim', '$nama', '$kelas', '$prodi', '$kelas1')");
	   if($simpan){
		   $sukses++;
		   echo "<script> document.location='../koordinator/import.php'</script>";
		   
	   }else{
		   $gagal++;
		   echo "<script>alert('data gagal di import'); document.location='../koordinator/import.php'</script>";
	   }
		}
		}
}

?>
