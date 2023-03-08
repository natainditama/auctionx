<?php 

namespace NataInditama\Auctionx\Models;

use NataInditama\Auctionx\App\Database;

class HistoryLelang extends Database
{
  var int $id_history;
  var int $id_lelang;
  var int $id_barang;
  var int $id_user;
  var int $penawaran_harga;

  public function findByBarangId(string $barangId): ?Barang
  {
    $query = "SELECT `id_history`, `id_lelang`, `id_barang`, `id_user`, `penawaran_harga` FROM `history_lelang` WHERE `id_barang` = ?";
    
    $statement = $this->mysqli->prepare($query);
    $statement->bind_param("s", $barangId);
    $statement->execute();

    $result = $statement->get_result();
    return $result->fetch_object(Barang::class);
  }
  
  public function save(HistoryLelang $request): void
  {
    $query = "INSERT INTO `history_lelang`(`id_history`, `id_lelang`, `id_barang`, `id_user`, `penawaran_harga`) VALUES ('',?,?,?,?)";

    $statement = $this->mysqli->prepare($query);
    $statement->bind_param("iiii", $request->id_lelang, $request->id_barang, $request->id_user, $request->penawaran_harga);
    $statement->execute();
  }

  public function findAllByLelangId(string $lelangId): ?array
  {
    // $query = "SELECT `id_history`, `id_lelang`, `id_barang`, `history_lelang`.`id_user`, `penawaran_harga`, `nama_lengkap`, `username` FROM `history_lelang` JOIN `tb_masyarakat` ON `history_lelang`.`id_user` = `tb_masyarakat`.`id_user` WHERE `id_lelang` = ? GROUP BY `tb_masyarakat`.`id_user` ORDER BY `penawaran_harga` DESC;";
    $query = "SELECT DISTINCT p1.*, p2.*, `tb_masyarakat`.* FROM `history_lelang` p1 INNER JOIN( SELECT DISTINCT `id_user`, MAX(`penawaran_harga`) harga FROM `history_lelang` WHERE `id_lelang` = ? GROUP BY `id_user` ORDER BY `penawaran_harga` DESC ) p2 ON `p1`.`id_user` = p2.`id_user` INNER JOIN `tb_masyarakat` ON p1.id_user = `tb_masyarakat`.`id_user` WHERE p1.`id_lelang` = ? AND `p1`.`penawaran_harga` = p2.harga ORDER BY `p1`.`penawaran_harga` DESC";

    $statement = $this->mysqli->prepare($query);
    $statement->bind_param("ss", $lelangId, $lelangId);
    $statement->execute();

    $result = $statement->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
  }

  public function findAllByUserId(string $userId): ?array
  {
    $query = "SELECT `id_history`, `id_lelang`, `id_barang`, `id_user`, `penawaran_harga` FROM `history_lelang` WHERE `id_user` = ?";

    $statement = $this->mysqli->prepare($query);
    $statement->bind_param("s", $userId);
    $statement->execute();

    $result = $statement->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
  }
}
