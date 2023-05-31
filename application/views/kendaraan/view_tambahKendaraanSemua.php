<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid mt-2">
            <div class="card">
                <div class="card-header card-outline card-primary shadow">
                    <a class="fw-bold text-dark" style="text-decoration:none ;"><?= strtoupper($title) ?></a>
                    <a href="<?= base_url('kendaraan/kendaraan_semua'); ?>"><button class="neumorphic-button float-end"><i class="fas fa-reply"></i> Kembali</button></a>
                </div>


                <div class="card-body">
                    <form class="user" action="" method="POST">

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="id_karyawan">Pemegang :</label>
                                    <select name="id_karyawan" id="id_karyawan" class="form-control select2" aria-label="Default select example">
                                        <option value="">-- Pilih karyawan --</option>
                                        <?php foreach ($karyawan as $row) : ?>
                                            <option value="<?= $row->id ?>"><?= $row->nama ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <small class="form-text text-danger pl-3"><?= form_error('id_karyawan'); ?></small>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="id_merk">Merk :</label>
                                    <select name="id_merk" id="id_merk" class="form-control select2" aria-label="Default select example">
                                        <option value="">-- Pilih merk --</option>
                                        <?php foreach ($merk as $row) : ?>
                                            <option value="<?= $row->id_merk ?>"><?= $row->nama_merk ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <small class="form-text text-danger pl-3"><?= form_error('id_merk'); ?></small>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="id_type">Type :</label>
                                    <select name="id_type" id="id_type" class="form-control select2" aria-label="Default select example">
                                        <option value="">-- Pilih type --</option>
                                        <?php foreach ($type as $row) : ?>
                                            <option value="<?= $row->id_type ?>"><?= $row->nama_type ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <small class="form-text text-danger pl-3"><?= form_error('id_type'); ?></small>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="no_plat">No Kendaraan :</label>
                                    <input type="text" class="form-control" id="no_plat" name="no_plat" placeholder="Masukan No Kendaraan" value="<?= set_value('no_plat'); ?>">
                                    <small class="form-text text-danger pl-3"><?= form_error('no_plat'); ?></small>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="no_rangka">No Rangka :</label>
                                    <input type="text" class="form-control" id="no_rangka" name="no_rangka" placeholder="Masukan no_rangka" value="<?= set_value('no_rangka'); ?>">
                                    <small class="form-text text-danger pl-3"><?= form_error('no_rangka'); ?></small>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="no_mesin">No Mesin :</label>
                                    <input type="text" class="form-control" id="no_mesin" name="no_mesin" placeholder="Masukan no_mesin" value="<?= set_value('no_mesin'); ?>">
                                    <small class="form-text text-danger pl-3"><?= form_error('no_mesin'); ?></small>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="jumlah_roda">Jumlah Roda :</label>
                                    <input type="text" class="form-control" id="jumlah_roda" name="jumlah_roda" placeholder="Masukan Jumlah Roda" value="<?= set_value('jumlah_roda'); ?>">
                                    <small class="form-text text-danger pl-3"><?= form_error('jumlah_roda'); ?></small>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="tahun">Tahun :</label>
                                    <select name="tahun" id="tahun" class="form-control select2" aria-label="Default select example">
                                        <option value="<?= set_value('tahun'); ?>"><?= set_value('tahun'); ?></option>
                                        <?php
                                        $tahunSkrng = date('Y');
                                        for ($tahun = 1980; $tahun <= $tahunSkrng; $tahun++) : ?>
                                            <option value="<?= $tahun ?>"><?= $tahun ?></option>
                                        <?php endfor; ?>
                                    </select>
                                    <small class="form-text text-danger pl-3"><?= form_error('tahun'); ?></small>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="warna">Warna :</label>
                                    <input type="text" class="form-control" id="warna" name="warna" placeholder="Masukan Warna Kendaraan" value="<?= set_value('warna'); ?>">
                                    <small class="form-text text-danger pl-3"><?= form_error('warna'); ?></small>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="bahan_bakar">Bahan Bakar :</label>
                                    <select name="bahan_bakar" id="bahan_bakar" class="form-control select2" aria-label="Default select example">
                                        <option value="<?= set_value('bahan_bakar'); ?>"><?= set_value('bahan_bakar'); ?></option>
                                        <option value="Bensin">Bensin</option>
                                        <option value="Solar">Solar</option>
                                    </select>
                                    <small class="form-text text-danger pl-3"><?= form_error('bahan_bakar'); ?></small>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="berlaku_sampai">Masa Berlaku :</label>
                                    <input type="date" class="form-control" id="berlaku_sampai" name="berlaku_sampai" placeholder="Masukan masa Berlaku" value="<?= set_value('berlaku_sampai'); ?>">
                                    <small class="form-text text-danger pl-3"><?= form_error('berlaku_sampai'); ?></small>
                                </div>
                            </div>


                        </div>
                        <button class="neumorphic-button mt-1" name="tambah" type="submit"><i class="fas fa-save"></i> Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </main>