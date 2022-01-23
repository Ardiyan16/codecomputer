<?php $this->load->view('admin/partials/head.php'); ?>
<?php $this->load->view('admin/partials/menu.php'); ?>

<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Dashboard</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li class="active">Dashboard</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="content mt-3">
    <div class="row wrapper border-bottom white-bg page-heading">
        <h1 class="ml-3">Selamat Datang, <?= $this->session->userdata('nama') ?></h1>
        <h4 style=" margin-left: 80%;">
            <script type='text/javascript'>
                var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

                var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum&#39;at', 'Sabtu'];

                var date = new Date();

                var day = date.getDate();

                var month = date.getMonth();

                var thisDay = date.getDay(),

                    thisDay = myDays[thisDay];
                var yy = date.getYear();


                var year = (yy < 1000) ? yy + 1900 : yy;

                document.write(thisDay + ', ' + day + ' ' + months[month] + ' ' + year);
            </script>

    </div>
</div>


<?php $this->load->view('admin/partials/js.php'); ?>