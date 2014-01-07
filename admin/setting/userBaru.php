
<div class='page-header'>
	<h2>Tambah User Baru</h2>
</div>
<div id="formSetting">
<form class='form-horizontal userBaru'>
		<div class='control-group'>
			<label class='control-label' for='username'>Username</label>
			<div class='controls'>
				<input type='text' name='username' id='username'>
			</div>
		</div>
		
		<div class='control-group'>
			<label class='control-label' for='password'>Password</label>
			<div class='controls'>
				<input type='text' name='password' id='password'>
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
					Level
					<label class='radio'>
						<input type='radio' name='level' value='Admin' id='laki' checked>
						Admin
					</label>
					<label class='radio'>
						<input type='radio' name='level' value='pengurusRT/RW'>
						PengurusRT/RW
					</label>
					<label class='radio'>
						<input type='radio' name='level' value='pengurusDesa'>
						PengurusDesa
					</label>
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
			<label class='control-label' for='alamat'>Alamat</label>
			<div class='controls'>
				<input type='text' name='alamat' id='alamat'>
			</div>
		</div>
		
		<div class='control-group'>
			<label class='control-label' for='tempat' >TTL</label>
				<div class='controls'>
					<input type='text' name='tempat' required>, <input type='date' name='tgl' class='span3' required>
				</div>
		</div>
		
		<div class='control-group'>
			<label class='control-label' for='telp'>Telpon</label>
			<div class='controls'>
				<input type='text' name='telp' id='telp'>
			</div>
		</div>
	
		<div class='control-group'>
			<div class='controls'>
				<input type='submit' class='btn btn-large btn-primary submitUserBaru' onclick='return false;'>
			</div>
		</div>
	</form>
	</div>
	
	<script type="text/javascript" src="../bootstrap/js/jquery-1.9.1.js"></script>
<!-- Masukkan TinyMCE ke TextArea -->
	<script type="text/javascript">
		

		$(".web").click(function(){
					
					$.ajax({
						type: "GET",
						url: "setting/setting.php",
					}).success(function(msg) {
						$(".content").html(msg);
					});
					return false;
					
				});
				
			
		$(".submitUserBaru").click(function(){
				$.ajax({
						type: "POST",
						url: "setting/simpanUserBaru.php",
						data: $(".userBaru").serialize(), // serializes the form's elements.
						success: function(data)
						{
							alert(data);
							window.location='admin.php';
						}
				});
		});
	</script>