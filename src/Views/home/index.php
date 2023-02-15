<?php
require_once __DIR__ . '/../components/navbar.php';
?>

<div class="container mt-5 flex-grow-1">
  <div class="row mt-6">
    <div class="col-lg-12 col-md-12 col-12">
      <div class="row justify-content-md-between mb-5 mb-xl-0 ">
        <div class="col">
          <div class="mb-4">
            <h3 class="mb-0">Auctions List</h3>
          </div>
        </div>
        <div class="col-xxl-auto col-lg-auto col-md-auto col-12">
          <select class="form-select">
            <option value="">Filter by status</option>
            <option value="dibuka">Opened</option>
            <option value="ditutup">Closed</option>
          </select>
        </div>
      </div>
    </div>
    <?php foreach ($model['products'] as $key => $row) : ?>
        <?php $dueDate = new DateTime($row["tgl_ditutup"]); ?>
        <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-6 col-sm-12 mb-5">
          <div class="card h-100">
            <div class="card-body">
              <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                  <div class="ms-0">
                    <h4 class="mb-1 h4">
                      <a href="./auction/<?= $row['id_barang']; ?>" class="text-inherit"><?= $row['nama_barang']; ?></a>
                    </h4>
                    <span class="text-muted"><i class="mdi mdi-account fs-5 me-1"></i><?= $row['nama_petugas']; ?></span>
                  </div>
                </div>
                <div class="d-flex"></div>
              </div>
              <div class="mt-4 mb-4">
                <p class="mb-0 col-12 text-truncate" style=" -webkit-line-clamp: 3;display: -webkit-box;-webkit-box-orient: vertical;overflow: hidden;white-space:normal;">
                  <?= $row['deskripsi_barang']; ?>
                </p>
              </div>
              <div class="d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center">
                  <div class="avatar-group">
                    <span class="avatar avatar-sm avatar-warning imgtooltip" data-template="textFour">
                      <span class="avatar-initials rounded-circle ">DU</span>
                      <span id="textFour" class="d-none">
                        <span>Dash UI Only</span>
                      </span>
                    </span>
                    <span class="avatar avatar-sm">
                      <img alt="avatar" src="./assets/images/avatar/avatar-12.jpg" class="rounded-circle imgtooltip" data-template="eleven">
                      <span id="eleven" class="d-none">
                        <span>Charlie Holland</span>
                      </span>
                    </span>
                    <span class="avatar avatar-sm">
                      <img alt="avatar" src="./assets/images/avatar/avatar-13.jpg" class="rounded-circle imgtooltip" data-template="twelve">
                      <span id="twelve" class="d-none">
                        <span>Jamie Lusar</span>
                      </span>
                    </span>
                    <span class="avatar avatar-sm ">
                      <span class="avatar-initials rounded-circle bg-light text-dark">2+</span>
                    </span>
                  </div>
                </div>
                <div>
                  <?php if ($row['status'] == "dibuka") : ?>
                    <span class="badge p-2 bg-success">Opened</span>
                  <?php elseif ($row['status'] == "ditutup") : ?>
                    <span class="badge p-2 bg-danger">Closed</span>
                  <?php endif; ?>
                </div>
              </div>
            </div>
            <div class="card-footer p-0 bg-white">
              <div class="d-flex justify-content-between ">
                <div class="w-50 py-3 px-4 ">
                  <h6 class="mb-1 text-muted">Due Date:</h6>
                  <p class="text-dark fs-6 mb-0"><?= $dueDate->format("d F Y"); ?></p>
                </div>
                <div class="border-start w-50 py-3 px-4">
                  <h6 class="mb-1 text-muted">Budget:</h6>
                  <p class="text-dark fs-6 mb-0">Rp <?= number_format((int) $row["harga_awal"], 2, ",", ".") ?></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
  </div>
</div>