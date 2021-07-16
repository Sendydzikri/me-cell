      <?php if($barang != null){ ?>
      <div class="container d-flex justify-content-center mt-5">

         <div class="row text-center">
          

         <!-- <?php  $i = 0; foreach($barang as $data){ ?> -->

                  <div class="card" style="width: 18rem; height: 28rem;">
                          <img class="card-img-top" src="<?php echo base_url('upload/barang/'. $data['gambar'].''); ?>" alt="Card image cap" height="200">
                          <div class="card-body count">
                            <h5 class="card-title"><?= $data['nama_barang'] ?></h5>
                            <h5 class="card-title"> RP <span class="harga idT<?= $data['id_barang'] ?> idK<?= $data['id_barang'] ?>" value="<?= $data['total_harga'] ?>"><?= $data['total_harga'] ?> </span></h5>
                                <div class="form-group">

                                  <input type="hidden" name="id" value="<?= $data['id'] ?>" class="ids idT<?= $data['id_barang'] ?> idK<?= $data['id_barang'] ?>"> 

                                  <input type="hidden" name="id_barang" value="<?= $data['id_barang'] ?>" class="idb idT<?= $data['id_barang'] ?> idK<?= $data['id_barang'] ?>" > 

                                  <input type="hidden" name="total_harga"  class="total_harga idT<?= $data['id_barang'] ?> idK<?= $data['id_barang'] ?>" value="<?= $data['total_harga']?>">
                                  
                                  <input type="number" class="qty idT<?= $data['id_barang'] ?> idK<?= $data['id_barang'] ?>" name="quantity" id="idT<?= $data['id_barang'] ?>" value="<?= $data['jumlah_barang'] ?>" size="6"/>
                                  <div class="btn-group mt-3" role="group" aria-label="Basic example">
                                    <button type="button"  id="idT<?= $data['id_barang'] ?>" value="+" class="quan btn btn-secondary">+</button>
                                    <button type="button"  id="idK<?= $data['id_barang'] ?>" value="-" class="quan btn btn-secondary">-</button>
                                  </div>
                                </div>
                           <center> 
                           <button type="button" data-toggle="modal" data-target="#caraBayar1" class="butsave btn btn-primary" id="idT<?= $data['id_barang'] ?>" >Beli</button>
                           <button data-toggle="modal" data-target="#batalModal" class="btnBatal btn btn-danger" id="<?= $data['id'] ?>">Batal</button></center>
                          </div>

                  </div>

             <!-- <?php } ?> -->

          </div>
       </div>
       <?php $dataUser = $this->session->userdata('id_pelanggan'); ?>

             <div class="form-group">
               <button type="button" data-toggle="modal" data-target="#caraBayar" class="chkall btn btn-success form-control mt-5 pt-3 pb-3" id="<?= $dataUser ?>"> <i class="fa fa-shopping-cart"> </i> Check Out Semua</button>
             </div>   
        <?php }else{ ?> 
        <br><br><br> <br>
        <div class="mt-5">
           <center> <h1> KERANJANG MASIH KOSONG ! </h1> </center>           
        </div>  
      <?php } ?>

   <!-- KONTAK --> 
<div class="kontak" style="margin-top: 400px;">
<hr class="my-1">
<section id="contact" class="dark-bg">
 <div class="container">
     <div class="row">
         <div class="col-lg-12 text-center">
             <div class="section-title">
              <h2>Alamat :</h2>
              <p>Jl Jendral Audirman Basis kel Baros kec.Cimahi Tengah <br>Kota Cimahi</p>
            </div>
          </div>
      </div>
  </div>
</section>               
</div>
<div class="modal fade" id="caraBayar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Pilih Metode Pembayaran</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('C_Pelanggan/checkOutAll'); ?>" method="post">      
      <div class="modal-body">
        <div class="form-group">
          <input type="hidden" value="" name="idp" id="iduser" >
          <label for="exampleInputEmail1">Total Harga : </label>
          <input type="text" class="form-control tharga" name="" disabled><br>          
          <label for="exampleInputEmail1">Metode Pembayaran</label>
          <select name="metode_bayar" class="form-control" id="">
              <option value="COD">COD</option>
              <option value="Transfer">Transfer</option>
          </select>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Checkout</button>
      </div>
      </form>
    </div>
  </div>
    <div class="stockBarangKurang" data-flashdata="<?= $this->session->flashdata('kurang');?>"></div>  
</div>

<div class="modal fade" id="batalModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Notifikasi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('C_Pelanggan/batalPesanan'); ?>" method="post">      
      <div class="modal-body">
        <div class="form-group">
          <center><h3>Apakah Anda Yakin Akan Membatalkan Pesanan ?</h3></center>
          <input type="hidden" value="" name="id" id="idbatal" >
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-danger">Ya</button>
      </div>
      </form>
    </div>
  </div>
    <div class="stockBarangKurang" data-flashdata="<?= $this->session->flashdata('kurang');?>"></div>  
</div>

