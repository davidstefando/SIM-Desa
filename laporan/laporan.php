 <html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>

<form action="input.php" method="post">
	<div id="form">
		<div id="keterangan">
			Laporan <hr><br>
			<font id="about">
				
				<p>Apakabar? Selamat datang di pusat pelayanan masyarakan secara online. </p>
				<p>Disini anda dapat menyalurkan aspirasi anda dan akan kami tanggapi secepat mungkin, jika anda menerangkan identitas anda secara jelas</p>
				<p>Jika anda memiliki keluhan, saran, pendapat, solusi, kritik, permasalahan, laporan, dan berbagai kejadian lain, Segera laporkan kepada pengurus website, pengurus desa, atau pengurus RT/RW anda demi kenyamanan bersama. Pesan yang
					 anda kirimkan akan segera kami tanggapi.</p><br>
				<hr>
				<? include("../config.php"); echo implement("Sub Artikel"); ?><br>
				
				<a href="../index.php">Menu Utama</a>
			</font>
		</div>
		<form method="post" action="input.php">
				<input type="text" name="nama" id="nama" placeholder="Nama">
				<div id="checkbox">
					<input type="checkbox" name="tujuan1" value="A" checked>Pengurus website
					<input type="checkbox" name="tujuan2" value="B" checked>Pengurus desa 
					<input type="checkbox" name="tujuan3" value="C" checked>RT/RW
				</div>
				<input type="text" name="judul" id="judul" placeholder="Judul">
				<textarea cols=50 rows=10 name="isi" id="isi" placeholder="Isi"></textarea>
				<input type="text" name="alamat" id="alamat" placeholder="Alamat">
				<input type="text" name="telp" id="telp" placeholder="Telepon">
				<input type="submit" value="" id="kirim"> 
		</form>
	</div>
</form>

</body>
</html>