<?= $this->extend('layout/default') ?>
<?= $this->section('title') ?>
<title>Update Mahasiswa &mdash; CRUD Mahasiswa</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="<?= site_url('mahasiswa') ?>" class="btn"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Update Mahasiswa</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>
                    Edit Mahasiswa
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
                <form action="<?= site_url('mahasiswa/' . $mahasiswa->id_mahasiswa) ?>" method="post" autocomplete="off">
                    <?= csrf_field() ?>
                    <input type="hidden" name="_method" value="PATCH">
                    <div class="form-group">
                        <label for="">NIM *</label>
                        <input type="text" name="nim" value="<?= old('nim', $mahasiswa->nim) ?>" class="form-control <?= isset($errors['nim']) ? 'is-invalid' : null ?>" readonly>
                        <div class="invalid-feedback">
                            <?= isset($errors['nim']) ? $errors['nim'] : null ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Nama *</label>
                        <input type="text" name="nama" value="<?= old('nama', $mahasiswa->nama) ?>" class="form-control <?= isset($errors['nama']) ? 'is-invalid' : null ?>">
                        <div class="invalid-feedback">
                            <?= isset($errors['nama']) ? $errors['nama'] : null ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Email *</label>
                        <input type="text" name="email_mahasiswa" value="<?= old('email_mahasiswa', $mahasiswa->email_mahasiswa) ?>" class="form-control <?= isset($errors['email_mahasiswa']) ? 'is-invalid' : null ?>">
                        <div class="invalid-feedback">
                            <?= isset($errors['email_mahasiswa']) ? $errors['email_mahasiswa'] : null ?>
                        </div>
                        <div class="form-group mt-4 mb-1">
                            <label for="">Jenis Kelamin *</label>
                            <?php if ($mahasiswa->jenis_kelamin == 'Laki-Laki') {
                            ?>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="jenis_kelamin" name="jenis_kelamin" value="Laki-Laki" class="custom-control-input" checked>
                                    <label class="custom-control-label" for="jenis_kelamin">Laki-Laki</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="customRadioInline2" name="jenis_kelamin" value="Perempuan" class="custom-control-input">
                                    <label class="custom-control-label" for="customRadioInline2">Perempuan</label>
                                </div>
                            <?php } else { ?>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="jenis_kelamin" name="jenis_kelamin" value="Laki-Laki" class="custom-control-input">
                                    <label class="custom-control-label" for="jenis_kelamin">Laki-Laki</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="customRadioInline2" name="jenis_kelamin" value="Perempuan" class="custom-control-input" checked>
                                    <label class="custom-control-label" for="customRadioInline2">Perempuan</label>
                                </div>
                            <?php } ?>
                        <div class="invalid-feedback">
                            <?= isset($errors['jenis_kelamin']) ? $errors['jenis_kelamin'] : null ?>
                        </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Alamat</label>
                        <textarea name="alamat" value="<?= old('alamat', $mahasiswa->alamat) ?>" rows="4" cols="50" class="form-control"><?= $mahasiswa->alamat ?></textarea>
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