<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid mt-2">
            <div class="card">
                <div class="card-header card-outline card-primary shadow">
                    <a class="fw-bold text-dark" style="text-decoration:none ;"><?= strtoupper($title) ?></a>
                    <a href="<?= base_url('kendaraan/merk'); ?>"><button class="neumorphic-button float-end"><i class="fas fa-reply"></i> Kembali</button></a>
                </div>
                <div class="card-body">
                    <form class="user" action="<?= base_url('kendaraan/merk/update') ?>" method="POST">
                        <div class="row">
                            <div class="col-md-6">
                                <input type="hidden" class="form-control" id="id" name="id" value="<?= $merk->id_merk; ?>">
                                <div class="form-group">
                                    <label for="nama_merk">Nama Merk :</label>
                                    <input type="text" class="form-control" id="nama_merk" name="nama_merk" value="<?= $merk->nama_merk; ?>">
                                    <small class="form-text text-danger pl-3"><?= form_error('nama_merk'); ?></small>
                                </div>
                            </div>
                        </div>

                        <button class="neumorphic-button mt-1" name="tambah" type="submit"><i class="fas fa-edit"></i> Update Merk</button>
                    </form>
                </div>
            </div>
        </div>
    </main>