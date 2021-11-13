<?php include 'koneksi.php'; 

if (!isset($_SESSION['pelanggan']) OR empty($_SESSION['pelanggan'])) {
	echo "<script>alert('Silahkan Login');</script>";
	echo "<script>location='login.php';</script>";
}


$idpem = $_GET['id'];
$ambil = $koneksi->query("SELECT * FROM pembelian WHERE id_pembelian = '$idpem'");
$detpem = $ambil->fetch_assoc();

$id_pel_beli = $detpem['id_pelanggan'];

$id_pel_login = $_SESSION['pelanggan']['id_pelanggan'];

if ($id_pel_login != $id_pel_beli) {
	echo "<script>alert('Dont be mad :v');</script>";
	echo "<script>location='riwayat.php';</script>";
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Payment | Hijab.co </title>
	<link rel="stylesheet" href="style.css"></link>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
</head>
<body>
<?php include 'menu.php'; ?>
	<div class="container">
		<h1>Confirm Payment</h1>
		<p>Send your proof of payment here</p>
		<div class="alert alert-info">Your Total Bill <strong>Rp. <?php echo number_format($detpem['total_pembelian']); ?></strong></div>
		<form method="POST" enctype="multipart/form-data">
			<div class="form-group">
				<label>Sender Name</label>
				<input type="text" class="form-control" name="nama">
			</div>
			<div class="form-group">
				<label>Bank Name</label>
				<input type="text" class="form-control" name="bank">
			</div>
			<div class="form-group">
				<label>Bill</label>
				<input type="number" class="form-control" name="jumlah" min="1">
			</div>
			<div class="form-group">
				<label>Proof Photos</label>
				<input type="file" class="form-control" name="bukti">
				<p class="text text-danger">Maximum size of photo proof 2MB</p>
			</div>
			<button class="btn btn-primary" name="kirim">Send</button>
		</form>
	</div>
	<<?php
	if (isset($_POST['kirim'])) {
		$namabukti = $_FILES['bukti']['name'];
		$lokasibukti = $_FILES['bukti']['tmp_name'];
		$namafix = date("Y-m-d").$namabukti;
		move_uploaded_file($lokasibukti, "foto_bukti/$namafix");

		$nama = $_POST['nama'];
		$bank = $_POST['bank'];
		$jumlah = $_POST['jumlah'];
		$tanggal = date("Y-m-d");

		$koneksi->query("INSERT INTO pembayaran(id_pembelian, nama, bank, jumlah, tanggal, bukti) VALUES ('$idpem', '$nama', '$bank', '$jumlah', '$tanggal', '$namafix')");

		$koneksi->query("UPDATE pembelian SET status_pembelian = 'Lunas' WHERE id_pembelian = '$idpem'");
		echo "<script>alert('Thank You for paid in your bill');</script>";
		echo "<script>location='riwayat.php';</script>";
	}
	?>
</body>
</html>