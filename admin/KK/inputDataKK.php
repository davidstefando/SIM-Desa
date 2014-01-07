<?	
	include("../../koneksi.php");
	$nama = $_POST['nama'];
	$alamat = $_POST['alamat']; 
	$jumlahKeluarga = $_POST['jumlahKeluarga'];
	$telp = $_POST['telp'];
	$rw = $_POST['rw'];
	$rt =  $_POST['rt'];
	
	mysql_query("INSERT INTO kk VALUE ('id','$nama','$alamat','$jumlahKeluarga','$telp','$rw','$rt')") or die(mysql_error());
	
	$selectID = mysql_query("SELECT IdKK FROM kk WHERE NamaKK = '$nama'") or die(mysql_error());
	$data = mysql_fetch_array($selectID);
	
	session_start();
	$_SESSION['idKK'] = $data['IdKK'];
	
	echo "
		<div class='page-header'>
			<h1>Data Kepala Keluarga</h1><small>Input data anggota keluarga sesuai jumlah yang telah anda masukkan</small>
		</div>
	<div id='formSetting'>
			<table>
				<tr>
					<td>Nama Kepala Keluarga</td>
					<td>:</td>
					<td>$nama</td>
				</tr>
				<tr>
					<td>Alamat</td>
					<td>:</td>
					<td>$alamat</td>
				</tr>
				<tr>
					<td>Telpon</td>
					<td>:</td>
					<td>$telp</td>
				</tr>
				<tr>
					<td>RT/RW</td>
					<td>:</td>
					<td>RT $rt / RW $rw</td>
				</tr>
			</table>
					<form method='post' class='form-horizontal data'>
						<input type='hidden' name='jml' value='$jumlahKeluarga'>
			";
	
		for($i = 1;$i <= $jumlahKeluarga;$i++){
		echo "
					<br><span class='label label-success'>Data Keluarga ke-$i</span>
					
						<div class='control-group'>
							<label class='control-label' for='nama'>Nama</label>
							<div class='controls'>
								<input type='text' name='nama$i' id='nama' required>
							</div>
						</div>
						<div class='control-group'>
							<label class='control-label' for='status'>Status</label>
							<div class='controls'>
								<input type='text' name='status$i' id='status' required>
							</div>
						</div>
						<div class='control-group'>
							<div class='controls'>
							Jenis Kelamin
							<label class='radio'>
								<input type='radio' name='jk$i' value='laki-laki' id='laki' checked>
								Laki-Laki
							</label>
							<label class='radio'>
								<input type='radio' name='jk$i' value='perempuan' id='perempuan'>
								Perempuan
							</label>
							</div>
						</div>
						<div class='control-group'>
							<label class='control-label' for='tempat' >TTL</label>
							<div class='controls'>
								<input type='text' name='tempat$i' required>, <input type='date' name='tgl$i' class='span3' required>
							</div>
						</div>
						<div class='control-group'>
							<label class='control-label' for='pekerjaan'>Pekerjaan</label>
							<div class='controls'>
								<input type='text' name='pekerjaan$i' id='pekerjaan' required>
							</div>
						</div>
						<div class='control-group'>
							<label class='control-label' for='alamat'>Alamat</label>
							<div class='controls'>
								<input type='text' name='alamat$i' id='alamat' required>
							</div>
						</div>
						<div class='control-group'>
							<label class='control-label' for='no'>No Identitas</label>
							<div class='controls'>
								<input type='text' name='no$i' id='no' required>
							</div>
						</div>
					
				";
	}
	
	echo "
				</form>
				<div class='control-group'>
						<div class='controls'>
							<input type='submit' name='submit' class='simpan btn btn-large btn-primary simpan' onclick='return false'>
						</div>
				</div>
		</div>";
				
?>

	<script src="../../bootstrap/js/jquery-1.9.1.min.js"></script>
	<script src="../../bootstrap/js/bootstrap.min.js"></script>

	<script>
		$("#rw").change(function(){
				$.ajax({
						type: "POST",
						url: "KK/getRT.php",
						data: { rw : $("#rw").val()}, // serializes the form's elements.
						success: function(data)
					    {
						   $(".rt").html(data); // show response from the php script.
					    }
				});
		});
		
		$(".simpan").click(function(){
				$.ajax({
						type: "POST",
						url: "KK/simpanDataKK.php",
						data: $(".data").serialize(), // serializes the form's elements.
						success: function(data)
						{
							alert(data);
							window.location='admin.php';
						}
				});
		});
	</script>