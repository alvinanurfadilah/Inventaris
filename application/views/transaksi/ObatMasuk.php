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
                  <h3 class="card-title">Data Obat Masuk</h3>
                </div>
                <div class="col-sm-12 col-md-6">
                  <button type="button" class="btn btn-primary btn-social pull-right" data-toggle="modal" data-target="#modal-default">
                    Add Obat Masuk
                  </button>
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
                    <th>Kode Obat</th>
                    <th>Nama Obat</th>
                    <th>Expired</th>
                    <th>Stok</th>
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
                      <td><?= $val['expired'] ?></td>
                      <td><?= $val['stock'] ?></td>
                      <td>A</td>
                    </tr>
                  <?php } ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>User</th>
                    <th>Kode Obat</th>
                    <th>Nama Obat</th>
                    <th>Expired</th>
                    <th>Stok</th>
                    <th>Action</th>
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </div>
  </section>
  <!-- /.content -->
</div>



<!-- Modal Input -->
<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Form Obat Masuk</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('CObatProses/masuk_post'); ?>" method="POST">
        <div class="modal-body">
          <div class="form-group row">
            <label for="horizontal-text-input" class="col-sm-3 col-form-label">Tanggal Masuk</label>
            <div class="col-sm-9">
              <input type="date" class="form-control" name="tanggal" id="tanggal">
            </div>
          </div>
          <div class="form-group row">
            <label for="horizontal-text-input" class="col-sm-3 col-form-label">User</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="jenis" id="jenist" placeholder="Masukkan Nama Jenis">
            </div>
          </div>
          <div class="form-group row">
            <label for="horizontal-text-input" class="col-sm-3 col-form-label">Kode Obat</label>
            <div class="col-sm-9">
              <select name="jenis" id="jenis" class="form-control">
                <option value="">Pilih Obat</option>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label for="horizontal-text-input" class="col-sm-3 col-form-label">Expired</label>
            <div class="col-sm-9">
              <input type="date" class="form-control" name="jenis" id="jenist" placeholder="Masukkan Nama Jenis">
            </div>
          </div>
          <div class="form-group row">
            <label for="horizontal-text-input" class="col-sm-3 col-form-label">Stok</label>
            <div class="col-sm-9">
              <input type="number" class="form-control" name="jenis" id="jenist" placeholder="Masukkan Nama Jenis">
            </div>
          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Tambah</button>
        </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>