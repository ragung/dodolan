<h2 class="text-center"> Data Produk</h2>
<table class ="table table-bordered text-center">
	<thead>
		<tr>
			<th> No. </th>
			<th> Nama </th>
			<th> Harga </th>
			<th> Berat </th>
			<th> Foto </th>
			<th> Merek </th>
			<th> Stok Produk </th>
			<th> Aksi </th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor = 1; ?>
		<?php $ambil = $koneksi->query("SELECT * FROM produk"); ?>
		<?php while ($pecah = $ambil->fetch_assoc()) {?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah['nama_produk'] ?></td>
			<td> Rp. <?php echo number_format($pecah['harga_produk']); ?></td>
			<td><?php echo $pecah['berat_produk']?> (Gr) </td>
			<td>
				<img src="../foto_produk/<?php echo $pecah['foto_produk']; ?>" width="150" height="100">
			</td>
			<td> <?php echo $pecah['merek'];?></td>
			<td><?php echo $pecah['stok_produk'] ?></td>
			<td>
				<a href="index.php?halaman=ubah_produk&id=<?php echo $pecah['id_produk'] ?>" 
					class="btn btn-primary"> Ubah </a>
				<a href="index.php?halaman=hapus_produk&id=<?php echo $pecah['id_produk'] ?>" 
					onClick="return confirm('Apakah Anda yakin ingin menghapus data ini? ')"
					class="btn btn-danger"> Hapus </a>
			</td>
		</tr>
		<?php $nomor++; ?>
	<?php } ?>
	</tbody>
</table>

<a href="index.php?halaman=tambah_produk" class="btn btn-primary"> [+] Tambah Produk</a>
