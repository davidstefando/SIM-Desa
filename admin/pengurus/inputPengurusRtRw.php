
<div class="page-header">
	<h1>Data Pengurus RW</h1><small>Input Data</small>
</div>
<div id="formSetting">
	<?
		include("../../koneksi.php");
		$jumlahRW = mysql_num_rows(mysql_query("SELECT count(RW) FROM pengurus_rw GROUP BY RW")) or die(mysql_error()); //menghitung jumlah RW
		++$jumlahRW;
	?>
	<form class='form-horizontal formDataPengurusRw'>
		<div class='control-group'>
			<label class='control-label' for='rw'>Pengurus RW</label>
			<div class='controls'>
				<input type='rw' name='rw' id='rw' value='<? echo $jumlahRW; ?>'>
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
				<input type='submit' class='btn btn-large btn-primary submitPengurusRw' onclick='return false;'>
			</div>
		</div>
	</form>
</div>

<script type="text/javascript">
	$(".pengurusDesa").click(function(){
				
				$.ajax({
					type: "GET",
					url: "pengurus/inputPengurusDesa.php",
				}).success(function(msg) {
					$(".content").html(msg);
				});
				return false;
				
			});
			

			
	$(".RT").click(function(){
				
				$.ajax({
					type: "GET",
					url: "pengurus/inputPengurusRt.php",
				}).success(function(msg) {
					$(".content").html(msg);
				});
				return false;
				
			});
			
	$(".submitPengurusRw").click(function(){
				$.ajax({
						type: "POST",
						url: "pengurus/inputDataPengurusRw.php",
						data: $(".formDataPengurusRw").serialize(),
						success: function(data)
						{
							 $(".content").html(data);
						}

				});
				
		});
</script>
			