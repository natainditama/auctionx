<div class="container d-flex flex-column">
  <div class="row align-items-center justify-content-center g-0 my-8">
    <div class="col-12 col-md-8 col-lg-6 col-xxl-4 py-8 py-xl-0">
      <div class="card smooth-shadow-md">
        <div class="card-body p-6">
          <div class="mb-4">
            <a href="./">
              <h1 class="text-primary fw-bold"><?= SITE_NAME ?></h1>
            </a>
            <p class="mb-6">Register to premium account</p>
          </div>
          <form method="POST" action="./register">
            <input type="hidden" name="level" value="admin">
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
            <div class="mb-5">
              <label for="password" class="form-label">Password</label>
              <input type="password" id="password" class="form-control" name="password" placeholder="Enter your password" required="" />
            </div>
            <div>
              <div class="d-grid">
                <button type="submit" name="submit" class="btn btn-primary">Create Premium Account</button>
              </div>
              <div class="d-md-flex justify-content-between mt-4">
                <div class="mb-2 mb-md-0">
                  Already have an account? <a href="./login" class="fs-5">Login </a>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>