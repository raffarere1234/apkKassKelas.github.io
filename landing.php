

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
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<body>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-5 mx-5 py-4 px-5 text-dark border border-dark box-login" style="display: flex; justify-content:center; align-items:center; flex-direction:column;">
				<h3 class="text-center">Choose your login as</h3>
				<img src="assets/img/img_properties/study.png" alt="" width="300">
					<div class="form-group">
						<a href="login.php" class="btn btn-primary" style="width: 200px; height:50px; display:flex; justify-content:center; align-items:center;"><i class="bi bi-person-fill-gear" style="font-size: 30px; margin-right:20px;"></i> Admin</a>
					</div>
                    <h1>or</h1>
                    <br>
					<div class="form-group">
						<a href="login_guest.php" class="btn btn-success" style="width: 200px; height:50px; display:flex; justify-content:center; align-items:center;"><i class="bi bi-person-fill" style="font-size: 30px; margin-right:20px;"></i>Guest</a>
					</div>
				
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