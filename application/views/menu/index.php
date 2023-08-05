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

                            <a type="button" class="btn btn-primary btn-social pull-right mb-3" data-toggle="modal" data-target="#modal-default">Add New Menu
                            </a>

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Menu</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                    foreach ($menu as $m) : ?>
                                        <tr>
                                            <th scope="row"><?= $i++ ?></th>
                                            <td><?= $m['menu'] ?></td>
                                            <td>
                                                <div class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-default-update<?= $m['id'] ?>">
                                                    <i class="fas fa-edit"></i>
                                                </div>

                                                <?php echo anchor('Menu/index_delete/' . $m['id'], '<div class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash-alt"></i>
                                                </div>') ?>
                                            </td>
                                        </tr>

                                        <!-- Modal Update -->
                                        <div class="modal fade" id="modal-default-update<?= $m['id'] ?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Update Menu</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="<?= base_url('Menu/update'); ?>" method="POST">
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <label for="horizontal-text-input" class="col-sm-3 col-form-label">Nama Menu</label>
                                                                <div class="col-sm-9">
                                                                    <input type="hidden" class="form-control" name="id" id="id" value="<?= $m['id'] ?>">
                                                                    <input type="text" class="form-control" name="menu" id="menu" value="<?= $m['menu'] ?>">
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
                <h4 class="modal-title">Add New Menu</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('Menu') ?>" method="POST">
                <div class="modal-body">
                    <div class="row">
                        <label for="horizontal-text-input" class="col-sm-3 col-form-label">Nama Menu</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="menu" id="menu" placeholder="Masukkan Nama Menu">
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