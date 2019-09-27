<?php

declare(strict_types = 1);

/*
 * This file is part of the skores-api project.
 *
 * (c) Romain Bayette <romain.romss@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Repository;


use App\Entity\Client;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class ClientRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Client::class);
    }
  
  /**
   * @return mixed
   */
    public function getAllClients()
    {
        return $this->createQueryBuilder('c')
            ->orderBy('c.createdAt', 'DESC')
            ->setCacheable(true)
            ->getQuery()
            ->getResult();
    }
  
  /**
   * @param $id
   *
   * @return mixed
   */
    public function getClientById($id)
    {
        return$this->createQueryBuilder('c')
            ->where('c.id = :id')
            ->setParameter('id', $id)
            ->setCacheable(true)
            ->getQuery()
            ->getResult();
    }
}
