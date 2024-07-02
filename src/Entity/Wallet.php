<?php

namespace App\Entity;

/**
 * @ORM\Entity(repositoryClass="Repository/WalletRepository")
 * @ORM\Table(name="wallet")
 */
class Wallet
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity="User", repositoryClass="Repository/WalletRepository", inversedBy="wallet")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id", nullable=false)
     */
    private $user;

    /**
     * @ORM\Column(type="float")
     */
    private $balance;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user): void
    {
        $this->user = $user;
    }

    /**
     * @return mixed
     */
    public function getBalance()
    {
        return $this->balance;
    }

    /**
     * @param mixed $balance
     */
    public function setBalance($balance): void
    {
        $this->balance = $balance;
    }
}
