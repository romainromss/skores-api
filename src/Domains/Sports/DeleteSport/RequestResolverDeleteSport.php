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

namespace App\Domains\Sports\DeleteSport;

use App\Domains\AbstractRequestResolver;
use App\Repository\SportRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Security;

class RequestResolverDeleteSport extends AbstractRequestResolver
{
  /**
   * @var EntityManagerInterface
   */
  protected $entityManager;
  
  /**
   * @var SportRepository
   */
  private $sportRepository;
  
  /**
   * RequestResolverDeleteSport constructor.
   *
   * @param EntityManagerInterface $entityManager
   * @param SportRepository         $sportRepository
   * @param Security               $security
   */
  public function __construct(
    EntityManagerInterface $entityManager,
    SportRepository $sportRepository
  ) {
    $this->entityManager = $entityManager;
    $this->sportRepository = $sportRepository;
  }
  
  /**
   * @param Request $request
   *
   * @return InputInterface|null
   *
   * @throws \ReflectionException
   */
  public function resolver(Request $request)
  {
    $idSport = $request->attributes->get('sport_id');
    
    $sport = $this->sportRepository->getSportById($idSport);
    $input = $this->instanciateInputClass();
    $input->setSport($sport);
    return $input;
  }
  
  /**
   * @return string
   */
  protected function getInputClassName(): string
  {
    return DeleteSportInput::class;
  }
}
