<?php

use NataInditama\Auctionx\App\Auth;

if (Auth::getSession()) : ?>
  </main>
  </div>
<?php endif; ?>

<footer class="footer bg-gray-900 py-8">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12 text-center">
        <h2><a href="#" class="m-0 text-primary fw-bold"><?= SITE_NAME; ?></a></h2>
        <div class="d-flex gap-3 justify-content-center align-items-center my-4">
          <a class="text-light" href="./">Home</a>
          <a class="text-light" href="./">About</a>
          <a class="text-light" href="./">News</a>
          <a class="text-light" target="_blank" href="http://github.com/natainditama/auctionx">Contact</a>
        </div>
        <div class="ftco-footer-social p-0">
          <li class="ftco-animate"><a href="#" class="border text-white" data-toggle="tooltip" data-placement="top" title="Twitter"><i data-feather="twitter" class="icon-xs"></i></a></li>
          <li class="ftco-animate"><a href="#" class="border text-white" data-toggle="tooltip" data-placement="top" title="Facebook"><span data-feather="facebook" class="icon-xs"></span></a></li>
          <li class="ftco-animate"><a href="#" class="border text-white" data-toggle="tooltip" data-placement="top" title="Instagram"><span data-feather="instagram" class="icon-xs"></span></a></li>
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
  </div>
</footer>

<!-- Libs JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
<script defer src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0-alpha1/js/bootstrap.bundle.min.js"></script>
<script defer src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-slimScroll/1.3.8/jquery.slimscroll.min.js"></script>
<script defer src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.29.0/feather.min.js"></script>
<script defer src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/prism.min.js"></script>
<!-- <script defer src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.37.2/apexcharts.min.js"></script> -->
<!-- <script defer src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.js"></script> -->
<script defer src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/plugins/toolbar/prism-toolbar.min.js"></script>
<script defer src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/plugins/copy-to-clipboard/prism-copy-to-clipboard.min.js"></script>
<script defer src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.18/js/jquery.dataTables.min.js"></script>
<script defer src="https://cdnjs.cloudflare.com/ajax/libs/datatables.net-bs5/1.13.4/dataTables.bootstrap5.min.js"></script>
<script defer src="https://cdnjs.cloudflare.com/ajax/libs/datatables.net-responsive/2.4.1/dataTables.responsive.min.js"></script>
<script defer src="https://dashui.codescandy.com/dashuipro/assets/js/vendors/datatable.js"></script>
<script defer src="./assets/js/theme.min.js"></script>
<script defer>
  ! function(t) {
    t.fn.simpleMoneyFormat = function() {
      function e(e, n, l) {
        for (var a = "", i = l.split(""), p = [], u = 0, r = "", o = i.length - 1; o >= 0; o--) r += i[o], 3 == ++u && (p.push(r), u = 0, r = "");
        u > 0 && p.push(r);
        for (o = p.length - 1; o >= 0; o--) {
          for (var c = p[o].split(""), f = c.length - 1; f >= 0; f--) a += c[f];
          o > 0 && (a += ",")
        }
        "input" == n ? t(e).val(a) : t(e).empty().text(a)
      }
      this.each((function(n, l) {
        var a = null,
          i = null;
        t(l).is("input") || t(l).is("textarea") ? (i = t(l).val().replace(/,/g, ""), a = "input") : (i = t(l).text().replace(/,/g, ""), a = "other"), t(l).on("paste keyup", (function() {
          i = t(l).val().replace(/,/g, ""), e(l, a, i)
        })), e(l, a, i)
      }))
    }
  }(jQuery);
</script>

<script defer>
  function countdown(t, e, o = {
    days: !0,
    hours: !0,
    minutes: !0,
    seconds: !0,
    full: !1
  }) {
    var a = new Date(t).getTime(),
      n = setInterval((function() {
        var t = (new Date).getTime(),
          s = a - t,
          m = Math.floor(s / 864e5),
          i = Math.floor(s % 864e5 / 36e5),
          r = Math.floor(s % 36e5 / 6e4),
          l = Math.floor(s % 6e4 / 1e3);
        o.full ? e.html(`${m}:${i}:${r}:${l}`) : e.html(`${o.days?m+" days":""} ${o.hours?i+" hours":""} ${o.minutes?r+" minutes":""} ${o.seconds?l+" seconds":""}`), s < 0 && (clearInterval(n), o.full ? e.html(`${m}:${i}:${r}:${l}`) : e.html(`${o.days?"0 days":""} ${o.hours?"0 hours":""} ${o.minutes?"0 minutes":""} ${o.seconds?"0 seconds":""}`))
      }), 1e3)
  }

  function getRandomInt(t, e) {
    return t = Math.ceil(t), e = Math.floor(e), Math.floor(Math.random() * (e - t + 1)) + t
  }
  $(document).ready((function() {
    $(".money").simpleMoneyFormat(), $(".money").attr("autocomplete", "off"), $(".countdown").toArray().map((function(t) {
      const e = $(t).data("datetime"),
        o = $(t).data("datetime-format");
      countdown(e, $(t), o), console.log(t)
    })), $.ajax({
      url: "./data/images.json"
    }).done((function(t) {
      $(".car-thumb").each((function() {
        const e = $(this).data("angle"),
          o = getRandomInt(0, t.length - 1),
          a = getRandomInt(0, t[o].model.length - 1),
          n = `https://cdn.imagin.studio/getImage?angle=${e}&billingTag=web&customer=carwow&make=${t[o].make}&modelFamily=${t[o].model[a]}&tailoring=carwow&width=800&zoomLevel=0&zoomType=fullscreen`;
        $(this).attr("src", n), $(this).attr("srcSet", n)
      }))
    })).fail((function() {
      $(".car-thumb").each((function() {
        $(this).attr("src", "https://cdn.imagin.studio/getImage"), $(this).attr("srcSet", "https://cdn.imagin.studio/getImage")
      }))
    }))
  }));
</script>
</body>

</html>