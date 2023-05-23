<div class="container pt-6">
  <div class="row">
    <div class="col-lg-12 col-md-12 col-12">
      <div class="d-flex justify-content-between align-items-center">
        <h1 class="mb-0 h3">Auction List</h1>
        <div class="d-flex gap-2">
          <a href="./auction/export" target="_blank" class="btn btn-success">Export Excel</a>
          <a href="./auction/create" class="btn btn-white">Add Auction</a>
        </div>
      </div>
    </div>
  </div>
  <div class="row mt-4">
    <div class="col-md-12 col-12">
      <div class="card">
        <div class="table-responsive">
          <table id="example" class="table text-nowrap mb-0">
            <thead class="table-light">
              <tr>
                <th>Product</th>
                <th>Date</th>
                <th>Budget</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php if (count($model['products']) > 0) : ?>
                <?php foreach ($model['products'] as $key => $row) : ?>
                  <?php
                  $startDate = new DateTime($row['tgl_dibuka']);
                  $dueDate = new DateTime($row['tgl_ditutup']);
                  $price = number_format((int) $row['harga_awal'], 2, ",", ".");
                  ?>
                  <tr>
                    <td class="align-middle">
                      <div class="d-flex align-items-center">
                        <div class="ms-0 lh-1">
                          <h5 class="mb-1">
                            <a href="./auction/<?= $row['id_barang'] ?>" class="text-inherit"><?= ($row['nama_barang']); ?></a>
                          </h5>
                        </div>
                      </div>
                    </td>
                    <td class="align-middle"><?= $startDate->format('d/m/Y') . " - " . $dueDate->format('d/m/y');  ?></td>
                    <td class="align-middle">Rp <?= $price; ?> </td>
                    <td class="align-middle">
                      <?php if ($row['status'] == "dibuka") : ?>
                        <span class="badge p-2 bg-info">Opened</span>
                      <?php elseif ($row['status'] == "ditutup") : ?>
                        <span class="badge p-2 bg-danger">Closed</span>
                      <?php endif; ?>
                    </td>
                    <td>
                      <button data-bs-toggle="modal" data-bs-target="#deleteModal<?= $row['id_barang'] ?>" class="btn btn-ghost btn-icon btn-sm rounded-circle texttooltip" data-template="trashOne">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 icon-xs">
                          <polyline points="3 6 5 6 21 6"></polyline>
                          <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                          <line x1="10" y1="11" x2="10" y2="17"></line>
                          <line x1="14" y1="11" x2="14" y2="17"></line>
                        </svg>
                        <div id="trashOne" class="d-none">
                          <span>Delete</span>
                        </div>
                      </button>
                      <div class="modal fade" id="deleteModal<?= $row['id_barang'] ?>" tabindex="-1" role="dialog" data-bs-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title" id="exampleModalLabel"> Delete <?= $row['nama_barang'] ?> </h4>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                              </button>
                            </div>
                            <form action="./auction/<?= $row['id_barang'] ?>/destroy" method="post">
                              <div class="modal-body">
                                <input type="hidden" name="id_barang" value="<?= $row['id_barang'] ?>">
                                <input type="hidden" name="id_lelang" value="<?= $row['id_lelang'] ?>">
                                <p class="mb-0">Are you sure? You won't be able to revert this! </p>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-danger">Yes, delete it!</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                      <a href="./auction/<?= $row['id_barang'] ?>/edit" class="btn btn-ghost btn-icon btn-sm rounded-circle texttooltip" data-template="editTwo">
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
              <?php endif; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>