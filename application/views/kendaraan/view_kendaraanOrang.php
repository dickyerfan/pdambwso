<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-2 mt-2">
            <div class="card">
                <div class="card-header card-outline card-primary shadow">
                    <a class="fw-bold text-dark" style="text-decoration:none ;"><?= strtoupper($title) ?></a>
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
                                    <th>Action</th>
                                    <th>Pemegang</th>
                                    <th>Merk</th>
                                    <th>Type</th>
                                    <th>Tahun</th>
                                    <th>Warna</th>

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
                                            <a href="<?= base_url(); ?>kendaraan/kendaraan_orang/edit/<?= $row->id_kendaraan; ?>"><span class="btn-sm btn btn-primary"><i class="fas fa-fw fa-edit"></i> Ganti Pemegang Kendaraan</span></a>
                                            <!-- <a href="<?= site_url('kendaraan/kendaraan_orang/hapus/' . $row->id_kendaraan); ?>" class="btn-sm btn btn-danger"><i class="fas fa-fw fa-trash"></i></a> -->
                                        </td>
                                        <td><?= $row->nama ?></td>
                                        <td><?= $row->nama_merk ?></td>
                                        <td><?= $row->nama_type ?></td>
                                        <td><?= $row->tahun ?></td>
                                        <td><?= $row->warna ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>