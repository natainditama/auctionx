<?php 

namespace NataInditama\Auctionx\App;

interface Middleware{
  public function before(): void;
}