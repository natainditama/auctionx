<?php 

namespace NataInditama\Auctionx\App;

class Flasher {
  private static string $key = "flash-key";
  public static function setFlasher(string $type, string $message): void
  {
    $_SESSION[self::$key] = [
      "type" => $type,
      "message" => $message,
    ];
  }
  
  public static function flasher(): void
  {
    if (isset($_SESSION[self::$key])) {
      echo "<div class='fixed-top container mt-5' style='max-width: max-content;'><div class='alert alert-" . $_SESSION[self::$key]['type'] . " alert-dismissible fade show' role='alert'><span class='me-4'>". $_SESSION[self::$key]['message'] . "</span><button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div></div>";
      unset($_SESSION[self::$key]);
    }
  }


}
