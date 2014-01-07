		<div class="page-header">
			<h1>Tambah Agenda Baru</h1><small>Agenda Tahunan Desa</small>
		</div>
		<div id="formSetting">
		<form action="" method="post" class="form-horizontal agenda">
			<div class="control-group">
					<label class="control-label" for="nama">Nama</label>
						<div class='controls'>
					<input type="text" name="nama" id="nama" placeholder="Ex. Mada" class="span5">
				</div>
			</div>
			<div class="control-group">
					<label class="control-label" for="tanggal">Tanggal</label>
						<div class='controls'>
					<input type="date" name="tgl" id="tanggal" placeholder="Ex. 12 desember 2012" class="span4">
				</div>
			</div>
			<div class="control-group">
					<label class="control-label" for="waktu">Waktu</label>
						<div class='controls'>
					<input type="time" name="waktu" id="waktu" placeholder="Ex. 22:40" class="span2">
				</div>
			</div>
			<div class="control-group">
					<label class="control-label" for="nama">Tempat</label>
						<div class='controls'>
					<input type="text" name="tempat" id="nama" placeholder="Ex. Mada" class="span5">
				</div>
			</div>
			<div class="control-group">
					<label class="control-label" for="peserta">Peserta</label>
						<div class='controls'>
					<input type="text" name="peserta" id="peserta" placeholder="Ex. Sekeluarga" class="span5">
				</div>
			</div>
			<div class="control-group">
					<label class="control-label" for="panitia">Panitia</label>
						<div class='controls'>
					<input type="text" name="panitia" placeholder="Ex. Syauqy" id="panitia" class="span5">
				</div>
			</div>
			<div class="control-group">
					<label class="control-label" for="kegiatan">Kegiatan</label>
						<div class='controls'>
							<textarea id="kegiatan" name="kegiatan"></textarea>
						</div>
			</div>
			<div class="control-group">
						<div class='controls'>
							<input type="submit" name="submit" value="Tambah" class="btn btn-primary btn-large submit">
						</div>
			</div>
			
		</form>
		</div>
<script type="text/javascript" src="../bootstrap/js/jquery-1.9.1.js"></script>
<!-- Masukkan TinyMCE ke TextArea -->
<script type="text/javascript">
	
		// this is the id of the submit button
	$(".submit").click(function() {

		var url = "agenda/input.php"; // the script where you handle the form input.

		$.ajax({
			   type: "POST",
			   url: url,
			   data: $(".agenda").serialize(), // serializes the form's elements.
			   success: function(data)
			   {
				   alert(data); // show response from the php script.
			   }
			 });

		return false; // avoid to execute the actual submit of the form.
	});		
</script>