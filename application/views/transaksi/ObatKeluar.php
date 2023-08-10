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
                  <h3 class="card-title">Data Obat Keluar</h3>
                </div>
                <div class="col-sm-12 col-md-6">
                  <a href="<?= base_url('CObatProses/form') ?>" class="btn btn-primary btn-social pull-right" data-toggle="form" data-target="#form" id="input">Add Obat Keluar
                  </a>
                </div>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>User</th>
                    <th>Pasien</th>
                    <th>Keterangan</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1;
                  foreach ($data->result_array() as $val) { ?>
                    <tr>
                      <td><?= $i++ ?></td>
                      <td><?= $val['tanggal'] ?></td>
                      <td><?= $val['name'] ?></td>
                      <td><?= $val['kode_obat'] ?></td>
                      <td><?= $val['name'] ?></td>
                      <td>A</td>
                    </tr>
                  <?php } ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>User</th>
                    <th>Pasien</th>
                    <th>Keterangan</th>
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