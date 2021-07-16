<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
	<title>Menu Utama</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bootstrap/Bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">

    <style>
        table{
            margin-left: 120px;
        }
        .no_hp{
            margin-left: 1110px;
        }
        .kontak {
  background-color: #2e2e2e;
  margin-top: 150px;
}

    </style>
</head>
<body>
    
</div>
     <br>
     <br>
      <table>
        <tr>
            <td>
               <div class="card" style="width: 18rem;">
                   <div class="card-body">
                     <h5 class="card-title">Pulsa 5.000</h5>
                     <h6 class="card-subtitle mb-2 text-muted">Harga Rp7.000</h6>
                     <input type = "text" class="noHp1" placeholder = "Masukkan No HP">
                     <input type = "text" class="harga1" value="7000" hidden> 
                     <input type = "text" class="saldo1" value="5000" hidden> 
                     <button class="beli btn btn-outline-success my-0 my-sm-0" type="submit" class="card-link" id="1" data-toggle="modal" data-target="#caraBayar">BELI</a>
                   </div>
                 </div>
            </td>
            
            <td>
               <div class="card" style="width: 18rem;">
                   <div class="card-body">
                     <h5 class="card-title">Pulsa 10.000</h5>
                     <h6 class="card-subtitle mb-2 text-muted">Harga Rp12.000</h6>
                     <input type = "text" class="noHp2" placeholder = "Masukkan No HP">
                     <input type = "text" class="harga2" value="12000" hidden> 
                     <input type = "text" class="saldo2" value="10000" hidden> 
                      <button class="beli btn btn-outline-success my-0 my-sm-0" type="submit" class="card-link" id="2" data-toggle="modal" data-target="#caraBayar">BELI</a>
                   </div>
                 </div>
            </td>
            <td>
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                      <h5 class="card-title">Pulsa 25.000</h5>
                      <h6 class="card-subtitle mb-2 text-muted">Harga Rp27.000</h6>
                      <input type = "text" class="noHp3" placeholde = "Masukkan No HP">
                      <input type = "text" class="harga3" value="27000" hidden> 
                      <input type = "text" class="saldo3" value="25000" hidden> 
                      <button class="beli btn btn-outline-success my-0 my-sm-0" type="submit" class="card-link" id="3" data-toggle="modal" data-target="#caraBayar">BELI</a>
                    </div>
                  </div>
             </td>
        </tr>

        <tr>
            <td>
               <div class="card" style="width: 18rem;">
                   <div class="card-body">
                     <h5 class="card-title">Pulsa 50.000</h5>
                     <h6 class="card-subtitle mb-2 text-muted">Harga Rp52.000</h6>
                     <input type = "text" class="noHp4" placeholde = "Masukkan No HP">
                     <input type = "text" class="harga4" value="52000" hidden> 
                     <input type = "text" class="saldo4" value="50000" hidden> 
                     <button class="beli btn btn-outline-success my-0 my-sm-0" type="submit" class="card-link" id="4" data-toggle="modal" data-target="#caraBayar">BELI</a>
                   </div>
                 </div>
            </td>
   <br>
            <td>
               <div class="card" style="width: 18rem;">
                   <div class="card-body">
                     <h5 class="card-title">Pulsa 100.000</h5>
                     <h6 class="card-subtitle mb-2 text-muted">Harga Rp102.000</h6>
                     <input type = "text" class="noHp5" placeholder = "Masukkan No HP">
                     <input type = "text" class="harga5" value="102000" hidden> 
                     <input type = "text" class="saldo5" value="100000" hidden> 
                     <button class="beli btn btn-outline-success my-0 my-sm-0" type="submit" class="card-link" id="5" data-toggle="modal" data-target="#caraBayar">BELI</a>
                   </div>
                 </div>
            </td>
            <td>
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                      <h5 class="card-title">Pulsa 200.000</h5>
                      <h6 class="card-subtitle mb-2 text-muted">Harga Rp202.000</h6>
                      <input type = "text" class="noHp6" placeholder = "Masukan No HP">
                      <input type = "text" class="harga6" value="200000" hidden> 
                     <input type = "text" class="saldo6" value="2020000" hidden> 
                      <button class="beli btn btn-outline-success my-0 my-sm-0" type="submit" class="card-link" id="6" data-toggle="modal" data-target="#caraBayar">BELI</a>
                    </div>
                  </div>
             </td>
        </tr>
    </table>
    <br> <br>

     
      <!-- KONTAK --> 
      <div class="kontak">`
      <hr class="my-1">
<section id="contact" class="dark-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="section-title">
                    <h2>Alamat :</h2>
                    <p>Jl Jendral Audirman Basis kel Baros kec.Cimahi Tengah <br>Kota Cimahi</p>
  
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
      <form action="<?= base_url('C_Pelanggan/transPulsa'); ?>" method="post">      
      <div class="modal-body">
        <div class="form-group">
            <input type="hidden" name="nomor" class="nomor" value="">
          <input type="hidden" name="total" class="total" value="">
          <input type="hidden" name="saldo" class="saldo" value="">
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

<script type="text/javascript">
        
        $(document).ready(function() {
        
            $(".beli").on('click',function(){
                var noHP = $(".noHp" + this.id).val();
                var total = $('.harga' + this.id).val();
                var saldo = $('.saldo' + this.id).val();

                if(noHP == ""){
                    alert("Mohon Isi No Hp");
                }else{
                    $('.nomor').val(noHP);
                    $('.total').val(total);
                    $('.saldo').val(saldo);                    
                }

            });


        });


</script>
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