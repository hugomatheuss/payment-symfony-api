<?php

namespace App\Service;

use App\Entity\User;
use App\Repository\WalletRepository;

class WalletService
{
    public function __construct(
        private readonly WalletRepository $walletRepository
    )
    {
    }

    public function checkBalance(User $user): bool
    {
        return $this->walletRepository->hasBalance($user->getId());
    }
}
