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

namespace App\Domains\Sports\ListSports;

use App\Domains\AbstractLoader;
use App\Entity\Sport;
use App\Repository\SportRepository;
use Doctrine\DBAL\Connection;
use Symfony\Component\Serializer\Serializer;

/**
 * Class LoaderSportsList.
 *
 * @author Romain Bayette <romainromss@posteo.net>
 */
class LoaderSportsList extends AbstractLoader
{
  /**
   * @return string|null
   */
  public function load()
  {
    /** @var SportRepository $repository */
    $repository = $this->getRepository(Sport::class);
    $data = $repository->getAllSports();
    
    if (empty($data)) {
      return null;
    }
  
    return $this->dataFormatted($data);
  }
}
