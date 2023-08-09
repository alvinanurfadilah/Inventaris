<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><?= $title ?></h1>

                    <br>
                    <div class="row">
                        <div class="col lg">
                            <?= $this->session->flashdata('message'); ?>
                            <form action="<?= base_url('CMember/changePassword') ?>" method="post">
                                <div class="form-group row">
                                    <label for="currentPassword" class="col-sm-4 col-form-label">Current Password</label>
                                    <div class="col-sm-8">
                                        <input type="password" class="form-control" id="currentPassword" name="currentPassword">
                                        <?= form_error('currentPassword', '<small class="text-danger" pl-3>', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="newPassword1" class="col-sm-4 col-form-label">New Password</label>
                                    <div class="col-sm-8">
                                        <input type="password" class="form-control" id="newPassword1" name="newPassword1">
                                        <?= form_error('newPassword1', '<small class="text-danger" pl-3>', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="newPassword2" class="col-sm-4 col-form-label">Repeat Password</label>
                                    <div class="col-sm-8">
                                        <input type="password" class="form-control" id="newPassword2" name="newPassword2">
                                        <?= form_error('newPassword2', '<small class="text-danger" pl-3>', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Change Password</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- /.content -->
</div>