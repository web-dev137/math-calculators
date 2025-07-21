<?php

namespace App\Matrix\Presintation\Controller;

use App\Common\Query\QueryBusInterface;
use App\Matrix\Application\DTO\MatrixOperationRequest;
use App\Matrix\Application\DTO\TwoMatrixOperationRequest;
use App\Matrix\Application\Service\MatrixMultiply\MatrixMultiplyQuery;
use App\Matrix\Domain\Factory\MatrixFactory;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\HttpKernel\Attribute\AsController;

use Symfony\Component\HttpKernel\Attribute\MapRequestPayload;
use Symfony\Component\Routing\Attribute\Route;

#[AsController]
#[Route('/api/matrix',defaults: ['_format' => 'json'])]
class MatrixController extends AbstractController
{

    public function __construct(
        private SerializerInterface $serializer,
        private QueryBusInterface $queryBus,
        private MatrixFactory $factory
    ){}

    #[Route('/multiply',methods:['POST'])]
    public function getMatrix(#[MapRequestPayload] TwoMatrixOperationRequest $matrixRequest):JsonResponse
    {
       $matrixRequest->isValid();
       $matrixA = $this->factory->create(matrix: $matrixRequest->matrixA);
       $matrixB = $this->factory->create(matrix: $matrixRequest->matrixB);
       $command = new MatrixMultiplyQuery(matrixA: $matrixA,matrixB: $matrixB);
       $res = $this->queryBus->query(query: $command);
       $res = $this->serializer->serialize(data: $res,format: 'json');
       return JsonResponse::fromJsonString(data: $res);
    }
}