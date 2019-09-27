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
use App\Domains\Sports\UpdateSport\LoaderUpdateSport;
use App\Domains\Sports\UpdateSport\RequestResolverUpdateSport;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class UpdateSportAction extends AbstractAction
{
  /**
   * @var LoaderUpdateSport
   */
  private $loader;
  
  /**
   * @var RequestResolverUpdateSport
   */
  private $requestResolverUpdateSport;
  
  public function __construct(
    LoaderUpdateSport $loader,
    RequestResolverUpdateSport $requestResolverUpdateSport
  ) {
    $this->loader = $loader;
    $this->requestResolverUpdateSport = $requestResolverUpdateSport;
  }
  
  /**
   * @Route("/sport/update/{sport_id}", name="update_sport", methods={"PATCH"})
   *
   * @param Request $request
   *
   * @return \Symfony\Component\HttpFoundation\Response
   *
   * @throws \Exception
   */
  public function updateSport(Request $request)
  {
    $input = $this->requestResolverUpdateSport->resolver($request);
    
    $data = $this->loader->load($input, $request);
    return $this->sendResponse(null, 204, $data);
  }
}
