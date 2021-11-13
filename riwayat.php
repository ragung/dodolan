<?php
include 'koneksi.php';
if (!isset($_SESSION['pelanggan']) OR empty($_SESSION['pelanggan'])) {
	echo "<script>alert('Silahkan Login');</script>";
	echo "<script>location='login.php';</script>";
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Dodolan | History</title>
	<link rel="stylesheet" href="style.css"></link>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
</head>
<body>
<?php include 'menu.php';?>

<div class="riwayat">
		<div class="container">
			<h3> Shopping History 
				<?php echo $_SESSION['pelanggan']['nama_pelanggan'] 
				?>
				</h3>
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>No.</th>
						<th>Date</th>
						<th>Status</th>
						<th>Total</th>
						<th>Option</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$nomor = 1;
					$id_pelanggan = $_SESSION['pelanggan']['id_pelanggan'];
					$ambil = $koneksi->query("SELECT * FROM pembelian WHERE id_pelanggan = $id_pelanggan");
					while ($pecah = $ambil->fetch_assoc()){
					?>
					<tr>
						<td><?php echo $nomor; ?></td>
						<td><?php echo $pecah["tanggal_pembelian"] ?></td>
						<td><?php echo $pecah["status_pembelian"] ?><br>
							<?php if(!empty($pecah['resi_pembelian'])): ?>
							Resi: <?php echo $pecah['resi_pembelian']; ?>
							<?php endif?>
						</td>
						<td> Rp. <?php echo number_format($pecah["total_pembelian"]) ?></td>
						<td><br>
							<a href="nota.php?id=<?php echo $pecah["id_pembelian"] ?>" class="btn btn-info"> Note </a>
							<a href ="pembayaran.php?id=<?php echo $pecah['id_pembelian']; ?>" class="btn btn-success">Payment</a>
						</td>
					</tr>
					<?php $nomor++; ?>
				<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</body>
</html>