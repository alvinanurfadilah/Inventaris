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
                    <h1 class="m-0">Data Detail Obat</h1>
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

                            <?php foreach ($data->result_array() as $val) : ?>
                                <form class="form-horizontal" id="detail_obat">
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <label for="kode" class="col-sm-2 col-form-label">Kode Obat</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="kode" name="kode" value="<?= $val['kode_obat'] ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="obat" class="col-sm-2 col-form-label">Nama Obat</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="obat" name="obat" value="<?= $val['name'] ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="jenis" class="col-sm-2 col-form-label">Jenis Obat</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="jenis" name="jenis" value="<?= $val['jenis_id'] ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="satuan" class="col-sm-2 col-form-label">Satuan Obat</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="satuan" name="satuan" value="<?= $val['satuan_id'] ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="overall_stock" class="col-sm-2 col-form-label">Overall Stock</label>
                                            <div class="col-sm-10">
                                                <input type="number" class="form-control" id="overall_stock" name="oversll_stock" value="<?= $val['overall_stock'] ?>" disabled>
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
                                        <th>Tanggal Expired</th>
                                        <th>Stock</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 0;
                                    foreach ($data->result_array() as $val) { ?>
                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td><?= $val['expired'] ?></td>
                                            <td><?= $val['stock'] ?></td>
                                        </tr>
                                    <?php } ?>
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