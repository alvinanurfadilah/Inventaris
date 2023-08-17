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
                    <?= form_error('jenis', '<div class="alert alert-danger" role="alert">',  '</div>') ?>

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
                                    <h3 class="card-title">Data User</h3>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Is Active</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                    foreach ($data as $val) : ?>
                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td><?= $val['first_name'] ?></td>
                                            <td><?= $val['last_name'] ?></td>
                                            <td><?= $val['email'] ?></td>
                                            <td><?= $val['role'] ?></td>
                                            <td><?= $val['is_active'] ?></td>
                                            <td>
                                                <div class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-default-update<?= $val['id'] ?>">
                                                    <i class="fas fa-edit"></i>
                                                </div>
                                            </td>
                                        </tr>

                                        <!-- Modal Update -->
                                        <div class="modal fade" id="modal-default-update<?= $val['id'] ?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Update User</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="<?= base_url('CUser/update'); ?>" method="POST">
                                                        <div class="modal-body">
                                                            <input type="text" class="form-control" name="id" id="id" value="<?= $val['id'] ?>" hidden>
                                                            <div class="form-group row">
                                                                <label for="horizontal-text-input" class="col-sm-3 col-form-label">First Name</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" class="form-control" name="first_name" id="first_name" value="<?= $val['first_name'] ?>" readonly>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="horizontal-text-input" class="col-sm-3 col-form-label">Last Name</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" class="form-control" name="last_name" id="last_name" value="<?= $val['last_name'] ?>" readonly>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="horizontal-text-input" class="col-sm-3 col-form-label">Email</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" class="form-control" name="email" id="email" value="<?= $val['email'] ?>" readonly>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="horizontal-text-input" class="col-sm-3 col-form-label">Role</label>
                                                                <div class="col-sm-9">
                                                                    <select name="role_id" id="role_id" class="form-control">
                                                                        <?php foreach ($role as $r) : ?>
                                                                            <option value="<?= $r['id'] ?>" <?= $val['role_id'] == $r['id'] ? 'selected' : null ?>><?= $r['role'] ?></option>
                                                                        <?php endforeach ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="form-check">
                                                                    <input type="checkbox" class="form-check-input" value="1" name="is_active" id="is_active" checked>
                                                                    <label class="form-check-laber" for="is_active">Active?</label>
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
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Is Active</th>
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