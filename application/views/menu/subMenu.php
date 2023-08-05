<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0"><?= $title ?></h1>
                    <br>
                    <?php if (validation_errors()) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?= validation_errors() ?>
                        </div>
                    <?php endif ?>

                    <?= $this->session->flashdata('message'); ?>
                    <div class="row">
                        <div class="col-lg-12">

                            <a type="button" class="btn btn-primary btn-social pull-right mb-3" data-toggle="modal" data-target="#modal-default">Add New Sub Menu
                            </a>

                            <table class="table">
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
                <h4 class="modal-title">Add New Sub Menu</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('Menu/subMenu') ?>" method="POST">
                <div class="modal-body">
                    <div class="row">
                        <label for="horizontal-text-input" class="col-sm-4 col-form-label">Nama Sub Menu</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="title" id="title" placeholder="Masukkan Nama Sub Menu">
                        </div>
                    </div>
                    <div class="row">
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
                    <div class="row">
                        <label for="horizontal-text-input" class="col-sm-4 col-form-label">Url</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="url" id="url" placeholder="Masukkan Url">
                        </div>
                    </div>
                    <div class="row">
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