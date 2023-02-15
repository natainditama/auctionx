<nav class="navbar-vertical navbar">
  <div class="nav-scroller">
    <a class="navbar-brand" href="./">
      <h3 class="text-white fw-bold mb-0 mt-3"><?= SITE_NAME ?></h3>
    </a>
    <ul class="navbar-nav flex-column" id="sideNavbar">
      <li class="nav-item">
        <a class="nav-link has-arrow" href="./dashboard">
          <i data-feather="home" class="nav-icon icon-xs me-2"></i> Dashboard
        </a>
      </li>
      <li class="nav-item">
        <div class="navbar-heading">Documentation</div>
      </li>
      <li class="nav-item">
        <a class="nav-link has-arrow" href="./dashboard/product">
          <i data-feather="clipboard" class="nav-icon icon-xs me-2"> </i> Products
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link has-arrow" href="./docs/changelog.html">
          <i data-feather="git-pull-request" class="nav-icon icon-xs me-2"> </i> Auctions
        </a>
      </li>
      <li class="nav-item">
        <div class="navbar-heading">Products</div>
      </li>
      <li class="nav-item">
        <a class="nav-link has-arrow collapsed" href="#!" data-bs-toggle="collapse" data-bs-target="#navPages" aria-expanded="false" aria-controls="navPages">
          <i data-feather="layers" class="nav-icon icon-xs me-2"> </i> Product
        </a>
        <div id="navPages" class="collapse" data-bs-parent="#sideNavbar">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link" href="./pages/profile.html"> Profile </a>
            </li>
            <li class="nav-item">
              <a class="nav-link has-arrow" href="./pages/settings.html"> Settings </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="./pages/billing.html"> Billing </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="./pages/pricing.html"> Pricing </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./pages/404-error.html"> 404 Error </a>
            </li>
          </ul>
        </div>
      </li>
    </ul>
  </div>
</nav>