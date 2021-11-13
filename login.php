<?php
include 'koneksi.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Sign in | Dodolan </title>
	<link rel="stylesheet" href="style.css"></link>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
</head>
<body>
<?php include 'menu.php'; ?>


	<div class="container">
		<div class="row" style="margin-top: 100px">
			<div class="col-md-4 col-md-offset-4">
				<div class="panel panel-default">
					<div class="panel-heading">
						<div class="panel-title text-center">
							<label>Dodolan | Sign in</label>
						</div>
					</div>
					<div class="panel-body">
						<form method="POST">
							<div class="form-group">
								<label fixed>Email</label>
								<input type="email" class="form-control" name="email">
							</div>
							<div class="form-group">
								<label fixed>Password</label>
								<input type="password" class="form-control" name="password">
							</div>
							<button class="btn btn-primary btn-lg btn-block" name="login">Sign in</button><br>
							<p>Daftar Sebagai Pelanggan? <a href="daftar.php" style="text-decoration: none;"><b>Sign up</b></a></p>
						</form>
						<?php
						if (isset($_POST['login'])) {
							$email = $_POST['email'];
							$password = $_POST['password'];

							$ambil = $koneksi->query("SELECT * FROM pelanggan WHERE email_pelanggan = '$email' AND password_pelanggan = '$password'");
							$akun_cocok = $ambil->num_rows;

							if($akun_cocok == 1) {
								$akun = $ambil->fetch_assoc();

								$_SESSION['pelanggan'] = $akun;
								echo "<div class='alert alert-success text-center'>Login Berhasil</div>";
								if (isset($_SESSION['keranjang']) OR !empty($_SESSION['keranjang'])) {

								echo "<meta http-equiv='refresh' content='1;url=checkout.php'>";
								}else{
									echo "<meta http-equiv='refresh' content='1;url=index.php'>";
								}
							}else{
								echo "<div class='alert alert-danger text-center'>Login Gagal, SIlahkan periksa kembali akun anda</div>";
								echo "<meta http-equiv='refresh' content='1;url=login.php'>";
							}
						}
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>