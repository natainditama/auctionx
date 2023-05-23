<?php

use NataInditama\Auctionx\Models\HistoryLelang;

$dateNow = new DateTime("now");
$startDate = new DateTime($model["auction"]["tgl_dibuka"]);
$dueDate = new DateTime($model["auction"]["tgl_ditutup"]);
$interval = $dateNow->diff($dueDate, false);
$price = (int) $model["auction"]["harga_awal"];
$price = number_format($price, 2, ",", ".");
$length = count($model['history']);
$maxActivity = $length > 3 ? 3 : $length;

?>

<div class="bg-white pt-8 mb-6">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-12">
        <div class="d-lg-flex align-items-center justify-content-between mb-6">
          <div class="mb-6 mb-lg-0">
            <div class="d-flex align-items-center">
              <div class="ms-0">
                <h1 class="h3 "><?= $model["auction"]["nama_barang"] ?></h1>
                <span class="fs-5"><span class="me-1"><i class="mdi mdi-account fs-5 me-1"></i><?= $model["auction"]["nama_petugas"] ?></span> |
                  <span class="mx-1">Status:
                    <?php if ($dateNow > $dueDate || $model['auction']['status'] == "ditutup") : ?>
                      <span class="ms-1 badge bg-danger">Closed</span>
                    <?php else : ?>
                      <span class="ms-1 badge bg-info">Opened</span>
                    <?php endif; ?>
                  </span>
                </span>
              </div>
            </div>
          </div>
          <div class="d-flex align-items-center ">
            <div class="avatar-group">
              <?php if (isset($model['history']) && count($model['history']) > 0) : ?>
                <?php $history = array_slice($model['history'], 0, 4); ?>
                <?php foreach ($history as $key => $row) : ?>
                  <span class="avatar avatar-md">
                    <a href="./user/<?= $row['username'] ?>">
                      <img alt="avatar" src="https://i.pravatar.cc/150?img=<?= rand(1, 70); ?>" class="rounded-circle imgtooltip" data-template="one">
                    </a>
                    <span class="d-none">
                      <small class="mb-0"><?= $row['username'] ?></small>
                    </span>
                  </span>
                <?php endforeach; ?>
                <?php
                $other = count($model['history']) > 4 ? count($model['history']) - 4 : 0;
                ?>
                <?php if ($other > 0) : ?>
                  <span class="avatar avatar-md">
                    <span class="avatar-initials rounded-circle bg-light text-dark">
                      <?= $other; ?>+
                    </span>
                  </span>
                <?php endif; ?>
              <?php endif; ?>
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
  <div class="row mb-5">
    <div class="col-md-12 col-xl-4 col-12">
      <div>
        <img class="w-100 car-thumb" data-angle="01" alt="Image" src="https://cdn.imagin.studio/getImage" style="height:218px;display: block;">
      </div>
    </div>
    <div class="col-md-12 col-xl-4 col-12">
      <div>
        <img class="w-100 car-thumb" data-angle="05" alt="Image" src="https://cdn.imagin.studio/getImage" style="height:218px;display: block;">
      </div>
    </div>
    <div class="col-md-12 col-xl-4 col-12">
      <div class="card mb-5 bg-dark">
        <div class="card-body">
          <h4 class="mb-0 text-white">Due Date</h4>
          <div class="d-flex justify-content-between align-items-center mt-8">
            <div>
              <h3 class="display-5 fw-bold text-white mb-1 countdown" data-datetime="<?= $model["auction"]["tgl_ditutup"] ?>" data-datetime-format='{"days":true,"hours":false,"minutes":false,"seconds":false,"full": false}'>0 days</h3>
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
    </div>
  </div>
  <div class="row">
    <div class="col-md-12 col-xl-8 col-12">
      <div class="row">
        <div class="col-12 mb-5">
          <div class="card">
            <div class="card-header ">
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <h4 class="mb-0">Description</h4>
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
                <?= htmlspecialchars($model["auction"]["deskripsi_barang"]) ?>
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
                        <p class="text-dark mb-0 countdown" data-datetime="<?= $model["auction"]["tgl_ditutup"] ?>" data-datetime-format='{"days":true,"hours":true,"minutes":false,"seconds":false, "full": false}'>0 days 0 hours</p>
                      </div>
                    </div>
                  </div>
                </li>
                <li class="list-group-item px-0 pb-0">
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                      <div>
                        <h5 class="mb-0 ">Budget</h5>
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
      <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
          <div>
            <h4 class="mb-0">Top contributors</h4>
          </div>
          <div><a href="./auction/<?= $model['auction']['id_barang']; ?>/contributions" class="btn btn-primary btn-sm">View All</a></div>
        </div>
        <div class="card-body py-3">
          <ul class="list-group list-group-flush ">
            <?php if ($length > 0) : ?>
              <?php for ($i = 0; $i < $maxActivity; $i++) : ?>
                <li class="list-group-item p-0 border-0 mb-3">
                  <div class="row position-relative">
                    <div class="col-auto pe-0 d-flex align-items-center">
                      <div class="avatar avatar-md">
                        <a href="./user/<?= strip_tags($model['history'][$i]['username']) ?>"><img src="https://i.pravatar.cc/150?img=<?= rand(1, 70); ?>" alt="Image" class="rounded-circle"></a>
                      </div>
                    </div>
                    <div class="col-auto">
                      <h4 class="mb-1 h5">
                        <a href="./user/<?= htmlspecialchars($model['history'][$i]['username']) ?>"><?= $model['history'][$i]['nama_lengkap']; ?></a>
                      </h4>
                      <p class="mb-0 text-muted">Rp <?= number_format((int) $model['history'][$i]['penawaran_harga'], 2, ",", "."); ?></p>
                    </div>
                  </div>
                </li>
              <?php endfor; ?>
            <?php else : ?>
              <p class="mb-0"><?= $model["auction"]["nama_barang"] ?> auctions have no contributors</p>
            <?php endif; ?>
            <?php if (isset($model['auth']['level']) && $model['auth']['level'] == 'masyarakat') :  ?>
              <hr class="mb-4">
              <li class="list-group-item p-0 border-0">
                <div class="position-relative">
                  <div class="">
                    <?php if ($dateNow > $dueDate || $model['auction']['status'] == "ditutup") : ?>
                      <p><?= $model["auction"]["nama_barang"] ?> auctions has closed</p>
                    <?php else :  ?>
                      <form method="POST" action="./auction/<?= $model['auction']['id_barang']; ?>">
                        <label class="form-label">Bid Right Now!</label>
                        <div class="d-flex">
                          <input type="hidden" name="id_lelang" value="<?= $model['auction']['id_lelang']; ?>" />
                          <input type="hidden" name="id_barang" value="<?= $model['auction']['id_barang']; ?>" />
                          <input type="hidden" name="id_user" value="<?= $model['auth']['id_user']; ?>" />
                          <input class="form-control money" name="price" type="text" min="<?= $length > 0 && $model['history'][0]['penawaran_harga'] >= $model["auction"]["harga_awal"] ? $model['history'][0]['penawaran_harga'] : $model["auction"]["harga_awal"] ?>" placeholder="Enter bid amount" required pattern="[0-9 _,]*" title="Please enter number only" value="<?= @$_POST['price']; ?>" />
                          <button type="submit" class="btn btn-icon btn-primary border border-2 rounded-circle btn-dashed ms-2">
                            +
                          </button>
                        </div>
                      </form>
                    <?php endif; ?>
                  </div>
                </div>
              </li>
            <?php endif; ?>
          </ul>
        </div>
      </div>
    </div>
  </div>

  <div id="auction-list" class="row">
    <?php if (is_array($model['products']) && count($model["products"]) > 0) : ?>
      <div class="col-12 mt-8 mb-6">
        <h2 class="text-center">Related products</h2>
      </div>
      <?php require_once __DIR__ . "/../components/auction/card.php"; ?>
    <?php endif; ?>
  </div>
</div>