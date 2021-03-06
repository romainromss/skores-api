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

namespace App\Domains\Sports\AddSport;

use App\Domains\AbstractLoader;
use App\Entity\Sport;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Serializer\SerializerInterface;

class LoaderAddSport extends AbstractLoader
{
  /**
   * @var UrlGeneratorInterface
   */
  private $urlGenerator;
  
  public function __construct(
    EntityManagerInterface $entityManager,
    SerializerInterface $serializer,
    UrlGeneratorInterface $urlGenerator
  ) {
    $this->urlGenerator = $urlGenerator;
    parent::__construct($entityManager, $serializer);
  }
  
  /**
   * @param AddSportInput $addSportInput
   *
   * @return array
   * @throws \Exception
   */
  public function load(AddSportInput $addSportInput)
  {
    $sport = new Sport($addSportInput->getLabel());
    $this->entityManager->persist($sport);
    $this->entityManager->flush();
    
    return ['Location' => $this->urlGenerator->generate('add_sport', ['sport_id' => $sport->getId()])];
  }
}
