<div id="db-wrapper" class="toggled">
    <?php require_once __DIR__ . "/../../components/dashboard/sidebar.php"; ?>
    <div id="page-content">
        <?php require_once __DIR__ . "/../../components/navbar.php"; ?>
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
                                <a href="#" class="btn btn-white" data-bs-toggle="modal" data-bs-target="#createModal">Add Product</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-12 col-12">
                    <div class="card">
                        <div class="card-header bg-white py-4 d-flex justify-content-between">
                            <h4 class="mb-0">Products</h4>
                        </div>
                        <div class="table-responsive">
                            <table id="example" class="table text-nowrap mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>Product name</th>
                                        <th>Date</th>
                                        <th>Price</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (count($model['history']) > 0) : ?>
                                        <?php foreach ($model['history'] as $key => $row) : ?>
                                            <?php
                                            $price = number_format((int) $row['penawaran_harga'], 2, ",", ".");
                                            ?>

                                            <tr>
                                                <td class="align-middle">
                                                    <div class="d-flex align-items-center">
                                                        <div class="ms-0 lh-1">
                                                            <h5 class="mb-1">
                                                                <a href="#" class="text-inherit">Test</a>
                                                            </h5>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="align-middle">10/03/22</td>
                                                <td class="align-middle">Rp <?= $price; ?> </td>
                                                <td>
                                                    <button data-bs-toggle="modal" data-bs-target="#destroyModal<?= $row['id_history'] ?>" class="btn btn-ghost btn-icon btn-sm rounded-circle texttooltip" data-template="trashOne">
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
                                                    <div class="modal fade" id="destroyModal<?= $row['id_history'] ?>" tabindex="-1" role="dialog" data-bs-keyboard="false" aria-labelledby="destroyModalLabel<?= $row['id_history'] ?>" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title" id="destroyModalLabel<?= $row['id_history'] ?>">Delete <?= $row['nama_barang']; ?></h4>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                                    </button>
                                                                </div>
                                                                <form action="./product/<?= $row['id_history'] ?>/destroy" method="post">
                                                                    <div class="modal-body">
                                                                        <div class="col-12">
                                                                            <p class="mb-0"><strong>Are you sure?</strong> You won't be able to revert this!</p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                        <button type="submit" class="btn btn-danger">Yes delete it!</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
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
                                    <?php else : ?>
                                        <tr>
                                            <td colspan="5">
                                                <p class="text-center my-4">There are no records to display</p>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="createModal" tabindex="-1" role="dialog" data-bs-keyboard="false" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="createModalLabel">Create new product</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <form action="./dashboard/product" method="post">
                <div class="modal-body">
                    <div class="mb-3 col-12">
                        <label class="form-label">Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="name" placeholder="Enter product name" required>
                    </div>
                    <div class="mb-3 col-12">
                        <label class="form-label">Date</label>
                        <input type="date" class="form-control" name="date" placeholder="Enter product date" required>
                    </div>
                    <div class="mb-3 col-12">
                        <label class="form-label">Price <span class="text-danger">*</span></label>
                        <input type="number" class="form-control" name="price" placeholder="Enter product price" required>
                    </div>
                    <div class="col-12">
                        <label class="form-label">Description <span class="text-danger">*</span></label>
                        <textarea class="form-control" name="desc" cols="3" rows="5" placeholder="Enter product price" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>