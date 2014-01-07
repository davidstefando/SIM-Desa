<?	
	include("../../koneksi.php");
	if(isset($_POST['data'])){
		if($_POST['data'] == "rt"){
			$nama  = $_POST['nama'];
			$selectPengurus = mysql_query("SELECT * FROM pengurus_rt WHERE Nama = '$nama'") or die(mysql_error());
			while($row = mysql_fetch_array($selectPengurus)){
			echo "
						<div id='formSetting'>
						<form method='post' class='form-horizontal formPengurus'>
						<input type='hidden' name='nameId' value='$nama'>
						<div class='control-group'>
							<label class='control-label' for='nama'>Nama</label>
							<div class='controls'>
								<input type='text' name='nama' id='nama' value='$row[Nama]'>
							</div>
						</div>
					<div class='control-group'>
							<label class='control-label' for='jabatan'>Jabatan</label>
							<div class='controls'>
								<input type='text' name='jabatan' id='jabatan' value='$row[Jabatan]'>
							</div>
						</div>
						<div class='control-group'>
							<label class='control-label' for='tempat' >TTL</label>
								<div class='controls'>
									<input type='text' name='ttl' value='$row[TTL]' required>
								</div>
						</div>
						<div class='control-group'>
							<label class='control-label' for='alamat'>Alamat</label>
							<div class='controls'>
								<input type='text' name='alamat' id='alamat' value='$row[Alamat]'>
							</div>
						</div>
						<div class='control-group'>
							<label class='control-label' for='telp'>Telpon</label>
							<div class='controls'>
								<input type='text' name='telp' id='telp' value='$row[Telp]'>
							</div>
						</div>
						<div class='control-group'>
									<div class='controls'>
										<input type='submit' value='Simpan' class='btn btn-large btn-warning submitEditPengurusRT' onclick='return false;'>
									</div>
								</div>
							</form>
						</div>
						";
			}
		}
		if($_POST['data'] == "rw"){
			$nama  = $_POST['nama'];
			$selectPengurus = mysql_query("SELECT * FROM pengurus_rw WHERE Nama = '$nama'") or die(mysql_error());
			while($row = mysql_fetch_array($selectPengurus)){
			echo "
						<div id='formSetting'>
						<form method='post' class='form-horizontal formPengurus'>
						<input type='hidden' name='nameId' value='$nama'>
						<div class='control-group'>
							<label class='control-label' for='nama'>Nama</label>
							<div class='controls'>
								<input type='text' name='nama' id='nama' value='$row[Nama]'>
							</div>
						</div>
					<div class='control-group'>
							<label class='control-label' for='jabatan'>Jabatan</label>
							<div class='controls'>
								<input type='text' name='jabatan' id='jabatan' value='$row[Jabatan]'>
							</div>
						</div>
						<div class='control-group'>
							<label class='control-label' for='tempat' >TTL</label>
								<div class='controls'>
									<input type='text' name='ttl' value='$row[TTL]' required>
								</div>
						</div>
						<div class='control-group'>
							<label class='control-label' for='alamat'>Alamat</label>
							<div class='controls'>
								<input type='text' name='alamat' id='alamat' value='$row[Alamat]'>
							</div>
						</div>
						<div class='control-group'>
							<label class='control-label' for='telp'>Telpon</label>
							<div class='controls'>
								<input type='text' name='telp' id='telp' value='$row[Telp]'>
							</div>
						</div>
						<div class='control-group'>
									<div class='controls'>
										<input type='submit' value='Simpan' class='btn btn-large btn-warning submitEditPengurusRW' onclick='return false;'>
									</div>
								</div>
							</form>
						</div>
						";
			}
		}
		else if($_POST['data'] == "desa"){
			$id = $_POST['id'];
			$selectPengurus = mysql_query("SELECT * FROM pengurus_desa WHERE Id = $id") or die(mysql_error());
			while($row = mysql_fetch_array($selectPengurus)){
				echo "<div id='formSetting'>
							<form class='form-horizontal dataPengurusDesa'>
								<input type='hidden' name='id' value='$id'>
								<div class='control-group'>
									<label class='control-label' for='jabatan'>Jabatan</label>
									<div class='controls'>
										<input type='text' name='jabatan' id='jabatan' value='$row[Jabatan]'>
									</div>
								</div>
								<div class='control-group'>
									<label class='control-label' for='nama'>Nama</label>
									<div class='controls'>
										<input type='text' name='nama' id='nama' value='$row[Nama]'>
									</div>
								</div>
								
								<div class='control-group'>
									<label class='control-label' for='tempat' >TTL</label>
										<div class='controls'>
											<input type='text' name='ttl' value='$row[TTL]' required>
										</div>
								</div>
								<div class='control-group'>
									<label class='control-label' for='alamat'>Alamat</label>
									<div class='controls'>
										<input type='text' name='alamat' id='alamat' value='$row[Alamat]'>
									</div>
								</div>
								<div class='control-group'>
									<label class='control-label' for='telp'>Telpon</label>
									<div class='controls'>
										<input type='text' name='telp' id='telp' value='$row[Telp]'>
									</div>
								</div>
								<div class='control-group'>
									<label class='control-label' for='no'>No Identitas</label>
									<div class='controls'>
										<input type='text' name='no' id='no' value='$row[NoIdentitas]'>
									</div>
								</div>
								<div class='control-group'>
									<div class='controls'>
										<input type='submit' value='Simpan' class='btn btn-large btn-warning submitEditPengurusDesa' onclick='return false;'>
									</div>
								</div>
							</form>
						</div>
						";
			}
		}
	}
?>

<script type="text/javascript">
	$(".submitEditPengurusDesa").click(function() {

			var url = "pengurus/kelolaPengurus.php?action=simpan_pengurus_desa"; // the script where you handle the form input.
			
			$.ajax({
				   type: "POST",
				   url: url,
				   data:$(".dataPengurusDesa").serialize(), // serializes the form's elements.
				   success: function(data)
				   {
						$.ajax({
							   type: "POST",
							   url: 'pengurus/daftarPengurusDgEdit.php',
							   success: function(data)
							   {
								   $(".content").html(data); // show response from the php script.
							   }
						});
					  
				   }
				 });

			return false; // avoid to execute the actual submit of the form.
		});
		
		$(".submitEditPengurusRT").click(function() {

			var url = "pengurus/kelolaPengurus.php?action=simpan_pengurus_rt"; // the script where you handle the form input.
			
			$.ajax({
				   type: "POST",
				   url: url,
				   data:$(".formPengurus").serialize(), // serializes the form's elements.
				   success: function(data)
				   {
						alert(data);
						$.ajax({
							   type: "POST",
							   url: 'pengurus/daftarPengurusDgEdit.php',
							   success: function(data)
							   {
									
								   $(".content").html(data); // show response from the php script.
							   }
						});
					  
				   }
				 });

			return false; // avoid to execute the actual submit of the form.
		});
		
			$(".submitEditPengurusRW").click(function() {

			var url = "pengurus/kelolaPengurus.php?action=simpan_pengurus_rw"; // the script where you handle the form input.
			
			$.ajax({
				   type: "POST",
				   url: url,
				   data:$(".formPengurus").serialize(), // serializes the form's elements.
				   success: function(data)
				   {
						$.ajax({
							   type: "POST",
							   url: 'pengurus/daftarPengurusDgEdit.php',
							   success: function(data)
							   {
								   $(".content").html(data); // show response from the php script.
							   }
						});
					  
				   }
				 });

			return false; // avoid to execute the actual submit of the form.
		});
</script>