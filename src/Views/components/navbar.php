<?php

use NataInditama\Auctionx\App\Auth;

$auth = $model['auth'] ?? Auth::getSession();
?>
<div class="header @@classList">
  <nav class="navbar-classic navbar navbar-expand-lg py-3 px-0">
    <div class="container">
      <?php if (Auth::getSession()) : ?>
        <button class="btn btn-ghost me-2 btn-sm" type="button" id="nav-toggle" style="line-height: 1.5;">
          <i data-feather="menu" class="nav-icon icon-xs"> </i>
        </button>
      <?php else : ?>
        <a class="navbar-brand" href="./">
          <h3 class="m-0 text-primary fw-bold"><?= SITE_NAME; ?></h3>
        </a>
        <button class="btn btn-ghost d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu" aria-controls="navMenu" aria-expanded="false" aria-label="Toggle navigation">
          <i data-feather="menu" class="nav-icon icon-xs"> </i>
        </button>
      <?php endif; ?>
      <div class="d-none d-md-none d-lg-block me-auto">
        <form class="d-flex align-items-center">
          <input type="search" class="form-control" placeholder="Search" />
        </form>
      </div>
      <?php if (isset($auth)) : ?>
        <ul class="navbar-nav navbar-right-wrap ms-auto d-flex nav-top-wrap">
          <?php if ($auth['level'] == "masyarakat") :  ?>
            <li class="me-2">
              <a href="pricing/" class="btn btn-primary">Upgrade to premium</a>
            </li>
          <?php endif;  ?>
          <li class="dropdown ms-2">
            <a class="rounded-circle" href="#" role="button" id="dropdownUser" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <div class="avatar avatar-md avatar-indicators avatar-online">
                <img alt="avatar" src="https://i.pravatar.cc/150?img=<?= rand(1, 70); ?>" class="rounded-circle" />
              </div>
            </a>
            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownUser">
              <div class="px-4 pb-0 pt-2">
                <div class="lh-1">
                  <h5 class="mb-1"><?= $auth['nama_petugas'] ?? $auth['nama_lengkap']; ?></h5>
                  <a href="./" class="text-inherit fs-6">View my dashboard</a>
                </div>
                <div class="dropdown-divider mt-3 mb-2"></div>
              </div>
              <ul class="list-unstyled">
                <li>
                  <a class="dropdown-item" href="./profile">
                    <i class="me-2 icon-xxs dropdown-item-icon" data-feather="user"></i>View Profile
                  </a>
                </li>
                <li>
                  <a class="dropdown-item" href="./logout">
                    <i class="me-2 icon-xxs dropdown-item-icon" data-feather="power"></i>Sign Out
                  </a>
                </li>
              </ul>
            </div>
          </li>
        </ul>
      <?php else : ?>
        <div class="collapse navbar-collapse" id="navMenu">
          <ul class="navbar-nav ms-auto gap-3 flex-column flex-lg-row">
            <li class="nav-item">
              <a class="nav-link text-dark" href="./">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-dark" href="./login">Login</a>
            </li>
            <li class="nav-item">
              <a href="./pricing" class="btn btn-primary">Create account</a>
            </li>
          </ul>
        </div>
      <?php endif; ?>
    </div>
  </nav>
</div>