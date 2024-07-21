<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Nunito|Poppins" rel="stylesheet">
    <!-- Vendor CSS Files -->
    <link href="<?php echo base_url(); ?>assets2/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets2/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets2/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets2/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets2/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets2/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets2/vendor/simple-datatables/style.css" rel="stylesheet">
    <!-- Template Main CSS File -->
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
    body {
        font-family: 'Poppins', sans-serif;
        background-color: #f4f6f9;
    }

    .header-section {
        width: 3000px;

        background-color: white;
        color: #3DC2EC;
        padding: 30px;
        padding-left: 250px;
        margin-left: -1000px;
        display: flex;
        align-items: center;
    }

    .header-section img {
        width: 100px;
    }

    .header-section div {
        margin-left: 20px;
    }

    .card {
        margin-bottom: 20px;
    }

    .card-body {
        padding: 20px;
    }

    .data-section .card:nth-child(1) {
        background-color: #36BA98;
    }

    .data-section .card:nth-child(2) {
        background-color: #4C3BCF;
    }

    .data-section .card:nth-child(3) {
        background-color: #99ff99;
    }

    .table-responsive {
        margin-top: 20px;
    }

    .table th,
    .table td {
        white-space: nowrap;
    }
    </style> 
  
</head>
<!--
`body` tag options:

  Apply one or more of the following classes to to the body tag
  to get the desired effect

  * sidebar-collapse
  * sidebar-mini
-->
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  
