<div class="container pt-6">
  <div class="row">
    <div class="col-lg-12 col-md-12 col-12">
      <div class="mb-5">
        <h3 class="mb-0 ">Create new auction</h3>
      </div>
    </div>
  </div>
  <div>
    <div class="row">
      <div class="col-xl-8 col-md-12 col-12">
        <div class="card mb-5">
          <div class="card-body">
            <div class="row">
              <div class="mb-4 col-12">
                <label class="form-label" for="nama_barang">Name <span class="text-danger">*</span> </label>
                <input type="text" id="nama_barang" name="nama_barang" class="form-control" placeholder="Enter product name" required="">
              </div>
              <div class="mb-4 col-12">
                <label class="form-label" for="deskripsi_barang">Description <span class="text-danger">*</span> </label>
                <textarea id="deskripsi_barang" name="deskripsi_barang" rows="5" class="form-control" placeholder="Enter product description" required=""></textarea>
              </div>
              <div class="mb-4 col-md-6 col-12">
                <label class="form-label" for="tgl_dibuka">Start Date <span class="text-danger">*</span></label>
                <input class="form-control" type="date" placeholder="Select start date" id="tgl_dibuka" name="tgl_dibuka">
              </div>
              <div class="mb-4 col-md-6 col-12">
                <label class="form-label" for="tgl_ditutup">Due Date <span class="text-danger">*</span></label>
                <input class="form-control" type="date" placeholder="Select due date" id="tgl_ditutup" name="tgl_ditutup">
              </div>
              <div class="mb-4 col-12">
                <label class="form-label" for="status">Status <span class="text-danger">*</span></label>
                <select class="form-select" name="status" id="status">
                  <option value="dibuka">Opened</option>
                  <option value="ditutup">Closed</option>
                </select>
              </div>
              <div class="mb-4 col-12">
                <label class="form-label" for="harga_awal">Price <span class="text-danger">*</span> </label>
                <input type="number" id="harga_awal" name="harga_awal" class="form-control" placeholder="Enter product price" required="">
              </div>
            </div>
          </div>
        </div>
        <div class="mt-4 d-flex justify-content-end">
          <a href="#!" class="btn btn-primary me-2">Create</a>
          <a href="#!" class="btn btn-dark">Save as Draft</a>
        </div>
      </div>
      <div class="col-xl-4">
        <div class="card mb-5">
          <div class="card-header py-3 bg-white">
            <h4 class="mb-0 mt-2">Members</h4>
          </div>
          <div class="card-body">
            <h5></h5>
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