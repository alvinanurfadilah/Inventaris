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
                                    <h3 class="card-title">Daftar Pasien</h3>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <button type="button" class="btn btn-primary btn-social pull-right" data-toggle="modal" data-target="#modal-default">
                                        Add Pasien
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal</th>
                                        <th>User</th>
                                        <th>Pasien</th>
                                        <th>Keterangan</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                    foreach ($data->result_array() as $val) : ?>
                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td><?= $val['tanggal_berobat'] ?></td>
                                            <td><?= $val['user_id'] ?></td>
                                            <td><?= $val['first_name'] . $val['last_name'] ?></td>
                                            <td><?= $val['ket'] ?></td>
                                            <td>
                                                <div class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-default-update<?= $val['id'] ?>">
                                                    <i class="fas fa-edit"></i>
                                                </div>

                                                <?php echo anchor('CPasien/daftar_delete/' . $val['id'], '<div class="btn btn-danger btn-sm">
                                                    <i class="fas fa-trash-alt"></i>
                                                </div>') ?>
                                            </td>
                                        </tr>

                                        <!-- Modal Update -->
                                        <div class="modal fade" id="modal-default-update<?= $val['id'] ?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Form Pasien</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="<?= base_url('CPasien/daftar_update'); ?>" method="POST">
                                                        <div class="modal-body">
                                                            <div class="form-group row">
                                                                <label for="tanggal_berobat" class="col-sm-4 col-form-label">Tanggal</label>
                                                                <div class="col-sm-8">
                                                                    <input type="date" class="form-control" name="tanggal_berobat" id="tanggal_berobat" value="<?php echo date('Y-m-d') ?>" readonly>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="user_id" class="col-sm-4 col-form-label">User</label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" class="form-control" name="user_id" id="user_id" value="<?php echo $id['id'] ?>" readonly>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="pasien_id" class="col-sm-4 col-form-label">Pasien</label>
                                                                <div class="col-sm-8">
                                                                    <select name="pasien_id" id="pasien_id" class="form-control">
                                                                        <option value="">Pilih Pasien</option>
                                                                        <?php foreach ($pasien->result_array() as $p) { ?>
                                                                            <option value="<?php echo $p['id'] ?>"><?php echo $p['first_name'] .  $p['last_name'] ?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="ket" class="col-sm-4 col-form-label">Keterangan</label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" class="form-control" name="ket" id="ket" value="<?php echo $val['ket'] ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer justify-content-between">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Update</button>
                                                        </div>
                                                    </form>
                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                        </div>

                                    <?php endforeach ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal</th>
                                        <th>User</th>
                                        <th>Pasien</th>
                                        <th>Keterangan</th>
                                        <th>Action</th>
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


<!-- Modal Input -->
<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Form Pasien</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('CPasien/daftar_post'); ?>" method="POST">
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="tanggal_berobat" class="col-sm-4 col-form-label">Tanggal</label>
                        <div class="col-sm-8">
                            <input type="date" class="form-control" name="tanggal_berobat" id="tanggal_berobat" value="<?php echo date('Y-m-d') ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="user_id" class="col-sm-4 col-form-label">User</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="user_id" id="user_id" value="<?php echo $id['id'] ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="pasien_id" class="col-sm-4 col-form-label">Pasien</label>
                        <div class="col-sm-8">
                            <select name="pasien_id" id="pasien_id" class="form-control">
                                <option value="">Pilih Pasien</option>
                                <?php foreach ($pasien->result_array() as $p) { ?>
                                    <option value="<?php echo $p['id'] ?>"><?php echo $p['first_name'] .  $p['last_name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="ket" class="col-sm-4 col-form-label">Keterangan</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="ket" id="ket" placeholder="Keterangan">
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>