<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <base href="<?= SITE_BASE_URL ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" type="image/x-icon" href="./assets/images/favicon/favicon.ico">
  <!-- Libs CSS -->
  <link href="./assets/libs/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet" />
  <link href="./assets/libs/dropzone/dist/dropzone.css" rel="stylesheet" />
  <link href="./assets/libs/@mdi/font/css/materialdesignicons.min.css" rel="stylesheet" />
  <link href="./assets/libs/prismjs/themes/prism-okaidia.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="./assets/css/theme.min.css">
  <link rel="stylesheet" href="./assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css">
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
  </style>
  <!-- Libs JS -->
  <script defer src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
  <script defer src="./assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script defer src="./assets/libs/jquery-slimscroll/jquery.slimscroll.min.js"></script>
  <script defer src="./assets/libs/feather-icons/dist/feather.min.js"></script>
  <script defer src="./assets/libs/prismjs/prism.js"></script>
  <script defer src="./assets/libs/apexcharts/dist/apexcharts.min.js"></script>
  <script defer src="./assets/libs/dropzone/dist/min/dropzone.min.js"></script>
  <script defer src="./assets/libs/prismjs/plugins/toolbar/prism-toolbar.min.js"></script>
  <script defer src="./assets/libs/prismjs/plugins/copy-to-clipboard/prism-copy-to-clipboard.min.js"></script>
  <script defer src="./assets/libs/datatables/media/js/jquery.dataTables.min.js"></script>
  <script defer src="./assets/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
  <script defer src="./assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
  <script defer src="https://dashui.codescandy.com/dashuipro/assets/js/vendors/datatable.js"></script>
  <script defer src="./assets/js/theme.min.js"></script>

  <title><?= SITE_NAME ?> - <?= $model['title'] ?? "Online Auctions for Arts, Antiques and Collectibles" ?> </title>

</head>

<body class="bg-light min-vh-100 d-flex flex-column" style="height: 100%;">
  <?php if ($model['showSidebar'] ?? false) : ?>
    <div id="db-wrapper" class="toggled">
      <?php require_once __DIR__ . "/../components/dashboard/sidebar.php"; ?>
      <div id="page-content">
  <?php endif; ?>
  <?php require_once __DIR__ . "/../components/navbar.php"; ?>