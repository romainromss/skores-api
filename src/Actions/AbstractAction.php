<?php

declare(strict_types=1);

/*
 * This file is part of the skores-api project.
 *
 * (c) Romain Bayette <romain.romss@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Actions;

use App\Responders\JsonResponder;

/**
 * Class AbstractAction.
 *
 * @author Romain Bayette <romainromss@posteo.net>
 */
abstract  class AbstractAction
{
    /**
     * @param string|null $datas
     * @param int         $statusCode
     * @param array       $addHeaders
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function sendResponse(
        ? string $datas,
        int $statusCode = 200,
        $addHeaders = []
    ) {
        return JsonResponder::response(
            $datas,
            $statusCode,
            $addHeaders
        );
    }
}
