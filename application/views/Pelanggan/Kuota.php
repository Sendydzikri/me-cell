    <center>
            <h1 class="display-6">SELAMAT DATANG DI ME-CELL STORE</h1> 
            <hr class="my-1">
            Silahkan berbelanja apapun kebutuhan ada anda disini!
    </center>
     
    
    <p><p>
     </nav>
     <?php $i = 1; foreach($kuota as $data){?>
     <?php if($i==1){$i++ ?>
     <div class="container">
            <div class="row">
                <div class="col-sm">
                    <div class="dropdown">
                        <button class="mainmenubtn">
                            <img src="<?php echo base_url('upload/kuotana/'.$data['gambar']); ?>" width="25" height="25">
                            <?= $data['nama_provider'] ?>
                        </button>
                        <div class="dropdown-child">
                        <?php foreach($detail_kuota as $dk){ ?>
                            <?php if($dk['id_kuota'] == $data['id_kuota']){?>
                            <a ><?= $dk['jumlah_kuota'] ."GB |". $dk['masa_aktif'] ."Hari | ". "RP " . $dk['harga_kuota'] ?>
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalCenter<?=$dk['id_detailkuota'] ?>">
                             Beli
                            </button>
                            </a>
                            <?php }}?>
                        </div>
                    </div>
                </div>
        <?php }else if($i==2){$i++ ?>

                <div class="col-sm">
                    <div class="dropdown">
                        <button class="mainmenubtn">
                        <img src="<?php echo base_url('upload/kuotana/'.$data['gambar']); ?>" width="25" height="25">
                            <?= $data['nama_provider'] ?>
                        </button>
                        <div class="dropdown-child">
                            <?php foreach($detail_kuota as $dk){ ?>
                            <?php if($dk['id_kuota'] == $data['id_kuota']){?>
                            <a ><?= $dk['jumlah_kuota'] ."GB |". $dk['masa_aktif'] ."Hari | ". "RP " . $dk['harga_kuota'] ?>
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalCenter<?=$dk['id_detailkuota'] ?>">
                             Beli
                            </button>
                            </a>
                            <?php }}?>
                        </div>
                    </div>
                </div>
            <?php }else if($i==3){$i=1; ?>

                <div class="col-sm">
                    <div class="dropdown">
                        <button class="mainmenubtn">
                        <img src="<?php echo base_url('upload/kuotana/'.$data['gambar']); ?>" width="25" height="25">
                            <?= $data['nama_provider'] ?>
                        </button>
                        <div class="dropdown-child">
                        <?php foreach($detail_kuota as $dk){ ?>
                            <?php if($dk['id_kuota'] == $data['id_kuota']){?>
                            <a ><?= $dk['jumlah_kuota'] ."GB |". $dk['masa_aktif'] ."Hari | ". "RP " . $dk['harga_kuota'] ?>
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalCenter<?=$dk['id_detailkuota'] ?>">
                             Beli
                            </button>
                            </a>
                            <?php }}?>
                        </div>
                    </div>
                </div>

        <?php }}?>

        </div>
        </div> 
        

        <!-- Button trigger modal -->


<!-- Modal -->
<?php foreach($detail_kuota as $dkm){ ?>
<div class="modal fade" id="exampleModalCenter<?= $dkm['id_detailkuota'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Masukan Nomor HP Anda</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          
          <form action="<?= base_url('C_Pelanggan/insertTransaksiKuota') ?>" method="POST"> 
            <div class="form-group">
                <label>Kuota Yang Anda Beli : <span class="text-uppercase"> <?= $dkm['jumlah_kuota'] ."GB |". $dkm['masa_aktif'] ."Hari | ". "RP " . $dkm['harga_kuota'] ?> </span></label>
                <input type="hidden" name="id_detail_kuota" value="<?= $dkm['id_detailkuota']?>">
                <input type="number" name="no_hp" class="form-control" placeholder="masukan nomor hp anda" required> <br>
                <label for="exampleInputEmail1">Metode Pembayaran</label> 
                <select name="metode_bayar" class="form-control" id="">
                    <option value="COD">COD</option>
                    <option value="Transfer">Transfer</option>
                </select>
                <input type="submit" class="btn btn-success mt-2" value="Beli">
            
            </div>

          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<?php }?>
<div class="konten1">

</div> 
      <!-- KONTAK --> 
      <div class="kontak">
      <hr class="my-1">
<section id="contact" class="dark-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="section-title">
                  <h2>Alamat :</h2>
                  <p>Jl Jendral Sudirman Basis kel Baros kec.Cimahi Tengah <br>Kota Cimahi</p>
  
</div>


</body>
 

<style>
    .konten1 {
  padding: 300px;
}
.mainmenubtn {
  background-color: #34495E;
  color: white;
  border: none ;
  cursor: pointer;
  padding:20px;
  margin-top:20px;
  width: 270px;
}
.mainmenubtn:hover {
  background-color: #2980B9;
  }
.dropdown {
  position: relative;
  display: inline-block;
  margin-left: 50px;
  
}
.dropdown2 {
  position: relative;
  display: inline-block;
  margin-left: 100px;
  
}
.dropdown-child {
  display: none;
  background-color: #ECF0F1;
  min-width: 200px;
  
}
.dropdown-child a {
  color: blue;
  padding: 20px;
  text-decoration: none;
  display: block;
  
}
.dropdown:hover .dropdown-child {
  display: block;
}

</style>

      
      
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

<div class="transaksiKuota" data-flashdata="<?= $this->session->flashdata('transaksi');?>"></div>
