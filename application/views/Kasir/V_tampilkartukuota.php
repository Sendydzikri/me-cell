<!-- Datatables -->
<div class="col-lg-12">
    <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Data Stock Kartu Kuota</h6>
        </div>
        <div class="search">

            <div class="table table-responsive p-3">

                <table class="table align-items-center table-flush" id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>ID Barang</th>
                            <th>Nama Barang</th>
                            <th>Jenis Barang</th>
                            <th>Stock</th>
                        <tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($barang as $data) { ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $data['id_barang'] ?></td>
                            <td><?php echo $data['nama_barang'] ?></td>
                            <td><?php echo $data['jenis_barang'] ?></td>
                            <td><?php echo $data['stock'] ?></td>



            </div>

            </td>
            </tr>

            <?php } ?>
            </tbody>
            </table>
        </div>
    </div>
</div>