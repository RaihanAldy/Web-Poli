<?php
require_once "_config/config.php";
require "_assets/libs/vendor/autoload.php";

// Cek jika user belum login
if (!isset($_SESSION['user'])) {
    echo "<script>window.location='".base_url('auth/login.php')."';</script>";
    exit;
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <link rel="icon" href="<?= base_url('_assets/medical.png') ?>">
        <title>Medical Center</title>

        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        <!-- Stylesheets -->
        <link rel="stylesheet" href="../_assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="../_assets/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="../_assets/css/fontAwesome.css">
        <link rel="stylesheet" href="../_assets/css/light-box.css">
        <link rel="stylesheet" href="../_assets/css/templatemo-main.css">

        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">

        <script src="../_assets/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
        
    </head>

    <body style="background: url('<?= base_url('_assets/images/fourth_bg.jpg') ?>') no-repeat center center fixed; 
    background-size: cover;">
        <!-- Sidebar -->
        <nav class="sidebar" id="sidebar">
          <ul>
            <li><a href="../dashboard/"><i class="fa fa-home"></i> <em>Home</em></a></li>
            <li><a href="../pasien/data.php"><i class="fa fa-user"></i> <em>Data Pasien</em></a></li>
            <li><a href="<?= base_url('dokter/data.php') ?>"><i class="fa fa-pencil"></i> <em>Data Dokter</em></a></li>
            <li><a href="<?= base_url('poliklinik/data.php') ?>"><i class="fa fa-image"></i> <em>Data Poliklinik</em></a></li>
            <li><a href="<?= base_url('obat/data.php') ?>"><i class="fa fa-cog"></i> <em>Data Obat</em></a></li>
            <li><a href="<?= base_url('auth/logout.php') ?>"><i class="fa fa-sign-out"></i> <em>Logout</em></a></li>
         </ul> 
        </nav>
 