<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-2 mt-2">
            <!-- <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active"><?= $judul ?></li>
                    </ol> -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="float-start"><?= strtoupper($judul) ?></h5>
                    <a href="<?= base_url('dashboard') ?>" class="btn btn-primary btn-sm float-end"><i class="fas fa-arrow-left"></i> Kembali</a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <form action="" method="POST">
                                <div class="mb-1">
                                    <label for="nama" class="form-label">Nama :</label>
                                    <input type="text" class="form-control" id="nama" name="nama" value="<?= set_value('nama') ?>">
                                </div>
                                <small class="text-danger"><?= form_error('nama') ?></small>
                                <div class="mb-1">
                                    <label for="nrp" class="form-label">NRP :</label>
                                    <input type="text" class="form-control" id="nrp" name="nrp" value="<?= set_value('nrp') ?>">
                                </div>
                                <small class="text-danger"><?= form_error('nrp') ?></small>
                                <div class="mb-1">
                                    <label for="email" class="form-label">Email :</label>
                                    <input type="text" class="form-control" id="email" name="email" value="<?= set_value('email') ?>">
                                </div>
                                <small class="text-danger"><?= form_error('email') ?></small>
                                <div class="mb-1">
                                    <label for="jurusan" class="form-label">Jurusan :</label>
                                    <select class="form-select" id="select2" name="jurusan" aria-label="Default select example" value="<?= set_value('jurusan') ?>">
                                        <option value="">Pilih...</option>
                                        <option value="Ekonomi Manajemen">Ekonomi Manajemen</option>
                                        <option value="Ekonomi Akuntansi">Ekonomi Akuntansi</option>
                                        <option value="Teknik Elektro">Teknik Elektro</option>
                                        <option value="Teknik Mesin">Teknik Mesin</option>
                                        <option value="Teknik Industri">Teknik Industri</option>
                                        <option value="Teknik Sipil">Teknik Sipil</option>
                                        <option value="Hukum">Hukum</option>
                                        <option value="Teknologi Informatika">Teknologi Informatika</option>
                                        <option value="Sistem Informatika">Sistem Informatika</option>
                                        <option value="Ilmu Komputer">Ilmu Komputer</option>
                                    </select>
                                </div>
                                <small class="text-danger"><?= form_error('jurusan') ?></small>

                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>