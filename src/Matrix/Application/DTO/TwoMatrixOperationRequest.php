<?php

namespace App\Matrix\Application\DTO;

use Exception;

class TwoMatrixOperationRequest
{
    public function __construct(
        public array $matrixA,
        public array $matrixB
    ){}

    public function isValid():void
    {
        if(!is_array($this->matrixA[0]) || count($this->matrixA[0]) < 2) {
            throw new Exception("Матрица A не валидна");
        }

         if(!is_array($this->matrixB[0]) || count($this->matrixB[0]) < 2) {
            throw new Exception("Матрица B не валидна");
        }
    }
}