<?php $this->load->view('admin/partials/head.php'); ?>
<?php $this->load->view('admin/partials/menu.php'); ?>

<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Produk</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="#">Produk</a></li>
                    <li><a href="#">Produk Barang</a></li>
                    <li class="active">View Produk</li>
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
                        <a href="<?= base_url('admin/c_produk/add_produk') ?>" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Produk</a>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Produk</th>
                                    <th>Brand</th>
                                    <th>Harga</th>
                                    <th>Stok</th>
                                    <th>Foto</th>
                                    <th>Option</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($produk as $p) : ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $p->nama_produk ?></td>
                                        <td><img src="<?= base_url('assets/admin/images/logo/' . $p->logo) ?>" width="100"></td>
                                        <td><?= 'Rp. ' . number_format($p->harga) ?></td>
                                        <td><?= $p->stok ?></td>
                                        <td><img src="<?= base_url('assets/admin/images/produk/' . $p->foto) ?>" width="64"></td>
                                        <td>
                                            <a href="#detail<?= $p->id_produk ?>" data-toggle="modal" class="btn btn-success btn-sm"><i class="fa fa-info"></i></a> |
                                            <a href="<?= base_url('admin/c_produk/edit_produk/' . $p->id_produk) ?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> </a> |
                                            <a href="#t_stok<?= $p->id_produk ?>" data-toggle="modal" class="btn btn-secondary btn-sm"><i class="fa fa-plus"></i> </a> |
                                            <a href="<?= base_url('admin/c_produk/delete/' . $p->id_produk) ?>" onclick="return confirm('Apakah anda yakin hapus produk ini?')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> </a>
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
<?php foreach ($detail as $d) : ?>
    <div class="modal fade" id="detail<?= $d->id_produk ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Spesifikasi <?= $d->nama_produk ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <img src="<?= base_url('assets/admin/images/produk/' . $p->foto) ?>" width="200">
                    <p><?= $d->deskripsi ?></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<?php foreach ($stok as $s) : ?>
    <div class="modal fade" id="t_stok<?= $d->id_produk ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form action="<?= base_url('admin/c_produk/tambah_stok') ?>" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Stok</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nama Barang</label>
                            <input type="hidden" name="id_produk" value="<?= $s->id_produk ?>">
                            <input type="text" name="nama_produk" class="form-control" value="<?= $s->nama_produk ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label>Stok</label>
                            <input type="text" name="stok" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah</button>
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
            title: 'Produk berhasil disimpan!',
            text: 'Data produk baru ditambahkan',
            showConfirmButton: true,
            // timer: 1500
        })
    <?php elseif ($this->session->flashdata('update')) : ?>
        Swal.fire({
            icon: 'success',
            title: 'Produk berhasil diupdate!',
            text: 'Data produk telah diupdate',
            showConfirmButton: true,
            // timer: 1500
        })
    <?php elseif ($this->session->flashdata('delete')) : ?>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil menghapus produk!',
            text: 'data produk yang anda pilih berhasil dihapus',
            showConfirmButton: true,
            // timer: 1500
        })
        <?php elseif ($this->session->flashdata('tambah_stok')) : ?>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil menambah stok produk!',
            text: 'stok produk berhasil ditambahkan',
            showConfirmButton: true,
            // timer: 1500
        })
    <?php endif ?>
</script>
<?php $this->load->view('admin/partials/js.php'); ?>