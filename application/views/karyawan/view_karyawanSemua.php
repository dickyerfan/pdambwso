<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-2 mt-2">
            <div class="card">
                <div class="card-header card-outline card-primary shadow">
                    <a class="fw-bold text-dark" style="text-decoration:none ;"><?= strtoupper($title) ?></a>
                    <a href="<?= base_url('karyawan/karyawan_semua/tambah'); ?>"><button class="btn btn-primary btn-sm float-end" style="background: #f0f0f0; border: none; border-radius: 20px; box-shadow: 2px 2px 2px #eee, inset 8px 8px 8px #ffffff, inset -8px -8px 8px #cbced1; color: #333;font-size: 1rem; padding: .3rem .7rem; font-size:.7rem" onMouseOver="this.style.backgroundColor='#cbced1'" onMouseOut="this.style.backgroundColor='#ffffff'"><i class="fas fa-plus"></i> Tambah Karyawan</button></a>
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
                                    <th>Nama Lengkap</th>
                                    <th>Nik</th>
                                    <th>Bagian</th>
                                    <th>SubBag</th>
                                    <th>Jabatan</th>
                                    <th>Alamat</th>
                                    <th>Agama</th>
                                    <th>Status Karyawan</th>
                                    <th>No HP</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Tempat lahir</th>
                                    <th>Tanggal lahir</th>
                                    <th>Tanggal Masuk</th>
                                    <!-- <th>Aktif</th> -->
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
                                            <a href="<?= base_url(); ?>karyawan/karyawan_semua/edit/<?= $row->id; ?>"><i class="fas fa-fw fa-edit" data-bs-toggle="tooltip" title="Klik untuk Edit Data"></i></a>
                                            <a href="<?= site_url('karyawan/karyawan_semua/hapus/' . $row->id); ?>" style="color: red;"><i class="fas fa-fw fa-trash" data-bs-toggle="tooltip" title="Klik untuk Hapus Data"></i></a>
                                            <a href="<?= site_url('karyawan/karyawan_semua/detail/' . $row->id); ?>" style="color: green;" data-bs-toggle="tooltip" title="Klik untuk Detail Data"><i class="fa-solid fa-circle-info"></i></a>
                                        </td>
                                        <td><?= $row->nama ?></td>
                                        <td><?= $row->nik ?></td>
                                        <td><?= $row->nama_bagian ?></td>
                                        <td><?= $row->nama_subag ?></td>
                                        <td><?= $row->nama_jabatan ?></td>
                                        <td><?= $row->alamat ?></td>
                                        <td><?= $row->agama ?></td>
                                        <td><?= $row->status_pegawai ?></td>
                                        <td><?= $row->no_hp ?></td>
                                        <td><?= $row->jenkel ?></td>
                                        <td><?= $row->tmp_lahir ?></td>
                                        <td><?= $row->tgl_lahir ?></td>
                                        <td><?= $row->tgl_masuk ?></td>
                                        <!-- <td><?= $row->aktif ?></td> -->
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>