<?php 

namespace NataInditama\Auctionx\Models;

use NataInditama\Auctionx\App\Database;

class Barang extends Database
{
  var $id;
  var $name;

  public function findById(string $id): ?Barang
  {
    $query = "SELECT `id_barang` AS 'id', `nama` AS 'name' FROM `tbl_barang` WHERE `id_barang` = ?";
    
    $statement = $this->mysqli->prepare($query);
    $statement->bind_param("s", $id);
    $statement->execute();

    $result = $statement->get_result();
    if ($result) {
      return $result->fetch_object(Barang::class);
    }
    return null;
  }
}