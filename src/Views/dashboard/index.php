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
            <h1 class="text-white">Dashboard</h1>
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
              <h3 class="">Welcome back <?= $auth['nama_petugas'] ?? $auth['nama_lengkap']; ?>!</h3>
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
  <?php if ($auth['level'] == 'masyarakat') : ?>
    <div class="row">
      <div class="col-xl-4 col-lg-6 col-md-12 col-12 mt-5">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-3">
              <div>
                <h4 class="mb-0">Auction Contribution</h4>
              </div>
              <div class="icon-shape icon-md bg-light-primary text-primary rounded-2">
                <i data-feather="layers"></i>
              </div>
            </div>
            <div>
              <h1 class="fw-bold"><?= ceil($model['contribution'] ?? [])  ?>%</h1>
              <span class="mb-0"><?= count($model['auction'] ?? []) ?> Total Auction</span>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-4 col-lg-6 col-md-12 col-12 mt-5">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-3">
              <div>
                <h4 class="mb-0">Avarage Bid Price</h4>
              </div>
              <div class="icon-shape icon-md bg-light-primary text-primary rounded-2">
                <i data-feather="trending-up"></i>
              </div>
            </div>
            <div>
              <h2 class="fs-1 fw-bold">Rp <?= $model['avarage'] ?></h2>
              <span class="mb-0">Total: Rp <?= $model['total'] ?></span>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-4 col-lg-6 col-md-12 col-12 mt-5">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-3">
              <div>
                <h4 class="mb-0">Highest Bid Amount</h4>
              </div>
              <div class="icon-shape icon-md bg-light-primary text-primary rounded-2">
                <i data-feather="dollar-sign"></i>
              </div>
            </div>
            <div>
              <h2 class="fs-1 fw-bold">Rp <?= $model['highest'] ?></h2>
              <span class="mb-0">Total: Rp <?= $model['total'] ?></span>
            </div>
          </div>
        </div>
      </div>
    </div>
  <?php else : ?>
    <div class="row mt-6">
      <div class="col-xl-6 col-md-12 col-12 mb-5">
        <div class="row row-cols-lg-2 row-cols-1 g-5  ">
          <div class="col">
            <div class="card h-100 card-lift">
              <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                  <span class="fw-semi-bold ">Bounce Rate [Avg]</span>
                  <span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity text-gray-400">
                      <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline>
                    </svg></span>

                </div>
                <div class="mt-4 mb-2 ">
                  <h3 class="fw-bold mb-0">47.74%</h3>

                </div>
                <span class="text-danger "><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-down me-1 icon-xs">
                    <line x1="12" y1="5" x2="12" y2="19"></line>
                    <polyline points="19 12 12 19 5 12"></polyline>
                  </svg>-26.50%</span>
                <small>vs 66.88(prev.)</small>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card h-100 card-lift">
              <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                  <span class="fw-semi-bold ">New Sessions</span>
                  <span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-pie-chart text-gray-400">
                      <path d="M21.21 15.89A10 10 0 1 1 8 2.83"></path>
                      <path d="M22 12A10 10 0 0 0 12 2v10z"></path>
                    </svg></span>

                </div>
                <div class="mt-4 mb-2 ">
                  <h3 class="fw-bold mb-0">76.40%</h3>

                </div>
                <span class=" text-success "><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-up me-1 icon-xs">
                    <line x1="12" y1="19" x2="12" y2="5"></line>
                    <polyline points="5 12 12 5 19 12"></polyline>
                  </svg>-2.50%</span>
                <small>vs 74.60(prev.)</small>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card h-100 card-lift">
              <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                  <span class="fw-semi-bold ">Pageviews [Avg]</span>
                  <span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-send text-gray-400">
                      <line x1="22" y1="2" x2="11" y2="13"></line>
                      <polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>
                    </svg></span>

                </div>
                <div class="mt-4 mb-2 ">
                  <h3 class="fw-bold mb-0">2.15</h3>

                </div>
                <span class="text-danger "><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-down me-1 icon-xs">
                    <line x1="12" y1="5" x2="12" y2="19"></line>
                    <polyline points="19 12 12 19 5 12"></polyline>
                  </svg>-1.83%</span>
                <small>vs 2.19 (prev.)</small>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card h-100 card-lift">
              <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                  <span class="fw-semi-bold ">Time on Site [Avg]</span>
                  <span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clock text-gray-400">
                      <circle cx="12" cy="12" r="10"></circle>
                      <polyline points="12 6 12 12 16 14"></polyline>
                    </svg></span>

                </div>
                <div class="mt-4 mb-2 ">
                  <h3 class="fw-bold mb-0">2m:15s</h3>

                </div>
                <span class="text-success "><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-up me-1 icon-xs">
                    <line x1="12" y1="19" x2="12" y2="5"></line>
                    <polyline points="5 12 12 5 19 12"></polyline>
                  </svg>21.50%</span>
                <small>vs 2.19 (prev.)</small>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-6 col-md-12 col-12 mb-5">
        <div class="card h-100">
          <div class="card-body">
            <h4 class="mb-0">Auction by Status</h4>
            <div class="row row-cols-lg-3  my-8">
              <div class="col">
                <div>
                  <h4 class="mb-3">Opened</h4>
                  <div class="lh-1">
                    <h4 class="fs-2 fw-bold text-info mb-0 ">51.5%</h4>
                    <span class="text-info">201,434</span>
                  </div>

                </div>
              </div>
              <div class="col">
                <div>
                  <h4 class="mb-3">Total</h4>
                  <div class="lh-1">
                    <h4 class="fs-2 fw-bold text-success mb-0 ">34.4%</h4>
                    <span class="text-success">134,693</span>
                  </div>

                </div>
              </div>
              <div class="col">
                <div>
                  <h4 class="mb-3">Closed</h4>
                  <div class="lh-1">
                    <h4 class="fs-2 fw-bold text-danger mb-0 ">20.8%</h4>
                    <span class="text-danger">81,525</span>
                  </div>

                </div>
              </div>

            </div>
            <div class="mt-6 mb-3">
              <div class="progress" style="height: 40px;">
                <div class="progress-bar bg-info" role="progressbar" aria-label="Segment one" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                <div class="progress-bar bg-success" role="progressbar" aria-label="Segment two" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                <div class="progress-bar bg-danger" role="progressbar" aria-label="Segment three" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
            <div>
              <small><span class="mdi mdi-lightbulb-outline me-1"></span>How perfformed over the last 30
                days?</small>
            </div>
          </div>
        </div>
      </div>
    </div>
  <?php endif; ?>
</div>