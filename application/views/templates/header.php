<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>PDAM | <?= $title ?></title>
    <!-- Favicons -->
    <link href="<?= base_url() ?>assets/img/logo.png" rel="icon">
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="<?= base_url() ?>assets/css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <!-- select2 bootstrap5 -->
    <!-- Styles -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/select2/bootstrap.min.css" />
    <link rel="stylesheet" href="<?= base_url() ?>assets/select2/select2.min.css" />
    <link rel="stylesheet" href="<?= base_url() ?>assets/select2/select2-bootstrap-5-theme.min.css" />

    <link href="<?= base_url(); ?>assets/datatables/bootstrap5/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/datatables/bootstrap5/dataTables.bootstrap5.min.css" rel="stylesheet">
    <style>
        .font {
            font-size: 0.7rem;
        }

        .cardEffect:hover {
            transition: transform 0.5s;
            box-shadow: 2px 2px 10px rgb(0, 0, 0);
            transform: translateY(-3px) translateX(3px);
        }

        .boxKuning {
            padding: 10px 20px;
            background: linear-gradient(to right, gold, darkorange);
            color: black;
            --width: 150px;
            --height: calc(var(--width) / 5);
            width: var(--width);
            /* height: var(--height); */
            text-align: center;
            /* line-height: var(--height); */
            font-size: calc(var(--height) / 2.5);
            font-family: sans-serif;
            letter-spacing: 0.2em;
            /* border: 1px solid darkgoldenrod; */
            border-radius: 1em;
            /* margin-left: .5rem; */
            /* transform: perspective(500px) rotateY(-15deg); */
            text-shadow: 6px 3px 2px rgba(0, 0, 0, 0.2);
            box-shadow: 2px 0 0 5px rgba(0, 0, 0, 0.2);
            transition: 0.5s;
            position: relative;
            overflow: hidden;
        }

        .boxKuning:hover {
            color: white;
            transform: perspective(500px) rotateY(-15deg);
            text-shadow: -6px 3px 2px rgba(0, 0, 0, 0.2);
            box-shadow: -2px 0 0 5px rgba(0, 0, 0, 0.2);
        }

        .boxHijau {
            padding: 10px 20px;
            background: linear-gradient(to right, #32CD32, green);
            color: black;
            --width: 150px;
            --height: calc(var(--width) / 5);
            width: var(--width);
            /* height: var(--height); */
            text-align: center;
            /* line-height: var(--height); */
            font-size: calc(var(--height) / 2.5);
            font-family: sans-serif;
            letter-spacing: 0.2em;
            /* border: 1px solid darkgoldenrod; */
            border-radius: 1em;
            /* margin-left: .5rem; */
            /* transform: perspective(500px) rotateY(-15deg); */
            text-shadow: 6px 3px 2px rgba(0, 0, 0, 0.2);
            box-shadow: 2px 0 0 5px rgba(0, 0, 0, 0.2);
            transition: 0.5s;
            position: relative;
            overflow: hidden;
        }

        .boxHijau:hover {
            color: white;
            transform: perspective(500px) rotateY(-15deg);
            text-shadow: -6px 3px 2px rgba(0, 0, 0, 0.2);
            box-shadow: -2px 0 0 5px rgba(0, 0, 0, 0.2);
        }

        .boxMerah {
            padding: 10px 20px;
            background: linear-gradient(to right, red, #B22222);
            color: black;
            --width: 150px;
            --height: calc(var(--width) / 5);
            width: var(--width);
            /* height: var(--height); */
            text-align: center;
            /* line-height: var(--height); */
            font-size: calc(var(--height) / 2.5);
            font-family: sans-serif;
            letter-spacing: 0.2em;
            /* border: 1px solid darkgoldenrod; */
            border-radius: 1em;
            /* margin-left: .5rem; */
            /* transform: perspective(500px) rotateY(-15deg); */
            text-shadow: 6px 3px 2px rgba(0, 0, 0, 0.2);
            box-shadow: 2px 0 0 5px rgba(0, 0, 0, 0.2);
            transition: 0.5s;
            position: relative;
            overflow: hidden;
        }

        .boxMerah:hover {
            color: white;
            transform: perspective(500px) rotateY(-15deg);
            text-shadow: -6px 3px 2px rgba(0, 0, 0, 0.2);
            box-shadow: -2px 0 0 5px rgba(0, 0, 0, 0.2);
        }

        .boxBiru {
            padding: 10px 20px;
            background: linear-gradient(to right, #00FFFF, #00CED1);
            color: black;
            --width: 150px;
            --height: calc(var(--width) / 5);
            width: var(--width);
            /* height: var(--height); */
            text-align: center;
            /* line-height: var(--height); */
            font-size: calc(var(--height) / 2.5);
            font-family: sans-serif;
            letter-spacing: 0.2em;
            /* border: 1px solid darkgoldenrod; */
            border-radius: 1em;
            /* margin-left: .5rem; */
            /* transform: perspective(500px) rotateY(-15deg); */
            text-shadow: 6px 3px 2px rgba(0, 0, 0, 0.2);
            box-shadow: 2px 0 0 5px rgba(0, 0, 0, 0.2);
            transition: 0.5s;
            position: relative;
            overflow: hidden;
        }

        .boxBiru:hover {
            color: white;
            transform: perspective(500px) rotateY(-15deg);
            text-shadow: -6px 3px 2px rgba(0, 0, 0, 0.2);
            box-shadow: -2px 0 0 5px rgba(0, 0, 0, 0.2);
        }

        @media (max-width: 600px) {

            .boxKuning,
            .boxBiru,
            .boxHijau,
            .boxMerah {
                --width: 250px;
                margin-left: auto;
                margin-right: auto;
            }
        }

        /* kode untuk tombol 3 dimensi */
        .buttonBox {
            cursor: pointer;
            position: relative;
            padding: 0.417rem .8rem;
            /* Mengurangi ukuran padding menjadi setengahnya */
            border-radius: 0.725rem;
            /* Mengurangi ukuran border-radius menjadi setengahnya */
            line-height: 0.417rem;
            /* Mengurangi ukuran line-height menjadi setengahnya */
            font-size: 0.633rem;
            /* Mengurangi ukuran font-size menjadi setengahnya */
            font-weight: 600;
            border: 0.166px solid silver;
            /* Mengurangi ukuran border menjadi setengahnya */
            background: silver;
            /* Mengubah warna latar belakang menjadi silver */
            box-shadow: 0 0.166rem 0.208rem 0 rgba(22, 75, 195, 0.50),
                0 -0.042rem 0.25rem rgba(192, 192, 192, 1) inset,
                0 0.125rem 0.083rem rgba(255, 255, 255, 0.4) inset,
                0 0.042rem 0.083rem 0 silver inset;
        }

        .buttonBox span {
            color: #000;
            background-image: linear-gradient(0deg, silver 0%, silver 100%);
            /* Mengubah warna background-image menjadi silver */
            -webkit-background-clip: text;
            background-clip: text;
            filter: drop-shadow(0 0.334px 0.334px hsla(0, 0%, 10%, 1));
        }

        .buttonBox::before {
            content: "";
            display: block;
            height: 0.042rem;
            /* Mengurangi ukuran height menjadi setengahnya */
            position: absolute;
            top: 0.083rem;
            /* Mengurangi ukuran top menjadi setengahnya */
            left: 50%;
            transform: translateX(-50%);
            width: calc(100% - 1.25rem);
            /* Mengurangi ukuran width menjadi setengahnya */
            background: #fff;
            border-radius: 100%;
            opacity: 0.7;
            background-image: linear-gradient(-270deg, rgba(255, 255, 255, 0.00) 0%, #FFFFFF 20%, #FFFFFF 80%, rgba(255, 255, 255, 0.00) 100%);
        }

        .buttonBox::after {
            content: "";
            display: block;
            height: 0.042rem;
            position: absolute;
            bottom: 0.125rem;
            left: 50%;
            transform: translateX(-50%);
            width: calc(100% - 2.5rem);
            background: #fff;
            border-radius: 100%;
            filter: blur(0.166px);
            opacity: 0.05;
            background-image: linear-gradient(-270deg, rgba(255, 255, 255, 0.00) 0%, #FFFFFF 20%, #FFFFFF 80%, rgba(255, 255, 255, 0.00) 100%);
        }

        .buttonBox:hover {
            transition: transform 0.5s;
            box-shadow: 1px 1px 8px rgb(0, 0, 0);
            transform: translateY(-1px) translateX(1px);
        }

        /* akhir kode untuk tombol 3 dimensi */

        /* awal button neumorphic */
        .neumorphic-button {
            display: inline-block;
            font-size: 0.733rem;
            padding: 6px 12px;
            border-radius: 8px;
            background-color: #f0f0f0;
            box-shadow: 6px 6px 12px #c7c7c7, -6px -6px 12px #ffffff;
            transition: all 0.3s ease;
        }

        .neumorphic-button:hover {
            box-shadow: 4px 4px 8px #c7c7c7, -4px -4px 8px #ffffff;
        }

        .neumorphic-button:active {
            box-shadow: inset 2px 2px 4px #c7c7c7, inset -2px -2px 4px #ffffff;
        }

        .neumorphic-button:focus {
            outline: none;
        }

        .neumorphic-button .icon {
            margin-right: 8px;
        }

        .neumorphic-button .text {
            font-weight: bold;
        }

        .neumorphic-button.primary {
            background-color: #007bff;
            color: #ffffff;
            box-shadow: 6px 6px 12px #0056b3, -6px -6px 12px #00a2ff;
        }

        .neumorphic-button.primary:hover {
            box-shadow: 4px 4px 8px #0056b3, -4px -4px 8px #00a2ff;
        }

        .neumorphic-button.primary:active {
            box-shadow: inset 2px 2px 4px #0056b3, inset -2px -2px 4px #00a2ff;
        }

        .neumorphic-button.secondary {
            background-color: #6c757d;
            color: #ffffff;
            box-shadow: 6px 6px 12px #4a5258, -6px -6px 12px #8c979f;
        }

        .neumorphic-button.secondary:hover {
            box-shadow: 4px 4px 8px #4a5258, -4px -4px 8px #8c979f;
        }

        .neumorphic-button.secondary:active {
            box-shadow: inset 2px 2px 4px #4a5258, inset -2px -2px 4px #8c979f;
        }

        .neumorphic-button:hover {
            box-shadow: 1px 1px 8px rgb(0, 0, 0);
        }

        /* akhir button neumorphic */

        /* setting ukuran datatable */
        .dataTables_info {
            font-size: 0.8rem;
        }

        .dataTables_length label,
        .dataTables_filter label,
        .dataTables_paginate a,
        .dataTables_info {
            font-size: 0.8rem;
        }

        .dataTables_paginate .pagination {
            font-size: 0.8rem;
        }

        .dataTables_filter input {
            max-width: 100px;
        }

        @media (max-width: 767px) {

            .dataTables_filter,
            .dataTables_paginate a,
            .dataTables_info {
                float: right;
            }

            .dataTables_paginate .pagination {
                float: right;
            }

            .dataTables_length label {
                float: left;
            }
        }

        /* akhir setting datatable */
    </style>
</head>

<body class="sb-nav-fixed">