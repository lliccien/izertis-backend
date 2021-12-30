<?php

namespace App\Controller;


use App\Service\OperationService;

use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use UnhandledMatchError;


/**
 * Class ApiOperationsGetController
 * @package App\Controller
 *
 */
final class ApiOperationsGetController extends AbstractController
{

    private OperationService $operationService;
    private LoggerInterface $logger;

    public function __construct(OperationService $operationService, LoggerInterface $logger)
    {
        $this->operationService = $operationService;
        $this->logger = $logger;
    }

    /**
     * @route(
     *     "/{operation}/{operatorA}/{operatorB}",
     *      name="operation_result",
     *      methods={"GET"},
     *      requirements={"operation": "[a-z]+", "operatorA": "\d+", "operatorB": "\d+" })
     */
    public function __invoke(Request $request, $operation, $operatorA, $operatorB): JsonResponse
    {
        try {
            $result = $this->operationService->getResult($operation, $operatorA, $operatorB);
            $this->logger->info(sprintf('The operation %s between %d and %d equals %s', $operation, $operatorA, $operatorB, $result));

            return new JsonResponse(
                [
                    "result" => $result,
                ]
            );
        } catch (UnhandledMatchError $error) {

            return new JsonResponse(
                [
                    'error' => $error->getMessage(),
                ],
                404
            );
        }

    }


}
