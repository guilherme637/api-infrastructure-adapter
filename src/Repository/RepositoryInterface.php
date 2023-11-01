<?php

namespace Zuske\Adapter\Repository;

use Doctrine\Persistence\ManagerRegistry;

interface RepositoryInterface
{
    public function search(int $id): ?object;
    public function all(): array;
    public function searchBy(array $criteria, ?array $orderBy = null, $limit = null, $offset = null): array;
    public function searchOneBy(array $criteria, ?array $orderBy = null): ?object;
    public function getManagerRegistry(): ManagerRegistry;
}