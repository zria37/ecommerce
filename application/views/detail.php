<!DOCTYPE html>
<html>
<head>
	<title>Detail Produk</title>
	<style>
		img {
			max-width: 20%;
		}
	</style>
</head>
<body>

	<h1>Detail Produk</h1>
	
	<?php if (!empty($produk)) { ?>
	
		<img src="<?php echo base_url('assets/img/'.$produk->gambar_produk); ?>" alt="<?php echo $produk->nama_produk; ?>">
		<h3><?php echo $produk->nama_produk; ?></h3>
		<p><?php echo $produk->deskripsi; ?></p>
		<p><?php echo 'Rp '.number_format($produk->harga, 0, ',', '.'); ?></p>
		
		<form action="<?php echo site_url('cart/add'); ?>" method="post">
			<input type="hidden" name="produk_id" value="<?php echo $produk->produk_id; ?>">
			<input type="hidden" name="nama_produk" value="<?php echo $produk->nama_produk; ?>">
			<input type="hidden" name="harga" value="<?php echo $produk->harga; ?>">
			<label>Jumlah:</label>
			<input type="number" name="jumlah" value="1" min="1">
			<input type="submit" value="Tambahkan ke Keranjang">
		</form>
	
	<?php } else { ?>
	
		<p>Produk tidak ditemukan.</p>
	
	<?php } ?>

</body>
</html>
