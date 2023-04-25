<div class="container pt-6">
  <div class="row">
    <div class="col-lg-12 col-md-12 col-12">
      <div class="mb-5">
        <h3 class="mb-0"><?= isset($model['action']) && $model['action'] == "edit" ? "Edit " . $model['product']['nama_barang'] : "Create new auction" ?></h3>
      </div>
    </div>
  </div>
  <div>
    <div class="row">
      <form method="POST" action="<?= isset($model['action']) && $model['action'] == "edit" ? "./auction/" . $model['product']['id_barang'] . "/update" : "./auction" ?>" class="col-xl-8 col-md-12 col-12">
        <div class="card mb-5">
          <div class="card-body">
            <div class="row">
              <?php if (isset($model['product']['id_barang'])) : ?>
                <input type="hidden" name="id_barang" value="<?= $model['product']['id_barang'] ?>">
              <?php endif; ?>
              <div class="mb-4 col-12">
                <label class="form-label" for="nama_barang">Name <span class="text-danger">*</span> </label>
                <input type="text" id="nama_barang" name="nama_barang" class="form-control" placeholder="Enter product name" required="" value="<?= $model['product']['nama_barang'] ?? @$_POST['nama_barang'] ?>">
              </div>
              <div class=" mb-4 col-12">
                <label class="form-label" for="deskripsi_barang">Description <span class="text-danger">*</span> </label>
                <textarea id="deskripsi_barang" name="deskripsi_barang" rows="5" class="form-control" placeholder="Enter product description" required=""><?= $model['product']['deskripsi_barang'] ?? @$_POST['deskripsi_barang'] ?></textarea>
              </div>
              <div class="mb-4 col-md-6 col-12">
                <label class="form-label" for="tgl_dibuka">Start Date <span class="text-danger">*</span></label>
                <input class="form-control" type="datetime-local" placeholder="Select start date" id="tgl_dibuka" name="tgl_dibuka" value="<?= isset($model['product']['tgl_dibuka']) ? $model['product']['tgl_dibuka'] :  @$_POST['tgl_dibuka']; ?>">
              </div>
              <div class="mb-4 col-md-6 col-12">
                <label class="form-label" for="tgl_ditutup">Due Date <span class="text-danger">*</span></label>
                <input class="form-control" type="datetime-local" placeholder="Select due date" id="tgl_ditutup" name="tgl_ditutup" value="<?= isset($model['product']['tgl_ditutup']) ? $model['product']['tgl_ditutup'] :  @$_POST['tgl_dibuka']; ?>">
              </div>
              <div class="mb-4 col-12">
                <label class="form-label" for="status">Status <span class="text-danger">*</span></label>
                <select class="form-select" name="status" id="status">
                  <?php if ($model['auth']['level'] == "petugas") : ?>
                    <option value="dibuka" <?php if (isset($model['product']) && $model['product']['status'] == "dibuka") : ?>selected<?php endif ?>>Opened</option>
                    <option value="ditutup" <?php if (isset($model['product']) && $model['product']['status'] == "ditutup" && $model['auth']['level'] == "petugas") : ?>selected <?php endif ?>>Closed</option>
                  <?php else : ?>
                    <option value="dibuka">Opened</option>
                  <?php endif; ?>
                </select>
              </div>
              <div class="mb-4 col-12">
                <label class="form-label" for="harga_awal">Price <span class="text-danger">*</span> </label>
                <input type="number" id="harga_awal" name="harga_awal" class="form-control" placeholder="Enter product price" required="" value="<?= $model['product']['harga_awal'] ?? @$_POST['harga_awal'] ?>">
              </div>
              <div class="mb-4 col-12">
                <button type="submit" class="btn btn-primary me-2">Save changes</button>
                <a href="./auction" class="btn btn-dark">Go back</a>
              </div>
            </div>
          </div>
        </div>
      </form>
      <div class="col-xl-4">
        <div class="card mb-5">
          <div class="card-header py-3 bg-white">
            <h4 class="mb-0 mt-2">Contributions</h4>
          </div>
          <div class="card-body">
            <h5>Winner</h5>
            <select class="form-select">
              <option selected="">Select Team Lead</option>
              <option value="1">One</option>
              <option value="2">Two</option>
              <option value="3">Three</option>
            </select>
            <div class="mt-6">
              <h5 class="mb-4">Team Members</h5>
              <div class="d-flex align-items-center">
                <!-- avatar group -->
                <div class="avatar-group">
                  <span class="avatar avatar-sm">
                    <img alt="avatar" src="https://i.pravatar.cc/150?img=<?= rand(1, 70); ?>" class="rounded-circle imgtooltip" data-template="one">
                    <span id="one" class="d-none">
                      <span>Paul Haney</span>
                    </span>
                  </span>
                  <span class="avatar avatar-sm">
                    <span class="avatar-initials rounded-circle bg-light text-dark">5+</span>
                  </span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>