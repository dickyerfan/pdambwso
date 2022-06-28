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
                            <form action="<?= base_url('dashboard/update') ?>" method="POST">
                                <div class="mb-1">
                                    <input type="hidden" name="id" value="<?= $mahasiswa->id ?>">
                                    <label for="nama" class="form-label">Nama :</label>
                                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $mahasiswa->nama ?>">
                                </div>
                                <small class="text-danger"><?= form_error('nama') ?></small>
                                <div class="mb-1">
                                    <label for="nrp" class="form-label">NRP :</label>
                                    <input type="text" class="form-control" id="nrp" name="nrp" value="<?= $mahasiswa->nrp ?>">
                                </div>
                                <small class="text-danger"><?= form_error('nrp') ?></small>
                                <div class="mb-1">
                                    <label for="email" class="form-label">Email :</label>
                                    <input type="text" class="form-control" id="email" name="email" value="<?= $mahasiswa->email ?>">
                                </div>
                                <small class="text-danger"><?= form_error('email') ?></small>
                                <div class="mb-1">
                                    <label for="jurusan" class="form-label">Jurusan :</label>
                                    <select class="form-select" id="select2" name="jurusan" aria-label="Default select example" value="<?= $mahasiswa->jurusan ?>">
                                        <option value="">Pilih...</option>
                                        <option value="Ekonomi Manajemen" <?= $mahasiswa->jurusan == 'Ekonomi Manajemen' ? 'selected' : '' ?>>Ekonomi Manajemen</option>
                                        <option value="Ekonomi Akuntansi" <?= $mahasiswa->jurusan == 'Ekonomi Akuntansi' ? 'selected' : '' ?>>Ekonomi Akuntansi</option>
                                        <option value="Teknik Elektro" <?= $mahasiswa->jurusan == 'Teknik Elektro' ? 'selected' : '' ?>>Teknik Elektro</option>
                                        <option value="Teknik Mesin" <?= $mahasiswa->jurusan == 'Teknik Mesin' ? 'selected' : '' ?>>Teknik Mesin</option>
                                        <option value="Teknik Industri" <?= $mahasiswa->jurusan == 'Teknik Industri' ? 'selected' : '' ?>>Teknik Industri</option>
                                        <option value="Teknik Sipil" <?= $mahasiswa->jurusan == 'Teknik Sipil' ? 'selected' : '' ?>>Teknik Sipil</option>
                                        <option value="Hukum" <?= $mahasiswa->jurusan == 'Hukum' ? 'selected' : '' ?>>Hukum</option>
                                        <option value="Teknologi Informatika" <?= $mahasiswa->jurusan == 'Teknologi Informatika' ? 'selected' : '' ?>>Teknologi Informatika</option>
                                        <option value="Sistem Informatika" <?= $mahasiswa->jurusan == 'Sistem Informatika' ? 'selected' : '' ?>>Sistem Informatika</option>
                                        <option value="Ilmu Komputer" <?= $mahasiswa->jurusan == 'Ilmu Komputer' ? 'selected' : '' ?>>Ilmu Komputer</option>
                                    </select>
                                </div>
                                <small class="text-danger"><?= form_error('jurusan') ?></small>

                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>