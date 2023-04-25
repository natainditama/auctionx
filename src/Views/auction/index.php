<?php
$req = file_get_contents('http://localhost/web_027_nata_p4/public/data/images.json');
$json = (array) json_decode($req);
// var_dump($json[$makeIndex]->make, $json[$makeIndex]->model[$modelIndex]);
?>
<div class="container mt-5 flex-grow-1">
  <div class="row mt-6">
    <div class="col-lg-12 col-md-12 col-12">
      <div class="row justify-content-md-between mb-5 mb-xl-2">
        <div class="col">
          <div class="mb-4">
            <h3 class="mb-0">Live Auction</h3>
          </div>
        </div>
        <div class="col-xxl-auto col-lg-auto col-md-auto col-12">
          <!-- <form action="" id="">
            <select class="form-select">
              <option value="">Filter by status</option>
              <option value="dibuka">Opened</option>
              <option value="ditutup">Closed</option>
            </select> -->
          </form>
        </div>
      </div>
    </div>
  </div>
  <div id="auction-list" class="row">
    <?php if (is_array($model['products'])) : ?>
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
    <?php else : ?>
      <p>Lelang tidak ditemukan</p>
    <?php endif; ?>
  </div>
</div>