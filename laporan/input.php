<?
	include("../koneksi.php");
	
	$nama = $_POST['nama'];
	if(isset($_POST['tujuan1'])){$tujuan1 = $_POST['tujuan1'];}
	else{$tujuan1 = "";}
	
	if(isset($_POST['tujuan2'])){$tujuan2 = $_POST['tujuan2'];}
	else{$tujuan2 = "";}
	
	if(isset($_POST['tujuan3'])){$tujuan3 = $_POST['tujuan3'];}
	else{$tujuan3 = "";}
	
	$judul = $_POST['judul'];
	$isi = $_POST['isi'];
	$alamat = $_POST['alamat'];
	$telp = $_POST['telp'];
	$tgl=date ("d-F-Y");
	date_default_timezone_set("Asia/Jakarta");
	$waktu=date("H:i:s");
	

	
	$insertQuery = "INSERT INTO laporan VALUES ('id','$nama','$tgl','$waktu','$judul','$isi','$alamat','$telp','$tujuan1$tujuan2$tujuan3',0)";
	$q = mysql_query($insertQuery) or die(mysql_error());
	
	if($q){
		echo "<script>
						alert('Pesan telah terkirim, terimakasih atas kerjasamanya');
						window.location = 'laporan.php';
				 </script>
		";
	}
	

?>