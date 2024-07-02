<?php

namespace App\Service;

use App\Entity\User;
use App\Enum\UserTypeEnum;
use App\Repository\UserRepository;

class TransactionService
{
    public function __construct(
        private readonly UserRepository $userRepository,
        private readonly WalletService $walletService,
    )
    {
    }

    public function validateTransaction($params)
    {
        $value = $params->value;
        $payeeId = $params->payee;
        $payerId = $params->payer;

        /** @var User $user */
        $user = $this->userRepository->findBy(['id' => $payeeId]);

        if (!$this->validateUserCanTransfer($user)) {
            throw new \Exception('User cannot do this transaction!');
        }

        if (!$this->validateUserWallet($user)) {
            throw new \Exception('Invalid balance for this operation!');
        }
    }

    protected function validateUserWallet(User $user): bool
    {
        return $this->walletService->checkBalance($user);
    }

    protected function validateUserCanTransfer(User $user): bool
    {
        return $user->getUserType() === UserTypeEnum::COMMON;
    }
}
