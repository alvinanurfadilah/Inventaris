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
                    <?php if (validation_errors()) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?= validation_errors() ?>
                        </div>
                    <?php endif ?>

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
                                    <h3 class="card-title">Data Sub Menu Management</h3>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <button type="button" class="btn btn-primary btn-social pull-right" data-toggle="modal" data-target="#modal-default">
                                        Add New Sub Menu
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Sub Menu</th>
                                        <th scope="col">Menu</th>
                                        <th scope="col">Url</th>
                                        <th scope="col">Icon</th>
                                        <th scope="col">Active</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                    foreach ($subMenu as $sm) : ?>
                                        <tr>
                                            <th scope="row"><?= $i++ ?></th>
                                            <td><?= $sm['title'] ?></td>
                                            <td><?= $sm['menu'] ?></td>
                                            <td><?= $sm['url'] ?></td>
                                            <td><?= $sm['icon'] ?></td>
                                            <td><?= $sm['is_active'] ?></td>
                                            <td>
                                                <div class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-default-update<?= $sm['id'] ?>">
                                                    <i class="fas fa-edit"></i>
                                                </div>

                                                <a href="" class="badge badge-danger">delete</a>
                                            </td>
                                        </tr>

                                        <!-- Modal Edit New Sub Menu -->
                                        <div class="modal fade" id="modal-default-update<?= $sm['id'] ?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Update New Sub Menu</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="<?= base_url('Menu/updateSubMenu') ?>" method="POST">
                                                        <div class="modal-body">
                                                            <div class="form-group row">
                                                                <label for="horizontal-text-input" class="col-sm-4 col-form-label">Nama Sub Menu</label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" class="form-control" name="title" id="title" value="<?= $sm['title'] ?>">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="horizontal-text-input" class="col-sm-4 col-form-label">Menu</label>
                                                                <div class="col-sm-8">
                                                                    <select name="menu_id" id="menu_id" class="form-control">
                                                                        <option value="">Select Menu</option>
                                                                        <?php foreach ($menu as $m) : ?>
                                                                            <option value="<?= $m['id'] ?>"><?= $m['menu'] ?></option>
                                                                        <?php endforeach ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="horizontal-text-input" class="col-sm-4 col-form-label">Url</label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" class="form-control" name="url" id="url" value="<?= $sm['url'] ?>">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="horizontal-text-input" class="col-sm-4 col-form-label">Icon</label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" class="form-control" name="icon" id="icon" value="<?= $sm['icon'] ?>">
                                                                </div>
                                                            </div>
                                                            <br>
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
                                        <th scope="col">No</th>
                                        <th scope="col">Sub Menu</th>
                                        <th scope="col">Menu</th>
                                        <th scope="col">Url</th>
                                        <th scope="col">Icon</th>
                                        <th scope="col">Active</th>
                                        <th scope="col">Action</th>
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


<!-- Modal Add New Menu -->
<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add New Sub Menu</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('Menu/subMenu') ?>" method="POST">
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="horizontal-text-input" class="col-sm-4 col-form-label">Nama Sub Menu</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="title" id="title" placeholder="Masukkan Nama Sub Menu">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="horizontal-text-input" class="col-sm-4 col-form-label">Menu</label>
                        <div class="col-sm-8">
                            <select name="menu_id" id="menu_id" class="form-control">
                                <option value="">Select Menu</option>
                                <?php foreach ($menu as $m) : ?>
                                    <option value="<?= $m['id'] ?>"><?= $m['menu'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="horizontal-text-input" class="col-sm-4 col-form-label">Url</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="url" id="url" placeholder="Masukkan Url">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="horizontal-text-input" class="col-sm-4 col-form-label">Icon</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="icon" id="icon" placeholder="Masukkan Icon">
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" value="1" name="is_active" id="is_active" checked>
                            <label class="form-check-laber" for="is_active">Active?</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>