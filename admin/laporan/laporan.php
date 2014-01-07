<html>
	<head>
		<link href="../../bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">
	</head>
	<body>
			<div class="page-header">
				<h1>Laporan Masyarakat</h1>
			</div>
		<?
			
			$koneksi=mysql_connect("localhost","root","");
			
			mysql_select_db("sim-desa",$koneksi);
			
			session_start();
			
			if($_SESSION['level'] == "Admin"){
				$tujuan = "A";
			}
			else if($_SESSION['level'] == "pengurusRT/RW"){
				$tujuan = "C";
			}
			else if($_SESSION['level'] == "pengurusDesa"){
				$tujuan = "B";
			}
			else{
				exit;
			}
			
			$query=mysql_query("SELECT * FROM laporan WHERE Tujuan LIKE '%$tujuan%'",$koneksi) or die (mysql_error());
			
			echo "	<table class=\"table table-bordered table-hover\">
								<tr>
									<td class='span4'>Nama</td>
									<td class='span2'>Tanggal</td>
									<td class='span2'>Waktu</td>
									<td class='span4'>Judul</td>
									<td class='span1'>Baca</td>
								</tr>";
			$id = 0;					
			while($baris=mysql_fetch_array($query))
			{
				if($baris['mark'] == 0){
					$status= 'success';
				}
				else{
					$status = '';
				}
				$id++;
					echo "
							
								<tr class='$status'>
									<td>$baris[Nama]</td>
									<td>$baris[Tgl]</td>
									<td>$baris[Waktu]</td>
									<td>$baris[Judul]</td>			
									<td><center><a href=\"#detail$id\" role=\"button\" class=\"btn btn-inverse detail\" data-toggle=\"modal\"><i class=\"icon-list-alt icon-white\"></i>Detail</a></center></td>
								</tr>";
				}
			echo "			</table>";
			
			$query=mysql_query("SELECT * FROM laporan",$koneksi) or die (mysql_error());
			
			$id = 0;					
			while($row=mysql_fetch_array($query))
			{
				$id++;
					echo "
									<div id=\"detail$id\" class=\"modal hide fade\" tabindex=\"-1\" role=\"dialog\" data-show=\"false\" aria-hidden=\"true\">
									  <div class=\"modal-header\">
										<button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">&times;</button>
										<h3 id=\"myModalLabel\"></h3>
									  </div>
									  <div class=\"modal-body\">
										<table>
											<tr>
												<td>Pengirim</td>
												<td>:</td>
												<td>$row[Nama]</td>
											</tr>
											<tr>
												<td>Dikirim</td>
												<td>:</td>
												<td>$row[Tgl] $row[Waktu]</td>	
											</tr>
											<tr>
												<td>Judul</td>
												<td>:</td>
												<td>$row[Judul]</td>
											</tr>
										</table>
										<br><br>
										<p><strong>Isi :</strong> <br>".nl2br($row['Isi'])."</p>
										
									  </div>
									  <div class=\"modal-footer\">
										<button class=\"btn\" data-dismiss=\"modal\" aria-hidden=\"true\">Tutup</button>
									  </div>
									</div>
									
									<script type='text/javascript'>
			
										$('#detail$id').click(function(){
											$.ajax({
													type: 'GET',
													url: 'laporan/markAsRead.php',
													data: {id : '$row[Id]'},
													success:function(msg) 
													{
														
													}
												});
											return false;
											
										});
									</script>
								";
				}
		?>
		
		<script src="../bootstrap/js/jquery-1.9.1.min.js"></script>
		<script src="../bootstrap/js/bootstrap.min.js"></script>
		
		
	</body>
</html>