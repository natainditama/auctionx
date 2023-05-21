<?php

namespace NataInditama\Auctionx\Models;

use Exception;
use mysqli_stmt;
use NataInditama\Auctionx\App\Database;

class Lelang extends Database
{
  var int $id_lelang;
  var int $id_barang;
  var string $tgl_dibuka;
  var string $tgl_ditutup;
  var int $harga_akhir;
  var ?int $id_user;
  var int $id_petugas;
  var string $status;

  public function findAll(): ?array
  {
    $query = "SELECT `id_lelang`, `tb_lelang`.`id_barang`, `tgl_dibuka`, `tgl_ditutup`, `harga_akhir`, `id_user`, `tb_lelang`.`id_petugas`, `status`, `nama_barang`, `harga_awal`, `deskripsi_barang`, `tb_petugas`.`nama_petugas`, `tb_petugas`.`username` FROM `tb_lelang` INNER JOIN `tb_barang` ON `tb_lelang`.`id_barang` = `tb_barang`.`id_barang` INNER JOIN `tb_petugas` ON `tb_lelang`.`id_petugas` = `tb_petugas`.`id_petugas` ORDER BY `id_lelang` DESC";
    $statement = $this->mysqli->prepare($query);
    $statement->execute();

    $result = $statement->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
  }

  public function findAllByStatus(string $status): ?array
  {
    $query = "SELECT `id_lelang`, `tb_lelang`.`id_barang`, `tgl_dibuka`, `tgl_ditutup`, `harga_akhir`, `id_user`, `tb_lelang`.`id_petugas`, `status`, `nama_barang`, `harga_awal`, `deskripsi_barang`, `tb_petugas`.`nama_petugas`, `tb_petugas`.`username` FROM `tb_lelang` INNER JOIN `tb_barang` ON `tb_lelang`.`id_barang` = `tb_barang`.`id_barang` INNER JOIN `tb_petugas` ON `tb_lelang`.`id_petugas` = `tb_petugas`.`id_petugas` WHERE `status` = ? AND `tgl_dibuka` <= NOW() AND `tgl_ditutup` >= NOW() ORDER BY `id_lelang` DESC";
    $statement = $this->mysqli->prepare($query);
    $statement->bind_param("s", $status);
    $statement->execute();

    $result = $statement->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
  }

  public function findAllByPetugasId(string $petugasId): ?array
  {
    $query = "SELECT `id_lelang`, `tb_lelang`.`id_barang`, `tgl_dibuka`, `tgl_ditutup`, `harga_akhir`, `id_user`, `tb_lelang`.`id_petugas`, `status`, `nama_barang`, `harga_awal`, `deskripsi_barang`, `tb_petugas`.`nama_petugas`, `tb_petugas`.`username` FROM `tb_lelang` INNER JOIN `tb_barang` ON `tb_lelang`.`id_barang` = `tb_barang`.`id_barang` INNER JOIN `tb_petugas` ON `tb_lelang`.`id_petugas` = `tb_petugas`.`id_petugas` WHERE `tb_lelang`.`id_petugas` = ? ORDER BY `id_lelang` DESC";
    $statement = $this->mysqli->prepare($query);
    $statement->bind_param("s", $petugasId);
    $statement->execute();

    $result = $statement->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
  }

  public function findByBarangId(string $barangId): ?array
  {
    $query = "SELECT `id_lelang`, `tb_lelang`.`id_barang`, `tgl_dibuka`, `tgl_ditutup`, `harga_akhir`, `id_user`, `tb_lelang`.`id_petugas`, `status`, `nama_barang`, `harga_awal`, `deskripsi_barang`, `tb_petugas`.`nama_petugas`, `tb_petugas`.`username` FROM `tb_lelang` INNER JOIN `tb_barang` ON `tb_lelang`.`id_barang` = `tb_barang`.`id_barang` INNER JOIN `tb_petugas` ON `tb_lelang`.`id_petugas` = `tb_petugas`.`id_petugas` WHERE `tb_lelang`.`id_barang` = ?";
    $statement = $this->mysqli->prepare($query);
    $statement->bind_param('s', $barangId);
    $statement->execute();

    $result = $statement->get_result();
    return $result->fetch_assoc();
  }

  public function save(Lelang $request): mysqli_stmt|bool
  {
    $query = "INSERT INTO `tb_lelang`(`id_barang`, `tgl_dibuka`, `tgl_ditutup`, `harga_akhir`, `id_user`, `id_petugas`, `status`) VALUES (?,?,?,?,?,?,?)";

    $statement = $this->mysqli->prepare($query);
    $statement->bind_param("issiiis", $request->id_barang, $request->tgl_dibuka, $request->tgl_ditutup, $request->harga_akhir, $request->id_user, $request->id_petugas, $request->status);
    $statement->execute();

    return $statement;
  }

  public function deleteByBarangId(string $barangId): void
  {
    $query = "DELETE FROM `tb_lelang` WHERE `id_barang` = ?";

    $data = $this->findByBarangId($barangId);
    if (is_null($data)) throw new Exception("Data could not be found");

    $statement = $this->mysqli->prepare($query);
    $statement->bind_param('s', $barangId);
    $statement->execute();
  }

  public function updateByBarangId(Lelang $data): void
  {
    $query = "UPDATE `tb_lelang` SET `tgl_dibuka`=?,`tgl_ditutup`=?,`status`=? WHERE `id_barang`=?";

    $statement = $this->mysqli->prepare($query);
    $statement->bind_param("sssi", $data->tgl_dibuka, $data->tgl_ditutup, $data->status, $data->id_barang);
    $statement->execute();
  }

  public function updateBidingHistoryByLelangId(HistoryLelang $data): void
  {
    $query = "UPDATE `tb_lelang` SET `harga_akhir`=?,`id_user`=? WHERE `id_lelang`=?";

    $statement = $this->mysqli->prepare($query);
    $statement->bind_param("iii", $data->penawaran_harga, $data->id_user, $data->id_lelang);
    $statement->execute();
  }
}
