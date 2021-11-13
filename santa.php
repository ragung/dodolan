<?php
include 'koneksi.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Hoodie</title>
    <link rel="stylesheet" href="style.css"></link>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
</head>
<body>
	<?php
		include 'menu.php';
	?>
	<section class="konten">
    <div class="container">
      <h1>Hodie</h1>
      <div class="row">
        <?php  
        $ambil = $koneksi->query("SELECT * FROM produk WHERE merek = 'Hoodie'"); ?>
        <?php while ($perproduk = $ambil->fetch_assoc()) { ?>
        <div class="col-md-4">
          <div class="thumbnail">
            <img src="foto_produk/<?php echo $perproduk['foto_produk'];?>" alt="" style="width: 50%">
            <div class="caption text-center">
              <h3><?php echo $perproduk['nama_produk']; ?></h3>
              <h5>Rp. <?php echo number_format($perproduk ['harga_produk']); ?></h5>
              <a href="detail.php?id=<?php echo $perproduk['id_produk']; ?>" class="btn btn-primary">Detail Product</a>
              <a href="beli.php?id=<?php echo $perproduk['id_produk']; ?>" class="btn btn-success">Buy Now</a>
            </div>
          </div>
        </div>
      <?php } ?>
      </div>
    </div>
  </section>
</body>
</html>