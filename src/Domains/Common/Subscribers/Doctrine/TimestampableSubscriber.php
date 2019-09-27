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

namespace App\Domains\Common\Subscribers\Doctrine;

use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Events;

/**
 * Class TimestampableSubscriber.
 *
 * @author Romain Bayette <romainromss@posteo.net>
 */
class TimestampableSubscriber implements EventSubscriber
{
    public function getSubscribedEvents()
    {
        return [
            Events::prePersist
        ];
    }
    public function prePersist(LifecycleEventArgs $eventArgs)
    {
        $eventArgs->getObject()->onPersist();
    }
}
