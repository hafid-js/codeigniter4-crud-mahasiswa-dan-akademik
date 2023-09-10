<!-- Main Content -->
<?= $this->extend('layout/default') ?>
<?= $this->section('title') ?>
<title>Update Mahasiswa &mdash; CRUD Mahasiswa</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<section class="section">

<form class="user">
                        <input type="hidden" name="page" value="<?= $page; ?>" />
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input name="title"
                                    type="text"
                                    class="form-control form-control-user"
                                    placeholder="Nama User" value="<?= $create_by; ?>"/>
                            </div>
                            <div class="col-sm-6">
                                <input name="create_date"
                                    type="date"
                                    class="form-control form-control-user"
                                    placeholder="Tanggal" value="<?= $create_date; ?>"/>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-sm-6">
                                    <button type="submit" class="btn btn-success">Cari</button>
                                </div>
                            </div>
                            <?= $pager->makeLinks($page, $per_page, $count_all, 'bootstrap-bullet_pagination') ?>
                        </div>
                    </form>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Daftar Aktivitas</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nama Tabel</th>
                                            <th>Deskripsi</th>
                                            <th>Nama User</th>
                                            <th>Tanggal</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nama Tabel</th>
                                            <th>Deskripsi</th>
                                            <th>Nama User</th>
                                            <th>Tanggal</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php foreach($log_activities as $row): ?>
                                        <tr>
                                            <td><?= $row->id; ?></td>
                                            <td><?= $row->tables_name; ?></td>
                                            <td><?= $row->description; ?></td>
                                            <td><?= $row->create_by; ?></td>                                            
                                            <td><?= $row->create_date; ?></td>                                            
                                        </tr>
                                        <?php endforeach; ?>                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    </section>
<?= $this->endSection() ?>  


