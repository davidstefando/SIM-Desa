<?
	echo "<br><div id='formSetting'>
					<span class='label label-success'>Tambah Data Anggota Keluarga</span>
					<form method='post' class='form-horizontal dataKK'>
					<br><br>
					<input type='hidden' name='id' value='$_POST[id]'>
						<div class='control-group'>
							<label class='control-label' for='nama'>Nama</label>
							<div class='controls'>
								<input type='text' name='nama' id='nama' required>
							</div>
						</div>
						<div class='control-group'>
							<label class='control-label' for='status'>Status</label>
							<div class='controls'>
								<input type='text' name='status' id='status'  required>
							</div>
						</div>
						<div class='control-group'>
							<div class='controls'>
							Jenis Kelamin
							<label class='radio'>
								<input type='radio' name='jk' value='laki-laki' id='laki' checked>
								Laki-Laki
							</label>
							<label class='radio'>
								<input type='radio' name='jk' value='perempuan' id='perempuan'>
								Perempuan
							</label>
							</div>
						</div>
						<div class='control-group'>
							<label class='control-label' for='tempat' >TTL</label>
							<div class='controls'>
								<input type='text' name='tempat' required>, <input type='date' name='tgl' class='span3' required>
							</div>
						</div>
						<div class='control-group'>
							<label class='control-label' for='pekerjaan'>Pekerjaan</label>
							<div class='controls'>
								<input type='text' name='pekerjaan'  id='pekerjaan' required>
							</div>
						</div>
						<div class='control-group'>
							<label class='control-label' for='alamat'>Alamat</label>
							<div class='controls'>
								<input type='text' name='alamat' id='alamat' required>
							</div>
						</div>
						<div class='control-group'>
							<label class='control-label' for='no'>No Identitas</label>
							<div class='controls'>
								<input type='text' name='no' id='no' required>
							</div>
						</div>
						<div class='control-group'>
							<div class='controls'>
								<input type='submit' name='submit' value='Tambah' class='simpan btn btn-large btn-primary' onclick='return false;'>
							</div>
						</div>
						</form>
						</div>";
						
						
?>

	<script>
		
		$(".simpan").click(function(){
				$.ajax({
						type: "POST",
						url: "KK/kelolaKK.php?action=simpan_data_kk",
						data: $(".dataKK").serialize(), // serializes the form's elements.
						success: function(data)
						{
							alert(data);
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
	
		
	</script>