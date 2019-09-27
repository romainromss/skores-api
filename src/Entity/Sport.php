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

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Sport.
 *
 * @author Romain Bayette <romainromss@posteo.net>
 *
 * @ORM\Entity(repositoryClass="App\Repository\SportRepository")
 * @ORM\Table(name="Sport")
 */
class Sport extends AbstractEntity
{
    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    protected $label;
  
  /**
   * Sport constructor.
   *
   * @param string $label
   *
   * @throws \Exception
   */
    public function __construct(
        string $label
    ) {
        $this->label = $label;
        parent::__construct();
    }
  
  /**
   * @return string
   */
  public function getLabel(): string
  {
    return $this->label;
  }
  
  public function setLabel(string $label)
  {
    $this->label = $label;
  }
}
