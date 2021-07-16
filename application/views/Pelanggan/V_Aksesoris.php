      <div class="container d-flex justify-content-center mt-4">        
      <div class="row text-center">
         <a href="<?= base_url('C_Pelanggan/tampilAksesoris'); ?>" class="btn btn-lg btn-dark text-white mr-4"> Tampil Semua </a>
        <?php foreach($jenis as $jenis){ ?>

          <a href="<?= base_url('C_Pelanggan/sortAksesoris/'.$jenis['jenis_barang']) ?>" class="btn btn-lg btn-dark text-white mr-4"> <?= $jenis['jenis_barang'] ?></a>

        <?php } ?>
      </div>
    </div>
       <div class="container d-flex justify-content-center ">

         <div class="row text-center">
         <?php  $i = 0; foreach($aksesoris as $data){ ?>

            <div class="col-sm-4 mt-5" >
              <div class="card shadow" style="width: 19rem; height: 400px;">
                  <img class="card-img-top" src="<?php echo base_url('upload/barang/'. $data['gambar'].''); ?>" alt="Card image cap" height="200">
                    <div class="card-body">
                     <p class="card-text text-dark"><?php echo $data['nama_barang']; ?></p>
                      <font size="5" color="Red">RP.<?php echo $data['harga']; ?></font><br>
                      <hr class="my-1" color="#fff">
                      <div class="btn-group" role="group" aria-label="Basic example">
                        
                        <form method="post" action="<?php echo base_url('C_Pelanggan/tambahKeranjang'); ?>">
                          <input type="hidden" name="id_barang" value="<?php echo $data['id_barang']; ?>">
                          <input type="hidden" name="harga_barang" value="<?php echo $data['harga']; ?>">

                         <button type="submit" class="btn btn-outline-secondary"><image src="<?php echo base_url('assets/image/add.png'); ?>" width=30 height=30></image></button>
                        </form>


                        <button type="button"  class="btn btn-outline-secondary"><image src="<?php echo base_url('assets/image/buy.png'); ?>" width=30 height=30></image></button>
                      </div>                    
                  </div>                
            </div>
          </div>

         <?php } ?>
      </div>
    </div>


      <br>
     
          <div class="kontak mt-5">
            <hr class="my-1">
            <section id="contact" class="dark-bg"><
             <div class="container">
              <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="section-title">
                        <h2>Alamat :</h2>
                        <p>Jl. Jendral Sudirman Basis Kel. Baros Kec. Cimahi Tengah <br>Kota Cimahi</p>

                    </div>
                  </div>
              </div>
            </div>
          </section>
        </div>
 

      <script type="text/javascript" src="<?php echo base_url('assets/js/jquery-3.6.0.min.js'); ?>"></script>
      <script type="text/javascript" src="<?php echo base_url('assets/js/sidenav.js'); ?>"></script>></script>

     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script  src="<?= base_url ();?>assets/js/sweetalert2.all.min.js"></script> 


      <script type="text/javascript" src="<?php echo base_url('assets/js/keranjang.js'); ?>"></script></script>

</body>




</html>