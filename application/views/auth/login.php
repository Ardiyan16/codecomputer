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
    <script src="<?= base_url() ?>assets/admin/assets/js/sweetalert2-all.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

    <title>Login</title>
</head>

<body>


    <div class="d-lg-flex half">
        <div class="bg order-1 order-md-2" style="background-image: url(<?= base_url('assets/auth/images/bgg.png') ?>);"></div>
        <div class="contents order-2 order-md-1">

            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-7">
                        <h3>Login</h3>
                        <p class="mb-4"><?= $this->session->flashdata('message') ?></p>
                        <p class="mb-4">silahkan login untuk mendapatkan akses.</p>
                        <form action="<?= base_url('c_auth/login') ?>" method="post">
                            <div class="form-group first">
                                <label for="username">Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Email Anda..." id="email">
                                <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group last mb-3">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control password" placeholder="Password Anda..." id="password">
                                <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>

                            <div class="d-flex mb-5 align-items-center">
                                <label class="control control--checkbox mb-0"><span class="caption">Lihat Password</span>
                                    <input type="checkbox" class="form-checkbox" />
                                    <div class="control__indicator"></div>
                                </label>
                                <span class="ml-auto"><a href="<?= base_url('c_auth/lupa_password') ?>" class="forgot-pass">Lupa Password</a></span>
                            </div>

                            <button type="submit" class="btn btn-block btn-primary">Log In</button>
                            <div class="text-center">
                                <span class="ml-auto"><a href="<?= base_url('c_auth/register') ?>" class="forgot-pass">Belum memiliki akun?</a></span>
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
    <script>
        <?php if ($this->session->flashdata('gagal')) : ?>
            Swal.fire({
                icon: 'error',
                title: 'Gagal untuk login!',
                text: 'silahkan tunggu konfirmasi dari admin',
                showConfirmButton: true,
                // timer: 1500
            })
        <?php elseif ($this->session->flashdata('belumverif')) : ?>
            Swal.fire({
                icon: 'error',
                title: 'Maaf akun anda belum diverifikasi!',
                text: 'silahkan tunggu konfirmasi dari admin',
                showConfirmButton: true,
                // timer: 1500
            })
        <?php elseif ($this->session->flashdata('passwordsalah')) : ?>
            Swal.fire({
                icon: 'error',
                title: 'Password anda masukkan salah!',
                text: 'silahkan coba lagi',
                showConfirmButton: true,
                // timer: 1500
            })
        <?php elseif ($this->session->flashdata('emailsalah')) : ?>
            Swal.fire({
                icon: 'error',
                title: 'Email anda masukkan salah!',
                text: 'silahkan coba lagi',
                showConfirmButton: true,
                // timer: 1500
            })
        <?php elseif ($this->session->flashdata('logout')) : ?>
            Swal.fire({
                icon: 'success',
                title: 'Anda berhasil logout',
                text: 'silahkan login untuk masuk kembali',
                showConfirmButton: true,
                // timer: 1500
            })
        <?php elseif ($this->session->flashdata('gantipass')) : ?>
            Swal.fire({
                icon: 'success',
                title: 'Anda berhasil ganti password!',
                showConfirmButton: true,
                // timer: 1500
            })
        <?php elseif ($this->session->flashdata('gagal')) : ?>
            Swal.fire({
                icon: 'error',
                title: 'Maaf anda gagal mengganti password!',
                showConfirmButton: true,
                // timer: 1500
            })
        <?php endif ?>
    </script>
</body>

</html>