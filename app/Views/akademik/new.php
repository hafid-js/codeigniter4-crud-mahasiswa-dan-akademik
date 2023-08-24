<?= $this->extend('layout/default') ?>
<?= $this->section('title') ?>
<title>Add Pegawai &mdash; CRUD akademik</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<section class="section">

    <div class="section-body">
        <div class="card">
            <div class="card-header">
            <a href="<?= site_url('akademik') ?>" class="btn"><i class="fas fa-arrow-left"></i></a>
                <h4>
                    Buat Data Baru
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
                <form action="<?= site_url('akademik') ?>" method="post" autocomplete="off">
                    <?= csrf_field() ?>
                    <div class="form-group">
                        <label for="">NIP (Nomor Induk Pegawai) *</label>
                        <input type="text" name="nip" value="<?= old('nip') ?>" class="form-control <?= isset($errors['nip']) ? 'is-invalid' : null ?>">
                        <div class="invalid-feedback">
                            <?= isset($errors['nip']) ? $errors['nip'] : null ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="">Nama *</label>
                        <input type="text" name="nama" value="<?= old('nama') ?>" class="form-control <?= isset($errors['nama']) ? 'is-invalid' : null ?>">
                        <div class="invalid-feedback">
                            <?= isset($errors['nama']) ? $errors['nama'] : null ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="">Email *</label>
                        <input type="text" name="email_akademik" value="<?= old('email_akademik') ?>" class="form-control <?= isset($errors['email_akademik']) ? 'is-invalid' : null ?>">
                        <div class="invalid-feedback">
                            <?= isset($errors['email_akademik']) ? $errors['email_akademik'] : null ?>
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