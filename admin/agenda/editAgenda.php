<?
	$id = $_POST['id'];
	include("../../koneksi.php");
	
	$selectAgenda = mysql_query("SELECT * FROM agenda WHERE Id = '$id'") or die(mysql_error());
	while($row = mysql_fetch_array($selectAgenda)){
		echo "
					<div id='formSetting'>
						<form action='' method='post' class='form-horizontal agenda'>
							<input type='hidden' name='id' value='$row[Id]'>
							<div class='control-group'>
									<label class='control-label' for='nama'>Nama</label>
										<div class='controls'>
									<input type='text' name='nama' id='nama' placeholder='Ex. Mada' value='$row[Nama]' class='span5'>
								</div>
							</div>
							<div class='control-group'>
									<label class='control-label' for='tanggal'>Tanggal</label>
										<div class='controls'>
									<input type='date' name='tgl' id='tanggal' value='$row[Tgl]' placeholder='Ex. 12 desember 2012' class='span4'>
								</div>
							</div>
							<div class='control-group'>
									<label class='control-label' for='waktu'>Waktu</label>
										<div class='controls'>
									<input type='time' name='waktu' id='waktu' value='$row[Waktu]' placeholder='Ex. 22:40' class='span2'>
								</div>
							</div>
							<div class='control-group'>
									<label class='control-label' for='nama'>Tempat</label>
										<div class='controls'>
									<input type='text' name='tempat' id='nama' value='$row[Tempat]' placeholder='Ex. Mada' class='span5'>
								</div>
							</div>
							<div class='control-group'>
									<label class='control-label' for='peserta'>Peserta</label>
										<div class='controls'>
									<input type='text' name='peserta' id='peserta' value='$row[Peserta]' placeholder='Ex. Sekeluarga' class='span5'>
								</div>
							</div>
							<div class='control-group'>
									<label class='control-label' for='panitia'>Panitia</label>
										<div class='controls'>
									<input type='text' name='panitia' placeholder='Ex. Syauqy' value='$row[Panitia]' id='panitia' class='span5'>
								</div>
							</div>
							<div class='control-group'>
									<label class='control-label' for='kegiatan'>Kegiatan</label>
										<div class='controls'>
											<textarea id='kegiatan' name='kegiatan' rows='5'>$row[Kegiatan]</textarea>
										</div>
							</div>
							<div class='control-group'>
										<div class='controls'>
											<input type='submit' name='submit' value='Simpan' class='btn btn-primary btn-warning submit'>
										</div>
							</div>
							
						</form>
					</div>
				";
	}
?>
<script type="text/javascript">
	$(".submit").click(function() {

			var url = "agenda/kelolaAgenda.php"; // the script where you handle the form input.
			
			$.ajax({
				   type: "POST",
				   url: url,
				   data:$(".agenda").serialize() , // serializes the form's elements.
				   success: function(data)
				   {
					   alert(data); // show response from the php script.
				   }
				 });

			return false; // avoid to execute the actual submit of the form.
		});
				
</script>