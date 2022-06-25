<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h3 class="mt-2"><?= strtoupper($judul) ?></h3>
            <!-- <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active"><?= $judul ?></li>
                    </ol> -->
            <!-- <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-primary text-light mb-4 shadow" style="width: 12rem;">
                        <div class="card-body text-center">Direktur</div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-warning text-white mb-4">
                        <div class="card-body">Warning Card</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="#">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-success text-white mb-4">
                        <div class="card-body">Success Card</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="#">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-danger text-white mb-4">
                        <div class="card-body">Danger Card</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="#">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
            </div> -->
            <!-- <div class="row">
                <div class="col-xl-6">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-chart-area me-1"></i>
                            Area Chart Example
                        </div>
                        <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-chart-bar me-1"></i>
                            Bar Chart Example
                        </div>
                        <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                    </div>
                </div>
            </div> -->
            <!-- <div class="row mb-3">
                <div class="col-md-6">
                    <form action="" method="post">
                        <label for="nama" class="form-label">Nama :</label>
                        <select name="nama" id="select2" class="form-select">
                            <option value="Dicky Erfan">Dicky Erfan</option>
                            <option value="Sri Wahyuni">Sri Wahyuni</option>
                            <option value="Cindy Aulia Jasmine">Cindy Aulia Jasmine</option>
                            <option value="Muhammad Bilal Zaidan">Muhammad Bilal Zaidan</option>
                        </select>
                    </form>
                </div>
            </div> -->
            <div class="card mb-4">
                <div class="card-header">
                    <a href="<?= base_url('dashboard/tambah') ?>" class="btn btn-primary btn-sm float-end"><i class="fas fa-plus"></i> Tambah Data</a>
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>NRP</th>
                                <th>Email</th>
                                <th>Jurusan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($mahasiswa as $row) : ?>
                                <tr>
                                    <td class="text-center"><?php echo $no++; ?></td>
                                    <td><?php echo $row->nama ?></td>
                                    <td class="text-center"><?php echo $row->nrp ?></td>
                                    <td><?php echo $row->email ?></td>
                                    <td><?php echo $row->jurusan ?></td>
                                    <td>
                                        <a href="<?= site_url('dashboard/edit') ?>" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i> Edit</a>
                                        <a href="" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Hapus</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>