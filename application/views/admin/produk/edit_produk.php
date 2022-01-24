<?php $this->load->view('admin/partials/head.php'); ?>
<?php $this->load->view('admin/partials/menu.php'); ?>

<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Edit Produk</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="#">Produk</a></li>
                    <li><a href="#">Edit Produk</a></li>
                    <li class="active">Update Produk</li>
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
            <form action="<?= base_url('admin/c_produk/update') ?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="company" class=" form-control-label">Nama Produk</label>
                    <input type="hidden" name="id_produk" value="<?= $edit->id_produk ?>">
                    <input type="text" id="nama_produk" value="<?= $edit->nama_produk ?>" placeholder="Nama produk..." name="nama_produk" class="form-control">
                </div>
                <div class="form-group">
                    <label for="vat" class=" form-control-label">Type</label>
                    <select name="type" class="form-control">
                        <option>-- Pilih --</option>
                        <option <?php if ($edit->type == 'laptop') {
                                    echo 'selected="selected"';
                                } ?> value="laptop">Laptop</option>
                        <option <?php if ($edit->type == 'komputer') {
                                    echo 'selected="selected"';
                                } ?> value="komputer">Komputer</option>
                        <option <?php if ($edit->type == 'akesesoris') {
                                    echo 'selected="selected"';
                                } ?> value="aksesoris">Aksesoris</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="street" class=" form-control-label">Harga</label>
                    <input type="text" id="harga" value="<?= $edit->harga ?>" name="harga" placeholder="Harga..." class="form-control">
                </div>
                <div class="form-group">
                    <label for="country" class=" form-control-label">Deskripsi</label>
                    <input type="hidden" value="<?= $edit->stok ?>" id="stok" name="stok" placeholder="Stok..." class="form-control">
                    <textarea name="deskripsi" name="deskripsi" id="textarea-input" rows="9" placeholder="Deskripsi..." class="form-control"><?= $edit->deskripsi ?></textarea>
                </div>
                <div class="form-group">
                    <label for="street" class=" form-control-label">Foto</label>
                    <div class="custom-file">
                        <input type="file" name="foto" class="custom-file-input" id="exampleInputFile">
                        <input type="hidden" name="old_image" value="<?php echo $edit->foto ?>" />
                        <label class="custom-file-label" for="exampleInputFile"><?= $edit->foto ?></label>
                    </div>
                </div>
                <div class="form-group">
                    <img src="<?php echo base_url('assets/admin/images/produk/' . $edit->foto) ?>" width="100px" />
                </div>
                <div class="form-group">
                    <label for="vat" class=" form-control-label">Pilih Brand</label>
                    <select name="brand" class="form-control">
                        <option>-- Pilih --</option>
                        <?php foreach ($brand as $b) : ?>
                            <option <?php if($edit->brand == $b->id) {
                                echo 'selected="selected"';
                            } ?> value="<?= $b->id ?>"><?= $b->brand ?></option>
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