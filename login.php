<?php 
  require 'connection.php';
  checkLoginAtLogin();
  $checkJabatan = mysqli_query($conn, "SELECT * FROM user");

  if (isset($_POST['btnLogin'])) {
  	$username = htmlspecialchars($_POST['username']);
  	$password = htmlspecialchars($_POST['password']);
	$jabatan = htmlspecialchars($_POST['id_jabatan']);
  	$checkUsername = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");
  	$checkJabatan = mysqli_query($conn, "SELECT username FROM user where id_jabatan = $jabatan");
  	if ($data = mysqli_fetch_assoc($checkUsername)) {
  		if (password_verify($password, $data['password'])) {
  			$_SESSION = [
  				'id_user' => $data['id_user'],
  				'username' => $data['username'],
  				'id_jabatan' => $data['id_jabatan']
  			];
			if($_SESSION['id_jabatan'] == 1){
				header('location:dashboard.php');
			}else{
				header('location:login.php');
			}
  		} else {
			setAlert("Password yang anda masukkan salah", "Check password anda kembali!", "error");
			header("Location: login.php");
	  	}
  	} else {
		setAlert("Username tidak terdaftar", "Check username anda kembali!", "error");
		header("Location: login.php");
  	}
  }
  
?>

<!DOCTYPE html>
<html>
<head>
  <?php include 'include/css.php'; ?>
  <title>Login</title>
  <style>
	* {
	    margin: 0;
	    padding: 0;
	    box-sizing: border-box;
	}

  	body {
	    min-height: 100vh;    
	    display: flex;
		overflow: hidden;
	}
	
  	
	.container{
		background: red;
	}
	.box-login{
		width: 1300px;
		background: white;
		height: 100vh;
		transform: translateX(-50px);
	}

</style>
</head>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Mochiy+Pop+P+One&family=Poppins:wght@600&display=swap" rel="stylesheet">
<body>
	<div class="side-image">
		<img src="assets/img/bg.png" alt="">
	</div>
	<div class="container">
		<div class="row justify-content-center">
			<div class=" mx-5 py-4 px-5 text-dark box-login" style="display: flex; justify-content:center; align-items:center; flex-direction:column;">
			<div class="logo-img" style="position: absolute; top:20px; left:30px;">
				<img src="assets/img/cash.png" alt="" width="50px">
				<span style="font-weight: bold;font-size: 25px; margin-left:10px;font-family: 'Poppins', sans-serif;">IOCASH</span>
			</div>
				<div class="text" style="transform: translateX(-70px);">
					<h1 class="text-left" style="font-family: 'Mochiy Pop P One', sans-serif;">Login</h1>
					<p>Login dibawah untuk akses akunmu!!!</p>
				</div>
				<form method="post">
					<div class="form-group" style="width: 300px;">
						<label for="username"><i class="fas fa-fw fa-user"></i> Username</label>
						<input type="hidden" value="1" name="id_jabatan">
						<input required class="form-control" type="text" name="username" id="username" autocomplete="off" style="width: 400px; border-radius:10px;">
					</div>
					<div class="form-group">
						<label for="password"><i class="fas fa-fw fa-lock"></i> Password</label>
						<input required class="form-control" type="password" name="password" id="password" style="border-radius: 10px;">
					</div>
					<div style="display:flex; justify-content: space-around; align-items:center;">
						<div class="form-group">
							<button class="btn text-white" type="submit" name="btnLogin" style="border-radius: 10px; background:#4C4DDC; width:400px;"><i class="fas fa-fw fa-sign-in-alt text-white"></i> Login</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>

	<footer style="position: absolute; bottom: 0; width: 100%; text-align: center;">
		<div style="background-color: transparent;" class="container-fluid mt-5">
			<div class="row justify-content-center">
				<div class="col-4 text-center pt-4 pb-2" style="transform: translateX(260px);">
					<p class="text-dark fw-bold text-right">&copy; <span class="text-dark fw-bold" id="copy"></span>. By Raffa Yuda Pratama. All Right Reserved.</p>
				</div>
			</div>
		</div>
	</footer>
	<script>
		const copy = document.getElementById('copy');
		const waktu = new Date();
		copy.innerHTML = waktu.getFullYear();
	</script>
</body>
</html>