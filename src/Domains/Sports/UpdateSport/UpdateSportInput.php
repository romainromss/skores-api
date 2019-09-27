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


class UpdateSportInput
{
    /**
     * @var string
     */
    protected $label;
    

    /**
     * @return string
     */
    public function getLabel(): string
    {
        return $this->label;
    }

    /**
     * @param string $label
     */
    public function setLabel(string $label): void
    {
        $this->label = $label;
    }
}
