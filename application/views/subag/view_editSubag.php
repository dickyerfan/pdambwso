<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid mt-2">
            <div class="card">
                <div class="card-header card-outline card-primary shadow">
                    <a class="fw-bold text-dark" style="text-decoration:none ;"><?= strtoupper($title) ?></a>
                    <a href="<?= base_url('pekerjaan/subag'); ?>"><button class="btn btn-primary btn-sm float-end"><i class="fas fa-reply"></i> Kembali</button></a>
                </div>
                <div class="card-body">
                    <form class="user" action="<?= base_url('pekerjaan/subag/update') ?>" method="POST">
                        <div class="row">
                            <div class="col-md-6">
                                <input type="hidden" class="form-control" id="id" name="id" value="<?= $bagian->id_subag; ?>">
                                <div class="form-group">
                                    <label for="nama_subag">Nama Sub Bagian :</label>
                                    <input type="text" class="form-control" id="nama_subag" name="nama_subag" value="<?= $bagian->nama_subag; ?>">
                                    <small class="form-text text-danger pl-3"><?= form_error('nama_subag'); ?></small>
                                </div>
                            </div>
                        </div>

                        <button class="btn btn-primary btn-sm mt-1" name="tambah" type="submit"><i class="fas fa-edit"></i> Update Sub Bagian</button>
                    </form>
                </div>
            </div>
        </div>
    </main>