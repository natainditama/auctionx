<div class="container mt-6">
  <div class="row align-items-center">
    <div class="col-xl-12 col-lg-12 col-md-12 col-12">
      <!-- Bg -->
      <div class="pt-20 rounded-top" style="background-color:white;background-image: url(https://source.unsplash.com/random/1028x162/?nature);background-size: cover;background-repeat: no-repeat;"></div>
      <div class="card rounded-bottom rounded-0 smooth-shadow-sm mb-5">
        <div class="d-flex align-items-center justify-content-between pt-4 pb-6 px-4">
          <div class="d-flex align-items-center">
            <!-- avatar -->
            <div class="avatar-xxl avatar-indicators avatar-online me-2 position-relative d-flex justify-content-end align-items-end mt-n10">
              <img src="https://i.pravatar.cc/150?img=<?= rand(1, 70); ?>" class="avatar-xxl rounded-circle border border-2 " alt="Image">
            </div>
            <!-- text -->
            <div class="lh-1">
              <h1 class="h2 text-capitalize">
                <?= $model['profile']['nama_lengkap'] ?? $model['profile']['nama_petugas'] ?>
              </h1>
              <p class="mb-0 d-block">@<?= $model['profile']['username'] ?></p>
            </div>
          </div>
          <?php if (isset($model['auth']) && $model['auth']['username'] == $model['profile']['username'] && $model['auth']['level'] == "masyarakat") : ?>
            <div>
              <a href="./setting" class="btn btn-outline-primary d-none d-md-block">Edit Profile</a>
            </div>
          <?php endif; ?>
        </div>
        <!-- nav -->
      </div>
    </div>
  </div>
  <!-- content -->
  <div>
    <!-- row -->
    <div class="row align-items-start">
      <div class="col-xl-6 col-lg-12 col-md-12 col-12 mb-5">
        <!-- card -->
        <div class="card h-100">
          <!-- card body -->
          <div class="card-header bg-white py-4">
            <h4 class="mb-0">About Me</h4>
          </div>
          <div class="card-body">
            <!-- card title -->

            <h5 class="text-uppercase">Bio</h5>
            <!-- text -->
            <p class="mt-2 mb-6">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit.
              Suspen disse var ius enim in eros elementum tristique.
              Duis cursus, mi quis viverra ornare, eros dolor interdum
              nulla, ut commodo diam libero vitae erat.
            </p>
            <!-- row -->
            <div class="row">
              <div class="col-12 mb-5">
                <!-- text -->
                <h5 class="text-uppercase">Position</h5>
                <p class="mb-0">Software Engineering</p>
              </div>
              <div class="col-6 mb-5">
                <h5 class="text-uppercase">Phone</h5>
                <p class="mb-0">+10313081301</p>
              </div>
              <div class="col-6 mb-5">
                <h5 class="text-uppercase">
                  Date of Birth
                </h5>
                <p class="mb-0">21.04.2005</p>
              </div>
              <div class="col-6">
                <h5 class="text-uppercase">Email</h5>
                <p class="mb-0">hello.mail@gmail.com</p>
              </div>
              <div class="col-6">
                <h5 class="text-uppercase">Location</h5>
                <p class="mb-0">Bali, Indonesia</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-6 col-lg-12 col-md-12 col-12 mb-5">
        <!-- card -->
        <div class="card">
          <div class="card-header bg-white py-4">
            <h4 class="mb-0">Auction Contributions</h4>
          </div>
          <!-- card body -->
          <div class="card-body pt-2">
            <!-- card title -->
            <?php if (isset($model['history']) && count($model['history']) > 0) : ?>
              <?php foreach ($model['history'] as $key => $row) : ?>
                <?php
                $price = $row["penawaran_harga"] ?? $row["harga_awal"];
                $price = number_format(((int) $price), 2, ",", ".");
                ?>
                <div class="d-md-flex justify-content-between align-items-center mt-3">
                  <div class="d-flex align-items-center">
                    <!-- text -->
                    <div class="">
                      <h5 class="mb-1">
                        <a href="./auction/<?= $row['id_barang'] ?>" class="text-inherit"><?= $row['nama_barang'] ?></a>
                      </h5>
                      <p class="mb-0 fs-5 text-muted">
                        Rp <?= $price ?>
                      </p>
                    </div>
                  </div>
                  <div class="d-flex align-items-center ms-10 ms-md-0 mt-3">
                    <!-- avatar group -->
                    <div class="avatar-group me-2">
                      <!-- img -->
                      <span class="avatar avatar-sm">
                        <img alt="avatar" src="https://i.pravatar.cc/150?img=<?= rand(1, 70); ?>" class="rounded-circle">
                      </span>
                      <!-- img -->
                      <span class="avatar avatar-sm">
                        <img alt="avatar" src="https://i.pravatar.cc/150?img=<?= rand(1, 70); ?>" class="rounded-circle">
                      </span>
                      <!-- img -->
                      <span class="avatar avatar-sm">
                        <img alt="avatar" src="https://i.pravatar.cc/150?img=<?= rand(1, 70); ?>" class="rounded-circle">
                      </span>
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>
            <?php else : ?>
              <p class="mb-0 mt-3"><?= $model['profile']['nama_lengkap'] ?? $model['profile']['nama_petugas'] ?> has no contribution</p>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>