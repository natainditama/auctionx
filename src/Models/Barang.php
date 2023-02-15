<?php 

namespace NataInditama\Auctionx\Models;

use NataInditama\Auctionx\App\Database;

class Barang extends Database
{
  var $id_barang;
  var $nama_barang;
  var $tgl;
  var $harga_awal;
  var $deskripsi_barang;

  public function findById(string $id): ?Barang
  {
    $query = "SELECT `id_barang`, `nama_barang`, `tgl`, `harga_awal`, `deskripsi_barang` FROM `tb_barang` WHERE `id_barang` = ?";
    
    $statement = $this->mysqli->prepare($query);
    $statement->bind_param("s", $id);
    $statement->execute();

    $result = $statement->get_result();
    if ($result) {
      return $result->fetch_object(Barang::class);
    }
    return null;
  }
  
  public function findAll(): ?array
  {
    $query = "SELECT `id_barang`, `nama_barang`, `tgl`, `harga_awal`, `deskripsi_barang` FROM `tb_barang` WHERE 1";
    $result = $this->mysqli->query($query);
    if ($result->num_rows) {
      while ($row = $result->fetch_assoc()) {
        $array[] = $row;
      }
      return $array;
    }
    return null;
  }
}