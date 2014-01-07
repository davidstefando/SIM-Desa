<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	
	<body>
		<? include("config.php") ?>
		<div class="container-fluid row-fluid">
			<font size="+4" color="white" face="calibri">Sistem Informasi Desa</font><br>
			<font size="+2" color="white" face="arial"><? echo implement("Nama Desa"); ?></font>
			<a href="admin/" class="btn btn-danger pull-right">Login</a>
		</div>
		
		<table id="menuUtama">    
			<tr>
				<td><a href="pengurus/" ><img src="./img/menu1.png" id="menu1"/></a></td>
				<td><a href="dataKK/"><img src="./img/menu2.png"  id="menu2"/></a></td>
				<td><a href="artikel/artikel.php?page=1" ><img src="./img/menu3.png" id="menu3"/></a></td>
			</tr>
			<tr>
				<td><a href="agenda/" ><img src="./img/menu4.png" id="menu4"/></a></td>
				<td><a href="laporan/laporan.php"><img src="./img/menu5.png"  id="menu5"/></a></td>
			</tr>
		</table>
		</div>
	
	</body>
</html>