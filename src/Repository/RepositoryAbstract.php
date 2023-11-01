<?php

namespace Zuske\Adapter\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class RepositoryAbstract extends ServiceEntityRepository implements RepositoryInterface
{
    private ManagerRegistry $registry;

    public function __construct(ManagerRegistry $registry, string $entityClass)
    {
        parent::__construct($registry, $entityClass);
        $this->registry = $registry;
    }

    public function search(int $id): ?object
    {
        return $this->find($id);
    }

    public function all(): array
    {
        return $this->findAll();
    }

    public function searchBy(array $criteria, ?array $orderBy = null, $limit = null, $offset = null): array
    {
        return $this->findBy($criteria, $orderBy, $limit, $offset);
    }

    public function searchOneBy(array $criteria, ?array $orderBy = null): ?object
    {
        return $this->findOneBy($criteria, $orderBy);
    }

    public function getManagerRegistry(): ManagerRegistry
    {
       return $this->registry;
    }
}