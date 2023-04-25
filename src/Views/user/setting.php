<div class="container mt-6">
  <div class="row mb-8">
    <div class="col-12">
      <!-- card -->
      <div class="card">
        <!-- card body -->
        <div class="card-body">
          <div class="mb-6">
            <h3 class="mb-1">General Settings</h3>
            <p class="mb-0 fs-5 text-muted">Profile configuration settings</p>
          </div>
          <div>
            <!-- border -->
            <div class="mb-6">
              <h4 class="mb-1">Basic information</h4>
            </div>
            <form>
              <!-- row -->

              <div class="mb-3 row">
                <label for="fullName" class="col-sm-4 col-form-label form-label">Full name</label>
                <div class="col-md-8 col-12">
                  <input type="text" class="form-control" placeholder="Full name" id="name" name="name" required="" />
                </div>
              </div>

              <!-- row -->
              <div class="mb-3 row">
                <label for="email" class="col-sm-4 col-form-label form-label">Email</label>
                <div class="col-md-8 col-12">
                  <input type="email" class="form-control" placeholder="Email" id="email" required="" />
                </div>
              </div>
              <!-- row -->
              <div class="mb-3 row">
                <label for="phone" class="col-sm-4 col-form-label form-label">Phone <span class="text-muted">(Optional)</span></label>
                <div class="col-md-8 col-12">
                  <input type="text" class="form-control" placeholder="Phone" id="phone" required="" />
                </div>
              </div>
              <!-- row -->
              <div class="mb-3 row">
                <label for="location" class="col-sm-4 col-form-label form-label">Location</label>

                <div class="col-md-8 col-12">
                  <select class="form-select" id="location">
                    <option selected="">Select Country</option>
                    <option value="1">India</option>
                    <option value="2">UK</option>
                    <option value="3">USA</option>
                  </select>
                </div>
              </div>
              <!-- row -->
              <div class="mb-3 row">
                <label for="addressLine" class="col-sm-4 col-form-label form-label">Address line 1</label>

                <div class="col-md-8 col-12">
                  <input type="text" class="form-control" placeholder="Placeholder" id="addressLine" required="" />
                </div>
              </div>
              <!-- row -->
              <div class="mb-3 row">
                <label for="addressLineTwo" class="col-sm-4 col-form-label form-label">Address line 2</label>
                <div class="col-md-8 col-12">
                  <input type="text" class="form-control" placeholder="Placeholder" id="addressLineTwo" required="" />
                </div>
              </div>
              <!-- row -->
              <div class="row align-items-center">
                <label for="zipcode" class="col-sm-4 col-form-label form-label">Zip code
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-info me-2 icon-xs">
                    <circle cx="12" cy="12" r="10"></circle>
                    <line x1="12" y1="16" x2="12" y2="12"></line>
                    <line x1="12" y1="8" x2="12.01" y2="8"></line>
                  </svg></label>

                <div class="col-md-8 col-12">
                  <input type="text" class="form-control" placeholder="Placeholder" id="zipcode" required="" />
                </div>
                <div class="offset-md-4 col-md-8 mt-4">
                  <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row mb-8">
    <div class="col-12">
      <!-- card -->
      <div class="card" id="edit">
        <!-- card body -->
        <div class="card-body">
          <div class="mb-6">
            <h3 class="mb-1">Email Setting</h3>
            <p class="mb-0 fs-5 text-muted">Add an email settings to profile</p>
          </div>
          <form>
            <!-- row -->
            <div class="mb-3 row">
              <!-- label -->
              <label for="newEmailAddress" class="col-sm-4 col-form-label form-label">New email</label>
              <div class="col-md-8 col-12">
                <!-- input -->
                <input type="email" class="form-control" placeholder="Enter your email address" id="newEmailAddress" required="" />
              </div>
              <!-- button -->
              <div class="offset-md-4 col-md-8 col-12 mt-3">
                <button type="submit" class="btn btn-primary">Save Changes</button>
              </div>
            </div>
          </form>

          <div class="mb-6 mt-6">
            <h4 class="mb-1">Change your password</h4>
          </div>
          <form>
            <!-- row -->
            <div class="mb-3 row">
              <label for="currentPassword" class="col-sm-4 col-form-label form-label">Current password</label>

              <div class="col-md-8 col-12">
                <input type="password" class="form-control" placeholder="Enter Current password" id="currentPassword" required="" />
              </div>
            </div>
            <!-- row -->
            <div class="mb-3 row">
              <label for="currentNewPassword" class="col-sm-4 col-form-label form-label">New password</label>

              <div class="col-md-8 col-12">
                <input type="password" class="form-control" placeholder="Enter New password" id="currentNewPassword" required="" />
              </div>
            </div>
            <!-- row -->
            <div class="row align-items-center">
              <label for="confirmNewpassword" class="col-sm-4 col-form-label form-label">Confirm new password</label>
              <div class="col-md-8 col-12 mb-2 mb-lg-0">
                <input type="password" class="form-control" placeholder="Confirm new password" id="confirmNewpassword" required="" />
              </div>
              <!-- list -->
              <div class="offset-md-4 col-md-8 col-12 mt-4">
                <h6 class="mb-1">Password requirements:</h6>
                <p>Ensure that these requirements are met:</p>
                <ul>
                  <li>Minimum 8 characters long the more, the better</li>
                  <li>At least one lowercase character</li>
                  <li>At least one uppercase character</li>
                  <li>At least one number, symbol, or whitespace character</li>
                </ul>
                <button type="submit" class="btn btn-primary">Save Changes</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>