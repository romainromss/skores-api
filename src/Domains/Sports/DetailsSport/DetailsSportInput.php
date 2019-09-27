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

namespace App\Domains\Sports\DetailsSport;

class DetailsSportInput
{
    /**
     * @var string | null
     */
    protected $sport;

    public function setSport(?string $sport): void
    {
        $this->sport = $sport;
    }

    public function getSport(): ? string
    {
        return $this->sport;
    }
}
