<div id="db-wrapper" class="toggled">
  <?php require_once __DIR__ . "/../components/dashboard/sidebar.php"; ?>
  <div id="page-content">
    <?php require_once __DIR__ . "/../components/navbar.php"; ?>
    <div class="container pt-6">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-12">
          <div>
            <div class="d-flex justify-content-between align-items-center">
              <div class="mb-0">
                <select class="form-select">
                  <option value="">Filter by status</option>
                  <option value="dibuka">Opened</option>
                  <option value="ditutup">Closed</option>
                </select>
              </div>
              <div>
                <a href="#" class="btn btn-white">Create New Auction</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row mt-4">
        <div class="col-md-12 col-12">
          <div class="card">
            <div class="card-header bg-white py-4 d-flex justify-content-between">
              <h4 class="mb-0">Auctions</h4>
            </div>
            <div class="table-responsive">
              <table id="example" class="table text-nowrap mb-0">
                <thead class="table-light">
                  <tr>
                    <th>Product name</th>
                    <th>Date</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($model['products'] as $key => $row) : ?>
                    <?php
                    $date = new DateTime($row['tgl']);
                    $price = number_format((int) $row['harga_awal'], 2, ",", ".");
                    ?>
                    <tr>
                      <td class="align-middle">
                        <div class="d-flex align-items-center">
                          <div class="ms-0 lh-1">
                            <h5 class="mb-1">
                              <a href="#" class="text-inherit"><?= $row['nama_barang']; ?></a>
                            </h5>
                          </div>
                        </div>
                      </td>
                      <td class="align-middle"><?= $date->format("d/m/Y"); ?></td>
                      <td class="align-middle">Rp <?= $price; ?> </td>
                      <td class="align-middle text-truncate" style="max-width: 200px;"><?= $row['deskripsi_barang']; ?></td>
                      <td><a href="#!" class="btn btn-ghost btn-icon btn-sm rounded-circle texttooltip" data-template="trashOne">
                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 icon-xs">
                            <polyline points="3 6 5 6 21 6"></polyline>
                            <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                            <line x1="10" y1="11" x2="10" y2="17"></line>
                            <line x1="14" y1="11" x2="14" y2="17"></line>
                          </svg>
                          <div id="trashOne" class="d-none">
                            <span>Delete</span>
                          </div>
                        </a>
                        <a href="#!" class="btn btn-ghost btn-icon btn-sm rounded-circle texttooltip" data-template="editTwo">
                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit icon-xs">
                            <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                            <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                          </svg>
                          <div id="editTwo" class="d-none">
                            <span>Edit</span>
                          </div>
                        </a>
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
</div>