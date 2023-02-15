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
  <!-- Libs JS -->
  <script defer src="./assets/libs/jquery/dist/jquery.min.js"></script>
  <script defer src="./assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script defer src="./assets/libs/jquery-slimscroll/jquery.slimscroll.min.js"></script>
  <script defer src="./assets/libs/feather-icons/dist/feather.min.js"></script>
  <script defer src="./assets/libs/prismjs/prism.js"></script>
  <script defer src="./assets/libs/apexcharts/dist/apexcharts.min.js"></script>
  <script defer src="./assets/libs/dropzone/dist/min/dropzone.min.js"></script>
  <script defer src="./assets/libs/prismjs/plugins/toolbar/prism-toolbar.min.js"></script>
  <script defer src="./assets/libs/prismjs/plugins/copy-to-clipboard/prism-copy-to-clipboard.min.js"></script>
  <script defer src="./assets/js/theme.min.js"></script>

  <title><?= SITE_NAME ?> - <?= $model['title'] ?? "Online Auctions for Arts, Antiques and Collectibles" ?> </title>
</head>

<body class="bg-light">
  <?php if (isset($model['alert'])) : ?>
    <div class="fixed-top container mt-5" style="max-width: max-content;">
      <div class="alert alert-<?= $model['alert']['type'] ?? 'warning'; ?> alert-dismissible fade show" role="alert">
        <span class="me-4">
          <?= $model['alert']['message']; ?>
        </span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    </div>
  <?php endif; ?>