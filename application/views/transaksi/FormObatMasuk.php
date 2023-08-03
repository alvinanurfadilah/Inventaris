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
                    <h1 class="m-0">Obat Masuk</h1>
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
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form class="form-horizontal" id="detail_obat" method="GET">
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="kode" class="col-sm-2 col-form-label">Kode Obat</label>
                                        <div class="col-sm-8">
                                            <input type="search" class="form-control" id="kode" name="kode" value="" placeholder="Masukkan Kode Obat">
                                        </div>
                                        <div class="col-sm-2">
                                            <a href="<?php base_url('CObatProses/kodeObat_get') ?>" class="btn btn-primary btn-social pull-right" data-toggle="form" data-target="#form" id="input" type="submit"> Cari
                                            </a>
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="form-group row">
                                        <label for="obat" class="col-sm-2 col-form-label">Nama Obat</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="obat" name="obat" value="" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="jenis" class="col-sm-2 col-form-label">Jenis Obat</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="jenis" name="jenis" value="" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="satuan" class="col-sm-2 col-form-label">Satuan Obat</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="satuan" name="satuan" value="" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="overall_stock" class="col-sm-2 col-form-label">Overall Stock</label>
                                        <div class="col-sm-10">
                                            <input type="number" class="form-control" id="overall_stock" name="oversll_stock" value="" disabled>
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
                                    <h3 class="card-title">Data Detail Obat</h3>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <a href="" class="btn btn-primary btn-social pull-right" data-toggle="modal" data-target="#modal-default" id="input">
                                        <i class="fa fa-plus"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal Expired</th>
                                        <th>Stock</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($detail_obat_proses->result_array() as $val) : ?>
                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td><?= $val['expired'] ?></td>
                                            <td><?= $val['stock'] ?></td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal Expired</th>
                                        <th>Stok</th>
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
                <h4 class="modal-title">Form Obat Masuk</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('CObatProses/index_post'); ?>" method="POST">
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="horizontal-text-input" class="col-sm-3 col-form-label">Expired</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control" name="expired" id="expired" placeholder="">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="horizontal-text-input" class="col-sm-3 col-form-label">Stok</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" name="stock" id="stock" placeholder="Stok">
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