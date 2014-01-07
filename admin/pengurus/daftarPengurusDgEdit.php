<div class="span6 offset3">
				<table class="table">
					<tbody>
						<? 
							include("../../koneksi.php");
							$selectPengurusDesa = "SELECT * FROM pengurus_desa";
							$query = mysql_query($selectPengurusDesa);
							
							while($row = mysql_fetch_array($query)){
								echo "
										<tr>
											<td>
												<span class='span6 pull-left'><strong>$row[Jabatan]</strong><br>$row[Nama]</span>
												<br><label class='label label-info edit' id='$row[Id]'>Edit</label> | <label class='label label-important hapus' id='$row[Id]'>Hapus</label>
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
																				<td>$row[Nama] <label class='label label-info editRW' id='$row[Nama]'>Edit</label> | <label class='label label-important hapusRW' id='$row[Nama]'>Hapus</label></td>
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
																	<td>$row[Nama] <label class='label label-info editRT' id='$row[Nama]'>Edit</label> | <label class='label label-important hapusRT' id='$row[Nama]'>Hapus</label></td>
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

	<script type="text/javascript">
		$(function ()
		{ $(".detail").tooltip({html : true});
		});
		
		$(".edit").click(function() {

			var url = "pengurus/editPengurus.php"; // the script where you handle the form input.
			
			$.ajax({
				   type: "POST",
				   url: url,
				   data:{data : 'desa', id : $(this).attr('id')}, // serializes the form's elements.
				   success: function(data)
				   {
					   $(".content").html(data); // show response from the php script.
				   }
				 });

			return false; // avoid to execute the actual submit of the form.
		});
		
		
		$(".editRT").click(function() {

			var url = "pengurus/editPengurus.php"; // the script where you handle the form input.
			
			$.ajax({
				   type: "POST",
				   url: url,
				   data:{data : 'rt', nama : $(this).attr('id')}, // serializes the form's elements.
				   success: function(data)
				   {
					   $(".content").html(data); // show response from the php script.
				   }
				 });

			return false; // avoid to execute the actual submit of the form.
		});
		
		$(".editRW").click(function() {

			var url = "pengurus/editPengurus.php"; // the script where you handle the form input.
			
			$.ajax({
				   type: "POST",
				   url: url,
				   data:{data : 'rw', nama : $(this).attr('id')}, // serializes the form's elements.
				   success: function(data)
				   {
					   $(".content").html(data); // show response from the php script.
				   }
				 });

			return false; // avoid to execute the actual submit of the form.
		});
		
		$(".hapus").click(function() {

			var url = "pengurus/kelolaPengurus.php?action=hapus_pengurus_desa"; // the script where you handle the form input.
			
			$.ajax({
				   type: "POST",
				   url: url,
				   data:{data : 'desa', id : $(this).attr('id')}, // serializes the form's elements.
				   success: function(data)
				   {
					   alert(data); // show response from the php script.
					   $.ajax({
						   type: "POST",
						   url: "pengurus/daftarPengurusDgEdit.php",
						   success: function(data)
						   {
							   $(".content").html(data); // show response from the php script.
						   }
						});
				   }
				 });

			return false; // avoid to execute the actual submit of the form.
		});
		
			$(".hapusRT").click(function() {

			var url = "pengurus/kelolaPengurus.php?action=hapus_pengurus_rt"; // the script where you handle the form input.
			
			$.ajax({
				   type: "POST",
				   url: url,
				   data:{nama : $(this).attr('id')}, // serializes the form's elements.
				   success: function(data)
				   {
					   alert(data); // show response from the php script.
					   $.ajax({
						   type: "POST",
						   url: "pengurus/daftarPengurusDgEdit.php",
						   success: function(data)
						   {
							   $(".content").html(data); // show response from the php script.
						   }
						});
				   }
				 });

			return false; // avoid to execute the actual submit of the form.
		});
		
			$(".hapusRW").click(function() {

			var url = "pengurus/kelolaPengurus.php?action=hapus_pengurus_rw"; // the script where you handle the form input.
			
			$.ajax({
				   type: "POST",
				   url: url,
				   data:{ nama : $(this).attr('id')}, // serializes the form's elements.
				   success: function(data)
				   {
					   alert(data); // show response from the php script.
					   $.ajax({
						   type: "POST",
						   url: "pengurus/daftarPengurusDgEdit.php",
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
	
	