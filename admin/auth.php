<?
		session_start();
		if((isset($_SESSION['username'])) && (isset($_SESSION['password']))){
			
		}
		else{
			echo "
						<script>
							alert('Anda Harus LOGIN terlebih dahulu!!!');
						</script>
					";
					exit;
		}
		
		function isAdmin(){
			if(isset($_SESSION['level'])){
				if($_SESSION['level'] === "Admin"){
					return true;
				}
				else{
					return false;
				}
			}
		}
			
?>