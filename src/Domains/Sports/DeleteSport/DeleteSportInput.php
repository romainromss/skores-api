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

use App\Entity\Sport;

class DeleteSportInput
{
    /**
     * @var Sport
     */
    protected $sport;

    public function getSport(): Sport
    {
        return $this->sport;
    }

    public function setSport(Sport $sports): void {
        $this->sport = $sports;
    }
}
