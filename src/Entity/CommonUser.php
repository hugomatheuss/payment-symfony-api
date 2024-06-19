<?php

namespace App\Entity;

use App\Repository\CommonUserRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CommonUserRepository::class)]
class CommonUser extends User
{
    #[ORM\Column(length: 14)]
    private string $cpf;

    public function getCpf(): string
    {
        return $this->cpf;
    }

    public function setCpf(string $cpf): static
    {
        $this->cpf = $cpf;

        return $this;
    }
}
