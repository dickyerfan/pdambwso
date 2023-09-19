<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-1 mt-1">
            <div class="card">
                <?php foreach ($detailUpk as $row) :  ?>
                    <div class="card-header card-outline card-primary shadow">
                        <a class="text-dark text-center" style="text-decoration:none ;">Grafik Pendapatan UPK <?= $row->nama_upk; ?> | <?= $row->id_upk ?>Rupiah </a>
                        <a href="<?= base_url('rekening/rekening'); ?>"><button class="neumorphic-button float-end"><i class="fas fa-reply"></i> Kembali</button></a>
                    </div>
                    <div class="card-body">
                        <div class="chart">
                            <canvas id="<?= $row->id_upk ?>Rupiah" width="100%" height="40"></canvas>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </main>