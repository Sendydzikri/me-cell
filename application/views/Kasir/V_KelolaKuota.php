
     
     
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
                
                  <table class="table" id="datatablesSimple">
                    <thead class="bg-dark text-white">
                      <tr>
                        <th>NO</th>
                        <th>ID Transaksi</th>
                        <th>ID Pelanggan</th>
                        <th>No HP</th>
                        <th>Jumlah Kuota</th>
                        <th>Metode Bayar</th>
                        <th>Aksi</th>
                      </tr>

                    </thead> 
                    <tbody>
                    <?php $no = 1;
                       foreach($row as $data) {?>
                          <tr>
                              <td><?php echo $no++?></td>
                              <td><?php echo $data['id_transaksi_kuota'];  ?></td>
                              <td><?php echo $data['id_pelanggan']; ?></td>
                              <td><?php echo $data['no_hp'];   ?></td>
                              <td><?php echo $data['jumlah_kuota'];   ?>GB</td>
                              <td><?php echo $data['metode_bayar']; ?></td>
                              <td>
                                <a href="<?= base_url('C_Kasir/cetakKuota/'.$data['id_transaksi_kuota'])?>" class="btn btn-success"> Cetak Struk </a>
                                <a href=""></a>
                              </td>
                              

                              <td>
                                <!-- Button-->
                              



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