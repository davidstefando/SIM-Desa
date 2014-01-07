<!--<a href="editorArtikel.php?action=baru" class="btn btn-large btn-block btn-success tulis">Tulis Artikel</a>
<a href="editorArtikel.php?action=kategori" class="btn btn-large btn-block btn-warning kategori">Tambah Kategori</a>-->
	<div class="page-header">
		<h2>Daftar Artikel</h2>
	</div>
	
	<table class="table">
		<tr>
			<td>No</td>
			<td>Judul</td>
			<td>Di Tulis</td>
			<td>Dibaca</td>
			<td>Kategori</td>
		</tr>

<?
	include("../../koneksi.php");
	$i = 0;
	session_start();
	$selectArtikelKu = mysql_query("SELECT * FROM artikel WHERE IdPenulis = '$_SESSION[id]'") or die(mysql_error());
	
	while($row = mysql_fetch_array($selectArtikelKu)){
		++$i;
		$q = mysql_query("SELECT * FROM kategori WHERE Id = '$row[Kategori]'") or die(mysql_error());
		$kategori = mysql_fetch_array($q);
		echo "
				<tr>
					<td>$i</td>
					<td>$row[Judul]</td>
					<td>$row[Dibuat]</td>
					<td>$row[Dibaca] kali</td>
					<td>$kategori[Kategori]</td>
					<td><a href='editorArtikel.php?action=edit&id=$row[Id]' class='edit' data='$row[Id]' onclick='edit($row[Id])'>Edit</a> | <a href='artikel/kelolaArtikel.php?action=hapus&id=$row[Id]' class='hapus' data='$row[Id]' onclick='edit($row[Id])'>Hapus</a>
				</tr>
				";
	}

?>

<script type="text/javascript">
	$(".tulis").click(function(){
				$.ajax({
					type: "GET",
					url: "artikel/editorArtikel.php",
					data : {action : "baru"}
				}).success(function(msg) {
					//alert(msg);
					$(".content").html(msg);
					
				});
				return false;
			});
			
		$(".kategori").click(function(){
				$.ajax({
					type: "GET",
					url: "artikel/editorArtikel.php",
					data : {action : "kategori"}
				}).success(function(msg) {
					//alert(msg);
					$(".content").html(msg);
					
				});
				return false;
			});
			
			$(".daftar").click(function(){
				$.ajax({
					type: "GET",
					url: "artikel/artikel.php",
					data : {action : "kategori"}
				}).success(function(msg) {
					//alert(msg);
					$(".content").html(msg);
					
				});
				return false;
			});
			
			
	idArtikel = "";		
	function edit(id){
		idArtikel = id;
	}	
	
	$(".edit").click(function(){
				
				$.ajax({
					type: "GET",
					url: "artikel/editorArtikel.php",
					data : {action : "edit" , id : idArtikel}
				}).success(function(msg) {
					$(".content").html(msg);
				});
				return false;
				
			});
			
		$(".hapus").click(function(){
				
				$.ajax({
					type: "GET",
					url: "artikel/kelolaArtikel.php",
					data : {action : "hapus" , id : idArtikel}
				}).success(function(msg) {
					$(".content").html(msg);
				});
				return false;
				
			});
</script>