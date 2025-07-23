<?php

declare(strict_types=1);

namespace App\Matrix\Application\Service\MatrixMultiply;

use App\Common\Query\QueryInterface;
use App\Matrix\Domain\Entity\Matrix;

class MatrixMultiplyQuery implements QueryInterface
{
    public function __construct(
        public Matrix $matrixA, 
        public Matrix $matrixB
    ){}
}