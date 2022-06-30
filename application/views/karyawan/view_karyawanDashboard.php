<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-2 mt-2">
            <div class="card">
                <div class="card-header card-primary shadow">
                    <h3 class="card-title">Dashboard Karyawan</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card bg-danger shadow">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <a href="<?= base_url('karyawan/karyawan_tetap') ?>" class="text-decoration-none fw-bold text-dark text-uppercase">
                                                Daftar Karyawan Tetap</a>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $kartetap ?></div>
                                            <a href="<?= base_url('karyawan/karyawan_tetap') ?>" class="text-decoration-none text-light fst-italic"><small>Detail</small></a>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-users fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card bg-success shadow">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <a href="<?= base_url('karyawan/karyawan_kontrak') ?>" class="text-decoration-none fw-bold text-dark text-uppercase">
                                                Daftar Karyawan Kontrak</a>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $karkontrak; ?></div>
                                            <a href="<?= base_url('karyawan/karyawan_kontrak') ?>" class="text-decoration-none text-light fst-italic"><small>Detail</small></a>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user-md fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card bg-warning shadow">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <a href="<?= base_url('karyawan/karyawan_honorer') ?>" class="text-decoration-none fw-bold text-dark text-uppercase">
                                                Daftar Karyawan honorer</a>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $karhonorer; ?></div>
                                            <a href="<?= base_url('karyawan/karyawan_honorer') ?>" class="text-decoration-none text-light fst-italic"><small>Detail</small></a>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card bg-primary shadow">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <a href="<?= base_url('karyawan/karyawan_semua') ?>" class="text-decoration-none fw-bold text-dark text-uppercase">
                                                Daftar Karyawan Total</a>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $kartotal; ?></div>
                                            <a href="<?= base_url('karyawan/karyawan_semua') ?>" class="text-decoration-none text-light fst-italic"><small>Detail</small></a>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>