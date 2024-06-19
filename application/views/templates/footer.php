<footer class="py-2 bg-light mt-auto">
    <div class="container-fluid px-4">
        <div class="d-flex align-items-center justify-content-between small">
            <div class="text-muted" style="font-size:0.8rem;">Copyright &copy; PDAM Bondowoso 2022</div>
        </div>
    </div>
</footer>
</div>
</div>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title text-white" id="exampleModalLabel">Yakin Mau Logout.?</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">Pilih "Logout" jika anda yakin mau keluar</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?= base_url('auth/logout'); ?>">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Sweetalert2 -->
<script src="<?php echo base_url('assets/'); ?>sweetalert2.all.min.js"></script>

<script src="<?= base_url() ?>assets/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="<?= base_url() ?>assets/js/scripts.js"></script>
<script src="<?= base_url() ?>assets/js/Chart.min.js" crossorigin="anonymous"></script>
<!-- <script src="<?= base_url() ?>assets/demo/chart-area-demo.js"></script> -->
<script src="<?= base_url() ?>assets/demo/chart-bar-demo.js"></script>
<script src="<?= base_url() ?>assets/js/datatables-simple-demo.js"></script>

<!-- datatable bootstrap5 -->
<script src="<?= base_url(); ?>assets/datatables/bootstrap5/jquery-3.5.1.js"></script>
<script src="<?= base_url(); ?>assets/datatables/bootstrap5/jquery.dataTables.min.js"></script>
<script src="<?= base_url(); ?>assets/datatables/bootstrap5/dataTables.bootstrap5.min.js"></script>
<!-- select2 js -->
<script src="<?= base_url() ?>assets/select2/select2.min.js"></script>

<script>
    $(document).ready(function() {
        $('#example').DataTable();
        $('#example2').DataTable();
        $('#example3').DataTable();
    });
</script>

<script>
    $('.select2').select2({
        theme: 'bootstrap-5'
    });
</script>

<script>
    $('.tombolHapus').on('click', function(e) {
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
<script>
    window.setTimeout(function() {
        $(".alert").animate({
            left: "+=50",
            width: "350"
        }, 5000, function() {}).fadeTo(1000, 0).slideUp(1000, function() {
            $(this).remove();
        });
    }, 1000);
</script>
<script>
    // Set new default font family and font color to mimic Bootstrap's default styling
    Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
    Chart.defaults.global.defaultFontColor = '#292b2c';

    // Area Chart Example
    var ctx = document.getElementById("allRupiah");
    var myLineChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Ags", "Sep", "Okt", "Nov", "Des"],
            datasets: [{
                label: "Pendapatan(Rupiah)",
                lineTension: 0.3,
                backgroundColor: "rgba(2,117,216,0.2)",
                borderColor: "rgba(2,117,216,1)",
                pointRadius: 5,
                pointBackgroundColor: "rgba(2,117,216,1)",
                pointBorderColor: "rgba(255,255,255,0.8)",
                pointHoverRadius: 5,
                pointHoverBackgroundColor: "rgba(2,117,216,1)",
                pointHitRadius: 50,
                pointBorderWidth: 2,
                data: [
                    <?= $totalJan ?>,
                    <?= $totalFeb ?>,
                    <?= $totalMar ?>,
                    <?= $totalApr ?>,
                    <?= $totalMei ?>,
                    <?= $totalJun ?>,
                    <?= $totalJul ?>,
                    <?= $totalAgs ?>,
                    <?= $totalSep ?>,
                    <?= $totalOkt ?>,
                    <?= $totalNov ?>,
                    <?= $totalDes ?>
                ],
            }],
        },
        options: {
            scales: {
                xAxes: [{
                    time: {
                        unit: 'date'
                    },
                    gridLines: {
                        display: false
                    },
                    ticks: {
                        maxTicksLimit: 15
                    }
                }],
                yAxes: [{
                    ticks: {
                        min: 1250000000,
                        max: 1800000000,
                        maxTicksLimit: 20
                    },
                    gridLines: {
                        color: "rgba(0, 0, 0, .125)",
                    }
                }],
            },
            legend: {
                display: true
            }
        }
    });
</script>
<script>
    // Set new default font family and font color to mimic Bootstrap's default styling
    Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
    Chart.defaults.global.defaultFontColor = '#292b2c';

    // Area Chart Example
    var ctx = document.getElementById("allPakai");
    var myLineChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Ags", "Sep", "Okt", "Nov", "Des"],
            datasets: [{
                label: "Air Pakai (M3)",
                lineTension: 0.3,
                backgroundColor: "rgba(50,50,216,0.2)",
                borderColor: "rgba(50,50,216,1)",
                pointRadius: 5,
                pointBackgroundColor: "rgba(50,50,216,1)",
                pointBorderColor: "rgba(255,255,255,0.8)",
                pointHoverRadius: 5,
                pointHoverBackgroundColor: "rgba(50,50,216,1)",
                pointHitRadius: 50,
                pointBorderWidth: 2,
                data: [
                    <?= $totalJan3 ?>,
                    <?= $totalFeb3 ?>,
                    <?= $totalMar3 ?>,
                    <?= $totalApr3 ?>,
                    <?= $totalMei3 ?>,
                    <?= $totalJun3 ?>,
                    <?= $totalJul3 ?>,
                    <?= $totalAgs3 ?>,
                    <?= $totalSep3 ?>,
                    <?= $totalOkt3 ?>,
                    <?= $totalNov3 ?>,
                    <?= $totalDes3 ?>
                ],
            }],
        },
        options: {
            scales: {
                xAxes: [{
                    time: {
                        unit: 'date'
                    },
                    gridLines: {
                        display: false
                    },
                    ticks: {
                        maxTicksLimit: 15
                    }
                }],
                yAxes: [{
                    ticks: {
                        min: 210000,
                        max: 270000,
                        maxTicksLimit: 20
                    },
                    gridLines: {
                        color: "rgba(0, 0, 0, .125)",
                    }
                }],
            },
            legend: {
                display: true
            }
        }
    });
</script>
<script>
    // Set new default font family and font color to mimic Bootstrap's default styling
    Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
    Chart.defaults.global.defaultFontColor = '#292b2c';

    // Area Chart Example
    var ctx = document.getElementById("allRek");
    var myLineChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Ags", "Sep", "Okt", "Nov", "Des"],
            datasets: [{
                label: "Jumlah Rekening(Lembar)",
                lineTension: 0.3,
                backgroundColor: "rgba(50,205,50,0.2)",
                borderColor: "rgba(50,205,50,1)",
                pointRadius: 5,
                pointBackgroundColor: "rgba(50,205,50,1)",
                pointBorderColor: "rgba(255,255,255,0.8)",
                pointHoverRadius: 5,
                pointHoverBackgroundColor: "rgba(50,205,50,1)",
                pointHitRadius: 50,
                pointBorderWidth: 2,
                data: [
                    <?= $totalJan2 ?>,
                    <?= $totalFeb2 ?>,
                    <?= $totalMar2 ?>,
                    <?= $totalApr2 ?>,
                    <?= $totalMei2 ?>,
                    <?= $totalJun2 ?>,
                    <?= $totalJul2 ?>,
                    <?= $totalAgs2 ?>,
                    <?= $totalSep2 ?>,
                    <?= $totalOkt2 ?>,
                    <?= $totalNov2 ?>,
                    <?= $totalDes2 ?>
                ],
            }],
        },
        options: {
            scales: {
                xAxes: [{
                    time: {
                        unit: 'date'
                    },
                    gridLines: {
                        display: false
                    },
                    ticks: {
                        maxTicksLimit: 15
                    }
                }],
                yAxes: [{
                    ticks: {
                        min: 18500,
                        max: 19600,
                        maxTicksLimit: 20
                    },
                    gridLines: {
                        color: "rgba(0, 0, 0, .125)",
                    }
                }],
            },
            legend: {
                display: true
            }
        }
    });
</script>

<!-- <script>
    // Set new default font family and font color to mimic Bootstrap's default styling
    Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
    Chart.defaults.global.defaultFontColor = '#292b2c';
    var ctx = document.getElementById("1jumRek");
    var myLineChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Ags", "Sep", "Okt", "Nov", "Des"],
            datasets: [{
                label: "Jumlah Rekening",
                lineTension: 0.3,
                backgroundColor: "rgba(50,205,50,0.2)",
                borderColor: "rgba(50,205,50,1)",
                pointRadius: 5,
                pointBackgroundColor: "rgba(50,205,50,1)",
                pointBorderColor: "rgba(255,255,255,0.8)",
                pointHoverRadius: 5,
                pointHoverBackgroundColor: "rgba(50,205,50,1)",
                pointHitRadius: 50,
                pointBorderWidth: 2,
                data: [
                    19200, 19200, 19200, 19200, 19200, 19700, 19200, 19200, 19200, 19200, 19200, 19200
                ],
            }],
        },
        options: {
            scales: {
                xAxes: [{
                    time: {
                        unit: 'date'
                    },
                    gridLines: {
                        display: false
                    },
                    ticks: {
                        maxTicksLimit: 15
                    }
                }],
                yAxes: [{
                    ticks: {
                        min: 19100,
                        max: 19800,
                        maxTicksLimit: 20
                    },
                    gridLines: {
                        color: "rgba(0, 0, 0, .125)",
                    }
                }],
            },
            legend: {
                display: true
            }
        }
    });
