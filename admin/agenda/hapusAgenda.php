<?
	include("../../koneksi.php");
	$id = $_POST['id'];
	mysql_query("DELETE FROM agenda WHERE Id = $id") or die(mysql_error());
	echo "data telah dihapus";
	
?>