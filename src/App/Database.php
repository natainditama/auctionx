<?php

namespace NataInditama\Auctionx\App;

use mysqli;

class Database
{
  private static ?mysqli $connection = null;
  protected ?mysqli $mysqli = null;

  public function __construct()
  {
    $this->mysqli = self::getConnection();
  }

  public static function getConnection(): ?mysqli
  {
    if (is_null(self::$connection)) {
      mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
      self::$connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
      if (self::$connection->connect_error) {
        die("Koneksi database  : " . self::$connection->connect_error);
      }
    }
    return self::$connection;
  }
}
