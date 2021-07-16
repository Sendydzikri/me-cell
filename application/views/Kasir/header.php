<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Menu Utama</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/fonts/font-awesome.min.css'); ?>">
      <script type="text/javascript" src="<?php echo base_url('assets/js/jquery-3.6.0.min.js'); ?>"></script>
      
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>   
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/scroll.css'); ?>">
    <style>
    .box {
        background: #fff;
        height: 100px;
        margin-top: 25px;
        margin-left: 35px;
        margin-right: 35px;
        padding: 25px;
        width: 1290px;
        height: 320px;
    }

    .margin {
        Margin: 10px 10px 10px 10px
    }

    h3 {
        margin-left: 500px;
    }

    .kotak {
        margin-left: 160px;
    }

    .kontak {
        margin-top: 143px;
    }
    </style>
</head>

<body class="bg-light">

    <!--DropDown Menu-->
    <div id="sideNavigation" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="<?php echo base_url('index.php/C_Kasir') ?>"><img
                src="<?php echo base_url('assets/image/home.png'); ?>" width="30" height="30">Utama</a>
        <hr class="my-1" color="#fff">

        <a href="<?= base_url('C_Kasir/transaksi'); ?>"><img src="<?php echo base_url('assets/image/add.png'); ?>" width="30" height="30">
            <h5>Kelola Data Transaksi</h5>
        </a>
        <hr class="my-1" color="#fff">
        <a href="<?= base_url('C_Kasir/tampilPulsa'); ?>"><img src="<?php echo base_url('assets/image/add.png'); ?>" width="30" height="30">
            <h5>Kelola Data Pulsa</h5>
        </a>
        <hr class="my-1" color="#fff">
        <a href="<?= base_url('C_Kasir/tampilKuota'); ?>"><img src="<?php echo base_url('assets/image/add.png'); ?>" width="30" height="30">
            <h5>Kelola Data Kuota</h5>
        </a>
        <hr class="my-1" color="#fff">        
        <a href="<?php echo base_url('C_Login/logout') ?>" style="margin-top: 130%;"><img src="<?php echo base_url('assets/image/logout.png'); ?>" width="30"
                height="30">Keluar</a>
        <hr class="my-1" color="#fff">





    </div>

    <!--Navbar 1-->
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
             <a href="<?= base_url('C_Kasir/tampilChat') ?>" class="fa fa-comments fa-lg" ></a>              
            </form>           
          </div>
      </nav>