<?php

declare(strict_types=1);

namespace App\Matrix\Domain\Factory;

use App\Matrix\Domain\Entity\Matrix;

class MatrixFactory
{
    public function create($matrix = []): Matrix
    {
        $matrixEntity = new Matrix(matrix: $matrix);
        return $matrixEntity;
    }
}