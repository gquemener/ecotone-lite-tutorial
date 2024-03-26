<?php

namespace App;

use App\Domain\Product\GetProductPriceQuery;
use App\Domain\Product\RegisterProductCommand;
use Ecotone\Modelling\CommandBus;
use Ecotone\Modelling\QueryBus;

class EcotoneQuickstart
{
  public function __construct(
    private CommandBus $commandBus,
    private QueryBus $queryBus,
  ) { }

  public function run() : void
  {
    $this->commandBus->send(new RegisterProductCommand(1, 150));

    echo $this->queryBus->send(new GetProductPriceQuery(1));
  }
}
