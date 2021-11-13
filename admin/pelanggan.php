<h2 class="text-center"> Data Pelanggan</h2>
<table class="table table-bordered text-center">
	<thead>
		<tr>
			<th> No. </th>
			<th> Nama Pelanggan </th>
			<th> Telepon Pelanggan </th>
			<th> Aksi </th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1; ?>
		<?php $ambil = $koneksi->query("SELECT * FROM pelanggan"); ?>
		<?php while ($pecah = $ambil->fetch_assoc()) { ?>
	<tr>
		<td><?php echo $nomor; ?></td>
		<td><?php echo $pecah['nama_pelanggan']; ?></td>
		<td><?php echo $pecah['telpon_pelanggan'] ?></td>
		<td>
			<a href="" class="btn btn-danger"> Hapus </a>
		</td>
	</tr>
	<?php $nomor++; ?>
<?php } ?>
	</tbody>
</table>