<?
	include("../koneksi.php");
	session_start();
	$selectUser = mysql_query("SELECT * FROM user a INNER JOIN datauser b ON a.Id = b.Id WHERE a.Id = '$_SESSION[id]'") or die(mysql_error());
	$data = mysql_fetch_array($selectUser);
	
?>

<div class='page-header'>
	<h2>Tambah User Baru</h2>
</div>
<div id="formSetting">
<form class='form-horizontal user'>
		<div class='control-group'>
			<label class='control-label' for='username'>Username</label>
			<div class='controls'>
				<input type='text' name='username' id='username' value='<? echo $data['Username']; ?>'>
			</div>
		</div>
		
		<div class='control-group'>
			<label class='control-label' for='password'>Password</label>
			<div class='controls'>
				<input type='password' name='password' id='password'>
			</div>
		</div>
		
		<div class='control-group'>
			<label class='control-label' for='nama'>Nama</label>
			<div class='controls'>
				<input type='text' name='nama' id='nama' value='<? echo  $data['Nama'];?>'>
			</div>
		</div>
	
		<div class='control-group'>
			<label class='control-label' for='alamat'>Alamat</label>
			<div class='controls'>
				<input type='text' name='alamat' id='alamat' value='<? echo $data['Alamat']; ?>'>
			</div>
		</div>
		
		<div class='control-group'>
			<label class='control-label' for='tempat' >TTL</label>
				<div class='controls'>
					<input type='text' name='TTL' value='<? echo $data['TTL']; ?>' required>
				</div>
		</div>
		
		<div class='control-group'>
			<label class='control-label' for='telp'>Telpon</label>
			<div class='controls'>
				<input type='text' name='telp' id='telp' value='<? echo $data['Telp']; ?>'>
			</div>
		</div>
	
		<div class='control-group'>
			<div class='controls'>
				<input type='submit' name='submit' class='btn btn-large btn-primary submitEditUser' onclick='return false;'>
			</div>
		</div>
	</form>
	</div>
	<script type="text/javascript">
	$(".submitEditUser").click(function(){
				$.ajax({
						type: "POST",
						url: "setting/simpanUser.php",
						data: $(".user").serialize(), // serializes the form's elements.
						success: function(data)
						{
							alert(data);
							window.location='admin.php';
						}
				});
		});
	</script>