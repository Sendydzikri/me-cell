<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
	<title>Menu Utama</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/fonts/font-awesome.min.css'); ?>">
      <script type="text/javascript" src="<?php echo base_url('assets/js/jquery-3.6.0.min.js'); ?>"></script>
      <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>   
	<link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/scroll.css'); ?>">
</head>
<body class="bg-light">

    <div id="sideNavigation" class="sidenav">
      
      
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="<?php echo base_url('index.php/C_Pelanggan') ?>"><img src="<?php echo base_url('assets/image/home.png'); ?>" class="gk" width="30" height="30">Utama</a>
        <a href="<?php echo base_url('index.php/C_Pelanggan/tampilPerdana') ?>"><img src="<?php echo base_url('assets/image/cards.png'); ?>" class="gk" width="30" height="30">Kartu Perdana</a>
        <a href="<?php echo base_url('index.php/C_Pelanggan/tampilProviderKuota') ?>"><img src="<?php echo base_url('assets/image/kuota.png'); ?>" class="gk" width="30" height="30">Kuota</a>
        <a href="<?= base_url('C_Pelanggan/tampilAksesoris'); ?>"><img src="<?php echo base_url('assets/image/aksesoris.png'); ?>" class="gk" width="30" height="30">Aksesoris</a>
        <a href="<?= base_url('C_Pelanggan/tampilPulsa'); ?>"><img src="<?php echo base_url('assets/image/pulsa.png'); ?>" class="gk" width="30" height="30">Pulsa</a>
        <a href="<?= base_url('C_Pelanggan/tampilRiwayat'); ?>"><img src="<?php echo base_url('assets/image/pulsa.png'); ?>" class="gk" width="30" height="30">Riwayat Pembelian</a>
        <a href="<?= base_url ('C_Login/logout')?>" style="margin-top: 70%;"><img src="<?php echo base_url('assets/image/logout.png'); ?>" class="gk" width="30" height="30">Keluar</a>

        
      </div>
       
        <nav class="topnav navbar navbar-expand-lg">
         <div class="collapse navbar-collapse" id="navbarSupportedContent">
           <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a href="#" onclick="openNav()">         
                <svg width="30" height="30" id="icoOpen">
                    <path d="M0,5 30,5" stroke="#fff" stroke-width="5"/>
                    <path d="M0,14 30,14" stroke="#fff" stroke-width="5"/>
                    <path d="M0,23 30,23" stroke="#fff" stroke-width="5"/>
                </svg>      
              </a>
           </li>
           <li>
       
           </li>
          </ul>
            <form class="form-inline">
              <button type="button" style="color:white; background-color: black;" data-toggle="modal" data-target="#chat" > <i class="fa fa-comment fa-2x"></i> </button>
              <a href="<?= base_url('C_Pelanggan/keranjang/'. $this->session->userdata('id_pelanggan')); ?>" ><img class="mr-2" src="<?php echo base_url('assets/image/add.png'); ?>"  width="30" height="30"></a>
            </form>           
          </div>
      </nav>

      <div class="modal fade" id="chat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel"><span class="fa fa-comments"> </span> Chat Dengan Kasir</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <?php echo form_open_multipart('C_Pelanggan/insertChat'); ?>   
            <div class="modal-body">
              <div id="scroll">
                  <?php 

                    $id_pelanggan = $this->session->userdata('id_pelanggan');
                    foreach($chat as $c){
                    if($c['tgl_chat'] == date('Y-m-d')){
                      $hari = "Hari ini";
                    }else{
                      $hari = $c['tgl_chat'];
                    }
                  ?>
                  <?php if($c['send_from'] != $id_pelanggan ){ ?>

                  <div class="container">
                      <b>Kasir : </b> <br><?= $c['isi'] ?><br>
                      <br> <p class="text-secondary">terkirim :  <?= $hari ?> </p> 
                      <hr> 
                  </div>

                  <?php }else{ ?>
                  <div class="container">
                    <b>Anda : </b> <br> <?= $c['isi'] ?>
                    <?php if($c['lampiran'] != null){ ?>
                    <div class="container">
                        <img src="<?php echo base_url('upload/chat/folder-'.$id_pelanggan."/". $c['lampiran'].''); ?>" alt="Card image cap" width="200" height="300">  
                    </div>
                    <?php } ?> <br><br>
                    <p class="text-secondary">terkirim : <?= $hari ?> </p> 
                    <hr>
                  </div>
                  <?php } }?>
                  <br>        
            </div>
            <div class="form-group"> 
                    <textarea class="form-control" name="isi" placeholder="Ketikan Chat Anda Disini...."></textarea>
                    <br>  
                    <input type="file" name="file" class="form-control">

            </div>              
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary" >Kirim</button>
            </div>         
          </div>
          <?php echo form_close() ?>
        </div>


      </div>
        <div class="kurang" data-flashdata="<?= $this->session->flashdata('kurang');?>"></div>
        <div class="checkoutBerhasil" data-flashdata="<?= $this->session->flashdata('checkoutBerhasil');?>"></div>  
      </div>