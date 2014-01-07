	<div class="page-header">
			<h1>Data Kepala Keluarga</h1><small>Input Data</small>
		</div>
<div id="formSetting">
<form class='form-horizontal formKK'>
	<div class='control-group'>
		<label class='control-label' for='nama'>Nama</label>
		<div class='controls'>
			<input type='text' name='nama' id='nama'>
		</div>
	</div>
	<div class='control-group'>
		<label class='control-label' for='alamat'>Alamat</label>
		<div class='controls'>
			<input type='text' name='alamat' id='alamat'>
		</div>
	</div>
	<div class='control-group'>
		<label class='control-label' for='jumlahKeluarga'>Jumlah Keluarga</label>
		<div class='controls'>
			<input type='text' name='jumlahKeluarga' id='jumlahKeluarga'>
		</div>
	</div>
	<div class='control-group'>
		<label class='control-label' for='telp'>Telp</label>
		<div class='controls'>
			<input type='text' name='telp' id='telp'>
		</div>
	</div>
	<div class='control-group'>
		<label class='control-label' for='rw'>RW</label>
		<div class='controls'>
			<select id='rw' name='rw'>
				<option value=''>-------RW--------</option>
				<?
					include("../../koneksi.php");
					$jumlahRW = mysql_num_rows(mysql_query("SELECT count(RW) FROM pengurus_rw GROUP BY RW")); //menghitung jumlah RW
					for($i = 1;$i <= $jumlahRW;$i++){
						echo "<option value='$i' id='$i'>RW $i</option>";
					}
				?>
			</select>
		</div>
	</div>
	<div class='control-group'>
		<label class='control-label' for='rt'>RT</label>
		<div class='controls rt'>
			<select>
				<option value=''>-------RT--------</option>
				<option></option>
			</select>
		</div>
	</div>
	<div class='control-group'>
		<div class='controls'>
			<input type='submit' id='submitKK' class='btn btn-large btn-primary submit' onclick='return false;'>
		</div>
	</div>
</form>
</div>

	<script src="../bootstrap/js/jquery-1.9.1.min.js"></script>
	<script src="../bootstrap/js/bootstrap.min.js"></script>

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
		
		$(".submit").click(function(){
				$.ajax({
						type: "POST",
						url: "KK/inputDataKK.php",
						data: $(".formKK").serialize(),
						success: function(data)
						{
							 $(".content").html(data);
						}

				});
				
		});
		
	</script>
