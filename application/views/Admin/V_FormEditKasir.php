





<div class="box2 mt-4 ">

    <h3 class="text-center mb-4">Edit Kelola Data Kasir</h3>
    <div class="konten2">
        <?php foreach($kasir as $data) {?>
        <form class="form2" method="post" action="<?= base_url('C_Admin/aksi_edit_kasir');?>">

            <div class="container">
                <div class="row">
                    <div class="col-sm">

                        <label>ID Kasir</label>

                        <input class="form-control" type="hidden" name="id_kasir" aria-label="default input example" value="<?= $data['id_kasir'] ?>" >

                        <input class="form-control" type="text" name="id_kasir2" aria-label="default input example" value="<?= $data['id_kasir'] ?>" disabled>
                        <br>


                        <label>Nama Kasir</label>
                        <input class="form-control" type="text" name="nama_kasir" value="<?= $data['nama_kasir'] ?>" aria-label="default input example"><br>
                        <label>Alamat Kasir</label>
                        <input class="form-control" type="text" name="alamat_kasir" aria-label="default input example" value="<?= $data['alamat_kasir'] ?>" >
                        <br>
                        <label>No. HP</label>
                        <input class="form-control" type="text" name="nohp_kasir" aria-label="default input example" value="<?= $data['nohp_kasir'] ?>"><br>
                    </div>
                    <div class="col-sm">
                        <label>Cabang</label><input class="form-control" type="text" name="cabang" aria-label="default input example" value="<?= $data['cabang'] ?>"><br>
                        <label>Email</label><input class="form-control" type="text" name="email" aria-label="default input example" value="<?= $data['email'] ?>"><br>
                        <label>Username Kasir</label><input class="form-control" type="text" name="username_kasir" aria-label="default input example" value="<?= $data['username_kasir'] ?>"><br>
                        <label>Password Kasir</label><input class="form-control" type="text" name="password_kasir" placeholder="Masukan Password Baru Jika Ingin Mengganti " aria-label="default input example"><br>
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>
                        
                </div>
            </div>



        </form>
        <?php }?>
    </div>
</div>