<h2 class="text-center">Ubah Produk</h2>
<?php
$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk = '$_GET[id]'");
$pecah = $ambil->fetch_assoc();

?>

<pre><?php print_r($pecah); ?></pre>
<form method="POST" enctype="multipart/form-data">
	<div class="form-group">
		<label> Nama Produk </label>
		<input type="text" name="nama" class="form-control" value="<?php echo $pecah['nama_produk'] ?>">
	</div>
	<div class="form-group">
		<label> Harga (Rp) </label>
		<input type="number" name="harga" class="form-control" value="<?php echo $pecah['harga_produk'] ?>">
	</div>
	<div class="form-group">
		<label> Berat (Gr) </label>
		<input type="number" name="berat" class="form-control" value="<?php echo $pecah['berat_produk'] ?>">
	</div>
	<div class="form-group">
		<img src="../foto_produk/<?php echo $pecah['foto_produk']?>" width="150" heigth="100";>
	</div>
	<div class="form-group">
		<label> Ganti Foto Produk </label>
		<input type="file" name="foto" class="form-control">
	</div>
	<div class="form-group">
		<label>Ganti Merek Produk</label>
		<input type="text" name="merek" class="form-control" value="<?php echo $pecah['merek'] ?>">
	</div>
	<div class="form-group">
		<label> Deskripsi Produk </label>
		<p><textarea name="deskripsi" class="form-control" rows="5"><?php echo $pecah['deskripsi_produk'];?></textarea></p>
	</div>
	<div class="form-group">
		<label for="Stok"> Stok </label>
		<input type="number" class="form-control" name="stok">
	</div>

	<button class="btn btn-primary" name="ubah"> Ubah </button>
	<a href="index.php?halaman=produk" class="btn btn-warning"> Kembali </a>
</form>

<?php
if(isset($_POST['ubah'])) {
	$nama = $_FILES['foto']['nama'];
	$lokasi = $_FILES['foto']['tmp_name'];

	if(!empty($lokasi)) {
		move_uploaded_file($lokasi,"../foto_produk/$nama");

		$koneksi->query("UPDATE produk SET nama_produk = '$_POST[nama]' , harga_produk = '$_POST[harga]', berat_produk = '$_POST[berat]', foto_produk = '$nama' , merek = '$_POST[merek]', deskripsi_produk = '$_POST[deskripsi]', stok_produk = '$_POST[stok]' WHERE id_produk = '$_GET[id]'");
	}else{
		$koneksi->query("UPDATE produk SET nama_produk = '$_POST[nama]' , harga_produk = '$_POST[harga]', berat_produk = '$_POST[berat]', merek = '$_POST[merek]', deskripsi_produk = '$_POST[deskripsi]', stok_produk = '$_POST[stok]' WHERE id_produk = '$_GET[id]'");
	}

	echo "<script>alert('Data Berhasil Diubah');</script>";
	echo "<script>location='index.php?halaman=produk';</script>";

}


?>