<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid mt-2">
            <div class="card">
                <div class="card-header card-outline card-primary shadow">
                    <a class="fw-bold text-dark" style="text-decoration:none ;"><?= strtoupper($title) ?></a>
                </div>
                <div class="p-2">
                    <?= $this->session->flashdata('info'); ?>
                    <?= $this->session->unset_userdata('info'); ?>
                </div>
                <div class="card-body">
                    <div class="table-responsive" style="font-size: 0.7rem;">
                        <table id="example" class="table table-hover table-striped table-bordered table-sm" width="100%" cellspacing="0">
                            <thead>
                                <tr class="bg-secondary text-center">
                                    <th>No</th>
                                    <th>Action</th>
                                    <th>Nama</th>
                                    <th>Bagian</th>
                                    <th>Sub Bagian</th>
                                    <th>Jabatan</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($karyawan as $row) :
                                ?>
                                    <tr>
                                        <td class="text-center"><small><?= $no++ ?></small></td>
                                        <td class="text-center">
                                            <a href="<?= base_url(); ?>karyawan/karyawan_mutasi/edit/<?= $row->id; ?>"><span class="btn-sm btn btn-primary"><i class="fas fa-fw fa-edit"></i> Mutasi</span></a>
                                            <a href="<?= base_url(); ?>karyawan/karyawan_mutasi/purna/<?= $row->id; ?>"><span class="btn-sm btn btn-success"><i class="fas fa-fw fa-edit"></i> Purna</span></a>
                                        </td>
                                        <td><?= $row->nama ?></td>
                                        <td><?= $row->nama_bagian ?></td>
                                        <td><?= $row->nama_subag ?></td>
                                        <td><?= $row->nama_jabatan ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>