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
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <div class="card bg-danger shadow">
                                <div class="card-body">
                                    <h4 class="card-title">Back Up</h4>
                                    <a href="<?= base_url('backup/backup') ?>" class="btn btn-primary"><i class="fas fa-download"></i> Backup database</a><br>
                                    <div class="text-white fst-italic badge">Klik Backup untuk Backup database</div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card bg-primary shadow">
                                <div class="card-body">
                                    <h4 class="card-title">Restore</h4>
                                    <form action="<?= base_url('backup/restore') ?>" method="post" enctype="multipart/form-data">
                                        <input type="file" name="datafile" title="Pilih File">
                                        <input type="submit" value="Klik untuk restore" class="btn btn-warning">
                                        <div class="text-danger fst-italic badge">Pilih File dulu sebelum klik restore</div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>