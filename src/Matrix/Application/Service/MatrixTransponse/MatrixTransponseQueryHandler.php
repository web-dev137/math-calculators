<?php

declare(strict_types=1);

namespace App\Matrix\Application\Service\MatrixTransponse;

use App\Common\Query\QueryHandlerInterface;
use App\Matrix\Domain\Entity\Matrix;
use App\Matrix\Domain\Service\MatrixOperationsService;

class MatrixTransponseQueryHandler implements QueryHandlerInterface
{
    public function __construct(
        private MatrixOperationsService $matrixOperationsService
    ){}

    public function __invoke(MatrixTransponseQuery $matrixTransponseQuery): array
    {
        return $this->matrixOperationsService
            ->transponse(A: $matrixTransponseQuery->matrix)
            ->getMatrix();
    }
}