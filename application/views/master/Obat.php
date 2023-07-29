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
          <h1 class="m-0">Data Obat</h1>
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
                  <!-- <a href="<?= base_url('/FormObat.php') ?>"> -->
                  <button type="button" class="btn btn-primary btn-social pull-right" data-toggle="form" data-target="#form">
                    <i class="fa fa-plus"></i>
                  </button>
                  <!-- </a> -->
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
                        <div class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-default-update">
                          <i class="fas fa-edit"></i>
                        </div>

                        <div class="btn btn-danger btn-sm">
                          <i class="fas fa-trash-alt"></i>
                        </div>
                      </td>
                    </tr>
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



<!-- Form Obat -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Form Input Obat</h1>
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
          <!-- Horizontal Form -->
          <div class="card card-info">
            <!-- <div class="card-header">
                            <h3 class="card-title">Form Obat</h3>
                        </div> -->
            <!-- /.card-header -->
            <!-- form start -->
            <form class="form-horizontal" action="<?= base_url('CObat/index_post'); ?>" method="POST" id="form" name="form">
              <div class="card-body">
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">
                    <h5><b>Form Obat</b></h5>
                  </label>
                </div>
                <div class="form-group row">
                  <label for="kode_obat" class="col-sm-2 col-form-label">Kode Obat</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="kode" name="kode" placeholder="Kode Obat">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="obat" class="col-sm-2 col-form-label">Nama Obat</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="obat" name="obat" placeholder="Nama Obat">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="jenis" class="col-sm-2 col-form-label">Jenis Obat</label>
                  <div class="col-sm-10">
                    <select name="jenis" id="jenis" class="form-control">
                      <option value=""></option>
                      <?php foreach ($data->result_array() as $val) { ?>
                        <option value="<?php echo $val['jenis_id'] ?>"><?= $val['jenis_id'] ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputPassword3" class="col-sm-2 col-form-label">Satuan Obat</label>
                  <div class="col-sm-10">
                    <select name="satuan" id="satuan" class="form-control">
                      <option value=""></option>
                      <?php foreach ($data->result_array() as $val) { ?>
                        <option value="<?php echo $val['satuan_id'] ?>"><?= $val['satuan_id'] ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit" class="btn btn-info">Tambah</button>
                <button type="submit" class="btn btn-default float-right">Cancel</button>
              </div>
              <!-- /.card-footer -->
            </form>

            <!-- /.card-header -->
          </div>
          <!-- /.card -->
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
  <!-- /.content -->
</div>