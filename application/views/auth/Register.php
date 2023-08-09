<div class="register-box">
    <div class="register-logo">
        <a href="../../index2.html"><b>Register</b></a>
    </div>

    <div class="card">
        <div class="card-body register-card-body">
            <p class="login-box-msg">Register a new membership</p>

            <form class="user" action="<?= base_url('Auth/register') ?>" method="post">

                <div class="form-group">
                    <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name" value="<?= set_value('first_name') ?>">
                    <?= form_error('first_name', '<small class="text-danger" pl-3>', '</small>'); ?>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name" value="<?= set_value('last_name') ?>">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="<?= set_value('email') ?>">
                    <?= form_error('email', '<small class="text-danger" pl-3>', '</small>'); ?>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" id="password1" name="password1" placeholder="Password">
                    <?= form_error('password1', '<small class="text-danger" pl-3>', '</small>'); ?>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" id="password2" name="password2" placeholder="Retype password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="social-auth-links text-center mb-3">
                    <!-- /.col -->
                    <button type="submit" class="btn btn-primary btn-block">Register</button>
                    <!-- /.col -->
                </div>
            </form>
            <hr>
            <div class="text-center">
                <a href="<?= base_url('Auth'); ?>" class="text-center">I already have a membership</a>
            </div>
        </div>
        <!-- /.form-box -->
    </div><!-- /.card -->
</div>
<!-- /.register-box -->