<?
			session_start();
			include("../../koneksi.php");
					$id = $_POST['id'];
					$nama=$_POST['nama'];
					$tgl=$_POST['tgl'];
					$waktu=$_POST['waktu'];
					$tempat=$_POST['tempat'];
					$peserta=$_POST['peserta'];
					$panitia=$_POST['panitia'];
					$kegiatan=$_POST['kegiatan'];
					$query=mysql_query("UPDATE agenda SET Nama = '$nama', Tgl = '$tgl', Waktu = '$waktu',Tempat = '$tempat', Peserta = '$peserta', Panitia = '$panitia', Kegiatan = '$kegiatan' WHERE Id = $id") or die(mysql_error());
					if($query)
					{ echo "data berhasil diupdate";}
				
		?>