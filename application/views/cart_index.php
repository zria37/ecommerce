<!DOCTYPE html>
<html>
<head>
	<title>Keranjang Belanja</title>
</head>
<body>

	<h1>Keranjang Belanja</h1>
	
	<?php if (!empty($keranjang)) { ?>
	
		<table>
			<thead>
				<tr>
					<th>Nama Produk</th>
					<th>Harga</th>
					<th>Jumlah</th>
					<th>Subtotal</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($keranjang as $k) { ?>
				<tr>
					<td><?php echo $k['nama_produk']; ?></td>
					<td><?php echo 'Rp '.number_format($k['harga'], 0, ',', '.'); ?></td>
					<td><?php echo $k['jumlah']; ?></td>
					<td><?php echo 'Rp '.number_format($k['subtotal'], 0, ',', '.'); ?></td>
					<td>
						<form action="<?php echo site_url('cart/update'); ?>" method="post">
							<input type="hidden" name="rowid" value="<?php echo $k['rowid']; ?>">
							<input type="number" name="jumlah" value="<?php echo $k['jumlah']; ?>" min="1">
							<input type="submit" value="Ubah">
						</form>
						<form action="<?php echo site_url('cart/remove'); ?>" method="post">
							<input type="hidden" name="rowid" value="<?php echo $k['rowid']; ?>">
							<input type="submit" value="Hapus">
						</form>
					</td>
				</tr>
				<?php } ?>
				<tr>
					<td colspan="3"><strong>Total Belanja:</strong></td>
					<td colspan="2"><strong><?php echo 'Rp '.number_format($total_belanja, 0, ',', '.'); ?></strong></td>
				</tr>
			</tbody>
		</table>
		
		<a href="<?php echo site_url('cart/checkout'); ?>">Checkout</a>
	
	<?php } else { ?>
	
		<p>Keranjang belanja Anda kosong.</p>
	
	<?php } ?>

</body>
</html>
