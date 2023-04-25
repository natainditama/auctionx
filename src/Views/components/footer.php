<?php

use NataInditama\Auctionx\App\Auth;

 if (Auth::getSession()) : ?>
  </div>
  </div>
<?php endif; ?>

<footer class="footer bg-gray-900 py-8">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12 text-center">
        <h2><a href="#" class="m-0 text-primary fw-bold"><?= SITE_NAME; ?></a></h2>
        <div class="d-flex gap-3 justify-content-center align-items-center my-4">
          <a class="text-light" href="./">Home</a>
          <a class="text-light" href="./about">About</a>
          <a class="text-light" href="./blog">News</a>
          <a class="text-light" href="./contact">Contact</a>
        </div>
        <div class="ftco-footer-social p-0">
          <li class="ftco-animate"><a href="#" class="border text-white" data-toggle="tooltip" data-placement="top" title="Twitter"><i data-feather="twitter" class="icon-xs" ></i></a></li>
          <li class="ftco-animate"><a href="#" class="border text-white" data-toggle="tooltip" data-placement="top" title="Facebook"><span data-feather="facebook" class="icon-xs" ></span></a></li>
          <li class="ftco-animate"><a href="#" class="border text-white" data-toggle="tooltip" data-placement="top" title="Instagram"><span data-feather="instagram" class="icon-xs" ></span></a></li>
        </div>
      </div>
      <div class="row mt-5">
        <div class="col-md-12 text-center">
          <p class="copyright">
            Copyright &copy;<?= date("Y") ?> All rights reserved
          </p>
        </div>
      </div>
    </div>
</footer>
</body>

</html>