

<div class="box mt-4">

    <div class="table">

        <!-- Datatables -->
        <div class="col-lg-11">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Kelola Data Kasir</h6>
                </div>

                <div class="ml-2 mt-4 mb-4">
                <a href="<?php echo base_url('index.php/C_Admin/tambahKasir') ?>" class="btn btn-danger"><i class="fa fa-plus"></i> Tambah</a>
                </div>

                    <table  id="datatablesSimple">
                        <thead class="thead-light">
                            <tr>
                                <th>NO</th>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>No. HP</th>
                                <th>Cabang</th>
                                <th>Email</th>
                                <th>Username</th>
                                <th>AKSI</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($kasir as $data) { ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $data['id_kasir'] ?></td>
                                <td><?php echo $data['nama_kasir'] ?></td>
                                <td><?php echo $data['alamat_kasir'] ?></td>
                                <td><?php echo $data['nohp_kasir'] ?></td>
                                <td><?php echo $data['cabang'] ?></td>
                                <td><?php echo $data['email'] ?></td>
                                <td><?php echo $data['username_kasir'] ?></td>

                                <td>
                                    <!-- Button-->
                                    <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                        <a href="<?php echo base_url('index.php/C_Admin/editKasir/'.$data['id_kasir']) ?>"
                                            class="btn btn-warning text-white">
                                            Edit </a>

                                        <a href="<?php echo base_url('index.php/C_Admin/hapusKasir/'). $data['id_kasir']?>"
                                            class="btn btn-danger"> Hapus </a>
                                    </div>
                </div>

                </td>
                </tr>

                <?php } ?>


                </tbody>
                </table>

            </div>
    </div>
</div>