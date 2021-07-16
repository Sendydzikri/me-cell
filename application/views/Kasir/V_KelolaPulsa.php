
     
     
   <!-- Datatables -->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Kelola Transaksi</h6>
                </div>

                <div class="table-responsive p-3">
                
                  <table class="table" id="datatablesSimple">
                    <thead class="bg-dark text-white">
                      <tr>
                        <th>NO</th>
                        <th>ID Transaksi</th>
                        <th>ID Pelanggan</th>
                        <th>Jumlah Pulsa</th>
                        <th>No HP</th>
                        <th>Total Harga</th>
                        <th>Metode Bayar</th>
                        <th>Aksi</th>

                      </tr>
                    </thead> 
                    <tbody>
                        <?php $no = 1;
                       foreach($row as $data) {?>
                          <tr>
                              <td><?php echo $no++?></td>
                              <td><?php echo $data['id_transpulsa'];  ?></td>
                              <td><?php echo $data['id_pelanggan']; ?></td>
                              <td><?php echo $data['jumlah_saldo']  ?></td>
                              <td><?php echo $data['no_hp'];   ?></td>
                              <td><?php echo $data['total_harga'];  ?></td>
                              <td><?php echo $data['metode_bayar']; ?></td>
                              
                              <td>
                                <a href="<?= base_url('C_Kasir/cetakPulsa/'.$data['id_transpulsa'])?>" class="btn btn-success"> Cetak Struk </a>
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
              </div>
            </div>
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

        

