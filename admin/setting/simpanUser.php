
<?
		session_start();
		include("../../koneksi.php");
		$username=$_POST['username'];
		$nama=$_POST['nama'];
		$alamat=$_POST['alamat'];
		$TTL=$_POST['TTL'];
		$telp=$_POST['telp'];
		
		if(isset($_POST['password'])){
			$password=md5($_POST['password']);
			$user=mysql_query("UPDATE user SET Username = '$username' , Password = '$password' WHERE Id = '$_SESSION[id]'") or die (mysql_error());
		}
		else{
			$user=mysql_query("UPDATE user SET Username = '$username' WHERE Id = '$_SESSION[id]'") or die (mysql_error());
		}
		
		$datauser=mysql_query("UPDATE datauser SET Nama = '$nama' , Alamat = '$alamat' , TTL = '$TTL' , Telp = '$telp' WHERE Id = '$_SESSION[id]'") or die (mysql_error());
		
		echo "data berhasil diedit";
?>
