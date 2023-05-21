<?php

namespace NataInditama\Auctionx\Models;

use Exception;
use mysqli_stmt;
use NataInditama\Auctionx\App\Database;

class Barang extends Database
{
  var int $id_barang;
  var string $nama_barang;
  var string $tgl;
  var int $harga_awal;
  var string $deskripsi_barang;

  public function findByBarangId(int $id): ?array
  {
    $query = "SELECT `id_barang`, `nama_barang`, `tgl`, `harga_awal`, `deskripsi_barang` FROM `tb_barang` WHERE `id_barang` = ?";

    $statement = $this->mysqli->prepare($query);
    $statement->bind_param("i", $id);
    $statement->execute();

    $result = $statement->get_result();
    return $result->fetch_assoc();
  }

  public function findAll(): ?array
  {
    $query = "SELECT `id_barang`, `nama_barang`, `tgl`, `harga_awal`, `deskripsi_barang` FROM `tb_barang`";

    $statement = $this->mysqli->prepare($query);
    $statement->execute();

    $result = $statement->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
  }

  public function save(Barang $request): mysqli_stmt|bool
  {
    $query = "INSERT INTO `tb_barang`(`nama_barang`, `tgl`, `harga_awal`, `deskripsi_barang`) VALUES (?,?,?,?)";

    $statement = $this->mysqli->prepare($query);
    $statement->bind_param("ssis", $request->nama_barang, $request->tgl, $request->harga_awal, $request->deskripsi_barang);
    $statement->execute();

    return $statement;
  }

  public function deleteByBarangId(string $barangId): void
  {
    $query = "DELETE FROM `tb_barang` WHERE `id_barang` = ?";

    $data = $this->findByBarangId($barangId);
    if (is_null($data)) throw new Exception("Data could not be found");

    $statement = $this->mysqli->prepare($query);
    $statement->bind_param('s', $barangId);
    $statement->execute();
  }

  public function updateByBarangId(Barang $data): void
  {
    $query = "UPDATE `tb_barang` SET `nama_barang`=?,`tgl`=?,`harga_awal`=?,`deskripsi_barang`=? WHERE `id_barang` = ?";

    $statement = $this->mysqli->prepare($query);
    $statement->bind_param("ssiss", $data->nama_barang, $data->tgl, $data->harga_awal, $data->deskripsi_barang, $data->id_barang);
    $statement->execute();
  }
}
