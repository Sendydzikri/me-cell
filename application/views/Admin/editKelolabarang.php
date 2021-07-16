

    
    <h3 class="text-center mt-4 mb-4"> Menu Admin | Edit Kelola Barang</h3>

  <div class="box">

<!-- <div class="konten"> -->

<?php foreach($tb_barang as $u){   ?>
<form action="<?php echo base_url('C_Barang/prosesUpdate/').$u->id_barang ?>" method="post">

<div class="container">
  <div class="row">
    <div class="col-sm">

     
            <label>ID Barang</label><input class="form-control" name="id_barang" value="<?php echo $u->id_barang ?>" type="text" aria-label="default input example" disabled><br>
            <label>Nama Barang</label><input class="form-control" name="nama_barang" value="<?php echo $u->nama_barang ?>" type="text" aria-label="default input example"><br>
            <label>Jenis Barang</label><input class="form-control" name="jenis_barang" value="<?php echo $u->jenis_barang ?>" type="text" aria-label="default input example"><br>
    </div>
    <div class="col-sm">
      <label>Stok</label>
      <input class="form-control" name="stock" value="<?php echo $u->stock ?>" type="text" aria-label="default input example"><br>
            <label>Harga</label><input class="form-control" name="harga" value="<?php echo $u->harga ?>" type="text" aria-label="default input example"><br>
            <div class="mb-3">
            <label for="formFile" class="form-label">Gambar</label>
             <input class="form-control" type="file" id="formFile">
             </div>
            <button type="submit" value="update" class="btn btn-primary"> Edit
            </button>

    </div>
    </div>
  </div>


            
          </form>
          <?php }  ?>
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