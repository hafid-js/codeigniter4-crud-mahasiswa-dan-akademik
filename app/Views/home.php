<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Home &mdash; CRUD Mahasiswa</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<section class="section">
    <div class="section-header">
        <h1>Dashboard</h1>
    </div>
    <div class="section-body">


    <?php if (session()->get('level') == 1) { ?>
      <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                  <i class="fas fa-users"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Mahasiswa</h4>
                  </div>
                  <div class="card-body">
                  <?= countData('mahasiswa') ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                  <i class="fas fa-list"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Matakuliah</h4>
                  </div>
                  <div class="card-body">
                  <?= countData('matakuliah') ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                  <i class="far fa-file"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>KRS</h4>
                  </div>
                  <div class="card-body">
                  <?= countData('krs') ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                  <i class="fas fa-users"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Admin Akademik</h4>
                  </div>
                  <div class="card-body">
                  <?= countData('akademik') ?>
                  </div>
                </div>
              </div>
            </div>                  
          </div>
<?php } ?>
<?php if (session()->get('level') == 2) { ?>

<?php } ?>

   
    </div>
</section>
<?php $this->endSection() ?>