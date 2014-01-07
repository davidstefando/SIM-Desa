<?
	include("../../koneksi.php");
	$action = $_GET['action'];
	$id = $_POST['id'];
	
	if($action == "hapus"){
		mysql_query("DELETE FROM kk WHERE IdKK = $id") or die(mysql_error());
		mysql_query("DELETE FROM dataKK WHERE IdKK = $id") or die(mysql_error());
		
	}
	else if($action == "simpan"){
		
		$namaKK = $_POST['namaKK'];
		$telp = $_POST['telp'];
		$alamat = $_POST['alamat'];
		$rt = $_POST['rt'];
		$rw = $_POST['rw'];
		
		mysql_query("UPDATE kk SET NamaKK = '$namaKK' , NoTelp = '$telp' , Alamat = '$alamat' , RT = '$rt', RW = '$rw' WHERE IdKK = $id") or die(mysql_error());
		
		for($i = 1;$i <= $_POST['jml'];$i++){
			$namaKK = $_POST['namaKK' . $i];
			$nama = $_POST['nama' . $i];
			$status  = $_POST['status' . $i];
			$ttl = $_POST['ttl' . $i];
			$pekerjaan = $_POST['pekerjaan' . $i];
			$alamat = $_POST['alamat' . $i];
			$no = $_POST['no' . $i];

			mysql_query("UPDATE dataKK SET Status = '$status',Nama = '$nama',TTL = '$ttl',Pekerjaan = '$pekerjaan',NoIdentitas = '$no',Alamat = '$alamat' WHERE Nama = '$namaKK' AND IdKK = $id") or die(mysql_error());
	}
	
	//echo "Data Berhasil Disimpan";
	}
	else if($action == "simpan_data_kk"){
				$nama = $_POST['nama'];
				$status  = $_POST['status'];
				$jk = $_POST['jk'];
				$tempat = $_POST['tempat'];
				$tgl = $_POST['tgl'];
				$pekerjaan = $_POST['pekerjaan'];
				$alamat = $_POST['alamat'];
				$no = $_POST['no'];
			
			mysql_query("INSERT INTO dataKK VALUES ('$id','$status','$nama','$jk','$tempat $tgl','$pekerjaan','$no','$alamat')") or die(mysql_error());
			echo "data berhasil ditambah";
			
	}
	else if($action == "hapus_data_kk"){
		mysql_query("DELETE FROM dataKK WHERE Nama = '$id'") or die(mysql_error());
		echo "Data anggota kk berhasil dihapus";
	}
?>