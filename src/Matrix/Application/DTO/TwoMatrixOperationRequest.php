<?php

namespace App\Matrix\Application\DTO;

use Exception;

class TwoMatrixOperationRequest
{
    public function __construct(
        public array $matrixA,
        public array $matrixB
    ){}
}