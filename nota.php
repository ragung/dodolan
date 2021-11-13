<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Dodolan | Note</title>
	<link rel="stylesheet" href="style.css"></link>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
</head>
<body>
<?php include 'menu.php';?>

	<section class="konten">
		<div class="container">
			<h2 class="text-center">Customer Note</h2>
		<?php
		$ambil = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan = pelanggan.id_pelanggan WHERE pembelian.id_pembelian = '$_GET[id]'");
		$detail = $ambil->fetch_assoc();
		?>
<?php
$idpelangganyangsudahbeli = $detail['id_pelanggan'];
$idpelangganyangsudahlogin = $_SESSION['pelanggan']['id_pelanggan'];
if ($idpelangganyangsudahbeli!== $idpelangganyangsudahlogin) {
	echo "<script>alert('Jangan Nakal');</script>";
	echo "<script>location='riwayat.php';</script>";

}
?>
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<h3>Buying</h3>
				<strong>No. Buying : <?php echo $detail['id_pembelian']; ?></strong><br>
				Date : <?php echo $detail['tanggal_pembelian']; ?> <br>
				Total : Rp.  <?php echo number_format($detail['total_pembelian']); ?>
			</div>
			<div class="col-md-4">
				<h3>Customer</h3>
				<strong>Name : <?php echo $detail['nama_pelanggan']; ?></strong><br>
			Telephone : <?php echo $detail['telpon_pelanggan']; ?> <br>
			Email : <?php echo $detail['email_pelanggan']; ?>
			</div>
			<div class="col-md-4">
				<h3>Sending</h3>
				<strong>Kab. / Kota : <?php echo $detail['nama_kota']; ?></strong><br>
				Bill Sending : Rp. <?php echo number_format($detail['tarif']); ?><br>
				Address : <?php echo $detail['alamat_pengiriman']; ?>
			</div>
		</div>
	</div>

<table class="table table-bordered text-center">
	<thead>
		<tr>
			<th class="text-center"> No. </th>
			<th class="text-center"> Product Name </th>
			<th class="text-center"> Product Price</th>
			<th class="text-center"> Weight </th>
			<th class="text-center"> Quantity </th>
			<th class="text-center"> Total Price </th>
			<th class="text-center"> Total Weight </th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1; ?>
		<?php $total_belanja= 0; ?>
		<?php
		$ambil = $koneksi->query("SELECT * FROM pembelian_produk WHERE id_pembelian = '$_GET[id]'");
		  while ($pecah = $ambil->fetch_assoc()) {
		   ?>

		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah['nama']; ?></td>
			<td> Rp. <?php echo number_format($pecah['harga']); ?></td>
			<td> <?php echo $pecah['berat']; ?>(Gr)</td>
			<td><?php echo $pecah['jumlah']; ?></td>
			<td> Rp. <?php echo number_format($pecah['subharga']); ?></td>
			<td> Rp. <?php echo $pecah['subberat']; ?>(Gr)</td>
		</tr>
		<?php $nomor++; ?>
	<?php } ?>
	</tbody>
</table>
<div class="row">
	<div class="col-md-6 alert-success">
		<p>Please make payment Rp. <?php echo number_format($detail['total_pembelian']); ?> to <br>
		<strong>BANK BCA 622-30092817 A.N WAFI ARIFIN</strong>
		</p>
	</div>
</div>
		</div>
		
	</section>
</body>
</html>