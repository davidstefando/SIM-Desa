	
				<?
					include("../../koneksi.php");
					
					function update_setting($nama,$isi){
						$simpanSetting = mysql_query("UPDATE setting SET Isi = '$isi' WHERE Nama = '$nama'") or die(mysql_error());
					}
					
				
						if($_POST['namaDesa'] != ""){
							update_setting('Nama Desa', $_POST['namaDesa']);
						}
						if($_POST['subArtikel'] != ""){
							update_setting('Sub Artikel', $_POST['subArtikel']);
						}
						if($_POST['subLaporan'] != ""){
							update_setting('Sub Laporan', $_POST['subLaporan']);
						}
						echo "Data Berhasil Diupdate";
				?>
				  