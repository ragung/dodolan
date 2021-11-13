<?php
include 'koneksi.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Dodolan| Detail</title>
	<link rel="stylesheet" href="style.css"></link>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
</head>
<body>
<?php
include 'menu.php';
?>
<section class="konten">
		<div class="container">
			<h1>Detail Product</h1><br>

			<?php 
			$id_produk = $_GET['id'];

			$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk = '$id_produk'");
			$detail = $ambil->fetch_assoc();
			?>
			

			<div class="row">
				<div class="col-md-6">
					<img src="foto_produk/<?php echo $detail['foto_produk']; ?>" class="img-responsive" style="width: 50%">
				</div>
				<div class="col-md-6">
					<h2><?php echo $detail['nama_produk']; ?></h2>
					<h3>Rp. <?php echo number_format($detail['harga_produk']); ?></h3>
					<h3><?php echo number_format($detail['berat_produk']);?>Gr.</h3>
					<h4>Stock : <?php echo ($detail['stok_produk']);  ?></h4>

					<form method="POST">
						<div class="form-group">
							<div class="input-group">
								<h4><u><font color="blue">Input Total Item</u></font></h4>
								<input type="number" min="1" class="form-control" name="jumlah" max="<?php echo $detail['stok_produk']?>" required autofocus>
								<div class="input-group-btn">
									<button class="btn btn-success" name="beli">Buy Now</button>
								</div>
							</div>
						</div>
					</form>
					<?php
					if (isset($_POST['beli'])) {
						$jumlah = $_POST['jumlah'];

						$_SESSION['keranjang'][$id_produk] = $jumlah;
						echo "<script>alert('Your Product has been enter in shopping chart');</script>";
						echo "<script>location='keranjang.php';</script>";
					}
					?>

					<p><?php echo $detail['deskripsi_produk'];?></p><br>
					<br>
					<a href="index.php" class="btn btn-warning">Back</a>
				</div>
			</div>
		</div>
	</section>
</body>
</html>