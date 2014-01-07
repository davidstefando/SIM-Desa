<!DOCTYPE html>
<html>
	<head>
		<title>Buku Pengunjung</title>
		<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
	</head>
	<body>
			<div class="navbar navbar-inverse navbar-fixed-top">
				<div class="navbar-inner">
					<div class="container">
						<a class="brand" href=""><i class="icon-globe icon-white"></i>Data Warga</a>
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
			<br><br><br><br>
				<div class="container-fluid">
						<div class="row-fluid">
							<div class="span10 offset1">
								<?
									include("../koneksi.php");
									$selectDataWarga = mysql_query("SELECT * FROM kk ORDER BY RW ASC");
									echo "
											<table class=\"table table-hover table-bordered table-condensed\">
													<tr class=\"success\">
														<td class=\"span1\"><center>RT</center></td>
														<td class=\"span1\"><center>Nama KK</center></td>
														<td class=\"span1\" ><center>Alamat</center></td>
														<td class=\"span1\" ><center>Jumlah Keluarga</center></td>
														<td class=\"span1\" ><center>No Telp</center></td>
														<td class=\"span1\"><center>Detail</center></td>
													</tr>
											";
									$RT = 0;	
									$RW = 0;
									$id = 0;
									while($row = mysql_fetch_array($selectDataWarga)){
										$id++;
										
										if($RW != $row['RW']){
											$RT = 0;
											echo "	
													<tr>
														<td colspan=\"6\"><center><label class=\"label label-inverse\">RW $row[RW]</label></center></td>
													</tr>
													";
										}
										$RW = $row['RW'];
										
										if($RT != $row['RT']){
											echo "	
													<tr>
														<td colspan=\"6\"><label class=\"label label-inverse\">$row[RT]</label></td>
													</tr>
													";
											$RT = $row['RT'];
										}
										echo "
												<tr class=\"error\">
													<td></td>
													<td><center>$row[NamaKK]</center></td>
													<td ><center>$row[Alamat]</center></td>
													<td><center>$row[JumlahKeluarga]</center></td>
													<td><center>$row[NoTelp]</center></td>
													<td><center><a href=\"#detail$id\" role=\"button\" class=\"btn btn-inverse\" data-toggle=\"modal\"><i class=\"icon-list-alt icon-white\"></i>Detail</a></center></td>
												</tr>
												";
									}
									echo "</table>";
									
									$id = 0;
									$selectDataWarga = mysql_query("SELECT * FROM kk ORDER BY RW ASC");
									while($row = mysql_fetch_array($selectDataWarga)){
										$id++;
										echo "	
													
													<div id=\"detail$id\" class=\"modal hide fade\" tabindex=\"-1\" role=\"dialog\" data-show=\"false\" aria-hidden=\"true\">
														<div class=\"modal-header\">
															<button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">×</button>
															<h3 id=\"myModalLabel\">Data Keluarga</h3>
														</div>
														<div class=\"modal-body\">
															<table border=0>
																	<tr>
																		<td>Nama Kepala Keluarga</td>
																		<td>:</td>
																		<td>$row[NamaKK]</td>
																	</tr>
																	<tr>
																		<td>Alamat</td>
																		<td>:</td>
																		<td>$row[Alamat]</td>
																	</tr>
															</table>
																<strong>Anggota Keluarga</strong>
															
															<table class=\"table\">
																<tr>
																	<td>Nama</td>
																	<td>Status</td>
																	<td>Jenis Kelamin</td>
																	<td>TTL</td>
																	<td>Alamat</td>
																	<td>No Identitas</td>
																	<td>Pekerjaan</td>
																</tr>
												";
										$selectDataKK = mysql_query("SELECT * FROM kk a INNER JOIN dataKK b ON b.idKK = a.idKK WHERE a.NamaKK = '$row[NamaKK]'") or die(mysql_error());
										while($row_ = mysql_fetch_array($selectDataKK)){			
											echo"
															
															<tr>
																<td>$row_[Nama]</td>
																<td>$row_[Status]</td>
																<td>$row_[JK]</td>
																<td>$row_[TTL]</td>
																<td>$row_[Alamat]</td>
																<td>$row_[NoIdentitas]</td>
																<td>$row_[Pekerjaan]</td>
															</tr>
														
													";
										}
										echo "
												</table>
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