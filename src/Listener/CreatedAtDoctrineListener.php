<?php

namespace App\Listener;

use ApiPlatform\Metadata\Post;
use App\Entity\Interfaces\CreatedAtInterface;
use DateTime;
use Doctrine\Bundle\DoctrineBundle\Attribute\AsDoctrineListener;
use Doctrine\ORM\Event\PrePersistEventArgs;
use Doctrine\ORM\Events;

#[AsDoctrineListener(event: Events::prePersist, priority: 500)]
class CreatedAtDoctrineListener
{

    public function prePersist(PrePersistEventArgs $args): void
    {
        $object = $args->getObject();
        if ($object instanceof CreatedAtInterface) {
            $object->setCreatedAt(new DateTime());
        }
    }

}
