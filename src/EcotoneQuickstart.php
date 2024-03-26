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
    $cmd = new RegisterProductCommand(1, 150);
    xdebug_break();
    $this->commandBus->send($cmd);

    echo $this->queryBus->send(new GetProductPriceQuery(1));
  }
}
