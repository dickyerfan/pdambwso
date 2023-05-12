<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <a class="nav-link" href="<?= $this->session->userdata('level') == 'Admin' ? base_url('dashboard') : base_url('pengguna') ?>">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt fa-fw"></i></div>
                        <div style="font-size: 0.8rem;"> Dashboard</div>
                    </a>
                    <a class="nav-link" href="<?= base_url('arsip') ?>">
                        <div class="sb-nav-link-icon"><i class="fas fa-file fa-fw"></i></div>
                        <div style="font-size: 0.8rem;"> Data Arsip File</div>
                    </a>
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#dataKaryawan" aria-expanded="false" aria-controls="dataKaryawan">
                        <div class="sb-nav-link-icon"><i class="fas fa-users fa-fw"></i></div>
                        <div style="font-size: 0.8rem;"> Data Karyawan</div>
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="dataKaryawan" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="<?= base_url('karyawan/karyawan_dashboard') ?>" style="font-size: 0.8rem;">Dashboard Karyawan</a>
                            <a class="nav-link" href="<?= base_url('karyawan/karyawan_semua') ?>" style="font-size: 0.8rem;">Semua Karyawan</a>
                            <a class="nav-link" href="<?= base_url('karyawan/karyawan_mutasi') ?>" style="font-size: 0.8rem;">Mutasi Karyawan</a>
                            <a class="nav-link" href="<?= base_url('karyawan/karyawan_tetap') ?>" style="font-size: 0.8rem;">Karyawan Tetap</a>
                            <a class="nav-link" href="<?= base_url('karyawan/karyawan_kontrak') ?>" style="font-size: 0.8rem;">Karyawan Kontrak</a>
                            <a class="nav-link" href="<?= base_url('karyawan/karyawan_honorer') ?>" style="font-size: 0.8rem;">Karyawan Honorer</a>
                            <a class="nav-link" href="<?= base_url('karyawan/karyawan_purna') ?>" style="font-size: 0.8rem;">Karyawan Purna</a>
                        </nav>
                    </div>
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#dataPekerjaan" aria-expanded="false" aria-controls="dataPekerjaan">
                        <div class="sb-nav-link-icon"><i class="fas fa-briefcase fa-fw"></i></div>
                        <div style="font-size: 0.8rem;"> Data Pekerjaan</div>
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="dataPekerjaan" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="<?= base_url('pekerjaan/pekerjaan') ?>" style="font-size: 0.8rem;">Dashboard Pekerjaan</a>
                            <a class="nav-link" href="<?= base_url('pekerjaan/bagian') ?>" style="font-size: 0.8rem;">Daftar Bagian</a>
                            <a class="nav-link" href="<?= base_url('pekerjaan/subag') ?>" style="font-size: 0.8rem;">Daftar Sub Bagian/UPK</a>
                            <a class="nav-link" href="<?= base_url('pekerjaan/jabatan') ?>" style="font-size: 0.8rem;">Daftar Jabatan</a>
                        </nav>
                    </div>
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#dataKendaraan" aria-expanded="false" aria-controls="dataKendaraan">
                        <div class="sb-nav-link-icon"><i class="fas fa-car fa-fw"></i></div>
                        <div style="font-size: 0.8rem;"> Data Kendaraan</div>
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="dataKendaraan" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="<?= base_url('kendaraan/kendaraan_semua') ?>" style="font-size: 0.8rem;">Daftar Kendaraan</a>
                            <a class="nav-link" href="<?= base_url('kendaraan/kendaraan_orang') ?>" style="font-size: 0.8rem;">Pemegang Kendaraan</a>
                            <a class="nav-link" href="<?= base_url('kendaraan/merk') ?>" style="font-size: 0.8rem;">Daftar Merek</a>
                            <a class="nav-link" href="<?= base_url('kendaraan/type') ?>" style="font-size: 0.8rem;">Daftar Type</a>
                        </nav>
                    </div>
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#datarekening" aria-expanded="false" aria-controls="datarekening">
                        <div class="sb-nav-link-icon"><i class="fas fa-file-invoice fa-fw"></i></div>
                        <div style="font-size: 0.8rem;"> Data Rekening</div>
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="datarekening" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="<?= base_url('rekening/input_data') ?>" style="font-size: 0.8rem;">Input Data</a>
                            <a class="nav-link" href="<?= base_url('rekening/nama_upk') ?>" style="font-size: 0.8rem;">Daftar UPK</a>
                            <a class="nav-link" href="<?= base_url('rekening/rekening_jumlah') ?>" style="font-size: 0.8rem;">Jumlah Rekening</a>
                            <a class="nav-link" href="<?= base_url('rekening/rekening_pakai') ?>" style="font-size: 0.8rem;">Air Terpakai</a>
                            <a class="nav-link" href="<?= base_url('rekening/rekening_rupiah') ?>" style="font-size: 0.8rem;">Pendapatan</a>
                        </nav>
                    </div>
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#dataUser" aria-expanded="false" aria-controls="dataUser">
                        <div class="sb-nav-link-icon"><i class="fas fa-user fa-fw"></i></div>
                        <div style="font-size: 0.8rem;"> Data User</div>
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="dataUser" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="<?= base_url('user/admin') ?>" style="font-size: 0.8rem;">Data Admin</a>
                            <a class="nav-link" href="<?= base_url('user/user') ?>" style="font-size: 0.8rem;">Data Pengguna</a>
                        </nav>
                    </div>
                    <a class="nav-link" href="<?= base_url('backup') ?>">
                        <div class="sb-nav-link-icon"><i class="fas fa-database fa-fw"></i></div>
                        <div style="font-size: 0.8rem;"> Backup & Restore</div>
                    </a>
                    <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#logoutModal">
                        <div class="sb-nav-link-icon"><i class="fas fa-sign-out-alt fa-fw"></i></div>
                        <div style="font-size: 0.8rem;"> Logout</div>
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
            <div class="sb-sidenav-footer">
                <div class="small" style="font-size: 0.7rem;">Anda Login sebagai :</div>
                <div class="small" style="font-size: 0.7rem;"><?= $this->session->userdata('level'); ?></div>
            </div>
        </nav>
    </div>