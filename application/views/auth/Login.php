<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>Login</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">

    <?= $this->session->flashdata('message'); ?>

      <p class="login-box-msg">Sign in to start your session</p>

      <form class="user" action="<?= base_url('Auth/index') ?>" method="post">
        <div class="form-group mb-3">
          <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo set_value('email')?>">
          <?= form_error('email', '<small class="text-danger" pl-3>', '</small>'); ?>
        </div>
        <div class="form-group mb-3">
          <input type="password" id="password" name="password" class="form-control" placeholder="Password">
          <?= form_error('password', '<small class="text-danger" pl-3>', '</small>'); ?>
        </div>
        <div class="social-auth-links text-center mb-3">
          <!-- /.col -->
          <button type="submit" class="btn btn-primary btn-block">Login</button>
          <!-- /.col -->
        </div>
      </form>
      <!-- /.social-auth-links -->

      <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p>
      <p class="mb-0">
        <a href="<?= base_url('Auth/register') ?>" class="text-center">Register a new membership</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->