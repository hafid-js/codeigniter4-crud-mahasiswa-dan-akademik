<?= $this->extend('layout/default') ?>
<?= $this->section('title') ?>
<title>Update Matakuliah &mdash; CRUD Mahasiswa</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="<?= site_url('matakuliah') ?>" class="btn"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Update Matakuliah</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>
                    Edit Matakuliah
                </h4>
            </div>
            <?php if (session()->getFlashdata('error')) : ?>
            <div class="card-body">
                    <div class="alert alert-danger alert-dismissible show fade">
                        <div class="alert-body">
                            <button class="close" data-dismiss="alert">x</button>
                            <b>Gagal !</b>
                            <?= session()->getFlashdata('error'); ?>
                        </div>
                    </div>
            </div>
            <?php endif; ?>
            <div class="card-body col-md-6">
                <?php $errors = session()->getFlashdata('errors'); ?>
                <form action="<?= site_url('matakuliah/' . $matakuliah->id_matakuliah) ?>" method="post" autocomplete="off">
                    <?= csrf_field() ?>
                    <input type="hidden" name="_method" value="PATCH">
                    <div class="form-group">
                        <label for="kode_matakuliah">Kode Matakuliah *</label>
                        <input type="text" name="kode_matakuliah" value="<?= old('kode_matakuliah', $matakuliah->kode_matakuliah) ?>" class="form-control <?= isset($errors['kode_matakuliah']) ? 'is-invalid' : null ?>" readonly>
                        <div class="invalid-feedback">
                            <?= isset($errors['kode_matakuliah']) ? $errors['kode_matakuliah'] : null ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nama_matakuliah">Nama Matakuliah *</label>
                        <input type="text" name="nama_matakuliah" value="<?= old('nama_matakuliah', $matakuliah->nama_matakuliah) ?>" class="form-control <?= isset($errors['nama_matakuliah']) ? 'is-invalid' : null ?>">
                        <div class="invalid-feedback">
                            <?= isset($errors['nama_matakuliah']) ? $errors['nama_matakuliah'] : null ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="sks">SKS *</label>
                        <input type="text" name="sks" value="<?= old('sks', $matakuliah->sks) ?>" class="form-control col-md-2 <?= isset($errors['sks']) ? 'is-invalid' : null ?>">
                        <div class="invalid-feedback">
                            <?= isset($errors['sks']) ? $errors['sks'] : null ?>
                        </div>
                    </div>
                    <div>
                        <div>
                            <button type="submit" class="btn btn-success"><i class="fas fa-paper-plane"></i> Save</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?php $this->endSection() ?>