</script> -->
<!-- pendapatan -->
<script>
    // Set new default font family and font color to mimic Bootstrap's default styling
    Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
    Chart.defaults.global.defaultFontColor = '#292b2c';

    // Area Chart Bondowoso
    var ctx = document.getElementById("1Rupiah");
    var myLineChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Ags", "Sep", "Okt", "Nov", "Des"],
            datasets: [{
                label: "Pendapatan(Rupiah)",
                lineTension: 0.3,
                backgroundColor: "rgba(2,117,216,0.2)",
                borderColor: "rgba(2,117,216,1)",
                pointRadius: 5,
                pointBackgroundColor: "rgba(2,117,216,1)",
                pointBorderColor: "rgba(255,255,255,0.8)",
                pointHoverRadius: 5,
                pointHoverBackgroundColor: "rgba(2,117,216,1)",
                pointHitRadius: 50,
                pointBorderWidth: 2,
                data: [
                    <?= $bonJan ?>,
                    <?= $bonFeb ?>,
                    <?= $bonMar ?>,
                    <?= $bonApr ?>,
                    <?= $bonMei ?>,
                    <?= $bonJun ?>,
                    <?= $bonJul ?>,
                    <?= $bonAgs ?>,
                    <?= $bonSep ?>,
                    <?= $bonOkt ?>,
                    <?= $bonNov ?>,
                    <?= $bonDes ?>,
                ],
            }],
        },
        options: {
            scales: {
                xAxes: [{
                    time: {
                        unit: 'date'
                    },
                    gridLines: {
                        display: false
                    },
                    ticks: {
                        maxTicksLimit: 20
                    }
                }],
                yAxes: [{
                    ticks: {
                        min: 420000000,
                        max: 550000000,
                        maxTicksLimit: 20
                    },
                    gridLines: {
                        color: "rgba(0, 0, 0, .125)",
                    }
                }],
            },
            legend: {
                display: true
            }
        }
    });

    // Area Chart Sukosari
    var ctx = document.getElementById("2Rupiah");
    var myLineChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Ags", "Sep", "Okt", "Nov", "Des"],
            datasets: [{
                label: "Pendapatan(Rupiah)",
                lineTension: 0.3,
                backgroundColor: "rgba(2,117,216,0.2)",
                borderColor: "rgba(2,117,216,1)",
                pointRadius: 5,
                pointBackgroundColor: "rgba(2,117,216,1)",
                pointBorderColor: "rgba(255,255,255,0.8)",
                pointHoverRadius: 5,
                pointHoverBackgroundColor: "rgba(2,117,216,1)",
                pointHitRadius: 50,
                pointBorderWidth: 2,
                data: [
                    <?= $suko1Jan ?>,
                    <?= $suko1Feb ?>,
                    <?= $suko1Mar ?>,
                    <?= $suko1Apr ?>,
                    <?= $suko1Mei ?>,
                    <?= $suko1Jun ?>,
                    <?= $suko1Jul ?>,
                    <?= $suko1Ags ?>,
                    <?= $suko1Sep ?>,
                    <?= $suko1Okt ?>,
                    <?= $suko1Nov ?>,
                    <?= $suko1Des ?>,
                ],
            }],
        },
        options: {
            scales: {
                xAxes: [{
                    time: {
                        unit: 'date'
                    },
                    gridLines: {
                        display: false
                    },
                    ticks: {
                        maxTicksLimit: 20
                    }
                }],
                yAxes: [{
                    ticks: {
                        min: 74000000,
                        max: 106000000,
                        maxTicksLimit: 20
                    },
                    gridLines: {
                        color: "rgba(0, 0, 0, .125)",
                    }
                }],
            },
            legend: {
                display: true
            }
        }
    });

    // Area Chart Maesan
    var ctx = document.getElementById("3Rupiah");
    var myLineChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Ags", "Sep", "Okt", "Nov", "Des"],
            datasets: [{
                label: "Pendapatan(Rupiah)",
                lineTension: 0.3,
                backgroundColor: "rgba(2,117,216,0.2)",
                borderColor: "rgba(2,117,216,1)",
                pointRadius: 5,
                pointBackgroundColor: "rgba(2,117,216,1)",
                pointBorderColor: "rgba(255,255,255,0.8)",
                pointHoverRadius: 5,
                pointHoverBackgroundColor: "rgba(2,117,216,1)",
                pointHitRadius: 50,
                pointBorderWidth: 2,
                data: [
                    <?= $msnJan ?>,
                    <?= $msnFeb ?>,
                    <?= $msnMar ?>,
                    <?= $msnApr ?>,
                    <?= $msnMei ?>,
                    <?= $msnJun ?>,
                    <?= $msnJul ?>,
                    <?= $msnAgs ?>,
                    <?= $msnSep ?>,
                    <?= $msnOkt ?>,
                    <?= $msnNov ?>,
                    <?= $msnDes ?>,
                ],
            }],
        },
        options: {
            scales: {
                xAxes: [{
                    time: {
                        unit: 'date'
                    },
                    gridLines: {
                        display: false
                    },
                    ticks: {
                        maxTicksLimit: 20
                    }
                }],
                yAxes: [{
                    ticks: {
                        min: 82000000,
                        max: 114000000,
                        maxTicksLimit: 20
                    },
                    gridLines: {
                        color: "rgba(0, 0, 0, .125)",
                    }
                }],
            },
            legend: {
                display: true
            }
        }
    });
    // Area Chart Tegalampel
    var ctx = document.getElementById("4Rupiah");
    var myLineChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Ags", "Sep", "Okt", "Nov", "Des"],
            datasets: [{
                label: "Pendapatan(Rupiah)",
                lineTension: 0.3,
                backgroundColor: "rgba(2,117,216,0.2)",
                borderColor: "rgba(2,117,216,1)",
                pointRadius: 5,
                pointBackgroundColor: "rgba(2,117,216,1)",
                pointBorderColor: "rgba(255,255,255,0.8)",
                pointHoverRadius: 5,
                pointHoverBackgroundColor: "rgba(2,117,216,1)",
                pointHitRadius: 50,
                pointBorderWidth: 2,
                data: [
                    <?= $tglJan ?>,
                    <?= $tglFeb ?>,
                    <?= $tglMar ?>,
                    <?= $tglApr ?>,
                    <?= $tglMei ?>,
                    <?= $tglJun ?>,
                    <?= $tglJul ?>,
                    <?= $tglAgs ?>,
                    <?= $tglSep ?>,
                    <?= $tglOkt ?>,
                    <?= $tglNov ?>,
                    <?= $tglDes ?>,
                ],
            }],
        },
        options: {
            scales: {
                xAxes: [{
                    time: {
                        unit: 'date'
                    },
                    gridLines: {
                        display: false
                    },
                    ticks: {
                        maxTicksLimit: 20
                    }
                }],
                yAxes: [{
                    ticks: {
                        min: 110000000,
                        max: 160000000,
                        maxTicksLimit: 20
                    },
                    gridLines: {
                        color: "rgba(0, 0, 0, .125)",
                    }
                }],
            },
            legend: {
                display: true
            }
        }
    });
    // Area Chart Tapen
    var ctx = document.getElementById("5Rupiah");
    var myLineChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Ags", "Sep", "Okt", "Nov", "Des"],
            datasets: [{
                label: "Pendapatan(Rupiah)",
                lineTension: 0.3,
                backgroundColor: "rgba(2,117,216,0.2)",
                borderColor: "rgba(2,117,216,1)",
                pointRadius: 5,
                pointBackgroundColor: "rgba(2,117,216,1)",
                pointBorderColor: "rgba(255,255,255,0.8)",
                pointHoverRadius: 5,
                pointHoverBackgroundColor: "rgba(2,117,216,1)",
                pointHitRadius: 50,
                pointBorderWidth: 2,
                data: [
                    <?= $tpnJan ?>,
                    <?= $tpnFeb ?>,
                    <?= $tpnMar ?>,
                    <?= $tpnApr ?>,
                    <?= $tpnMei ?>,
                    <?= $tpnJun ?>,
                    <?= $tpnJul ?>,
                    <?= $tpnAgs ?>,
                    <?= $tpnSep ?>,
                    <?= $tpnOkt ?>,
                    <?= $tpnNov ?>,
                    <?= $tpnDes ?>,
                ],
            }],
        },
        options: {
            scales: {
                xAxes: [{
                    time: {
                        unit: 'date'
                    },
                    gridLines: {
                        display: false
                    },
                    ticks: {
                        maxTicksLimit: 20
                    }
                }],
                yAxes: [{
                    ticks: {
                        min: 60000000,
                        max: 100000000,
                        maxTicksLimit: 20
                    },
                    gridLines: {
                        color: "rgba(0, 0, 0, .125)",
                    }
                }],
            },
            legend: {
                display: true
            }
        }
    });
    // Area Chart Prajekan
    var ctx = document.getElementById("6Rupiah");
    var myLineChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Ags", "Sep", "Okt", "Nov", "Des"],
            datasets: [{
                label: "Pendapatan(Rupiah)",
                lineTension: 0.3,
                backgroundColor: "rgba(2,117,216,0.2)",
                borderColor: "rgba(2,117,216,1)",
                pointRadius: 5,
                pointBackgroundColor: "rgba(2,117,216,1)",
                pointBorderColor: "rgba(255,255,255,0.8)",
                pointHoverRadius: 5,
                pointHoverBackgroundColor: "rgba(2,117,216,1)",
                pointHitRadius: 50,
                pointBorderWidth: 2,
                data: [
                    <?= $pjkJan ?>,
                    <?= $pjkFeb ?>,
                    <?= $pjkMar ?>,
                    <?= $pjkApr ?>,
                    <?= $pjkMei ?>,
                    <?= $pjkJun ?>,
                    <?= $pjkJul ?>,
                    <?= $pjkAgs ?>,
                    <?= $pjkSep ?>,
                    <?= $pjkOkt ?>,
                    <?= $pjkNov ?>,
                    <?= $pjkDes ?>,
                ],
            }],
        },
        options: {
            scales: {
                xAxes: [{
                    time: {
                        unit: 'date'
                    },
                    gridLines: {
                        display: false
                    },
                    ticks: {
                        maxTicksLimit: 20
                    }
                }],
                yAxes: [{
                    ticks: {
                        min: 60000000,
                        max: 100000000,
                        maxTicksLimit: 20
                    },
                    gridLines: {
                        color: "rgba(0, 0, 0, .125)",
                    }
                }],
            },
            legend: {
                display: true
            }
        }
    });
    // Area Chart Tlogosari
    var ctx = document.getElementById("7Rupiah");
    var myLineChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Ags", "Sep", "Okt", "Nov", "Des"],
            datasets: [{
                label: "Pendapatan(Rupiah)",
                lineTension: 0.3,
                backgroundColor: "rgba(2,117,216,0.2)",
                borderColor: "rgba(2,117,216,1)",
                pointRadius: 5,
                pointBackgroundColor: "rgba(2,117,216,1)",
                pointBorderColor: "rgba(255,255,255,0.8)",
                pointHoverRadius: 5,
                pointHoverBackgroundColor: "rgba(2,117,216,1)",
                pointHitRadius: 50,
                pointBorderWidth: 2,
                data: [
                    <?= $tlgJan ?>,
                    <?= $tlgFeb ?>,
                    <?= $tlgMar ?>,
                    <?= $tlgApr ?>,
                    <?= $tlgMei ?>,
                    <?= $tlgJun ?>,
                    <?= $tlgJul ?>,
                    <?= $tlgAgs ?>,
                    <?= $tlgSep ?>,
                    <?= $tlgOkt ?>,
                    <?= $tlgNov ?>,
                    <?= $tlgDes ?>,
                ],
            }],
        },
        options: {
            scales: {
                xAxes: [{
                    time: {
                        unit: 'date'
                    },
                    gridLines: {
                        display: false
                    },
                    ticks: {
                        maxTicksLimit: 20
                    }
                }],
                yAxes: [{
                    ticks: {
                        min: 50000000,
                        max: 80000000,
                        maxTicksLimit: 20
                    },
                    gridLines: {
                        color: "rgba(0, 0, 0, .125)",
                    }
                }],
            },
            legend: {
                display: true
            }
        }
    });
    // Area Chart Wringin
    var ctx = document.getElementById("8Rupiah");
    var myLineChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Ags", "Sep", "Okt", "Nov", "Des"],
            datasets: [{
                label: "Pendapatan(Rupiah)",
                lineTension: 0.3,
                backgroundColor: "rgba(2,117,216,0.2)",
                borderColor: "rgba(2,117,216,1)",
                pointRadius: 5,
                pointBackgroundColor: "rgba(2,117,216,1)",
                pointBorderColor: "rgba(255,255,255,0.8)",
                pointHoverRadius: 5,
                pointHoverBackgroundColor: "rgba(2,117,216,1)",
                pointHitRadius: 50,
                pointBorderWidth: 2,
                data: [
                    <?= $wrgJan ?>,
                    <?= $wrgFeb ?>,
                    <?= $wrgMar ?>,
                    <?= $wrgApr ?>,
                    <?= $wrgMei ?>,
                    <?= $wrgJun ?>,
                    <?= $wrgJul ?>,
                    <?= $wrgAgs ?>,
                    <?= $wrgSep ?>,
                    <?= $wrgOkt ?>,
                    <?= $wrgNov ?>,
                    <?= $wrgDes ?>,
                ],
            }],
        },
        options: {
            scales: {
                xAxes: [{
                    time: {
                        unit: 'date'
                    },
                    gridLines: {
                        display: false
                    },
                    ticks: {
                        maxTicksLimit: 20
                    }
                }],
                yAxes: [{
                    ticks: {
                        min: 60000000,
                        max: 100000000,
                        maxTicksLimit: 20
                    },
                    gridLines: {
                        color: "rgba(0, 0, 0, .125)",
                    }
                }],
            },
            legend: {
                display: true
            }
        }
    });
    // Area Chart Curahdami
    var ctx = document.getElementById("9Rupiah");
    var myLineChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Ags", "Sep", "Okt", "Nov", "Des"],
            datasets: [{
                label: "Pendapatan(Rupiah)",
                lineTension: 0.3,
                backgroundColor: "rgba(2,117,216,0.2)",
                borderColor: "rgba(2,117,216,1)",
                pointRadius: 5,
                pointBackgroundColor: "rgba(2,117,216,1)",
                pointBorderColor: "rgba(255,255,255,0.8)",
                pointHoverRadius: 5,
                pointHoverBackgroundColor: "rgba(2,117,216,1)",
                pointHitRadius: 50,
                pointBorderWidth: 2,
                data: [
                    <?= $crdJan ?>,
                    <?= $crdFeb ?>,
                    <?= $crdMar ?>,
                    <?= $crdApr ?>,
                    <?= $crdMei ?>,
                    <?= $crdJun ?>,
                    <?= $crdJul ?>,
                    <?= $crdAgs ?>,
                    <?= $crdSep ?>,
                    <?= $crdOkt ?>,
                    <?= $crdNov ?>,
                    <?= $crdDes ?>,
                ],
            }],
        },
        options: {
            scales: {
                xAxes: [{
                    time: {
                        unit: 'date'
                    },
                    gridLines: {
                        display: false
                    },
                    ticks: {
                        maxTicksLimit: 20
                    }
                }],
                yAxes: [{
                    ticks: {
                        min: 80000000,
                        max: 130000000,
                        maxTicksLimit: 20
                    },
                    gridLines: {
                        color: "rgba(0, 0, 0, .125)",
                    }
                }],
            },
            legend: {
                display: true
            }
        }
    });
    // Area Chart Tamanan
    var ctx = document.getElementById("10Rupiah");
    var myLineChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Ags", "Sep", "Okt", "Nov", "Des"],
            datasets: [{
                label: "Pendapatan(Rupiah)",
                lineTension: 0.3,
                backgroundColor: "rgba(2,117,216,0.2)",
                borderColor: "rgba(2,117,216,1)",
                pointRadius: 5,
                pointBackgroundColor: "rgba(2,117,216,1)",
                pointBorderColor: "rgba(255,255,255,0.8)",
                pointHoverRadius: 5,
                pointHoverBackgroundColor: "rgba(2,117,216,1)",
                pointHitRadius: 50,
                pointBorderWidth: 2,
                data: [
                    <?= $tmnJan ?>,
                    <?= $tmnFeb ?>,
                    <?= $tmnMar ?>,
                    <?= $tmnApr ?>,
                    <?= $tmnMei ?>,
                    <?= $tmnJun ?>,
                    <?= $tmnJul ?>,
                    <?= $tmnAgs ?>,
                    <?= $tmnSep ?>,
                    <?= $tmnOkt ?>,
                    <?= $tmnNov ?>,
                    <?= $tmnDes ?>,
                ],
            }],
        },
        options: {
            scales: {
                xAxes: [{
                    time: {
                        unit: 'date'
                    },
                    gridLines: {
                        display: false
                    },
                    ticks: {
                        maxTicksLimit: 20
                    }
                }],
                yAxes: [{
                    ticks: {
                        min: 19000000,
                        max: 30000000,
                        maxTicksLimit: 20
                    },
                    gridLines: {
                        color: "rgba(0, 0, 0, .125)",
                    }
                }],
            },
            legend: {
                display: true
            }
        }
    });
    // Area Chart Tenggarang
    var ctx = document.getElementById("11Rupiah");
    var myLineChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Ags", "Sep", "Okt", "Nov", "Des"],
            datasets: [{
                label: "Pendapatan(Rupiah)",
                lineTension: 0.3,
                backgroundColor: "rgba(2,117,216,0.2)",
                borderColor: "rgba(2,117,216,1)",
                pointRadius: 5,
                pointBackgroundColor: "rgba(2,117,216,1)",
                pointBorderColor: "rgba(255,255,255,0.8)",
                pointHoverRadius: 5,
                pointHoverBackgroundColor: "rgba(2,117,216,1)",
                pointHitRadius: 50,
                pointBorderWidth: 2,
                data: [
                    <?= $tgrJan ?>,
                    <?= $tgrFeb ?>,
                    <?= $tgrMar ?>,
                    <?= $tgrApr ?>,
                    <?= $tgrMei ?>,
                    <?= $tgrJun ?>,
                    <?= $tgrJul ?>,
                    <?= $tgrAgs ?>,
                    <?= $tgrSep ?>,
                    <?= $tgrOkt ?>,
                    <?= $tgrNov ?>,
                    <?= $tgrDes ?>,
                ],
            }],
        },
        options: {
            scales: {
                xAxes: [{
                    time: {
                        unit: 'date'
                    },
                    gridLines: {
                        display: false
                    },
                    ticks: {
                        maxTicksLimit: 20
                    }
                }],
                yAxes: [{
                    ticks: {
                        min: 46000000,
                        max: 70000000,
                        maxTicksLimit: 20
                    },
                    gridLines: {
                        color: "rgba(0, 0, 0, .125)",
                    }
                }],
            },
            legend: {
                display: true
            }
        }
    });
    // Area Chart TamanKrocok
    var ctx = document.getElementById("12Rupiah");
    var myLineChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Ags", "Sep", "Okt", "Nov", "Des"],
            datasets: [{
                label: "Pendapatan(Rupiah)",
                lineTension: 0.3,
                backgroundColor: "rgba(2,117,216,0.2)",
                borderColor: "rgba(2,117,216,1)",
                pointRadius: 5,
                pointBackgroundColor: "rgba(2,117,216,1)",
                pointBorderColor: "rgba(255,255,255,0.8)",
                pointHoverRadius: 5,
                pointHoverBackgroundColor: "rgba(2,117,216,1)",
                pointHitRadius: 50,
                pointBorderWidth: 2,
                data: [
                    <?= $tmkJan ?>,
                    <?= $tmkFeb ?>,
                    <?= $tmkMar ?>,
                    <?= $tmkApr ?>,
                    <?= $tmkMei ?>,
                    <?= $tmkJun ?>,
                    <?= $tmkJul ?>,
                    <?= $tmkAgs ?>,
                    <?= $tmkSep ?>,
                    <?= $tmkOkt ?>,
                    <?= $tmkNov ?>,
                    <?= $tmkDes ?>,
                ],
            }],
        },
        options: {
            scales: {
                xAxes: [{
                    time: {
                        unit: 'date'
                    },
                    gridLines: {
                        display: false
                    },
                    ticks: {
                        maxTicksLimit: 20
                    }
                }],
                yAxes: [{
                    ticks: {
                        min: 25000000,
                        max: 36000000,
                        maxTicksLimit: 20
                    },
                    gridLines: {
                        color: "rgba(0, 0, 0, .125)",
                    }
                }],
            },
            legend: {
                display: true
            }
        }
    });
    // Area Chart Wonosari
    var ctx = document.getElementById("13Rupiah");
    var myLineChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Ags", "Sep", "Okt", "Nov", "Des"],
            datasets: [{
                label: "Pendapatan(Rupiah)",
                lineTension: 0.3,
                backgroundColor: "rgba(2,117,216,0.2)",
                borderColor: "rgba(2,117,216,1)",
                pointRadius: 5,
                pointBackgroundColor: "rgba(2,117,216,1)",
                pointBorderColor: "rgba(255,255,255,0.8)",
                pointHoverRadius: 5,
                pointHoverBackgroundColor: "rgba(2,117,216,1)",
                pointHitRadius: 50,
                pointBorderWidth: 2,
                data: [
                    <?= $wnsJan ?>,
                    <?= $wnsFeb ?>,
                    <?= $wnsMar ?>,
                    <?= $wnsApr ?>,
                    <?= $wnsMei ?>,
                    <?= $wnsJun ?>,
                    <?= $wnsJul ?>,
                    <?= $wnsAgs ?>,
                    <?= $wnsSep ?>,
                    <?= $wnsOkt ?>,
                    <?= $wnsNov ?>,
                    <?= $wnsDes ?>,
                ],
            }],
        },
        options: {
            scales: {
                xAxes: [{
                    time: {
                        unit: 'date'
                    },
                    gridLines: {
                        display: false
                    },
                    ticks: {
                        maxTicksLimit: 20
                    }
                }],
                yAxes: [{
                    ticks: {
                        min: 50000000,
                        max: 80000000,
                        maxTicksLimit: 20
                    },
                    gridLines: {
                        color: "rgba(0, 0, 0, .125)",
                    }
                }],
            },
            legend: {
                display: true
            }
        }
    });
    // Area Chart Klabang
    var ctx = document.getElementById("14Rupiah");
    var myLineChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Ags", "Sep", "Okt", "Nov", "Des"],
            datasets: [{
                label: "Pendapatan(Rupiah)",
                lineTension: 0.3,
                backgroundColor: "rgba(2,117,216,0.2)",
                borderColor: "rgba(2,117,216,1)",
                pointRadius: 5,
                pointBackgroundColor: "rgba(2,117,216,1)",
                pointBorderColor: "rgba(255,255,255,0.8)",
                pointHoverRadius: 5,
                pointHoverBackgroundColor: "rgba(2,117,216,1)",
                pointHitRadius: 50,
                pointBorderWidth: 2,
                data: [
                    <?= $klbJan ?>,
                    <?= $klbFeb ?>,
                    <?= $klbMar ?>,
                    <?= $klbApr ?>,
                    <?= $klbMei ?>,
                    <?= $klbJun ?>,
                    <?= $klbJul ?>,
                    <?= $klbAgs ?>,
                    <?= $klbSep ?>,
                    <?= $klbOkt ?>,
                    <?= $klbNov ?>,
                    <?= $klbDes ?>,
                ],
            }],
        },
        options: {
            scales: {
                xAxes: [{
                    time: {
                        unit: 'date'
                    },
                    gridLines: {
                        display: false
                    },
                    ticks: {
                        maxTicksLimit: 20
                    }
                }],
                yAxes: [{
                    ticks: {
                        min: 4000000,
                        max: 28000000,
                        maxTicksLimit: 20
                    },
                    gridLines: {
                        color: "rgba(0, 0, 0, .125)",
                    }
                }],
            },
            legend: {
                display: true
            }
        }
    });
    // Area Chart Sukosari 2
    var ctx = document.getElementById("15Rupiah");
    var myLineChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Ags", "Sep", "Okt", "Nov", "Des"],
            datasets: [{
                label: "Pendapatan(Rupiah)",
                lineTension: 0.3,
                backgroundColor: "rgba(2,117,216,0.2)",
                borderColor: "rgba(2,117,216,1)",
                pointRadius: 5,
                pointBackgroundColor: "rgba(2,117,216,1)",
                pointBorderColor: "rgba(255,255,255,0.8)",
                pointHoverRadius: 5,
                pointHoverBackgroundColor: "rgba(2,117,216,1)",
                pointHitRadius: 50,
                pointBorderWidth: 2,
                data: [
                    <?= $suko2Jan ?>,
                    <?= $suko2Feb ?>,
                    <?= $suko2Mar ?>,
                    <?= $suko2Apr ?>,
                    <?= $suko2Mei ?>,
                    <?= $suko2Jun ?>,
                    <?= $suko2Jul ?>,
                    <?= $suko2Ags ?>,
                    <?= $suko2Sep ?>,
                    <?= $suko2Okt ?>,
                    <?= $suko2Nov ?>,
                    <?= $suko2Des ?>,
                ],
            }],
        },
        options: {
            scales: {
                xAxes: [{
                    time: {
                        unit: 'date'
                    },
                    gridLines: {
                        display: false
                    },
                    ticks: {
                        maxTicksLimit: 20
                    }
                }],
                yAxes: [{
                    ticks: {
                        min: 70000000,
                        max: 120000000,
                        maxTicksLimit: 20
                    },
                    gridLines: {
                        color: "rgba(0, 0, 0, .125)",
                    }
                }],
            },
            legend: {
                display: true
            }
        }
    });
