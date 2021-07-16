<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
	<title>Menu Utama</title>
    <link rel="stylesheet" type="text/css" href="css/Bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
        .box{
                background: #fff;
                height: 100px;
                margin-top: 20px;
                margin-left: 35px;
                margin-right: 35px;
                padding: 25px;
                width: 1290px;
                height: 500px;
        }
         h3{
      margin-left: 500px;
    }
    form{

                border: solid 1px;
                border-color: #3498DB;
                margin-top: 15px;
                margin-left: 0px;
                margin-right: 58px;
                padding: 15px;
                width: 800px;
                height: 420px;

        }
        .konten{
          margin-left: 205px;
        }

    </style>
</head>
<body>
    
    <!--DropDown Menu-->
    <div id="sideNavigation" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="#"><img src="home.png" width="30" height="30">Utama</a>
        <hr class="my-1" color="#fff">
        <a href="#"><img src="kasir.png" width="30" height="30"><h5>Kelola Data Kasir</h5></a>
        <hr class="my-1" color="#fff">
        <a href="#"><img src="barang.png" width="30" height="30"><h5>Kelola Data Barang</h5></a>
        <hr class="my-1" color="#fff">
        <a href="#"><img src="pelanggan.png" width="30" height="30"><h6>Kelola Data Pelanggan</h6></a>
        <hr class="my-1" color="#fff">
        <p><p><p><br><br>

        <br><br><br><br><a href="#"><a href="#"><img src="image/logout.png" width="30" height="30">Keluar</a>
      </div>
       
 <!--Navbar 1-->
           <nav class="topnav">       
        <a href="#" onclick="openNav()">         
          <svg width="30" height="30" id="icoOpen">
              <path d="M0,5 30,5" stroke="#000" stroke-width="5"/>
              <path d="M0,14 30,14" stroke="#000" stroke-width="5"/>
              <path d="M0,23 30,23" stroke="#000" stroke-width="5"/>
          </svg>
          
        </a>
      </nav>

       <!--Navbar 2-->
    <nav class="navbar navbar-light bg-light justify-content-between">
    <h3> Menu Admin | Tambah Kelola Barang</h3>
      </nav>
     
     

       
      <div class="box">

        <div class="konten">
          <form>

            <div class="container">
              <div class="row">
                <div class="col-sm">
     
                 <label>ID Barang</label><input class="form-control" type="text" aria-label="default input example" disabled><br>
                <label>Nama Barang</label><input class="form-control" type="text" aria-label="default input example"><br>
                <label>ID Kategori</label><input class="form-control" type="text" aria-label="default input example"  disabled><br>
                <label>Jenis Kategori</label><input class="form-control" type="text" aria-label="default input example"><br>
              </div>

            <div class="col-sm">
              <label>Stok</label><input class="form-control" type="text" aria-label="default input example"><br>
              <label>Harga</label><input class="form-control" type="text" aria-label="default input example"><br>
              <div class="mb-3">
                 <label for="formFile" class="form-label">Gambar</label>
                  <input class="form-control" type="file" id="formFile">
             </div>
                <button type="button" class="btn btn-primary"><img src="add.png">Tambah</button>
             </div>
           </div>
       </div>
      </form>

    </div>
  </div>




    <!-- KONTAK --> 
    <br><br>
      <div class="kontak">
      <hr class="my-1">
        <section id="contact" class="dark-bg">
            <div class="container">
              <div class="row">
                 <div class="col-lg-12 text-center">
                    <div class="section-title">
                     <h2>Alamat :</h2>
                     <p>Jl Jendral Audirman Basis kel Baros kec.Cimahi Tengah <br>Kota Cimahi</p>
  
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