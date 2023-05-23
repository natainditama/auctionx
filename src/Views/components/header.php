<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <base href="<?= SITE_BASE_URL ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $model['title'] ?? SITE_NAME ?> - <?= "Online Auctions for Automotive and Vehicles" ?> </title>
  <meta name="description" content="Explore a robust online platform for vehicle auctions built with PHP MVC architecture. Bid and buy vehicles from a wide selection, backed by a reliable and efficient PHP MVC framework.">
  <meta name="keywords" content="Online vehicle auctions, PHP MVC vehicle auctions, Online car auctions, Vehicle bidding platform, Buy vehicles online, Online auction website, PHP MVC framework auctions, Bid on vehicles, Online vehicle marketplace, MVC-based vehicle auctions">
  <meta property="og:title" content="<?= $model['title'] ?? SITE_NAME ?> - <?= "Online Auctions for Automotive and Vehicles" ?>">
  <meta property="og:type" content="website">
  <meta property="og:url" content="<?= SITE_BASE_URL ?>">
  <meta property="og:image" content="<?= SITE_BASE_URL ?>assets/icons/preview.png">
  <meta property="og:locale" content="en" />
  <meta property="og:description" content="Online vehicle auctions, PHP MVC vehicle auctions, Online car auctions, Vehicle bidding platform, Buy vehicles online, Online auction website, PHP MVC framework auctions, Bid on vehicles, Online vehicle marketplace, MVC-based vehicle auctions" />
  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:site" content="@auctionx" />
  <meta name="twitter:creator" content="@natainditama" />
  <meta name="twitter:title" content="<?= $model['title'] ?? SITE_NAME ?> - <?= "Online Auctions for Automotive and Vehicles" ?>" />
  <meta name="twitter:image" content="<?= SITE_BASE_URL ?>assets/icons/preview.png" />
  <meta name="theme-color" content="#624bff">
  <link rel="canonical" href="<?= SITE_BASE_URL ?>">
  <link rel="shortcut icon" type="image/x-icon" href="./assets/images/favicon/favicon.ico">
  <link rel="shortcut icon" href="./assets/images/favicon/favicon.ico" type="image/x-icon">
  <link rel="manifest" href="./site.webmanifest">
  <!-- Google tag (gtag.js) -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-21F94WZYRH"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'G-21F94WZYRH');
  </script>
  <!-- Libs CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.3/font/bootstrap-icons.min.css" rel="stylesheet" />
  <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.css" rel=" stylesheet" /> -->
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
      <main id="page-content" class="mb-6">
      <?php endif; ?>
      <?php require_once __DIR__ . "/../components/navbar.php"; ?>