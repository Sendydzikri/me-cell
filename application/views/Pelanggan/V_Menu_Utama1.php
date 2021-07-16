<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
	<title>Menu Utama</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bootstrap/Bootstrap.min.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">
</head>
<body>
    
    <div id="sideNavigation" class="sidenav">
      
      
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="#"><img src="<?php echo base_url('assets/image/home.png'); ?>" width="30" height="30">Utama</a>
        <hr class="my-1" color="#fff">
        <a href="#"> <img src="<?php echo base_url('assets/image/categories.png'); ?>" width="30" height="30">Kategori</a>
        <hr class="my-1" color="#fff">
        <a href="#"><img src="<?php echo base_url('assets/image/cards.png'); ?>" width="30" height="30">Kartu Perdana</a>
        <a href="#"><img src="<?php echo base_url('assets/image/kuota (1).png'); ?>" width="30" height="30">Kartu Kuota</a>
        <a href="aksesoris.html"><img src="<?php echo base_url('assets/image/aksesoris.png'); ?>" width="30" height="30">Aksesoris</a>
        <a href="#"><img src="<?php echo base_url('assets/image/pulsa.png'); ?>" width="30" height="30">Pulsa</a><p><p><p><br><br><br>

        <br><br><br><br><a href="#"><a href="#"><img src="<?php echo base_url('assets/image/logout.png'); ?>" width="30" height="30">Keluar</a>

        
      </div>
       
           <nav class="topnav">
       
        <a href="#" onclick="openNav()">         
          <svg width="30" height="30" id="icoOpen">
              <path d="M0,5 30,5" stroke="#000" stroke-width="5"/>
              <path d="M0,14 30,14" stroke="#000" stroke-width="5"/>
              <path d="M0,23 30,23" stroke="#000" stroke-width="5"/>
          </svg>
          
        </a>
      </nav>
      <nav class="navbar navbar-light bg-light justify-content-between">
        <a class="navbar-brand"></a>
        <div class="button-add">
          <a href="keranjang.html">
        <button type="button" class="btn btn-outline-light"><image src="<?php echo base_url('assets/image/add.png'); ?>" width=30 height=30></image></button>
      </a>
        <button type="button" class="btn btn-outline-light"><image src="<?php echo base_url('assets/image/chat.png'); ?>" width=30 height=30></image></button>
    </div>
       
        <form class="form-inline">
          <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-0 my-sm-0" type="submit">Search</button>
        </form>
    </div>
      </nav>
     
     

       <div class="jumbotron">
        <center><h1 class="display-6">SELAMAT DATANG DI ME-CELL STORE</h1>
       
        <hr class="my-1">
        Silahkan berbelanja apapun kebutuhan ada anda disini!</center>
      </div>

      <div class="container">
      <?php  $i = 0; foreach($barang as $data){ 
        if($i < 1){

          $i = $i + 1;
      ?>
      <div class="card-group mt-3">
        <div class="card text-center" style="margin-right: 5px;">
          <img class="card-img-top" style="width: 22rem;" src="<?php echo base_url('upload/barang/'. $data['gambar'].''); ?>" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title"><?php echo $data['nama_barang'] ?> </h5>
            <p class="card-text text-dark">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            <p class="card-text"><a href="#" class="btn btn-primary"> Detail </a> <a href="#" class="btn btn-success"> Tambah Keranjang </a></p>
          </div>
        </div>
        <?php 

          }else if($i >0 && $i < 3 ){
            $i++;

        ?>
        <div class="card text-center" style="margin-right: 5px;">
          <img class="card-img-top" style="width: 22rem;" src="<?php echo base_url('upload/barang/'. $data['gambar'].''); ?>" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title"><?php echo $data['nama_barang'] ?> </h5>
            <p class="card-text text-dark">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            <p class="card-text"><a href="#" class="btn btn-primary"> Detail </a> <a href="#" class="btn btn-success"> Tambah Keranjang </a></p>
          </div>
        </div>
        <?php

          }else{
            $i = 1;

        ?>

        </div>

        <div class="card-group mt-3 text-center">
          <div class="card" style="margin-right: 5px;">
            <img class="card-img-top" style="width: 22rem;" src="<?php echo base_url('upload/barang/'. $data['gambar'].''); ?>" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title"><?php echo $data['nama_barang'] ?> </h5>
              <p class="card-text text-dark">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
              <p class="card-text"><a href="#" class="btn btn-primary"> Detail </a> <a href="#" class="btn btn-success"> Tambah Keranjang </a></p>
            </div>
          </div>
    <?php } } ?>

  </div>




     
      <!-- KONTAK --> 
          <div class="kontak mt-5">
            <hr class="my-1">
            <section id="contact" class="dark-bg"><
             <div class="container">
              <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="section-title">
                        <h2>Alamat :</h2>
                        <p>Jl Jendral Sudirman Basis kel Baros kec.Cimahi Tengah <br>Kota Cimahi</p>
                    </div>
                  </div>
              </div>
            </div>
          </section>
        </div>
  
  </div>

 
             
      
      
      <script>
        function openNav() {
            document.getElementById("sideNavigation").style.width = "250px";
            document.getElementById("main").style.marginLeft = "250px";
        }
         
        function closeNav() {
            document.getElementById("sideNavigation").style.width = "0";
            document.getElementById("main").style.marginLeft = "0";
        }
        </script>

        

</body>
</html>