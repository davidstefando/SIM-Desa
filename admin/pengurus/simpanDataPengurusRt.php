<?
	include("../../koneksi.php");
	session_start();
	for($i = 1;$i <= $_POST['jml'];$i++){
		$nama = $_POST['nama' . $i];
		$jabatan  = $_POST['jabatan' . $i];
		$jk = $_POST['jk' . $i];
		$tempat = $_POST['tempat' . $i];
		$tgl = $_POST['tgl' . $i];
		$telp = $_POST['telp' . $i];
		$alamat = $_POST['alamat' . $i];
		$no = $_POST['no' . $i];
		
		$RW = $_POST['rw'];
		$RT = $_POST['rt'];
		
		mysql_query("INSERT INTO pengurus_rt VALUES ('RW$RW','RT$RT','$nama','$jabatan','$jk','$tempat $tgl','$alamat','$telp')") or die(mysql_error());
	}
	
	echo "Data Berhasil Disimpan"
?>