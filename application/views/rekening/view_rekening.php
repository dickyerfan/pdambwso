<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-1 mt-1">
            <div class="card">
                <div class="card-header shadow text-center">
                    <?php
                    if (isset($_POST['pilih'])) {
                        $tahun = $this->input->post('tahun');
                    } else {
                        $tahun = date('Y');
                    }
                    ?>
                    <a href="#"><button class="neumorphic-button float-end" data-bs-toggle="modal" data-bs-target="#daftarUpk" data-bs-toggle="tooltip" title="Hanya Admin yang bisa lihat data"> Daftar UPK</button></a>
                    <a href="#"><button class="neumorphic-button float-start" data-bs-toggle="modal" data-bs-target="#inputData" data-bs-toggle="tooltip" title="Hanya Admin yang bisa input data"> Input Data</button></a>
                    <a class="fw-bold text-dark" style="text-decoration:none ;"><?= strtoupper($titlePendapatan) ?> <?= $tahun ?></a>
                </div>
                <div class="card-body">
                    <?= $this->session->flashdata('info'); ?>
                    <?= $this->session->unset_userdata('info'); ?>
                    <form action="" method="post">
                        <div class="row mb-1 justify-content-end">
                            <div class="col-md-2">
                                <button class="neumorphic-button float-end" name="pilih" type="submit">Pilih Tahun</button>
                            </div>
                            <div class="col-md-2">
                                <select name="tahun" id="tahun" class="form-select form-select-sm">
                                    <?php
                                    $mulai = date('Y') - 1;
                                    for ($i = $mulai; $i < $mulai + 11; $i++) {
                                        $sel = $i == date('Y') ? ' selected="selected"' : '';
                                        echo '<option value="' . $i . '"' . $sel . '>' . $i . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </form>
                    <div class="row g-0">
                        <div class="col">
                            <div class="table-responsive">
                                <table id="" class="table table-hover table-striped table-bordered table-sm font" width="100%" cellspacing="0">
                                    <thead>
                                        <tr class="border-dark bg-primary text-light">
                                            <th class=" text-center">No</th>
                                            <th class=" text-center">Nama UPK</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($upk as $row) :
                                            $namaUpk = strtolower(str_replace(" ", "", $row->nama_upk));
                                        ?>
                                            <tr class="border-dark">
                                                <td class="fw-bold text-center"><?= $no++ ?></td>
                                                <td class="fw-bold" data-bs-toggle="modal" data-bs-target="#<?= $namaUpk; ?>"><?= $row->nama_upk; ?></a> </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                    <tfoot>
                                        <tr class="border-dark">
                                            <td></td>
                                            <td class="fw-bold text-center bg-secondary text-light">Jumlah</td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <?php
                        $months = [
                            'Jan' => [$jan, $totalJan],
                            'Feb' => [$feb, $totalFeb],
                            'Mar' => [$mar, $totalMar],
                            'Apr' => [$apr, $totalApr],
                            'Mei' => [$mei, $totalMei],
                            'Jun' => [$jun, $totalJun],
                            'Jul' => [$jul, $totalJul],
                            'Ags' => [$ags, $totalAgs],
                            'Sep' => [$sep, $totalSep],
                            'Okt' => [$okt, $totalOkt],
                            'Nov' => [$nov, $totalNov],
                            'Des' => [$des, $totalDes]
                        ];

                        foreach ($months as $month => [$data, $total]) :
                        ?>
                            <div class="col">
                                <div class="table-responsive">
                                    <table id="" class="table table-hover table-striped table-bordered table-sm font" width="100%" cellspacing="0">
                                        <thead>
                                            <tr class="border-dark bg-primary text-light">
                                                <th class=" text-center"><?= $month ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($data as $row) : ?>
                                                <tr class="border-dark">
                                                    <td class="text-end fw-bold"><?= number_format($row->rupiah, '0', ',', '.'); ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                        <tfoot>
                                            <tr class="border-dark">
                                                <td class="fw-bold text-end bg-secondary text-light"><?= number_format($total, '0', ',', '.'); ?></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid px-1 mt-1">
            <div class="card">
                <div class="card-header card-outline card-primary shadow">
                    <h5 class="card-title text-center">Grafik Jumlah Pendapatan Konsolidasi <?= $tahun ?></h5>
                </div>
                <div class="card-body">
                    <div class="chart">
                        <canvas id="allRupiah" width="100%" height="40"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <?php
        $upks = [
            1 => 'bondowoso',
            2 => 'sukosari1',
            3 => 'maesan',
            4 => 'tegalampel',
            5 => 'tapen',
            6 => 'prajekan',
            7 => 'tlogosari',
            8 => 'wringin',
            9 => 'curahdami',
            10 => 'tamanan',
            11 => 'tenggarang',
            12 => 'tamankrocok',
            13 => 'wonosari',
            14 => 'klabang',
            15 => 'sukosari2',
        ];

        $titles = [
            1 => 'Grafik Pendapatan UPK Bondowoso',
            2 => 'Grafik Pendapatan UPK Sukosari 1',
            3 => 'Grafik Pendapatan UPK Maesan',
            4 => 'Grafik Pendapatan UPK Tegalampel',
            5 => 'Grafik Pendapatan UPK Tapen',
            6 => 'Grafik Pendapatan UPK Prajekan',
            7 => 'Grafik Pendapatan UPK Tlogosari',
            8 => 'Grafik Pendapatan UPK Wringin',
            9 => 'Grafik Pendapatan UPK Curahdami',
            10 => 'Grafik Pendapatan UPK Tamanan',
            11 => 'Grafik Pendapatan UPK Tenggarang',
            12 => 'Grafik Pendapatan UPK Tamankrocok',
            13 => 'Grafik Pendapatan UPK Wonosari',
            14 => 'Grafik Pendapatan UPK Klabang',
            15 => 'Grafik Pendapatan UPK Sukosari 2',
        ];

        for ($i = 1; $i <= 15; $i++) {
            $namaUpk = $upks[$i];
            $title = $titles[$i];
        ?>
            <!-- Modal Detail Pendapatan UPK  -->
            <div class="modal fade" id="<?= $namaUpk; ?>" tabindex="-1" aria-labelledby="exampleChart<?= $i; ?>" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header bg-warning">
                            <h5 class="modal-title" id="exampleChart<?= $i; ?>"><?= $title . ' tahun  ' . $tahun; ?></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="chart">
                                <canvas id="<?= $i; ?>Rupiah" width="100%" height="30"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Modal Detail Pendapatan UPK  -->
        <?php
        }
        ?>
    </main>
    <main>
        <div class="container-fluid px-1 mt-1">
            <div class="card">
                <div class="card-header shadow text-center">
                    <?php
                    if (isset($_POST['pilih'])) {
                        $tahun = $this->input->post('tahun');
                    } else {
                        $tahun = date('Y');
                    }
                    ?>
                    <a class="fw-bold text-dark" style="text-decoration:none ;"><?= strtoupper($titleJumrek) ?> <?= $tahun ?></a>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="row mb-1 justify-content-end">
                            <div class="col-md-2">
                                <button class="neumorphic-button float-end" name="pilih" type="submit">Pilih Tahun</button>
                            </div>
                            <div class="col-md-2">
                                <select name="tahun" id="tahun" class="form-select form-select-sm">
                                    <?php
                                    $mulai = date('Y') - 1;
                                    for ($i = $mulai; $i < $mulai + 11; $i++) {
                                        $sel = $i == date('Y') ? ' selected="selected"' : '';
                                        echo '<option value="' . $i . '"' . $sel . '>' . $i . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </form>
                    <div class="row g-0">
                        <div class="col">
                            <div class="table-responsive">
                                <table id="" class="table table-hover table-striped table-bordered table-sm font" width="100%" cellspacing="0">
                                    <thead>
                                        <tr class="border-dark bg-primary text-light">
                                            <th class=" text-center">No</th>
                                            <th class=" text-center">Nama UPK</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($upk as $row) :
                                            $jumRekUpk = "jumRek" . strtolower(str_replace(" ", "", $row->nama_upk));
                                        ?>
                                            <tr class="border-dark">
                                                <td class="fw-bold text-center"><?= $no++ ?></td>
                                                <td class="fw-bold" data-bs-toggle="modal" data-bs-target="#<?= $jumRekUpk; ?>"><?= $row->nama_upk; ?></a> </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                    <tfoot>
                                        <tr class="border-dark">
                                            <td></td>
                                            <td class="fw-bold text-center bg-secondary text-light">Jumlah</td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <?php
                        $months = [
                            'Jan' => [$jan, $totalJan2],
                            'Feb' => [$feb, $totalFeb2],
                            'Mar' => [$mar, $totalMar2],
                            'Apr' => [$apr, $totalApr2],
                            'Mei' => [$mei, $totalMei2],
                            'Jun' => [$jun, $totalJun2],
                            'Jul' => [$jul, $totalJul2],
                            'Ags' => [$ags, $totalAgs2],
                            'Sep' => [$sep, $totalSep2],
                            'Okt' => [$okt, $totalOkt2],
                            'Nov' => [$nov, $totalNov2],
                            'Des' => [$des, $totalDes2]
                        ];

                        $no = 1;
                        foreach ($months as $month => [$data, $total2]) :
                        ?>
                            <div class="col">
                                <div class="table-responsive">
                                    <table id="" class="table table-hover table-striped table-bordered table-sm font" width="100%" cellspacing="0">
                                        <thead>
                                            <tr class="border-dark bg-primary text-light">
                                                <th class=" text-center"><?= $month ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($data as $row) : ?>
                                                <tr class="border-dark">
                                                    <td class="text-end fw-bold"><?= number_format($row->jml_rek, '0', ',', '.'); ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                        <tfoot>
                                            <tr class="border-dark">
                                                <td class="fw-bold text-end bg-secondary text-light"><?= number_format($total2, '0', ',', '.'); ?></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid px-1 mt-1">
            <div class="card">
                <div class="card-header card-outline card-primary shadow">
                    <h5 class="card-title text-center">Grafik Jumlah Rekening Konsolidasi <?= $tahun ?></h5>
                </div>
                <div class="card-body">
                    <div class="chart">
                        <canvas id="allRek" width="100%" height="40"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <?php
        $upks = [
            1 => 'bondowoso',
            2 => 'sukosari1',
            3 => 'maesan',
            4 => 'tegalampel',
            5 => 'tapen',
            6 => 'prajekan',
            7 => 'tlogosari',
            8 => 'wringin',
            9 => 'curahdami',
            10 => 'tamanan',
            11 => 'tenggarang',
            12 => 'tamankrocok',
            13 => 'wonosari',
            14 => 'klabang',
            15 => 'sukosari2',
        ];

        $titles = [
            1 => 'Grafik Jumlah Rekening UPK Bondowoso',
            2 => 'Grafik Jumlah Rekening UPK Sukosari 1',
            3 => 'Grafik Jumlah Rekening UPK Maesan',
            4 => 'Grafik Jumlah Rekening UPK Tegalampel',
            5 => 'Grafik Jumlah Rekening UPK Tapen',
            6 => 'Grafik Jumlah Rekening UPK Prajekan',
            7 => 'Grafik Jumlah Rekening UPK Tlogosari',
            8 => 'Grafik Jumlah Rekening UPK Wringin',
            9 => 'Grafik Jumlah Rekening UPK Curahdami',
            10 => 'Grafik Jumlah Rekening UPK Tamanan',
            11 => 'Grafik Jumlah Rekening UPK Tenggarang',
            12 => 'Grafik Jumlah Rekening UPK Tamankrocok',
            13 => 'Grafik Jumlah Rekening UPK Wonosari',
            14 => 'Grafik Jumlah Rekening UPK Klabang',
            15 => 'Grafik Jumlah Rekening UPK Sukosari 2',
        ];

        for ($i = 1; $i <= 15; $i++) {
            $namaUpk = $upks[$i];
            $title = $titles[$i];
        ?>
            <!-- Modal Detail Pendapatan UPK  -->
            <div class="modal fade" id="jumRek<?= $namaUpk; ?>" tabindex="-1" aria-labelledby="exampleChartJumRek<?= $i; ?>" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header bg-warning">
                            <h5 class="modal-title" id="exampleChartJumRek<?= $i; ?>"><?= $title . ' tahun  ' . $tahun; ?></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="chart">
                                <canvas id="<?= $i; ?>jumRek" width="100%" height="30"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Modal Detail Pendapatan UPK  -->
        <?php
        }
        ?>
    </main>
    <main>
        <div class="container-fluid px-1 mt-1">
            <div class="card">
                <div class="card-header shadow text-center">
                    <?php
                    if (isset($_POST['pilih'])) {
                        $tahun = $this->input->post('tahun');
                    } else {
                        $tahun = date('Y');
                    }
                    ?>
                    <a class="fw-bold text-dark" style="text-decoration:none ;"><?= strtoupper($titleAirPakai) ?> <?= $tahun ?></a>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="row mb-1 justify-content-end">
                            <div class="col-md-2">
                                <button class="neumorphic-button float-end" name="pilih" type="submit">Pilih Tahun</button>
                            </div>
                            <div class="col-md-2">
                                <select name="tahun" id="tahun" class="form-select form-select-sm">
                                    <?php
                                    $mulai = date('Y') - 1;
                                    for ($i = $mulai; $i < $mulai + 11; $i++) {
                                        $sel = $i == date('Y') ? ' selected="selected"' : '';
                                        echo '<option value="' . $i . '"' . $sel . '>' . $i . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </form>
                    <div class="row g-0">
                        <div class="col">
                            <div class="table-responsive">
                                <table id="" class="table table-hover table-striped table-bordered table-sm font" width="100%" cellspacing="0">
                                    <thead>
                                        <tr class="border-dark bg-primary text-light">
                                            <th class=" text-center">No</th>
                                            <th class=" text-center">Nama UPK</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($upk as $row) :
                                            $airPakaiUpk = "airPakai" . strtolower(str_replace(" ", "", $row->nama_upk));
                                        ?>
                                            <tr class="border-dark">
                                                <td class="fw-bold text-center"><?= $no++ ?></td>
                                                <td class="fw-bold" data-bs-toggle="modal" data-bs-target="#<?= $airPakaiUpk; ?>"><?= $row->nama_upk; ?></a> </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                    <tfoot>
                                        <tr class="border-dark">
                                            <td></td>
                                            <td class="fw-bold text-center bg-secondary text-light">Jumlah</td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <?php
                        $months = [
                            'Jan' => [$jan, $totalJan3],
                            'Feb' => [$feb, $totalFeb3],
                            'Mar' => [$mar, $totalMar3],
                            'Apr' => [$apr, $totalApr3],
                            'Mei' => [$mei, $totalMei3],
                            'Jun' => [$jun, $totalJun3],
                            'Jul' => [$jul, $totalJul3],
                            'Ags' => [$ags, $totalAgs3],
                            'Sep' => [$sep, $totalSep3],
                            'Okt' => [$okt, $totalOkt3],
                            'Nov' => [$nov, $totalNov3],
                            'Des' => [$des, $totalDes3]
                        ];

                        $no = 1;
                        foreach ($months as $month => [$data, $total3]) :
                        ?>
                            <div class="col">
                                <div class="table-responsive">
                                    <table id="" class="table table-hover table-striped table-bordered table-sm font" width="100%" cellspacing="0">
                                        <thead>
                                            <tr class="border-dark bg-primary text-light">
                                                <th class=" text-center"><?= $month ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($data as $row) : ?>
                                                <tr class="border-dark">
                                                    <td class="text-end fw-bold"><?= number_format($row->air_pakai, '0', ',', '.'); ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                        <tfoot>
                                            <tr class="border-dark">
                                                <td class="fw-bold text-end bg-secondary text-light"><?= number_format($total3, '0', ',', '.'); ?></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid px-1 mt-1">
            <div class="card">
                <div class="card-header card-outline card-primary shadow">
                    <h5 class="card-title text-center">Grafik Jumlah Rekening Konsolidasi <?= $tahun ?></h5>
                </div>
                <div class="card-body">
                    <div class="chart">
                        <canvas id="allPakai" width="100%" height="40"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Daftar UPK -->
        <?php if ($this->session->userdata('level') == 'Admin') : ?>
            <div class="modal fade" id="daftarUpk" tabindex="-1" aria-labelledby="exampledaftarUpk" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-danger">
                            <h5 class="modal-title text-uppercase" id="exampledaftarUpk">Daftar UPK</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="card">
                            <div class="card-header shadow">
                                <a href="#"><button class="neumorphic-button float-end" data-bs-toggle="modal" data-bs-target="#inputUpk"><i class="fas fa-plus"></i> Tambah UPK</button></a>
                            </div>
                            <!-- <div class="p-2">
                        <?= $this->session->flashdata('info'); ?>
                        <?= $this->session->unset_userdata('info'); ?>
                    </div> -->
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="table table-hover table-striped table-bordered table-sm" width="100%" cellspacing="0">
                                        <thead>
                                            <tr class="bg-secondary">
                                                <th class="text-center">No</th>
                                                <th class="text-center">Nama UPK</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($upk as $row) :
                                            ?>
                                                <tr>
                                                    <td class="text-center"><small><?= $no++ ?></small></td>
                                                    <td><?= $row->nama_upk ?></td>
                                                    <td class="text-center">
                                                        <a href="#"><span data-bs-toggle="modal" data-bs-target="#editUpk<?= $row->id_upk; ?>" data-bs-toggle="tooltip" title="Klik untuk Edit Data"><i class="fas fa-fw fa-edit"></i></span></a>
                                                        <a href="<?= site_url('rekening/rekening/hapusUpk/' . $row->id_upk); ?>" class="tombolHapus" style="color: red;" data-bs-toggle="tooltip" title="Klik untuk Hapus Data"><i class="fas fa-fw fa-trash"></i></a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <!-- End Modal Daftar UPK -->

        <!-- Modal Input UPK -->
        <div class="modal fade" id="inputUpk" tabindex="-1" aria-labelledby="exampleInputUpk" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-warning">
                        <h5 class="modal-title text-uppercase" id="exampleInputUpk">Input U P K</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url('rekening/rekening/tambahUpk') ?>" method="POST">
                            <div class="mb-2">
                                <label for="nama_upk">Nama UPK :</label>
                                <input type="text" class="form-control" id="nama_upk" name="nama_upk" placeholder="Masukan Nama Upk" value="<?= set_value('nama_upk'); ?>">
                                <small class="form-text text-danger pl-3"><?= form_error('nama_upk'); ?></small>
                            </div>
                            <button type="submit" class="neumorphic-button" name="inputUpk">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal Input UPK -->

        <!-- Modal Edit UPK -->
        <?php
        foreach ($upk as $row) : ?>
            <div class="row">
                <div id="editUpk<?= $row->id_upk; ?>" class="modal fade" tabindex="-1" aria-labelledby="exampleEditUpk" aria-hidden="true">
                    <div class="modal-dialog">
                        <form action="<?= base_url('rekening/rekening/editUpk'); ?>" method="post">
                            <div class="modal-content">
                                <div class="modal-header bg-warning">
                                    <h5 class="modal-title text-uppercase" id="exampleEditUpk">Edit U P K</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" readonly value="<?= $row->id_upk; ?>" name="id_upk" class="form-control">
                                    <div class="mb-2">
                                        <label class="form-label">Nama UPK</label>
                                        <input type="text" name="nama_upk" autocomplete="off" value="<?= $row->nama_upk; ?>" placeholder="Masukkan Nama UPK" class="form-control">
                                    </div>
                                    <button type="submit" class="neumorphic-button" name="editUpk">Update</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        <!-- End Modal Edit UPK -->

        <!-- Modal input Data -->
        <?php if ($this->session->userdata('level') == 'Admin') : ?>
            <div class="row">
                <div id="inputData" class="modal fade" tabindex="-1" aria-labelledby="exampleEditUpk" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header bg-warning">
                                <h5 class="modal-title text-uppercase" id="exampleEditUpk">Input Data</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form class="user" action="<?= base_url('rekening/rekening/tambahData') ?>" method="POST">
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
                                                    <div class="col"> <button class="neumorphic-button mt-1" name="tambah" type="submit"><i class="fas fa-save"></i> Simpan</button></div>
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
                </div>
            </div>
        <?php endif; ?>

        <?php
        $upks = [
            1 => 'bondowoso',
            2 => 'sukosari1',
            3 => 'maesan',
            4 => 'tegalampel',
            5 => 'tapen',
            6 => 'prajekan',
            7 => 'tlogosari',
            8 => 'wringin',
            9 => 'curahdami',
            10 => 'tamanan',
            11 => 'tenggarang',
            12 => 'tamankrocok',
            13 => 'wonosari',
            14 => 'klabang',
            15 => 'sukosari2',
        ];

        $titles = [
            1 => 'Grafik Jumlah Pemakaian Air UPK Bondowoso',
            2 => 'Grafik Jumlah Pemakaian Air UPK Sukosari 1',
            3 => 'Grafik Jumlah Pemakaian Air UPK Maesan',
            4 => 'Grafik Jumlah Pemakaian Air UPK Tegalampel',
            5 => 'Grafik Jumlah Pemakaian Air UPK Tapen',
            6 => 'Grafik Jumlah Pemakaian Air UPK Prajekan',
            7 => 'Grafik Jumlah Pemakaian Air UPK Tlogosari',
            8 => 'Grafik Jumlah Pemakaian Air UPK Wringin',
            9 => 'Grafik Jumlah Pemakaian Air UPK Curahdami',
            10 => 'Grafik Jumlah Pemakaian Air UPK Tamanan',
            11 => 'Grafik Jumlah Pemakaian Air UPK Tenggarang',
            12 => 'Grafik Jumlah Pemakaian Air UPK Tamankrocok',
            13 => 'Grafik Jumlah Pemakaian Air UPK Wonosari',
            14 => 'Grafik Jumlah Pemakaian Air UPK Klabang',
            15 => 'Grafik Jumlah Pemakaian Air UPK Sukosari 2',
        ];

        for ($i = 1; $i <= 15; $i++) {
            $namaUpk = $upks[$i];
            $title = $titles[$i];
        ?>
            <!-- Modal Detail Pendapatan UPK  -->
            <div class="modal fade" id="airPakai<?= $namaUpk; ?>" tabindex="-1" aria-labelledby="exampleChartAirPakai<?= $i; ?>" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header bg-warning">
                            <h5 class="modal-title" id="exampleChartAirPakai<?= $i; ?>"><?= $title . ' tahun  ' . $tahun; ?></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="chart">
                                <canvas id="<?= $i; ?>airPakai" width="100%" height="30"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Modal Detail Pendapatan UPK  -->
        <?php
        }
        ?>
    </main>