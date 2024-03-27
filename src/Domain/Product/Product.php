<?php

namespace App\Domain\Product;

use Ecotone\Modelling\Attribute\Aggregate;
use Ecotone\Modelling\Attribute\Identifier;
use Ecotone\Modelling\Attribute\CommandHandler;
use Ecotone\Modelling\Attribute\QueryHandler;
use Ecotone\Modelling\WithEvents;

#[Aggregate]
class Product
{
    use WithEvents;

    #[Identifier]
    private int $productId;

    private int $cost;

    private function __construct(int $productId, int $cost)
    {
        $this->productId = $productId;
        $this->cost = $cost;

        $this->recordThat(new ProductWasRegisteredEvent($productId));
    }

    #[CommandHandler]
    public static function register(RegisterProductCommand $command) : self
    {
        return new self($command->getProductId(), $command->getCost());
    }

    #[QueryHandler]
    public function getCost(GetProductPriceQuery $query) : int
    {
        return $this->cost;
    }
}
