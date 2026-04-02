<?php

namespace App\Processor;

use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProcessorInterface;
use App\Entity\User;
use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

final readonly class UserPasswordHasher implements ProcessorInterface
{
    public function __construct(
        #[Autowire(service: 'api_platform.doctrine.orm.state.persist_processor')]
        private ProcessorInterface          $processor,
        private UserPasswordHasherInterface $passwordHasher,
    )
    { }

    public function process(mixed $data, Operation $operation, array $uriVariables = [], array $context = []): mixed
    {
        /** @var User $data */
        if ($data->getCreatedAt() === null) {
            $data->setCreatedAt(new \DateTime());
            $data->setActivationCode(uniqid());
            $data->setActivationCodeSentAt(new \DateTime());
            $data->setRoles(['ROLE_USER']);
        }

        if (!$data->getPlainPassword()) {
            return $this->processor->process($data, $operation, $uriVariables, $context);
        }

        $data->setPassword(
            $this->passwordHasher->hashPassword($data, $data->getPlainPassword())
        );
        $data->setPlainPassword(null);

        return $this->processor->process($data, $operation, $uriVariables, $context);
    }
}
