
<div class='page-header'>
	<h2>Pengaturan Sistem Informasi</h2>
</div>
<div id="formSetting">
	<form class="form-horizontal setting" method="post">
		<div class="control-group">
			<label class="control-label" for="namaDesa">Nama Desa : </label>
			<div class="controls">
				<input type="text" name="namaDesa" id="namaDesa">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="subArtikel">Subtitle Halaman Artikel : </label>
			<div class="controls">
				<input type="text" name="subArtikel" id="subArtikel">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="subLaporan">Pesan Laporan : </label>
			<div class="controls">
				<textarea rows="3" name="subLaporan" id="subLaporan"></textarea>
			</div>
		</div>
		<div class="control-group">
			<div class="controls"><input type="submit" class="btn btn-primary submit" value="simpan" name="simpan"></div>
		</div>
	</form>
</div>
				
<script type="text/javascript" src="../bootstrap/js/jquery-1.9.1.js"></script>
<!-- Masukkan TinyMCE ke TextArea -->
<script type="text/javascript">
	
		// this is the id of the submit button
	$(".submit").click(function() {
		var url = "setting/input.php"; // the script where you handle the form input.
		
		$.ajax({
			   type: "POST",
			   url: url,
			   data: $(".setting").serialize(), // serializes the form's elements.
			   success: function(data)
			   {
				  alert(data);
			   }
			 });

		return false; // avoid to execute the actual submit of the form.
	});		
	
			
	$(".user").click(function(){
				
				$.ajax({
					type: "GET",
					url: "setting/userBaru.php",
				}).success(function(msg) {
					$(".content").html(msg);
				});
				return false;
				
			});
</script>
			