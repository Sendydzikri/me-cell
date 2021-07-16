<div class="container mt-4">


  <?php if($url == 'kelolaLaporan'){ ?>

  <button class="btn btn-primary" data-toggle="modal" data-target="#laporan" class="btnLaporan btn btn-danger" ><i class="fa fa-calendar"></i> Laporan Per Tanggal </button> 

  <a href="<?= base_url('C_Admin/printLaporanBulanan'); ?>" class="btn btn-primary"><i class="fa fa-book"></i> Print Laporan Bulanan</a>
  <?php }else{ ?>
    <button class="btn btn-primary" data-toggle="modal" data-target="#laporan" class="btnLaporan btn btn-danger" ><i class="fa fa-calendar"></i> Laporan Bulan Ini </button>
    <br><br>
    <form action="<?= base_url('C_Admin/printLaporanTanggal'); ?>" method="post">
      <input type="hidden" name="tanggal_awal" value="<?= $tgl_awal; ?>">
      <input type="hidden" name="tanggal_akhir" value="<?= $tgl_akhir; ?>">
      <button type="submit" class="btn btn-primary"><i class="fa fa-book"></i> Print Laporan Per Tanggal</button>
    </form>
  <?php } ?>
</div>
<div class="box mt-4">

<h2 class="text-center" style="color:black;"> Laporan Bulan Ini </h2>

<div class="table table-striped">
<div class="table-responsive p-3 border">
	<div class="col-lg-11">
    <div class="card mb-4">
	<table id="datatablesSimple">
           <thead class="thead-dark">
                 <tr>
                     <th>NO</th>
                     <th>ID Transaksi</th>
                     <th>Nama Pelanggan</th>
                     <th>Nama Barang</th>
                     <th>Jumlah Barang</th>
                     <th>Total Harga</th>

             	</tr>
            </thead> 
            <tbody>
            	<?php $i = 1; foreach($laporan as $data){ ?>
	            	<tr>
	            		<td><?= $i++ ?></td>
	            		<td><?= $data['id_transaksi'] ?></td>
	            		<td><?= $data['nama_pelanggan'] ?></td>
	            		<td><?= $data['nama_barang'] ?></td>
	            		<td><?= $data['jumlah_barang'] ?></td>
	            		<td><?= $data['total_harga'] ?></td>
	            		<?php 
	            			$total_pendapatan = $data['total_pendapatan'];
	            			$barang_terjual = $data['barang_terjual'];
	            		?>
	            	</tr>
            	<?php } ?>
        	</tbody>
          <thead class="thead-dark">
              <tr>
                <td colspan="3"><b>Total </b></td>
                <td> <b> : </b></td>
                <td><b><?= $barang_terjual ?></b></td>                
                <td><b>Rp. <?= $total_pendapatan ?></b></td>
              </tr>
            </thead> 
    </table>
	</div>
</div>
</div>
</div>
</div>

<div class="modal fade" id="laporan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Pilih Rentang Tanggal Laporan </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('C_Admin/kelolaLaporanTanggal/'); ?>" method="post">      
      <div class="modal-body">
          <div class="form-group">
          	<label for="tanggal_awal"> Masukan Tanggal Awal</label>
         	<input type="date" class="form-control" name="tanggal_awal" >

          </div>          
          <div class="form-group">
          	<label for="tanggal_awal"> Masukan Tanggal Akhir</label>
         	<input type="date" class="form-control" name="tanggal_akhir">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Mulai</button>
      </div>
    </form>         
    </div>

  </div>
</div>