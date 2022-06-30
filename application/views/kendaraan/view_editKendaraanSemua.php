<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-2 mt-2">
            <div class="card">
                <div class="card-header card-outline card-primary shadow">
                    <a class="fw-bold text-dark" style="text-decoration:none ;"><?= strtoupper($title) ?></a>
                    <a href="<?= base_url('kendaraan/kendaraan_semua'); ?>"><button class="btn btn-primary btn-sm float-end"><i class="fas fa-reply"></i> Kembali</button></a>
                </div>
                <?= $this->session->flashdata('info'); ?>
                <?= $this->session->unset_userdata('info'); ?>
                <div class="card-body">
                    <form class="user" action="<?= base_url('kendaraan/kendaraan_semua/update') ?>" method="POST">
                        <div class="row">
                            <input type="hidden" name="id_kendaraan" id="id" value="<?= $kendaraan->id_kendaraan; ?>">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="id_merk">Merk :</label>
                                    <select name="id_merk" id="id_merk" class="form-control select2">
                                        <option value="">-- Pilih merk --</option>
                                        <?php foreach ($merk as $row) : ?>
                                            <option value="<?= $row->id_merk ?>" <?= $kendaraan->id_merk == $row->id_merk ? 'selected' : '' ?>><?= $row->nama_merk ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <small class="form-text text-danger pl-3"><?= form_error('id_merk'); ?></small>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="id_type">Type :</label>
                                    <select name="id_type" id="id_type" class="form-control select2">
                                        <option value="">-- Pilih type --</option>
                                        <?php foreach ($type as $row) : ?>
                                            <option value="<?= $row->id_type ?>" <?= $kendaraan->id_type == $row->id_type ? 'selected' : '' ?>><?= $row->nama_type ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <small class="form-text text-danger pl-3"><?= form_error('id_type'); ?></small>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="no_plat">No Kendaraan :</label>
                                    <input type="text" class="form-control" id="no_plat" name="no_plat" placeholder="Masukan No Kendaraan" value="<?= $this->input->post('no_plat') ?? $kendaraan->no_plat; ?>">
                                    <small class="form-text text-danger pl-3"><?= form_error('no_plat'); ?></small>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="no_rangka">No Rangka :</label>
                                    <input type="text" class="form-control" id="no_rangka" name="no_rangka" placeholder="Masukan no_rangka" value="<?= $kendaraan->no_rangka; ?>">
                                    <small class="form-text text-danger pl-3"><?= form_error('no_rangka'); ?></small>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="no_mesin">No Mesin :</label>
                                    <input type="text" class="form-control" id="no_mesin" name="no_mesin" placeholder="Masukan no_mesin" value="<?= $kendaraan->no_mesin; ?>">
                                    <small class="form-text text-danger pl-3"><?= form_error('no_mesin'); ?></small>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="jumlah_roda">Jumlah Roda :</label>
                                    <input type="text" class="form-control" id="jumlah_roda" name="jumlah_roda" placeholder="Masukan Jumlah Roda" value="<?= $kendaraan->jumlah_roda; ?>">
                                    <small class="form-text text-danger pl-3"><?= form_error('jumlah_roda'); ?></small>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="tahun">Tahun :</label>
                                    <select name="tahun" id="tahun" class="form-control select2">
                                        <option value="">-- Pilih Tahun --</option>
                                        <?php
                                        $tahunSkrng = date('Y');
                                        for ($tahun = 1980; $tahun <= $tahunSkrng; $tahun++) : ?>
                                            <option value="<?= $tahun ?>" <?= $kendaraan->tahun == $tahun ? 'selected' : '' ?>><?= $tahun ?></option>
                                        <?php endfor; ?>
                                    </select>
                                    <small class="form-text text-danger pl-3"><?= form_error('tahun'); ?></small>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="warna">Warna :</label>
                                    <input type="text" class="form-control" id="warna" name="warna" placeholder="Masukan Warna Kendaraan" value="<?= $kendaraan->warna; ?>">
                                    <small class="form-text text-danger pl-3"><?= form_error('warna'); ?></small>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="bahan_bakar">Bahan Bakar :</label>
                                    <select name="bahan_bakar" id="bahan_bakar" class="form-control select2">
                                        <option value="">-- Pilih Bahan Bakar --</option>
                                        <option value="Bensin" <?= $kendaraan->bahan_bakar == 'Bensin' ? 'selected' : '' ?>>Bensin</option>
                                        <option value="Solar" <?= $kendaraan->bahan_bakar == 'Solar' ? 'selected' : '' ?>>Solar</option>
                                    </select>
                                    <small class="form-text text-danger pl-3"><?= form_error('bahan_bakar'); ?></small>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="berlaku_sampai">Masa Berlaku :</label>
                                    <input type="date" class="form-control" id="berlaku_sampai" name="berlaku_sampai" placeholder="Masukan masa Berlaku" value="<?= $kendaraan->berlaku_sampai; ?>">
                                    <small class="form-text text-danger pl-3"><?= form_error('berlaku_sampai'); ?></small>
                                </div>
                            </div>


                        </div>
                        <button class="btn btn-primary btn-sm mt-1" name="tambah" type="submit"><i class="fas fa-save"></i> Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </main>