
     
     
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
                        <th>ID Barang</th>
                        <th>Jumlah Barang</th>
                        <th>Total Harga</th>
                        <th>Tanggal Transaksi</th>
                        <th>Metode Bayar</th>
                        <th>status</th>
                        <th>Aksi</th>

                      </tr>
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
                              <td><?php echo $data -> metode_bayar ?></td>
                              <td><?php echo $data -> status ?></td>
                              <td>
                                <a href="<?= base_url('C_Kasir/cetak/'.$data->id_transaksi)?>" class="btn btn-success"> Cetak Struk </a>
                                <a href=""></a>
                              </td>
                          </tr>
                          
                        <?php } ?>
                    </tbody>
                  </table> 
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

