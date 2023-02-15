<?php require_once __DIR__ . "/../components/navbar.php"; ?>
<?php
$dateNow = new DateTime();
$startDate = new DateTime($model["auction"]["tgl_dibuka"]);
$dueDate = new DateTime($model["auction"]["tgl_ditutup"]);
$interval = $dateNow->diff($dueDate);
$price = (int) $model["auction"]["harga_awal"]; // price in dollar us
$price = $price * 15_000; // price in rupiah
$price = number_format($price, 2, ",", ".");
?>



<div class="">
  <div class="bg-white pt-8 mb-6">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-12">
          <!-- Page header -->
          <div class="d-lg-flex
                align-items-center justify-content-between mb-6">
            <div class="mb-6 mb-lg-0">
              <div class="d-flex align-items-center">
                <img src="./assets/images/brand/logo/brand-logo.png" alt="Image" class="icon-shape icon-md">
                <div class="ms-4">
                  <h1 class="h3 "><?= $model["auction"]["nama_barang"] ?></h1>
                  <span>
                    <span class="fs-5"><span class="me-1"><i class="mdi mdi-domain fs-5 me-1"></i><?= $model["auction"]["nama_petugas"] ?></span> |
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
              <!-- avatar group -->
              <div class="avatar-group">
                <span class="avatar avatar-md">
                  <!-- avatar  -->
                  <img alt="avatar" src="./assets/images/avatar/avatar-11.jpg" class="rounded-circle imgtooltip" data-template="one">
                  <span id="one" class="d-none">
                    <small class="mb-0 ">Paul Haney</small>
                  </span>
                </span>
                <!-- avatar  -->
                <span class="avatar avatar-md">
                  <img alt="avatar" src="./assets/images/avatar/avatar-2.jpg" class="rounded-circle imgtooltip" data-template="two">
                  <span id="two" class="d-none">
                    <small class="mb-0 ">Gali Linear</small>
                  </span>
                </span>
                <!-- avatar  -->
                <span class="avatar avatar-md">
                  <img alt="avatar" src="./assets/images/avatar/avatar-3.jpg" class="rounded-circle imgtooltip" data-template="three">
                  <span id="three" class="d-none">
                    <small class="mb-0 ">Mary Holler</small>
                  </span>
                </span>
                <!-- avatar  -->
                <span class="avatar avatar-md">
                  <img alt="avatar" src="./assets/images/avatar/avatar-4.jpg" class="rounded-circle imgtooltip" data-template="four">
                  <span id="four" class="d-none">
                    <small class="mb-0 ">Lio Nordal</small>
                  </span>
                </span>
                <!-- avatar  -->
                <span class="avatar avatar-md">
                  <span class="avatar-initials
                        rounded-circle bg-light
                        text-dark">5+</span>
                </span>
              </div>
              <!-- icon  -->
              <!-- <a href="#!" class="btn btn-icon btn-white border border-2 rounded-circle btn-dashed ms-2" data-template="inviteMember" data-bs-toggle="modal" data-bs-target="#inviteMemberModal">

                +

              </a> -->
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
                          <span class="ms-3">Username</span>
                        </th>
                        <th scope="col">Price</th>
                      </tr>
                    </thead>
                    <tbody class="">
                      <?php $i=1; ?>
                      <?php foreach($model['history'] as $history) : ?>
                      <tr>
                        <td scope="row" class="d-flex align-items-center">
                          <span class="me-3"> <?= $i++; ?></span>
                          <div class="d-flex align-items-center">
                            <div class="avatar avatar-md">
                              <a href="#!"> <img src="./assets/images/avatar/avatar-<?= $i; ?>.jpg" alt="Image" class="rounded-circle"> </a>
                            </div>
                            <div class="ms-2">
                              <h5 class="mb-0"><a href="#!" class="text-inherit"><?= $history['nama_lengkap'] ?></a> </h5>
                            </div>
                          </div>
                        </td>
                        <td>
                          <span>Rp <?= number_format((int) $history['penawaran_harga'], 2, ".", ","); ?></span>
                        </td>
                      </tr>
                      <?php endforeach; ?>
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
                <h3 class="display-5 fw-bold text-white mb-1"><?= $interval->d; ?> Days</h3>
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
  </div>


</div>