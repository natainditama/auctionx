<?php 

namespace NataInditama\Auctionx\Models;

use NataInditama\Auctionx\App\Database;

class LevelPetugas extends Database
{
  var int $id_level;
  var string $level;

  public function findByIdLevel(int $levelId): ?LevelPetugas
  {
    $query = "SELECT `id_level`, `level` FROM `tb_level` WHERE `id_level` = ?";

    $statement = $this->mysqli->prepare($query);
    $statement->bind_param("s", $levelId);
    $statement->execute();

    $result = $statement->get_result();
    return $result->fetch_object(LevelPetugas::class);
  }

  

}