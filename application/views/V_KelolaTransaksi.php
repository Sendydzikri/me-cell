<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
	<title>Kelola Transaksi</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bootstrap/Bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">

</head>
<body>
    
    <div id="sideNavigation" class="sidenav">
      
  
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
       

        <br><br><br><br><a href="#"><img src="<?php echo base_url('assets/image/logout.png'); ?>" width="30" height="30">Keluar</a>

        
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
        <button type="button" class="btn btn-outline-light"><img src="<?php echo base_url('assets/image/add.png'); ?>" width=30 height=30></image></button>
        <button type="button" class="btn btn-outline-light"><img src="<?php echo base_url('assets/image/chat.png'); ?>" width=30 height=30></image></button>
    </div>
       
     <!--    <form class="form-inline">
          <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-0 my-sm-0" type="submit">Search</button>
        </form> -->
    </div>
      </nav>
     
     
   <!-- Datatables -->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Kelola Transaksi</h6>
                </div>
                <div class="search">
                <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>

                <div class="table-responsive p-3">
                
                  <table class="table align-items-center table-flush" id="dataTable">
                    <thead>
                      <tr>
                        <th>NO</th>
                        <th>ID Transaksi</th>
                        <th>ID Pelanggan</th>
                        <th>ID Barang</th>
                        <th>Jumlah Barang</th>
                        <th>Total Harga</th>
                        <th>Tanggal Transaksi</th>
                        <th>status</th>

                      <tr>
                    </thead> 
                    <tbody>
                        <?php $no = 1;
                       foreach($row->result() as $key => $data) {?>
                          <tr>
                              <td><?php echo $no++?></td>
                              <td><?php echo $data -> id_transaksi ?></td>
                              <td><?php echo $data -> id_pelanggan ?></td>
                              <td><?php echo $data -> id_barang ?></td>
                              <td><?php echo $data -> jumlah_barang ?></td>
                              <td><?php echo $data -> total_harga ?></td>
                              <td><?php echo $data -> tanggal_transaksi ?></td>
                              <td><?php echo $data -> status ?></td>
                              

                              <td>
                                <!-- Button-->
                              
              </div>
                              </div>

                              </td>
                          </tr>
                          
                        <?php } ?>
                    </tbody>
                  </table> 
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