<?
	include("../../koneksi.php");
	$action = $_GET['action'];
	if(isset($_GET['id'])){$id = $_GET['id'];}
	if(isset($_POST['id'])){$idKategori = $_POST['id'];}
	
	switch($action){
		case "baru" : echo "
									<div class='page-header'><h2>Tulis Artikel Baru</h2></div>
									<form action='artikel/kelolaArtikel.php?action=baru' method='post' class='form-horizontal tulis'> 
										<div class='control-group'>
											<label class='control-label' for='judul'>Judul</label>
											<div class='controls'>
												<input type='text' name='judul' id='judul'>
											</div>
										</div>
										<div class='control-group'>
											<label class='control-label' for='isi'>Isi</label>
											<div class='controls'>
												<textarea name='artikel' id='isi'></textarea>
											</div>
										</div>
										<div class='control-group'>
											<label class='control-label' for='kategori'>Kategori</label>
											<div class='controls'>
											<select name='kategori' id='kategori'>
											";
											$selectKategori = mysql_query("SELECT * FROM kategori");
											
											while($row = mysql_fetch_array($selectKategori)){
												echo "
															<option value='$row[Id]'>$row[Kategori]</option>
														";
											}
								
								echo "
											</select>
											</div>
										</div>
										<div class='control-group'>
											<div class='controls'><input type='submit' class='btn btn-primary' value='simpan' name='simpan' id='submitBaru'></div>
										</div>			
									</form>
									
									";
								break;
									
		case "edit" : 	$getArtikel = mysql_query("SELECT * FROM artikel WHERE Id = '$id'");
							$row = mysql_fetch_array($getArtikel);
							echo "
									<div class='page-header'><h2>Edit Artikel</h2></div>
									<form action='artikel/kelolaArtikel.php?action=edit' method='post' class='form-horizontal edit'> 
										<div class='control-group'>
											<input type='hidden' id='id' value='$row[Id]'>
											<label class='control-label' for='judul'>Judul</label>
											<div class='controls'>
												<input type='text' name='judul' id='judul' value='$row[Judul]'>
											</div>
										</div>
										<div class='control-group'>
											<label class='control-label' for='isi'>Isi</label>
											<div class='controls'>
												<textarea name='isi' id='isi'>$row[Isi]</textarea>
											</div>
										</div>
										<div class='control-group'>
											<label class='control-label' for='kategori'>Kategori</label>
											<div class='controls'>
											<select name='kategori' id='kategori'>
											";
										
											
											$selectKategori = mysql_query("SELECT * FROM kategori");
											
											while($row = mysql_fetch_array($selectKategori)){
												echo "
															<option value='$row[Id]'>$row[Kategori]</option>
														";
											}
								
								echo "
											</select>
											</div>
										</div>
										<div class='control-group'>
											<div class='controls'><input type='submit' class='btn btn-primary' value='simpan' name='simpan' id='submitEdit'></div>
										</div>			
									</form>	
									";
								break;
				case "kategori" : 
												echo "<div class='page-header'><h2>Tambah Kategori</h2><small>Ketikkan nama kategori artikel baru</small></div>";
												echo "<form action='artikel/kelolaArtikel.php?action=kategori' method='post' class='form-horizontal kategori'>
																<div class='control-group'>
																	<label class='control-label' for='judul'>Kategori</label>
																	<div class='controls'>
																		<input type='text' name='kategori' id='judul' class='span4'>
																	</div>
																</div>
																<div class='control-group'>
																	<div class='controls'><input type='submit' class='btn btn-primary btn-large' value='simpan' name='simpan' id='submitKategori'></div>
																</div>			
															</form>
															";
															echo "
																		 <table class='table table-bordered'>
																			<tr>
																				<td>
																					Id
																				</td>
																				<td class='span9'>
																					<center>Nama Kategori</center>
																				</td>
																				<td>
																					Kelola
																				</td>
																			</tr>
																	";
												$selectKategori = mysql_query("SELECT * FROM kategori");
												while($row = mysql_fetch_array($selectKategori)){
													echo "		<tr>
																		<td>
																			$row[Id]
																		</td>
																		<td class='span9'>
																			$row[Kategori]
																		</td>
																		<td>
																			<a href='#' onclick='return false' id='$row[Id]' class='edit-kategori'>Edit</a> |  <a href='#' onclick='return false' id='$row[Id]' class='hapus-kategori'>Hapus</a>
																		</td>
																	</tr>
																
																";
												}
												echo "</table>";
												break;
												
												
				case "edit_kategori" : 
														$selectKategori = mysql_query("SELECT * FROM kategori WHERE Id = '$idKategori'") or die(mysql_error());
														$row = mysql_fetch_array($selectKategori);
														echo "<div class='page-header'><h2>Edit Kategori</h2><small>Ketikkan nama kategori artikel</small></div>";
														echo "<form action='artikel/kelolaArtikel.php?action=kategori' method='post' class='form-horizontal kategori'>
																<div class='control-group'>
																	<label class='control-label' for='judul'>Kategori</label>
																	<div class='controls'>
																		<input type='text' name='kategori' value='$row[Kategori]' id='judul' class='span4'>
																		<input type='hidden' name='id' value='$row[Id]'>
																	</div>
																</div>
																<div class='control-group'>
																	<div class='controls'><input type='submit' class='btn btn-primary btn-large'  value='simpan' name='simpan' id='submitEditKategori'></div>
																</div>			
															</form>
															";
							
	}

