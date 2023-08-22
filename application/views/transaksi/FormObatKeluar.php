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
                                    <h3 class="card-title">Data Obat</h3>
                                </div>
                                <div class="col-sm-12 col-md-2">
                                    <button type="button" class="btn btn-primary btn-social pull-right" data-toggle="modal" data-target="#modal-default">Add Obat
                                    </button>
                                    <?php echo anchor('CObatProses/form_truncate/', '<div class="btn btn-danger btn-sm">Clear</div>') ?>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Obat</th>
                                        <th>Jumlah Obat</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php $i = 1;
                                    foreach ($tampung->result_array() as $t) { ?>
                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td><?= $t['name'] ?></td>
                                            <td><?= $t['jml_obat'] ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Obat</th>
                                        <th>Jumlah Obat</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div class="modal-header mb-2"></div>
                        <div class="card-header">
                            <div class="row">
                                <div class="col-sm-12 col-md-6">
                                    <h3 class="card-title">Data Pasien</h3>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="<?= base_url('CObatProses/keluar_post'); ?>" class="form-horizontal" id="detail_obat" method="post">
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label>
                                        <div class="col-sm-10">
                                            <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?php echo date('Y-m-d') ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="user_id" class="col-sm-2 col-form-label">User</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="user_id" name="user_id" value="<?php echo $id['id'] ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="pasien_id" class="col-sm-2 col-form-label">Pasien</label>
                                        <div class="col-sm-10">
                                            <select name="pasien_id" id="pasien_id" class="form-control">
                                                <option value="">Pilih Pasien</option>
                                                <?php foreach ($detail_pasien->result_array() as $val) { ?>
                                                    <option value="<?php echo $val['pasien_id'] ?>"><?php echo $val['first_name'] ?> <?php echo $val['last_name'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="ket" class="col-sm-2 col-form-label">Keterangan</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="ket" name="ket" placeholder="Keterangan">
                                        </div>
                                    </div>

                                    <button class="btn btn-primary" type="submit">Tambah</button>

                                </div>
                                <!-- /.card-body -->
                                <!-- /.card-footer -->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>



<!-- Modal Input-->
<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Form Obat</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo base_url('CObatProses/tampung') ?>" method="POST" id="formItem">
                <div class="modal-body">

                    <div class="form-group row">
                        <label for="horizontal-text-input" class="col-sm-3 col-form-label">Nama Obat</label>
                        <div class="col-sm-9">
                            <select name="obat_id" id="obat_id" class="form-control">
                                <option value="">Pilih Obat</option>
                                <?php foreach ($detail->result_array() as $val) { ?>
                                    <option value="<?php echo $val['obat_id'] ?>">[<?php echo $val['name'] ?>]</option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="jml_obat" class="col-sm-3 col-form-label">Jumlah Obat</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" name="jml_obat" id="jml_obat" placeholder="Jumlah Obat">
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="Simpan" name="Simpan" form="formItem" value="Simpan">Simpan</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>