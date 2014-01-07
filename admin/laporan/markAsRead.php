<?
	include("../../koneksi.php");
	mysql_query("UPDATE laporan SET mark = 1 WHERE Id = '$_GET[id]'") or die(mysql_error());


?>