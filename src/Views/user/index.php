<div class="container pt-6">
  <div class="row">
    <div class="col-lg-12 col-md-12 col-12">
      <div class="d-flex justify-content-between align-items-center">
        <h1 class="mb-0 h3">Bidders</h1>
        <div class="d-flex gap-2">
          <button data-bs-toggle="modal" data-bs-target="#createModal" class="btn btn-white">Add Bidder</button>
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
                <th>
                  <span class="me-4 mb-0 h-100">
                    #
                  </span>
                  <span>Bidder</span>
                </th>
                <th>Telp</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php if (count($model['users']) > 0) : ?>
                <?php $no = 1; ?>
                <?php foreach ($model['users'] as $key => $row) : ?>
                  <tr>
                    <td>
                      <div class="d-flex align-items-center">
                        <p class="me-4 mb-0 h-100">
                          <?= $no++ ?>
                        </p>
                        <div class="d-flex align-items-center">
                          <a href="./user/<?= htmlspecialchars($row['username']) ?>">
                            <img src="https://i.pravatar.cc/150?img=<?= rand(1, 70); ?>" class="rounded-circle avatar-md" alt="Image">
                          </a>
                          <div class="ms-3 d-flex align-items-center justify-content-center">
                            <h5 class="mb-0">
                              <a href="./user/<?= htmlspecialchars($row['username']) ?>">
                                <?= htmlspecialchars($row['nama_lengkap']) ?>
                              </a>
                            </h5>
                          </div>
                        </div>
                      </div>
                    </td>
                    <td>
                      <a href="tel:+<?= htmlspecialchars($row['telp']); ?>">
                        <?= htmlspecialchars($row['telp']); ?>
                      </a>
                    </td>
                    <td>
                      <button data-bs-toggle="modal" data-bs-target="#deleteModal<?= $row['id_user'] ?>" class="btn btn-ghost btn-icon btn-sm rounded-circle texttooltip" data-template="trashOne">
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
                      <div class="modal fade" id="deleteModal<?= $row['id_user'] ?>" tabindex="-1" role="dialog" data-bs-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title" id="exampleModalLabel"> Delete <?= $row['nama_lengkap'] ?> Data</h4>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                              </button>
                            </div>
                            <form action="./user/<?= $row['id_user'] ?>/destroy" method="post">
                              <div class="modal-body">
                                <input type="hidden" name="username" value="<?= $row['username'] ?>">
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
                      <button data-bs-toggle="modal" data-bs-target="#editModal<?= $row['id_user'] ?>" class="btn btn-ghost btn-icon btn-sm rounded-circle texttooltip" data-template="editTwo">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit icon-xs">
                          <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                          <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                        </svg>
                        <div id="editTwo" class="d-none">
                          <span>Edit</span>
                        </div>
                      </button>
                      <div class="modal fade" id="editModal<?= $row['id_user'] ?>" tabindex="-1" role="dialog" data-bs-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title" id="exampleModalLabel"> Update Data <?= $row['nama_lengkap'] ?> </h4>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                              </button>
                            </div>
                            <form action="./user/<?= $row['id_user'] ?>/update" method="post">
                              <input type="hidden" name="id_user" value="<?= $row['id_user']; ?>">
                              <div class="modal-body">
                                <div class="mb-3">
                                  <label for="name" class="form-label">Full Name</label>
                                  <input type="text" id="name" class="form-control" name="name" placeholder="Enter your name" required="" value="<?= $row['nama_lengkap']; ?>" />
                                </div>
                                <div class="mb-3">
                                  <label for="telp" class="form-label">Telphone</label>
                                  <input type="number" id="telp" class="form-control" name="telp" placeholder="Enter your telp" required="" value="<?= $row['telp']; ?>" />
                                </div>
                                <div class="">
                                  <label for="username" class="form-label">Username</label>
                                  <input type="username" id="username" class="form-control" name="username" placeholder="Enter your username" required="" value="<?= $row['username']; ?>" />
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
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

<div class="modal fade" id="createModal" tabindex="-1" role="dialog" data-bs-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel"> Create new Bidder</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <form method="POST" action="./user">
        <div class="modal-body">
          <div class="mb-3">
            <label for="name" class="form-label">Full Name</label>
            <input type="text" id="name" class="form-control" name="name" placeholder="Enter your name" required="" value="<?= @$_POST['name']; ?>" />
          </div>
          <div class="mb-3">
            <label for="telp" class="form-label">Telphone</label>
            <input type="number" id="telp" class="form-control" name="telp" placeholder="Enter your telp" required="" value="<?= @$_POST['telp']; ?>" />
          </div>
          <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="username" id="username" class="form-control" name="username" placeholder="Enter your username" required="" value="<?= @$_POST['username']; ?>" />
          </div>
          <div class="">
            <label for="password" class="form-label">Password</label>
            <input type="password" id="password" class="form-control" name="password" placeholder="Enter your password" required="" />
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" name="submit" class="btn btn-primary">Create Free Account</button>
        </div>
      </form>
    </div>
  </div>
</div>