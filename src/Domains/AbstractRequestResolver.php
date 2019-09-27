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


use ReflectionClass;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\HttpFoundation\Request;

abstract class AbstractRequestResolver
{
    /**
     * @param Request $request
     *
     * @return InputInterface|null
     */
    abstract public function resolver(Request $request);
    /**
     * @return string
     */
    abstract protected function getInputClassName(): string;

    /**
     * @return mixed
     *
     * @throws \ReflectionException
     */
    protected function instanciateInputClass()
    {
        $reflectClass = new ReflectionClass($this->getInputClassName());
        $class = $reflectClass->name;
        return new $class();
    }
}
