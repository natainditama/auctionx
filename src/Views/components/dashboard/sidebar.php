<?php

use NataInditama\Auctionx\App\Auth;

$auth = $model['auth'] ?? Auth::getSession();
?>
<nav class="navbar-vertical navbar">
  <div class="nav-scroller">
    <a class="navbar-brand" href="./">
      <h3 class="text-white fw-bold mb-0 mt-3"><?= SITE_NAME ?></h3>
    </a>
    <ul class="navbar-nav flex-column" id="sideNavbar">
      <li class="nav-item">
        <a class="nav-link has-arrow" href="./">
          <i data-feather="home" class="nav-icon icon-xs me-2"></i> Dashboard
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link has-arrow" href="./auction">
          <i data-feather="layers" class="nav-icon icon-xs me-2"> </i> Auctions
        </a>
      </li>
      <?php if ($auth['level'] == "masyarakat") :  ?>
        <li class="nav-item">
          <a class="nav-link has-arrow" href="./bidding">
            <i data-feather="dollar-sign" class="nav-icon icon-xs me-2"> </i> Bidding history
          </a>
        </li>
      <?php elseif ($auth['level'] == "petugas") :  ?>
        <li class="nav-item">
          <a class="nav-link has-arrow" href="./user">
            <i data-feather="dollar-sign" class="nav-icon icon-xs me-2"> </i> Bidders
          </a>
        </li>
      <?php endif; ?>
      <li class="nav-item">
        <div class="navbar-heading">Profile</div>
      </li>
      <li class="nav-item">
        <a class="nav-link has-arrow" href="./profile">
          <i data-feather="user" class="nav-icon icon-xs me-2"> </i> View Profile
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link has-arrow" href="./logout">
          <i data-feather="log-out" class="nav-icon icon-xs me-2"> </i> Sign out
        </a>
      </li>
    </ul>
  </div>
</nav>