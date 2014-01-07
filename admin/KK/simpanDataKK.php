<?
	include("../../koneksi.php");
	session_start();
	

	
	for($i = 1;$i <= $_POST['jml'];$i++){
		$nama = $_POST['nama' . $i];
		$status  = $_POST['status' . $i];
		$jk = $_POST['jk' . $i];
		$tempat = $_POST['tempat' . $i];
		$tgl = $_POST['tgl' . $i];
		$pekerjaan = $_POST['pekerjaan' . $i];
		$alamat = $_POST['alamat' . $i];
		$no = $_POST['no' . $i];
		
		
		mysql_query("INSERT INTO dataKK VALUES ('$_SESSION[idKK]','$status','$nama','$jk','$tempat $tgl','$pekerjaan','$no','$alamat')") or die(mysql_error());
	}
	
	echo "Data Berhasil Disimpan"
?>