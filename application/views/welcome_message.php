<!DOCTYPE html>
<html>
<head>
	<title>Katalog Produk</title>
	<style>
		.product-grid {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 20px;
}

.product-card {
  border: 1px solid #ccc;
  padding: 20px;
  text-align: center;
}

.product-card img {
  max-width: 100%;
  height: auto;
  margin-bottom: 10px;
}

	</style>
</head>
<body>

	<h1>Katalog Produk</h1>
	
	<form action="<?php echo site_url('welcome/index'); ?>" method="get">
		<label>Cari Produk:</label>
		<input type="text" name="keyword">
		<input type="submit" value="Cari">
	</form>
	
	<br>
	
	<div class="product-grid">
		<?php foreach ($produk as $p) { ?>
			<div class="product-card">
			<a href="<?php echo site_url('welcome/detail/'.$p->produk_id); ?>">
				<img src="<?php echo base_url('assets/img/'.$p->gambar_produk); ?>" alt="<?php echo $p->nama_produk; ?>">
			</a>
			<h3><?php echo $p->nama_produk; ?></h3>
			<p><?php echo $p->deskripsi; ?></p>
			<p><?php echo 'Rp '.number_format($p->harga, 0, ',', '.'); ?></p>
			</div>
		<?php } ?>
	</div>


</body>
</html>
