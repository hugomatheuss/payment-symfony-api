<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

class TransactionController extends AbstractController
{
    #[Route('/api/transfer', name: 'app_transaction')]
    public function transferMoney(Request $request)
    {
        try {
            $params = json_decode($request->getContent(), false);

            $value = $params->value;
            $payeeId = $params->payee;
            $payerId = $params->payer;

            return new JsonResponse([
                'value' => $value,
                'payerId' => $payerId,
                'payeeId' => $payeeId
            ]);
        } catch (\Exception $e) {
            ;
        }
    }
}
