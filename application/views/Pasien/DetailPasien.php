<!-- DataTables -->
<link rel="stylesheet" href="<?= base_url('') ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?= base_url('') ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="<?= base_url('') ?>assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><?= $title ?></h1>
                    <?= form_error('obat', '<div class="alert alert-danger" role="alert">',  '</div>') ?>

                    <?= $this->session->flashdata('message'); ?>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-sm-12 col-md-6">
                                    <h3 class="card-title">Data Pasien</h3>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                            <?php $i = 1;
                            foreach ($data->result_array() as $val) : ?>
                                <form class="form-horizontal" id="detail_obat">
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <label for="first_name" class="col-sm-2 col-form-label">Nama Depan</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="first_name" name="first_name" value="<?= $val['first_name'] ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="last_name" class="col-sm-2 col-form-label">Nama Belakang</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="last_name" name="last_name" value="<?= $val['last_name'] ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="gender" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="gender" name="gender" value="<?= $val['gender'] ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="birth_date" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="birth_date" name="birth_date" value="<?= $val['birth_date'] ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="phone" class="col-sm-2 col-form-label">No. HP</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="phone" name="phone" value="<?= $val['phone'] ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="address" class="col-sm-2 col-form-label">Alamat</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="address" name="address" value="<?= $val['address'] ?>" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                    <!-- /.card-footer -->
                                </form>
                            <?php endforeach ?>
                        </div>
                        <div class="modal-header mb-3"></div>
                        <div class="card-header">
                            <div class="row">
                                <div class="col-sm-12 col-md-6">
                                    <h3 class="card-title">Data Detail Obat</h3>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                </div>
                            </div>
                        </div>
                        <div class="card-body">

                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal Berobat</th>
                                        <th>Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                    foreach ($detail->result_array() as $val) { ?>
                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td><?= $val['tanggal_berobat'] ?></td>
                                            <td><?= $val['ket'] ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal Berobat</th>
                                        <th>Ket</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>