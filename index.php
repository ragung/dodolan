<?php
include 'koneksi.php';
?>

<html>
    <head>
      <meta charset="utf-8">
    <title>Dodolan| Home</title>
    <link rel="stylesheet" href="style.css"></link>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
</head>
<body>
<?php
include 'menu.php';
?>

<div class="slideshow-container">

<div class="mySlides fade">
  <div class="numbertext">1 / 4</div>
  <img src="img/1.jpg" style="width:100%">
</div>

<div class="mySlides fade">
  <div class="numbertext">2 / 4</div>
  <img src="img/2.jpg" style="width:100%">
</div>

<div class="mySlides fade">
  <div class="numbertext">3 / 4</div>
  <img src="img/3.jpg" style="width:100%">
</div>

<div class="mySlides fade">
  <div class="numbertext">4 / 4</div>
  <img src="img/4.jpg" style="width:100%">
</div>

<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
<a class="next" onclick="plusSlides(1)">&#10095;</a>

</div>
<br>

<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span> 
  <span class="dot" onclick="currentSlide(2)"></span> 
  <span class="dot" onclick="currentSlide(3)"></span>
<span class="dot" onclick="currentSlide(4)"></span>
</div>


<section class="konten">
    <div class="container">
      <h1>All Product</h1>
      <div class="row">
        <?php $ambil = $koneksi->query("SELECT * FROM produk"); ?>
        <?php while ($perproduk = $ambil->fetch_assoc()) { ?>
        <div class="col-md-4">
          <div class="thumbnail">
            <img src="foto_produk/<?php echo $perproduk['foto_produk'];?>" class="img-responsive" alt="Responsive image" style="width:50%">
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


<script>
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}
</script>
</body>
</html>