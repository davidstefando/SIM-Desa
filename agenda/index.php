<!DOCTYPE html>
<html>
	<head>
		<title>Agenda Tahunan</title>
		<link href="../bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">
	</head>
	<body>
			<div class="navbar navbar-inverse navbar-fixed-top">
				<div class="navbar-inner">
					<div class="container">
						<a class="brand" href="index-2.html"><i class="icon-calendar icon-white"></i>Agenda</a>
							<!--<form method="post" class="form-search">	
								<div class="navbar-search pull-right span2">
									<select class="span2">
										<option value="">Search by</option>
										<option>1</option>
										<option>1</option>
										<option>1</option>
									</select>
								</div>
								<div class="navbar-search input-prepend pull-right">
									<span class="add-on"><a href="#"><i class="icon-search"></i></a></span>
									<input class="span2" type="text" placeholder="Pencarian">
								</div>
							</form>-->
							<div class="nav-collapse collapse">
								<ul class="nav">
								  <li class="">
									<a href="../">Menu Utama</a>
								  </li>
								</ul>
							</div>
					</div>
				</div>
			</div>
			<br><br><BR><br>
			<div class="container-fluid row-fluid">
			
				<div class="span10 offset1">
					<table class="table table-hover table-bordered table-condensed">
						<tr class="success">
							<td class="span1"><center>Kategori</center></td>
							<td class="span1"><center>Tanggal</center></td>
							<td class="span1"><center>Waktu</center></td>
							<td class="span2"><center>Nama Kegiatan</center></td>
							<td class="span2"><center>Peserta</center></td>
							<td class="span2"><center>Tempat</center></td>
							<td class="span1"><center>Detail</center></td>
						</tr>
			<?		
				include("../koneksi.php");
				$selectAgenda = mysql_query("SELECT * FROM agenda ORDER BY Tgl DESC");
				
				$bln = 0;
				$id = 0;
				while($row = mysql_fetch_array($selectAgenda)){
					$id++;
					if($bln != substr($row['Tgl'],5,2)){
						$bln = substr($row['Tgl'],5,2);
						if($bln == 1)$bulan = "Januari";
						else if($bln == 2)$bulan = "Febuari";
						else if($bln == 3)$bulan = "Maret";
						else if($bln == 4)$bulan = "April";
						else if($bln == 5)$bulan = "Mei";
						else if($bln == 6)$bulan = "Juni";
						else if($bln == 7)$bulan = "Juli";
						else if($bln == 8)$bulan = "Agustus";
						else if($bln == 9)$bulan = "September";
						else if($bln == 10)$bulan = "Oktober";
						else if($bln == 11)$bulan = "November";
						else if($bln == 12)$bulan = "Desember";
						
						echo "
									<tr>
										<td colspan=\"7\"><label class=\"label label-inverse\">" . $bulan . "</label></td>
									</tr>
								";	
					}
					
					echo "
								<tr class=\"error\">
									<td></td>
									<td><center>$row[Tgl]</center></td>
									<td><center>$row[Waktu]</center></td>
									<td>$row[Nama]</td>
									<td>$row[Peserta]</td>
									<td>$row[Tempat]</td>
									<td><center><a href=\"#detail$id\" role=\"button\" class=\"btn btn-inverse\" data-toggle=\"modal\"><i class=\"icon-list-alt icon-white\"></i>Detail</a></center></td>
								</tr>
							";
					
				}
			
				echo "	</table>";		
					
				$selectAgenda = mysql_query("SELECT * FROM agenda ORDER BY Tgl DESC");
				
				$id = 0;
				while($row = mysql_fetch_array($selectAgenda)){		
						$id++;
						$selectPenulis = mysql_query("SELECT Nama FROM datauser WHERE Id = '$row[IdPenulis]'") or die(mysql_error());
						$penulis = mysql_fetch_array($selectPenulis);
						echo "
									<div id=\"detail$id\" class=\"modal hide fade\" tabindex=\"-1\" role=\"dialog\" data-show=\"false\" aria-hidden=\"true\">
									  <div class=\"modal-header\">
										<button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">×</button>
										<h3 id=\"myModalLabel\">$row[Nama]</h3>
										<p><small>oleh~$penulis[Nama]</small></p>
									  </div>
									  <div class=\"modal-body\">
										<table>
											<tr>
												<td>Tanggal/Waktu</td>
												<td>:</td>
												<td>$row[Tgl] $row[Waktu]</td>
											</tr>
											<tr>
												<td>Peserta</td>
												<td>:</td>
												<td>$row[Peserta]</td>	
											</tr>
											<tr>
												<td>Penyelenggara</td>
												<td>:</td>
												<td>$row[Panitia]</td>
											</tr>
										</table>
										<br><br>
										<p>Kegiatan : $row[Kegiatan]</p>
										
									  </div>
									  <div class=\"modal-footer\">
										<button class=\"btn\" data-dismiss=\"modal\" aria-hidden=\"true\">Tutup</button>
									  </div>
									</div>
								";
				}
		?>
				
				</div>
			</div>
		<script src="../bootstrap/js/jquery-1.9.1.min.js"></script>
		<script src="../bootstrap/js/bootstrap.min.js"></script>

		<script>
		$(function (){
			$("#example").popover();
			$('#myModal').modal();
		});
		</script>
	</body>
</html>