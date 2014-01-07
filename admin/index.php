<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Administrasi | Login</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      /* Override some defaults */
      html, body {
        background-color: #e1e1e1;
      }
      body {
        padding-top: 40px; 
      }
      .container {
        width: 300px;
      }

      /* The white background content wrapper */
      .container > .content {
        background-color: #fff;
        padding: 20px;
        margin: 0 -20px; 
		margin-top:41%;
        -webkit-border-radius: 10px 10px 10px 10px;
           -moz-border-radius: 10px 10px 10px 10px;
                border-radius: 10px 10px 10px 10px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.15);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.15);
                box-shadow: 0 1px 2px rgba(0,0,0,.15);
      }

	  .login-form {
		margin-left: 65px;
	  }
	
	  legend {
		margin-right: -50px;
		font-weight: bold;
	  	color: #404040;
	  }

    </style>

</head>
<body>
  <div class="container">
    <div class="content">
      <div class="row">
        <div class="login-form">
          <h2>Login</h2>
		  <small>Untuk Mengakses halaman administrasi anda harus login terlebih dahulu</small>
          <form action="" method="post">
            <fieldset>
              <div class="clearfix">
                <input type="text" placeholder="Username" name="username" required>
              </div>
              <div class="clearfix">
                <input type="password" placeholder="Password" name="password" required>
              </div>
              <button class="btn btn-primary" type="submit" name="submit">Log In</button>
            </fieldset>
          </form>
        </div>
      </div>
    </div>
  </div> <!-- /container -->
  
	<?
		include("../koneksi.php");
		
		
		
		if(isset($_POST['submit'])){
			$username = $_POST['username'];
			$password = md5($_POST['password']);
		
			$cariUser = mysql_query("SELECT * FROM user WHERE Username = '$username' AND Password = '$password'") or die(mysql_error());
			
			if(mysql_num_rows($cariUser)){
				$selectUser = mysql_query("SELECT * FROM user a INNER JOIN datauser b ON a.id = b.id WHERE a.Username = '$username' AND a.Password = '$password'");
				$row = mysql_fetch_array($selectUser);
				session_start();
				$_SESSION['id'] = $row['Id'];
				$_SESSION['nama'] = $row['Nama'];
				$_SESSION['level'] = $row['Level'];
				
				
				
				$_SESSION['username'] = $row['Username'];
				$_SESSION['password'] = $row['Password'];
				
					$tgl=date ("d-F-Y");
					date_default_timezone_set("Asia/Jakarta");
					$waktu=date("H:i:s");
					
				mysql_query("UPDATE user SET Lastaccess = '$tgl $waktu' WHERE id='$row[Id]'");
				
				header("Location:admin.php");
			}
			else{
					echo "
								<script>
									alert('Username dan Password yang anda masukkan tidak cocok');
								</script>
							";
			}
		}
	
	?>
</body>
</html>