<?
	mysql_connect("localhost","root","") or die("Gagal menghubungkan ke database : " . mysql_error());
	mysql_select_db("sim-desa") or die("Database tidak ada : " . mysql_error());
?>
