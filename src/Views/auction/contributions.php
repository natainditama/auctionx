<?php

use NataInditama\Auctionx\Models\HistoryLelang;

$dateNow = new DateTime();
$dueDate = new DateTime($model["auction"]["tgl_ditutup"]);
$interval = $dateNow->diff($dueDate);
$length = count($model['history']);
$maxActivity = $length > 3 ? 3 : $length;

?>

<div class="">
  <div class="bg-white pt-8 mb-6">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-12">
          <div class="d-lg-flex align-items-center justify-content-between mb-6">
            <div class="mb-6 mb-lg-0">
              <div class="d-flex align-items-center">
                <div class="ms-0">
                  <h1 class="h3"><?= $model["auction"]["nama_barang"] ?></h1>
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
                <?php if (isset($model['history']) && count($model['history']) > 0) : ?>
                  <?php $history = array_slice($model['history'], 0, 4); ?>
                  <?php foreach ($history as $key => $row) : ?>
                    <span class="avatar avatar-md">
                      <img alt="avatar" src="https://i.pravatar.cc/150?img=<?= rand(1, 70); ?>" class="rounded-circle imgtooltip" data-template="one">
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
                <a class="nav-link" href="./auction/<?= $model['auction']['id_barang']; ?>">Overview</a>
              </li>
              <li class="nav-item ms-0 me-4">
                <a class="nav-link active" href="./auction/<?= $model['auction']['id_barang']; ?>/contributions">Contributions</a>
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
          <div class="col-md-12 mb-5">
            <div class="card">
              <div class="card-header py-3">
                <div class="d-flex justify-content-between align-items-center">
                  <h4 class="mb-0">Contributions</h4>
                </div>
              </div>
              <div class="card-body p-0">
                <div class="table-responsive overflow-y-hidden table-card">
                  <table class="table mb-0 text-nowrap table-centered align-middle">
                    <thead class="table-light">
                      <tr>
                        <th scope="col">
                          <span>#</span>
                          <span class="ms-5">Username</span>
                        </th>
                        <th scope="col">Price</th>
                      </tr>
                    </thead>
                    <tbody class="">
                      <?php if ($length > 0) : ?>
                        <?php $i = 1; ?>
                        <?php foreach ($model['history'] as $history) : ?>
                          <tr>
                            <td scope="row" class="d-flex align-items-center">
                              <span class="me-5 pe-2"> <?= $i++; ?></span>
                              <div class="d-flex align-items-center">
                                <div class="avatar avatar-md">
                                  <a href="./user/<?= $history['username'] ?>"> <img src="https://i.pravatar.cc/150?img=<?= rand(1, 70); ?>" alt="Image" class="rounded-circle"> </a>
                                </div>
                                <div class="ms-3">
                                  <h5 class="mb-0"><a href="./user/<?= $history['username'] ?>" class="text-inherit"><?= $history['nama_lengkap'] ?></a> </h5>
                                </div>
                              </div>
                            </td>
                            <td>
                              <span>Rp <?= number_format((int) $history['penawaran_harga'], 2, ".", ","); ?></span>
                            </td>
                          </tr>
                        <?php endforeach; ?>
                      <?php else : ?>
                        <tr>
                          <td colspan="2">
                            <p class="text-center my-3"><?= $model["auction"]["nama_barang"] ?> auctions have no contributors</p>
                          </td>
                        </tr>
                      <?php endif; ?>
                    </tbody>
                  </table>
                </div>
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
                <h3 class="display-5 fw-bold text-white mb-1"><?= str_contains($interval->format('%r%a Days'), "-") ? "0 Days" : $interval->format('%r%a Days'); ?></h3>
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
                          <a href="./user/<?= $model['history'][$i]['username'] ?>"><img src="https://i.pravatar.cc/150?img=<?= rand(1, 70); ?>" alt="Image" class="rounded-circle"></a>
                        </div>
                      </div>
                      <div class="col-auto">
                        <h4 class="mb-1 h5">
                          <a href="./user/<?= $model['history'][$i]['username'] ?>"><?= $model['history'][$i]['nama_lengkap']; ?></a>
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
                            <input class="form-control money" name="price" type="text" min="<?= $length > 0 && $model['history'][0]['penawaran_harga'] >= $model["auction"]["harga_awal"] ? $model['history'][0]['penawaran_harga'] : $model["auction"]["harga_awal"]; ?>" placeholder="Enter bid amount" required pattern="[0-9 _,]*" title="Please enter number only" value="<?= @$_POST['price']; ?>" />
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
      <?php if (is_array($model['products'])) : ?>
        <div class="col-12 mt-8 mb-6">
          <h2 class="text-center">Related products</h2>
        </div>
        <?php require_once __DIR__ . "/../components/auction/card.php"; ?>
      <?php endif; ?>
    </div>
  </div>
</div>