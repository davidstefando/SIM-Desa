<?
	include("../../koneksi.php");
	$RW = $_POST['rw'];
	$jumlahRT = mysql_num_rows(mysql_query("SELECT count(RT) FROM pengurus_rt WHERE RW = 'RW$RW' GROUP BY RT"));
	++$jumlahRT;
	echo "<input type='text' name='rt' id='rt' value='$jumlahRT'>";

?>