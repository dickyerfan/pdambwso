<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-2 mt-2">
            <div class="card">
                <!-- <div class="card-header card-primary shadow">
                    <h5 class="card-title"><?= $title ?></h5>
                    <a href="<?= base_url('arsip/tambah'); ?>"><button class="btn btn-primary btn-sm float-end"><i class="fas fa-plus"></i> Tambah Data</button></a>
                </div> -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-3 col-md-6 mb-1">
                            <div class="card border-0 bg-danger shadow">
                                <div class="card-body bg-light cardEffect border-start border-danger border-5 rounded">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <a href="<?= base_url('arsip/skep') ?>" class="text-decoration-none fw-bold text-dark text-uppercase" style="font-size: 0.8rem;">
                                                Surat Keputusan</a>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $sk ?></div>
                                            <!-- <a href="<?= base_url('arsip/skep') ?>" class="text-decoration-none text-light fst-italic"><small>Detail</small></a> -->
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-file fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 mb-1">
                            <div class="card border-0 bg-success shadow">
                                <div class="card-body bg-light cardEffect border-start border-success border-5 rounded">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <a href="<?= base_url('arsip/peraturan') ?>" class="text-decoration-none fw-bold text-dark text-uppercase" style="font-size: 0.8rem;">
                                                Peraturan</a>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $per ?></div>
                                            <!-- <a href="<?= base_url('arsip/peraturan') ?>" class="text-decoration-none text-light fst-italic"><small>Detail</small></a> -->
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-file fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 mb-1">
                            <div class="card border-0 bg-warning shadow">
                                <div class="card-body bg-light cardEffect border-start border-warning border-5 rounded">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <a href="<?= base_url('arsip/berker') ?>" class="text-decoration-none fw-bold text-dark text-uppercase" style="font-size: 0.8rem;">
                                                Berkas Kerja</a>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $bk ?></div>
                                            <!-- <a href="<?= base_url('arsip/berker') ?>" class="text-decoration-none text-light fst-italic"><small>Detail</small></a> -->
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-file fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 mb-1">
                            <div class="card border-0 bg-primary shadow">
                                <div class="card-body bg-light cardEffect border-start border-primary border-5 rounded">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <a href="<?= base_url('arsip/dokumen') ?>" class="text-decoration-none fw-bold text-dark text-uppercase" style="font-size: 0.8rem;">
                                                Dokumen</a>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $dk ?></div>
                                            <!-- <a href="<?= base_url('arsip/dokumen') ?>" class="text-decoration-none text-light fst-italic"><small>Detail</small></a> -->
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-file fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="row justify-content-center">
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card bg-primary shadow">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <a href="<?= base_url('karyawan/karyawan_semua') ?>" class="text-decoration-none fw-bold text-dark text-uppercase">
                                                Total Arsip</a>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">10</div>
                                            <a href="<?= base_url('karyawan/karyawan_semua') ?>" class="text-decoration-none text-light fst-italic"><small>Detail</small></a>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-file fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
            <div class="card">
                <div class="card-header card-outline card-primary shadow">
                    <a class="fw-bold text-dark" style="text-decoration:none ;"><?= strtoupper($title) ?></a>
                    <a href="<?= $this->session->userdata('level') == 'Admin' ? base_url('arsip/tambah') : '#'; ?>"><button class="btn btn-primary btn-sm float-end" data-bs-toggle="tooltip" title="Hanya Admin yang bisa upload data" style="background: #f0f0f0; border: none; border-radius: 20px; box-shadow: 2px 2px 2px #eee, inset 8px 8px 8px #ffffff, inset -8px -8px 8px #cbced1; color: #333;font-size: 1rem; padding: .3rem .7rem; font-size:.7rem" onMouseOver="this.style.backgroundColor='#cbced1'" onMouseOut="this.style.backgroundColor='#ffffff'"><i class="fas fa-plus"></i> Upload Data</button></a>
                </div>
                <div class="p-2">
                    <?= $this->session->flashdata('info'); ?>
                    <?= $this->session->unset_userdata('info'); ?>
                </div>
                <div class="card-body">
                    <div class="table-responsive" style="font-size: 0.7rem;">
                        <table id="example" class="table table-hover table-striped table-bordered table-sm" width="100%" cellspacing="0">
                            <thead>
                                <tr class="bg-secondary">
                                    <th class="text-center">No</th>
                                    <th class="text-center" width="10%">Action</th>
                                    <th class="text-center">Jenis</th>
                                    <th class="text-center">Nama Dokumen</th>
                                    <th class="text-center">Tentang</th>
                                    <th class="text-center">Tahun</th>
                                    <!-- <th class="text-center">Tgl Dokumen</th>
                                    <th class="text-center">Tgl Upload</th> -->
                                    <!-- <th class="text-center" width="8%">Download</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($arsip as $row) :
                                ?>
                                    <tr>
                                        <td class="text-center"><small><?= $no++ ?></small></td>
                                        <td class="text-center">
                                            <a href="<?= $this->session->userdata('level') == 'Admin' ? base_url('arsip/edit/' . $row->id_arsip) : '#' ?>"><i class=" fas fa-fw fa-edit" data-bs-toggle="tooltip" title="Klik untuk Edit Data"></i></a>
                                            <a href="<?= $this->session->userdata('level') == 'Admin' ? base_url('arsip/hapus/' . $row->id_arsip) : '#' ?>"><i class="fas fa-fw fa-trash" style="color: red;" data-bs-toggle="tooltip" title="Klik untuk Hapus Data"></i></a>
                                            <a href="<?= base_url('arsip/detail/') ?><?= $row->id_arsip; ?>"><i class="fas fa-fw fa-circle-info" style="color: black;" data-bs-toggle="tooltip" title="Klik untuk lihat Detail Data"></i></a>
                                            <a href="<?= base_url('arsip/download/') ?><?= $row->id_arsip; ?>"> <i class="fas fa-download" style="text-decoration:none; color:green;" data-bs-toggle="tooltip" title="Klik untuk Download Data"></i></a>
                                            <a href="<?= base_url('arsip/baca/') ?><?= $row->id_arsip; ?>" target="_blank"><i class="fas fa-book-open" style="text-decoration:none; color:orange;" data-bs-toggle="tooltip" title="Klik untuk Baca Data"></i> </a>
                                        </td>
                                        <td><?= $row->jenis ?></td>
                                        <td><?= $row->nama_dokumen ?></td>
                                        <td><?= $row->tentang ?></td>
                                        <td class="text-center"><?= $row->tahun ?></td>
                                        <!-- <td><?= $row->tgl_dokumen ?></td>
                                        <td><?= $row->tgl_upload ?></td> -->
                                        <!-- <td class="text-center">
                                            <a href="<?= base_url('arsip/download/') ?><?= $row->id_arsip; ?>"> <i class="fas fa-download" style="text-decoration:none; color:green;"></i></a>
                                            <a href="<?= base_url('arsip/baca/') ?><?= $row->id_arsip; ?>" target="_blank"><i class="fas fa-book-open" style="text-decoration:none; color:orange;"></i> </a>
                                        </td> -->
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>