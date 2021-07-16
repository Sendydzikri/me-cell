<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bootstrap/Bootstrap.min.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">
	

	<style>

	h1{
		font-size: 30pt;
		color:#ffffff;
		text-align: center;
	}
	h2{
		margin-left: 380px;
		color: #ffffffff;
	}

	</style>
	
</head>

<body bgcolor="cyan">

<nav class="navbar navbar-dark bg-dark">
  <div class="container-fluid">
     
    	<center> <h2>Selamat Datang Di Website Me-Cell Store</h2> </center>
 
</nav>


<div class="konten">
		<div class="kepala">
			<div class="lock"></div>
			<h3 class="judul">DAFTAR BARU</h3>
		</div>
		

	<div class="font">
		<form action="<?= base_url('C_Register/daftarPelanggan') ?>" method="post">
			<div class="grup">
				<label for="username">Nama</label>
				<input type="text" <?php if(isset($nama)){ echo "value='" . $nama . "'"; } ?> name="Nama_Pelanggan" placeholder="Masukan Nama">
			</div>

		<div class="grup">
			<label for="password">Alamat</label>
			<input type="text" <?php if(isset($alamat)){ echo "value='" . $alamat . "'"; } ?> name= "Alamat_Pelanggan" placeholder="Masukan alamat">
		</div>

		<div class="grup">
            <label for="email">No. HP</label>
            <input type="text" <?php if(isset($nohp)){ echo "value='" . $nohp . "'"; } ?> name="NoHp_Pelanggan" placeholder="Masukan No. HP">
			<?php if($this->session->flashdata('nohp')){ ?>

			 <div class="alert alert-danger" role="alert">
			 	<?= $this->session->flashdata('nohp');?>
			</div>

            <?php } ?>

        </div>

		<div class="grup">
            <label for="email">Email</label>
            <input type="text" <?php if(isset($email)){ echo "value='" . $email . "'"; } ?> name="Email" placeholder="Masukan Email">
			<?php if($this->session->flashdata('email')){ ?>

			 <div class="alert alert-danger" role="alert">
			 	<?= $this->session->flashdata('email');?>
			</div>

            <?php } ?>

        </div>


        <div class="grup">
            <label for="email">Username</label>
            <input type="text" <?php if(isset($username)){ echo "value='" . $nama . "'"; } ?> name="Username" placeholder="Masukan Username">
            <?php if($this->session->flashdata('username')){ ?>

			 <div class="alert alert-danger" role="alert">
			 	<?= $this->session->flashdata('username');?>
			</div>

            <?php } ?>
        </div>

    <div class="grup">
        <label for="nohp">Password</label>
        <input type="password" name="Password" placeholder="Masukan Password">
    </div>
    <div class="grup">
        <label for="pass">Password</label>
        <input type="password" name="Password2" placeholder="Masukan ulang Password">
            <?php if($this->session->flashdata('password')){ ?>

			 <div class="alert alert-danger" role="alert">
			 	<?= $this->session->flashdata('password');?>
			</div>

            <?php } ?>    
    </div>    

	<div class="grup">
	<input type="submit" class="btn btn-success" value="Daftar">
	</div>
	<center>
		<a href="<?= base_url('C_Login');?>" class="btn btn-primary">Kembali</a>
	</center>	
	</form>
	</div>
	</div>



</script>
</body>
</html>