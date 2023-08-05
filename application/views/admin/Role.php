<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><?= $title ?></h1>
                    <br>
                    <?= form_error('menu', '<div class="alert alert-danger" role="alert">',  '</div>') ?>

                    <?= $this->session->flashdata('message'); ?>
                    <div class="row">
                        <div class="col-lg-12">

                            <a type="button" class="btn btn-primary btn-social pull-right mb-3" data-toggle="modal" data-target="#modal-default">Add New Role
                            </a>

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Role</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                    foreach ($role as $r) : ?>
                                        <tr>
                                            <th scope="row"><?= $i++ ?></th>
                                            <td><?= $r['name'] ?></td>
                                            <td>
                                                <a href="<?= base_url('CAdmin/roleAccess/') . $r['id']; ?>" class="badge badge-warning">access</a>
                                                <a href="" class="badge badge-success">edit</a>
                                                <a href="" class="badge badge-danger">delete</a>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- /.content -->
</div>




<!-- Modal Add New Menu -->
<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add New Role</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('CAdmin/role') ?>" method="POST">
                <div class="modal-body">
                    <div class="row">
                        <label for="horizontal-text-input" class="col-sm-3 col-form-label">Nama Role</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="role" id="role" placeholder="Masukkan Nama Role">
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