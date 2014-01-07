<div id="formSetting">
					<form class="form-horizontal" method="post">
						<div class="control-group">
							<label class="control-label" for="namaDesa">Nama Desa : </label>
							<div class="controls">
								<input type="text" name="namaDesa" id="namaDesa">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="subArtikel">Subtitle Halaman Artikel : </label>
							<div class="controls">
								<input type="text" name="subArtikel" id="subArtikel">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="subLaporan">Pesan Laporan : </label>
							<div class="controls">
								<textarea rows="3" name="subLaporan" id="subLaporan"></textarea>
							</div>
						</div>
						<div class="control-group">
							<div class="controls"><input type="submit" class="btn btn-danger" value="simpan" name="simpan"></div>
						</div>
					</form>
				</div>
				
				<?
					include("../koneksi.php");
					
					function update_setting($nama,$isi){
						$simpanSetting = mysql_query("UPDATE setting SET Isi = '$isi' WHERE Nama = '$nama'") or die(mysql_error());
					}
					
					
					if(isset($_POST['simpan'])){		
						if($_POST['namaDesa'] != ""){
							update_setting('Nama Desa', $_POST['namaDesa']);
						}
						if($_POST['subArtikel'] != ""){
							update_setting('Sub Artikel', $_POST['subArtikel']);
						}
						if($_POST['subLaporan'] != ""){
							update_setting('Sub Laporan', $_POST['subLaporan']);
						}
					}
				?>
				  