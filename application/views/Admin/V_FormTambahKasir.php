
<h3 class="text-center mt-4">Tambah Kelola Data Kasir</h3>


<div class="box2">

    <div class="konten2">

            <div class="container">
                <?php echo form_open_multipart('C_Admin/aksitambahKasir'); ?>
                <div class="form-group mt-3">
                    <label> Nama Kasir </label>
                    <input type="text" name="Nama_Kasir" placeholder="Masukan Nama Kasir" class="form-control" required>
                </div>
                <div class="form-group mt-3">
                    <label> Alamat Kasir </label>
                    <input type="text" placeholder="Alamat Kasir" placeholder="Masukan Alamat Kasir" name="Alamat_Kasir" class="form-control" required>
                </div>
                <div class="form-group mt-3">
                    <label> No. HP </label>
                    <input type="text" placeholder="Masukan No HP" name="NOHP_Kasir" class="form-control" required>
                </div>
                <div class="form-group mt-3">
                    <label> Cabang </label>
                    <input type="text" name="Cabang" placeholder="Masukan Cabang Kasir" class="form-control" required>
                </div>
                <div class="form-group mt-3">
                    <label> Email </label>
                    <input type="email"  name="Email" placeholder="Masukan Email" class="form-control" required>
                </div>
                <div class="form-group mt-3">
                    <label> Username Kasir </label>
                    <input type="text" name="Username_Kasir" placeholder="Masukan Username Kasir" class="form-control" required>
                </div>
                <div class="form-group mt-3">
                    <label> Password Kasir </label>
                    <input type="password" placeholder="Masukan password" name="Password_Kasir" class="form-control" required>
                </div>

                <a href="<?= base_url('C_Admin/tampilKelolaKasir/'); ?>" class="btn btn-danger"> Kembali </a>
                <button type="submit" class=" btn btn-primary"> <i class="fa fa-plus"></i> Tambah</button>
                <?php echo form_close() ?>
            </div>

    </div>
</div>