<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bootstrap/Bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">

    <style>
    h1 {
        font-size: 30pt;
        color: #ffffff;
        text-align: center;
    }

    h2 {
        margin-left: 380px;
        color: #ffffffff;
    }
    </style>

</head>

<body bgcolor="cyan">

    <nav class="navbar navbar-dark bg-dark">

        <h2>Selamat Datang Di Website Me-Cell Store</h2>

    </nav>


    <div class="konten">
        <div class="kepala">
            <div class="lock"></div>
            <h3 class="judul">Silahkan Login</h3>
        </div>

        <div class="font">
            <form action="C_login/aksi_login_admin" method="post">
                <div class="grup">
                    <label for="email">Usernamess</label>
                    <input class="form-control" type="text" name="username" placeholder="Masukan Username Anda"
                        required="">
                </div>

                <div class="grup">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Masukan Password Anda"
                        required="">
                </div>

                <div class="grup">
                    <input type="submit" class="btn btn-success" value="Sign In">
                </div>
            </form>
        </div>
    </div>



    </script>
</body>

</html>