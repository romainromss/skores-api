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

use App\Domains\AbstractRequestResolver;
use App\Entity\Sport;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\SerializerInterface;

class RequestResolverUpdateSport extends AbstractRequestResolver
{
  /**
   * @var EntityManagerInterface
   */
  protected $entityManager;
  
  /**
   * @var SerializerInterface
   */
  private $serializer;
  
  public function __construct(
    EntityManagerInterface $entityManager,
    SerializerInterface $serializer
  ) {
    $this->entityManager = $entityManager;
    $this->serializer = $serializer;
  }
  
  /**
   * @param Request $request
   *
   * @return UpdateSportInput
   * @throws \ReflectionException
   */
  public function resolver(Request $request)
  {
    $input = $this->serializer->deserialize($request->getContent(), $this->getInputClassName(), 'json');
    return $input;
  }
  
  /**
   * @return string
   */
  protected function getInputClassName(): string
  {
    return UpdateSportInput::class;
  }
}
