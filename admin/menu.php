<?
	$pageName = $_GET['pageName'];
	
	switch($pageName){
		case "artikel" :
									echo " <ul class='nav'>
												  <li class=''>
													<a href='../'>Menu Utama</a>
												  </li>
												 </ul>
												  <ul class='nav pull-left'>
													  <li class='dropdown'>
														<a href='#' class='dropdown-toggle' data-toggle='dropdown'>Artikel<b class='caret'></b></a>
														<ul class='dropdown-menu'>
														  <li><a href='editorArtikel.php' class ='daftar'>Daftar Artikel</a></li>
														  <li><a href='editorArtikel.php?action=baru' class ='tulis'>Tulis Artikel</a></li>
														  <li><a href='editorArtikel.php?action=kategori' class='kategori'>Kelola Kategori</a></li>
														</ul>
													  </li>
												</ul>
												";
									break;
		
		case "data_kk" : 
										echo " <ul class='nav'>
												  <li class=''>
													<a href='../'>Menu Utama</a>
												  </li>
												  <li class=''>
													<a href='#' class='inputKK'>Input KK</a>
												  </li>
												  <li class=''>
													<a href='#' class='editKK'>Edit KK</a>
												  </li>
												 </ul>
												 ";
										break;
									
		case "pengurus" : 
										echo " <ul class='nav'>
														  <li>
															<a href='../'>Menu Utama</a>
														  </li>
														  <li>
															<a href='' class='pengurusDesa' onclick='return false;'>Pengurus Desa</a>
														  </li>
														  <li>
															<a href='' class='editPengurus' onclick='return false;'>Edit Pengurus</a>
														  </li>
													</ul>
													<ul class='nav pull-left'>
													  <li class='dropdown'>
														<a href='#' class='dropdown-toggle' data-toggle='dropdown'>PengurusRT/RW<b class='caret'></b></a>
														<ul class='dropdown-menu'>
														  <li><a href=''  class='RT' onclick='return false;'>Pengurus RT</a></li>
														  <li><a href=''  class='RW' onclick='return false;'>Pengurus RW</a></li>
														</ul>
													  </li>
												</ul>
														 
												 ";
										break;
										
			case "setting" : 
										echo " <ul class='nav'>
														  <li>
															<a href='../'>Menu Utama</a>
														  </li>
														  
														  <li>
															<a href='' class='web' onclick='return false;'>Setting Web</a>
														  </li>
														  
														   <li>
															<a href='' class='users' onclick='return false;'>Setting User</a>
														  </li>
													</ul>
												";
										break;
			
			case "agenda" : 
										echo " <ul class='nav'>
														  <li>
															<a href='../'>Menu Utama</a>
														  </li>
														  
														  <li>
															<a href='' class='tambah-agenda' onclick='return false;'>Tambah Agenda</a>
														  </li>
														  
														   <li>
															<a href='' class='edit-agenda' onclick='return false;'>Edit Agenda</a>
														  </li>
													</ul>
												";
										break;
										
			case "laporan" : 
										echo " <ul class='nav'>
														  <li>
															<a href='../'>Menu Utama</a>
														  </li>
													
													</ul>
												";
										break;
	}


?>
<script type='text/javascript'>
	$(".pengurusRtRw").click(function(){
				
				$.ajax({
					type: "GET",
					url: "pengurus/inputPengurusRtRw.php",
				}).success(function(msg) {
					$(".content").html(msg);
				});
				return false;
				
	});
	
		$(".pengurusDesa").click(function(){
				
				$.ajax({
					type: "GET",
					url: "pengurus/inputPengurusDesa.php",
				}).success(function(msg) {
					$(".content").html(msg);
				});
				return false;
				
			});
			
			$(".editPengurus").click(function(){
				
				$.ajax({
					type: "GET",
					url: "pengurus/daftarPengurusDgEdit.php",
				}).success(function(msg) {
					$(".content").html(msg);
				});
				return false;
				
			});
			
			
		$(".RT").click(function(){
				
				$.ajax({
					type: "GET",
					url: "pengurus/inputPengurusRt.php",
				}).success(function(msg) {
					$(".content").html(msg);
				});
				return false;
				
			});
			
		$(".RW").click(function(){
				
				$.ajax({
					type: "GET",
					url: "pengurus/inputPengurusRtRw.php",
				}).success(function(msg) {
					$(".content").html(msg);
				});
				return false;
				
			});
			
				$(".web").click(function(){
					
					$.ajax({
						type: "GET",
						url: "setting/setting.php",
					}).success(function(msg) {
						$(".content").html(msg);
					});
					return false;
					
				});
				
				$(".users").click(function(){
				
				$.ajax({
					type: "GET",
					url: "setting/userBaru.php",
				}).success(function(msg) {
					$(".content").html(msg);
				});
				return false;
				
			});
			
			$(".tambah-agenda").click(function(){
				
				$.ajax({
					type: "GET",
					url: "agenda/agenda.php",
				}).success(function(msg) {
					$(".content").html(msg);
				});
				return false;
				
			});
			
			$(".edit-agenda").click(function(){
				
				$.ajax({
					type: "GET",
					url: "agenda/daftarAgenda.php",
				}).success(function(msg) {
					$(".content").html(msg);
				});
				return false;
				
			});
			
				$(".inputKK").click(function(){
				
				$.ajax({
					type: "GET",
					url: "KK/inputKK.php",
				}).success(function(msg) {
					$(".content").html(msg);
				});
				return false;
				
			});
			
				$(".editKK").click(function(){
				
				$.ajax({
					type: "GET",
					url: "KK/daftarKKDgEdit.php",
				}).success(function(msg) {
					$(".content").html(msg);
				});
				return false;
				
			});
</script>