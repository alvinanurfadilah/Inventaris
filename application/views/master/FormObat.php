<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" id="input">
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
                        <form class="form-horizontal" action="<?= base_url('CObat/index_post'); ?>" method="POST">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">
                                        <h5><b>Form Obat</b></h5>
                                    </label>
                                </div>
                                <div class="form-group row">
                                    <label for="kode_obat" class="col-sm-2 col-form-label">Kode Obat</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="kode" id="kode" placeholder="Kode Obat">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Nama Obat</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="obat" id="obat" placeholder="Nama Obat">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="jenis" class="col-sm-2 col-form-label">Jenis Obat</label>
                                    <div class="col-sm-10">
                                        <select name="jenis" id="jenis" class="form-control">
                                            <?php foreach ($jenis->result_array() as $val) { ?>
                                                <option value="<?php echo $val['id'] ?>"><?php echo $val['jenis'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Satuan Obat</label>
                                    <div class="col-sm-10">
                                        <select name="satuan" id="satuan" class="form-control">
                                            <?php foreach ($satuan->result_array() as $val) { ?>
                                                <option value="<?php echo $val['id'] ?>"><?php echo $val['satuan'] ?></option>
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


<!-- Form Update -->
<div class="content-wrapper" id="update<?= $val['id'] ?>">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Form Update Obat</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
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

                        <form class="form-horizontal" action="<?= base_url('CObat/update'); ?>" method="POST" id="update<?= $val['id'] ?>">
                        <?php foreach ($data->result_array() as $val) : ?>
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">
                                        <h5><b>Form Obat</b></h5>
                                    </label>
                                </div>
                                <div class="form-group row">
                                    <label for="kode_obat" class="col-sm-2 col-form-label">Kode Obat</label>
                                    <div class="col-sm-10">
                                        
                                            <input type="text" class="form-control" name="kode" id="kode" placeholder="Kode Obat" value="<?= $val['kode_obat'] ?>">
                                        
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Nama Obat</label>
                                    <div class="col-sm-10">
                                            <input type="text" class="form-control" name="obat" id="obat" placeholder="Nama Obat" value="<?= $val['name'] ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="jenis" class="col-sm-2 col-form-label">Jenis Obat</label>
                                    <div class="col-sm-10">
                                            <input type="text" class="form-control" name="jenis" id="jenis" value="<?= $val['jenis'] ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Satuan Obat</label>
                                    <div class="col-sm-10">
                                            <input type="text" class="form-control" name="satuan" id="satuan" value="<?= $val['satuan'] ?>">
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-info">Tambah</button>
                                <button type="submit" class="btn btn-default float-right">Cancel</button>
                            </div>
                            <!-- /.card-footer -->
                            <?php endforeach ?>
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