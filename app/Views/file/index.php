<?= $this->extend('layout/default') ?>
<?= $this->section('title') ?>
<title>Data KRS &mdash; CRUD Mahasiswa</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<section class="section">
    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success alert-dismissible show fade">
            <div class="alert-body">
                <button class="close" data-dismiss="alert">x</button>
                <b>Success !</b>
                <?= session()->getFlashdata('success'); ?>
            </div>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')) : ?>
        <div class="alert alert-danger alert-dismissible show fade">
            <div class="alert-body">
                <button class="close" data-dismiss="alert">x</button>
                <b>Error !</b>
                <?= session()->getFlashdata('error'); ?>
            </div>
        </div>
    <?php endif; ?>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>
                    List KRS
                </h4>
            </div>
            <div class="card">
                <div class="card-header">
                    <form action="" method="get" autocomplete="off">
                        <div class="float-left">
                            <?php $request = \Config\Services::request(); ?>
                            <div class="form-inline">
                                <div class="form-group">
                                    <label for="katakunci">Kata Kunci : </label>
                                    <input type="text" name="keyword" value="<?= $request->getGet('keyword') ?>" class="ml-2 form-control" style="width:155pt;border-radius: 12px 0px 0px 12px;">
                                </div>
                            </div>
                        </div>
                        <div class="float-right">
                            <button type="submit" style="border-radius: 0px 12px 12px 0px;" class="btn btn-primary"><i class="fas fa-search"></i></button>
                            <?php
                            $request = \Config\Services::request();
                            $keyword = $request->getGet('keyword');
                            if ($keyword != '') {
                                $param = "?keyword=" . $keyword;
                            } else {
                                $param = "";
                            }
                            ?>
                        </div>
                        <br>
                        <small class="form-text text-muted" style="font-style:italic;">
                            * Kata kunci nim mahasiswa.
                        </small>
                    </form>
                </div>
                <div class="card-body table-responsive">
                    <table class="card-body table table-striped table-md" id="table-1">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>NIM</th>
                                <th>Nama Mahasiswa</th>
                                <th>File</th>
                                <th>Keterangan</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $page = isset($_GET['page']) ? $_GET['page'] : 1;
                            $no = 1 + (10 * ($page - 1));
                            foreach ($file as $key => $value) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $value->nim ?></td>
                                    <td><?= $value->nama ?></td>
                                    <td><?= $value->file ?></td>
                                    <td><?= $value->keterangan ?></td>
                                    <?php if ($value->status == 0) { ?>
                                        <td><span class="badge badge-warning"><i class="fas fa-clock"></i> Menunggu Persetujuan</span></td>
                                    <?php } else if ($value->status == 1) {  ?>
                                        <td><span class="badge badge-success">Disetujui</span></td>
                                    <?php } else { ?>
                                        <td><span class="badge badge-danger">Ditolak</span></td>
                                    <?php  } ?>
                                    <td>
                                        <div class="dropdown d-inline">
                                            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item has-icon" href="#"><i class="far fa-eye"></i> View</a>

                                                <form action="<?= site_url('file/' . $value->id_file) ?>" class="d-inline" method="post"
                                       >
                                                    <?= csrf_field(); ?>
                                                    <input type="hidden" name="_method" value="PATCH">
                                                    <input type="hidden" name="status" value="1">
                                                    <button type="submit" href="" class="dropdown-item has-icon" onclick="alert('Setujui KRS?, Apakah Anda Yakin?')"><i class="fas fa-check"></i> Setujui</button>
                                                </form>

                                                <form action="<?= site_url('file/' . $value->id_file) ?>" class="d-inline" method="post" autocomplete="off">
                                                    <?= csrf_field() ?>
                                                    <input type="hidden" name="_method" value="PATCH">
                                                    <input type="hidden" name="status" value="2">
                                                    <button type="submit" href="" class="dropdown-item has-icon" onclick="alert('Tolak KRS?, Apakah Anda Yakin?')"><i class="fas fa-times"></i> Tolak</button>
                                                </form>
                                            </div>
                                        </div>

                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <div class="float-left">
                        <i>Showing <?= 1 + (10 * ($page - 1)) ?> to <?= $no - 1 ?> of <?= $pager->getTotal() ?> enteries</i>
                    </div>
                    <div class="float-right">
                        <?= $pager->links('default', 'pagination') ?>
                    </div>
                </div>
            </div>
        </div>
</section>

<!-- <div class="modal fade" tabindex="-1" role="dialog" id="modal-import-contact">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Import Mahasiswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="<?= site_url('mahasiswa/import') ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <div class="modal-body">
                    <div class="custom-file">
                        <input type="file" name="file_excel" class="custom-file-input" id="file_excel" required>
                        <label for="file_excel" class="custom-file-label">Pilih File</label>
                    </div>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div> -->
<?php $this->endSection() ?>