</script>
<!-- end pendapatan -->

<!-- jumlah rekening -->
<script>
    // Set new default font family and font color to mimic Bootstrap's default styling
    Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
    Chart.defaults.global.defaultFontColor = '#292b2c';

    // Area Chart Bondowoso
    var ctx2 = document.getElementById("1jumRek");
    var myLineChart = new Chart(ctx2, {
        type: 'line',
        data: {
            labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Ags", "Sep", "Okt", "Nov", "Des"],
            datasets: [{
                label: "Jumlah Rekening (Lembar)",
                lineTension: 0.3,
                backgroundColor: "rgba(50,205,50,0.2)",
                borderColor: "rgba(50,205,50,1)",
                pointRadius: 5,
                pointBackgroundColor: "rgba(50,205,50,1)",
                pointBorderColor: "rgba(255,255,255,0.8)",
                pointHoverRadius: 5,
                pointHoverBackgroundColor: "rgba(50,205,50,1)",
                pointHitRadius: 50,
                pointBorderWidth: 2,
                data: [
                    <?= $bonJumRekJan ?>,
                    <?= $bonJumRekFeb ?>,
                    <?= $bonJumRekMar ?>,
                    <?= $bonJumRekApr ?>,
                    <?= $bonJumRekMei ?>,
                    <?= $bonJumRekJun ?>,
                    <?= $bonJumRekJul ?>,
                    <?= $bonJumRekAgs ?>,
                    <?= $bonJumRekSep ?>,
                    <?= $bonJumRekOkt ?>,
                    <?= $bonJumRekNov ?>,
                    <?= $bonJumRekDes ?>

                ],
            }],
        },
        options: {
            scales: {
                xAxes: [{
                    time: {
                        unit: 'date'
                    },
                    gridLines: {
                        display: false
                    },
                    ticks: {
                        maxTicksLimit: 20
                    }
                }],
                yAxes: [{
                    ticks: {
                        min: 5400,
                        max: 5600,
                        maxTicksLimit: 20
                    },
                    gridLines: {
                        color: "rgba(0, 0, 0, .125)",
                    }
                }],
            },
            legend: {
                display: true
            }
        }
    });

    // Area Chart Sukosari
    var ctx2 = document.getElementById("2jumRek");
    var myLineChart = new Chart(ctx2, {
        type: 'line',
        data: {
            labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Ags", "Sep", "Okt", "Nov", "Des"],
            datasets: [{
                label: "Jumlah Rekening",
                lineTension: 0.3,
                backgroundColor: "rgba(50,205,50,0.2)",
                borderColor: "rgba(50,205,50,1)",
                pointRadius: 5,
                pointBackgroundColor: "rgba(50,205,50,1)",
                pointBorderColor: "rgba(255,255,255,0.8)",
                pointHoverRadius: 5,
                pointHoverBackgroundColor: "rgba(50,205,50,1)",
                pointHitRadius: 50,
                pointBorderWidth: 2,
                data: [
                    <?= $suko1JumRekJan ?>,
                    <?= $suko1JumRekFeb ?>,
                    <?= $suko1JumRekMar ?>,
                    <?= $suko1JumRekApr ?>,
                    <?= $suko1JumRekMei ?>,
                    <?= $suko1JumRekJun ?>,
                    <?= $suko1JumRekJul ?>,
                    <?= $suko1JumRekAgs ?>,
                    <?= $suko1JumRekSep ?>,
                    <?= $suko1JumRekOkt ?>,
                    <?= $suko1JumRekNov ?>,
                    <?= $suko1JumRekDes ?>,
                ],
            }],
        },
        options: {
            scales: {
                xAxes: [{
                    time: {
                        unit: 'date'
                    },
                    gridLines: {
                        display: false
                    },
                    ticks: {
                        maxTicksLimit: 20
                    }
                }],
                yAxes: [{
                    ticks: {
                        min: 1200,
                        max: 1300,
                        maxTicksLimit: 20
                    },
                    gridLines: {
                        color: "rgba(0, 0, 0, .125)",
                    }
                }],
            },
            legend: {
                display: true
            }
        }
    });

    // Area Chart Maesan
    var ctx2 = document.getElementById("3jumRek");
    var myLineChart = new Chart(ctx2, {
        type: 'line',
        data: {
            labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Ags", "Sep", "Okt", "Nov", "Des"],
            datasets: [{
                label: "Jumlah Rekening",
                lineTension: 0.3,
                backgroundColor: "rgba(50,205,50,0.2)",
                borderColor: "rgba(50,205,50,1)",
                pointRadius: 5,
                pointBackgroundColor: "rgba(50,205,50,1)",
                pointBorderColor: "rgba(255,255,255,0.8)",
                pointHoverRadius: 5,
                pointHoverBackgroundColor: "rgba(50,205,50,1)",
                pointHitRadius: 50,
                pointBorderWidth: 2,
                data: [
                    <?= $msnJumRekJan ?>,
                    <?= $msnJumRekFeb ?>,
                    <?= $msnJumRekMar ?>,
                    <?= $msnJumRekApr ?>,
                    <?= $msnJumRekMei ?>,
                    <?= $msnJumRekJun ?>,
                    <?= $msnJumRekJul ?>,
                    <?= $msnJumRekAgs ?>,
                    <?= $msnJumRekSep ?>,
                    <?= $msnJumRekOkt ?>,
                    <?= $msnJumRekNov ?>,
                    <?= $msnJumRekDes ?>,
                ],
            }],
        },
        options: {
            scales: {
                xAxes: [{
                    time: {
                        unit: 'date'
                    },
                    gridLines: {
                        display: false
                    },
                    ticks: {
                        maxTicksLimit: 20
                    }
                }],
                yAxes: [{
                    ticks: {
                        min: 1200,
                        max: 1300,
                        maxTicksLimit: 20
                    },
                    gridLines: {
                        color: "rgba(0, 0, 0, .125)",
                    }
                }],
            },
            legend: {
                display: true
            }
        }
    });
    // Area Chart Tegalampel
    var ctx2 = document.getElementById("4jumRek");
    var myLineChart = new Chart(ctx2, {
        type: 'line',
        data: {
            labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Ags", "Sep", "Okt", "Nov", "Des"],
            datasets: [{
                label: "Jumlah Rekening",
                lineTension: 0.3,
                backgroundColor: "rgba(50,205,50,0.2)",
                borderColor: "rgba(50,205,50,1)",
                pointRadius: 5,
                pointBackgroundColor: "rgba(50,205,50,1)",
                pointBorderColor: "rgba(255,255,255,0.8)",
                pointHoverRadius: 5,
                pointHoverBackgroundColor: "rgba(50,205,50,1)",
                pointHitRadius: 50,
                pointBorderWidth: 2,
                data: [
                    <?= $tglJumRekJan ?>,
                    <?= $tglJumRekFeb ?>,
                    <?= $tglJumRekMar ?>,
                    <?= $tglJumRekApr ?>,
                    <?= $tglJumRekMei ?>,
                    <?= $tglJumRekJun ?>,
                    <?= $tglJumRekJul ?>,
                    <?= $tglJumRekAgs ?>,
                    <?= $tglJumRekSep ?>,
                    <?= $tglJumRekOkt ?>,
                    <?= $tglJumRekNov ?>,
                    <?= $tglJumRekDes ?>,
                ],
            }],
        },
        options: {
            scales: {
                xAxes: [{
                    time: {
                        unit: 'date'
                    },
                    gridLines: {
                        display: false
                    },
                    ticks: {
                        maxTicksLimit: 20
                    }
                }],
                yAxes: [{
                    ticks: {
                        min: 1600,
                        max: 1700,
                        maxTicksLimit: 20
                    },
                    gridLines: {
                        color: "rgba(0, 0, 0, .125)",
                    }
                }],
            },
            legend: {
                display: true
            }
        }
    });
    // Area Chart Tapen
    var ctx2 = document.getElementById("5jumRek");
    var myLineChart = new Chart(ctx2, {
        type: 'line',
        data: {
            labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Ags", "Sep", "Okt", "Nov", "Des"],
            datasets: [{
                label: "Jumlah Rekening",
                lineTension: 0.3,
                backgroundColor: "rgba(50,205,50,0.2)",
                borderColor: "rgba(50,205,50,1)",
                pointRadius: 5,
                pointBackgroundColor: "rgba(50,205,50,1)",
                pointBorderColor: "rgba(255,255,255,0.8)",
                pointHoverRadius: 5,
                pointHoverBackgroundColor: "rgba(50,205,50,1)",
                pointHitRadius: 50,
                pointBorderWidth: 2,
                data: [
                    <?= $tpnJumRekJan ?>,
                    <?= $tpnJumRekFeb ?>,
                    <?= $tpnJumRekMar ?>,
                    <?= $tpnJumRekApr ?>,
                    <?= $tpnJumRekMei ?>,
                    <?= $tpnJumRekJun ?>,
                    <?= $tpnJumRekJul ?>,
                    <?= $tpnJumRekAgs ?>,
                    <?= $tpnJumRekSep ?>,
                    <?= $tpnJumRekOkt ?>,
                    <?= $tpnJumRekNov ?>,
                    <?= $tpnJumRekDes ?>,
                ],
            }],
        },
        options: {
            scales: {
                xAxes: [{
                    time: {
                        unit: 'date'
                    },
                    gridLines: {
                        display: false
                    },
                    ticks: {
                        maxTicksLimit: 20
                    }
                }],
                yAxes: [{
                    ticks: {
                        min: 1050,
                        max: 1150,
                        maxTicksLimit: 20
                    },
                    gridLines: {
                        color: "rgba(0, 0, 0, .125)",
                    }
                }],
            },
            legend: {
                display: true
            }
        }
    });
    // Area Chart Prajekan
    var ctx2 = document.getElementById("6jumRek");
    var myLineChart = new Chart(ctx2, {
        type: 'line',
        data: {
            labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Ags", "Sep", "Okt", "Nov", "Des"],
            datasets: [{
                label: "Jumlah Rekening",
                lineTension: 0.3,
                backgroundColor: "rgba(50,205,50,0.2)",
                borderColor: "rgba(50,205,50,1)",
                pointRadius: 5,
                pointBackgroundColor: "rgba(50,205,50,1)",
                pointBorderColor: "rgba(255,255,255,0.8)",
                pointHoverRadius: 5,
                pointHoverBackgroundColor: "rgba(50,205,50,1)",
                pointHitRadius: 50,
                pointBorderWidth: 2,
                data: [
                    <?= $pjkJumRekJan ?>,
                    <?= $pjkJumRekFeb ?>,
                    <?= $pjkJumRekMar ?>,
                    <?= $pjkJumRekApr ?>,
                    <?= $pjkJumRekMei ?>,
                    <?= $pjkJumRekJun ?>,
                    <?= $pjkJumRekJul ?>,
                    <?= $pjkJumRekAgs ?>,
                    <?= $pjkJumRekSep ?>,
                    <?= $pjkJumRekOkt ?>,
                    <?= $pjkJumRekNov ?>,
                    <?= $pjkJumRekDes ?>,
                ],
            }],
        },
        options: {
            scales: {
                xAxes: [{
                    time: {
                        unit: 'date'
                    },
                    gridLines: {
                        display: false
                    },
                    ticks: {
                        maxTicksLimit: 20
                    }
                }],
                yAxes: [{
                    ticks: {
                        min: 950,
                        max: 1050,
                        maxTicksLimit: 20
                    },
                    gridLines: {
                        color: "rgba(0, 0, 0, .125)",
                    }
                }],
            },
            legend: {
                display: true
            }
        }
    });
    // Area Chart Tlogosari
    var ctx2 = document.getElementById("7jumRek");
    var myLineChart = new Chart(ctx2, {
        type: 'line',
        data: {
            labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Ags", "Sep", "Okt", "Nov", "Des"],
            datasets: [{
                label: "Jumlah Rekening",
                lineTension: 0.3,
                backgroundColor: "rgba(50,205,50,0.2)",
                borderColor: "rgba(50,205,50,1)",
                pointRadius: 5,
                pointBackgroundColor: "rgba(50,205,50,1)",
                pointBorderColor: "rgba(255,255,255,0.8)",
                pointHoverRadius: 5,
                pointHoverBackgroundColor: "rgba(50,205,50,1)",
                pointHitRadius: 50,
                pointBorderWidth: 2,
                data: [
                    <?= $tlgJumRekJan ?>,
                    <?= $tlgJumRekFeb ?>,
                    <?= $tlgJumRekMar ?>,
                    <?= $tlgJumRekApr ?>,
                    <?= $tlgJumRekMei ?>,
                    <?= $tlgJumRekJun ?>,
                    <?= $tlgJumRekJul ?>,
                    <?= $tlgJumRekAgs ?>,
                    <?= $tlgJumRekSep ?>,
                    <?= $tlgJumRekOkt ?>,
                    <?= $tlgJumRekNov ?>,
                    <?= $tlgJumRekDes ?>,
                ],
            }],
        },
        options: {
            scales: {
                xAxes: [{
                    time: {
                        unit: 'date'
                    },
                    gridLines: {
                        display: false
                    },
                    ticks: {
                        maxTicksLimit: 20
                    }
                }],
                yAxes: [{
                    ticks: {
                        min: 900,
                        max: 1200,
                        maxTicksLimit: 20
                    },
                    gridLines: {
                        color: "rgba(0, 0, 0, .125)",
                    }
                }],
            },
            legend: {
                display: true
            }
        }
    });
    // Area Chart Wringin
    var ctx2 = document.getElementById("8jumRek");
    var myLineChart = new Chart(ctx2, {
        type: 'line',
        data: {
            labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Ags", "Sep", "Okt", "Nov", "Des"],
            datasets: [{
                label: "Jumlah Rekening",
                lineTension: 0.3,
                backgroundColor: "rgba(50,205,50,0.2)",
                borderColor: "rgba(50,205,50,1)",
                pointRadius: 5,
                pointBackgroundColor: "rgba(50,205,50,1)",
                pointBorderColor: "rgba(255,255,255,0.8)",
                pointHoverRadius: 5,
                pointHoverBackgroundColor: "rgba(50,205,50,1)",
                pointHitRadius: 50,
                pointBorderWidth: 2,
                data: [
                    <?= $wrgJumRekJan ?>,
                    <?= $wrgJumRekFeb ?>,
                    <?= $wrgJumRekMar ?>,
                    <?= $wrgJumRekApr ?>,
                    <?= $wrgJumRekMei ?>,
                    <?= $wrgJumRekJun ?>,
                    <?= $wrgJumRekJul ?>,
                    <?= $wrgJumRekAgs ?>,
                    <?= $wrgJumRekSep ?>,
                    <?= $wrgJumRekOkt ?>,
                    <?= $wrgJumRekNov ?>,
                    <?= $wrgJumRekDes ?>,
                ],
            }],
        },
        options: {
            scales: {
                xAxes: [{
                    time: {
                        unit: 'date'
                    },
                    gridLines: {
                        display: false
                    },
                    ticks: {
                        maxTicksLimit: 20
                    }
                }],
                yAxes: [{
                    ticks: {
                        min: 1000,
                        max: 1200,
                        maxTicksLimit: 20
                    },
                    gridLines: {
                        color: "rgba(0, 0, 0, .125)",
                    }
                }],
            },
            legend: {
                display: true
            }
        }
    });
    // Area Chart Curahdami
    var ctx2 = document.getElementById("9jumRek");
    var myLineChart = new Chart(ctx2, {
        type: 'line',
        data: {
            labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Ags", "Sep", "Okt", "Nov", "Des"],
            datasets: [{
                label: "Jumlah Rekening",
                lineTension: 0.3,
                backgroundColor: "rgba(50,205,50,0.2)",
                borderColor: "rgba(50,205,50,1)",
                pointRadius: 5,
                pointBackgroundColor: "rgba(50,205,50,1)",
                pointBorderColor: "rgba(255,255,255,0.8)",
                pointHoverRadius: 5,
                pointHoverBackgroundColor: "rgba(50,205,50,1)",
                pointHitRadius: 50,
                pointBorderWidth: 2,
                data: [
                    <?= $crdJumRekJan ?>,
                    <?= $crdJumRekFeb ?>,
                    <?= $crdJumRekMar ?>,
                    <?= $crdJumRekApr ?>,
                    <?= $crdJumRekMei ?>,
                    <?= $crdJumRekJun ?>,
                    <?= $crdJumRekJul ?>,
                    <?= $crdJumRekAgs ?>,
                    <?= $crdJumRekSep ?>,
                    <?= $crdJumRekOkt ?>,
                    <?= $crdJumRekNov ?>,
                    <?= $crdJumRekDes ?>,
                ],
            }],
        },
        options: {
            scales: {
                xAxes: [{
                    time: {
                        unit: 'date'
                    },
                    gridLines: {
                        display: false
                    },
                    ticks: {
                        maxTicksLimit: 20
                    }
                }],
                yAxes: [{
                    ticks: {
                        min: 1200,
                        max: 1300,
                        maxTicksLimit: 20
                    },
                    gridLines: {
                        color: "rgba(0, 0, 0, .125)",
                    }
                }],
            },
            legend: {
                display: true
            }
        }
    });
    // Area Chart Tamanan
    var ctx2 = document.getElementById("10jumRek");
    var myLineChart = new Chart(ctx2, {
        type: 'line',
        data: {
            labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Ags", "Sep", "Okt", "Nov", "Des"],
            datasets: [{
                label: "Jumlah Rekening",
                lineTension: 0.3,
                backgroundColor: "rgba(50,205,50,0.2)",
                borderColor: "rgba(50,205,50,1)",
                pointRadius: 5,
                pointBackgroundColor: "rgba(50,205,50,1)",
                pointBorderColor: "rgba(255,255,255,0.8)",
                pointHoverRadius: 5,
                pointHoverBackgroundColor: "rgba(50,205,50,1)",
                pointHitRadius: 50,
                pointBorderWidth: 2,
                data: [
                    <?= $tmnJumRekJan ?>,
                    <?= $tmnJumRekFeb ?>,
                    <?= $tmnJumRekMar ?>,
                    <?= $tmnJumRekApr ?>,
                    <?= $tmnJumRekMei ?>,
                    <?= $tmnJumRekJun ?>,
                    <?= $tmnJumRekJul ?>,
                    <?= $tmnJumRekAgs ?>,
                    <?= $tmnJumRekSep ?>,
                    <?= $tmnJumRekOkt ?>,
                    <?= $tmnJumRekNov ?>,
                    <?= $tmnJumRekDes ?>,
                ],
            }],
        },
        options: {
            scales: {
                xAxes: [{
                    time: {
                        unit: 'date'
                    },
                    gridLines: {
                        display: false
                    },
                    ticks: {
                        maxTicksLimit: 20
                    }
                }],
                yAxes: [{
                    ticks: {
                        min: 290,
                        max: 310,
                        maxTicksLimit: 20
                    },
                    gridLines: {
                        color: "rgba(0, 0, 0, .125)",
                    }
                }],
            },
            legend: {
                display: true
            }
        }
    });
    // Area Chart Tenggarang
    var ctx2 = document.getElementById("11jumRek");
    var myLineChart = new Chart(ctx2, {
        type: 'line',
        data: {
            labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Ags", "Sep", "Okt", "Nov", "Des"],
            datasets: [{
                label: "Jumlah Rekening",
                lineTension: 0.3,
                backgroundColor: "rgba(50,205,50,0.2)",
                borderColor: "rgba(50,205,50,1)",
                pointRadius: 5,
                pointBackgroundColor: "rgba(50,205,50,1)",
                pointBorderColor: "rgba(255,255,255,0.8)",
                pointHoverRadius: 5,
                pointHoverBackgroundColor: "rgba(50,205,50,1)",
                pointHitRadius: 50,
                pointBorderWidth: 2,
                data: [
                    <?= $tgrJumRekJan ?>,
                    <?= $tgrJumRekFeb ?>,
                    <?= $tgrJumRekMar ?>,
                    <?= $tgrJumRekApr ?>,
                    <?= $tgrJumRekMei ?>,
                    <?= $tgrJumRekJun ?>,
                    <?= $tgrJumRekJul ?>,
                    <?= $tgrJumRekAgs ?>,
                    <?= $tgrJumRekSep ?>,
                    <?= $tgrJumRekOkt ?>,
                    <?= $tgrJumRekNov ?>,
                    <?= $tgrJumRekDes ?>,
                ],
            }],
        },
        options: {
            scales: {
                xAxes: [{
                    time: {
                        unit: 'date'
                    },
                    gridLines: {
                        display: false
                    },
                    ticks: {
                        maxTicksLimit: 20
                    }
                }],
                yAxes: [{
                    ticks: {
                        min: 550,
                        max: 600,
                        maxTicksLimit: 20
                    },
                    gridLines: {
                        color: "rgba(0, 0, 0, .125)",
                    }
                }],
            },
            legend: {
                display: true
            }
        }
    });
    // Area Chart TamanKrocok
    var ctx2 = document.getElementById("12jumRek");
    var myLineChart = new Chart(ctx2, {
        type: 'line',
        data: {
            labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Ags", "Sep", "Okt", "Nov", "Des"],
            datasets: [{
                label: "Jumlah Rekening",
                lineTension: 0.3,
                backgroundColor: "rgba(50,205,50,0.2)",
                borderColor: "rgba(50,205,50,1)",
                pointRadius: 5,
                pointBackgroundColor: "rgba(50,205,50,1)",
                pointBorderColor: "rgba(255,255,255,0.8)",
                pointHoverRadius: 5,
                pointHoverBackgroundColor: "rgba(50,205,50,1)",
                pointHitRadius: 50,
                pointBorderWidth: 2,
                data: [
                    <?= $tmkJumRekJan ?>,
                    <?= $tmkJumRekFeb ?>,
                    <?= $tmkJumRekMar ?>,
                    <?= $tmkJumRekApr ?>,
                    <?= $tmkJumRekMei ?>,
                    <?= $tmkJumRekJun ?>,
                    <?= $tmkJumRekJul ?>,
                    <?= $tmkJumRekAgs ?>,
                    <?= $tmkJumRekSep ?>,
                    <?= $tmkJumRekOkt ?>,
                    <?= $tmkJumRekNov ?>,
                    <?= $tmkJumRekDes ?>,
                ],
            }],
        },
        options: {
            scales: {
                xAxes: [{
                    time: {
                        unit: 'date'
                    },
                    gridLines: {
                        display: false
                    },
                    ticks: {
                        maxTicksLimit: 20
                    }
                }],
                yAxes: [{
                    ticks: {
                        min: 510,
                        max: 610,
                        maxTicksLimit: 20
                    },
                    gridLines: {
                        color: "rgba(0, 0, 0, .125)",
                    }
                }],
            },
            legend: {
                display: true
            }
        }
    });
    // Area Chart Wonosari
    var ctx2 = document.getElementById("13jumRek");
    var myLineChart = new Chart(ctx2, {
        type: 'line',
        data: {
            labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Ags", "Sep", "Okt", "Nov", "Des"],
            datasets: [{
                label: "Jumlah Rekening",
                lineTension: 0.3,
                backgroundColor: "rgba(50,205,50,0.2)",
                borderColor: "rgba(50,205,50,1)",
                pointRadius: 5,
                pointBackgroundColor: "rgba(50,205,50,1)",
                pointBorderColor: "rgba(255,255,255,0.8)",
                pointHoverRadius: 5,
                pointHoverBackgroundColor: "rgba(50,205,50,1)",
                pointHitRadius: 50,
                pointBorderWidth: 2,
                data: [
                    <?= $wnsJumRekJan ?>,
                    <?= $wnsJumRekFeb ?>,
                    <?= $wnsJumRekMar ?>,
                    <?= $wnsJumRekApr ?>,
                    <?= $wnsJumRekMei ?>,
                    <?= $wnsJumRekJun ?>,
                    <?= $wnsJumRekJul ?>,
                    <?= $wnsJumRekAgs ?>,
                    <?= $wnsJumRekSep ?>,
                    <?= $wnsJumRekOkt ?>,
                    <?= $wnsJumRekNov ?>,
                    <?= $wnsJumRekDes ?>,
                ],
            }],
        },
        options: {
            scales: {
                xAxes: [{
                    time: {
                        unit: 'date'
                    },
                    gridLines: {
                        display: false
                    },
                    ticks: {
                        maxTicksLimit: 20
                    }
                }],
                yAxes: [{
                    ticks: {
                        min: 1000,
                        max: 1200,
                        maxTicksLimit: 20
                    },
                    gridLines: {
                        color: "rgba(0, 0, 0, .125)",
                    }
                }],
            },
            legend: {
                display: true
            }
        }
    });
    // Area Chart Klabang
    var ctx2 = document.getElementById("14jumRek");
    var myLineChart = new Chart(ctx2, {
        type: 'line',
        data: {
            labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Ags", "Sep", "Okt", "Nov", "Des"],
            datasets: [{
                label: "Jumlah Rekening",
                lineTension: 0.3,
                backgroundColor: "rgba(50,205,50,0.2)",
                borderColor: "rgba(50,205,50,1)",
                pointRadius: 5,
                pointBackgroundColor: "rgba(50,205,50,1)",
                pointBorderColor: "rgba(255,255,255,0.8)",
                pointHoverRadius: 5,
                pointHoverBackgroundColor: "rgba(50,205,50,1)",
                pointHitRadius: 50,
                pointBorderWidth: 2,
                data: [
                    <?= $klbJumRekJan ?>,
                    <?= $klbJumRekFeb ?>,
                    <?= $klbJumRekMar ?>,
                    <?= $klbJumRekApr ?>,
                    <?= $klbJumRekMei ?>,
                    <?= $klbJumRekJun ?>,
                    <?= $klbJumRekJul ?>,
                    <?= $klbJumRekAgs ?>,
                    <?= $klbJumRekSep ?>,
                    <?= $klbJumRekOkt ?>,
                    <?= $klbJumRekNov ?>,
                    <?= $klbJumRekDes ?>,
                ],
            }],
        },
        options: {
            scales: {
                xAxes: [{
                    time: {
                        unit: 'date'
                    },
                    gridLines: {
                        display: false
                    },
                    ticks: {
                        maxTicksLimit: 20
                    }
                }],
                yAxes: [{
                    ticks: {
                        min: 80,
                        max: 110,
                        maxTicksLimit: 20
                    },
                    gridLines: {
                        color: "rgba(0, 0, 0, .125)",
                    }
                }],
            },
            legend: {
                display: true
            }
        }
    });
    // Area Chart Sukosari 2
    var ctx2 = document.getElementById("15jumRek");
    var myLineChart = new Chart(ctx2, {
        type: 'line',
        data: {
            labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Ags", "Sep", "Okt", "Nov", "Des"],
            datasets: [{
                label: "Jumlah Rekening",
                lineTension: 0.3,
                backgroundColor: "rgba(50,205,50,0.2)",
                borderColor: "rgba(50,205,50,1)",
                pointRadius: 5,
                pointBackgroundColor: "rgba(50,205,50,1)",
                pointBorderColor: "rgba(255,255,255,0.8)",
                pointHoverRadius: 5,
                pointHoverBackgroundColor: "rgba(50,205,50,1)",
                pointHitRadius: 50,
                pointBorderWidth: 2,
                data: [
                    <?= $suko2JumRekJan ?>,
                    <?= $suko2JumRekFeb ?>,
                    <?= $suko2JumRekMar ?>,
                    <?= $suko2JumRekApr ?>,
                    <?= $suko2JumRekMei ?>,
                    <?= $suko2JumRekJun ?>,
                    <?= $suko2JumRekJul ?>,
                    <?= $suko2JumRekAgs ?>,
                    <?= $suko2JumRekSep ?>,
                    <?= $suko2JumRekOkt ?>,
                    <?= $suko2JumRekNov ?>,
                    <?= $suko2JumRekDes ?>,
                ],
            }],
        },
        options: {
            scales: {
                xAxes: [{
                    time: {
                        unit: 'date'
                    },
                    gridLines: {
                        display: false
                    },
                    ticks: {
                        maxTicksLimit: 20
                    }
                }],
                yAxes: [{
                    ticks: {
                        min: 1450,
                        max: 1550,
                        maxTicksLimit: 20
                    },
                    gridLines: {
                        color: "rgba(0, 0, 0, .125)",
                    }
                }],
            },
            legend: {
                display: true
            }
        }
    });
