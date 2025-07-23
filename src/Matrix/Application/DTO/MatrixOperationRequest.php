<?php

namespace App\Matrix\Application\DTO;

use Exception;

class MatrixOperationRequest
{
    public function __construct(
        public array $matrix
    ){}

    public function isValid():void
    {
        if(!is_array(value: $this?->matrix[0]) || count(value: $this?->matrix[0]) < 2) {
            throw new Exception("Матрица не валидна");
        }
    }
}