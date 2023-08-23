<!-- Main Content -->
<?= $this->extend('layout/default') ?>
<?= $this->section('title') ?>
<title>Update Mahasiswa &mdash; CRUD Mahasiswa</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<section class="section">

    <div class="card col-md-7">
        <div class="card-header">
            <h4>Form Input KRS (Kartu Rencana Studi)</h4>
        </div>

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
                    <b>Gagal !</b>
                    <?= session()->getFlashdata('error'); ?>
                </div>
            </div>
        <?php endif; ?>

        <?php $errors = session()->getFlashdata('errors'); ?>
        <form action="<?= site_url('krs') ?>" method="post" autocomplete="off">
            <?= csrf_field() ?>
            <table class="table table-bordered" id="table_field">
                <thead>
                    <tr>
                        <th scope="col">MATA KULIAH</th>
                        <th scope="col">AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <input type="hidden" name="id_mahasiswa[]" value="2">
                            <select class="form-control" name="id_matakuliah[]" required="required">
                                <option value="">- Pilih Mata Kuliah -</option>
                                <?php foreach ($matakuliah as $key => $value) : ?>
                                    <option value="<?= $value->id_matakuliah ?>" <?= old('id_matakuliah') == $value->id_matakuliah ? 'selected' : null ?>><?php echo $value->nama_matakuliah ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="invalid-feedback">
                                <?= isset($errors['id_krs']) ? $errors['id_krs'] : null ?>"
                            </div>
                        </td>
                        <td>
                            <div class="buttons">
                                <input type="button" class="btn btn-icon btn-primary" name="add" id="add" value="Tambah">
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="card-footer">
                <button type="submit" id="add_btn" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>



    <div class="section-body">
        <div class="invoice">
            <div class="invoice-print">
                <div class="row justify-content-center">
                    <div class="invoice-title">
                        <h4 style="font-family:'Times New Roman', Times, serif;">KARTU RENCANA STUDI</h4>
                    </div>
                    <div class="col-lg-12">
                        <hr>

                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group row">
                                    <label class="col-sm-3">NIM</label>
                                    <div class="col-sm-9">
                                        <label for="">: 18560003</label>
                                    </div>
                                    <label class="col-sm-3">NAMA </label>
                                    <div class="col-sm-9">
                                        <label for="">: Desya</label>
                                    </div>
                                    <label class="col-sm-3">PROGRAM STUDI </label>
                                    <div class="col-sm-9">
                                        <label for="">: S1 Sistem Informasi</label>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <div class="card">
                            <table class="table table-bordered">
                                <thead>

                                    <tr>
                                        <th scope="col">KODE MK</th>
                                        <th scope="col">MATA KULIAH</th>
                                        <th scope="col">SKS</th>
                                        <th scope="col">AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($matakuliah as $key => $value) : ?>
                                    <tr>
                                        <td><?= $value->kode_matakuliah ?></td>
                                        <td><?= $value->nama_matakuliah ?> </td>
                                        <td>2</td>
                                        <td>
                                            <div class="buttons">
                                                <a href="http://localhost/testcodingkhafid/krs/hapus_data/78" onclick="return confirm('Yakin hapus data?')" class="btn btn-icon btn-danger"><i class="fas fa-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <form action="http://localhost/testcodingkhafid/printtopdf/print" method="POST" class="text-md-left">
                <input type="hidden" name="id_user" value="3">
                <input type="hidden" name="id_user" value="3">
                <input type="hidden" name="id_user" value="3">
                <input type="hidden" name="id_user" value="3">
                <input type="hidden" name="id_user" value="3">
                <input type="hidden" name="id_user" value="3">
                <input type="hidden" name="id_user" value="3">
                <input type="hidden" name="id_user" value="3">
                <input type="hidden" name="id_user" value="3">
                <input type="hidden" name="id_user" value="3">
                <input type="hidden" name="id_user" value="3">
                <input type="hidden" name="id_user" value="3">
                <input type="hidden" name="id_user" value="3">
                <input type="hidden" name="id_user" value="3">
                <button type="submit" class="btn btn-warning btn-icon icon-left"><i class="fas fa-print"></i> Print</button>
            </form>

        </div>

    </div>
    </div>
    </div>
</section>


<script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
<script type="text/javascript">
    $(document).ready(function() {
        var html = `
		<tr class="append_item">


								<td>
							
								<input type="hidden" name="id_mahasiswa[]" value="2">

								<select class="form-control" required="required" name="id_matakuliah[]">
								<option value="">- Pilih Mata Kuliah -</option>
								  <?php foreach ($matakuliah as $key => $value) : ?>
								<option value="<?php echo $value->id_matakuliah ?>"><?php echo $value->nama_matakuliah ?></option>
								<?php endforeach; ?>
				
							</select>
					
								</td>
								<td>
									<div class="buttons">
									<input type="button" class="btn btn-icon btn-danger" name="remove" id="remove" value="Hapus">
									</div>
				
								</td>
					
							
							</tr>
				
							`;

        var max = 5;
        var x = 1;

        $("#add").click(function() {
            if (x <= max) {
                $("#table_field").append(html);
                x++;
            }
        });
        $("#table_field").on('click', '#remove', function() {
            $(this).closest('tr').remove();
            x--;
        });



        $("#add_form").submit(function(e) {

                e.preventDefault();
                $("#add_btn").val('Adding...');
                $.ajax({
                    url: '<?php echo base_url() ?>krs/create',
                    method: 'post',
                    data: $(this).serialize(),
                    success: function(response) {

                        $("#add_btn").val('Add');
                        $("#add_form")[0].reset();
                        $(".append_item").remove();

                        $("#show_alert").html(`<div class="alert alert-success role="alert">${response}</div>`);
                        setTimeout(function() {
                            window.location.reload();
                        }, 1000);
                        // window.location.reload();


                    },
                })
            },

        )
    });
</script>

<?php $this->endSection() ?>