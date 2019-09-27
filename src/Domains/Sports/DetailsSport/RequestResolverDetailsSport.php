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


use App\Domains\AbstractRequestResolver;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;

class RequestResolverDetailsSport extends AbstractRequestResolver
{
    /**
     * @var EntityManagerInterface
     */
    protected $entityManager;

    public function __construct(
        EntityManagerInterface $entityManager
    ) {
        $this->entityManager = $entityManager;
    }

    /**
     * @param Request $request
     *
     * @return mixed
     *
     * @throws \ReflectionException
     */
    public function resolver(Request $request)
    {
        $input = $this->instanciateInputClass();
        $input->setSport($request->attributes->get('id'));

        return $input;
    }

    protected function getInputclassName(): string
    {
        return DetailsSportInput::class;
    }
}
