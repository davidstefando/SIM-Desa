<?
	echo "<font color=\"white\"><h2>Kategori</h2></font>";
	
	$q = mysql_query("SELECT * FROM kategori") or die(mysql_error());
	
	
	echo "<ul>";
		
		while($baris = mysql_fetch_array($q)){
			echo "<li><a href=\"artikel.php?kategori=$baris[Id]\">$baris[Kategori]</a></li>";
		}
		echo "<li><a href=\"artikel.php?kategori=\">Tanpa Kategori</a></li>";
	echo "</ul>";
	
	echo "<font color=\"white\"><h2>Popular</h2></font>";
	
	$q = mysql_query("SELECT * FROM artikel ORDER BY Dibaca DESC LIMIT 0,10") or die(mysql_error());
	
	
	echo "<ul>";
		
		while($baris = mysql_fetch_array($q)){
			echo "<li><a href=\"artikel.php?post=$baris[Id]\">$baris[Judul]</a></li>";
		}
	echo "</ul>";
	
	

?>