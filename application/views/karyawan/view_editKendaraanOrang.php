<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid mt-2">
            <div class="card">
                <div class="card-header card-outline card-primary shadow">
                    <a class="fw-bold text-dark" style="text-decoration:none ;"><?= strtoupper($title) ?></a>
                    <a href="<?= base_url('kendaraan/kendaraan_orang'); ?>"><button class="btn btn-primary btn-sm float-end"><i class="fas fa-reply"></i> Kembali</button></a>
                </div>
                <div class="card-body">
                    <form class="user" action="<?= base_url('kendaraan/kendaraan_orang/updateOrang') ?>" method="POST">
                        <div class="row">
                            <div class="col-md-4">
                                <input type="hidden" name="id_kendaraan" id="id_kendaraan" value="<?= $kendaraan->id_kendaraan; ?>">
                                <div class="form-group">
                                    <label for="nama">Pilih Nama Pemakai baru :</label>
                                    <select name="id_karyawan" id="nama" class="form-control">
                                        <?php foreach ($karyawan as $row) : ?>
                                            <option value="<?= $row->id ?>" <?= $kendaraan->id_karyawan == $row->id ? 'selected' : '' ?>><?= $row->nama ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <small class="form-text text-danger pl-3"><?= form_error('nama'); ?></small>
                                </div>
                            </div>

                        </div>
                        <button class="btn btn-primary btn-sm mt-1" name="tambah" type="submit"><i class="fas fa-save"></i> Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </main>