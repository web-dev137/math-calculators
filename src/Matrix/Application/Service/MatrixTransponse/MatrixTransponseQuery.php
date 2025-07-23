<?php

declare(strict_types=1);

namespace App\Matrix\Application\Service\MatrixTransponse;

use App\Matrix\Domain\Entity\Matrix;

class MatrixTransponseQuery
{
    public function __construct(
        public Matrix $matrix
    ){}
}