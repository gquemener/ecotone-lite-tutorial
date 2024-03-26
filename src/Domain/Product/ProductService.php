<?php

namespace App\Domain\Product;

use Ecotone\Modelling\Attribute\CommandHandler;
use Ecotone\Modelling\Attribute\QueryHandler;

class ProductService
{
  private array $registeredProducts = [];

  #[CommandHandler]
  public function register(RegisterProductCommand $command): void {
    $this->registeredProducts[$command->getProductId()] = $command->getCost();
  }

    #[QueryHandler] 
    public function getPrice(GetProductPriceQuery $query) : int
    {
        return $this->registeredProducts[$query->getProductId()];
    }
}
