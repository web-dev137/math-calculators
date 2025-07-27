<?php

namespace App\Matrix\Domain\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Exception;

class Matrix
{
   private array $matrix;
   private int $numColumns;
   private int $numRows;

   public function __construct(array $matrix)
   {
        $this->setMatrix(matrix: $matrix);
        $this->numColumns = count(value: $this->matrix[0]);
        $this->numRows = count(value: $matrix);
   }

   public function setMatrix(array $matrix)
   {
        if(!is_array(value: $matrix[0]) || count(value: $matrix[0]) < 2) {
            throw new Exception("Матрица не валидна");
        }

        $this->matrix = $matrix;
   }

   public function getNumColumns(): int
   {
        return $this->numColumns;
   }

   public function getNumRows(): int
   {
        return $this->numRows;
   }

   public function getMatrix(): array
   {
        return $this->matrix;
   }

   public function getColumn($col): array
   {
        return array_column(array: $this->matrix,column_key: $col);
   }

   public  function isSquare():bool
   {
        return $this->numRows == $this->numColumns;
   }
}