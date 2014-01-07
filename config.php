<?
	include("koneksi.php");	
	function implement($namaSetting){
		$selectSetting = mysql_query("SELECT * FROM setting WHERE Nama = '$namaSetting'") or die(mysql_error());
		$row = mysql_fetch_array($selectSetting);
		return $row['Isi'];
	}
?>
