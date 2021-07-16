<!DOCTYPE html>
<html>
<head>
	<title>Tambah Barang</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bootstrap/Bootstrap.min.css'); ?>">
</head>
<body>
	<div class="container">
		<?php echo form_open_multipart('C_Barang/aksi_tambah'); ?>
			<center> <h1> Form Tambah Barang </h1> </center>
			<div class="form-group mt-10">
				<label> Nama Barang : </label>
				<input class="form-control" type="text" name="nama_barang">				
			</div>
			<div class="form-group mt-3">
				<label> Jenis Barang </label>
				<input type="text" name="jenis_barang" class="form-control">
			</div>				
			<div class="form-group mt-3">
					<label> Kategori Barang : </label>
					<select class="form-control" name="id_kategori">
					<?php foreach ($kategori as $data): ?>
						<option value="<?php echo $data['id_kategori']; ?>"> <?php echo $data['nama_kategori']; ?> </option> 
					<?php endforeach; ?>		
					</select>
			</div>
		
			<div class="form-group mt-3">
				<label> Jumlah Stock </label>
				<input type="number" name="stock" class="form-control">
			</div>
			<div class="form-group mt-3">
				<label> Harga </label>
				<input type="number" name="harga" class="form-control">
			</div>
			<div class="form-group mt-3">
				<label> Gambar Barang </label>
				<input type="file" class="form-control" name="file" required>
			</div>				

			<div class="form-group mt-3">
				<a href="<?= base_url('C_Barang') ?>" class="btn btn-danger" > Kembali</a>
				<button type="submit" value="Kirim" class=" btn btn-primary">Kirim </button>
			</div>



		<?php echo form_close() ?>	

	</div>
</body>
</html>>



