<?
	$id = $_GET['post'];
	$dibaca  = 0;
	$query=mysql_query("SELECT * FROM artikel a INNER JOIN datauser b ON a.IdPenulis = b.Id WHERE a.Id=$id") or die (mysql_error()); //pilih artikel berdasarkan ID
	while($baris=mysql_fetch_array($query)){
		$dibaca = $baris['Dibaca'] + 1;
		mysql_query("UPDATE artikel SET Dibaca=$dibaca WHERE id=$id") or die(mysql_error());//menambah jumlah pembaca		
		echo "
				<div class=\"artikel\">
					<div class=\"judul\">
						$baris[Judul]
					</div>
					<div class=\"penulis\">
						$baris[Nama]
					</div>
					<div class=\"tanggal\">
						Dibuat : $baris[Dibuat], Diedit : $baris[Diedit], Dibaca : $baris[Dibaca]
					</div>
					<br>
					$baris[Isi]
				</div>
				";
		
			}
	



?>