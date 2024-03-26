<?php

namespace App\Domain\Product;

class RegisterProductCommand
{
  public function __construct(
    private int $productId,
    private int $cost
  ) { }

  public function getProductId() : int
  {
    return $this->productId;
  }

  public function getCost() : int
  {
    return $this->cost;
  }
}
