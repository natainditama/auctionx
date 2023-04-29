<?php

use NataInditama\Auctionx\Models\HistoryLelang;

$req = file_get_contents('http://localhost/web_027_nata_p4/public/data/images.json');
$json = (array) json_decode($req);
$makeIndex = rand(0, count($json) - 1);
$modelIndex = rand(0, count($json[$makeIndex]->model) - 1);
?>
<div class="container mt-5 flex-grow-1">
  <?php if (is_array($model['products']) && count($model['products']) > 0) : ?>
    <div class="shadow-sm bg-white my-5" style="background-image: url(./assets/images/background/sliderbg.jpg);background-position: center;background-repeat: no-repeat;background-size: cover;">
      <div class="row p-6 p-md-3">
        <div class="col-md-5">
          <a href="./auction/<?= $model['products'][0]['id_barang']; ?>" style="display: block;width:100%;max-height: 260px;">
            <img src="https://cdn.imagin.studio/getImage?angle=02&billingTag=web&customer=carwow&make=<?= $json[$makeIndex]->make ?>&modelFamily=<?= $json[$makeIndex]->model[$modelIndex] ?>&modelVariant=hatchback&modelYear=2023&paintId=pspc0323&tailoring=carwow&width=1200&zoomLevel=0&zoomType=fullscreen" style="width: 100%;" alt="Image">
          </a>
        </div>
        <div class="col">
          <div class="d-flex justify-content-center flex-column align-items-start" style="height: 100%;">
            <h1><?= htmlspecialchars($model['products'][0]['nama_barang']) ?></h1>
            <p><?= htmlspecialchars($model['products'][0]['deskripsi_barang']) ?></p>
            <p>Current bid: <b>Rp <?= htmlspecialchars(number_format($model['products'][0]['harga_awal'], 2, ",", ".")) ?></b></p>
            <a href="./auction/<?= $model['products'][0]['id_barang']; ?>" class="btn btn-primary text-uppercase">Place A Bid</a>
          </div>
        </div>
      </div>
    </div>
  <?php endif; ?>
  <div class="row mt-10">
    <div class="col-lg-12 col-md-12 col-12">
      <div class="d-flex justify-content-center mb-5 mb-xl-2">
        <div class="mb-4" style="width: max-content;">
          <h2 class="mb-0 text-center fw-bold">Latest Auction</h2>
          <hr>
        </div>
      </div>
    </div>
  </div>
  <div id="auction-list" class="row">
    <?php if (is_array($model['products']) && count($model['products']) > 0) : ?>
      <?php require_once __DIR__ . "/../components/auction/card.php"; ?>
    <?php else : ?>
      <p>Lelang tidak ditemukan</p>
    <?php endif; ?>
  </div>
</div>