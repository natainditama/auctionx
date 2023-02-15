<div id="db-wrapper" class="toggled">
  <?php require_once __DIR__ . "/../components/dashboard/sidebar.php"; ?>
  <div id="page-content">
    <?php require_once __DIR__ . "/../components/navbar.php"; ?>
    <div class="bg-primary pt-10 pb-21"></div>
    <div class="container mt-n22">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-12">
          <div>
            <div class="d-flex justify-content-between align-items-center">
              <div class="mb-2 mb-lg-0">
                <h3 class="mb-0 text-white">Auctions</h3>
              </div>
              <div>
                <a href="#" class="btn btn-white">Create New Project</a>
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
                  <h3 class="">Welcome back <?= $model['auth']['name'] ?>!</h3>
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
      <div class="row">
        <div class="col-xl-4 col-lg-6 col-md-12 col-12 mt-5">
          <div class="card">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <div>
                  <h4 class="mb-0">Projects</h4>
                </div>
                <div class="icon-shape icon-md bg-light-primary text-primary rounded-2">
                  <i class="bi bi-briefcase fs-4"></i>
                </div>
              </div>
              <div>
                <h1 class="fw-bold">18</h1>
                <p class="mb-0"><span class="text-dark me-2">2</span>Completed</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-lg-6 col-md-12 col-12 mt-5">
          <div class="card">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <div>
                  <h4 class="mb-0">Active Task</h4>
                </div>
                <div class="icon-shape icon-md bg-light-primary text-primary rounded-2">
                  <i class="bi bi-list-task fs-4"></i>
                </div>
              </div>
              <div>
                <h1 class="fw-bold">132</h1>
                <p class="mb-0"><span class="text-dark me-2">28</span>Completed</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-lg-6 col-md-12 col-12 mt-5">
          <div class="card">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <div>
                  <h4 class="mb-0">Teams</h4>
                </div>
                <div class="icon-shape icon-md bg-light-primary text-primary rounded-2">
                  <i class="bi bi-people fs-4"></i>
                </div>
              </div>
              <div>
                <h1 class="fw-bold">12</h1>
                <p class="mb-0"><span class="text-dark me-2">1</span>Completed</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row mt-6">
        <div class="col-md-12 col-12">
          <div class="card">
            <div class="card-header bg-white py-4 d-flex justify-content-between">
              <h4 class="mb-0">Active Auctions</h4>
              <a href="#" class="link-primary">View All Auctions</a>
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

      <div class="row my-6">
        <div class="col-xl-12 col-lg-12 col-md-12 col-12">
          <div class="card h-100">
            <!-- card header  -->
            <div class="card-header bg-white py-4">
              <h4 class="mb-0">Teams</h4>
            </div>
            <!-- table  -->
            <div class="table-responsive">
              <table class="table text-nowrap">
                <thead class="table-light">
                  <tr>
                    <th>Name</th>
                    <th>Role</th>
                    <th>Last Activity</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="align-middle">
                      <div class="d-flex align-items-center">
                        <div>
                          <img src="assets/images/avatar/avatar-2.jpg" alt="" class="avatar-md avatar rounded-circle" />
                        </div>
                        <div class="ms-3 lh-1">
                          <h5 class="mb-1">Anita Parmar</h5>
                          <p class="mb-0">anita@example.com</p>
                        </div>
                      </div>
                    </td>
                    <td class="align-middle">Front End Developer</td>
                    <td class="align-middle">3 May, 2021</td>
                    <td class="align-middle">
                      <div class="dropdown dropstart">
                        <a class="text-muted text-primary-hover" href="#" role="button" id="dropdownTeamOne" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="icon-xxs" data-feather="more-vertical"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownTeamOne">
                          <a class="dropdown-item" href="#">Action</a>
                          <a class="dropdown-item" href="#">Another action</a>
                          <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="align-middle">
                      <div class="d-flex align-items-center">
                        <div>
                          <img src="assets/images/avatar/avatar-1.jpg" alt="" class="avatar-md avatar rounded-circle" />
                        </div>
                        <div class="ms-3 lh-1">
                          <h5 class="mb-1">Jitu Chauhan</h5>
                          <p class="mb-0">jituchauhan@example.com</p>
                        </div>
                      </div>
                    </td>
                    <td class="align-middle">Project Director</td>
                    <td class="align-middle">Today</td>
                    <td class="align-middle">
                      <div class="dropdown dropstart">
                        <a class="text-muted text-primary-hover" href="#" role="button" id="dropdownTeamTwo" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="icon-xxs" data-feather="more-vertical"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownTeamTwo">
                          <a class="dropdown-item" href="#">Action</a>
                          <a class="dropdown-item" href="#">Another action</a>
                          <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="align-middle">
                      <div class="d-flex align-items-center">
                        <div>
                          <img src="assets/images/avatar/avatar-3.jpg" alt="" class="avatar-md avatar rounded-circle" />
                        </div>
                        <div class="ms-3 lh-1">
                          <h5 class="mb-1">Sandeep Chauhan</h5>
                          <p class="mb-0">sandeepchauhan@example.com</p>
                        </div>
                      </div>
                    </td>
                    <td class="align-middle">Full- Stack Developer</td>
                    <td class="align-middle">Yesterday</td>
                    <td class="align-middle">
                      <div class="dropdown dropstart">
                        <a class="text-muted text-primary-hover" href="#" role="button" id="dropdownTeamThree" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="icon-xxs" data-feather="more-vertical"></i>
                        </a>

                        <div class="dropdown-menu" aria-labelledby="dropdownTeamThree">
                          <a class="dropdown-item" href="#">Action</a>
                          <a class="dropdown-item" href="#">Another action</a>
                          <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="align-middle">
                      <div class="d-flex align-items-center">
                        <div>
                          <img src="assets/images/avatar/avatar-4.jpg" alt="" class="avatar-md avatar rounded-circle" />
                        </div>

                        <div class="ms-3 lh-1">
                          <h5 class="mb-1">Amanda Darnell</h5>
                          <p class="mb-0">amandadarnell@example.com</p>
                        </div>
                      </div>
                    </td>
                    <td class="align-middle">Digital Marketer</td>
                    <td class="align-middle">3 May, 2021</td>
                    <td class="align-middle">
                      <div class="dropdown dropstart">
                        <a class="text-muted text-primary-hover" href="#" role="button" id="dropdownTeamFour" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="icon-xxs" data-feather="more-vertical"></i>
                        </a>

                        <div class="dropdown-menu" aria-labelledby="dropdownTeamFour">
                          <a class="dropdown-item" href="#">Action</a>
                          <a class="dropdown-item" href="#">Another action</a>
                          <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="align-middle">
                      <div class="d-flex align-items-center">
                        <div>
                          <img src="assets/images/avatar/avatar-5.jpg" alt="" class="avatar-md avatar rounded-circle" />
                        </div>

                        <div class="ms-3 lh-1">
                          <h5 class="mb-1">Patricia Murrill</h5>
                          <p class="mb-0">patriciamurrill@example.com</p>
                        </div>
                      </div>
                    </td>
                    <td class="align-middle">Account Manager</td>
                    <td class="align-middle">3 May, 2021</td>
                    <td class="align-middle">
                      <div class="dropdown dropstart">
                        <a class="text-muted text-primary-hover" href="#" role="button" id="dropdownTeamFive" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="icon-xxs" data-feather="more-vertical"></i>
                        </a>

                        <div class="dropdown-menu" aria-labelledby="dropdownTeamFive">
                          <a class="dropdown-item" href="#">Action</a>
                          <a class="dropdown-item" href="#">Another action</a>
                          <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="align-middle border-bottom-0">
                      <div class="d-flex align-items-center">
                        <div>
                          <img src="assets/images/avatar/avatar-6.jpg" alt="" class="avatar-md avatar rounded-circle" />
                        </div>
                        <div class="ms-3 lh-1">
                          <h5 class="mb-1">Darshini Nair</h5>
                          <p class="mb-0">darshininair@example.com</p>
                        </div>
                      </div>
                    </td>
                    <td class="align-middle border-bottom-0">Front End Developer</td>
                    <td class="align-middle border-bottom-0">3 May, 2021</td>
                    <td class="align-middle border-bottom-0">
                      <div class="dropdown dropstart">
                        <a class="text-muted text-primary-hover" href="#" role="button" id="dropdownTeamSix" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="icon-xxs" data-feather="more-vertical"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownTeamSix">
                          <a class="dropdown-item" href="#">Action</a>
                          <a class="dropdown-item" href="#">Another action</a>
                          <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>