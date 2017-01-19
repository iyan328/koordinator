	<?php
	include "koneksi.php";
			if(isset($_GET['kode'])){
			$kode = $_GET['kode'];
			}
			$sql2 = "select * from perusahaan where perusahaan = '$kode'";
			$kueri2 = mysql_query($sql2);
			$data2 = mysql_fetch_array($kueri2);
			$kode1 = $data2['perusahaan'];
?>			
<html>
<body>
<form action="" method="post">

<div>
                <label for="nama">Nama</label>
				<input name="nama" type ="text" id="nama" value = "<?php echo $kode1?>" readonly/>
            </div>
			
	<select name="dp">
		<option value>Pilih Pembimbing</option>
			<?php
				include "koneksi.php";
				$sql1 = "SELECT * FROM p_poltek";
				$kueri1 = mysql_query($sql1);
				$no=1;
				while($data1 = mysql_fetch_array($kueri1)){
			?>
		<option value="<?php echo $data1['nama_p']?>"><?php echo $data1['nama_p']?></option>
			<?php
				$no++;}
			?>
	</select>
	
	<input name="tblsimpan" type="submit" id="tblsimpan" value="Simpan"/>
	
	</form>
	</body>
	</html>
	
	<?php
	include "koneksi.php";
	
	if (isset($_POST['tblsimpan'])){
			$nama = $_POST['dp'];
			$nama1=$_POST['nama'];
			$sql = "INSERT INTO pembimbing values(Null,'$nama1','Null','$nama')";
			$kueri = mysql_query($sql);
		if ($kueri){
				echo "<script> document.location='homek.php'</script>";
			}
		else {
				echo "<script> alert('Dosen gagal dimasukkan ke database');document.location='daftar.php'</script>";
				echo mysql_error();
			}
	
	}
			
	?>