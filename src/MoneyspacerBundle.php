<?php

namespace Symfony\UX\Moneyspacer;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class MoneyspacerBundle extends Bundle
{

    public function getPath(): string
    {
        return \dirname(__DIR__);
    }

}