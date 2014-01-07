
<?
	include("../../koneksi.php");
	$selectDataWarga = mysql_query("SELECT * FROM kk ORDER BY RW ASC");
	echo "
	<table class=\"table table-hover table-bordered table-condensed\">
			<tr class=\"success\">
				<td class=\"span1\"><center>RT</center></td>
				<td class=\"span1\"><center>Nama KK</center></td>
				<td class=\"span1\" ><center>Alamat</center></td>
				<td class=\"span1\" ><center>Jumlah Keluarga</center></td>
				<td class=\"span1\" ><center>No Telp</center></td>
				<td class=\"span2\"><center>Kelola</center></td>
			</tr>
	";
	$RT = 0;	
	$RW = 0;
	$id = 0;
	while($row = mysql_fetch_array($selectDataWarga)){
	$id++;

	if($RW != $row['RW']){
	$RT = 0;
	echo "	
			<tr>
				<td colspan=\"6\"><center><label class=\"label label-inverse\">RW $row[RW]</label></center></td>
			</tr>
			";
	}
	$RW = $row['RW'];

	if($RT != $row['RT']){
	echo "	
			<tr>
				<td colspan=\"6\"><label class=\"label label-inverse\">$row[RT]</label></td>
			</tr>
			";
	$RT = $row['RT'];
	}
	echo "
		<tr class=\"error\">
			<td></td>
			<td><center>$row[NamaKK]</center></td>
			<td ><center>$row[Alamat]</center></td>
			<td><center>$row[JumlahKeluarga]</center></td>
			<td><center>$row[NoTelp]</center></td>
			<td><center><a href='#' id='$row[IdKK]' nama='$row[NamaKK]' class='edit label label-info'>Edit</a> | <a href='#' id='$row[IdKK]' class='tambah label label-warning'>tambah</a> | <a href='#' id='$row[IdKK]' class='hapus label label-important'>hapus</a></center></td>
		</tr>
		";
	}
	echo "</table>";

?>

</div>
</div>
</div>
<script src="../bootstrap/js/jquery-1.9.1.min.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>

<script type="text/javascript">
		$(".hapus").click(function(){
				
				$.ajax({
					type: "POST",
					url: "KK/kelolaKK.php?action=hapus",
					data: {id : $(this).attr('id')}
				}).success(function(msg) {
					$.ajax({
							type: "POST",
							url: "KK/daftarKKDgEdit.php"
						}).success(function(msg) {
							$(".content").html(msg);
					});
				});
				return false;
				
			});
		
		$(".edit").click(function(){
				
				$.ajax({
					type: "POST",
					url: "KK/editKK.php", 
					data: {id : $(this).attr('id'), nama : $(this).attr('nama')}
				}).success(function(msg) {
					$(".content").html(msg);
				});
				return false;
				
			});
			
		$(".tambah").click(function(){
				
				$.ajax({
					type: "POST",
					url: "KK/tambahDataKK.php", 
					data: {id : $(this).attr('id')}
				}).success(function(msg) {
					$(".content").html(msg);
				});
				return false;
				
			});
</script>
