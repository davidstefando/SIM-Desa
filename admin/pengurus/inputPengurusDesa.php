
<div class="page-header">
	<h1>Data Pengurus Desa</h1><small>Input Data</small>
</div>
<div id="formSetting">
	<form class='form-horizontal dataPengurusDesa'>
		<div class='control-group'>
			<label class='control-label' for='jabatan'>Jabatan</label>
			<div class='controls'>
				<input type='text' name='jabatan' id='jabatan'>
			</div>
		</div>
		<div class='control-group'>
			<label class='control-label' for='nama'>Nama</label>
			<div class='controls'>
				<input type='text' name='nama' id='nama'>
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
			<label class='control-label' for='alamat'>Alamat</label>
			<div class='controls'>
				<input type='text' name='alamat' id='alamat'>
			</div>
		</div>
		<div class='control-group'>
			<label class='control-label' for='telp'>Telpon</label>
			<div class='controls'>
				<input type='text' name='telp' id='telp'>
			</div>
		</div>
		<div class='control-group'>
			<label class='control-label' for='no'>No Identitas</label>
			<div class='controls'>
				<input type='text' name='no' id='no'>
			</div>
		</div>
		<div class='control-group'>
			<div class='controls'>
				<input type='submit' class='btn btn-large btn-primary submitPengurusDesa' onclick='return false;'>
			</div>
		</div>
	</form>
</div>

<script type="text/javascript">

	$(".pengurusRtRw").click(function(){
			
				$.ajax({
					type: "GET",
					url: "pengurus/inputPengurusRtRw.php",
				}).success(function(msg) {
					$(".content").html(msg);
				});
				return false;
				
	});
	
	$(".submitPengurusDesa").click(function(){
				$.ajax({
						type: "POST",
						url: "pengurus/simpanDataPengurusDesa.php",
						data: $(".dataPengurusDesa").serialize(), // serializes the form's elements.
						success: function(data)
						{
							alert(data);
							window.location='admin.php';
						}
				});
		});
	
	
</script>