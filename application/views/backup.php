<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-2 mt-2">
            <?= $this->session->flashdata('info'); ?>
            <?= $this->session->unset_userdata('info'); ?>
            <div class="card">
                <div class="card-header card-outline card-primary shadow">
                    <h4 class="card-title"><?= strtoupper($title) ?></h4>
                </div>
                <div class="card-body">
                    <div class="row justify-content-start">
                        <div class="col-md-6">
                            <div class="card mb-3 shadow border-0" style="background: linear-gradient(
                                            45deg,
                                            rgba(29, 236, 197, 0.7),
                                            rgba(91, 14, 214, 0.9) 100%
                                            )">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                        <img src="<?= base_url('assets/img/komputer.jpg') ?>" class="img-fluid" alt="database" style="height: 200px; width: 500px; ">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body text-light">
                                            <h5 class="card-title">BACK UP</h5>
                                            <p class="card-text"><small class="text-light">Rutin lakukan backup database minimal 1 bulan sekali</small></p>
                                            <a href="<?= base_url('backup/backup') ?>" class="btn btn-dark border-0" style="background: linear-gradient(
                                            45deg,
                                            rgba(29, 236, 197, 0.7),
                                            rgba(91, 14, 214, 0.9) 100%
                                            )"><i class="fas fa-download"></i> Backup database</a><br>
                                            <p class="card-text"><small class="text-light">Klik untuk melakukan Backup database</small></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- <div class="col-md-6">
                            <div class="card bg-primary shadow">
                                <div class="card-body">
                                    <h4 class="card-title">Restore</h4>
                                    <form action="<?= base_url('backup/restore') ?>" method="post" enctype="multipart/form-data">
                                        <input type="file" name="datafile" title="Pilih File">
                                        <input type="submit" value="Klik untuk restore" class="btn btn-warning">
                                        <div class="text-white fst-italic badge">Pilih File dulu sebelum klik restore</div>
                                    </form>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </main>