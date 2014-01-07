<html>
	<head>
		<title></title>
		<link rel="stylesheet" type="text/css" href="style.css">
		<link rel="stylesheet" type="text/css" href="pagination.css">
	</head>
	
	<body>
		<? include("../koneksi.php"); include("../config.php");?>
		<div id="container">
			<div id="header">
				<div id="subtitle"><? echo implement("Sub Artikel"); ?></div>
				<div id="menubar">
					<form method="post" action="cariartikel.php">
						<input type="text" size="40" id="search" name="cari"><input type="image" src="./img/search.png" id="search-button" name="submit">
					</form>
					<a href="../index.php" id="home">Menu Utama</a>
				</div>
				
			</div>
			
			<div id="kategori">
				<div id="kategori-content">
					<? include("kategori.php"); ?>
				</div>
			</div>
			<div id=\"content\">
				<? 
					include("pagination.php");
					
					if(isset($_POST['cari'])){
						$cari = $_POST['cari'];
					}
					
					if(isset($_GET['page'])){
						$page = $_GET['page'];
					}
					else{
						$page = 1;
					}
					
					$q = mysql_query("SELECT * FROM artikel") or die (mysql_error());
					$jumlah = mysql_num_rows($q);
					$begin = ($page * 4)-4;
					
					
					
					$query=mysql_query("SELECT * FROM artikel a INNER JOIN datauser b ON a.IdPenulis = b.Id WHERE Isi LIKE '%$cari%' LIMIT $begin,4") or die (mysql_error());
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
									$baris[Nama]
								</div>
								<div class=\"tanggal\">
									Dibuat : $baris[Dibuat], Diedit : $baris[Diedit], Dibaca : $baris[Dibaca]
								</div>
								<br>
								$caption.....
								<div class=\"readMore\"><a href=\"artikel.php?post=$baris[0]\">Baca Lebih Lanjut..</a></div>
							</div>
							<hr width=\"620px\">
							";
						
						}
						echo "<div id=\"pagination\">";
							echo pagination(4,$page,'artikel.php?cari=' . $cari . '&' . 'page=',$jumlah);
						echo "</div>"; 
						
				?>
			</div>
		</div>
	</body>
</html>