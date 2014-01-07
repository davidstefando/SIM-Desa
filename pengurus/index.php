<!DOCTYPE html>
<html>
	<head>
		<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
	</head>
	<body>
		<div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
		
         <a class="brand" href="#">Data Pengurus</a>
       
		  
		   <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="">
                <a href="#desa">Pengurus Desa</a>
              </li>
              <li class="">
                <a href="#RT/RW">Pengurus RT/RW</a>
              </li>
			  <li class="">
                <a href="../">Menu Utama</a>
              </li>
            </ul>
          </div>
		
      </div>
    </div>
	</div>
		
		<div id="container-fluid">
			<div class="row-fluid">
			<div class="page-header">
				<? include("../config.php");  ?>
				<br><center><h1>Data Pengurus <small>Desa <? echo implement("Nama Desa"); ?></small></h1></center>
			</div>
			
			<div class="span12 page-header" id='desa'>
				<h3>Pengurus Desa</small></h3>
			</div>
			
		
			
			<div class="span6 offset3">
				<table class="table">
					<tbody>
						<? 
							include("../koneksi.php");
							$selectPengurusDesa = "SELECT * FROM pengurus_desa";
							$query = mysql_query($selectPengurusDesa);
							
							while($row = mysql_fetch_array($query)){
								echo "
										<tr>
											<td>
												<span class='span6 pull-left'><strong>$row[Jabatan]</strong><br>$row[Nama]</span>
												<span class='span6 pull-right'>
													<table class='table'>
														<tr>
															<td>Alamat</td>
															<td>:</td>
															<td>$row[Alamat]</td>
														</tr>
														<tr>
															<td>Jenis Kelamin</td>
															<td>:</td>
															<td>$row[JK]</td>
														</tr>
														<tr>
															<td>TTL</td>
															<td>:</td>
															<td>$row[TTL]</td>
														</tr>
														<tr>
															<td>Telpon</td>
															<td>:</td>
															<td>$row[Telp]</td>
														</tr>
													</table>
												</span>
											</td>
										</tr>
										";
							}
						?>
					</tbody>
				</table>
			</div>
			
			<div class="span12 page-header" id='RT/RW'>
				<h3>Pengurus RT/RW</h3>
			</div>
			
			<div class="span8 offset2">
				<table class="table table-hover">
					<tbody>
						<?
							$jumlahRW = mysql_num_rows(mysql_query("SELECT count(RW) FROM pengurus_rw GROUP BY RW")); //menghitung jumlah RW
							for($RW = 1;$RW <= $jumlahRW;$RW++){ //echo RW ke-
								echo "
											<tr id='RW$RW'>
												<td>
													<span class='span6 pull-left'>
															<strong>RW $RW</strong>
															<table class='table table-condensed'>";
															
															$pengurusRW = mysql_query("SELECT * FROM pengurus_rw WHERE RW = 'RW$RW'"); 
															while($row = mysql_fetch_array($pengurusRW)){ //echo pengurus RW ke-
																$detail = "
																		<table>
																			<tr>
																				<td>Alamat</td>
																				<td>:</td>
																				<td>$row[Alamat]</td>
																			</tr>
																			<tr>
																				<td>Jenis Kelamin</td>
																				<td>:</td>
																				<td>$row[JK]</td>
																			</tr>
																			<tr>
																				<td>TTL</td>
																				<td>:</td>
																				<td>$row[TTL]</td>
																			</tr>
																			<tr>
																				<td>Telpon</td>
																				<td>:</td>
																				<td>$row[Telp]</td>
																			</tr>
																		</table>
																		";
															
																echo "
																			<tr class='detail' rel='popover'  data-original-title='$detail'>
																				<td><strong>$row[Jabatan]</strong></td>
																				<td>:</td>
																				<td>$row[Nama]</td>
																			</tr>
																";
															}
								echo "	
															</table>
													</span>
													<span class='span6 pull-right'>
										";
								$jumlahRT = mysql_num_rows(mysql_query("SELECT count(RT) FROM pengurus_rt WHERE RW = 'RW$RW' GROUP BY RT"));
								for($RT = 1;$RT <= $jumlahRT;$RT++){ //echo RT ke- di RW ke-
									echo "
															<strong>RT $RT</strong>
															<table class='table  table-condensed'>
											";
											$pengurusRT = mysql_query("SELECT * FROM pengurus_rt WHERE RW='RW$RW' AND RT = 'RT$RT'");
											while($row = mysql_fetch_array($pengurusRT)){//echo pengurus RT ke- di RW ke-
													$detail = "
																		<table>
																			<tr>
																				<td>Alamat</td>
																				<td>:</td>
																				<td>$row[Alamat]</td>
																			</tr>
																			<tr>
																				<td>Jenis Kelamin</td>
																				<td>:</td>
																				<td>$row[JK]</td>
																			</tr>
																			<tr>
																				<td>TTL</td>
																				<td>:</td>
																				<td>$row[TTL]</td>
																			</tr>
																			<tr>
																				<td>Telpon</td>
																				<td>:</td>
																				<td>$row[Telp]</td>
																			</tr>
																		</table>
																		";
																		
												echo "
																<tr class='detail' rel='popover'  data-original-title='$detail'>
																	<td>$row[Jabatan]</td>
																	<td>:</td>
																	<td>$row[Nama]</td>
																</tr>";
												
											}
									echo "</table>";
								}
								
								echo "
												</span>
											</td>
										</tr>			
								";
							}
						?>
					</tbody>
				</table>
			</div>
			
	</div>
	</div>
	
	<script src="../bootstrap/js/jquery-1.9.1.min.js"></script>
	<script src="../bootstrap/js/bootstrap.min.js"></script>

	<script>
	$(function ()
	{ $(".detail").tooltip({html : true});
	});
	</script>
	
	</body>

</html>