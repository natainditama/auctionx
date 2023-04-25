<?php
$dateNow = new DateTime("now");
$startDate = new DateTime($model["auction"]["tgl_dibuka"]);
$dueDate = new DateTime($model["auction"]["tgl_ditutup"]);
$interval = $dateNow->diff($dueDate, false);
$price = (int) $model["auction"]["harga_awal"];
$price = number_format($price, 2, ",", ".");
$length = count($model['history']);
$maxActivity = $length > 3 ? 3 : $length;

$req = file_get_contents('http://localhost/web_027_nata_p4/public/data/images.json');
$json = (array) json_decode($req);
$makeIndex = rand(0, count($json) - 1);
$modelIndex = rand(0, count($json[$makeIndex]->model) - 1);
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
                <span>
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
              <span class="avatar avatar-md">
                <img alt="avatar" src="https://i.pravatar.cc/150?img=<?= rand(1, 70); ?>" class="rounded-circle imgtooltip" data-template="one">
                <span id="one" class="d-none">
                  <small class="mb-0 ">Paul Haney</small>
                </span>
              </span>
              <span class="avatar avatar-md">
                <img alt="avatar" src="https://i.pravatar.cc/150?img=<?= rand(1, 70); ?>" class="rounded-circle imgtooltip" data-template="two">
                <span id="two" class="d-none">
                  <small class="mb-0 ">Gali Linear</small>
                </span>
              </span>
              <span class="avatar avatar-md">
                <img alt="avatar" src="https://i.pravatar.cc/150?img=<?= rand(1, 70); ?>" class="rounded-circle imgtooltip" data-template="three">
                <span id="three" class="d-none">
                  <small class="mb-0 ">Mary Holler</small>
                </span>
              </span>
              <span class="avatar avatar-md">
                <img alt="avatar" src="https://i.pravatar.cc/150?img=<?= rand(1, 70); ?>" class="rounded-circle imgtooltip" data-template="four">
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
  <div class="row mb-5">
    <div class="col-md-12 col-xl-4 col-12">
      <div>
        <img class="w-100" src="https://cdn.imagin.studio/getImage?angle=01&billingTag=web&customer=carwow&make=<?= $json[$makeIndex]->make ?>&modelFamily=<?= $json[$makeIndex]->model[$modelIndex]; ?>&tailoring=carwow&width=1200&zoomLevel=0&zoomType=fullscreen" alt="Image" style="height:218px;display: block;">
      </div>
    </div>
    <div class="col-md-12 col-xl-4 col-12">
      <div>
        <img class="w-100" src="https://cdn.imagin.studio/getImage?angle=05&billingTag=web&customer=carwow&make=<?= $json[$makeIndex]->make ?>&modelFamily=<?= $json[$makeIndex]->model[$modelIndex]; ?>&tailoring=carwow&width=800&zoomLevel=0&zoomType=fullscreen" alt="Image" style="height:218px;display: block;">
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
                        <p class="text-dark mb-0"><?= str_contains($interval->format('%r%a days %r%h hours'), "-") ? "0 days 0 hours" : $interval->format('%r%a days %r%h hours'); ?></p>
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
                          <input class="form-control rupiah" name="price" type="number" min="<?= $length > 0 && $model['history'][0]['penawaran_harga'] >= $model["auction"]["harga_awal"] ? $model['history'][0]['penawaran_harga'] : $model["auction"]["harga_awal"] ?>" placeholder="Enter bid amount" required />
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
        <h2 class="text-center">Similar products</h2>
      </div>
      <?php foreach ($model['products'] as $key => $row) : ?>
        <?php
        $dueDate = new DateTime($row["tgl_ditutup"]);
        $makeIndex = rand(0, count($json) - 1);
        $modelIndex = rand(0, count($json[$makeIndex]->model) - 1);
        ?>
        <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-6 col-sm-12 mb-5">
          <div class="card h-100">
            <div class="card-body">
              <div class="">
                <div class="">
                  <div class="ms-0 mb-3">
                    <div class="thumbnail hover-scale-up">
                      <a href="./auction/<?= $row['id_barang']; ?>" style="height: 188px;display: block;">
                        <img src="https://cdn.imagin.studio/getImage?angle=01&billingTag=web&customer=carwow&make=<?= $json[$makeIndex]->make ?>&modelFamily=<?= $json[$makeIndex]->model[$modelIndex] ?>&modelVariant=hatchback&modelYear=2023&paintId=pspc0323&tailoring=carwow&width=1200&zoomLevel=0&zoomType=fullscreen" style="width: 100%;" alt="Image">
                      </a>
                    </div>
                    <h4 class="card-title mt-3 mb-1">
                      <a href="./auction/<?= $row['id_barang']; ?>" class="text-inherit"><?= $row['nama_barang']; ?></a>
                    </h4>
                    <p class="card-subtitle mt-0 text-muted">Rp <?= number_format((int) $row["harga_awal"], 2, ",", ".") ?></h6>
                  </div>
                </div>
              </div>
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <a href="./auction/<?= $row['id_barang']; ?>" class="btn btn-primary text-uppercase">Place A Bid</a>
                </div>
                <div class="d-flex align-items-center">
                  <div class="avatar-group">
                    <span class="avatar avatar-sm">
                      <img alt="avatar" src="https://i.pravatar.cc/150?img=<?= rand(1, 70); ?>" class="rounded-circle imgtooltip" data-template="eleven">
                      <span id="eleven" class="d-none">
                        <span>Charlie Holland</span>
                      </span>
                    </span>
                    <span class="avatar avatar-sm">
                      <img alt="avatar" src="https://i.pravatar.cc/150?img=<?= rand(1, 70); ?>" class="rounded-circle imgtooltip" data-template="eleven">
                      <span id="eleven" class="d-none">
                        <span>Charlie Holland</span>
                      </span>
                    </span>
                    <span class="avatar avatar-sm">
                      <img alt="avatar" src="https://i.pravatar.cc/150?img=<?= rand(1, 70); ?>" class="rounded-circle imgtooltip" data-template="twelve">
                      <span id="twelve" class="d-none">
                        <span>Jamie Lusar</span>
                      </span>
                    </span>
                    <span class="avatar avatar-sm ">
                      <span class="avatar-initials rounded-circle bg-light text-dark">2+</span>
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    <?php endif; ?>
  </div>
</div>