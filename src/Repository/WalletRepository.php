<?php

namespace App\Repository;

use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class WalletRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, User::class);
    }

    public function hasBalance(string $userId): bool
    {
        $query = <<<QUERY
                SELECT w.balance
                FROM wallet w
                JOIN user u ON u.id = w.user_id
                WHERE w.user_id = ?
                AND w.balance > 0;
        QUERY;

        return $this->getEntityManager()
            ->getConnection()
            ->executeQuery($query, $userId)
            ->fetchAssociative();
    }
}
