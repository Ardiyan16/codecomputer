<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="<?= base_url() ?>assets/admin/assets/js/sweetalert2-all.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<a href=""><img src="<?= base_url('assets/auth/images/logoo.png') ?>" alt="Colorlib logo"></a>
<h1 style="text-align:center;">Berhasil mengirim link lupa password!</h1>
<p style="text-align:center;">Silahkan Lihat pesan email anda untuk verifikasi akun.</p>
<p style="text-align: center; color: red;">catatan: jika tidak ada pesan pada kotak masuk silahkan cek pesan di spam email anda</p>
<a href="<?= base_url('c_auth') ?>" class="btn btn-primary" style="margin-left: 45%;">Login</a>

<style>
    img {
        margin: 0 auto;
        display: block;
        margin-top: 10%;
    }
</style>

<script>
    <?php if ($this->session->flashdata('success')) : ?>
        Swal.fire({
            icon: 'success',
            title: 'Link Berhasil dikirim ke email anda!',
            showConfirmButton: true,
            // timer: 1500
        })
    <?php endif ?>
</script>