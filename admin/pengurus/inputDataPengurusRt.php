<?

	include("../../koneksi.php");
	$RW = $_POST['rw'];
	$RT = $_POST['rt'];
	$jumlahPengurus = $_POST['jumlahPengurus'];
	
	echo "
			<div class='page-header'><h2>Input Data Pengurus Rw $RW</h2><small>Berjumlah $jumlahPengurus orang</small></div>
			<div id='formSetting'>
			<form method='post' class='form-horizontal dataPengurusRt'>
				<input type='hidden' name='rw' value='$RW'>
				<input type='hidden' name='rt' value='$RT'>
				<input type='hidden' name='jml' value='$jumlahPengurus'>
			";
			
	for($i = 1;$i <= $jumlahPengurus;$i++){
		echo "
					<br><span class='label label-success'>Data Pengurus RT ke-$i</span>
		
					<div class='control-group'>
							<label class='control-label' for='nama'>Nama</label>
							<div class='controls'>
								<input type='text' name='nama$i' id='nama'>
							</div>
						</div>
					<div class='control-group'>
							<label class='control-label' for='jabatan'>Jabatan</label>
							<div class='controls'>
								<input type='text' name='jabatan$i' id='jabatan'>
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
							<label class='control-label' for='alamat'>Alamat</label>
							<div class='controls'>
								<input type='text' name='alamat$i' id='alamat'>
							</div>
						</div>
						<div class='control-group'>
							<label class='control-label' for='telp'>Telpon</label>
							<div class='controls'>
								<input type='text' name='telp$i' id='telp'>
							</div>
						</div>
						<div class='control-group'>
							<label class='control-label' for='no'>No Identitas</label>
							<div class='controls'>
								<input type='text' name='no$i' id='no'>
							</div>
						</div>
						
				";
	}
	
	echo "
					<div class='control-group'>
							<div class='controls'>
								<input type='submit' class='btn btn-large btn-primary submitDataPengurusRt' onclick='return false;'>
							</div>
					</div>
				</div>
				";
	
?>

	<script src="../../bootstrap/js/jquery-1.9.1.min.js"></script>
	<script src="../../bootstrap/js/bootstrap.min.js"></script>

	<script>
		
		$(".submitDataPengurusRt").click(function(){
				$.ajax({
						type: "POST",
						url: "pengurus/simpanDataPengurusRt.php",
						data: $(".dataPengurusRt").serialize(), // serializes the form's elements.
						success: function(data)
						{
							alert(data);
							window.location='admin.php';
						}
				});
		});
	</script>

	