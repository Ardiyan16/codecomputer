<?php $this->load->view('admin/partials/head.php'); ?>
<?php $this->load->view('admin/partials/menu.php'); ?>

<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Tambah Produk</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="#">Produk</a></li>
                    <li><a href="#">Tambah Produk</a></li>
                    <li class="active">Simpan Produk</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="col mt-4">
    <div class="card">
        <div class="card-header">
            <a href="<?= base_url('admin/c_produk') ?>" class="btn btn-success"><i class="fa fa-arrow-left"></i> Kembali</a>
        </div>
        <div class="card-body card-block">
            <form action="<?= base_url('admin/c_produk/save') ?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="company" class=" form-control-label">Nama Produk</label>
                    <input type="text" id="nama_produk" placeholder="Nama produk..." name="nama_produk" class="form-control">
                </div>
                <div class="form-group">
                    <label for="vat" class=" form-control-label">Type</label>
                    <select name="type" class="form-control">
                        <option>-- Pilih --</option>
                        <option value="laptop">Laptop</option>
                        <option value="komputer">Komputer</option>
                        <option value="aksesoris">Aksesoris</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="street" class=" form-control-label">Harga</label>
                    <input type="text" id="harga" name="harga" placeholder="Harga..." class="form-control">
                </div>
                <div class="form-group">
                    <label for="country" class=" form-control-label">Deskripsi</label>
                    <textarea name="deskripsi" name="deskripsi" id="textarea-input" rows="9" placeholder="Deskripsi..." class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label for="street" class=" form-control-label">Stok</label>
                    <input type="number" id="stok" name="stok" placeholder="Stok..." class="form-control">
                </div>
                <div class="form-group">
                    <label for="street" class=" form-control-label">Foto</label>
                    <div class="custom-file">
                        <input type="file" name="foto" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Pilih File</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="vat" class=" form-control-label">Pilih Brand</label>
                    <select name="brand" class="form-control">
                        <option>-- Pilih --</option>
                        <?php foreach ($brand as $b) : ?>
                            <option value="<?= $b->id ?>"><?= $b->brand ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <hr>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php $this->load->view('admin/partials/js.php'); ?>