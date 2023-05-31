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
                        <div style="font-size: 0.8rem;"> Data Arsip/Dokumen</div>
                    </a>
                    <a class="nav-link" href="<?= base_url('karyawan/karyawan_pengguna') ?>">
                        <div class="sb-nav-link-icon"><i class="fas fa-users fa-fw"></i></div>
                        <div style="font-size: 0.8rem;"> Data Karyawan</div>
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