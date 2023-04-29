<?php 

namespace NataInditama\Auctionx\Models;

use NataInditama\Auctionx\App\Database;

class LevelPetugas extends Database
{
  var int $id_level;
  var string $level;

  public function findByIdLevel(int $levelId): ?array
  {
    $query = "SELECT `id_level`, `level` FROM `tb_level` WHERE `id_level` = ?";

    $statement = $this->mysqli->prepare($query);
    $statement->bind_param("i", $levelId);
    $statement->execute();

    $result = $statement->get_result();
    return $result->fetch_assoc();
  }

  public function findByLevel(string $level): ?array
  { 
    $query = "SELECT `id_level`, `level` FROM `tb_level` WHERE `level`=?";

    $statement = $this->mysqli->prepare($query);
    $statement->bind_param("s", $level);
    $statement->execute();

    $result = $statement->get_result();
    return $result->fetch_assoc();

  }

}