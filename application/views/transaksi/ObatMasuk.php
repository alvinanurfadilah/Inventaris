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
                      <td><?= $val['user_id'] ?></td>
                      <td><?= $val['kode_obat'] ?></td>
                      <td><?= $val['name'] ?></td>
                      <td><?= $val['expired'] ?></td>
                      <td><?= $val['stock'] ?></td>
                      <td>
                        <div class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-default-update<?= $val['id'] ?>">
                          <i class="fas fa-edit"></i>
                        </div>

                        <?php echo anchor('CObatProses/masuk_delete/' . $val['id'], '<div class="btn btn-danger btn-sm">
                          <i class="fas fa-trash-alt"></i>
                        </div>') ?>
                      </td>
                    </tr>

                    <!-- Modal Update -->
                    <div class="modal fade" id="modal-default-update<?= $val['id'] ?>">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 class="modal-title">Edit Obat Masuk</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <form action="<?= base_url('CObatProses/masuk_update'); ?>" method="POST">
                            <div class="modal-body">
                              <div class="form-group row">
                                <label for="horizontal-text-input" class="col-sm-3 col-form-label">Tanggal Masuk</label>
                                <input type="text" class="form-control" name="id" id="id" value="<?= $val['id'] ?>" hidden>
                                <input type="text" class="form-control" name="detail_obat_id" id="detail_obat_id" value="<?= $val['detail_obat_id'] ?>" hidden>
                                <input type="text" class="form-control" name="obat_proses_id" id="obat_proses_id" value="<?= $val['obat_proses_id'] ?>" hidden>
                                <div class="col-sm-9">
                                  <input type="text" class="form-control" name="tanggal" id="tanggal" value="<?php echo date('Y-m-d') ?>" readonly>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="horizontal-text-input" class="col-sm-3 col-form-label">User</label>
                                <div class="col-sm-9">
                                  <input type="text" class="form-control" name="user_id" id="user_id" value="<?php echo $val['user_id'] ?>" readonly>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="horizontal-text-input" class="col-sm-3 col-form-label">Nama Obat</label>
                                <div class="col-sm-9">
                                  <select name="obat_id" id="obat_id" class="form-control">
                                    <?php foreach ($obat->result_array() as $ob) { ?>
                                      <option value="<?php echo $ob['id'] ?>" <?= $val['obat_id'] == $ob['id'] ? 'selected' : null ?>><?php echo $ob['name'] ?></option>
                                    <?php } ?>
                                  </select>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="horizontal-text-input" class="col-sm-3 col-form-label">Expired</label>
                                <div class="col-sm-9">
                                  <input type="date" class="form-control" name="expired" id="expired" value="<?= $val['expired'] ?>">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="horizontal-text-input" class="col-sm-3 col-form-label">Stok</label>
                                <div class="col-sm-9">
                                  <input type="number" class="form-control" name="stock" id="stock" value="<?= $val['stock'] ?>">
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
              <input type="text" class="form-control" name="tanggal" id="tanggal" value="<?php echo date('Y-m-d') ?>" readonly>
            </div>
          </div>
          <div class="form-group row">
            <label for="horizontal-text-input" class="col-sm-3 col-form-label">User</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="user_id" id="user_id" value="<?php echo $id['id'] ?>" readonly>
            </div>
          </div>
          <div class="form-group row">
            <label for="horizontal-text-input" class="col-sm-3 col-form-label">Kode Obat</label>
            <div class="col-sm-9">
              <select name="obat_id" id="obat_id" class="form-control">
                <option value="">Pilih Obat</option>
                <?php foreach ($obat->result_array() as $val) { ?>
                  <option value="<?php echo $val['id'] ?>"><?php echo $val['name'] ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label for="horizontal-text-input" class="col-sm-3 col-form-label">Expired</label>
            <div class="col-sm-9">
              <input type="date" class="form-control" name="expired" id="expired">
            </div>
          </div>
          <div class="form-group row">
            <label for="horizontal-text-input" class="col-sm-3 col-form-label">Stok</label>
            <div class="col-sm-9">
              <input type="number" class="form-control" name="stock" id="stock" placeholder="Masukkan Stock">
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