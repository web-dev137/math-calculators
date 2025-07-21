<?php

declare(strict_types=1);

namespace App\Common\Query;

interface QueryBusInterface 
{
    public function query($query):mixed;
}