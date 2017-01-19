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
	$sql1 = "SELECT * FROM p_poltek WHERE nama='$kode'";
	$kueri1 = mysql_query($sql1);
	$data1 = mysql_fetch_array($kueri1);
	$user = $data1['username'];
	} else {
		echo "<script>alert('Data Belum Dipilih');document.location='lihatdosen.php'</script>";
	}
	$sql = "delete from pembimbing WHERE nama='$kode'";
	$kueri = mysql_query($sql);
	$sql2 = "delete from akun WHERE username='$user'";
	$kueri2 = mysql_query($sql2);
	
	if ($kueri && $kueri2){
				echo "<script> document.location='lihatdosen.php'</script>";
			}
			else {
				echo "<script> alert('Data gagal dihapus')</script>";
				echo mysql_error();
			}
	?>