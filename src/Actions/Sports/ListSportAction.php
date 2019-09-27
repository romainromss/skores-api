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

namespace App\Actions\Sports;

use App\Actions\AbstractAction;
use App\Domains\Sports\ListSports\LoaderSportsList;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class ListSportAction.
 *
 * @author Romain Bayette <romainromss@posteo.net>
 */
class ListSportAction extends AbstractAction
{
    /** @var LoaderSportsList */
    protected $loader;

    /**
     * ListSportAction constructor.
     *
     * @param LoaderSportsList $loader
     */
    public function __construct(LoaderSportsList $loader)
    {
        $this->loader = $loader;
    }

    /**
     * @Route("/sports", name="list_sports", methods={"GET"})
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function ListSports()
    {
        $datas =  $this->loader->load();
        return $this->sendResponse($datas);
    }
}
