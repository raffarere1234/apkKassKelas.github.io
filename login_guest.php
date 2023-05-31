<?php 
  require 'connection.php';
  checkLoginAtLogin();

  if (isset($_POST['btnLogin'])) {
  	$username = htmlspecialchars($_POST['username']);
  	$password = htmlspecialchars($_POST['password']);
	$jabatan = htmlspecialchars($_POST['id_jabatan']);
  	$checkUsername = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");
  	$checkJabatan = mysqli_query($conn, "SELECT * FROM user WHERE id_jabatan = '$jabatan'");
  	if ($data = mysqli_fetch_assoc($checkUsername)) {
  		if (password_verify($password, $data['password'])) {
  			$_SESSION = [
  				'id_user' => $data['id_user'],
  				'username' => $data['username'],
  				'id_jabatan' => $data['id_jabatan']
  			];
			if($checkJabatan !== 1){
				header("Location: dashboard.php");
			}
  		} else {
			setAlert("Password your insert is false!", "Check your Password BACK!", "error");
			header("Location: login.php");
	  	}
  	} else {
		setAlert("Username is not registered!", "Check your Username BACK!", "error");
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
	    background-size: cover;
	    background-repeat: no-repeat;
	    background-image: url(assets/img/img_properties/bg-login.jpg);
	}
	
  	.container {
	    position: absolute;
	    left: 50%;
	    top: 50%;
	    transform: translate(-50%, -55%);
	}

	.box-login{
		background: white;
		height: 500px;
		border-radius: 15px;
	}

</style>
</head>
<body>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-5 mx-5 py-4 px-5 text-dark border border-dark box-login" style="display: flex; justify-content:center; align-items:center; flex-direction:column;">
				<h3 class="text-center">Please Login</h3>
				<img src="assets/img/img_properties/study.png" alt="" width="300">
				<form method="post">
					<div class="form-group" style="width: 300px;">
						<label for="username"><i class="fas fa-fw fa-user"></i> Username</label>
						<input type="hidden" value="1" name="id_jabatan">
						<input required class="form-control rounded-pill" type="text" name="username" id="username" autocomplete="off">
					</div>
					<div class="form-group">
						<label for="password"><i class="fas fa-fw fa-lock"></i> Password</label>
						<input required class="form-control rounded-pill" type="password" name="password" id="password">
					</div>
					<div style="display:flex; justify-content: space-around; align-items:center;">
						<div class="form-group">
							<button class="btn btn-success rounded-pill" type="submit" name="btnLogin"><i class="fas fa-fw fa-sign-in-alt"></i> Login</button>
						</div>
						<div class="form-group">
							<a href="landing.php" class="btn btn-danger rounded-pill text-light" type="submit" name="btnLogin"><i class="fas fa-fw fa-sign-in-alt"></i> Back</a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>

	<footer style="position: absolute; bottom: 0; width: 100%; text-align: center;">
		<div style="background-color: transparent;" class="container-fluid mt-5">
			<div class="row justify-content-center">
				<div class="col-4 text-center text-white pt-4 pb-2">
					<p>&copy; <span id="copy"></span>. By Raffa Yuda Pratama. All Right Reserved.</p>
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