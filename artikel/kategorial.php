<?
	include("pagination.php");
	
	if(isset($_GET['page'])){
		$page = $_GET['page'];
		//total artikel
		$q = mysql_query("SELECT * FROM artikel") or die (mysql_error());
		$jumlah = mysql_num_rows($q);
	}
	else{
		$page = 1;
	}
	
	$begin = ($page * 4)-4;
	
	$kategori = $_GET['kategori'];
	
	$query=mysql_query("SELECT * FROM artikel WHERE Kategori = '$kategori' LIMIT $begin,4") or die (mysql_error());
	while($baris=mysql_fetch_array($query)){
		
		if((strlen($baris['Isi'])) >= 300){
			$caption = substr($baris['Isi'],0,360);
		}
		else{
			$caption = $baris['Isi'];
		}
		
		echo "
				<div class=\"artikel\">
					<div class=\"judul\">
						$baris[Judul]
					</div>
					<div class=\"penulis\">
						$baris[2]
					</div>
					<div class=\"tanggal\">
						Dibuat : $baris[Dibuat], Diedit : $baris[Diedit], Dibaca : $baris[Dibaca]
					</div>
					<br>
					$caption.....
					<div class=\"readMore\"><a href=\"artikel.php?post=$baris[Id]\">Baca Lebih Lanjut..</a></div>
				</div>
				<hr width=\"620px\">
				";
			
			}
			echo "<div id=\"pagination\">";
			echo pagination(4,$page,'artikel.php?page=',$jumlah);
			echo "</div>"; 
			
			
?>