</script>
<!-- end jumlah rekening -->
<!-- Air Pakai -->
<script>
    // Set new default font family and font color to mimic Bootstrap's default styling
    Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
    Chart.defaults.global.defaultFontColor = '#292b2c';

    // Area Chart Bondowoso
    var ctx2 = document.getElementById("1airPakai");
    var myLineChart = new Chart(ctx2, {
        type: 'line',
        data: {
            labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Ags", "Sep", "Okt", "Nov", "Des"],
            datasets: [{
                label: "Air Pakai (M3)",
                lineTension: 0.3,
                backgroundColor: "rgba(50,50,216,0.2)",
                borderColor: "rgba(50,50,216,1)",
                pointRadius: 5,
                pointBackgroundColor: "rgba(50,50,216,1)",
                pointBorderColor: "rgba(255,255,255,0.8)",
                pointHoverRadius: 5,
                pointHoverBackgroundColor: "rgba(50,50,216,1)",
                pointHitRadius: 50,
                pointBorderWidth: 2,
                data: [
                    <?= $bonAirPakaiJan ?>,
                    <?= $bonAirPakaiFeb ?>,
                    <?= $bonAirPakaiMar ?>,
                    <?= $bonAirPakaiApr ?>,
                    <?= $bonAirPakaiMei ?>,
                    <?= $bonAirPakaiJun ?>,
                    <?= $bonAirPakaiJul ?>,
                    <?= $bonAirPakaiAgs ?>,
                    <?= $bonAirPakaiSep ?>,
                    <?= $bonAirPakaiOkt ?>,
                    <?= $bonAirPakaiNov ?>,
                    <?= $bonAirPakaiDes ?>

                ],
            }],
        },
        options: {
            scales: {
                xAxes: [{
                    time: {
                        unit: 'date'
                    },
                    gridLines: {
                        display: false
                    },
                    ticks: {
                        maxTicksLimit: 20
                    }
                }],
                yAxes: [{
                    ticks: {
                        min: 70000,
                        max: 85000,
                        maxTicksLimit: 20
                    },
                    gridLines: {
                        color: "rgba(0, 0, 0, .125)",
                    }
                }],
            },
            legend: {
                display: true
            }
        }
    });

    // Area Chart Sukosari
    var ctx2 = document.getElementById("2airPakai");
    var myLineChart = new Chart(ctx2, {
        type: 'line',
        data: {
            labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Ags", "Sep", "Okt", "Nov", "Des"],
            datasets: [{
                label: "Air Pakai (M3)",
                lineTension: 0.3,
                backgroundColor: "rgba(50,50,216,0.2)",
                borderColor: "rgba(50,50,216,1)",
                pointRadius: 5,
                pointBackgroundColor: "rgba(50,50,216,1)",
                pointBorderColor: "rgba(255,255,255,0.8)",
                pointHoverRadius: 5,
                pointHoverBackgroundColor: "rgba(50,50,216,1)",
                pointHitRadius: 50,
                pointBorderWidth: 2,
                data: [
                    <?= $suko1AirPakaiJan ?>,
                    <?= $suko1AirPakaiFeb ?>,
                    <?= $suko1AirPakaiMar ?>,
                    <?= $suko1AirPakaiApr ?>,
                    <?= $suko1AirPakaiMei ?>,
                    <?= $suko1AirPakaiJun ?>,
                    <?= $suko1AirPakaiJul ?>,
                    <?= $suko1AirPakaiAgs ?>,
                    <?= $suko1AirPakaiSep ?>,
                    <?= $suko1AirPakaiOkt ?>,
                    <?= $suko1AirPakaiNov ?>,
                    <?= $suko1AirPakaiDes ?>,
                ],
            }],
        },
        options: {
            scales: {
                xAxes: [{
                    time: {
                        unit: 'date'
                    },
                    gridLines: {
                        display: false
                    },
                    ticks: {
                        maxTicksLimit: 20
                    }
                }],
                yAxes: [{
                    ticks: {
                        min: 12000,
                        max: 17000,
                        maxTicksLimit: 20
                    },
                    gridLines: {
                        color: "rgba(0, 0, 0, .125)",
                    }
                }],
            },
            legend: {
                display: true
            }
        }
    });

    // Area Chart Maesan
    var ctx2 = document.getElementById("3airPakai");
    var myLineChart = new Chart(ctx2, {
        type: 'line',
        data: {
            labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Ags", "Sep", "Okt", "Nov", "Des"],
            datasets: [{
                label: "Air Pakai (M3)",
                lineTension: 0.3,
                backgroundColor: "rgba(50,50,216,0.2)",
                borderColor: "rgba(50,50,216,1)",
                pointRadius: 5,
                pointBackgroundColor: "rgba(50,50,216,1)",
                pointBorderColor: "rgba(255,255,255,0.8)",
                pointHoverRadius: 5,
                pointHoverBackgroundColor: "rgba(50,50,216,1)",
                pointHitRadius: 50,
                pointBorderWidth: 2,
                data: [
                    <?= $msnAirPakaiJan ?>,
                    <?= $msnAirPakaiFeb ?>,
                    <?= $msnAirPakaiMar ?>,
                    <?= $msnAirPakaiApr ?>,
                    <?= $msnAirPakaiMei ?>,
                    <?= $msnAirPakaiJun ?>,
                    <?= $msnAirPakaiJul ?>,
                    <?= $msnAirPakaiAgs ?>,
                    <?= $msnAirPakaiSep ?>,
                    <?= $msnAirPakaiOkt ?>,
                    <?= $msnAirPakaiNov ?>,
                    <?= $msnAirPakaiDes ?>,
                ],
            }],
        },
        options: {
            scales: {
                xAxes: [{
                    time: {
                        unit: 'date'
                    },
                    gridLines: {
                        display: false
                    },
                    ticks: {
                        maxTicksLimit: 20
                    }
                }],
                yAxes: [{
                    ticks: {
                        min: 14000,
                        max: 20000,
                        maxTicksLimit: 20
                    },
                    gridLines: {
                        color: "rgba(0, 0, 0, .125)",
                    }
                }],
            },
            legend: {
                display: true
            }
        }
    });
    // Area Chart Tegalampel
    var ctx2 = document.getElementById("4airPakai");
    var myLineChart = new Chart(ctx2, {
        type: 'line',
        data: {
            labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Ags", "Sep", "Okt", "Nov", "Des"],
            datasets: [{
                label: "Air Pakai (M3)",
                lineTension: 0.3,
                backgroundColor: "rgba(50,50,216,0.2)",
                borderColor: "rgba(50,50,216,1)",
                pointRadius: 5,
                pointBackgroundColor: "rgba(50,50,216,1)",
                pointBorderColor: "rgba(255,255,255,0.8)",
                pointHoverRadius: 5,
                pointHoverBackgroundColor: "rgba(50,50,216,1)",
                pointHitRadius: 50,
                pointBorderWidth: 2,
                data: [
                    <?= $tglAirPakaiJan ?>,
                    <?= $tglAirPakaiFeb ?>,
                    <?= $tglAirPakaiMar ?>,
                    <?= $tglAirPakaiApr ?>,
                    <?= $tglAirPakaiMei ?>,
                    <?= $tglAirPakaiJun ?>,
                    <?= $tglAirPakaiJul ?>,
                    <?= $tglAirPakaiAgs ?>,
                    <?= $tglAirPakaiSep ?>,
                    <?= $tglAirPakaiOkt ?>,
                    <?= $tglAirPakaiNov ?>,
                    <?= $tglAirPakaiDes ?>,
                ],
            }],
        },
        options: {
            scales: {
                xAxes: [{
                    time: {
                        unit: 'date'
                    },
                    gridLines: {
                        display: false
                    },
                    ticks: {
                        maxTicksLimit: 20
                    }
                }],
                yAxes: [{
                    ticks: {
                        min: 19000,
                        max: 25000,
                        maxTicksLimit: 20
                    },
                    gridLines: {
                        color: "rgba(0, 0, 0, .125)",
                    }
                }],
            },
            legend: {
                display: true
            }
        }
    });
    // Area Chart Tapen
    var ctx2 = document.getElementById("5airPakai");
    var myLineChart = new Chart(ctx2, {
        type: 'line',
        data: {
            labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Ags", "Sep", "Okt", "Nov", "Des"],
            datasets: [{
                label: "Air Pakai (M3)",
                lineTension: 0.3,
                backgroundColor: "rgba(50,50,216,0.2)",
                borderColor: "rgba(50,50,216,1)",
                pointRadius: 5,
                pointBackgroundColor: "rgba(50,50,216,1)",
                pointBorderColor: "rgba(255,255,255,0.8)",
                pointHoverRadius: 5,
                pointHoverBackgroundColor: "rgba(50,50,216,1)",
                pointHitRadius: 50,
                pointBorderWidth: 2,
                data: [
                    <?= $tpnAirPakaiJan ?>,
                    <?= $tpnAirPakaiFeb ?>,
                    <?= $tpnAirPakaiMar ?>,
                    <?= $tpnAirPakaiApr ?>,
                    <?= $tpnAirPakaiMei ?>,
                    <?= $tpnAirPakaiJun ?>,
                    <?= $tpnAirPakaiJul ?>,
                    <?= $tpnAirPakaiAgs ?>,
                    <?= $tpnAirPakaiSep ?>,
                    <?= $tpnAirPakaiOkt ?>,
                    <?= $tpnAirPakaiNov ?>,
                    <?= $tpnAirPakaiDes ?>,
                ],
            }],
        },
        options: {
            scales: {
                xAxes: [{
                    time: {
                        unit: 'date'
                    },
                    gridLines: {
                        display: false
                    },
                    ticks: {
                        maxTicksLimit: 20
                    }
                }],
                yAxes: [{
                    ticks: {
                        min: 11000,
                        max: 15000,
                        maxTicksLimit: 20
                    },
                    gridLines: {
                        color: "rgba(0, 0, 0, .125)",
                    }
                }],
            },
            legend: {
                display: true
            }
        }
    });
    // Area Chart Prajekan
    var ctx2 = document.getElementById("6airPakai");
    var myLineChart = new Chart(ctx2, {
        type: 'line',
        data: {
            labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Ags", "Sep", "Okt", "Nov", "Des"],
            datasets: [{
                label: "Air Pakai (M3)",
                lineTension: 0.3,
                backgroundColor: "rgba(50,50,216,0.2)",
                borderColor: "rgba(50,50,216,1)",
                pointRadius: 5,
                pointBackgroundColor: "rgba(50,50,216,1)",
                pointBorderColor: "rgba(255,255,255,0.8)",
                pointHoverRadius: 5,
                pointHoverBackgroundColor: "rgba(50,50,216,1)",
                pointHitRadius: 50,
                pointBorderWidth: 2,
                data: [
                    <?= $pjkAirPakaiJan ?>,
                    <?= $pjkAirPakaiFeb ?>,
                    <?= $pjkAirPakaiMar ?>,
                    <?= $pjkAirPakaiApr ?>,
                    <?= $pjkAirPakaiMei ?>,
                    <?= $pjkAirPakaiJun ?>,
                    <?= $pjkAirPakaiJul ?>,
                    <?= $pjkAirPakaiAgs ?>,
                    <?= $pjkAirPakaiSep ?>,
                    <?= $pjkAirPakaiOkt ?>,
                    <?= $pjkAirPakaiNov ?>,
                    <?= $pjkAirPakaiDes ?>,
                ],
            }],
        },
        options: {
            scales: {
                xAxes: [{
                    time: {
                        unit: 'date'
                    },
                    gridLines: {
                        display: false
                    },
                    ticks: {
                        maxTicksLimit: 20
                    }
                }],
                yAxes: [{
                    ticks: {
                        min: 10000,
                        max: 14000,
                        maxTicksLimit: 20
                    },
                    gridLines: {
                        color: "rgba(0, 0, 0, .125)",
                    }
                }],
            },
            legend: {
                display: true
            }
        }
    });
    // Area Chart Tlogosari
    var ctx2 = document.getElementById("7airPakai");
    var myLineChart = new Chart(ctx2, {
        type: 'line',
        data: {
            labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Ags", "Sep", "Okt", "Nov", "Des"],
            datasets: [{
                label: "Air Pakai (M3)",
                lineTension: 0.3,
                backgroundColor: "rgba(50,50,216,0.2)",
                borderColor: "rgba(50,50,216,1)",
                pointRadius: 5,
                pointBackgroundColor: "rgba(50,50,216,1)",
                pointBorderColor: "rgba(255,255,255,0.8)",
                pointHoverRadius: 5,
                pointHoverBackgroundColor: "rgba(50,50,216,1)",
                pointHitRadius: 50,
                pointBorderWidth: 2,
                data: [
                    <?= $tlgAirPakaiJan ?>,
                    <?= $tlgAirPakaiFeb ?>,
                    <?= $tlgAirPakaiMar ?>,
                    <?= $tlgAirPakaiApr ?>,
                    <?= $tlgAirPakaiMei ?>,
                    <?= $tlgAirPakaiJun ?>,
                    <?= $tlgAirPakaiJul ?>,
                    <?= $tlgAirPakaiAgs ?>,
                    <?= $tlgAirPakaiSep ?>,
                    <?= $tlgAirPakaiOkt ?>,
                    <?= $tlgAirPakaiNov ?>,
                    <?= $tlgAirPakaiDes ?>,
                ],
            }],
        },
        options: {
            scales: {
                xAxes: [{
                    time: {
                        unit: 'date'
                    },
                    gridLines: {
                        display: false
                    },
                    ticks: {
                        maxTicksLimit: 20
                    }
                }],
                yAxes: [{
                    ticks: {
                        min: 6000,
                        max: 12000,
                        maxTicksLimit: 20
                    },
                    gridLines: {
                        color: "rgba(0, 0, 0, .125)",
                    }
                }],
            },
            legend: {
                display: true
            }
        }
    });
    // Area Chart Wringin
    var ctx2 = document.getElementById("8airPakai");
    var myLineChart = new Chart(ctx2, {
        type: 'line',
        data: {
            labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Ags", "Sep", "Okt", "Nov", "Des"],
            datasets: [{
                label: "Air Pakai (M3)",
                lineTension: 0.3,
                backgroundColor: "rgba(50,50,216,0.2)",
                borderColor: "rgba(50,50,216,1)",
                pointRadius: 5,
                pointBackgroundColor: "rgba(50,50,216,1)",
                pointBorderColor: "rgba(255,255,255,0.8)",
                pointHoverRadius: 5,
                pointHoverBackgroundColor: "rgba(50,50,216,1)",
                pointHitRadius: 50,
                pointBorderWidth: 2,
                data: [
                    <?= $wrgAirPakaiJan ?>,
                    <?= $wrgAirPakaiFeb ?>,
                    <?= $wrgAirPakaiMar ?>,
                    <?= $wrgAirPakaiApr ?>,
                    <?= $wrgAirPakaiMei ?>,
                    <?= $wrgAirPakaiJun ?>,
                    <?= $wrgAirPakaiJul ?>,
                    <?= $wrgAirPakaiAgs ?>,
                    <?= $wrgAirPakaiSep ?>,
                    <?= $wrgAirPakaiOkt ?>,
                    <?= $wrgAirPakaiNov ?>,
                    <?= $wrgAirPakaiDes ?>,
                ],
            }],
        },
        options: {
            scales: {
                xAxes: [{
                    time: {
                        unit: 'date'
                    },
                    gridLines: {
                        display: false
                    },
                    ticks: {
                        maxTicksLimit: 20
                    }
                }],
                yAxes: [{
                    ticks: {
                        min: 11000,
                        max: 17000,
                        maxTicksLimit: 20
                    },
                    gridLines: {
                        color: "rgba(0, 0, 0, .125)",
                    }
                }],
            },
            legend: {
                display: true
            }
        }
    });
    // Area Chart Curahdami
    var ctx2 = document.getElementById("9airPakai");
    var myLineChart = new Chart(ctx2, {
        type: 'line',
        data: {
            labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Ags", "Sep", "Okt", "Nov", "Des"],
            datasets: [{
                label: "Air Pakai (M3)",
                lineTension: 0.3,
                backgroundColor: "rgba(50,50,216,0.2)",
                borderColor: "rgba(50,50,216,1)",
                pointRadius: 5,
                pointBackgroundColor: "rgba(50,50,216,1)",
                pointBorderColor: "rgba(255,255,255,0.8)",
                pointHoverRadius: 5,
                pointHoverBackgroundColor: "rgba(50,50,216,1)",
                pointHitRadius: 50,
                pointBorderWidth: 2,
                data: [
                    <?= $crdAirPakaiJan ?>,
                    <?= $crdAirPakaiFeb ?>,
                    <?= $crdAirPakaiMar ?>,
                    <?= $crdAirPakaiApr ?>,
                    <?= $crdAirPakaiMei ?>,
                    <?= $crdAirPakaiJun ?>,
                    <?= $crdAirPakaiJul ?>,
                    <?= $crdAirPakaiAgs ?>,
                    <?= $crdAirPakaiSep ?>,
                    <?= $crdAirPakaiOkt ?>,
                    <?= $crdAirPakaiNov ?>,
                    <?= $crdAirPakaiDes ?>,
                ],
            }],
        },
        options: {
            scales: {
                xAxes: [{
                    time: {
                        unit: 'date'
                    },
                    gridLines: {
                        display: false
                    },
                    ticks: {
                        maxTicksLimit: 20
                    }
                }],
                yAxes: [{
                    ticks: {
                        min: 14400,
                        max: 21000,
                        maxTicksLimit: 20
                    },
                    gridLines: {
                        color: "rgba(0, 0, 0, .125)",
                    }
                }],
            },
            legend: {
                display: true
            }
        }
    });
    // Area Chart Tamanan
    var ctx2 = document.getElementById("10airPakai");
    var myLineChart = new Chart(ctx2, {
        type: 'line',
        data: {
            labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Ags", "Sep", "Okt", "Nov", "Des"],
            datasets: [{
                label: "Air Pakai (M3)",
                lineTension: 0.3,
                backgroundColor: "rgba(50,50,216,0.2)",
                borderColor: "rgba(50,50,216,1)",
                pointRadius: 5,
                pointBackgroundColor: "rgba(50,50,216,1)",
                pointBorderColor: "rgba(255,255,255,0.8)",
                pointHoverRadius: 5,
                pointHoverBackgroundColor: "rgba(50,50,216,1)",
                pointHitRadius: 50,
                pointBorderWidth: 2,
                data: [
                    <?= $tmnAirPakaiJan ?>,
                    <?= $tmnAirPakaiFeb ?>,
                    <?= $tmnAirPakaiMar ?>,
                    <?= $tmnAirPakaiApr ?>,
                    <?= $tmnAirPakaiMei ?>,
                    <?= $tmnAirPakaiJun ?>,
                    <?= $tmnAirPakaiJul ?>,
                    <?= $tmnAirPakaiAgs ?>,
                    <?= $tmnAirPakaiSep ?>,
                    <?= $tmnAirPakaiOkt ?>,
                    <?= $tmnAirPakaiNov ?>,
                    <?= $tmnAirPakaiDes ?>,
                ],
            }],
        },
        options: {
            scales: {
                xAxes: [{
                    time: {
                        unit: 'date'
                    },
                    gridLines: {
                        display: false
                    },
                    ticks: {
                        maxTicksLimit: 20
                    }
                }],
                yAxes: [{
                    ticks: {
                        min: 3000,
                        max: 5000,
                        maxTicksLimit: 20
                    },
                    gridLines: {
                        color: "rgba(0, 0, 0, .125)",
                    }
                }],
            },
            legend: {
                display: true
            }
        }
    });
    // Area Chart Tenggarang
    var ctx2 = document.getElementById("11airPakai");
    var myLineChart = new Chart(ctx2, {
        type: 'line',
        data: {
            labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Ags", "Sep", "Okt", "Nov", "Des"],
            datasets: [{
                label: "Air Pakai (M3)",
                lineTension: 0.3,
                backgroundColor: "rgba(50,50,216,0.2)",
                borderColor: "rgba(50,50,216,1)",
                pointRadius: 5,
                pointBackgroundColor: "rgba(50,50,216,1)",
                pointBorderColor: "rgba(255,255,255,0.8)",
                pointHoverRadius: 5,
                pointHoverBackgroundColor: "rgba(50,50,216,1)",
                pointHitRadius: 50,
                pointBorderWidth: 2,
                data: [
                    <?= $tgrAirPakaiJan ?>,
                    <?= $tgrAirPakaiFeb ?>,
                    <?= $tgrAirPakaiMar ?>,
                    <?= $tgrAirPakaiApr ?>,
                    <?= $tgrAirPakaiMei ?>,
                    <?= $tgrAirPakaiJun ?>,
                    <?= $tgrAirPakaiJul ?>,
                    <?= $tgrAirPakaiAgs ?>,
                    <?= $tgrAirPakaiSep ?>,
                    <?= $tgrAirPakaiOkt ?>,
                    <?= $tgrAirPakaiNov ?>,
                    <?= $tgrAirPakaiDes ?>,
                ],
            }],
        },
        options: {
            scales: {
                xAxes: [{
                    time: {
                        unit: 'date'
                    },
                    gridLines: {
                        display: false
                    },
                    ticks: {
                        maxTicksLimit: 20
                    }
                }],
                yAxes: [{
                    ticks: {
                        min: 7400,
                        max: 9800,
                        maxTicksLimit: 20
                    },
                    gridLines: {
                        color: "rgba(0, 0, 0, .125)",
                    }
                }],
            },
            legend: {
                display: true
            }
        }
    });
    // Area Chart TamanKrocok
    var ctx2 = document.getElementById("12airPakai");
    var myLineChart = new Chart(ctx2, {
        type: 'line',
        data: {
            labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Ags", "Sep", "Okt", "Nov", "Des"],
            datasets: [{
                label: "Air Pakai (M3)",
                lineTension: 0.3,
                backgroundColor: "rgba(50,50,216,0.2)",
                borderColor: "rgba(50,50,216,1)",
                pointRadius: 5,
                pointBackgroundColor: "rgba(50,50,216,1)",
                pointBorderColor: "rgba(255,255,255,0.8)",
                pointHoverRadius: 5,
                pointHoverBackgroundColor: "rgba(50,50,216,1)",
                pointHitRadius: 50,
                pointBorderWidth: 2,
                data: [
                    <?= $tmkAirPakaiJan ?>,
                    <?= $tmkAirPakaiFeb ?>,
                    <?= $tmkAirPakaiMar ?>,
                    <?= $tmkAirPakaiApr ?>,
                    <?= $tmkAirPakaiMei ?>,
                    <?= $tmkAirPakaiJun ?>,
                    <?= $tmkAirPakaiJul ?>,
                    <?= $tmkAirPakaiAgs ?>,
                    <?= $tmkAirPakaiSep ?>,
                    <?= $tmkAirPakaiOkt ?>,
                    <?= $tmkAirPakaiNov ?>,
                    <?= $tmkAirPakaiDes ?>,
                ],
            }],
        },
        options: {
            scales: {
                xAxes: [{
                    time: {
                        unit: 'date'
                    },
                    gridLines: {
                        display: false
                    },
                    ticks: {
                        maxTicksLimit: 20
                    }
                }],
                yAxes: [{
                    ticks: {
                        min: 4800,
                        max: 7000,
                        maxTicksLimit: 20
                    },
                    gridLines: {
                        color: "rgba(0, 0, 0, .125)",
                    }
                }],
            },
            legend: {
                display: true
            }
        }
    });
    // Area Chart Wonosari
    var ctx2 = document.getElementById("13airPakai");
    var myLineChart = new Chart(ctx2, {
        type: 'line',
        data: {
            labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Ags", "Sep", "Okt", "Nov", "Des"],
            datasets: [{
                label: "Air Pakai (M3)",
                lineTension: 0.3,
                backgroundColor: "rgba(50,50,216,0.2)",
                borderColor: "rgba(50,50,216,1)",
                pointRadius: 5,
                pointBackgroundColor: "rgba(50,50,216,1)",
                pointBorderColor: "rgba(255,255,255,0.8)",
                pointHoverRadius: 5,
                pointHoverBackgroundColor: "rgba(50,50,216,1)",
                pointHitRadius: 50,
                pointBorderWidth: 2,
                data: [
                    <?= $wnsAirPakaiJan ?>,
                    <?= $wnsAirPakaiFeb ?>,
                    <?= $wnsAirPakaiMar ?>,
                    <?= $wnsAirPakaiApr ?>,
                    <?= $wnsAirPakaiMei ?>,
                    <?= $wnsAirPakaiJun ?>,
                    <?= $wnsAirPakaiJul ?>,
                    <?= $wnsAirPakaiAgs ?>,
                    <?= $wnsAirPakaiSep ?>,
                    <?= $wnsAirPakaiOkt ?>,
                    <?= $wnsAirPakaiNov ?>,
                    <?= $wnsAirPakaiDes ?>,
                ],
            }],
        },
        options: {
            scales: {
                xAxes: [{
                    time: {
                        unit: 'date'
                    },
                    gridLines: {
                        display: false
                    },
                    ticks: {
                        maxTicksLimit: 20
                    }
                }],
                yAxes: [{
                    ticks: {
                        min: 8000,
                        max: 12500,
                        maxTicksLimit: 20
                    },
                    gridLines: {
                        color: "rgba(0, 0, 0, .125)",
                    }
                }],
            },
            legend: {
                display: true
            }
        }
    });
    // Area Chart Klabang
    var ctx2 = document.getElementById("14airPakai");
    var myLineChart = new Chart(ctx2, {
        type: 'line',
        data: {
            labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Ags", "Sep", "Okt", "Nov", "Des"],
            datasets: [{
                label: "Air Pakai (M3)",
                lineTension: 0.3,
                backgroundColor: "rgba(50,50,216,0.2)",
                borderColor: "rgba(50,50,216,1)",
                pointRadius: 5,
                pointBackgroundColor: "rgba(50,50,216,1)",
                pointBorderColor: "rgba(255,255,255,0.8)",
                pointHoverRadius: 5,
                pointHoverBackgroundColor: "rgba(50,50,216,1)",
                pointHitRadius: 50,
                pointBorderWidth: 2,
                data: [
                    <?= $klbAirPakaiJan ?>,
                    <?= $klbAirPakaiFeb ?>,
                    <?= $klbAirPakaiMar ?>,
                    <?= $klbAirPakaiApr ?>,
                    <?= $klbAirPakaiMei ?>,
                    <?= $klbAirPakaiJun ?>,
                    <?= $klbAirPakaiJul ?>,
                    <?= $klbAirPakaiAgs ?>,
                    <?= $klbAirPakaiSep ?>,
                    <?= $klbAirPakaiOkt ?>,
                    <?= $klbAirPakaiNov ?>,
                    <?= $klbAirPakaiDes ?>,
                ],
            }],
        },
        options: {
            scales: {
                xAxes: [{
                    time: {
                        unit: 'date'
                    },
                    gridLines: {
                        display: false
                    },
                    ticks: {
                        maxTicksLimit: 20
                    }
                }],
                yAxes: [{
                    ticks: {
                        min: 800,
                        max: 4000,
                        maxTicksLimit: 20
                    },
                    gridLines: {
                        color: "rgba(0, 0, 0, .125)",
                    }
                }],
            },
            legend: {
                display: true
            }
        }
    });
    // Area Chart Sukosari 2
    var ctx2 = document.getElementById("15airPakai");
    var myLineChart = new Chart(ctx2, {
        type: 'line',
        data: {
            labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Ags", "Sep", "Okt", "Nov", "Des"],
            datasets: [{
                label: "Air Pakai (M3)",
                lineTension: 0.3,
                backgroundColor: "rgba(50,50,216,0.2)",
                borderColor: "rgba(50,50,216,1)",
                pointRadius: 5,
                pointBackgroundColor: "rgba(50,50,216,1)",
                pointBorderColor: "rgba(255,255,255,0.8)",
                pointHoverRadius: 5,
                pointHoverBackgroundColor: "rgba(50,50,216,1)",
                pointHitRadius: 50,
                pointBorderWidth: 2,
                data: [
                    <?= $suko2AirPakaiJan ?>,
                    <?= $suko2AirPakaiFeb ?>,
                    <?= $suko2AirPakaiMar ?>,
                    <?= $suko2AirPakaiApr ?>,
                    <?= $suko2AirPakaiMei ?>,
                    <?= $suko2AirPakaiJun ?>,
                    <?= $suko2AirPakaiJul ?>,
                    <?= $suko2AirPakaiAgs ?>,
                    <?= $suko2AirPakaiSep ?>,
                    <?= $suko2AirPakaiOkt ?>,
                    <?= $suko2AirPakaiNov ?>,
                    <?= $suko2AirPakaiDes ?>,
                ],
            }],
        },
        options: {
            scales: {
                xAxes: [{
                    time: {
                        unit: 'date'
                    },
                    gridLines: {
                        display: false
                    },
                    ticks: {
                        maxTicksLimit: 20
                    }
                }],
                yAxes: [{
                    ticks: {
                        min: 13000,
                        max: 19000,
                        maxTicksLimit: 20
                    },
                    gridLines: {
                        color: "rgba(0, 0, 0, .125)",
                    }
                }],
            },
            legend: {
                display: true
            }
        }
    });
</script>
<!-- end Air Pakai -->
</body>

</html>