<?php
	include("../../koneksi.php");
	$action = $_GET['action'];
	
	if($action == "hapus_pengurus_desa"){
		$id = $_POST['id'];
		mysql_query("DELETE FROM pengurus_desa WHERE Id = $id") or die(mysql_error());
		echo("Data Berhasil Dihapus");
	}
	else if($action == "simpan_pengurus_desa"){
		$id = $_POST['id'];
		
		$nama = $_POST['nama'];
		$jabatan  = $_POST['jabatan'];
		$ttl = $_POST['ttl'];
		$telp = $_POST['telp'];
		$alamat = $_POST['alamat'];
		$no = $_POST['no'];
		
		
		
		mysql_query("UPDATE pengurus_desa SET Nama = '$nama', TTL = '$ttl', Alamat = '$alamat',Telp = '$telp',Jabatan = '$jabatan',NoIdentitas = '$no' WHERE Id = $id") or die(mysql_error());
	
	
		echo "Data Berhasil Disimpan";
	}
	else if($action == "simpan_pengurus_rt"){
		$nama = $_POST['nama'];
		$jabatan  = $_POST['jabatan'];
		$ttl = $_POST['ttl'];
		$telp = $_POST['telp'];
		$alamat = $_POST['alamat'];
		
		$nameId = $_POST['nameId'];
		
		
		
		mysql_query("UPDATE pengurus_rt SET Nama = '$nama',Jabatan = '$jabatan',TTL = '$ttl',Alamat = '$alamat',Telp = '$telp' WHERE Nama = '$nameId'") or die(mysql_error());
		echo "Data Berhasil Disimpan";
	
	}
	else if($action == "simpan_pengurus_rw"){
		$nama = $_POST['nama'];
		$jabatan  = $_POST['jabatan'];
		$ttl = $_POST['ttl'];
		$telp = $_POST['telp'];
		$alamat = $_POST['alamat'];
	
		$nameId = $_POST['nameId'];
		
		
		mysql_query("UPDATE pengurus_rw SET Nama = '$nama',Jabatan = '$jabatan',TTL = '$ttl',Alamat = '$alamat',Telp = '$telp' WHERE Nama = '$nameId'") or die(mysql_error());
		echo "Data Berhasil Disimpan";
	}
	else if($action == "hapus_pengurus_rt"){
		$nama = $_POST['nama'];
		mysql_query("DELETE FROM pengurus_rt WHERE Nama = '$nama'") or die(mysql_error());
		echo("Data Berhasil Dihapus");
	}
	else if($action == "hapus_pengurus_rw"){
		$nama = $_POST['nama'];
		mysql_query("DELETE FROM pengurus_rw WHERE Nama = '$nama'") or die(mysql_error());
		echo("Data Berhasil Dihapus");
	}

?>