

<?
	$action = $_GET['action'];
	if(isset($_GET['id'])){$id = $_GET['id'];}
	include("../../koneksi.php");
	
	if(isset($_POST['id'])){$idKategori = $_POST['id'];}
	if(isset($_POST['kategori'])){$Kategori = $_POST['kategori'];}
	
	
	switch($action){
		case "baru" :	
							$judul = $_POST['judul'];
							$isi = $_POST['artikel'];
							$kategori = $_POST['kategori'];
							
							$tgl=date ("d-F-Y");
							date_default_timezone_set("Asia/Jakarta");
							$waktu=date("H:i:s");
							session_start();
							$penulis = $_SESSION['id'];
							
							mysql_query("INSERT INTO artikel VALUES ('id','$penulis','$judul','$isi','$tgl $waktu','','$kategori','')") or die(mysql_error());
							
							echo "Artikel Berhasil Ditulis";
	
							
							
							break;
		case "edit" :
							$judul = $_POST['judul'];
							$isi = $_POST['artikel'];
							$id = $_POST['id'];
							
							$tgl=date ("d-F-Y");
							date_default_timezone_set("Asia/Jakarta");
							$waktu=date("H:i:s");
							
							
							
							mysql_query("UPDATE artikel SET Judul = '$judul' , Isi = '$isi' , Diedit = '$tgl $waktu', Kategori = '$Kategori' WHERE Id = '$id'") or die(mysql_error());
							
							echo "Artikel Berhasil Diedit";
							
							
							break;
		case "hapus" :
								mysql_query("DELETE FROM artikel WHERE id = '$id'") or die(mysql_error());
								echo "
											
											<script>
												alert('Artikel Berhasil Dihapus');
											</script>
											
										";
									include('artikel.php');	
								break;
		
		case "kategori" : 
										$nama = $_POST['kategori'];
										mysql_query("INSERT INTO kategori (Kategori) VALUE ('$nama')") or die(mysql_error());
										echo "Kategori Berhasil Di Tambah";
										
										break;
										
		case "hapus_kategori" :
													mysql_query("DELETE FROM kategori WHERE Id = $idKategori") or die(mysql_error());
													mysql_query("UPDATE artikel SET Kategori = '' WHERE Kategori = '$idKategori'") or die(mysql_error());
													break;
								
		case "edit_kategori" :
													mysql_query("UPDATE kategori SET Kategori = '$Kategori' WHERE Id = '$idKategori'") or die(mysql_error());
													mysql_query("UPDATE artikel SET Kategori = '$idKategori' WHERE Kategori = '$idKategori'") or die(mysql_error());
													break;
								
		
	}
	


?>
