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

use App\Domains\AbstractLoader;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Serializer\SerializerInterface;

class LoaderDeleteSport extends AbstractLoader
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
     * @param DeleteSportInput $deleteUserInput
     *
     * @return array
     */
    public function load(DeleteSportInput $deleteUserInput)
    {
        $sport = $deleteUserInput->getSport();
        $this->entityManager->remove($sport);
        $this->entityManager->flush();
        return [];
    }
}
