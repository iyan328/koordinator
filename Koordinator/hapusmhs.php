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
	$user = $data1['username'];
	} else {
		echo "<script>alert('Data Belum Dipilih');document.location='akunmhs.php'</script>";
	}
	$sql = "delete from akun WHERE username='$user'";
	$kueri = mysql_query($sql);
	$sql = "delete from mahasiswa WHERE nim='$kode'";
	$kueri = mysql_query($sql);
	if ($kueri){
				echo "<script> document.location='akunmhs.php'</script>";
			}
			else {
				echo "<script> alert('Data gagal dihapus')</script>";
				echo mysql_error();
			}
	?>