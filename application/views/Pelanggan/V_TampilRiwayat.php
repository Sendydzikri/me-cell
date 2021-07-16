
<?php?>

<div class="container mt-4 mb-4 text-center">
    <a href="<?= base_url('C_Pelanggan/tampilRiwayat'); ?>" class="btn btn-primary">Riwayat Pembelian Barang</a>
    <a href="<?= base_url('C_Pelanggan/tampilRiwayatKuota'); ?>" class="btn btn-primary">Riwayat Pembelian Kuota</a>
    <a href="<?= base_url('C_Pelanggan/tampilRiwayatPulsa'); ?>" class="btn btn-primary">Riwayat Pembelian Pulsa</a>
</div>
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
                    <th>Aksi</th>
                </tr>
            </thead> 
            <tbody>
                <?php $i = 1; foreach($diterima as $data){ ?>
                    <tr>
                        <td><?php echo $i++ ?></td>
                        <td><?php echo $data['id_transaksi'] ?></td>
                        <td><?php echo $data['nama_barang'] ?></td>
                        <td><?php echo $data['jumlah_barang'] ?></td>
                        <td><?php echo $data['total_harga'] ?></td>
                        <td><?php echo $data['tanggal_transaksi'] ?></td>
                        <td><?php echo $data['metode_bayar'] ?></td>
                        <td>
                                
                                <a href="<?= base_url('C_Pelanggan/cetakStruk/'. $data['id_transaksi']);  ?>" class="btn btn-primary"> <i class="fa fa-book"></i> Cetak Struk</a>


                        </td>
                    </tr>
                <?php } ?>
            </tbody>
    </table>
    </div>
</div>
</div>
</div>
</div>






<div class="table table-striped">
<div class="table-responsive p-3 border">
    <div class="col-lg-11">
    <div class="card mb-4">
    <h3 class="text-center mt-4 mb-5">Transaksi Menunggu Persetujuan</h3>             
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
                <?php $i = 1; foreach($menunggu as $data){ ?>
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