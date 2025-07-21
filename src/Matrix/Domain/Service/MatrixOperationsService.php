<?php

declare(strict_types=1);

namespace App\Matrix\Domain\Service;

use App\Matrix\Domain\Entity\Matrix;

class MatrixOperationsService
{
    public function multiply(Matrix $matrixA, Matrix $matrixB): array
    {
        $A = $matrixA->getMatrix();
        $B = $matrixB->getMatrix();
        $rows = $matrixA->getNumRows();
        $cols = $matrixA->getNumColumns();
        for($i = 0; $i <= $rows-1; $i++) {
            for($j = 0; $j <= $cols-1; $j++) {
                $res[$i][$j] = 0;
                for($k = 0; $k <= $rows-1; $k++) {
                    $res[$i][$j] += $A[$i][$k] * $B[$k][$j];
                }
            }
        }
        return $res;
    }
}