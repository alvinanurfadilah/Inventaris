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
          <h1 class="m-0">Jenis Obat</h1>
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
                  <h3 class="card-title">Data Jenis Obat</h3>
                </div>
                <div class="col-sm-12 col-md-6">
                  <button type="button" class="btn btn-primary btn-social pull-right" data-toggle="modal" data-target="#modal-default">
                    <i class="fa fa-plus"></i>
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
                    <th>Jenis Obat</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1;
                  foreach ($data->result_array() as $val) : ?>
                    <tr>
                      <td><?= $i++ ?></td>
                      <td><?= $val['jenis'] ?></td>
                      <td>
                        <div class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-default-update">
                          <i class="fas fa-edit"></i>
                        </div>

                        <?php echo anchor('CJenis/delete/'.$val['id'], '<div class="btn btn-danger btn-sm">
                          <i class="fas fa-trash-alt"></i>
                        </div>') ?>
                      </td>
                    </tr>
                  <?php endforeach ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th>No</th>
                    <th>Jenis Obat</th>
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


<!-- Modal Input -->
<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Form Jenis</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('CJenis/index_post'); ?>" method="POST">
        <div class="modal-body">
          <div class="row">
            <label for="horizontal-text-input" class="col-sm-3 col-form-label">Nama Jenis</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="jenis_obat" id="jenis_obat" placeholder="Masukkan Nama Jenis">
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

<!-- Modal Update -->
<div class="modal fade" id="modal-default-update">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Update Jenis</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php foreach ($data->result_array() as $val) : ?>
        <form action="<?= base_url('CJenis/update'); ?>" method="POST">
          <div class="modal-body">
            <div class="row">
              <label for="horizontal-text-input" class="col-sm-3 col-form-label">Nama Jenis</label>
              <div class="col-sm-9">
                <input type="hidden" class="form-control" name="id" id="id" value="<?= $val['id'] ?>">
                <input type="text" class="form-control" name="jenis" id="jenis" value="<?= $val['jenis'] ?>">
              </div>
            </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Update</button>
          </div>
        </form>
      <?php endforeach ?>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>