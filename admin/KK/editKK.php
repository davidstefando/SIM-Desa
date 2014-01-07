<?	
	include("../../koneksi.php");

	$id = $_POST['id'];
	$selectKK = mysql_query("SELECT * FROM kk WHERE IdKK = $id")or die(mysql_error());
	$data = mysql_fetch_array($selectKK);
	
	echo "
		<div class='page-header'>
			<h1>Edit Data Kepala Keluarga</h1>
		</div>
	<div id='formSetting'>
		<form method='post' class='form-horizontal data'>
			<table>
				<tr>
					<td>Nama Kepala Keluarga</td>
					<td>:</td>
					<td><input type='text' name='namaKK' value='$data[NamaKK]'></td>
				</tr>
				<tr>
					<td>Alamat</td>
					<td>:</td>
					<td><input type='text' name='alamat' value='$data[Alamat]'></td>
				</tr>
				<tr>
					<td>Telpon</td>
					<td>:</td>
					<td><input type='text' name='telp' value='$data[NoTelp]'></td>
				</tr>
				<tr>
					<td>RT/RW</td>
					<td>:</td>
					<td><input type='text' name='rt' value='$data[RT]' class='span1'>/<input type='text' name='rw' value='$data[RW]' class='span1'></td>
				</tr>
			</table>
					
						
						
						<input type='hidden' name='id' class='id' value='$id'>
						
			";
		$selectAnggotaKK = mysql_query("SELECT * FROM dataKK WHERE IdKK = $id") or die(mysql_error());
		$i = 0;
		while($row = mysql_fetch_array($selectAnggotaKK)){
			$i++;
			echo "
					<br><span class='label label-success'>Data Keluarga ke-$i</span>  <a href='#' id='$row[Nama]' idKK=$id class='delete label label-important' onclick='return false;'>Hapus</a>
					<input type='hidden' name='namaKK$i' value='$row[Nama]'>
						<div class='control-group'>
							<label class='control-label' for='nama'>Nama</label>
							<div class='controls'>
								<input type='text' name='nama$i' id='nama' value='$row[Nama]' required>
							</div>
						</div>
						<div class='control-group'>
							<label class='control-label' for='status'>Status</label>
							<div class='controls'>
								<input type='text' name='status$i' id='status' value='$row[Status]' required>
							</div>
						</div>
						<div class='control-group'>
							<label class='control-label' for='tempat' >TTL</label>
							<div class='controls'>
								<input type='text' name='ttl$i' value='$row[TTL]' required>
							</div>
						</div>
						<div class='control-group'>
							<label class='control-label' for='pekerjaan'>Pekerjaan</label>
							<div class='controls'>
								<input type='text' name='pekerjaan$i' value='$row[Pekerjaan]' id='pekerjaan' required>
							</div>
						</div>
						<div class='control-group'>
							<label class='control-label' for='alamat'>Alamat</label>
							<div class='controls'>
								<input type='text' name='alamat$i' value='$row[Alamat]' id='alamat' required>
							</div>
						</div>
						<div class='control-group'>
							<label class='control-label' for='no'>No Identitas</label>
							<div class='controls'>
								<input type='text' name='no$i' value='$row[NoIdentitas]' id='no' required>
							</div>
						</div>
						
						
				";
	}
	
	echo "
				<div class='control-group'>
						<div class='controls'>
							<input type='submit' name='submit' class='simpan btn btn-large btn-primary' onclick='return false;'>
						</div>
				</div>
				<input type='hidden' name='jml' value='$i'>
				</form>
				
		</div>";
				
?>

	<script src="../../bootstrap/js/jquery-1.9.1.min.js"></script>
	<script src="../../bootstrap/js/bootstrap.min.js"></script>

	<script>
		
		$(".simpan").click(function(){
				$.ajax({
						type: "POST",
						url: "KK/kelolaKK.php?action=simpan",
						data: $(".data").serialize(), // serializes the form's elements.
						success: function(data)
						{
							$.ajax({
								type: "POST",
								url: "KK/daftarKKDgEdit.php",
								success: function(data)
								{
									$(".content").html(data);
									
								}
							});
							
						}
				});
		});
	
	
		$(".delete").click(function(){
				$.ajax({
						type: "POST",
						url: "KK/kelolaKK.php?action=hapus_data_kk",
						data: {id : $(this).attr('id')}, // serializes the form's elements.
						success: function(data)
						{
							alert(data);
							$.ajax({
								type: "POST",
								url: "KK/editKK.php",
								data: {id : $(".id").val()},
								success: function(data)
								{
									$(".content").html(data);
									
								}
							});
							
							
							
							
							
							
						}
				});
		});
		
	</script>