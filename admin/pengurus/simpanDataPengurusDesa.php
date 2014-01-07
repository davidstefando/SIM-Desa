<?
	include("../../koneksi.php");
		$nama = $_POST['nama'];
		$jabatan  = $_POST['jabatan'];
		$jk = $_POST['jk'];
		$tempat = $_POST['tempat'];
		$tgl = $_POST['tgl'];
		$telp = $_POST['telp'];
		$alamat = $_POST['alamat'];
		$no = $_POST['no'];
		
		
		
		mysql_query("INSERT INTO pengurus_desa VALUES ('id','$nama','$jk','$tempat $tgl','$alamat','$telp','$jabatan','$no')") or die(mysql_error());
	
	
		echo "Data Berhasil Disimpan"
?>