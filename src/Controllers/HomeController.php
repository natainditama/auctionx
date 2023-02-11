<?php 

namespace NataInditama\Auctionx\Controllers;

use NataInditama\Auctionx\App\View;
use NataInditama\Auctionx\Models\Barang;

class HomeController
{
  public Barang $product;

  public function __construct()
  {
    $this->product = new Barang();
  }

  public function index(): void
  {
    View::render("home/index");
  }
  
  public function detail(string $id): void
  {
    var_dump($this->product->findById($id));
    View::render("home/index", [
      "title" => $id
    ]);
  }

  public function admin(): void
  {
    var_dump("admin");
  }

  public function login(): void
  {
    var_dump("login");
  }
}