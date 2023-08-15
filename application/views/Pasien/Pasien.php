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
                                        <th>Nama Depan</th>
                                        <th>Nama Belakang</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Tanggal Lahir</th>
                                        <th>No. HP</th>
                                        <th>Alamat</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                    foreach ($data->result_array() as $val) : ?>
                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td><?= $val['first_name'] ?></td>
                                            <td><?= $val['last_name'] ?></td>
                                            <td><?= $val['gender'] ?></td>
                                            <td><?= $val['birth_date'] ?></td>
                                            <td><?= $val['phone'] ?></td>
                                            <td><?= $val['address'] ?></td>
                                            <td>
                                                <?php echo anchor('CPasien/detail/' . $val['id'], '<div class="btn btn-primary btn-sm">
                                                    <i class="fas fa-info-circle"></i>
                                                </div>') ?>

                                                <div class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-default-update<?= $val['id'] ?>">
                                                    <i class="fas fa-edit"></i>
                                                </div>

                                                <?php echo anchor('CPasien/delete/' . $val['id'], '<div class="btn btn-danger btn-sm">
                                                    <i class="fas fa-trash-alt"></i>
                                                </div>') ?>
                                            </td>
                                        </tr>

                                        <!-- Modal Update -->
                                        <div class="modal fade" id="modal-default-update<?= $val['id'] ?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Form Edit Pasien</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="<?= base_url('CPasien/update'); ?>" method="POST">
                                                        <div class="modal-body">
                                                            <div class="form-group row">
                                                                <label for="first_name" class="col-sm-4 col-form-label">Nama Depan</label>
                                                                <input type="text" class="form-control" name="id" id="id" value="<?= $val['id'] ?>" hidden>
                                                                <div class="col-sm-8">
                                                                    <input type="text" class="form-control" name="first_name" id="first_name" value="<?= $val['first_name'] ?>">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="last_name" class="col-sm-4 col-form-label">Nama Belakang</label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" class="form-control" name="last_name" id="last_name" value="<?= $val['last_name'] ?>">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="gender" class="col-sm-4 col-form-label">Jenis Kelamin</label>
                                                                <div class="col-sm-8">
                                                                    <select name="gender" id="gender" class="form-control">
                                                                        <option value="">Pilih Jenis Kelamin</option>
                                                                        <option value="Laki-Laki">Laki-Laki</option>
                                                                        <option value="Perempuan">Perempuan</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="birth_date" class="col-sm-4 col-form-label">Tanggal Lahir</label>
                                                                <div class="col-sm-8">
                                                                    <input type="date" class="form-control" name="birth_date" id="birth_date" value="<?= $val['birth_date'] ?>">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="phone" class="col-sm-4 col-form-label">No. HP</label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" class="form-control" name="phone" id="phone" value="<?= $val['phone'] ?>">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="address" class="col-sm-4 col-form-label">Alamat</label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" class="form-control" name="address" id="address" value="<?= $val['address'] ?>">
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
                                        <th>Nama Depan</th>
                                        <th>Nama Belakang</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Tanggal Lahir</th>
                                        <th>No. HP</th>
                                        <th>Alamat</th>
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
            <form action="<?= base_url('CPasien/index_post'); ?>" method="POST">
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="first_name" class="col-sm-4 col-form-label">Nama Depan</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="first_name" id="first_name" placeholder="Nama Depan">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="last_name" class="col-sm-4 col-form-label">Nama Belakang</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Nama Belakang">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="gender" class="col-sm-4 col-form-label">Jenis Kelamin</label>
                        <div class="col-sm-8">
                            <select name="gender" id="gender" class="form-control">
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="Laki-Laki">Laki-Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-4 col-form-label">Tanggal Lahir</label>
                        <div class="col-sm-8">
                            <input type="date" class="form-control" name="birth_date" id="birth_date" placeholder="Tanggal Lahir">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-4 col-form-label">No. HP</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="phone" id="phone" placeholder="No. HP">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-4 col-form-label">Alamat</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="address" id="address" placeholder="Alamat">
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