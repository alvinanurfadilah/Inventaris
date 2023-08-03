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
                  <a href="<?= base_url('CObat/form') ?>" class="btn btn-primary btn-social pull-right" data-toggle="form" data-target="#form" id="input">
                    <i class="fa fa-plus"></i>
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
                        <?php echo anchor('CObat/detail/'.$val['slug'], '<div class="btn btn-primary btn-sm">
                            <i class="fas fa-info-circle"></i>
                        </div>') ?>

                        <?php echo anchor('CObat/edit/'.$val['slug'], '<div class="btn btn-primary btn-sm">
                          <i class="fas fa-edit"></i>
                        </div>') ?>

                        <?php echo anchor('CObat/index_delete/' . $val['slug'], '<div class="btn btn-danger btn-sm">
                          <i class="fas fa-trash-alt"></i>
                        </div>') ?>
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