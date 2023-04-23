<?php

namespace NataInditama\Auctionx\App;

class View
{
  public static function render(string $view, array $model = []): void
  {
    require_once __DIR__ . "/../Views/components/header.php";
    require_once __DIR__ . "/../Views/$view.php";
    require_once __DIR__ . "/../Views/components/footer.php";
  }

  public static function renderFile(string $view, array $model = []): void
  {
    require_once __DIR__ . "/../Views/$view.php";
  }

  public static function redirect(string $path): void
  {
    header("Location: " . SITE_BASE_URL .  "$path");
    exit();
  }
}