<div class="modal fade" id="caraBayar1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Pilih Metode Pembayaran</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('C_Pelanggan/checkout/'); ?>" method="post">      
      <div class="modal-body">
          <div class="form-group">
            <input type="hidden" value="" name="id" id="checkID" >
            <label for="exampleInputEmail1">Metode Pembayaran</label>
            <select name="metode_bayar" class="form-control" id="">
                <option value="COD">COD</option>
                <option value="Transfer">Transfer</option>
            </select>
          </div>          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Checkout</button>
      </div>
    </form>         
    </div>

  </div>
  <div class="kurang" data-flashdata="<?= $this->session->flashdata('kurang');?>"></div>
  <div class="checkoutBerhasil" data-flashdata="<?= $this->session->flashdata('checkoutBerhasil');?>"></div>  
</div>
<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.js'); ?>"></script>
<script  src="<?= base_url ();?>assets/js/sweetalert2.all.min.js"></script> 

<script type="text/javascript" src="<?php echo base_url('assets/js/keranjang2.js'); ?>"></script>


    <script type="text/javascript">
        $(document).ready(function() {

          //FUNCTION TAMBAH DAN KURANG

          $( ".quan" ).on('click',function() {
            if($(this).val() == "+"){
              $qty = parseInt($(".qty."+this.id).val()) + 1 ;

              $(".qty."+this.id).val($qty);
              $(".butsave."+this.id).attr('disabled',false);


              var id = $(".ids."+ this.id).val();  
              var id_barang = $(".idb."+ this.id).val();
              var jumlah_barang = $qty;
              var getID = this.id;

              $.ajax({
                type: "POST",
                url : "<?= base_url('C_Pelanggan/updateBarang/') ?>",
                dataType : "JSON",
                data : {id:id , id_barang:id_barang, jumlah_barang:jumlah_barang},
                success : function(data){
                  if(data > 0){
                    $(".harga."+ getID).text(data);                    
                  }else{
                      Swal.fire(

                      'Stock Tidak Cukup !',
                      'Stock Barang Hanya Tertinggal ' + data['stock'],
                      'error'

                    );
                    
                  }

                }

              });
             

            }else{
              if(parseInt($(".qty."+this.id).val()) == 1){
                $(".butsave."+this.id).attr('disabled',true);
                $(".qty."+this.id).val(0);
              }else if( parseInt($(".qty."+this.id).val()) < 1){
                $(".butsave."+this.id).attr('disabled',true);
                $(".qty."+this.id).val(0);
              }else{
                $qty = parseInt($(".qty."+this.id).val()) - 1 ;
                $(".qty."+this.id).val($qty);

                var id = $(".ids."+ this.id).val();  
                var id_barang = $(".idb."+ this.id).val();
                var jumlah_barang = $qty;
                var getID = this.id;

                $.ajax({
                  type: "POST",
                  url : "<?= base_url('C_Pelanggan/updateBarang/') ?>",
                  dataType : "JSON",
                  data : {id:id , id_barang:id_barang, jumlah_barang:jumlah_barang},
                  success : function(data){
                  if(data > 0){
                    $(".harga."+ getID).text(data);                    
                  }else{
                      Swal.fire(

                      'Stock Tidak Cukup !',
                      'Stock Barang Hanya Tertinggal ' + data['stock'],
                      'error'

                    );
                    
                  }
                  }

                });
              }

            }

          });
          
          $( ".qty" ).on('change paste',function() {
              $qty = parseInt($(".qty."+this.id).val());
             
              if($qty < 1){
                $qty = 1;
                $(".qty."+this.id).val(1);
              }
              var id = $(".ids."+ this.id).val();  
              var id_barang = $(".idb."+ this.id).val();
              var jumlah_barang = $qty;
              var getID = this.id;

              $.ajax({
                type: "POST",
                url : "<?= base_url('C_Pelanggan/updateBarang/') ?>",
                dataType : "JSON",
                data : {id:id , id_barang:id_barang, jumlah_barang:jumlah_barang},
                success : function(data){
                  if(data > 0){
                    $(".harga."+ getID).text(data);                    
                  }else{
                      Swal.fire(

                      'Stock Tidak Cukup !',
                      'Stock Barang Hanya Tertinggal ' + data['stock'],
                      'error'

                    );
                    
                  }

                }

                });
          });


          $( ".butsave" ).on('click',function() {
            var id = $(".ids."+ this.id).val(); 
            $("#checkID").val(id);
              
          });

          $( ".chk" ).on('click',function() {
            $("#checkID").val("");
              
          });


          $( ".chkall" ).on('click',function() {
              
              $("#iduser").val(this.id);
              var id_user = this.id;
              $.ajax({
                type: "POST",
                url : "<?= base_url('C_Pelanggan/getTotalHarga/') ?>",
                dataType : "JSON",
                data : {id_user:id_user},
                success : function(data){
                  
                    $(".tharga").val("RP. " + data['total']);

                }

                });
            
              
          });

          $( ".btnBatal" ).on('click',function() {

            $("#idbatal").val(this.id);

          });


        });

    </script> 