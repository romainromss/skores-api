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
use App\Domains\Sports\DeleteSport\LoaderDeleteSport;
use App\Domains\Sports\DeleteSport\RequestResolverDeleteSport;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DeleteSportAction extends AbstractAction
{
  /**
   * @var LoaderDeleteSport
   */
  private $loader;
  
  /**
   * @var RequestResolverDeleteSport
   */
  private $requestResolverDeleteSport;
  
  public function __construct(
    LoaderDeleteSport $loader,
    RequestResolverDeleteSport $requestResolverDeleteSport
  ) {
    $this->loader = $loader;
    $this->requestResolverDeleteSport = $requestResolverDeleteSport;
  }
  
  /**
   * @Route("/sport/{sport_id}", name="delete_sport", methods={"DELETE"})
   *
   * @param Request $request
   *
   * @return \Symfony\Component\HttpFoundation\Response
   *
   * @throws \ReflectionException
   */
  public function deleteSport(Request $request)
  {
    $input = $this->requestResolverDeleteSport->resolver($request);
    
    $data = $this->loader->load($input);
    return $this->sendResponse(null, 204, $data);
  }
}
