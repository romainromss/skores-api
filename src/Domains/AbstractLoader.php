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

namespace App\Domains;

use Doctrine\Common\Persistence\ObjectRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * Class AbstractLoader.
 *
 * @author Romain Bayette <romainromss@posteo.net>
 */
abstract class AbstractLoader
{
    /** @var SerializerInterface */
    protected $serializer;

    /** @var EntityManagerInterface */
    protected $entityManager;

    /**
     * AbstractLoader constructor.
     *
     * @param EntityManagerInterface $entityManager
     * @param SerializerInterface $serializer
     */
    public function __construct(
        EntityManagerInterface $entityManager,
        SerializerInterface $serializer
    ) {
        $this->entityManager = $entityManager;
        $this->serializer = $serializer;
    }

    /**
     * @param string $className
     *
     * @return ObjectRepository
     */
    public function getRepository(string $className): ObjectRepository
    {
        return $this->entityManager->getRepository($className);
    }

    public function dataFormatted($data, $group = null )
    {
        return $this->serializer->serialize(
            $data,
            'json'
        );
    }
}
