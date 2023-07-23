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
                    <h1 class="m-0">Data Obat</h1>
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
                            <form class="form-horizontal">
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Kode Obat</label>
                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputPassword3" class="col-sm-2 col-form-label">Nama Obat</label>
                                        <div class="col-sm-10">
                                            <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputPassword3" class="col-sm-2 col-form-label">Jenis Obat</label>
                                        <div class="col-sm-10">
                                            <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputPassword3" class="col-sm-2 col-form-label">Satuan Obat</label>
                                        <div class="col-sm-10">
                                            <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputPassword3" class="col-sm-2 col-form-label">Overall Stock</label>
                                        <div class="col-sm-10">
                                            <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
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
                                    <button type="button" class="btn btn-primary btn-social pull-right" data-toggle="modal" data-target="#modal-default">
                                        <i class="fa fa-plus"></i>
                                    </button>
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
                                    <tr>
                                        <td>Trident</td>
                                        <td>Internet
                                            Explorer 4.0
                                        </td>
                                        <td>Win 95+</td>
                                    </tr>
                                    <tr>
                                        <td>Trident</td>
                                        <td>Internet
                                            Explorer 4.0
                                        </td>
                                        <td>Win 95+</td>
                                    </tr>
                                    <tr>
                                        <td>Trident</td>
                                        <td>Internet
                                            Explorer 5.0
                                        </td>
                                        <td>Win 95+</td>
                                    </tr>
                                    <tr>
                                        <td>Trident</td>
                                        <td>Internet
                                            Explorer 5.5
                                        </td>
                                        <td>Win 95+</td>
                                    </tr>
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


<!-- Modal -->
<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Form Jenis</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <label for="horizontal-text-input" class="col-sm-3 col-form-label">Tanggal Expired</label>
                    <div class="col-sm-9">
                        <input type="date" class="form-control" name="jenis" id="jenis" placeholder="">
                    </div>
                </div>
                <div class="row">
                    <label for="horizontal-text-input" class="col-sm-3 col-form-label">Stock</label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" name="jenis" id="jenis" placeholder="Masukkan Stock Obat">
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>