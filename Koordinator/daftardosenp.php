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
                            Dosen Pembimbing <small><?php echo $nama?></small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i> <a href="homek.php"> Dashboard </a>
                            </li>
							<li class="active">
                                <i class="fa fa-edit"></i> Dosen Pembimbing
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
				 <div class="row">
                    <div class="col-lg-3 form-group">
                       <form action="" method="post">
						<label>Dosen Pembimbing</label>
						<select class="form-control form-group" name="dosen" required>
							<option value>Pilih Dosen Pembimbing</option>
								<?php
								include "koneksi.php";
								//$userr=$_POST['user'];
								//$sql6 = "SELECT * FROM akun where username='$userr'";
								//$kueri6 = mysql_query($sql6);
								//$data6 = mysql_fetch_array($kueri6);
								$sql2 = "SELECT * FROM dosen";
								$kueri2 = mysql_query($sql2);
								$no=1;
								while($data2 = mysql_fetch_array($kueri2)){
									//$name=$data2['nama'];
								?>
								<option value="<?php echo $data2['nama']?>"><?php echo $data2['nama']?></option>
								<?php
								$no++;}
								?>
						</select>
							<!--<div class="form-group">
								<label>NIK</label>
								<input name="nik" type="text" class="form-control" placeholder="NIK" required>
								<!-- <p class="help-block">Example block-level help text here.</p> 
                            </div> -->
							<div class="form-group">
                                <label for="disabledSelect">Username</label>
                                <input name="user" class="form-control" id="disabledInput" type="text" placeholder="Username" required>
                            </div>
							<div class="form-group">
								<label>Password</label>
								<input name="pass" type="password" class="form-control" placeholder="Password" required>
								<!-- <p class="help-block">Example block-level help text here.</p> -->
                            </div>
						<!-- <input class="btn btn-default " name="tampilkan" type="submit" id="tampilkan" value="Tampilkan"/> -->
					 
                    </div>
                </div>
               
                <!-- /.row -->

                <div class="row">
				<div class="col-lg-12">
					<div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
										<th>Nim</th>
										<th>Perusahaan</th>
										
										<th>Pilih</th>
                                    </tr>
                                </thead>
                                <tbody>
									<?php
						include "koneksi.php";
						//if (isset($_POST['tampilkan'])){
								$sql1 = "SELECT * FROM magang where s_seleksi='Diterima' and prodi='$pro'";
								$kueri1 = mysql_query($sql1);
								$no=1;
								while($data1 = mysql_fetch_array($kueri1)){
									$nim2=$data1['nim'];
									$pe=$data1['perusahaan'];
									$sql4 = "SELECT * FROM pembimbing where nim='$nim2'";
									$kueri4 = mysql_query($sql4);
									$data4 = mysql_fetch_array($kueri4);
									$nma = $data4['nama'];
									$sql7 = "SELECT * FROM p_poltek where nama='$nma'";
									$kueri7 = mysql_query($sql7);
									$data7 = mysql_fetch_array($kueri7);
									$nma1 = $data7['nama'];
									$sql3 = "SELECT * FROM mahasiswa where nim='$nim2'";
									$kueri3 = mysql_query($sql3);
									$data3 = mysql_fetch_array($kueri3);
									if($nma==$nma1 && $nma!="" && $nma1!=""){
										//echo"asdasd";
									} else{
										
									
									?>
									<tr>
									<td><?php echo $data3['nama']?></td>
									<td><?php echo $data1['nim']?></td>
									<td><?php echo $data1['perusahaan']?></td>
									
									<td><input name ="ck[]" type="checkbox" value="<?php echo $data1['nim']?>"></td>
									</tr>
								<?php
							$no++;} }
							//}
							?>
                                </tbody>
                            </table>
							
                        </div>
                </div>
				</div>
                <!-- /.row -->
				<div class="row">
                    <div class="col-lg-12">
						<input class="btn btn-default" name="tambah" type="submit" id="tambah" value="Simpan"/>
                    </div>
                </div>
                <!-- /.row -->
				</form>
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
			$ck = $_POST['ck'];
			$username = $_POST['user'];
			$password = $_POST['pass'];
			$nama = $_POST['dosen'];
			$nik = $_POST['nik'];
			$kelas = $_POST['kelas'];
			$prodi = $_POST['prodi'];
			$sql2 = "SELECT* from akun where username = '$username'";
			$kueri2 = mysql_query($sql2);
			$data2 = mysql_fetch_array($kueri2);
			$akun2 = $data2['username'];
			if($akun2==""){
			$sql = "INSERT INTO akun values('$username','$password','dosenpembimbing')";
			$kueri = mysql_query($sql);
			
			for ($i=0; $i<sizeof($ck);$i++){
				$sql3 = "INSERT INTO pembimbing values(NULL,'$pe','$ck[$i]','$nama')";
			$kueri3 = mysql_query($sql3);
			}
			
			$sql4 = "SELECT* from pembimbing where nama = '$nama'";
			$kueri4 = mysql_query($sql4);
			$data4 = mysql_fetch_array($kueri4);
			$nama1 = $data4['nama'];
			$q_nik="select nik from dosen where nama='$nama1'";
			$cek_nik=mysql_query($q_nik);
			$data_nik=mysql_fetch_array($cek_nik);
			$nik1=$data_nik['nik'];
			$sql1 = "INSERT INTO p_poltek values('$username','$nama1','$nik1')";
			$kueri1 = mysql_query($sql1);
			if ($kueri && $kueri1){
				echo "<script> document.location='homek.php'</script>";
			}
			else {
				echo "<script> alert('Data gagal dimasukkan ke database');document.location='daftardosenp.php'</script>";
				echo mysql_error();
			}
			}else{
			
			for ($i=0; $i<sizeof($ck);$i++){
				$sql3 = "INSERT INTO pembimbing values(NULL,'$pe','$ck[$i]','$nama')";
			$kueri3 = mysql_query($sql3);
			}
			
			$sql4 = "SELECT* from pembimbing where nama = '$nama'";
			$kueri4 = mysql_query($sql4);
			$data4 = mysql_fetch_array($kueri4);
			$nama1 = $data4['nama'];
			$sql1 = "INSERT INTO p_poltek values('$username','$nama1','$nik')";
			$kueri1 = mysql_query($sql1);
			if ($kueri1 && $kueri3){
				echo "<script> document.location='homek.php'</script>";
			}
			else {
				echo "<script> alert('Akun gagal dimasukkan ke database');document.location='daftardosenp.php'</script>";
				echo mysql_error();
			}
			}

		}
		if (isset($_POST['batal'])){
		echo "<script> document.location='homek.php'</script>";
		
		}
		?>			
	