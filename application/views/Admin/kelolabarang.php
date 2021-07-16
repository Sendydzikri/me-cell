
        <h3 class="text-center mt-4"> Kelola Barang</h3>
    
      <div class="box">

        <div class="table">    
           <!-- Datatables -->
            <div class="col-lg-11">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                </div>
                <div class="table-responsive p-3">
                
                  <table id="datatablesSimple">
                    <thead class="thead-light">
                      <tr>
                        <th>NO</th>
                        <th>ID Barang</th>
                        <th>Nama Barang</th>
                        <th>ID Kategori</th>
                        <th>Jenis Barang</th>
                        <th>Stok</th>
                        <th>Harga</th>
                        <th>AKSI</th>

                      </tr>
                    </thead> 
                    <tbody>
                        <?php $no = 1;
                        foreach ($row->result() as $key => $data){ ?>
                          <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $data->id_barang ?></td>
                            <td><?php echo $data->nama_barang ?></td>
                            <td><?php echo $data->id_kategori ?></td>
                            <td><?php echo $data->jenis_barang ?></td>
                            <td><?php echo $data->stock ?></td>
                            <td><?php echo $data->harga ?></td>

                      <td><div class="btn-group" role="group" aria-label="Basic mixed styles example">
                            <button type="button" class="btn btn-warning">
                            <a href="<?php echo site_url("C_Barang/update/".$data->id_barang) ?>">
                             <img src="<?php echo base_url('assets/img/edit.png'); ?>" width="25" height="25">
                             </a>
                            </button>
                            <button type="button" class="btn btn-success">
                            <a href='<?php echo site_url("C_Barang/hapus/".$data->id_barang) ?>'> 
                             <img src="<?php echo base_url('assets/img/delete.png'); ?>" width="25" height="25">
                             </a>
                            </button>
                       </div></td>
                          </tr>
                       <?php } ?>

                        <a href="<?php echo site_url("C_Barang/tambah") ?>" class="btn btn-danger">
                          <i class="fa fa-plus"> </i> Tambah
                        </a>
 
                      </tbody>
                  </table> 
                            
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
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

    
