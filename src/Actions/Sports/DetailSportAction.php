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
use App\Domains\Sports\DetailsSport\LoaderDetailSport;
use App\Domains\Sports\DetailsSport\RequestResolverDetailsSport;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class DetailSportAction.
 *
 * @author Romain Bayette <romainromss@posteo.net>
 */
class DetailSportAction extends AbstractAction
{
  /**
   * @var LoaderDetailSport
   */
  private $loader;
  /**
   * @var RequestResolverDetailsSport
   */
  private $requestResolver;
  
  public  function __construct(
    LoaderDetailSport $loader,
    RequestResolverDetailsSport $requestResolver
  ) {
    $this->loader = $loader;
    $this->requestResolver = $requestResolver;
  }
  
  /**
   * @Route("/sport/{id}", name="details_sports", methods={"GET"})
   *
   * @param Request $request
   *
   * @return \Symfony\Component\HttpFoundation\Response
   *
   * @throws \ReflectionException
   */
  public function DetailSport(Request $request)
  {
    $input = $this->requestResolver->resolver($request);
    $data = $this->loader->load($input);
    return $this->sendResponse($data);
  }
}
