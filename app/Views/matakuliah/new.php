Tambah Data<?= $this->extend('layout/default') ?>
<?= $this->section('title') ?>
<title>Create Matakuliah &mdash; CRUD Mahasiswa</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="<?= site_url('mahasiswa') ?>" class="btn"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Create Matakuliah</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>
                    Buat Data Baru
                </h4>
            </div>

            <div class="card-body">
                <?php if (session()->getFlashdata('error')) : ?>
                    <div class="alert alert-danger alert-dismissible show fade">
                        <div class="alert-body">
                            <button class="close" data-dismiss="alert">x</button>
                            <b>Gagal !</b>
                            <?= session()->getFlashdata('error'); ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
            <div class="card-body col-md-6">
                <?php $errors = session()->getFlashdata('errors'); ?>
                <form action="<?= site_url('matakuliah') ?>" method="post" autocomplete="off">
                    <?= csrf_field() ?>
                    <div class="form-group">
                        <label for="">Kode Matakuliah *</label>
                        <input type="text" name="kode_matakuliah" value="<?= old('kode_matakuliah') ?>" class="form-control <?= isset($errors['kode_matakuliah']) ? 'is-invalid' : null ?>">
                        <div class="invalid-feedback">
                            <?= isset($errors['kode_matakuliah']) ? $errors['kode_matakuliah'] : null ?>
                        </div>
                        </div>
                        <div class="form-group">
                            <label for="">Nama Matakuliah*</label>
                            <input type="text" name="nama_matakuliah" value="<?= old('nama_matakuliah') ?>" class="form-control <?= isset($errors['nama_matakuliah']) ? 'is-invalid' : null ?>">
                            <div class="invalid-feedback">
                                <?= isset($errors['nama_matakuliah']) ? $errors['nama_matakuliah'] : null ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">SKS*</label>
                            <input type="text" name="sks" value="<?= old('sks') ?>" class="form-control col-md-2 <?= isset($errors['sks']) ? 'is-invalid' : null ?>">
                            <div class="invalid-feedback">
                                <?= isset($errors['sks']) ? $errors['sks'] : null ?>
                            </div>
                  
                        </div>
                            <div>
                                <button type="submit" class="btn btn-success"><i class="fas fa-paper-plane"></i> Save</button>
                                <button type="reset" class="btn btn-secondary">Reset</button>
                            </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?php $this->endSection() ?>