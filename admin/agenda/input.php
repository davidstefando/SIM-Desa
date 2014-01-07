<?
			session_start();
			include("../../koneksi.php");
					$nama=$_POST['nama'];
					$tgl=$_POST['tgl'];
					$waktu=$_POST['waktu'];
					$tempat=$_POST['tempat'];
					$peserta=$_POST['peserta'];
					$panitia=$_POST['panitia'];
					$kegiatan=$_POST['kegiatan'];
					$query=mysql_query("INSERT INTO agenda VALUE (id,'$nama','$tgl','$waktu','$tempat','$peserta','$panitia','$kegiatan','$_SESSION[id]')") or die(mysql_error());
					if($query)
					{ echo "berhasil";}
				
		?>
