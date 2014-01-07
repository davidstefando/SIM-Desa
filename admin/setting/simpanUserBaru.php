<?
		include("../../koneksi.php");
		$username=$_POST['username'];
		$password=md5($_POST['password']);
		$nama=$_POST['nama'];
		$level=$_POST['level'];
		$jk=$_POST['jk'];
		$alamat=$_POST['alamat'];
		$tempat=$_POST['tempat'];
		$tgl=$_POST['tgl'];
		$telp=$_POST['telp'];
		$user=mysql_query("insert into user (Username,Password,Level) values ('$username','$password','$level')") or die (mysql_error());
		$datauser=mysql_query("insert into datauser (Nama,Alamat ,TTL,JK,Telp) values ('$nama','$alamat','$tempat , $tgl','$jk','$telp')") or die (mysql_error());
		
		echo "data berhasil disimpan";
?>