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
          <br>
          <?php if (validation_errors()) : ?>
            <div class="alert alert-danger" role="alert">
              <?= validation_errors() ?>
            </div>
          <?php endif ?>

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
                  <h3 class="card-title">Data Obat</h3>
                </div>
                <div class="col-sm-12 col-md-6">
                  <button type="button" class="btn btn-primary btn-social pull-right" data-toggle="modal" data-target="#modal-default">
                    Add Obat
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
                    <th>Kode Obat</th>
                    <th>Nama Obat</th>
                    <th>Jenis Obat</th>
                    <th>Satuan Obat</th>
                    <th>Overall Stock</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1;
                  foreach ($data->result_array() as $val) : ?>
                    <tr>
                      <td><?= $i++ ?></td>
                      <td><?= $val['kode_obat'] ?></td>
                      <td><?= $val['name'] ?></td>
                      <td><?= $val['jenis'] ?></td>
                      <td><?= $val['satuan'] ?></td>
                      <td><?= $val['overall_stock'] ?></td>


                      <td>
                        <?php echo anchor('CObat/detail/' . $val['slug'], '<div class="btn btn-primary btn-sm">
                            <i class="fas fa-info-circle"></i>
                        </div>') ?>

                        <div class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-default-update<?= $val['slug'] ?>">
                          <i class="fas fa-edit"></i>
                        </div>

                        <?php echo anchor('CObat/index_delete/' . $val['slug'], '<div class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></div>') ?>

                      </td>
                    </tr>

                    <!-- Modal Update -->
                    <div class="modal fade" id="modal-default-update<?= $val['slug'] ?>">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 class="modal-title">Update Obat</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <form action="<?= base_url('CObat/update') ?>" method="POST">
                            <div class="modal-body">
                              <div class="form-group row">
                                <label for="horizontal-text-input" class="col-sm-4 col-form-label">Kode Obat</label>
                                <input type="text" class="form-control" name="id" id="id" value="<?= $val['id'] ?>" hidden>
                                <div class="col-sm-8">
                                  <input type="text" class="form-control" name="kode" id="kode" placeholder="Masukkan Kode Obat" value="<?= $val['kode_obat'] ?>">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="horizontal-text-input" class="col-sm-4 col-form-label">Nama Obat</label>
                                <div class="col-sm-8">
                                  <input type="text" class="form-control" name="obat" id="obat" placeholder="Masukkan Nama Obat" value="<?= $val['name'] ?>">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="horizontal-text-input" class="col-sm-4 col-form-label">Jenis</label>
                                <div class="col-sm-8">
                                  <select name="jenis" id="jenis" class="form-control">
                                    <?php foreach ($jenis->result_array() as $j) { ?>
                                      <option value="<?php echo $j['id'] ?>" <?= $val['jenis_id'] == $j['id'] ? 'selected' : null ?>><?php echo $j['jenis'] ?></option>
                                    <?php } ?>
                                  </select>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="horizontal-text-input" class="col-sm-4 col-form-label">Satuan</label>
                                <div class="col-sm-8">
                                  <select name="satuan" id="satuan" class="form-control">
                                    <?php foreach ($satuan->result_array() as $s) { ?>
                                      <option value="<?php echo $s['id'] ?>" <?= $val['satuan_id'] == $s['id'] ? 'selected' : null ?>><?php echo $s['satuan'] ?></option>
                                    <?php } ?>
                                  </select>
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
                <tfoot>
                  <tr>
                    <th>No</th>
                    <th>Kode Obat</th>
                    <th>Nama Obat</th>
                    <th>Jenis Obat</th>
                    <th>Satuan Obat</th>
                    <th>Overall Stock</th>
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
      <form action="<?= base_url('CObat/index_post') ?>" method="POST">
        <div class="modal-body">
          <div class="form-group row">
            <label for="horizontal-text-input" class="col-sm-4 col-form-label">Kode Obat</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="kode_obat" id="kode_obat" placeholder="Masukkan Kode Obat">
            </div>
          </div>
          <div class="form-group row">
            <label for="horizontal-text-input" class="col-sm-4 col-form-label">Nama Obat</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="name" id="name" placeholder="Masukkan Nama Obat">
            </div>
          </div>
          <div class="form-group row">
            <label for="horizontal-text-input" class="col-sm-4 col-form-label">Jenis</label>
            <div class="col-sm-8">
              <select name="jenis_id" id="jenis_id" class="form-control">
                <option value="">Select Jenis</option>
                <?php foreach ($jenis->result_array() as $j) { ?>
                  <option value="<?php echo $j['id'] ?>"><?php echo $j['jenis'] ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label for="horizontal-text-input" class="col-sm-4 col-form-label">Satuan</label>
            <div class="col-sm-8">
              <select name="satuan_id" id="satuan_id" class="form-control">
                <option value="">Select Satuan</option>
                <?php foreach ($satuan->result_array() as $s) { ?>
                  <option value="<?php echo $s['id'] ?>"><?php echo $s['satuan'] ?></option>
                <?php } ?>
              </select>
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