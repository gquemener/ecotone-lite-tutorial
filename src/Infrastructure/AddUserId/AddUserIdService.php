<?php

namespace App\Infrastructure\AddUserId;

use Ecotone\Messaging\Attribute\Interceptor\Before;

class AddUserIdService
{
    #[Before(0, AddUserId::class, true)]
    public function add() : array
    {
        return ["userId" => 1];
    }
}