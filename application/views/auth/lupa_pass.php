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

    <title>Lupa Password</title>
</head>

<body>


    <div class="d-lg-flex half">
        <div class="bg order-1 order-md-2" style="background-image: url(<?= base_url('assets/auth/images/bgg.png') ?>);"></div>
        <div class="contents order-2 order-md-1">

            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-7">
                        <h3>Lupa Password</h3>
                        <p class="mb-4"><?= $this->session->flashdata('message') ?></p>
                        <p class="mb-4">silahkan isi email untuk merubah password.</p>
                        <form action="<?= base_url('c_auth/forgot_pass') ?>" method="post">
                            <div class="form-group first">
                                <label for="username">Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Email Anda..." id="email">
                            </div>
                            <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                            <button type="submit" class="btn btn-block btn-primary">Kirim</button>
                            <div class="text-center">
                                <span class="ml-auto"><a href="<?= base_url('c_auth') ?>" class="forgot-pass">Login</a></span>
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
    <!-- <script type="text/javascript">
        $(document).ready(function() {
            $('.form-checkbox').click(function() {
                if ($(this).is(':checked')) {
                    $('.password').attr('type', 'text');
                } else {
                    $('.password').attr('type', 'password');
                }
            });
        });
    </script> -->
</body>

</html>