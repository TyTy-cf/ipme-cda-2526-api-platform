<?php

namespace App\Processor;

use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProcessorInterface;
use App\Entity\Favorite;
use App\Entity\Listing;
use App\Entity\User;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\DependencyInjection\Attribute\Autowire;

final readonly class UserProcessor implements ProcessorInterface
{

    public function __construct(
        #[Autowire(service: 'api_platform.doctrine.orm.state.persist_processor')]
        private ProcessorInterface $processor,
        private Security           $security
    )
    {
    }

    public function process(mixed $data, Operation $operation, array $uriVariables = [], array $context = []): mixed
    {
        $isFavorite = $data instanceof Favorite;
        $isListing = $data instanceof Listing;
        if (!$isFavorite && !$isListing) {
            return $this->processor->process($data, $operation, $uriVariables, $context);
        }

        /** @var User|null $user */
        if (null !== $user = $this->security->getUser()) {
            if ($isFavorite) {
                $data->setUser($user);
            }
            if ($isListing) {
                $data->setOwner($user);
            }
        }

        return $this->processor->process($data, $operation, $uriVariables, $context);
    }
}
