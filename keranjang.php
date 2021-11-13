<?php include 'koneksi.php';
if (empty($_SESSION['keranjang']) OR !isset($_SESSION['keranjang'])) {
	echo "<script>alert('Produk kosong, silahkan belanja terlebih dahulu');</script>";
	echo "<script>location='index.php';</script>";
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Dodolan | Shopping Chart</title>
	<link rel="stylesheet" href="style.css">
<body>
<?php include 'menu.php';?>

	<section class="konten">
		<div class="container">
			<h1>Shopping Chart</h1><br>
			<table class="table table-bordered text-center">
				<thead>
					<tr>
						<th class="text-center">No.</th>
						<th class="text-center">Product</th>
						<th class="text-center">Price</th>
						<th class="text-center">Quantity</th>
						<th class="text-center">Total</th>
						<th class="text-center">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php $nomor = 1;?>
					<?php foreach ($_SESSION['keranjang'] as $id_produk => $jumlah) {?>
					<?php
					$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk = '$id_produk'");
					$pecah = $ambil->fetch_assoc();
					$subharga = $pecah['harga_produk']* $jumlah;
					?>
					<tr>
						<td><?php echo $nomor; ?></td>
						<td><?php echo $pecah['nama_produk']; ?></td>
						<td>Rp. <?php echo number_format($pecah['harga_produk']); ?></td>
						<td><?php echo $jumlah; ?></td>
						<td>Rp. <?php echo number_format($subharga); ?></td>
						<td>
							<a href="hapus.php?id=<?php echo $id_produk ?>" onclick="return confirm('Are you sure want to delete this item?')">Delete</a>
						</td>
					</tr>
					<?php $nomor++; ?>
				<?php }?>
				</tbody>
			</table>
			<br>
			<br>
			<br>
			<a href="index.php" class="btn btn-default">Continue Shopping</a>
			<a href="checkout.php" class="btn btn-success">Checkout</a>
		</div>
		
	</section>
</body>
</html>