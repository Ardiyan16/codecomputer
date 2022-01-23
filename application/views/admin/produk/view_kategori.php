<?php $this->load->view('admin/partials/head.php'); ?>
<?php $this->load->view('admin/partials/menu.php'); ?>

<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>List Kategori</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="#">Produk</a></li>
                    <li><a href="#">Kategori</a></li>
                    <li class="active">View Kategori</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a href="#tambah" data-toggle="modal" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Kategori</a>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kategori</th>
                                    <th>Option</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($view as $kategori) : ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $kategori->kategori ?></td>
                                        <td>
                                            <a href="#edit<?= $kategori->id_kat ?>" data-toggle="modal" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit</a> |
                                            <a href="<?= base_url('admin/c_produk/delete_kategori/' . $kategori->id_kat) ?>" onclick="return confirm('Apakah anda yakin hapus kategori ini?')" class="btn btn-danger btn-sm"><i class="fa fa fa-trash"></i> Hapus</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


        </div>
    </div><!-- .animated -->
</div><!-- .content -->
<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form method="post" action="<?= base_url('admin/c_produk/save_kategori') ?>">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Kategori</label>
                        <input type="text" class="form-control" name="kategori" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Kategori...">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php foreach ($edit as $e) : ?>
    <div class="modal fade" id="edit<?= $e->id_kat ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form method="post" action="<?= base_url('admin/c_produk/update_kategori') ?>">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Brand</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Brand</label>
                            <input type="hidden" value="<?= $e->id_kat ?>" name="id_kat">
                            <input type="text" value="<?= $e->kategori ?>" class="form-control" name="kategori" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Kategori...">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<script>
    <?php if ($this->session->flashdata('insert')) : ?>
        Swal.fire({
            icon: 'success',
            title: 'Kategori berhasil disimpan!',
            text: 'Data kategori baru ditambahkan',
            showConfirmButton: true,
            // timer: 1500
        })
    <?php elseif ($this->session->flashdata('update')) : ?>
        Swal.fire({
            icon: 'success',
            title: 'Kategori berhasil diupdate!',
            text: 'Data kategori telah diupdate',
            showConfirmButton: true,
            // timer: 1500
        })
    <?php elseif ($this->session->flashdata('delete')) : ?>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil menghapus kategori!',
            text: 'data kategori yang anda pilih berhasil dihapus',
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
<?php $this->load->view('admin/partials/js.php'); ?>