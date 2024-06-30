<?php

namespace App\Controller;

use App\Service\TransactionService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

class TransactionController extends AbstractController
{

    public function __construct(private readonly TransactionService $transferService)
    {
    }

    #[Route('/api/transfer', name: 'app_transaction')]
    public function transferMoney(Request $request)
    {
        try {
            $params = json_decode($request->getContent(), false);

            $this->transferService->validateTransaction($params);

            /*return new JsonResponse([

            ]);*/
        } catch (\Exception $e) {
            ;
        }
    }
}
