<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-2 mt-2">
            <div class="card">
                <div class="card-header card-outline card-primary shadow">
                    <a class="fw-bold text-dark" style="text-decoration:none ;"><?= strtoupper($title) ?></a>
                    <a href="<?= base_url('kendaraan/kendaraan_semua/tambah'); ?>"><button class="btn btn-primary btn-sm float-end"><i class="fas fa-plus"></i> Tambah Kendaraan</button></a>
                </div>
                <div class="p-2">
                    <?= $this->session->flashdata('info'); ?>
                    <?= $this->session->unset_userdata('info'); ?>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-hover table-striped table-bordered table-sm" width="100%" cellspacing="0">
                            <thead>
                                <tr class="bg-secondary text-center">
                                    <th>No</th>
                                    <th>Action/action</th>
                                    <th>Merk</th>
                                    <th>Type</th>
                                    <th>Pemegang</th>
                                    <th>No Kendaraan</th>
                                    <th>No Rangka</th>
                                    <th>No Mesin</th>
                                    <th>Jumlah Roda</th>
                                    <th>Tahun</th>
                                    <th>Warna</th>
                                    <th>Bahan Bakar</th>
                                    <th>Expired</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($kendaraan as $row) :
                                ?>
                                    <tr>
                                        <td class="text-center"><small><?= $no++ ?></small></td>
                                        <td class="text-center">
                                            <a href="<?= base_url(); ?>kendaraan/kendaraan_semua/edit/<?= $row->id_kendaraan; ?>"><span class="btn-sm btn btn-primary"><i class="fas fa-fw fa-edit"></i> </span></a>
                                            <a href="<?= site_url('kendaraan/kendaraan_semua/hapus/' . $row->id_kendaraan); ?>" class="btn-sm btn btn-danger"><i class="fas fa-fw fa-trash"></i> </a>
                                        </td>
                                        <td><?= $row->nama_merk ?></td>
                                        <td><?= $row->nama_type ?></td>
                                        <td><?= $row->nama ?></td>
                                        <td><?= $row->no_plat ?></td>
                                        <td><?= $row->no_rangka ?></td>
                                        <td><?= $row->no_mesin ?></td>
                                        <td class="text-center"><?= $row->jumlah_roda ?></td>
                                        <td class="text-center"><?= $row->tahun ?></td>
                                        <td><?= $row->warna ?></td>
                                        <td><?= $row->bahan_bakar ?></td>
                                        <td><?= $row->berlaku_sampai ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>