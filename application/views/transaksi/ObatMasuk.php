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
          <h1 class="m-0">Data Obat Masuk</h1>
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
                  <a href="FormObat.php">
                    <button type="button" class="btn btn-primary btn-social pull-right" data-toggle="modal" data-target="#modal-default">
                      <i class="fa fa-plus"></i>
                    </button>
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
                        <th>Kode Obat</th>
                        <th>Nama Obat</th>
                        <th>Jenis Obat</th>
                        <th>Satuan Obat</th>
                        <th>Overall Stock</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Trident</td>
                        <td>Internet
                          Explorer 4.0
                        </td>
                        <td>Win 95+</td>
                        <td> 4</td>
                        <td>X</td>
                        <td>5.5</td>
                        <td>A</td>
                      </tr>
                      <tr>
                        <td>Trident</td>
                        <td>Internet
                          Explorer 4.0
                        </td>
                        <td>Win 95+</td>
                        <td> 4</td>
                        <td>X</td>
                        <td>5.5</td>
                        <td>A</td>
                      </tr>
                      <tr>
                        <td>Trident</td>
                        <td>Internet
                          Explorer 5.0
                        </td>
                        <td>Win 95+</td>
                        <td>5</td>
                        <td>C</td>
                        <td>5.5</td>
                        <td>A</td>
                      </tr>
                      <tr>
                        <td>Trident</td>
                        <td>Internet
                          Explorer 5.5
                        </td>
                        <td>Win 95+</td>
                        <td>5.5</td>
                        <td>A</td>
                        <td>5.5</td>
                        <td>A</td>
                      </tr>
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