?>


<script type="text/javascript" src="../../bootstrap/js/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript" src="../../bootstrap/js/jquery-1.9.1.js"></script>
<!-- Masukkan TinyMCE ke TextArea -->
<script type="text/javascript">
	
		// this is the id of the submit button
	$("#submitBaru").click(function() {

		var url = "artikel/kelolaArtikel.php?action=baru"; // the script where you handle the form input.
		 var content = tinyMCE.get('isi').getContent();
		var judul = $("#judul").val();
		var kategori = $("#kategori").val();
		$.ajax({
			   type: "POST",
			   url: url,
			   data: {judul : judul , artikel : content , kategori : kategori} , // serializes the form's elements.
			   success: function(data)
			   {
				   alert(data); // show response from the php script.
			   }
			 });

		return false; // avoid to execute the actual submit of the form.
	});
			
	$("#submitEdit").click(function() {

		var url = "artikel/kelolaArtikel.php?action=edit"; // the script where you handle the form input.
		 var content = tinyMCE.get('isi').getContent();
		var judul = $("#judul").val();
		var id = $("#id").val();
		var kategori = $("#kategori").val();
		$.ajax({
			   type: "POST",
			   url: url,
			   data: {id : id ,judul : judul , artikel : content, kategori : kategori}, // serializes the form's elements.
			   success: function(data)
			   {
				   alert(data); // show response from the php script.
			   }
			 });

		return false; // avoid to execute the actual submit of the form.
	});
			
	
		$("#submitKategori").click(function() {

		var url = "artikel/kelolaArtikel.php?action=kategori"; // the script where you handle the form input.

		$.ajax({
			   type: "POST",
			   url: url,
			   data: $(".kategori").serialize(), // serializes the form's elements.
			   success: function(data)
			   {
				   alert(data); // show response from the php script.
				   $.ajax({
					   type: "GET",
					   url: 'artikel/editorArtikel.php?action=kategori',
					   success: function(data)
					   {
						   $(".content").html(data); // show response from the php script.
					   }
					 });
			   }
			 });
			
		

		return false; // avoid to execute the actual submit of the form.
	});
	
	
	
		$("#submitEditKategori").click(function() {

		var url = "artikel/KelolaArtikel.php?action=edit_kategori"; // the script where you handle the form input.

		$.ajax({
			   type: "POST",
			   url: url,
			   data: $(".kategori").serialize(), // serializes the form's elements.
			   success: function(data)
			   {
				   $.ajax({
					   type: "GET",
					   url: 'artikel/editorArtikel.php?action=kategori',
					   success: function(data)
					   {
						   $(".content").html(data); // show response from the php script.
					   }
					 });
			   }
			 });
			
		

		return false; // avoid to execute the actual submit of the form.
	});
	
	
	
	
		$(".edit-kategori").click(function() {

		var url = "artikel/editorArtikel.php?action=edit_kategori"; // the script where you handle the form input.
        
		$.ajax({
			   type: "POST",
			   url: url,
			   data:{ id : $(this).attr('id')}, // serializes the form's elements.
			   success: function(data)
			   {
				    $(".content").html(data); // show response from the php script.
				}
			 });
			
		

		return false; // avoid to execute the actual submit of the form.
	});
	
		$(".hapus-kategori").click(function() {

		var url = "artikel/kelolaArtikel.php?action=hapus_kategori"; // the script where you handle the form input.
		
		$.ajax({
			   type: "POST",
			   url: url,
			   data: {id : $(this).attr('id')}, // serializes the form's elements.
			   success: function(data)
			   {
				  $.ajax({
					   type: "GET",
					   url: 'artikel/editorArtikel.php?action=kategori',
					   success: function(data)
					   {
							alert("Kategori Berhasil Dihapus");
						   $(".content").html(data); // show response from the php script.
					   }
					 });
			   }
			 });
			
		

		return false; // avoid to execute the actual submit of the form.
	});
			
	
	
	tinyMCE.init({
		// General options
		mode : "textareas",
		theme : "advanced",
		plugins : "pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave",
		

		// Theme options
		theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
		theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,

		// Example content CSS (should be your site CSS)
		content_css : "css/content.css",

		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "lists/image_list.js",
		media_external_list_url : "lists/media_list.js",

		// Style formats
		style_formats : [
			{title : 'Bold text', inline : 'b'},
			{title : 'Red text', inline : 'span', styles : {color : '#ff0000'}},
			{title : 'Red header', block : 'h1', styles : {color : '#ff0000'}},
			{title : 'Example 1', inline : 'span', classes : 'example1'},
			{title : 'Example 2', inline : 'span', classes : 'example2'},
			{title : 'Table styles'},
			{title : 'Table row 1', selector : 'tr', classes : 'tablerow1'}
		],

		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
	});
	
</script>