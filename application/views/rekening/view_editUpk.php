<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-2 mt-2">
            <div class="card">
                <div class="card-header card-outline card-primary shadow">
                    <a class="fw-bold text-dark" style="text-decoration:none ;"><?= strtoupper($title) ?></a>
                    <a href="<?= base_url('rekening/nama_upk'); ?>"><button class="btn btn-primary btn-sm float-end"><i class="fas fa-reply"></i> Kembali</button></a>
                </div>
                <div class="card-body">
                    <form class="user" action="<?= base_url('rekening/nama_upk/update') ?>" method="POST">
                        <div class="row">
                            <div class="col-md-6">
                                <input type="hidden" class="form-control" id="id_upk" name="id_upk" value="<?= $upk->id_upk; ?>">
                                <div class="form-group">
                                    <label for="nama_upk">Nama U P K :</label>
                                    <input type="text" class="form-control" id="nama_upk" name="nama_upk" value="<?= $upk->nama_upk; ?>">
                                    <small class="form-text text-danger pl-3"><?= form_error('nama_upk'); ?></small>
                                </div>
                            </div>
                        </div>

                        <button class="btn btn-primary btn-sm float-left mt-1" name="tambah" type="submit"><i class="fas fa-edit"></i> Update U P K</button>
                    </form>
                </div>
            </div>
        </div>
    </main>