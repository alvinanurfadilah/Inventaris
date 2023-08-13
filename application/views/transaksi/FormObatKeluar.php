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


                            <form class="form-horizontal" id="detail_obat">
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label>
                                        <div class="col-sm-10">
                                            <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?php echo date('Y-m-d') ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="user" class="col-sm-2 col-form-label">User</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="user" name="user" value="<?php echo $id['id'] ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="pasien_id" class="col-sm-2 col-form-label">Pasien</label>
                                        <div class="col-sm-10">
                                            <select name="pasien_id" id="pasien_id" class="form-control">
                                                <option value="">Pilih Pasien</option>
                                                <?php foreach ($pasien->result_array() as $val) { ?>
                                                    <option value="<?php echo $val['id'] ?>"><?php echo $val['first_name'] . $val['last_name'] ?></option>
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
                                </div>
                                <!-- /.card-body -->
                                <!-- /.card-footer -->
                            </form>
                        </div>
                        <div class="modal-header mb-3"></div>
                        <div class="card-header">
                            <div class="row">
                                <div class="col-sm-12 col-md-6">
                                    <h3 class="card-title">Data Obat</h3>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <button type="button" class="btn btn-primary btn-social pull-right" data-toggle="modal" data-target="#modal-default">Add Obat
                                    </button>
                                </div>
                            </div>
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
                                    <form action="<?php echo base_url('CObatProses/keluar_post') ?>" method="POST" id="formItem">
                                        <div class="modal-body">

                                            <div class="form-group row">
                                                <label for="horizontal-text-input" class="col-sm-3 col-form-label">Kode Obat</label>
                                                <div class="col-sm-9">
                                                    <select name="obat_id" id="obat_id" class="form-control">
                                                        <option value="">Pilih Obat</option>
                                                        <?php foreach ($obat->result_array() as $val) { ?>
                                                            <option value="<?php echo $val['id'] ?>"><?php echo $val['name'] ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="total" class="col-sm-3 col-form-label">Qty</label>
                                                <div class="col-sm-9">
                                                    <input type="number" class="form-control" name="total" id="total" placeholder="Qty">
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
                        <div class="card-body">

                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Obat</th>
                                        <th>Qty</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $berkas = "assets/data/data.json";
                                    $dataObat = array();

                                    $dataJson = file_get_contents($berkas);
                                    $dataObat = json_decode($dataJson, true);

                                    if (@($_POST['Simpan'])) {
                                        $item = array();
                                        array_push($item);

                                        $dataBaru = [
                                            'name' => $_POST['name'],
                                            'total' => $_POST['total']
                                        ];

                                        array_push($dataObat, $dataBaru);

                                        $dataJson = json_encode($dataObat, JSON_PRETTY_PRINT);
                                        file_put_contents($berkas, $dataJson);
                                    }
                                    ?>
                                    <?php for ($i = 0; $i < count($dataObat); $i++) {
                                        $obat_id = $dataObat[$i]['obat_id'];
                                        $total = $dataObat[$i]['total'];
                                    ?>
                                        <tr>
                                            <td><?= $i ?></td>
                                            <td><?= $obat_id ?></td>
                                            <td><?= $total ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Obat</th>
                                        <th>Qty</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>


                        <div class="modal-header mb-3"></div>
                        <div class="card-header">
                            <button type="button" class="btn btn-primary btn-social pull-right" data-toggle="modal" data-target="#modal-default">Tambah
                            </button>
                        </div>


                    </div>
                </div>
            </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>