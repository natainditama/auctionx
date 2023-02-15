<div class="header @@classList">
  <nav class="navbar-classic navbar navbar-expand-lg py-4 px-0">
    <div class="container">
      <?php if ($model['showSidebar'] ?? false) : ?>
        <a id="nav-toggle" href="#"><i data-feather="menu" class="nav-icon me-2 icon-xs"></i></a>
      <?php else : ?>
        <a class="navbar-brand" href="./">
          <h3 class="m-0 text-primary fw-bold"><?= SITE_NAME; ?></h3>
        </a>
      <?php endif; ?>
      <div class="ms-lg-3 d-none d-md-none d-lg-block me-auto">
        <form class="d-flex align-items-center">
          <input type="search" class="form-control" placeholder="Search" />
        </form>
      </div>
      <?php if (isset($model['auth'])) : ?>
        <ul class="navbar-nav navbar-right-wrap ms-auto d-flex nav-top-wrap">
          <?php if (isset($model['auth']['level']) && $model['auth']['level'] == "masyarakat") :  ?>
            <li class="me-2">
              <a href="admin/register" class="btn btn-primary">Upgrade to premium</a>
            </li>
          <?php endif;  ?>
          <li class="dropdown ms-2">
            <a class="rounded-circle" href="#" role="button" id="dropdownUser" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <div class="avatar avatar-md avatar-indicators avatar-online">
                <img alt="avatar" src="./assets/images/avatar/avatar-1.jpg" class="rounded-circle" />
              </div>
            </a>
            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownUser">
              <div class="px-4 pb-0 pt-2">
                <div class="lh-1">
                  <h5 class="mb-1"><?= $model['auth']['name'] ?? "Unknown"; ?></h5>
                  <a href="./dashboard" class="text-inherit fs-6">View my dashboard</a>
                </div>
                <div class="dropdown-divider mt-3 mb-2"></div>
              </div>
              <ul class="list-unstyled">
                <li>
                  <a class="dropdown-item" href="#">
                    <i class="me-2 icon-xxs dropdown-item-icon" data-feather="user"></i>Edit Profile
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
        <div class="d-none d-lg-flex align-items-center gap-2">
          <a href="./login" class="btn btn-link">Login</a>
          <a href="./register" class="btn btn-primary">Sign up</a>
        </div>
      <?php endif; ?>
    </div>
  </nav>
</div>