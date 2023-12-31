<?= $this->extend('layout/default') ?>
<?= $this->section('title') ?>
<title>Data Pegawai Akademik &mdash; CRUD Mahasiswa</title>
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
                    List Pegawai Akademik
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
                            * Kata kunci berdasarkan nip, dan nama
                        </small>
                    </form>
                </div>
                <div class="card-header">
                    <a href="<?= site_url('akademik/new') ?>" class="btn btn-primary">Tambah Data</a>
                </div>
                <div class="card-body table-responsive">
                    <table class="card-body table table-striped table-md" id="table-1">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>NIP</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Jabatan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $page = isset($_GET['page']) ? $_GET['page'] : 1;
                            $no = 1 + (10 * ($page - 1));
                            foreach ($akademik as $key => $value) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $value->nip ?></td>
                                    <td><?= $value->nama ?></td>
                                    <td><?= $value->email_akademik ?></td>
                                    <td>Akademik</td>

                                    <?php if (session()->get('id_user') == $value->nip) { ?>
                                        <td>
                                            <button type="button" class="btn btn-info" data-container="body" data-toggle="popover" data-placement="top" data-content="Anda Login menggunakan akun ini, anda tidak bisa melakukan aksi.">
                                                <i class="fas fa-info"></i>
                                                info
                                            </button>
                                        </td>
                                    <?php } else { ?>
                                        <td class="text-center" style="width: 15%;">
                                            <a href="<?= site_url('akademik/' . $value->id_akademik . '/edit') ?>" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>
                                            <form action="<?= site_url('akademik/delete_akademik/' . $value->id_akademik) ?>" class="d-inline" method="post" id="del-<?= $value->id_akademik ?>">
                                                <?= csrf_field(); ?>
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="hidden" name="nip" value="<?= $value->nip ?>">
                                                <button href="" class="btn btn-danger btn-sm" data-confirm="Hapus Data?|Apakah Anda Yakin?" data-confirm-yes="submitDel(<?= $value->id_akademik ?>)"><i class="fas fa-trash"></i></button>
                                            </form>
                                        </td>

                                    <?php } ?>

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