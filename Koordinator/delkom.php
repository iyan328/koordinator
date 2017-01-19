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
	} else {
		echo "<script>alert('Data Belum Dipilih');document.location='akundosenp.php'</script>";
	}
	$sql = "delete from komponen WHERE komponen='$kode'";
	$kueri = mysql_query($sql);
	if ($kueri){
				echo "<script> document.location='nilai.php'</script>";
			}
			else {
				echo "<script> alert('Data gagal dihapus')</script>";
				echo mysql_error();
			}
	?>