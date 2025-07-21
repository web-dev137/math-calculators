<?php

declare(strict_types=1);

namespace App\Matrix\Application\Service\MatrixMultiply;

use App\Common\Query\QueryHandlerInterface;
use App\Matrix\Domain\Service\MatrixOperationsService;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
class MatrixMultiplyQueryHandler implements QueryHandlerInterface
{
    public function __construct(
        private MatrixOperationsService $matrixOperationsService
    ){}

    public function __invoke(MatrixMultiplyQuery $query): array
    {
        return $this->matrixOperationsService->multiply($query->matrixA,$query->matrixB);
    }
}