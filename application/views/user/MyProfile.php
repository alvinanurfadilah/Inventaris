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
            <div class="col-lg">
              <?= $this->session->flashdata('message') ?>
            </div>
          </div>
          <div class="card mb-3" style="max-width: 540px;">
            <div class="row g-0">
              <div class="col-md-4">
                <img src="<?= base_url('assets/images/profile.jpg') ?>" class="img-fluid rounded-start">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title"><?= $user['full_name'] ?></h5>
                  <p class="card-text"><?= $user['email'] ?></p>
                  <p class="card-text"><small class="text-body-secondary">Member since <?= $user['created_at'] ?></small></p>
                </div>
              </div>
            </div>
          </div>

        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  <!-- /.content -->
</div>