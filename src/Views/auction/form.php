<div class="container pt-6">
  <div class="row">
    <div class="col-lg-12 col-md-12 col-12">
      <div class="mb-5">
        <h1 class="mb-0 h3"><?= isset($model['action']) && $model['action'] == "edit" ? "Edit " . $model['product']['nama_barang'] : "Create new auction" ?></h1>
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
                <input type="text" id="harga_awal" name="harga_awal" class="form-control money" placeholder="Enter product price" required="" value="<?= $model['product']['harga_awal'] ?? @$_POST['harga_awal'] ?>" min="0" pattern="[0-9 _,]*" title="Please enter number only">
              </div>
              <div class="mb-4 col-12">
                <button type="submit" class="btn btn-primary me-2">Save changes</button>
                <a href="./auction" class="btn btn-dark">Go back</a>
              </div>
            </div>
          </div>
        </div>
      </form>
      <?php if (isset($model['action']) && $model['action'] == "edit") : ?>
        <div class="col-xl-4">
          <div class="card mb-5">
            <div class="card-header py-3 bg-white">
              <h4 class="mb-0 mt-2">Contributions</h4>
            </div>
            <div class="card-body">
              <?php if (count($model['history']) > 0) :  ?>
                <h5 class="mb-2">Winner</h5>
                <ul class="list-group list-group-flush">
                  <?php if (isset($model['history'])) : ?>
                    <li class="list-group-item p-0 border-0 mb-3">
                      <div class="row position-relative">
                        <div class="col-auto pe-0 d-flex align-items-center">
                          <div class="avatar avatar-md">
                            <a href="./user/<?= strip_tags($model['history'][0]['username']) ?>"><img src="https://i.pravatar.cc/150?img=<?= rand(1, 70); ?>" alt="Image" class="rounded-circle"></a>
                          </div>
                        </div>
                        <div class="col-auto">
                          <h4 class="mb-1 h5">
                            <a href="./user/<?= htmlspecialchars($model['history'][0]['username']) ?>"><?= $model['history'][0]['nama_lengkap']; ?></a>
                          </h4>
                          <p class="mb-0 text-muted">Rp <?= number_format((int) $model['history'][0]['penawaran_harga'], 2, ",", "."); ?></p>
                        </div>
                      </div>
                    </li>
                </ul>
                <div class="mb-4">
                  <h5 class="">Contributors</h5>
                  <div class="d-flex align-items-center">
                    <div class="avatar-group">
                      <?php if (isset($model['history']) && count($model['history']) > 0) : ?>
                        <?php foreach ($model['history'] as $key => $row) : ?>
                          <span class="avatar avatar-md">
                            <a href="./user/<?= $row['username'] ?>">
                              <img alt="avatar" src="https://i.pravatar.cc/150?img=<?= rand(1, 70); ?>" class="rounded-circle imgtooltip" data-template="one">
                            </a>
                            <span id="one" class="d-none">
                              <small class="mb-0"><?= $row['username'] ?></small>
                            </span>
                          </span>
                        <?php endforeach; ?>
                      <?php endif; ?>
                    </div>
                  </div>
                </div>
              <?php endif; ?>
            <?php else : ?>
              <p class="mb-0"><?= $model["product"]["nama_barang"] ?> auctions have no contributors</p>
            <?php endif; ?>
            </div>
          </div>
        </div>
      <?php endif; ?>
    </div>
  </div>
</div>