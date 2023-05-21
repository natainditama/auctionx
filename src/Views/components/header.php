<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <base href="<?= SITE_BASE_URL ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" type="image/x-icon" href="./assets/images/favicon/favicon.ico">
  <!-- Libs CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.3/font/bootstrap-icons.min.css" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.css" rel=" stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/7.2.96/css/materialdesignicons.min.css" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/themes/prism-okaidia.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="./assets/css/theme.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables.net-bs5/1.13.4/dataTables.bootstrap5.min.css">
  <style>
    .dataTables_paginate,
    .dataTables_info,
    .dataTables_length,
    .dataTables_filter {
      padding: 1rem 1.5rem !important;
    }

    .dataTables_wrapper .row {
      align-items: center;
    }

    .thumbnail {
      width: 100%;
      position: relative;
      height: max-content;
    }

    .hover-scale-up:hover {
      transform: scale(1.05);
    }

    .hover-scale-up {
      transition: all 0.5s cubic-bezier(0.87, 0, 0.13, 1);
    }

    .btn-wish {
      --size: 3rem;
      --gap: 1rem;
      position: absolute;
      bottom: var(--gap);
      right: var(--gap);
      height: var(--size);
      width: var(--size);
      border-radius: 999px;
      z-index: 10;
      display: flex;
      align-items: center;
      justify-content: center;
      background-color: white;
    }

    .ftco-footer-social li {
      list-style: none;
      margin: 0 10px 0 0;
      display: inline-block;
    }

    .ftco-footer-social li a {
      height: 40px;
      width: 40px;
      display: block;
      background: rgba(0, 0, 0, 0.05);
      border-radius: 50%;
      display: flex;
      justify-content: center;
      align-items: center;
      position: relative;
    }
  </style>

  <title><?= $model['title'] ?? SITE_NAME ?> - <?= "Online Auctions for Automotive and Vehicles" ?> </title>
  <meta name="description" content="Auction is online car auctions featuring used, wholesale and repairable vehicles. Auction car auctions have something for everyone — used car buyers, dismantlers, dealers, body shops and individuals">

</head>

<body class="bg-light min-vh-100 d-flex flex-column" style="height: 100%;">
  <?php

  use NataInditama\Auctionx\App\Auth;
  use NataInditama\Auctionx\App\Flasher;

  Flasher::flasher();
  ?>
  <?php if (Auth::getSession()) : ?>
    <div id="db-wrapper">
      <?php require_once __DIR__ . "/../components/dashboard/sidebar.php"; ?>
      <div id="page-content" class="mb-6">
      <?php endif; ?>
      <?php require_once __DIR__ . "/../components/navbar.php"; ?>