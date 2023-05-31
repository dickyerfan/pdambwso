<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-2 mt-2">
            <div class="card">
                <div class="card-header card-outline card-primary shadow">
                    <a class="fw-bold text-dark" style="text-decoration:none ;"><?= strtoupper($title) ?></a>
                    <a href="<?= base_url('kendaraan/type'); ?>"><button class="neumorphic-button float-end"><i class="fas fa-reply"></i> Kembali</button></a>
                </div>
                <div class="card-body">
                    <form class="user" action="<?= base_url('kendaraan/type/update') ?>" method="POST">
                        <div class="row">
                            <div class="col-md-6">
                                <input type="hidden" class="form-control" id="id" name="id" value="<?= $type->id_type; ?>">
                                <div class="form-group">
                                    <label for="nama_type">Nama Type :</label>
                                    <input type="text" class="form-control" id="nama_type" name="nama_type" value="<?= $type->nama_type; ?>">
                                    <small class="form-text text-danger pl-3"><?= form_error('nama_type'); ?></small>
                                </div>
                            </div>
                        </div>

                        <button class="neumorphic-button mt-1" name="tambah" type="submit"><i class="fas fa-edit"></i> Update Jabatan</button>
                    </form>
                </div>
            </div>
        </div>
    </main>