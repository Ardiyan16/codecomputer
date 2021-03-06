<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" href="<?= base_url() ?>assets/auth/images/computer.png">
    <link rel="shortcut icon" href="<?= base_url() ?>assets/auth/images/computer.png">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?= base_url() ?>assets/auth/fonts/icomoon/style.css">

    <link rel="stylesheet" href="<?= base_url() ?>assets/auth/css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/auth/css/bootstrap.min.css">

    <!-- Style -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/auth/css/style.css">

    <title>Register</title>
</head>

<body>


    <div class="d-lg-flex half">
        <div class="bg order-1 order-md-2" style="background-image: url(<?= base_url('assets/auth/images/bgg2.png') ?>);"></div>
        <div class="contents order-2 order-md-1">

            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-7">
                        <h3>Registrasi</h3>
                        <p class="mb-4">Silahkan registrasi untuk membuat akun.</p>
                        <form action="<?= base_url('c_auth/register_akun') ?>" method="post">
                            <div class="form-group first">
                                <label for="username">Nama</label>
                                <input type="text" name="nama" class="form-control" placeholder="nama anda..." id="nama">
                                <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group first">
                                <label for="username">Email</label>
                                <input type="email" name="email" class="form-control" placeholder="email anda..." id="email">
                                <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group first">
                                <label for="username">No Telp</label>
                                <input type="number" name="no_telp" class="form-control" placeholder="no telp anda..." id="no_telp">
                                <?= form_error('no_telp', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group first">
                                <label for="username">Alamat</label>
                                <input type="text" name="alamat" class="form-control" placeholder="alamat anda..." id="alamat">
                                <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group last mb-3">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control password" placeholder="password anda..." id="password">
                                <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group last mb-3">
                                <label for="password">Konfirmasi Password</label>
                                <input type="password" name="kpassword" class="form-control password" placeholder="konfirmasi password..." id="password">
                                <?= form_error('kpassword', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="d-flex mb-5 align-items-center">
                                <label class="control control--checkbox mb-0"><span class="caption">Lihat Password</span>
                                    <input type="checkbox" class="form-checkbox" />
                                    <div class="control__indicator"></div>
                                </label>
                                <!-- <span class="ml-auto"><a href="#" class="forgot-pass">Forgot Password</a></span> -->
                            </div>

                            <button type="submit" class="btn btn-block btn-primary">Register</button>
                            <div class="text-center">
                                <span class="ml-auto"><a href="<?= base_url('c_auth') ?>" class="forgot-pass">Sudah memiliki akun?</a></span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>



    <script src="<?= base_url() ?>assets/auth/js/jquery-3.3.1.min.js"></script>
    <script src="<?= base_url() ?>assets/auth/js/popper.min.js"></script>
    <script src="<?= base_url() ?>assets/auth/js/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>assets/auth/js/main.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.form-checkbox').click(function() {
                if ($(this).is(':checked')) {
                    $('.password').attr('type', 'text');
                } else {
                    $('.password').attr('type', 'password');
                }
            });
        });
    </script>
</body>

</html>