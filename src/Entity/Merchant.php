<?php

namespace App\Entity;

use App\Entity\User;
use App\Repository\MerchantRepository;

#[ORM\Entity(repositoryClass: MerchantRepository::class)]
class Merchant extends User
{
    #[ORM\Column(length: 11)]
    private string $cnpj;

    public function getCnpj(): string
    {
        return $this->cnpj;
    }

    public function setCnpj(string $cnpj): void
    {
        $this->cnpj = $cnpj;
    }
}
