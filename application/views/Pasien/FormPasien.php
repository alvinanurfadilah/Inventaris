<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" id="input">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Form Input Pasien</h1>
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

                        <form class="form-horizontal" action="<?= base_url('CPasien/index_post'); ?>" method="POST">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">
                                        <h5><b>Form Pasien</b></h5>
                                    </label>
                                </div>
                                <div class="form-group row">
                                    <label for="first_name" class="col-sm-2 col-form-label">Nama Depan</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="first_name" id="first_name" placeholder="Nama Depan">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="last_name" class="col-sm-2 col-form-label">Nama Belakang</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Nama Belakang">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="gender" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                    <div class="col-sm-10">
                                        <select name="gender" id="gender" class="form-control">
                                            <option value="Laki-Laki">Laki-Laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control" name="birth_date" id="birth_date" placeholder="Tanggal Lahir">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">No. HP</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="phone" id="phone" placeholder="No. HP">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Alamat</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="address" id="address" placeholder="Alamat">
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