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

namespace App\Domains\Sports\UpdateSport;

use App\Domains\AbstractLoader;
use App\Entity\Sport;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Serializer\SerializerInterface;

class LoaderUpdateSport extends AbstractLoader
{
  /**
   * @var UrlGeneratorInterface
   */
  private $urlGenerator;
  
  /**
   * LoaderUpdateSport constructor.
   *
   * @param EntityManagerInterface $entityManager
   * @param SerializerInterface    $serializer
   * @param UrlGeneratorInterface  $urlGenerator
   */
  public function __construct(
    EntityManagerInterface $entityManager,
    SerializerInterface $serializer,
    UrlGeneratorInterface $urlGenerator
  ) {
    $this->urlGenerator = $urlGenerator;
    parent::__construct($entityManager, $serializer);
    $this->entityManager = $entityManager;
  }
  
  /**
   * @param UpdateSportInput $updateSportInput
   * @param Request          $request
   *
   * @return array
   */
  public function load(UpdateSportInput $updateSportInput, Request $request)
  {
    $repository = $this->getRepository(Sport::class);
    $sport = $repository->getSportById($request->attributes->get('sport_id'));
    $sport->setLabel($updateSportInput->getLabel());
    
    $this->entityManager->flush();
    return [];
  }
}
