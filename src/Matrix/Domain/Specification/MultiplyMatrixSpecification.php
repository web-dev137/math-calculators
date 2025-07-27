<?php

declare(strict_types=1);

namespace App\Matrix\Domain\Specification;

use App\Matrix\Domain\Entity\Matrix;
use Exception;

class MultiplyMatrixSpecification
{
    public function satisfy(Matrix $A, Matrix $B)
    {
        if($A->getNumRows() === $B->getNumColumns()) {
            throw new Exception(message: "Количество строк матрицы A должно соответствовать количеству столбцов матрицы B");
        }
    }
}