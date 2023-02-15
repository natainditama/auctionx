<?php require_once __DIR__ . "/../components/navbar.php"; ?>
<?php
$timeZone = new DateTimeZone("Asia/Makassar");
$dateNow = new DateTime("now", $timeZone);
$startDate = new DateTime($model["auction"]["tgl_dibuka"], $timeZone);
$dueDate = new DateTime($model["auction"]["tgl_ditutup"], $timeZone);
$interval = $dateNow->diff($dueDate, true);
$price = (int) $model["auction"]["harga_awal"]; // price in dollar us
$price = number_format($price, 2, ",", ".");
?>

<div class="bg-white pt-8 mb-6">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-12">
        <!-- Page header -->
        <div class="d-lg-flex
                align-items-center justify-content-between mb-6">
          <div class="mb-6 mb-lg-0">
            <div class="d-flex align-items-center">
              <!-- <img src="./assets/images/brand/logo/brand-logo.png" alt="Image" class="icon-shape icon-md"> -->
              <div class="ms-0">
                <h1 class="h3 "><?= $model["auction"]["nama_barang"] ?></h1>
                <span>
                  <span class="fs-5"><span class="me-1"><i class="mdi mdi-account fs-5 me-1"></i><?= $model["auction"]["nama_petugas"] ?></span> |
                    <span class="mx-1">Status:
                      <?php if ($model['auction']['status'] == "dibuka") : ?>
                        <span class="ms-1 badge bg-info">Opened</span>
                      <?php elseif ($model['auction']['status'] == "ditutup") : ?>
                        <span class="ms-1 badge bg-danger">Closed</span>
                      <?php endif; ?>
                    </span>
                  </span>
              </div>
            </div>
          </div>
          <div class="d-flex align-items-center ">
            <div class="avatar-group">
              <span class="avatar avatar-md">
                <img alt="avatar" src="./assets/images/avatar/avatar-11.jpg" class="rounded-circle imgtooltip" data-template="one">
                <span id="one" class="d-none">
                  <small class="mb-0 ">Paul Haney</small>
                </span>
              </span>
              <span class="avatar avatar-md">
                <img alt="avatar" src="./assets/images/avatar/avatar-2.jpg" class="rounded-circle imgtooltip" data-template="two">
                <span id="two" class="d-none">
                  <small class="mb-0 ">Gali Linear</small>
                </span>
              </span>
              <span class="avatar avatar-md">
                <img alt="avatar" src="./assets/images/avatar/avatar-3.jpg" class="rounded-circle imgtooltip" data-template="three">
                <span id="three" class="d-none">
                  <small class="mb-0 ">Mary Holler</small>
                </span>
              </span>
              <span class="avatar avatar-md">
                <img alt="avatar" src="./assets/images/avatar/avatar-4.jpg" class="rounded-circle imgtooltip" data-template="four">
                <span id="four" class="d-none">
                  <small class="mb-0 ">Lio Nordal</small>
                </span>
              </span>
              <span class="avatar avatar-md">
                <span class="avatar-initials rounded-circle bg-light text-dark">5+</span>
              </span>
            </div>
          </div>
        </div>
        <div class="col-12">
          <ul class="nav nav-lb-tab">
            <li class="nav-item ms-0 mr-4">
              <a class="nav-link active" href="./auction/<?= $model['auction']['id_barang']; ?>">Overview</a>
            </li>
            <li class="nav-item ms-0 me-4">
              <a class="nav-link" href="./auction/<?= $model['auction']['id_barang']; ?>/contributions">Contributions</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col-md-12 col-xl-8 col-12">
      <div class="row">
        <div class="col-12 mb-5">
          <div class="card">
            <div class="card-header ">
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <h4 class="mb-0">Summary</h4>
                </div>
                <div>
                  <span class="dropdown dropstart">
                    <a class="btn-icon btn btn-ghost btn-sm rounded-circle invisible"></a>
                  </span>
                </div>
              </div>
            </div>
            <div class="card-body">
              <p class="lh-lg">
                <?= $model["auction"]["deskripsi_barang"] ?>
              </p>
              <ul class="list-group list-group-flush mt-4">
                <li class="list-group-item px-0">
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                      <div>
                        <h5 class="mb-0 ">Start Date</h5>
                      </div>
                    </div>
                    <div>
                      <div>
                        <p class="text-dark mb-0"><?= $startDate->format("d F Y") ?></p>
                      </div>
                    </div>
                  </div>
                </li>
                <li class="list-group-item px-0">
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                      <div>
                        <h5 class="mb-0 ">Due Date</h5>
                      </div>
                    </div>
                    <div>
                      <div>
                        <p class="text-dark mb-0"><?= $dueDate->format("d F Y"); ?></p>
                      </div>
                    </div>
                  </div>
                </li>
                <li class="list-group-item  px-0">
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                      <div>
                        <h5 class="mb-0 ">Estimate Time</h5>
                      </div>
                    </div>
                    <div>
                      <div>
                        <p class="text-dark mb-0"><?= $interval->format('%m months %d days'); ?></p>
                      </div>
                    </div>
                  </div>
                </li>
                <li class="list-group-item px-0 pb-0">
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                      <div>
                        <h5 class="mb-0 ">Cost</h5>
                      </div>
                    </div>
                    <div>
                      <div>
                        <p class="text-dark mb-0">Rp <?= $price ?></p>
                      </div>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>

    </div>
    <div class="col-md-12 col-xl-4 col-12">
      <div class="card mb-5 bg-dark">
        <div class="card-body">
          <h4 class="mb-0 text-white">Due Date</h4>
          <div class="d-flex justify-content-between align-items-center mt-8">
            <div>
              <h3 class="display-5 fw-bold text-white mb-1"><?= $interval->format('%d'); ?> Days</h3>
              <p class="mb-0 text-white"><?= $dueDate->format("d F, l"); ?></p>
            </div>
            <div>
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-flag text-white icon-lg">
                <path d="M4 15s1-1 4-1 5 2 8 2 4-1 4-1V3s-1 1-4 1-5-2-8-2-4 1-4 1z"></path>
                <line x1="4" y1="22" x2="4" y2="15"></line>
              </svg>
            </div>
          </div>
        </div>
      </div>

      <?php if (isset($model['auth']['level']) && $model['auth']['level'] == 'masyarakat') :  ?>
        <div class="card">
          <div class="card-header d-flex justify-content-between align-items-center">
            <div>
              <h4 class="mb-0">Recent Activity</h4>
            </div>
            <div><a href="./auction/<?= $model['auction']['id_barang']; ?>/contributions" class="btn btn-primary btn-sm">View All</a></div>
          </div>
          <div class="card-body py-3">
            <ul class="list-group list-group-flush ">
              <?php for ($i = 0; $i < 3; $i++) : ?>
                <li class="list-group-item p-0 border-0 mb-3">
                  <div class="row position-relative">
                    <div class="col-auto pe-0 d-flex align-items-center">
                      <div class="avatar avatar-md">
                        <a href="#"><img src="./assets/images/avatar/avatar-<?= $i + 1; ?>.jpg" alt="Image" class="rounded-circle"></a>
                      </div>
                    </div>
                    <div class="col-auto">
                      <h4 class="mb-1 h5">
                        <a href="#"><?= $model['history'][$i]['nama_lengkap']; ?></a>
                      </h4>
                      <p class="mb-0 text-muted">Rp <?= number_format((int) $model['history'][$i]['penawaran_harga'], 2, ",", "."); ?></p>
                    </div>
                  </div>
                </li>
              <?php endfor; ?>
              <hr class="mb-4">
              <li class="list-group-item p-0 border-0">
                <div class="position-relative">
                  <div class="">
                    <?php if ($interval->invert) : ?>
                      <p>Auction <?= $model["auction"]["nama_barang"] ?> has closed</p>
                    <?php else :  ?>
                      <form method="POST" action="./auction/<?= $model['auction']['id_barang']; ?>">
                        <label class="form-label">Price quotation <span class="text-danger">*</span></label>
                        <div class="d-flex">
                          <input type="hidden" name="id_lelang" value="<?= $model['auction']['id_lelang']; ?>">
                          <input type="hidden" name="id_barang" value="<?= $model['auction']['id_barang']; ?>">
                          <input type="hidden" name="id_user" value="<?= $model['auth']['id']; ?>">
                          <input class="form-control" name="price" type="number" min="<?= $model["auction"]["harga_awal"]; ?>" placeholder="Enter price quotation" required>
                          <button type="submit" class="btn btn-icon btn-primary border border-2 rounded-circle btn-dashed ms-2">
                            +
                          </button>
                        </div>
                      </form>
                    <?php endif; ?>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </div>
      <?php endif; ?>
    </div>
  </div>
</div>