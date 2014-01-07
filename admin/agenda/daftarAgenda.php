<?
	include("../../koneksi.php");
	session_start();
	$selectAgenda = mysql_query("SELECT * FROM agenda WHERE IdPenulis = '$_SESSION[id]' ORDER BY Tgl DESC");
				
		echo "<div class='span10 offset1'>
					<table class='table table-hover table-bordered table-condensed'>
						<tr class='success'>
							<td class='span1'><center>Kategori</center></td>
							<td class='span1'><center>Tanggal</center></td>
							<td class='span1'><center>Waktu</center></td>
							<td class='span2'><center>Nama Kegiatan</center></td>
							<td class='span2'><center>Peserta</center></td>
							<td class='span2'><center>Tempat</center></td>
							<td class='span1'><center>Detail</center></td>
						</tr>";
				$bln = 0;
				$id = 0;
				while($row = mysql_fetch_array($selectAgenda)){
					$id++;
					if($bln != substr($row['Tgl'],5,2)){
						$bln = substr($row['Tgl'],5,2);
						if($bln == 1)$bulan = 'Januari';
						else if($bln == 2)$bulan = 'Febuari';
						else if($bln == 3)$bulan = 'Maret';
						else if($bln == 4)$bulan = 'April';
						else if($bln == 5)$bulan = 'Mei';
						else if($bln == 6)$bulan = 'Juni';
						else if($bln == 7)$bulan = 'Juli';
						else if($bln == 8)$bulan = 'Agustus';
						else if($bln == 9)$bulan = 'September';
						else if($bln == 10)$bulan = 'Oktober';
						else if($bln == 11)$bulan = 'November';
						else if($bln == 12)$bulan = 'Desember';
						
						echo "
									<tr>
										<td colspan=\'7\'><label class='label label-inverse'>" . $bulan . "</label></td>
									</tr>
								";	
					}
					
					echo "
								<tr class='error'>
									<td></td>
									<td><center>$row[Tgl]</center></td>
									<td><center>$row[Waktu]</center></td>
									<td>$row[Nama]</td>
									<td>$row[Peserta]</td>
									<td>$row[Tempat]</td>
									<td><a href='#' id='$row[Id]' class='editAgenda'> Edit </a> | <a href='#' id='$row[Id]' class='hapusAgenda'>  Hapus </a></td>
								</tr>
							";
					
				}
			
				echo "	</table>";		
					
			
							

?>

	<script type="text/javascript">
			$(".editAgenda").click(function(){
				
				$.ajax({
					type: "POST",
					url: "agenda/editAgenda.php",
					data : {id : $(this).attr('id')}
				}).success(function(msg) {
					//alert(msg);
					$(".content").html(msg);
					
				});
				
			});
			
			$(".hapusAgenda").click(function(){
				
				$.ajax({
					type: "POST",
					url: "agenda/hapusAgenda.php",
					data : {id : $(this).attr('id')}
				}).success(function(msg) {
					//alert(msg);
					alert(msg);
						$.ajax({
							type: "POST",
							url: "agenda/daftarAgenda.php"
							}).success(function(msg) {
								//alert(msg);
								$(".content").html(msg);
								
							});
					
				});
				
			});
	</script>
	
	