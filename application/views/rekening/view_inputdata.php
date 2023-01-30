<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-2 mt-2">
            <div class="card">
                <div class="card-header card-outline card-primary shadow">
                    <a class="fw-bold text-dark" style="text-decoration:none ;"><?= strtoupper($title) ?></a>
                    <!-- <a href="<?= base_url('rekening/nama_upk'); ?>"><button class="btn btn-primary btn-sm float-end"><i class="fas fa-reply"></i> Kembali</button></a> -->
                </div>
                <div class="card-body">
                    <?= $this->session->flashdata('info'); ?>
                    <?= $this->session->unset_userdata('info'); ?>
                    <form class="user" action="" method="POST">
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="row mb-1">
                                        <div class="col">
                                            <select name="id_upk" id="id_upk" class="form-select">
                                                <option value="">Pilih UPK</option>
                                                <?php foreach ($upk as $row) : ?>
                                                    <option value="<?= $row->id_upk ?>"><?= $row->nama_upk ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="col"><input type="date" class="form-control" name="tanggal" id="tanggal"></div>
                                        <div class="col"><input type="text" class="form-control" id="jml_rek" name="jml_rek" placeholder="Jumlah Rekening"></div>
                                        <div class="col"><input type="text" class="form-control" id="air_pakai" name="air_pakai" placeholder="Air terpakai"></div>
                                        <div class="col"><input type="text" class="form-control" id="rupiah" name="rupiah" placeholder="Jumlah Rupiah"></div>
                                        <div class="col"> <button class="btn btn-primary btn-sm mt-1" name="tambah" type="submit"><i class="fas fa-save"></i> Simpan</button></div>
                                    </div>
                                    <small class="form-text text-danger pl-3"><?= form_error('jml_rek'); ?></small>
                                    <small class="form-text text-danger pl-3"><?= form_error('air_pakai'); ?></small>
                                    <small class="form-text text-danger pl-3"><?= form_error('rupiah'); ?></small>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>