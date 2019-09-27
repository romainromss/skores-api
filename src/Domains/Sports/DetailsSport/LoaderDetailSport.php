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

namespace App\Domains\Sports\DetailsSport;

use App\Domains\AbstractLoader;
use App\Entity\Sport;
use App\Repository\SportRepository;

/**
 * Class LoaderDetailSport.
 *
 * @author Romain Bayette <romainromss@posteo.net>
 */
class LoaderDetailSport extends AbstractLoader
{
  public function load(DetailsSportInput $detailsSportInput)
  {
    /** @var SportRepository $repository */
    $repository = $this->getRepository(Sport::class);
    $data = $repository->getSportById($detailsSportInput->getSport());
    
    if (empty($data)) {
      return null;
    }
    return $this->dataFormatted($data);
  }
}
