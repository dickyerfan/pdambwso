<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid mt-2">
            <div class="card">
                <div class="card-header card-outline card-primary shadow">
                    <a class="fw-bold text-dark" style="text-decoration:none ;"><?= strtoupper($title) ?></a>
                    <a href="<?= base_url('karyawan/karyawan_dashboard'); ?>"><button class="btn btn-primary btn-sm float-end"><i class="fas fa-reply"></i> Kembali</button></a>
                </div>
                <div class="p-2">
                    <?= $this->session->flashdata('info'); ?>
                    <?= $this->session->unset_userdata('info'); ?>
                </div>
                <div class="card-body px-2">
                    <div class="card">
                        <!-- <img src="..." class="card-img-top" alt="..."> -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td>Nama Lengkap</td>
                                                <td> : </td>
                                                <td class="fw-bold"><?= $karyawan->nama ?></td>
                                            </tr>
                                            <tr>
                                                <td>Nik</td>
                                                <td> : </td>
                                                <td class="fw-bold"><?= $karyawan->nik ?></td>
                                            </tr>
                                            <tr>
                                                <td>Bagian / UPK</td>
                                                <td> : </td>
                                                <td class="fw-bold"><?= $karyawan->nama_bagian ?></td>
                                            </tr>
                                            <tr>
                                                <td>Jabatan</td>
                                                <td> : </td>
                                                <td class="fw-bold"><?= $karyawan->nama_jabatan ?><?= ' ' ?><?= $karyawan->nama_subag ?></td>
                                            </tr>
                                            <tr>
                                                <td>Status</td>
                                                <td> : </td>
                                                <td class="fw-bold"><?= $karyawan->status_pegawai ?></td>
                                            </tr>
                                            <tr>
                                                <td>Masa Kerja</td>
                                                <td> : </td>
                                                <?php
                                                $waktuMasuk = $karyawan->tgl_masuk;
                                                $waktuSkrng = date('Y-m-d');
                                                $date1 = new DateTime($waktuMasuk);
                                                $date2 = new DateTime($waktuSkrng);
                                                $durasi = $date1->diff($date2);
                                                ?>
                                                <td class="fw-bold"><?= $waktuMasuk == '0000-00-00' ? '-' : $durasi->format('%Y Tahun %m bulan %d hari'); ?></td>
                                            </tr>
                                            <tr>
                                                <td>Tanggal Purna</td>
                                                <td> : </td>
                                                <?php
                                                $waktuLahir = $karyawan->tgl_lahir;
                                                $waktuKerja = '+56 years';
                                                $waktuPurna = DateTime::createFromFormat('Y-m-d', $waktuLahir);
                                                $waktuPurna->modify($waktuKerja);
                                                // Daftar nama bulan dalam bahasa Indonesia
                                                $namaBulan = array(
                                                    'January' => 'Januari',
                                                    'February' => 'Februari',
                                                    'March' => 'Maret',
                                                    'April' => 'April',
                                                    'May' => 'Mei',
                                                    'June' => 'Juni',
                                                    'July' => 'Juli',
                                                    'August' => 'Agustus',
                                                    'September' => 'September',
                                                    'October' => 'Oktober',
                                                    'November' => 'November',
                                                    'December' => 'Desember'
                                                );
                                                // Format tanggal dengan nama bulan dalam bahasa Indonesia
                                                $tanggalPurna = date('d', strtotime($waktuPurna->format('Y-m-d'))) . ' ' . $namaBulan[$waktuPurna->format('F')] . ' ' . $waktuPurna->format('Y');

                                                $waktuSkrng = date('Y');
                                                $sisa = $waktuPurna->format('Y') - $waktuSkrng;
                                                ?>
                                                <!-- <td class="fw-bold"><?= $waktuPurna->format('d F Y'); ?></td> -->
                                                <td class="fw-bold"><?= $tanggalPurna ?></td>
                                            </tr>
                                            <tr>
                                                <td>Sisa Masa Kerja</td>
                                                <td> : </td>
                                                <td class="fw-bold"><?= $sisa ?> Tahun lagi</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <?php
                                function ubahNamaBulan($tanggal)
                                {
                                    $tgl_masuk = strtotime($tanggal);
                                    $day = date('d', $tgl_masuk);
                                    $bln = date('m', $tgl_masuk);
                                    $tahun = date('Y', $tgl_masuk);
                                    switch ($bln) {
                                        case '01':
                                            $bln = "Januari";
                                            break;
                                        case '02':
                                            $bln = "Februari";
                                            break;
                                        case '03':
                                            $bln = "Maret";
                                            break;
                                        case '04':
                                            $bln = "April";
                                            break;
                                        case '05':
                                            $bln = "Mei";
                                            break;
                                        case '06':
                                            $bln = "Juni";
                                            break;
                                        case '07':
                                            $bln = "Juli";
                                            break;
                                        case '08':
                                            $bln = "Agustus";
                                            break;
                                        case '09':
                                            $bln = "September";
                                            break;
                                        case '10':
                                            $bln = "Oktober";
                                            break;
                                        case '11':
                                            $bln = "November";
                                            break;
                                        case '12':
                                            $bln = "Desember";
                                            break;
                                    }
                                    return $day . ' ' . $bln . ' ' . $tahun;
                                }

                                $tanggalMasuk = ubahNamaBulan($karyawan->tgl_masuk);
                                $tanggalLahir = ubahNamaBulan($karyawan->tgl_lahir);
                                ?>
                                <div class="col-md-6">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td>Alamat</td>
                                                <td> : </td>
                                                <td class="fw-bold"><?= $karyawan->alamat ?></td>
                                            </tr>
                                            <tr>
                                                <td>Agama</td>
                                                <td> : </td>
                                                <td class="fw-bold"><?= $karyawan->agama ?></td>
                                            </tr>
                                            <tr>
                                                <td>No HP</td>
                                                <td> : </td>
                                                <td class="fw-bold"><?= $karyawan->no_hp ?></td>
                                            </tr>
                                            <tr>
                                                <td>Jenis Kelamin</td>
                                                <td> : </td>
                                                <td class="fw-bold"><?= $karyawan->jenkel ?></td>
                                            </tr>
                                            <tr>
                                                <td>Tempat lahir</td>
                                                <td> : </td>
                                                <td class="fw-bold"><?= $karyawan->tmp_lahir ?></td>
                                            </tr>
                                            <tr>
                                                <td>Tanggal Lahir</td>
                                                <td> : </td>
                                                <td class="fw-bold"><?= $tanggalLahir ?></td>
                                            </tr>
                                            <tr>
                                                <td>Tanggal Masuk</td>
                                                <td> : </td>
                                                <td class="fw-bold"><?= $karyawan->tgl_masuk == '0000-00-00' ? '-' : $tanggalMasuk  ?></td>
                                            </tr>
                                            <tr>
                                                <td>Aktif</td>
                                                <td> : </td>
                                                <td class="fw-bold"><?= $karyawan->aktif == 1 ? 'Karyawan Aktif' : 'Karyawan Purna' ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>