<h2>Data Pembayaran</h2>

<?php
$id_pembelian = $_GET['id'];

$ambil = $koneksi->query("SELECT * FROM pembayaran WHERE id_pembelian ='$id_pembelian'");
$detail = $ambil->fetch_assoc();

?>

<div class="row">
	<div class="col-md-6">
		<table class="table">
			<tr>
				<td><strong>Nama </strong></td>
				<td> <?php echo $detail['nama'] ?></td>
			</tr>
			<tr>
				<td><strong>Bank </strong></td>
				<td> <?php echo $detail['bank'] ?></td>
			</tr>
			<tr>
				<td><strong>Jumlah </strong></td>
				<td> <?php echo $detail['jumlah'] ?></td>
			</tr>
			<tr>
				<td><strong>Tanggal </strong></td>
				<td> <?php echo $detail['tanggal'] ?></td>
			</tr>
		</table>		
	</div>
	<div class="col-md-6">
		<img src="../foto_produk/<?php echo $detail['bukti'] ?>" class="img-responsive">
	</div>
</div>

<form method="POST">
	<div class="form-group">
		<label>No. Resi Pengiriman</label>
		<input type="text" name="resi" class="form-control">
	</div>
	<div class="form-group">
		<label>Status</label>
		<select name="Status" class="form-control">
			<option value="">Pilih Status</option>
			<option value="Lunas">Lunas</option>
			<option value="Barang Dikirim">Barang Dikirim</option>
			<option value="Batal">Batal</option>
		</select>
	</div>
	<button class="btn btn-primary" name="proses">Proses</button>
</form>

<?php
if (isset($_POST["proses"])) {


	$resi = $_POST["resi"];
	$status = $_POST["Status"];

	$koneksi->query("UPDATE pembelian SET resi_pembelian ='$resi', status_pembelian ='$status' WHERE id_pembelian='$id_pembelian'");


	echo "<script>alert('Data pembelian terupdate');</script>";
	echo "<script>location='index.php?halaman=pembelian';</script>";
	}
?>