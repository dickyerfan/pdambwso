<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <a class="nav-link" href="<?= base_url('dashboard') ?>">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#dataKaryawan" aria-expanded="false" aria-controls="dataKaryawan">
                        <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                        Data Karyawan
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="dataKaryawan" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="<?= base_url('karyawan/karyawan_dashboard') ?>">Dashboard Karyawan</a>
                            <a class="nav-link" href="<?= base_url('karyawan/karyawan_semua') ?>">Semua Karyawan</a>
                            <a class="nav-link" href="<?= base_url('karyawan/karyawan_mutasi') ?>">Mutasi Karyawan</a>
                            <a class="nav-link" href="<?= base_url('karyawan/karyawan_tetap') ?>">Karyawan Tetap</a>
                            <a class="nav-link" href="<?= base_url('karyawan/karyawan_kontrak') ?>">Karyawan Kontrak</a>
                            <a class="nav-link" href="<?= base_url('karyawan/karyawan_honorer') ?>">Karyawan Honorer</a>
                        </nav>
                    </div>
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#dataPekerjaan" aria-expanded="false" aria-controls="dataPekerjaan">
                        <div class="sb-nav-link-icon"><i class="fas fa-briefcase"></i></div>
                        Data Pekerjaan
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="dataPekerjaan" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="<?= base_url('pekerjaan/pekerjaan') ?>">Dashboard Pekerjaan</a>
                            <a class="nav-link" href="<?= base_url('pekerjaan/bagian') ?>">Daftar Bagian</a>
                            <a class="nav-link" href="<?= base_url('pekerjaan/subag') ?>">Daftar Sub Bagian/UPK</a>
                            <a class="nav-link" href="<?= base_url('pekerjaan/jabatan') ?>">Daftar Jabatan</a>
                        </nav>
                    </div>
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#dataKendaraan" aria-expanded="false" aria-controls="dataKendaraan">
                        <div class="sb-nav-link-icon"><i class="fas fa-car"></i></div>
                        Data Kendaraan
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="dataKendaraan" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="<?= base_url('kendaraan/kendaraan_semua') ?>">Daftar Kendaraan</a>
                            <a class="nav-link" href="<?= base_url('kendaraan/kendaraan_orang') ?>">Pemegang Kendaraan</a>
                            <a class="nav-link" href="<?= base_url('kendaraan/merk') ?>">Daftar Merek</a>
                            <a class="nav-link" href="<?= base_url('kendaraan/type') ?>">Daftar Type</a>
                        </nav>
                    </div>
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#dataUser" aria-expanded="false" aria-controls="dataUser">
                        <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                        Data User
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="dataUser" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="<?= base_url('user/admin') ?>">Data Admin</a>
                            <a class="nav-link" href="<?= base_url('user/user') ?>">Data User</a>
                        </nav>
                    </div>
                    <a class="nav-link" href="<?= base_url('backup') ?>">
                        <div class="sb-nav-link-icon"><i class="fas fa-database"></i></div>
                        Backup & Restore
                    </a>
                    <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#logoutModal">
                        <div class="sb-nav-link-icon"><i class="fas fa-sign-out-alt"></i></div>
                        Logout
                    </a>
                    <!-- <div class="sb-sidenav-menu-heading">Addons</div> -->
                    <!-- <a class="nav-link" href="<?= base_url('chart') ?>">
                        <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                        Master Charts
                    </a>
                    <a class="nav-link" href="<?= base_url('tabel') ?>">
                        <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                        Master Tables
                    </a> -->
                </div>
            </div>
            <!-- <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    Start Bootstrap
                </div> -->
        </nav>
    </div>