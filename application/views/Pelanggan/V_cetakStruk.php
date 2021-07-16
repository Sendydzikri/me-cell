
<?php?>
<div class="table table-striped">
<div class="table-responsive p-3 border">
    <div class="col-lg-11">
    <div class="card mb-4">
    <h3 class="text-center mt-4">Transaksi Berhasil</h3>        
    <table id="datatablesSimple">
           <thead class="thead-dark">
                 <tr>
                    <th>NO</th>
                    <th>ID Transaksi</th>
                    <th>Nama Barang</th>
                    <th>Jumlah Barang</th>
                    <th>Total Harga</th>
                    <th>Tanggal Transaksi</th>
                    <th>Metode Bayar</th>
                </tr>
            </thead> 
            <tbody>
                <?php $i = 1; foreach($transaksi as $data){ ?>
                    <tr>
                        <td><?php echo $i++ ?></td>
                        <td><?php echo $data['id_transaksi'] ?></td>
                        <td><?php echo $data['nama_barang'] ?></td>
                        <td><?php echo $data['jumlah_barang'] ?></td>
                        <td><?php echo $data['total_harga'] ?></td>
                        <td><?php echo $data['tanggal_transaksi'] ?></td>
                        <td><?php echo $data['metode_bayar'] ?></td>
                    </tr>
                <?php } ?>
            </tbody>
    </table>
    </div>
</div>
</div>
</div>
</div>


      <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
      <script src="<?= base_url('assets/js/datatables-simple-demo.js'); ?>"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

      
      <script type="text/javascript" src="<?php echo base_url('assets/js/sidenav.js'); ?>"></script>></script>

     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script  src="<?= base_url ();?>assets/js/sweetalert2.all.min.js"></script> 


      <script type="text/javascript" src="<?php echo base_url('assets/js/keranjang.js'); ?>"></script></script>
      <script>
          window.print();
        </script>