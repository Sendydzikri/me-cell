    <center>
            <h1 class="display-6">SELAMAT DATANG DI ME-CELL STORE</h1> 
            <hr class="my-1">
            Silahkan berbelanja apapun kebutuhan ada anda disini!
     </center>

      <div class="container d-flex justify-content-center">

         <div class="row text-center">
         <?php  $i = 0; foreach($barang as $data){ ?>

            <div class="col-sm-4 mt-5" >
              <div class="card shadow" style="width: 19rem; height: 400px;">
                  <img class="card-img-top" src="<?php echo base_url('upload/barang/'. $data['gambar'].''); ?>" alt="Card image cap" height="200">
                    <div class="card-body">
                     <p class="card-text text-dark"><?php echo $data['nama_barang']; ?></p>
                      <font size="5" color="Red">RP.<?php echo $data['harga']; ?></font><br>
                      <hr class="my-1" color="#fff"> <br>
                      <div class="btn-group" role="group" aria-label="Basic example">
                        
                        <form method="post" action="<?= base_url('C_Pelanggan/tambahKeranjang') ?> ">
                          <input type="hidden" name="id_barang" value="<?php echo $data['id_barang']; ?>">
                          <input type="hidden" name="harga_barang" value="<?php echo $data['harga']; ?>">

                         <button type="submit" class="btn btn-secondary"><image src="<?php echo base_url('assets/image/add.png'); ?>" width=30 height=30></image></button>
                        </form>


                      </div>                    
                  </div>                
            </div>
          </div>

         <?php } ?>
      </div>
    </div>




    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('status');?>"></div>
    <div class="login" data-flashdata="<?= $this->session->flashdata('logged');?>"></div>


     
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
 

      
      <script type="text/javascript" src="<?php echo base_url('assets/js/sidenav.js'); ?>"></script>></script>


      <script  src="<?= base_url ();?>assets/js/sweetalert2.all.min.js"></script> 


      <script type="text/javascript" src="<?php echo base_url('assets/js/keranjang.js'); ?>"></script></script>

</body>




</html>