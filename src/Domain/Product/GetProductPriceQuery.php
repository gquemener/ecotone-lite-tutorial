<?php

namespace App\Domain\Product;

class GetProductPriceQuery
{
  public function __construct(private int $productId)
  {
  }

  public function getProductId() : int
  {
    return $this->productId;
  }
}
