<?
	include("../../koneksi.php");
	$RW = $_POST['rw'];
	$jumlahRT = mysql_num_rows(mysql_query("SELECT count(RT) FROM pengurus_rt WHERE RW = 'RW$RW' GROUP BY RT"));
	echo "<select name='rt' id='rt'>";
		for($i = 1;$i <= $jumlahRT;$i++){
			echo "	<option value='$i'>RT $i</option>";
		}
	echo"</select>";

?>