<footer class="py-2 bg-light mt-auto">
    <div class="container-fluid px-4">
        <div class="d-flex align-items-center justify-content-between small">
            <div class="text-muted">Copyright &copy; DIE Art'S Production 2022</div>
        </div>
    </div>
</footer>
</div>
</div>

<!-- Sweetalert2 -->
<script src="<?php echo base_url('assets/'); ?>sweetalert2.all.min.js"></script>

<script src="<?= base_url() ?>/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="<?= base_url() ?>/js/scripts.js"></script>
<script src="<?= base_url() ?>/js/Chart.min.js" crossorigin="anonymous"></script>
<script src="<?= base_url() ?>/assets/demo/chart-area-demo.js"></script>
<script src="<?= base_url() ?>/assets/demo/chart-bar-demo.js"></script>
<script src="<?= base_url() ?>/js/datatables-simple-demo.js"></script>

<script src="<?= base_url(); ?>assets/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url(); ?>assets/datatables/dataTables.bootstrap4.min.js"></script>

<script src="<?= base_url(); ?>assets/demo/datatables-demo.js"></script>

<script>
    $('#select2').select2({
        theme: 'bootstrap-5'
    });
</script>

<script>
    $('.btn-danger').on('click', function(e) {
        e.preventDefault();
        const href = $(this).attr('href');
        Swal.fire({
            title: 'Yakin mau Di Hapus?',
            text: 'Jika yakin tekan Hapus',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Hapus'
        }).then((result) => {
            if (result.isConfirmed) {
                document.location.href = href;
            }
        })
    })
</script>

</body>

</html>