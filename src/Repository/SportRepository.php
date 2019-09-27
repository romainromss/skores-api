<?php
declare(strict_types=1);

/*
 * This file is part of the skores-api project.
 *
 * (c) Romain Bayette <romainromss@posteo.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Repository;

use App\Entity\Sport;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * Class SportRepository.
 *
 * @author Romain Bayette <romainromss@posteo.net>
 */
class SportRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Sport::class);
    }
  
  /**
   * @return mixed
   */
    public function getAllSports()
    {
        return $this->createQueryBuilder('s')
            ->orderBy('s.createdAt', 'DESC')
            ->setCacheable(true)
            ->getQuery()
            ->getResult();
    }
  
  /**
   * @param $id
   *
   * @return mixed
   *
   * @throws \Doctrine\ORM\NonUniqueResultException
   */
    public function getSportById($id)
    {
        return$this->createQueryBuilder('s')
        ->where('s.id = :id')
        ->setParameter('id', $id)
        ->setCacheable(true)
        ->getQuery()
        ->getOneOrNullResult();
    }
}
