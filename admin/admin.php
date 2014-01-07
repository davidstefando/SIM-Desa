<!DOCTYPE html>
<html>
	<head>
		<link href="../bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">
		<link href="style.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<? require("auth.php"); ?>
		<div class="navbar navbar-fixed-top navbar-inverse">
			<div class="navbar-inner">
				<div class="container">
					<a href="" class="brand">Administrasi</a>
					<div class="nav-collapse collapse menu">
								<ul class="nav">
								  <li class="">
									<a href="../">Menu Utama</a>
								  </li>
								</ul>
					</div>
				</div>
			</div>
		</div>
		
		
		<? session_start() ?>
				
		<div class="container-fluid">
			<div class="row-fluid">
				<div class="span3 leftbar pull-left">
				<? 
						include("../koneksi.php");
					    $unreadMessages = mysql_query("SELECT * FROM laporan WHERE mark = 0") or die(mysql_error());
						$unreadMessagesCount = mysql_num_rows($unreadMessages);
						if(isAdmin()){
							echo "
											<ul class='metro-sidenav'>
												<li><a href='#' class='orange pengurus'><span>Pengurus</span></a></li>
												<li><a href='#' class=' blue-violate KK'><span>Data Kepala Keluarga</span></a></li>
												<li><a href='#' class=' magenta artikel'><span>Artikel</span></a></li>
												<li><a href='#' class='green agenda'><span>Agenda</span></a></li>
												<li><span class='notify-tip'>$unreadMessagesCount</span><a href='#' class='bondi-blue laporan'><span><br>Laporan</span></a></li>
												<li><a href='#' class=' dark-yellow pengaturan'><span>Pengaturan</span></a></li>
											</ul>
									";
						}
						else{
							echo "
											<ul class='metro-sidenav'>
												<li><a href='#' class='orange pengurus'><span>Pengurus</span></a></li>
												<li><a href='#' class=' blue-violate KK'><span>Data Kepala Keluarga</span></a></li>
												<li><a href='#' class=' magenta artikel'><span>Artikel</span></a></li>
												<li><a href='#' class='green agenda'><span>Agenda</span></a></li>
												<li><span class='notify-tip'>$unreadMessagesCount</span><a href='#' class=' bondi-blue laporan'><span><br>Laporan</span></a></li>
											</ul>
									";
						
						}
				?>
				
					<div class="span8 offset2 user">
						<hr>
						<strong><? echo $_SESSION['level']; ?></strong><br>
						<small> <? echo $_SESSION['nama']; ?><br></small>
						<a href="#" class="label edit">Edit Profil</a> | <a href="logout.php" class="label">Logout</a>
						<hr>
					</div>
				</div>
				<div class="span9 content pull-right">
					<div class="hero-unit">
						<h1>Selamat Datang di Halaman Administrasi</h1>
						<p>Pilih menu yang ada di sebelah kiri layar</p>
						<p>
							<a class="btn btn-primary btn-large">
								<-
							</a>
						</p>
					</div>
				</div>
			</div>
		</div>
		<script type="text/javascript" src="../bootstrap/js/jquery-1.9.1.min.js"></script>
		<script type="text/javascript">
			
		
			$(".artikel").click(function(){
				//fetch data
				$.ajax({				
					type: "GET",
					url: "artikel/Artikel.php",
					data : {action : "baru"}
				}).success(function(msg) {
					//alert(msg);
					$(".content").html(msg);
					
				});
				//fetch menu
				$.ajax({
					type: "GET",
					url: "menu.php",
					data : {pageName : "artikel"}
				}).success(function(msg) {
					//alert(msg);
					$(".menu").html(msg);
					
				});
				
			});
			
			
			$(".pengaturan").click(function(){
				$.ajax({
					type: "GET",
					url: "setting/setting.php"
				}).success(function(msg) {
					//alert(msg);
					$(".content").html(msg);
					
				});
				
				//fetch menu
				$.ajax({
					type: "GET",
					url: "menu.php",
					data : {pageName : "setting"}
				}).success(function(msg) {
					//alert(msg);
					$(".menu").html(msg);
					
				});
			});
			
			$(".agenda").click(function(){
				$.ajax({
					type: "GET",
					url: "agenda/agenda.php"
				}).success(function(msg) {
					//alert(msg);
					$(".content").html(msg);
					
				});
				//fetch menu
				$.ajax({
					type: "GET",
					url: "menu.php",
					data : {pageName : "agenda"}
				}).success(function(msg) {
					//alert(msg);
					$(".menu").html(msg);
					
				});
			});
			
				$(".laporan").click(function(){
				$.ajax({
					type: "GET",
					url: "laporan/laporan.php"
				}).success(function(msg) {
					//alert(msg);
					$(".content").html(msg);
					
				});
				
				//fetch menu
				$.ajax({
					type: "GET",
					url: "menu.php",
					data : {pageName : "laporan"}
				}).success(function(msg) {
					//alert(msg);
					$(".menu").html(msg);
					
				});
			});
			
				$(".KK").click(function(){
				$.ajax({
					type: "GET",
					url: "KK/inputKK.php"
				}).success(function(msg) {
					//alert(msg);
					$(".content").html(msg);
					
				});
				
				//fetch menu
				$.ajax({
					type: "GET",
					url: "menu.php",
					data : {pageName : "data_kk"}
				}).success(function(msg) {
					//alert(msg);
					$(".menu").html(msg);
					
				});
				
			});
			
			$(".pengurus").click(function(){
				$.ajax({
					type: "GET",
					url: "pengurus/inputPengurusDesa.php"
				}).success(function(msg) {
					//alert(msg);
					$(".content").html(msg);
					
				});
				
					//fetch menu
				$.ajax({
					type: "GET",
					url: "menu.php",
					data : {pageName : "pengurus"}
				}).success(function(msg) {
					//alert(msg);
					$(".menu").html(msg);
					
				});
			});
			
				$(".edit").click(function(){
				$.ajax({
					type: "GET",
					url: "editProfil.php"
				}).success(function(msg) {
					//alert(msg);
					$(".content").html(msg);
					
				});
			});
			
			
		</script>
		
		<script type="text/javascript" src="../bootstrap/js/tiny_mce/tiny_mce.js"></script>
		<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
		<!-- Masukkan TinyMCE ke TextArea -->
		<script type="text/javascript">
			tinyMCE.init({
				// General options
				mode : "textareas",
				theme : "advanced",
				plugins : "pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave",
				elements : "isi",
				

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
	</body>
</html>


