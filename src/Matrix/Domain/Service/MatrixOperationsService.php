<?php

declare(strict_types=1);

namespace App\Matrix\Domain\Service;

use App\Matrix\Domain\Entity\Matrix;
use App\Matrix\Domain\Factory\MatrixFactory;
use App\Matrix\Domain\Specification\MultiplyMatrixSpecification;

class MatrixOperationsService
{
    public function __construct(
        private MatrixFactory $factory,
        private MultiplyMatrixSpecification $specification
    ){}
    public function multiply(Matrix $matrixA, Matrix $matrixB): Matrix
    {
        $A = $matrixA->getMatrix();
        $B = $matrixB->getMatrix();
        $rows = $matrixA->getNumRows();
        $cols = $matrixA->getNumColumns();
        $this->specification->satisfy(A: $matrixA,B: $matrixB);
        for($i = 0; $i <= $rows-1; $i++) {
            for($j = 0; $j <= $cols-1; $j++) {
                $res[$i][$j] = 0;
                for($k = 0; $k <= $rows-1; $k++) {
                    $res[$i][$j] += $A[$i][$k] * $B[$k][$j];
                }
            }
        }
        return $this->factory->create(matrix: $res);
    }

    public function transponse(Matrix $A): Matrix
    {
        $At = [];
        $factory = new MatrixFactory();

        for($i = 0; $i <= $A->getNumRows()-1; $i++) {
            $At[$i] = $A->getColumn(col: $i);
        }

        return $factory->create(matrix: $At);
    }
}