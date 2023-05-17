<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid mt-2">
            <div class="card">
                <div class="card-header card-outline card-primary shadow">
                    <a class="fw-bold text-dark" style="text-decoration:none ;"><?= strtoupper($title) ?></a>
                    <a href="<?= base_url('kendaraan/type/tambah'); ?>"><button class="btn btn-primary btn-sm float-end"><i class="fas fa-plus"></i> Tambah Type</button></a>
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
                                    <th>Nama Type</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($type as $row) :
                                ?>
                                    <tr>
                                        <td class="text-center"><?= $no++ ?></td>
                                        <td><?= $row->nama_type ?></td>
                                        <td class="text-center">
                                            <a href="<?= base_url(); ?>kendaraan/type/edit/<?= $row->id_type; ?>"><span class="btn-sm btn btn-primary"><i class="fas fa-fw fa-edit"></i> Edit</span></a>
                                            <a href="<?= base_url(); ?>kendaraan/type/hapus/<?= $row->id_type; ?>" class="btn-sm btn btn-danger tombolHapus"><i class="fas fa-fw fa-trash"></i> Hapus</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>