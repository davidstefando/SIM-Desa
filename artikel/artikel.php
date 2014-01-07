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
					if(isset($_GET['post']))
					{
						include("post.php");
					}
					elseif(isset($_GET['page'])){
						include("view.php"); 	
					}
					elseif(isset($_GET['kategori'])){
						include("kategorial.php");
					}
				?>
			</div>
		</div>
	</body>
</html>