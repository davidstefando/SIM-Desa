
<div class="page-header">
	<h1>Data Pengurus RT</h1><small>Input Data</small>
</div>

<div id="formSetting">
	<form class='form-horizontal formDataPengurusRt'>
		<div class='control-group'>
			<label class='control-label' for='rw'>Pengurus RW</label>
			<div class='controls'>
				<select name='rw' id='rw'>
					<option value="">----------RW----------</option>
	<?
		include("../../koneksi.php");
		$jumlahRW = mysql_num_rows(mysql_query("SELECT count(RW) FROM pengurus_rw GROUP BY RW")) or die(mysql_error()); //menghitung jumlah RW
		for($i = 1;$i <= $jumlahRW;$i++){
			echo "<option value='$i'>RW $i</option>";
		}
	?>
			</select>
		</div>
	</div>
		<div class='control-group'>
			<label class='control-label' for='rt'>Pengurus RT</label>
			<div class='controls rt'>
				<input type='rt' name='rt' id='rt'>
			</div>
		</div>
		<div class='control-group'>
			<label class='control-label' for='jumlahPengurus'>Jumlah Pengurus</label>
			<div class='controls'>
				<input type='text' name='jumlahPengurus' id='jumlahPengurus'>
			</div>
		</div>
		<div class='control-group'>
			<div class='controls'>
				<input type='submit' class='btn btn-large btn-primary submitPengurusRt' onclick='return false;'>
			</div>
		</div>
	</form>
</div>

<script type="text/javascript">
	$(".RW").click(function(){
				
				$.ajax({
					type: "GET",
					url: "pengurus/inputPengurusRtRw.php",
				}).success(function(msg) {
					$(".content").html(msg);
				});
				return false;
				
			});
			
	$("#rw").change(function(){
				$.ajax({
						type: "POST",
						url: "pengurus/getRT.php",
						data: { rw : $("#rw").val()}, // serializes the form's elements.
						success: function(data)
					   {
						   $(".rt").html(data); // show response from the php script.
					   }
				});
		});		
		
	$(".submitPengurusRt").click(function(){
				$.ajax({
						type: "POST",
						url: "pengurus/inputDataPengurusRt.php",
						data: $(".formDataPengurusRt").serialize(),
						success: function(data)
						{
							 $(".content").html(data);
						}

				});
				
		});
</script>
