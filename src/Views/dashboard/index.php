<?php

use NataInditama\Auctionx\App\Auth;

$auth = $model['auth'] ?? Auth::getSession();
?>
<div class="bg-primary pt-10 pb-21"></div>
<div class="container mt-n22">
  <div class="row">
    <div class="col-lg-12 col-md-12 col-12">
      <div>
        <div class="d-flex justify-content-between align-items-center">
          <div class="mb-2 mb-lg-0">
            <h3 class="mb-0 text-white">Dashboard</h3>
          </div>
          <div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="bg-white rounded-3 mt-4">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-12">
        <div class="p-6 d-lg-flex justify-content-between align-items-center ">
          <div class="d-md-flex align-items-center">
            <img src="./assets/images/avatar/avatar-3.jpg" alt="Image" class="rounded-circle avatar avatar-xl">
            <div class="ms-md-4 mt-3 mt-md-0 lh-1">
              <h3 class="">Welcome back <?= $model['auth']['nama_petugas'] ?? $model['auth']['nama_lengkap']; ?>!</h3>
              <span> Here is what's happening with your auctions today:</span>
            </div>
          </div>
          <div class="d-none d-lg-block">
            <a href="#!" class="btn btn-primary">What's New!</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php if ($auth['level'] != "masyarakat") : ?>
    <div class="row">
      <div class="col-xl-4 col-lg-6 col-md-12 col-12 mt-5">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-3">
              <div>
                <h4 class="mb-0">Auctions</h4>
              </div>
              <div class="icon-shape icon-md bg-light-primary text-primary rounded-2">
                <i class="bi bi-layers fs-4"></i>
              </div>
            </div>
            <div>
              <h1 class="fw-bold"><?= count($model['auctions']); ?></h1>
              <a href="" class="mb-0">View all</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-4 col-lg-6 col-md-12 col-12 mt-5">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-3">
              <div>
                <h4 class="mb-0">Users</h4>
              </div>
              <div class="icon-shape icon-md bg-light-primary text-primary rounded-2">
                <i class="bi bi-people fs-4"></i>
              </div>
            </div>
            <div>
              <h1 class="fw-bold"><?= count($model['users']); ?></h1>
              <a href="" class="mb-0">View all</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  <?php else : ?>
    <div class="row mt-6">
      <div class="col-md-12 col-12">
        <div class="card">
          <div class="card-header bg-white py-4 d-flex justify-content-between">
            <h4 class="mb-0">Active Auctions</h4>
          </div>
          <div class="table-responsive">
            <table class="table text-nowrap mb-0">
              <thead class="table-light">
                <tr>
                  <th>Product name</th>
                  <th>Hours</th>
                  <th>Status</th>
                  <th>Contributors</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="align-middle">
                    <div class="d-flex align-items-center">
                      <div class="ms-0 lh-1">
                        <h5 class="mb-1">
                          <a href="#" class="text-inherit">Dropbox Design System</a>
                        </h5>
                      </div>
                    </div>
                  </td>
                  <td class="align-middle">34</td>
                  <td class="align-middle"><span class="badge bg-warning">Medium</span></td>
                  <td class="align-middle">
                    <div class="avatar-group">
                      <span class="avatar avatar-sm">
                        <img alt="avatar" src="assets/images/avatar/avatar-1.jpg" class="rounded-circle" />
                      </span>
                      <span class="avatar avatar-sm">
                        <img alt="avatar" src="assets/images/avatar/avatar-2.jpg" class="rounded-circle" />
                      </span>
                      <span class="avatar avatar-sm">
                        <img alt="avatar" src="assets/images/avatar/avatar-3.jpg" class="rounded-circle" />
                      </span>
                      <span class="avatar avatar-sm avatar-primary">
                        <span class="avatar-initials rounded-circle fs-6">+5</span>
                      </span>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  <?php endif; ?>

</div>