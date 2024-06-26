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
                    <a class="fw-bold text-dark" style="text-decoration:none ;"><?= strtoupper($title) ?> <?= $tahun ?></a>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="row mb-1">
                            <div class="col-md-2">
                                <select name="tahun" id="tahun" class="form-select form-select-sm">
                                    <?php
                                    $mulai = date('Y') - 2;
                                    for ($i = $mulai; $i < $mulai + 11; $i++) {
                                        $sel = $i == date('Y') ? ' selected="selected"' : '';
                                        echo '<option value="' . $i . '"' . $sel . '>' . $i . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-primary btn-sm" name="pilih" type="submit">Pilih Tahun</button>
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
                                        foreach ($upk as $row) : ?>
                                            <tr class="border-dark">
                                                <td class="fw-bold text-center"><?= $no++ ?></td>
                                                <td class="fw-bold"><a href="" style="text-decoration:none; color:black;"><?= $row->nama_upk; ?></a> </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                    <tfoot>
                                        <tr class="border-dark">
                                            <td></td>
                                            <td class="fw-bold text-center bg-secondary">Jumlah</td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <div class="col">
                            <div class="table-responsive">
                                <table id="" class="table table-hover table-striped table-bordered table-sm font" width="100%" cellspacing="0">
                                    <thead>
                                        <tr class="border-dark bg-primary text-light">
                                            <th class=" text-center">Jan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($jan as $row) : ?>
                                            <tr class="border-dark">
                                                <td class="text-end fw-bold"><?= number_format($row->air_pakai, '1', ',', '.');  ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                    <tfoot>
                                        <tr class="border-dark">
                                            <td class="fw-bold text-end bg-secondary"><?= number_format($totalJan, 1, ',', '.'); ?></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <div class="col">
                            <div class="table-responsive">
                                <table id="" class="table table-hover table-striped table-bordered table-sm font" width="100%" cellspacing="0">
                                    <thead>
                                        <tr class="border-dark bg-primary text-light">
                                            <th class=" text-center">Feb</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($feb as $row) : ?>
                                            <tr class="border-dark">
                                                <td class="text-end fw-bold"><?= number_format($row->air_pakai, '1', ',', '.');  ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                    <tfoot>
                                        <tr class="border-dark">
                                            <td class="fw-bold text-end bg-secondary"><?= number_format($totalFeb, 1, ',', '.'); ?></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <div class="col">
                            <div class="table-responsive">
                                <table id="" class="table table-hover table-striped table-bordered table-sm font" width="100%" cellspacing="0">
                                    <thead>
                                        <tr class="border-dark bg-primary text-light">
                                            <th class=" text-center">Mar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($mar as $row) : ?>
                                            <tr class="border-dark">
                                                <td class="text-end fw-bold"><?= number_format($row->air_pakai, '1', ',', '.');  ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                    <tfoot>
                                        <tr class="border-dark">
                                            <td class="fw-bold text-end bg-secondary"><?= number_format($totalMar, 1, ',', '.'); ?></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <div class="col">
                            <div class="table-responsive">
                                <table id="" class="table table-hover table-striped table-bordered table-sm font" width="100%" cellspacing="0">
                                    <thead>
                                        <tr class="border-dark bg-primary text-light">
                                            <th class=" text-center">Apr</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($apr as $row) : ?>
                                            <tr class="border-dark">
                                                <td class="text-end fw-bold"><?= number_format($row->air_pakai, '1', ',', '.');  ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                    <tfoot>
                                        <tr class="border-dark">
                                            <td class="fw-bold text-end bg-secondary"><?= number_format($totalApr, 1, ',', '.'); ?></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <div class="col">
                            <div class="table-responsive">
                                <table id="" class="table table-hover table-striped table-bordered table-sm font" width="100%" cellspacing="0">
                                    <thead>
                                        <tr class="border-dark bg-primary text-light">
                                            <th class=" text-center">Mei</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($mei as $row) : ?>
                                            <tr class="border-dark">
                                                <td class="text-end fw-bold"><?= number_format($row->air_pakai, '1', ',', '.');  ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                    <tfoot>
                                        <tr class="border-dark">
                                            <td class="fw-bold text-end bg-secondary"><?= number_format($totalMei, 1, ',', '.'); ?></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <div class="col">
                            <div class="table-responsive">
                                <table id="" class="table table-hover table-striped table-bordered table-sm font" width="100%" cellspacing="0">
                                    <thead>
                                        <tr class="border-dark bg-primary text-light">
                                            <th class=" text-center">Jun</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($jun as $row) : ?>
                                            <tr class="border-dark">
                                                <td class="text-end fw-bold"><?= number_format($row->air_pakai, '1', ',', '.');  ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                    <tfoot>
                                        <tr class="border-dark">
                                            <td class="fw-bold text-end bg-secondary"><?= number_format($totalJun, 1, ',', '.'); ?></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <div class="col">
                            <div class="table-responsive">
                                <table id="" class="table table-hover table-striped table-bordered table-sm font" width="100%" cellspacing="0">
                                    <thead>
                                        <tr class="border-dark bg-primary text-light">
                                            <th class=" text-center">Jul</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($jul as $row) : ?>
                                            <tr class="border-dark">
                                                <td class="text-end fw-bold"><?= number_format($row->air_pakai, '1', ',', '.');  ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                    <tfoot>
                                        <tr class="border-dark">
                                            <td class="fw-bold text-end bg-secondary"><?= number_format($totalJul, 1, ',', '.'); ?></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <div class="col">
                            <div class="table-responsive">
                                <table id="" class="table table-hover table-striped table-bordered table-sm font" width="100%" cellspacing="0">
                                    <thead>
                                        <tr class="border-dark bg-primary text-light">
                                            <th class=" text-center">Ags</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($ags as $row) : ?>
                                            <tr class="border-dark">
                                                <td class="text-end fw-bold"><?= number_format($row->air_pakai, '1', ',', '.');  ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                    <tfoot>
                                        <tr class="border-dark">
                                            <td class="fw-bold text-end bg-secondary"><?= number_format($totalAgs, 1, ',', '.'); ?></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <div class="col">
                            <div class="table-responsive">
                                <table id="" class="table table-hover table-striped table-bordered table-sm font" width="100%" cellspacing="0">
                                    <thead>
                                        <tr class="border-dark bg-primary text-light">
                                            <th class=" text-center">Sep</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($sep as $row) : ?>
                                            <tr class="border-dark">
                                                <td class="text-end fw-bold"><?= number_format($row->air_pakai, '1', ',', '.');  ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                    <tfoot>
                                        <tr class="border-dark">
                                            <td class="fw-bold text-end bg-secondary"><?= number_format($totalSep, 1, ',', '.'); ?></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <div class="col">
                            <div class="table-responsive">
                                <table id="" class="table table-hover table-striped table-bordered table-sm font" width="100%" cellspacing="0">
                                    <thead>
                                        <tr class="border-dark bg-primary text-light">
                                            <th class=" text-center">Okt</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($okt as $row) : ?>
                                            <tr class="border-dark">
                                                <td class="text-end fw-bold"><?= number_format($row->air_pakai, '1', ',', '.');  ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                    <tfoot>
                                        <tr class="border-dark">
                                            <td class="fw-bold text-end bg-secondary"><?= number_format($totalOkt, 1, ',', '.'); ?></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <div class="col">
                            <div class="table-responsive">
                                <table id="" class="table table-hover table-striped table-bordered table-sm font" width="100%" cellspacing="0">
                                    <thead>
                                        <tr class="border-dark bg-primary text-light">
                                            <th class=" text-center">Nov</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($nov as $row) : ?>
                                            <tr class="border-dark">
                                                <td class="text-end fw-bold"><?= number_format($row->air_pakai, '1', ',', '.');  ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                    <tfoot>
                                        <tr class="border-dark">
                                            <td class="fw-bold text-end bg-secondary"><?= number_format($totalNov, 1, ',', '.'); ?></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <div class="col">
                            <div class="table-responsive">
                                <table id="" class="table table-hover table-striped table-bordered table-sm font" width="100%" cellspacing="0">
                                    <thead>
                                        <tr class="border-dark bg-primary text-light">
                                            <th class=" text-center">Des</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($des as $row) : ?>
                                            <tr class="border-dark">
                                                <td class="text-end fw-bold"><?= number_format($row->air_pakai, '1', ',', '.');  ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                    <tfoot>
                                        <tr class="border-dark">
                                            <td class="fw-bold text-end bg-secondary"><?= number_format($totalDes, 1, ',', '.'); ?></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid px-1 mt-3">
            <div class="card">
                <div class="card-header card-outline card-primary shadow">
                    <h5 class="card-title text-center">Grafik Air Terpakai Konsolidasi <?= $tahun ?></h5>
                </div>
                <div class="card-body">
                    <div class="chart">
                        <canvas id="allPakai" width="100%" height="40"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </main>