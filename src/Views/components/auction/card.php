<?php

use NataInditama\Auctionx\Models\HistoryLelang;

 foreach ($model['products'] as $key => $row) : ?>
  <?php
  $dueDate = new DateTime($row["tgl_ditutup"]);
  ?>
  <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-6 col-sm-12 mb-5">
    <div class="card h-100">
      <div class="card-body">
        <div class="">
          <div class="">
            <div class="ms-0 mb-3">
              <div class="thumbnail hover-scale-up">
                <a href="./auction/<?= $row['id_barang']; ?>" style="height: 188px;display: block;">
                  <img class="car-thumb" src="https://cdn.imagin.studio/getImage" style="width: 100%;" alt="Image">
                </a>
              </div>
              <h4 class="card-title mt-3 mb-1">
                <a href="./auction/<?= $row['id_barang']; ?>" class="text-inherit"><?= $row['nama_barang']; ?></a>
              </h4>
              <p class="card-subtitle mt-0 text-muted">Rp <?= number_format((int) $row["harga_awal"], 2, ",", ".") ?></p>
            </div>
          </div>
        </div>
        <div class="d-flex justify-content-between align-items-center">
          <div>
            <a href="./auction/<?= $row['id_barang']; ?>" class="btn btn-primary text-uppercase">Place A Bid</a>
          </div>
          <div class="d-flex align-items-center">
            <div class="avatar-group">
              <?php
              $historyAuction = new HistoryLelang();
              $histories = $historyAuction->findAllByLelangId($row['id_lelang']);
              ?>
              <?php if (isset($histories) && count($histories) > 0) : ?>
                <?php $history = array_slice($histories, 0, 2); ?>
                <?php foreach ($history as $key => $value) : ?>
                  <span class="avatar avatar-md">
                    <a href="./user/<?= $value['username'] ?>">
                      <img alt="avatar" src="https://i.pravatar.cc/150?img=<?= rand(1, 70); ?>" class="rounded-circle imgtooltip" data-template="one">
                    </a>
                    <span class="d-none">
                      <small class="mb-0"><?= $value['username'] ?></small>
                    </span>
                  </span>
                <?php endforeach; ?>
                <?php
                $other = count($histories) > 2 ? count($histories) - 2 : 0;
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
      </div>
    </div>
  </div>
<?php endforeach; ?>