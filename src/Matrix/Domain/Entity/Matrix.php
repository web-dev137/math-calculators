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
        $this->numColumns = count($this->matrix[0]);
        $this->numRows = $this->numColumns;
   }

   public function setMatrix(array $matrix)
   {
        if(!is_array(value: $matrix[0]) || count(value: $matrix[0]) < 2) {
            throw new Exception("Матрица A не валидна");
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
}