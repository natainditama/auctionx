<?php

namespace NataInditama\Auctionx\Controllers;

use Exception;
use NataInditama\Auctionx\App\Auth;
use NataInditama\Auctionx\App\View;
use NataInditama\Auctionx\Models\Barang;

class ProductController
{
  public ?array $session = null;
  public Barang $product;

  public function __construct()
  {
    $this->session = Auth::getSession();
    $this->product = new Barang();
  }

  public function index(): void
  {
    $products = $this->product->findAll();

    View::render("product/index", [
      'products' => $products,
      "auth" => $this->session,
      "showSidebar" => true
    ]);      
  }
  
  public function store(): void
  {
    try {
      $request = new Barang();
      $request->nama_barang = $_POST['name'];
      $request->tgl = $_POST['date'];
      $request->harga_awal = $_POST['price'];
      $request->deskripsi_barang = $_POST['desc'];
      $request->save($request);

      $products = $this->product->findAll();

      View::render("product/index", [
        'products' => $products,
        "auth" => $this->session,
        "showSidebar" => true
      ]);       
    } catch (Exception $error) {
      View::render("product/index", [
        'products' => $products,
        "auth" => $this->session,
        "showSidebar" => true,
        "alert" => [
          "type" => "error",
          "message" => $error->getMessage(),
        ]
      ]);             
    }
  }
  
  public function show(int $productId): void
  {
    try {
      View::render("product/show");
    } catch (Exception $error) {
      $products = $this->product->findAll();
      
      View::render("product/index", [
        'products' => $products,
        "auth" => $this->session,
        "showSidebar" => true,
        "alert" => [
          "type" => "error",
          "message" => $error->getMessage(),
        ]
      ]);             
    }
  }

  public function destroy(int $productId): void
  {
    try {
      $this->product->deleteByBarangId($productId);
      View::redirect('./');
    } catch (Exception $error) {
      $products = $this->product->findAll();
      View::render("product/index", [
        'products' => $products,
        "auth" => $this->session,
        "showSidebar" => true,
        "alert" => [
          "type" => "error",
          "message" => $error->getMessage(),
        ]
      ]);             
    }
  }

  public function update(int $productId): void
  {
    try {
      $request = new Barang();
      $request->id_barang = $_POST['id'];
      $request->nama_barang = $_POST['name'];
      $request->tgl = $_POST['date'];
      $request->harga_awal = $_POST['price'];
      $request->deskripsi_barang = $_POST['desc'];
      $request->updateByBarangId($request);

      $products = $this->product->findAll();

      View::render("product/index", [
        'products' => $products,
        "auth" => $this->session,
        "showSidebar" => true
      ]);
    } catch (Exception $error) {
      View::render("product/index", [
        'products' => $products,
        "auth" => $this->session,
        "showSidebar" => true,
        "alert" => [
          "type" => "error",
          "message" => $error->getMessage(),
        ]
      ]);
    }
  }
}