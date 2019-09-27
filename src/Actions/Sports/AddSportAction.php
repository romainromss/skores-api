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

namespace App\Actions\Sports;

use App\Actions\AbstractAction;
use App\Domains\Sports\AddSport\LoaderAddSport;
use App\Domains\Sports\AddSport\RequestResolverAddSport;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AddSportAction extends AbstractAction
{
  /**
   * @var LoaderAddSport
   */
  private $loader;
  
  /**
   * @var RequestResolverAddSport
   */
  private $requestResolverAddSport;
  
  public function __construct(
    LoaderAddSport $loader,
    RequestResolverAddSport $requestResolverAddSport
  ) {
    $this->loader = $loader;
    $this->requestResolverAddSport = $requestResolverAddSport;
  }
  
  /**
   * @Route("/sport", name="add_sport", methods={"POST"})
   *
   * @param Request $request
   *
   * @return \Symfony\Component\HttpFoundation\Response
   *
   * @throws \Exception
   */
  public function addSport(Request $request)
  {
    $input = $this->requestResolverAddSport->resolver($request);
    
    $data = $this->loader->load($input);
    return $this->sendResponse(null, 201, $data);
  }
}
